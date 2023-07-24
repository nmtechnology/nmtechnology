<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\message;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactMail;

class MailController extends Controller
{
    public function contact()
    {
        return view('welcome');
    }


    public function sendEmail(ContactRequest $request)
    {
        $details = $request->validated([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'phoneNumber' => $request->phoneNumber,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        Mail::to('nmtechnology505@gmail.com')->send(new ContactMail($details));
        return response()->json('Message Sent To NM Technology', 200);
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
