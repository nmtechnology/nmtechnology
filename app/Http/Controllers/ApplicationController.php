<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;
use App\Mail\ApplicationMail;
use App\Mail\ApplicationConfirmationMail;
use App\Http\Controllers\DocumentUploadController;
use Barryvdh\DomPDF\Facade\Pdf;

class ApplicationController extends Controller
{
    protected $documentUploadController;

    public function __construct(DocumentUploadController $documentUploadController)
    {
        $this->documentUploadController = $documentUploadController;
    }

    public function submit(Request $request)
    {
        try {
            // Validate the incoming request
            $validatedData = $request->validate([
                'firstName' => 'required|string|max:255',
                'lastName' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:20',
                'address' => 'required|string|max:500',
                'position' => 'required|string|max:255',
                'salaryRange' => 'nullable|string|max:100',
                'availability' => 'required|string|max:100',
                'experience' => 'required|string|max:100',
                'previousEmployment' => 'nullable|string|max:2000',
                'education' => 'required|string|max:100',
                'certifications' => 'nullable|string|max:500',
                'coverLetter' => 'required|string|max:5000',
                'reference1' => 'nullable|string|max:500',
                'reference2' => 'nullable|string|max:500',
                'workAuthorized' => 'required|in:yes,no',
                'driversLicense' => 'required|in:yes,no',
                'felonyConviction' => 'required|in:yes,no',
                'mathAnswer' => 'required|integer',
                'correctAnswer' => 'required|integer',
                'resumeId' => 'required|string',
                'coverLetterFileId' => 'nullable|string',
            ]);

            // Verify math verification
            if ($validatedData['mathAnswer'] != $validatedData['correctAnswer']) {
                return response()->json([
                    'message' => 'Math verification failed. Please solve the math problem correctly.'
                ], 422);
            }

            // Get uploaded documents
            $resumeData = null;
            $coverLetterData = null;

            // Get resume file data
            $resumeFileData = Cache::get('uploaded_file_' . $validatedData['resumeId']);
            if (!$resumeFileData || $resumeFileData['uploadStatus'] !== 'success') {
                return response()->json([
                    'message' => 'Resume file not found or failed virus scan. Please upload again.'
                ], 422);
            }
            $resumeData = $resumeFileData;

            // Get cover letter file data if provided
            if (!empty($validatedData['coverLetterFileId'])) {
                $coverLetterFileData = Cache::get('uploaded_file_' . $validatedData['coverLetterFileId']);
                if (!$coverLetterFileData || $coverLetterFileData['uploadStatus'] !== 'success') {
                    return response()->json([
                        'message' => 'Cover letter file not found or failed virus scan. Please upload again.'
                    ], 422);
                }
                $coverLetterData = $coverLetterFileData;
            }

            // Prepare application data including file information
            $applicationData = array_merge($validatedData, [
                'resume' => $resumeData,
                'coverLetterFile' => $coverLetterData,
            ]);

            // Generate PDF application document
            $attachedFiles = [];
            if ($resumeData) {
                $attachedFiles[] = $resumeData;
            }
            if ($coverLetterData) {
                $attachedFiles[] = $coverLetterData;
            }

            $pdf = Pdf::loadView('pdf.application', [
                'application' => $validatedData,
                'attachedFiles' => $attachedFiles
            ]);

            // Generate filename for the PDF
            $pdfFilename = sprintf(
                'Application_%s_%s_%s.pdf',
                $validatedData['firstName'],
                $validatedData['lastName'],
                now()->format('Y-m-d_H-i-s')
            );

            // Remove math answers from the data that gets stored/emailed
            unset($validatedData['mathAnswer'], $validatedData['correctAnswer']);

            // Send email to HR with PDF attachment
            Mail::to('hr@nmtechnology.ca')->send(new ApplicationMail($applicationData, $pdf->output(), $pdfFilename));

            // Send confirmation email to applicant
            Mail::to($validatedData['email'])->send(new ApplicationConfirmationMail($validatedData));

            // Clean up temporary file data
            Cache::forget('uploaded_file_' . $validatedData['resumeId']);
            if (!empty($validatedData['coverLetterFileId'])) {
                Cache::forget('uploaded_file_' . $validatedData['coverLetterFileId']);
            }

            Log::info('Employment application submitted successfully', [
                'applicant' => $validatedData['firstName'] . ' ' . $validatedData['lastName'],
                'email' => $validatedData['email'],
                'position' => $validatedData['position'],
                'timestamp' => now()->toDateTimeString()
            ]);

            return response()->json([
                'message' => 'Application submitted successfully! You should receive a confirmation email shortly.',
                'success' => true
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            Log::error('Error submitting employment application', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'request_data' => $request->all()
            ]);

            return response()->json([
                'message' => 'There was an error submitting your application. Please try again or contact us directly.',
                'error' => 'Server error'
            ], 500);
        }
    }
}