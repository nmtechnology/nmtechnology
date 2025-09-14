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

            $ip = $request->ip();
            $stat = \App\Models\VisitorStat::where('ip', $ip)->first();
            if ($stat) {
                // If blocked, deny access
                if ($stat->blocked_until && now()->lessThan($stat->blocked_until)) {
                    return response()->json(['errors' => ['blocked' => ['Too many failed attempts. Try again later.']]], 403);
                }
            }
            // Math verification
            if ((int)$validated['userMathAnswer'] !== (int)$validated['mathProblemAnswer']) {
                // Track failed attempt
                if ($stat) {
                    $stat->fail_count = ($stat->fail_count ?? 0) + 1;
                    if ($stat->fail_count >= 6) {
                        $stat->blocked_until = now()->addHours(24); // Block for 24 hours
                    }
                    $stat->save();
                } else {
                    \App\Models\VisitorStat::create([
                        'ip' => $ip,
                        'fail_count' => 1,
                    ]);
                }
                return response()->json(['errors' => ['math' => ['Incorrect answer to the math problem.']]], 422);
            } else {
                // On success, reset fail count
                if ($stat) {
                    $stat->fail_count = 0;
                    $stat->blocked_until = null;
                    $stat->save();
                }
            }
            // Set session flag for math verification
            session(['math_verified' => true]);

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
}
