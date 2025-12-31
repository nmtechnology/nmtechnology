<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
use App\Mail\ContactConfirmationMail;
use App\Models\EmailerRecipient;

class MailController extends Controller
{
    public function contact()
    {
        return view('welcome');
    }

    public function send(Request $request)
    {
        try {
            // Validate basic fields
            $validated = $request->validate([
                'firstName' => 'required|string|max:100',
                'lastName' => 'required|string|max:100',
                'phoneNumber' => 'required|string|max:20',
                'email' => 'required|email|max:255',
                'company' => 'nullable|string|max:200',
                'message' => 'required|string|max:2000',
                'blueprintFileId' => 'nullable|string',
                'userMathAnswer' => 'required',
                'mathProblemAnswer' => 'required',
                'files.*' => 'file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png,bmp,tiff,svg,webp,zip,rar,dwg,dxf,xlsx,xls,ppt,pptx,txt,csv',
            ]);

            // Math verification
            if ((int)$validated['userMathAnswer'] !== (int)$validated['mathProblemAnswer']) {
                return response()->json(['errors' => ['math' => ['Incorrect answer to the math problem.']]], 422);
            }

            // Scan files for viruses (pseudo, real scan should use ClamAV or similar)
            $safeFiles = [];
            if ($request->hasFile('files')) {
                foreach ($request->file('files') as $file) {
                    // Example: Use ClamAV or other scanner here
                    // if (!VirusScanner::isSafe($file->getPathname())) {
                    //     return response()->json(['errors' => ['files' => ['Malicious file detected.']]], 422);
                    // }
                    $safeFiles[] = $file;
                }
            }

            // Prepare details for email
            $details = $validated;
            $details['files'] = $safeFiles;

            // Store the contact request regardless of email status
            EmailerRecipient::firstOrCreate(['email' => $validated['email']]);
            
            // Try to send emails, but don't fail the request if email fails
            $emailSent = true;
            try {
                // Send email to NM Technology with attachments
                Mail::to('service@nmtechnology.us')->send(new ContactMail($details));
                
                // Send confirmation email to customer
                Mail::to($validated['email'])->send(
                    new ContactConfirmationMail($validated['firstName'], $validated['lastName'])
                );
                \Log::info('Contact form emails sent successfully (internal + customer confirmation)');
            } catch (\Exception $mailException) {
                $emailSent = false;
                \Log::warning('Contact form email failed but data saved: ' . $mailException->getMessage());
            }
            
            if ($emailSent) {
                return response()->json('Your message has been sent successfully!', 200);
            } else {
                // Still return success since we saved the contact info
                return response()->json('Your message has been received! We will contact you shortly.', 200);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            throw $e; // Re-throw validation exceptions to return proper 422 response
        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            return response()->json(['error' => 'Error processing your request. Please try again.'], 500);
        }
    }

    public function sendSurveyResponse(Request $request)
    {
        try {
            // Validate survey response
            $validated = $request->validate([
                'question' => 'required|string|max:500',
                'category' => 'required|string|max:200',
                'answer' => 'required|string|max:100',
                'timestamp' => 'required|string',
                'page' => 'required|string|max:500',
                'userAgent' => 'nullable|string|max:1000',
            ]);

            // Format email content
            $emailContent = "
                <h2>New Survey Response</h2>
                <p><strong>Category:</strong> {$validated['category']}</p>
                <p><strong>Question:</strong> {$validated['question']}</p>
                <p><strong>Answer:</strong> {$validated['answer']}</p>
                <hr>
                <p><strong>Page:</strong> {$validated['page']}</p>
                <p><strong>Timestamp:</strong> {$validated['timestamp']}</p>
                <p><strong>User Agent:</strong> {$validated['userAgent']}</p>
            ";

            // Send email notification
            Mail::send([], [], function ($message) use ($emailContent, $validated) {
                $message->to('service@nmtechnology.us')
                    ->subject('Survey Response: ' . $validated['category'])
                    ->html($emailContent);
            });

            \Log::info('Survey response email sent successfully', $validated);
            return response()->json(['message' => 'Survey response recorded successfully!'], 200);
        } catch (\Exception $e) {
            \Log::error('Survey response error: ' . $e->getMessage());
            return response()->json(['error' => 'Error recording survey response'], 500);
        }
    }

    public function sendSurveyResponses(Request $request)
    {
        try {
            // Validate batch survey responses
            $validated = $request->validate([
                'responses' => 'required|array|min:1',
                'responses.*.question' => 'required|string|max:500',
                'responses.*.category' => 'required|string|max:200',
                'responses.*.answer' => 'required|string|max:100',
                'responses.*.questionId' => 'required|string|max:100',
                'timestamp' => 'required|string',
                'page' => 'required|string|max:500',
                'userAgent' => 'nullable|string|max:1000',
            ]);

            // Count responses
            $totalResponses = count($validated['responses']);
            $yesCount = count(array_filter($validated['responses'], fn($r) => $r['answer'] === 'Yes'));
            $noCount = $totalResponses - $yesCount;

            // Format email content with all responses
            $emailContent = "
                <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                    <h2 style='color: #16a34a; border-bottom: 3px solid #16a34a; padding-bottom: 10px;'>
                        Complete Survey Results - Online Store & Customer Portal
                    </h2>
                    
                    <div style='background-color: #f3f4f6; padding: 15px; border-radius: 8px; margin: 20px 0;'>
                        <h3 style='color: #374151; margin-top: 0;'>Summary</h3>
                        <p style='margin: 5px 0;'><strong>Total Questions Answered:</strong> {$totalResponses}</p>
                        <p style='margin: 5px 0;'><strong>Positive Responses (Yes):</strong> {$yesCount}</p>
                        <p style='margin: 5px 0;'><strong>Uncertain/Negative Responses:</strong> {$noCount}</p>
                        <p style='margin: 5px 0;'><strong>Interest Level:</strong> " . round(($yesCount / $totalResponses) * 100) . "%</p>
                    </div>

                    <h3 style='color: #374151; border-bottom: 2px solid #e5e7eb; padding-bottom: 8px;'>Detailed Responses</h3>
            ";

            // Add each response
            foreach ($validated['responses'] as $index => $response) {
                $answerColor = $response['answer'] === 'Yes' ? '#16a34a' : '#9ca3af';
                $answerIcon = $response['answer'] === 'Yes' ? '✓' : '?';
                
                $emailContent .= "
                    <div style='background-color: #ffffff; border-left: 4px solid {$answerColor}; padding: 15px; margin: 15px 0; border-radius: 4px; box-shadow: 0 1px 3px rgba(0,0,0,0.1);'>
                        <div style='display: flex; align-items: center; margin-bottom: 8px;'>
                            <span style='background-color: {$answerColor}; color: white; width: 24px; height: 24px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; margin-right: 10px; font-weight: bold;'>{$answerIcon}</span>
                            <span style='background-color: #e5e7eb; color: #374151; padding: 4px 12px; border-radius: 12px; font-size: 12px; font-weight: bold;'>{$response['category']}</span>
                        </div>
                        <p style='color: #1f2937; font-weight: 600; margin: 10px 0;'>{$response['question']}</p>
                        <p style='color: {$answerColor}; font-weight: bold; font-size: 16px; margin: 5px 0;'>Answer: {$response['answer']}</p>
                    </div>
                ";
            }

            $emailContent .= "
                    <hr style='border: none; border-top: 1px solid #e5e7eb; margin: 30px 0;'>
                    
                    <div style='background-color: #f9fafb; padding: 15px; border-radius: 8px; font-size: 14px; color: #6b7280;'>
                        <h4 style='color: #374151; margin-top: 0;'>Session Information</h4>
                        <p style='margin: 5px 0;'><strong>Page:</strong> {$validated['page']}</p>
                        <p style='margin: 5px 0;'><strong>Timestamp:</strong> {$validated['timestamp']}</p>
                        <p style='margin: 5px 0; word-break: break-all;'><strong>User Agent:</strong> {$validated['userAgent']}</p>
                    </div>
                </div>
            ";

            // Try to send consolidated email notification (don't fail if email fails)
            try {
                Mail::send([], [], function ($message) use ($emailContent, $totalResponses) {
                    $message->to('service@nmtechnology.us')
                        ->subject("Survey Completed: {$totalResponses} Questions Answered - Online Store Interest")
                        ->html($emailContent);
                });

                \Log::info('Batch survey responses email sent successfully', [
                    'total_responses' => $totalResponses,
                    'yes_count' => $yesCount,
                    'no_count' => $noCount
                ]);
            } catch (\Exception $mailException) {
                \Log::warning('Survey responses email failed: ' . $mailException->getMessage(), [
                    'total_responses' => $totalResponses,
                    'yes_count' => $yesCount,
                    'no_count' => $noCount
                ]);
            }
            
            return response()->json(['message' => 'Survey responses recorded successfully!'], 200);
        } catch (\Exception $e) {
            \Log::error('Batch survey responses error: ' . $e->getMessage());
            return response()->json(['error' => 'Error recording survey responses'], 500);
        }
    }

    public function sendTestContactEmail()
    {
        try {
            $testData = [
                'firstName' => 'John',
                'lastName' => 'Smith',
                'email' => 'hr@nmtechnology.us',
                'phoneNumber' => '(555) 123-4567',
                'company' => 'Smith Construction Company',
                'message' => 'Hello, I am interested in your welding services for our upcoming commercial project. We need structural steel welding for a 3-story office building. The project includes approximately 200 tons of structural steel work. We have blueprints available and would like to schedule a consultation to discuss timeline and pricing. Please let me know your availability for next week.',
                'math_answer' => '7'  // Assuming the math problem was 3 + 4
            ];

            // Create sample uploaded file data
            $sampleFile = [
                'name' => 'Commercial_Building_Blueprints.pdf',
                'path' => 'storage/contact_attachments/sample_blueprints.pdf',
                'size' => 2500000, // 2.5MB
                'type' => 'application/pdf'
            ];

            Mail::to($testData['email'])->send(new ContactMail($testData));
            Mail::to($testData['email'])->send(new ContactConfirmationMail($testData['firstName'], $testData['lastName']));

            return response()->json([
                'message' => 'Test contact emails sent successfully!',
                'sent_to' => $testData['email'],
                'data_used' => $testData
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Test contact email error: ' . $e->getMessage());
            return response()->json(['error' => 'Error sending test contact emails'], 500);
        }
    }
}
