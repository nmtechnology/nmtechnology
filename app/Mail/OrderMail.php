<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderMail extends Mailable
{
    use Queueable, SerializesModels;

    public $orderData;
    
    /**
     * Create a new message instance.
     */
    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('patrick@nmtechnology.us', 'NM Technology Website')
            ->replyTo($this->orderData['customer']['email'], $this->orderData['customer']['firstName'] . ' ' . $this->orderData['customer']['lastName'])
            ->subject('New CCTV Product Order from Website')
            ->view('emails.order');
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