<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\VisitorStat;

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
    protected $description = 'Send monthly visitor statistics report';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $now = Carbon::now('America/Denver');
        $startOfMonth = $now->copy()->startOfMonth();
        $endOfMonth = $now->copy()->endOfMonth();
        
        $this->info('Generating monthly visitor report for ' . $now->format('F Y'));
        
        // Get stats for the current month
        $stats = VisitorStat::where('last_visited', '>=', $startOfMonth)
                           ->where('last_visited', '<=', $endOfMonth)
                           ->orderBy('last_visited', 'desc')
                           ->get();
        
        // Count unique visitors
        $uniqueVisitors = $stats->pluck('ip')->unique()->count();
        
        // Total visits
        $totalVisits = $stats->sum('visits');
        
        // Get stats by week
        $weeklyVisits = [];
        $currentWeekStart = $startOfMonth->copy();
        $weekNumber = 1;
        
        while ($currentWeekStart->lt($endOfMonth)) {
            $weekEnd = $currentWeekStart->copy()->addDays(6);
            if ($weekEnd->gt($endOfMonth)) {
                $weekEnd = $endOfMonth->copy();
            }
            
            $label = 'Week ' . $weekNumber . ' (' . $currentWeekStart->format('M d') . '-' . $weekEnd->format('M d') . ')';
            $weeklyVisits[$label] = 0;
            
            $currentWeekStart = $currentWeekStart->addDays(7);
            $weekNumber++;
        }
        
        // Fill in the weekly visits data
        foreach ($stats as $stat) {
            $visitDate = Carbon::parse($stat->last_visited);
            $weekNumber = 1;
            $currentWeekStart = $startOfMonth->copy();
            
            while ($currentWeekStart->lt($endOfMonth)) {
                $weekEnd = $currentWeekStart->copy()->addDays(6);
                if ($weekEnd->gt($endOfMonth)) {
                    $weekEnd = $endOfMonth->copy();
                }
                
                if ($visitDate->gte($currentWeekStart) && $visitDate->lte($weekEnd)) {
                    $label = 'Week ' . $weekNumber . ' (' . $currentWeekStart->format('M d') . '-' . $weekEnd->format('M d') . ')';
                    $weeklyVisits[$label] += $stat->visits;
                    break;
                }
                
                $currentWeekStart = $currentWeekStart->addDays(7);
                $weekNumber++;
            }
        }
        
        // Generate HTML report
        $reportHtml = $this->generateReportHtml($stats, $uniqueVisitors, $totalVisits, $weeklyVisits, $now);
        
        // Send email
        Mail::raw([], function ($message) use ($reportHtml, $now) {
            $message->to('service@nmtechnology.us')
                ->subject('NM Technology Monthly Visitor Report - ' . $now->format('F Y'))
                ->setBody($reportHtml, 'text/html');
        });
        
        $this->info('Monthly visitor report sent successfully.');
        
        return 0;
    }
    
    /**
     * Generate HTML report
     */
    private function generateReportHtml($stats, $uniqueVisitors, $totalVisits, $weeklyVisits, $now)
    {
        $reportHtml = '<html><head><style>' . $this->getReportStyles() . '</style></head><body>';
        $reportHtml .= '<div style="text-align:center;margin-bottom:2rem;"><img src="https://nmtechnology.net/images/nmtis-logo.png" alt="NM Technology Logo" style="height:60px;max-width:220px;display:inline-block;"></div>';
        $reportHtml .= '<h1 style="color:#10b981;font-size:2rem;text-align:center;margin-bottom:1rem;">NM Technology Monthly Visitor Report</h1>';
        $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">Month: ' . $now->format('F Y') . '</h2>';
        
        // Summary stats
        $reportHtml .= '<div style="background:#222;padding:1rem;border-radius:8px;margin-bottom:2rem;">';
        $reportHtml .= '<p style="color:#fff;font-size:1.2rem;"><strong style="color:#10b981;">Total Visits:</strong> ' . $totalVisits . '</p>';
        $reportHtml .= '<p style="color:#fff;font-size:1.2rem;"><strong style="color:#10b981;">Unique Visitors:</strong> ' . $uniqueVisitors . '</p>';
        $reportHtml .= '</div>';
        
        // Weekly chart data
        $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">Weekly Visits</h2>';
        $reportHtml .= '<canvas id="weeklyVisitsChart" style="width:100%;max-width:600px;height:300px;margin:0 auto 2rem auto;background:#222;border-radius:8px;"></canvas>';
        $reportHtml .= '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
        $reportHtml .= '<script>const ctx = document.getElementById("weeklyVisitsChart").getContext("2d");'
            . 'new Chart(ctx, {'
            . 'type: "bar",'
            . 'data: {labels: ' . json_encode(array_keys($weeklyVisits)) . ', datasets: [{label: "Visits", data: ' . json_encode(array_values($weeklyVisits)) . ', backgroundColor: "#10b981"}]},'
            . 'options: {scales: {y: {beginAtZero: true}}, plugins: {legend: {display: false}}}});'
            . '</script>';
        
        // Top 10 locations
        $topLocations = $stats->groupBy('location')
            ->map(function ($group) {
                return [
                    'location' => $group->first()->location,
                    'count' => $group->count(),
                    'visits' => $group->sum('visits')
                ];
            })
            ->sortByDesc('visits')
            ->take(10);
            
        $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">Top 10 Visitor Locations</h2>';
        $reportHtml .= '<table style="width:100%;border-collapse:collapse;margin-bottom:2rem;">';
        $reportHtml .= '<thead><tr style="background:#222;color:#10b981;">'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Location</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Unique Visitors</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Total Visits</th>'
            . '</tr></thead><tbody>';
            
        foreach ($topLocations as $loc) {
            $reportHtml .= '<tr style="background:#333;color:#fff;">'
                . '<td style="padding:8px;">' . e($loc['location'] ?: 'Unknown') . '</td>'
                . '<td style="padding:8px;">' . e($loc['count']) . '</td>'
                . '<td style="padding:8px;">' . e($loc['visits']) . '</td>'
                . '</tr>';
        }
        
        $reportHtml .= '</tbody></table>';
        
        // Recent visitors table (limited to 20)
        $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">Recent Visitors (Last 20)</h2>';
        $reportHtml .= '<table style="width:100%;border-collapse:collapse;margin-bottom:2rem;">';
        $reportHtml .= '<thead><tr style="background:#222;color:#10b981;">'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">IP</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Location</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Visits</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Last Visited</th>'
            . '</tr></thead><tbody>';
            
        foreach ($stats->take(20) as $stat) {
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