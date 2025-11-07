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
            Mail::to('hr@nmtechnology.us')->send(new ApplicationMail($applicationData, $pdf->output(), $pdfFilename));

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

    /**
     * Send test emails to demonstrate email templates
     */
    public function sendTestEmails()
    {
        try {
            // Create sample application data
            $sampleApplicationData = [
                'firstName' => 'John',
                'lastName' => 'Smith',
                'email' => 'john.smith@example.com',
                'phone' => '(505) 123-4567',
                'address' => '1234 Security Lane, Albuquerque, NM 87110',
                'position' => 'Security Systems Technician',
                'salaryRange' => '$45,000 - $55,000',
                'availability' => 'Full-time, can start immediately',
                'experience' => '3-5 years',
                'education' => 'Associate degree',
                'certifications' => 'CompTIA Security+, NICET Level II Fire Alarm Systems, Low Voltage Technician License',
                'previousEmployment' => 'ABC Security Solutions (2020-2023): Installed and maintained CCTV systems for commercial clients. Performed troubleshooting and repair work on various security equipment.\n\nXYZ Electronics (2018-2020): Junior technician assistant, learned basic electrical and networking fundamentals.',
                'coverLetter' => 'Dear Hiring Manager,\n\nI am writing to express my strong interest in the Security Systems Technician position at NM Technology. With over 5 years of experience in the security industry and a passion for protecting people and property, I believe I would be a valuable addition to your team.\n\nIn my previous role at ABC Security Solutions, I successfully installed and configured over 200 CCTV systems for commercial clients throughout New Mexico. I have extensive experience with IP cameras, NVR systems, access control, and fire alarm installations. My technical skills include network configuration, cable management, and system integration.\n\nI am particularly drawn to NM Technology because of your reputation as Albuquerque\'s leading security provider and your commitment to using cutting-edge technology. I am excited about the opportunity to contribute to your team\'s continued success.\n\nThank you for considering my application. I look forward to discussing how my experience and enthusiasm can contribute to NM Technology\'s mission.\n\nSincerely,\nJohn Smith',
                'reference1' => 'Mike Johnson, Former Supervisor at ABC Security Solutions\nPhone: (505) 555-0123\nEmail: mike.johnson@abcsecurity.com\nRelationship: Direct supervisor for 3 years',
                'reference2' => 'Sarah Davis, Client Manager at Enterprise Solutions Inc.\nPhone: (505) 555-0456\nEmail: sarah.davis@enterprisesolutions.com\nRelationship: Client contact, worked together on multiple projects',
                'workAuthorized' => 'yes',
                'driversLicense' => 'yes',
                'felonyConviction' => 'no',
                'resume' => [
                    'id' => 'test-resume-123',
                    'original_name' => 'John_Smith_Resume_2025.txt',
                    'path' => 'test/resume.txt',
                    'size' => 1024, // ~1KB
                    'type' => 'resume',
                    'virus_scan_result' => 'File passed basic validation'
                ],
                'coverLetterFile' => [
                    'id' => 'test-cover-123',
                    'original_name' => 'John_Smith_Cover_Letter.txt',
                    'path' => 'test/cover_letter.txt',
                    'size' => 1024, // ~1KB
                    'type' => 'cover-letter',
                    'virus_scan_result' => 'File passed basic validation'
                ]
            ];

            // Generate PDF for test
            $attachedFiles = [$sampleApplicationData['resume'], $sampleApplicationData['coverLetterFile']];
            
            $pdf = Pdf::loadView('pdf.application', [
                'application' => $sampleApplicationData,
                'attachedFiles' => $attachedFiles
            ]);

            $pdfFilename = sprintf(
                'Application_%s_%s_%s.pdf',
                $sampleApplicationData['firstName'],
                $sampleApplicationData['lastName'],
                now()->format('Y-m-d_H-i-s')
            );

            // Send test application email to HR
            Log::info('Sending test application email to HR');
            Mail::to('hr@nmtechnology.us')->send(new ApplicationMail($sampleApplicationData, $pdf->output(), $pdfFilename));

            // Send test confirmation email to applicant
            Log::info('Sending test confirmation email to applicant');
            Mail::to('john.smith@example.com')->send(new ApplicationConfirmationMail($sampleApplicationData));

            return response()->json([
                'message' => 'Test emails sent successfully!',
                'emails_sent' => [
                    'hr_email' => 'hr@nmtechnology.ca (Application with PDF)',
                    'confirmation_email' => 'john.smith@example.com (Confirmation)',
                ],
                'pdf_filename' => $pdfFilename,
                'success' => true
            ], 200);

        } catch (\Exception $e) {
            Log::error('Error sending test emails', [
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);

            return response()->json([
                'message' => 'Error sending test emails: ' . $e->getMessage(),
                'success' => false
            ], 500);
        }
    }
}