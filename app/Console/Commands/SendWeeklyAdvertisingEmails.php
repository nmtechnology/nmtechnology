<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\EmailerRecipient;
use App\Mail\AdvertisingEmail;
use Illuminate\Support\Facades\Mail;

class SendWeeklyAdvertisingEmails extends Command
{
    protected $signature = 'emailer:send-weekly';
    protected $description = 'Send weekly advertising emails to all recipients';

    public function handle()
    {
        $content = "Check out our latest products and offers!";
        $recipients = EmailerRecipient::all();
        foreach ($recipients as $recipient) {
            Mail::to($recipient->email)->send(new AdvertisingEmail($content));
        }
        $this->info('Advertising emails sent.');
    }
}
