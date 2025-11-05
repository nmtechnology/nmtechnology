<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $customerName;
    public $itemCount;
    public $submittedAt;

    /**
     * Create a new message instance.
     */
    public function __construct($firstName, $lastName, $itemCount)
    {
        $this->customerName = $firstName . ' ' . $lastName;
        $this->itemCount = $itemCount;
        $this->submittedAt = now()->timezone('America/Denver')->format('F d, Y \a\t g:i A T');
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('patrick@nmtechnology.us', 'NM Technology')
            ->replyTo('service@nmtechnology.us', 'NM Technology Service')
            ->subject('Your Quote Request Has Been Received! 🎯')
            ->view('emails.quote_confirmation');
    }
}
