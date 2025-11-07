<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Queue\SerializesModels;

class ApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $applicationData;
    public $applicantName;
    public $submissionTime;
    public $hasResume;
    public $hasCoverLetter;
    public $pdfContent;
    public $pdfFilename;

    /**
     * Create a new message instance.
     */
    public function __construct($applicationData, $pdfContent = null, $pdfFilename = null)
    {
        $this->applicationData = $applicationData;
        $this->applicantName = $applicationData['firstName'] . ' ' . $applicationData['lastName'];
        $this->submissionTime = now()->format('F j, Y \a\t g:i A T');
        $this->hasResume = isset($applicationData['resume']) && $applicationData['resume'] !== null;
        $this->hasCoverLetter = isset($applicationData['coverLetterFile']) && $applicationData['coverLetterFile'] !== null;
        $this->pdfContent = $pdfContent;
        $this->pdfFilename = $pdfFilename;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            from: 'hr@nmtechnology.us',
            replyTo: $this->applicationData['email'],
            subject: 'New Employment Application - ' . $this->applicantName,
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            html: 'emails.application',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        $attachments = [];

        // Attach PDF application summary
        if ($this->pdfContent && $this->pdfFilename) {
            $attachments[] = Attachment::fromData(fn () => $this->pdfContent, $this->pdfFilename)
                ->withMime('application/pdf');
        }

        // Attach resume if uploaded
        if ($this->hasResume && isset($this->applicationData['resume']['path'])) {
            $attachments[] = Attachment::fromPath(storage_path('app/' . $this->applicationData['resume']['path']))
                ->as($this->applicationData['resume']['original_name']);
        }

        // Attach cover letter file if uploaded
        if ($this->hasCoverLetter && isset($this->applicationData['coverLetterFile']['path'])) {
            $attachments[] = Attachment::fromPath(storage_path('app/' . $this->applicationData['coverLetterFile']['path']))
                ->as($this->applicationData['coverLetterFile']['original_name']);
        }

        return $attachments;
    }
}