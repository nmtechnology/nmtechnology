<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\VisitorReportService;

class TestVisitorReports extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitor:test-reports {type=all : The report type to test (daily, weekly, monthly, all)}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Test visitor reports by sending them immediately';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $type = $this->argument('type');
        
        $this->info('🧪 Testing Visitor Reports with SVG Graphs');
        $this->info('------------------------------------------');
        
        if ($type === 'all' || $type === 'daily') {
            $this->info('📊 Sending Daily Report...');
            $success = VisitorReportService::sendDailyReport();
            if ($success) {
                $this->info('  ✅ Daily report sent successfully!');
            } else {
                $this->error('  ❌ Daily report failed. Check logs.');
            }
        }
        
        if ($type === 'all' || $type === 'weekly') {
            $this->info('📈 Sending Weekly Report...');
            $success = VisitorReportService::sendWeeklyReport();
            if ($success) {
                $this->info('  ✅ Weekly report sent successfully!');
            } else {
                $this->error('  ❌ Weekly report failed. Check logs.');
            }
        }
        
        if ($type === 'all' || $type === 'monthly') {
            $this->info('📅 Sending Monthly Report...');
            $success = VisitorReportService::sendMonthlyReport();
            if ($success) {
                $this->info('  ✅ Monthly report sent successfully!');
            } else {
                $this->error('  ❌ Monthly report failed. Check logs.');
            }
        }
        
        $this->newLine();
        $this->info('🎉 Test complete! Check service@nmtechnology.us for the reports.');
        
        return 0;
    }
}
