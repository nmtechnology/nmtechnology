<?php
namespace App\Mail;

use Illuminate\Mail\Mailable;

class AdvertisingEmail extends Mailable
{
    public $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function build()
    {
        return $this->subject('Weekly Deals & News')
            ->view('emails.advertising');
    }
}
