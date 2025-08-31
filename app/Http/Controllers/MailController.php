<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;

class MailController extends Controller
{
    public function contact()
    {
        return view('welcome');
    }

    public function send(ContactRequest $request)
    {
        try {
            // Validate the request data
            $details = $request->validated();
            
            // Log the attempt
            \Log::info('Attempting to send contact form email to service@nmtechnology.us');
            
            // Send email to service@nmtechnology.us
            Mail::to('service@nmtechnology.us')->send(new ContactMail($details));
            
            // Log success
            \Log::info('Contact form email sent successfully');
            
            // Return success message
            return response()->json('Your message has been sent successfully!', 200);
        } catch (\Exception $e) {
            // Log the error
            \Log::error('Contact form error: ' . $e->getMessage());
            
            // Return error message
            return response()->json('Error sending message: ' . $e->getMessage(), 500);
        }
    }


    // public function submit(ContactRequest $request)
    // {
    //     Mail::to('patrick@nmtechnology.us')->send(new ContactMail($request->name, $request->email, $request->message));

    //     return to_route('welcome');
    // }





    // public function sendMail()
    // {

    //     Mail::to('service@nmtechnology.us')->send(new message());

    //     return view('welcome');
    // }
}
