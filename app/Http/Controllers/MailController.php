<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\message;

class MailController extends Controller
{
    public function sendMail()
    {

        Mail::to('service@nmtechnology.us')->send(new message());

        return view('welcome');
    }
}
