<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationMail;
use App\Mail\ApplicationConfirmationMail;

class TestApplicationEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:test-applications {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test employment application emails';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $email = $this->argument('email');
        
        // Sample application data
        $applicationData = [
            'firstName' => 'John',
            'lastName' => 'Doe',
            'email' => $email,
            'phone' => '(505) 123-4567',
            'address' => '123 Main St, Albuquerque, NM 87101',
            'position' => 'Security Technician',
            'salaryRange' => '$40,000 - $50,000',
            'availability' => 'Available in 2 weeks',
            'experience' => '3-5 years',
            'previousEmployment' => 'Previously worked at ABC Security Services as a CCTV installer for 3 years. Responsible for camera installation, system configuration, and client training.',
            'education' => 'Associate',
            'certifications' => 'CompTIA Security+, Fire Alarm License',
            'coverLetter' => 'I am very interested in joining NM Technology because of your reputation for excellence in the security industry. My experience with CCTV systems and passion for helping protect businesses makes me a great fit for your team. I am eager to contribute to your continued success and grow my career with a respected local company.',
            'reference1' => 'Mike Johnson, ABC Security, (505) 987-6543, mike.johnson@abcsecurity.com',
            'reference2' => 'Sarah Wilson, XYZ Tech, (505) 456-7890, sarah.wilson@xyztech.com',
            'workAuthorized' => 'yes',
            'driversLicense' => 'yes',
            'felonyConviction' => 'no'
        ];

        try {
            // Send application to HR
            $this->info('Sending application email to HR...');
            Mail::to('hr@nmtechnology.us')->send(new ApplicationMail($applicationData));
            
            // Send confirmation to applicant
            $this->info('Sending confirmation email to applicant...');
            Mail::to($email)->send(new ApplicationConfirmationMail(
                $applicationData['firstName'],
                $applicationData['lastName'],
                $applicationData['position']
            ));
            
            $this->info('✅ Both application emails sent successfully!');
            $this->info("HR notification sent to: hr@nmtechnology.us");
            $this->info("Applicant confirmation sent to: {$email}");
            
        } catch (\Exception $e) {
            $this->error('❌ Error sending emails: ' . $e->getMessage());
        }
    }
}