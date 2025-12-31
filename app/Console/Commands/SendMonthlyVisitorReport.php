<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\VisitorReportService;

class SendMonthlyVisitorReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitor:send-monthly-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send monthly visitor statistics report with visual SVG graphs';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('Generating monthly visitor report with visual graphs...');
        
        $success = VisitorReportService::sendMonthlyReport();
        
        if ($success) {
            $this->info('✅ Monthly visitor report sent successfully.');
            return 0;
        } else {
            $this->error('❌ Failed to send monthly visitor report. Check logs.');
            return 1;
        }
    }
}
