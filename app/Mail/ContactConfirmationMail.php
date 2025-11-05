<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $submittedAt;

    /**
     * Create a new message instance.
     */
    public function __construct($firstName, $lastName)
    {
        $this->customerName = $firstName . ' ' . $lastName;
        $this->submittedAt = now()->timezone('America/Denver')->format('F d, Y \a\t g:i A T');
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('patrick@nmtechnology.us', 'NM Technology')
            ->replyTo('service@nmtechnology.us', 'NM Technology Service')
            ->subject('Thank You for Contacting NM Technology! 🎉')
            ->view('emails.contact_confirmation');
    }
}
