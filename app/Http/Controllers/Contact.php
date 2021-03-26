<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Contact extends Controller
{
    public function show()
    {
        return view('welcome');
    }

    public function store()
    {
        request()->validate(['email' => 'required|email']);

        Mail::raw('it works!', function ($message) {
            $message->to(request('email'))
                ->subject('Message from NM Tech website!');
        });

        return view('welcome');
    }
}
