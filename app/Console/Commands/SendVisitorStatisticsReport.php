<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\VisitorReportService;

class SendVisitorStatisticsReport extends Command
{
    protected $signature = 'visitor:send-statistics-report';
    protected $description = 'Send daily visitor statistics report with visual SVG graphs';

    public function handle()
    {
        $this->info('Generating daily visitor statistics report with visual graphs...');
        
        $success = VisitorReportService::sendDailyReport();
        
        if ($success) {
            $this->info('✅ Daily visitor statistics report sent successfully.');
            return 0;
        } else {
            $this->error('❌ Failed to send daily visitor statistics report. Check logs.');
            return 1;
        }
    }
}
