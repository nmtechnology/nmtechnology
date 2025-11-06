<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ApplicationMail;
use App\Mail\ApplicationConfirmationMail;

class ApplicationController extends Controller
{
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
            ]);

            // Verify the math answer
            if ($validatedData['mathAnswer'] !== $validatedData['correctAnswer']) {
                return response()->json([
                    'message' => 'Math verification failed. Please solve the problem correctly.',
                    'error' => 'Invalid math answer'
                ], 422);
            }

            // Remove math answers from the data that gets stored/emailed
            unset($validatedData['mathAnswer'], $validatedData['correctAnswer']);

            // Send application to HR team
            Mail::to('hr@nmtechnology.us')->send(new ApplicationMail($validatedData));

            // Send confirmation to the applicant
            Mail::to($validatedData['email'])->send(
                new ApplicationConfirmationMail(
                    $validatedData['firstName'],
                    $validatedData['lastName'],
                    $validatedData['position']
                )
            );

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