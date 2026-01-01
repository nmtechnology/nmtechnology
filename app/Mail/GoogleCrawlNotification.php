<?php

namespace App\Mail;

use App\Models\GoogleCrawl;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;

class GoogleCrawlNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $crawl;
    public $requestData;

    /**
     * Create a new message instance.
     */
    public function __construct(GoogleCrawl $crawl, Request $request = null)
    {
        $this->crawl = $crawl;
        $this->requestData = $request ? [
            'query_params' => $request->query->all(),
            'server_protocol' => $request->server('SERVER_PROTOCOL'),
            'server_name' => $request->server('SERVER_NAME'),
        ] : [];
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        $status = $this->crawl->is_verified ? '✓' : '⚠';
        return new Envelope(
            subject: $status . ' Google ' . $this->crawl->bot_type . ' Crawled Your Site',
        );
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->from('hr@nmtechnology.us', 'NM Technology Bot Monitor')
            ->subject($this->envelope()->subject)
            ->view('emails.google_crawl');
    }
}
