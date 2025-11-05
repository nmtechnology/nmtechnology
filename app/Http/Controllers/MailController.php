<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;
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
                'message' => 'required|string|max:2000',
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

            // Send email with attachments
            Mail::to('service@nmtechnology.us')->send(new ContactMail($details));
            EmailerRecipient::firstOrCreate(['email' => $validated['email']]);
            \Log::info('Contact form email sent successfully');
            return response()->json('Your message has been sent successfully!', 200);
        } catch (\Exception $e) {
            \Log::error('Contact form error: ' . $e->getMessage());
            return response()->json('Error sending message: ' . $e->getMessage(), 500);
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
}
