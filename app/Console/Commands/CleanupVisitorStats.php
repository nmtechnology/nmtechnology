<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\VisitorStat;
use Illuminate\Support\Facades\DB;

class CleanupVisitorStats extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitor:cleanup-stats {--force : Skip confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clean up visitor statistics with no math_status (old/test data)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = VisitorStat::whereNull('math_status')
            ->orWhere('math_status', '')
            ->count();

        if ($count === 0) {
            $this->info('✅ No records to clean up. All visitor stats have a valid math_status.');
            return 0;
        }

        $this->warn("Found {$count} visitor records with no math_status (old/test data)");

        if (!$this->option('force')) {
            if (!$this->confirm('Do you want to delete these records?', true)) {
                $this->info('Operation cancelled.');
                return 0;
            }
        }

        $this->info('Deleting old/test visitor records...');
        
        $deleted = VisitorStat::whereNull('math_status')
            ->orWhere('math_status', '')
            ->delete();

        $this->info("✅ Successfully deleted {$deleted} records.");
        
        // Show stats after cleanup
        $remaining = VisitorStat::count();
        $verified = VisitorStat::where('math_status', 'success')->count();
        $failed = VisitorStat::where('math_status', 'failed')->count();
        $blocked = VisitorStat::whereIn('math_status', ['blocked', 'locked_out'])->count();
        
        $this->newLine();
        $this->info('📊 Current Statistics:');
        $this->line("Total Records: {$remaining}");
        $this->line("✅ Verified: {$verified}");
        $this->line("❌ Failed: {$failed}");
        $this->line("🚫 Blocked: {$blocked}");

        return 0;
    }
}
