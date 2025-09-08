<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailerRecipient;

class EmailerRecipientController extends Controller
{
    // Show form to add new email
    public function create()
    {
        return view('emailer.add');
    }

    // Store new email
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:emailer_recipients,email',
        ]);
        EmailerRecipient::create(['email' => $request->email]);
        return redirect()->back()->with('success', 'Email added!');
    }
}
