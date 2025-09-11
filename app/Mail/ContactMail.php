<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    public $details;
    /**
     * Create a new message instance.
     */
    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Get the message envelope.
     */

    // public function envelope(): Envelope
    // {
    //     return new Envelope(
    //         from: new Address('service@nmtechnology', 'NM Technology'),
    //         subject: 'Welcome to NM Technology',
    //     );
    // }

    public function build()
    {
        $email = $this->from('patrick@nmtechnology.us', 'NM Technology Website')
            ->replyTo($this->details['email'], $this->details['firstName'] . ' ' . $this->details['lastName'])
            ->subject('New Contact Form Submission from Website')
            ->view('emails.contact');
        // Attach files if present
        if (!empty($this->details['files'])) {
            foreach ($this->details['files'] as $file) {
                $email->attach($file->getRealPath(), [
                    'as' => $file->getClientOriginalName(),
                    'mime' => $file->getMimeType(),
                ]);
            }
        }
        return $email;
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
