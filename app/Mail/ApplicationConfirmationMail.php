<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationConfirmationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicantName;
    public $position;
    public $submissionTime;

    /**
     * Create a new message instance.
     */
    public function __construct($firstName, $lastName, $position = null)
    {
        $this->applicantName = $firstName . ' ' . $lastName;
        $this->position = $position ?? 'the position you applied for';
        $this->submissionTime = now()->format('F j, Y \a\t g:i A T');
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'hr@nmtechnology.us',
            replyTo: 'hr@nmtechnology.us',
            subject: 'Application Received - Thank You for Your Interest! 🎯',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'emails.application_confirmation',
        );
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