<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactConfirmationMail;
use App\Mail\QuoteConfirmationMail;

class TestConfirmationEmails extends Command
{
    protected $signature = 'email:test-confirmations {email}';
    protected $description = 'Test sending confirmation emails to a specified address';

    public function handle()
    {
        $email = $this->argument('email');
        
        $this->info('Sending test confirmation emails to: ' . $email);
        
        try {
            // Test Contact Confirmation
            $this->info('Sending Contact Confirmation Email...');
            Mail::to($email)->send(new ContactConfirmationMail('Test', 'User'));
            $this->info('✓ Contact confirmation email sent!');
            
            // Test Quote Confirmation
            $this->info('Sending Quote Confirmation Email...');
            Mail::to($email)->send(new QuoteConfirmationMail('Test', 'Customer', 3));
            $this->info('✓ Quote confirmation email sent!');
            
            $this->info('');
            $this->info('✅ All test emails sent successfully!');
            $this->info('Check your inbox at: ' . $email);
            
            return 0;
        } catch (\Exception $e) {
            $this->error('Error sending emails: ' . $e->getMessage());
            return 1;
        }
    }
}
