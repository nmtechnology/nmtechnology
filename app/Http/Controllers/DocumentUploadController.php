<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Exception;

class DocumentUploadController extends Controller
{
    public function upload(Request $request)
    {
        try {
            $request->validate([
                'file' => 'required|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png,tiff,bmp,xls,xlsx,txt', // 10MB max for blueprints
                'type' => 'required|in:resume,cover-letter,blueprint'
            ]);

            $file = $request->file('file');
            $type = $request->input('type');
            
            // Generate unique filename
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $originalName = $file->getClientOriginalName();
            
            // Create appropriate directory based on file type
            if ($type === 'blueprint') {
                $uploadPath = 'contact-attachments/' . date('Y/m');
            } else {
                $uploadPath = 'application-documents/' . date('Y/m');
            }
            
            // Store file temporarily for virus scanning
            $tempPath = $file->store('temp');
            $fullTempPath = Storage::path($tempPath);
            
            // Perform virus scan
            $scanResult = $this->scanFileForViruses($fullTempPath);
            
            if (!$scanResult['clean']) {
                // Delete temporary file
                Storage::delete($tempPath);
                
                Log::warning('Virus detected in uploaded file', [
                    'original_name' => $originalName,
                    'type' => $type,
                    'scan_result' => $scanResult['message']
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'File failed security scan. Please ensure your file is clean and try again.'
                ], 422);
            }
            
            // Move file to final location
            $finalPath = $uploadPath . '/' . $filename;
            Storage::move($tempPath, $finalPath);
            
            // Store file metadata
            $fileId = Str::uuid();
            $fileData = [
                'id' => $fileId,
                'original_name' => $originalName,
                'filename' => $filename,
                'path' => $finalPath,
                'type' => $type,
                'size' => $file->getSize(),
                'mime_type' => $file->getMimeType(),
                'uploaded_at' => now(),
                'virus_scan_result' => $scanResult['message'],
                'ip_address' => $request->ip()
            ];
            
            // Store file metadata in cache/session for later processing
            cache()->put('uploaded_document_' . $fileId, $fileData, now()->addHours(24));
            
            Log::info('Document uploaded successfully', [
                'file_id' => $fileId,
                'original_name' => $originalName,
                'type' => $type,
                'size' => $file->getSize()
            ]);
            
            return response()->json([
                'success' => true,
                'fileId' => $fileId,
                'originalName' => $originalName,
                'message' => 'File uploaded and verified successfully'
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid file. Please upload PDF, DOC, or DOCX files under 5MB.',
                'errors' => $e->errors()
            ], 422);
            
        } catch (Exception $e) {
            Log::error('Document upload error', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Upload failed. Please try again.'
            ], 500);
        }
    }
    
    /**
     * Scan file for viruses using ClamAV or alternative methods
     */
    private function scanFileForViruses($filePath)
    {
        try {
            // Method 1: Try ClamAV if available
            if ($this->isClamAVAvailable()) {
                return $this->scanWithClamAV($filePath);
            }
            
            // Method 2: Basic file signature validation
            return $this->basicFileValidation($filePath);
            
        } catch (Exception $e) {
            Log::error('Virus scan error', [
                'file' => $filePath,
                'error' => $e->getMessage()
            ]);
            
            // Fail secure - reject file if scanning fails
            return [
                'clean' => false,
                'message' => 'Security scan failed'
            ];
        }
    }
    
    /**
     * Check if ClamAV is available
     */
    private function isClamAVAvailable()
    {
        // Check if clamscan command exists
        $output = null;
        $returnVar = null;
        exec('which clamscan', $output, $returnVar);
        return $returnVar === 0;
    }
    
    /**
     * Scan file with ClamAV antivirus
     */
    public function scanWithClamAV($filePath)
    {
        $command = 'clamscan --no-summary --infected --quiet ' . escapeshellarg($filePath);
        $output = null;
        $returnVar = null;
        
        exec($command, $output, $returnVar);
        
        // ClamAV returns 0 for clean, 1 for infected, 2 for error
        if ($returnVar === 0) {
            return [
                'clean' => true,
                'message' => 'File passed ClamAV virus scan'
            ];
        } elseif ($returnVar === 1) {
            return [
                'clean' => false,
                'message' => 'Virus detected by ClamAV'
            ];
        } else {
            return [
                'clean' => false,
                'message' => 'ClamAV scan error'
            ];
        }
    }
    
    /**
     * Basic file validation (fallback when ClamAV is not available)
     */
    private function basicFileValidation($filePath)
    {
        // Check file signatures for common malware patterns
        $handle = fopen($filePath, 'rb');
        if (!$handle) {
            return ['clean' => false, 'message' => 'Cannot read file'];
        }
        
        // Read first 1024 bytes to check file signature
        $header = fread($handle, 1024);
        fclose($handle);
        
        // Check for common executable signatures that shouldn't be in documents
        $malwareSignatures = [
            'MZ',           // Windows executable
            "\x7fELF",      // Linux executable
            "\xca\xfe\xba\xbe", // Java class file
            "\xfe\xed\xfa",     // Mach-O executable
            "\x50\x4b\x03\x04", // ZIP (could contain malware, but PDF/DOC are also ZIP-based)
        ];
        
        // Check for PDF signature
        if (strpos($header, '%PDF') === 0) {
            // Additional PDF validation could go here
            return ['clean' => true, 'message' => 'File passed basic validation (PDF)'];
        }
        
        // Check for Microsoft Office signatures
        if (strpos($header, "\xd0\xcf\x11\xe0") === 0 || 
            strpos($header, "\x50\x4b\x03\x04") === 0) {
            // DOC/DOCX file
            return ['clean' => true, 'message' => 'File passed basic validation (Office document)'];
        }
        
        // Check for suspicious patterns
        foreach ($malwareSignatures as $signature) {
            if (strpos($header, $signature) === 0) {
                return ['clean' => false, 'message' => 'Suspicious file signature detected'];
            }
        }
        
        // Check file size (empty files or unusually large files)
        $fileSize = filesize($filePath);
        if ($fileSize === 0) {
            return ['clean' => false, 'message' => 'Empty file detected'];
        }
        
        if ($fileSize > 10 * 1024 * 1024) { // 10MB
            return ['clean' => false, 'message' => 'File too large for processing'];
        }
        
        return ['clean' => true, 'message' => 'File passed basic validation'];
    }
    
    /**
     * Get uploaded file data for application processing
     */
    public function getFileData($fileId)
    {
        return cache()->get('uploaded_document_' . $fileId);
    }
    
    /**
     * Clean up temporary file data after application is processed
     */
    public function cleanupFileData($fileId)
    {
        cache()->forget('uploaded_document_' . $fileId);
    }
}