<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\VisitorStat;

class SendWeeklyVisitorReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'visitor:send-weekly-report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send weekly visitor statistics report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now('America/Denver');
        $startOfWeek = $now->copy()->startOfWeek(); // Default is Monday
        $endOfWeek = $now->copy()->endOfWeek();     // Default is Sunday
        
        $this->info('Generating weekly visitor report from ' . $startOfWeek->format('Y-m-d') . ' to ' . $endOfWeek->format('Y-m-d'));
        
        // Get stats for the past week
        $stats = VisitorStat::where('last_visited', '>=', $startOfWeek)
                           ->where('last_visited', '<=', $endOfWeek)
                           ->orderBy('last_visited', 'desc')
                           ->get();
        
        // Count unique visitors
        $uniqueVisitors = $stats->pluck('ip')->unique()->count();
        
        // Total visits
        $totalVisits = $stats->sum('visits');
        
        // Get stats by day
        $dailyVisits = [];
        for ($day = 0; $day < 7; $day++) {
            $date = $startOfWeek->copy()->addDays($day)->format('Y-m-d');
            $dailyVisits[$date] = 0;
        }
        
        foreach ($stats as $stat) {
            $date = Carbon::parse($stat->last_visited)->format('Y-m-d');
            if (isset($dailyVisits[$date])) {
                $dailyVisits[$date] += $stat->visits;
            }
        }
        
        // Generate HTML report
        $reportHtml = $this->generateReportHtml($stats, $uniqueVisitors, $totalVisits, $dailyVisits, $startOfWeek, $endOfWeek);
        
        // Send email
        Mail::raw([], function ($message) use ($reportHtml) {
            $message->to('service@nmtechnology.us')
                ->subject('NM Technology Weekly Visitor Report')
                ->setBody($reportHtml, 'text/html');
        });
        
        $this->info('Weekly visitor report sent successfully.');
        
        return 0;
    }
    
    /**
     * Generate HTML report
     */
    private function generateReportHtml($stats, $uniqueVisitors, $totalVisits, $dailyVisits, $startOfWeek, $endOfWeek)
    {
        $now = Carbon::now('America/Denver');
        $reportHtml = '<html><head><style>' . $this->getReportStyles() . '</style></head><body>';
        $reportHtml .= '<div style="text-align:center;margin-bottom:2rem;"><img src="https://nmtechnology.net/images/nmtis-logo.png" alt="NM Technology Logo" style="height:60px;max-width:220px;display:inline-block;"></div>';
        $reportHtml .= '<h1 style="color:#10b981;font-size:2rem;text-align:center;margin-bottom:1rem;">NM Technology Weekly Visitor Report</h1>';
        $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">Week Summary: ' . $startOfWeek->format('M d, Y') . ' to ' . $endOfWeek->format('M d, Y') . '</h2>';
        
        // Summary stats
        $reportHtml .= '<div style="background:#222;padding:1rem;border-radius:8px;margin-bottom:2rem;">';
        $reportHtml .= '<p style="color:#fff;font-size:1.2rem;"><strong style="color:#10b981;">Total Visits:</strong> ' . $totalVisits . '</p>';
        $reportHtml .= '<p style="color:#fff;font-size:1.2rem;"><strong style="color:#10b981;">Unique Visitors:</strong> ' . $uniqueVisitors . '</p>';
        $reportHtml .= '</div>';
        
        // Daily chart data
        $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">Daily Visits (Past Week)</h2>';
        $reportHtml .= '<canvas id="dailyVisitsChart" style="width:100%;max-width:600px;height:300px;margin:0 auto 2rem auto;background:#222;border-radius:8px;"></canvas>';
        $reportHtml .= '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
        $reportHtml .= '<script>const ctx = document.getElementById("dailyVisitsChart").getContext("2d");'
            . 'new Chart(ctx, {'
            . 'type: "bar",'
            . 'data: {labels: ' . json_encode(array_keys($dailyVisits)) . ', datasets: [{label: "Visits", data: ' . json_encode(array_values($dailyVisits)) . ', backgroundColor: "#10b981"}]},'
            . 'options: {scales: {y: {beginAtZero: true}}, plugins: {legend: {display: false}}}});'
            . '</script>';
        
        // Visitor table
        $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">Visitors This Week</h2>';
        $reportHtml .= '<table style="width:100%;border-collapse:collapse;margin-bottom:2rem;">';
        $reportHtml .= '<thead><tr style="background:#222;color:#10b981;">'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">IP</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Location</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Visits</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Last Visited</th>'
            . '</tr></thead><tbody>';
            
        foreach ($stats as $stat) {
            $reportHtml .= '<tr style="background:#333;color:#fff;">'
                . '<td style="padding:8px;">' . e($stat->ip) . '</td>'
                . '<td style="padding:8px;">' . e($stat->location) . '</td>'
                . '<td style="padding:8px;">' . e($stat->visits) . '</td>'
                . '<td style="padding:8px;">' . e($stat->last_visited) . '</td>'
                . '</tr>';
        }
        
        $reportHtml .= '</tbody></table>';
        $reportHtml .= '<div style="text-align:center;color:#10b981;font-size:1rem;margin-top:2rem;">&copy; ' . $now->year . ' NM Technology. All rights reserved.</div>';
        $reportHtml .= '</body></html>';
        
        return $reportHtml;
    }
    
    /**
     * Get CSS styles for the report
     */
    private function getReportStyles()
    {
        return 'body{background:#111;font-family:sans-serif;}h1,h2{font-family:sans-serif;}table{border-radius:8px;overflow:hidden;}th,td{border:none;}';
    }
}