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
        Mail::send([], [], function ($message) use ($reportHtml, $now) {
            $message->to('service@nmtechnology.us')
                ->subject('NM Technology Monthly Visitor Report - ' . $now->format('F Y'))
                ->html($reportHtml);
        });
        
        $this->info('Monthly visitor report sent successfully.');
        
        return 0;
    }
    
    /**
     * Generate HTML report
     */
    private function generateReportHtml($stats, $uniqueVisitors, $totalVisits, $weeklyVisits, $now)
    {
        $daysInMonth = $now->daysInMonth;
        $avgDaily = $totalVisits > 0 ? round($totalVisits / $daysInMonth, 1) : 0;
        
        // Top 10 locations
        $topLocations = $stats->groupBy('location')
            ->map(function ($group) {
                return [
                    'location' => $group->first()->location ?: 'Unknown',
                    'count' => $group->count(),
                    'visits' => $group->sum('visits')
                ];
            })
            ->sortByDesc('visits')
            ->take(10);
        
        $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monthly Visitor Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background: linear-gradient(to bottom, #000000, #111827);
            color: #ffffff;
            padding: 20px;
        }
        .container {
            max-width: 1100px;
            margin: 0 auto;
            background: rgba(17, 24, 39, 0.95);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 20px;
            border-bottom: 3px solid;
            border-image: linear-gradient(to right, #22c55e, #84cc16) 1;
        }
        .logo { height: 60px; margin-bottom: 20px; }
        h1 {
            font-size: 2.5rem;
            background: linear-gradient(to right, #22c55e, #84cc16);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
            margin-bottom: 10px;
        }
        .subtitle {
            color: #9ca3af;
            font-size: 1.2rem;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }
        .stat-card {
            background: linear-gradient(135deg, #1f2937, #111827);
            border-radius: 12px;
            padding: 30px;
            border: 1px solid rgba(34, 197, 94, 0.2);
            text-align: center;
            transition: transform 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-value {
            font-size: 2.8rem;
            font-weight: 800;
            background: linear-gradient(to right, #22c55e, #84cc16);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .stat-label {
            color: #9ca3af;
            margin-top: 10px;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.85rem;
        }
        .chart-section {
            background: linear-gradient(135deg, #1f2937, #111827);
            border-radius: 12px;
            padding: 30px;
            margin-bottom: 30px;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .chart-title {
            color: #22c55e;
            font-size: 1.5rem;
            margin-bottom: 20px;
            font-weight: 700;
        }
        .chart-container {
            position: relative;
            height: 320px;
        }
        table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 8px;
            overflow: hidden;
        }
        thead {
            background: linear-gradient(to right, #22c55e, #16a34a);
        }
        th {
            padding: 15px;
            text-align: left;
            color: #ffffff;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.85rem;
        }
        td {
            padding: 12px 15px;
            background: rgba(31, 41, 55, 0.5);
            border-bottom: 1px solid rgba(34, 197, 94, 0.1);
        }
        tbody tr:hover {
            background: rgba(34, 197, 94, 0.15);
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
            font-size: 0.85rem;
        }
        .footer {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid rgba(34, 197, 94, 0.2);
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://nmtechnology.us/images/nmtis-logo.png" alt="NM Technology Logo" class="logo">
            <h1>📈 Monthly Visitor Report</h1>
            <p class="subtitle">' . $now->format('F Y') . '</p>
        </div>
        
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-value">' . number_format($totalVisits) . '</div>
                <div class="stat-label">Total Visits</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">' . number_format($uniqueVisitors) . '</div>
                <div class="stat-label">Unique Visitors</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">' . $avgDaily . '</div>
                <div class="stat-label">Avg Daily Visits</div>
            </div>
        </div>
        
        <div class="chart-section">
            <h2 class="chart-title">📊 Weekly Traffic Breakdown</h2>
            <div class="chart-container">
                <canvas id="weeklyChart"></canvas>
            </div>
        </div>
        
        <div class="chart-section">
            <h2 class="chart-title">🌍 Top 10 Visitor Locations</h2>
            <table>
                <thead>
                    <tr>
                        <th>Location</th>
                        <th>Unique Visitors</th>
                        <th>Total Visits</th>
                    </tr>
                </thead>
                <tbody>';
        
        foreach ($topLocations as $loc) {
            $html .= '<tr>
                        <td><span class="badge">' . htmlspecialchars($loc['location']) . '</span></td>
                        <td>' . $loc['count'] . '</td>
                        <td><strong>' . $loc['visits'] . '</strong></td>
                    </tr>';
        }
        
        $html .= '      </tbody>
            </table>
        </div>
        
        <div class="chart-section">
            <h2 class="chart-title">👥 Recent Visitors (Last 30)</h2>
            <table>
                <thead>
                    <tr>
                        <th>IP Address</th>
                        <th>Location</th>
                        <th>Visits</th>
                        <th>Last Visited</th>
                    </tr>
                </thead>
                <tbody>';
        
        foreach ($stats->take(30) as $stat) {
            $html .= '<tr>
                        <td>' . htmlspecialchars($stat->ip) . '</td>
                        <td>' . htmlspecialchars($stat->location) . '</td>
                        <td><strong>' . $stat->visits . '</strong></td>
                        <td>' . Carbon::parse($stat->last_visited)->format('M d, g:i A') . '</td>
                    </tr>';
        }
        
        $html .= '      </tbody>
            </table>
        </div>
        
        <div class="footer">
            <p>&copy; ' . $now->year . ' NM Technology. All rights reserved.</p>
            <p style="margin-top: 8px;">Generated on ' . $now->format('F d, Y \a\t g:i A T') . '</p>
        </div>
    </div>
    
    <script>
    const ctx = document.getElementById("weeklyChart").getContext("2d");
    new Chart(ctx, {
        type: "line",
        data: {
            labels: ' . json_encode(array_keys($weeklyVisits)) . ',
            datasets: [{
                label: "Weekly Visits",
                data: ' . json_encode(array_values($weeklyVisits)) . ',
                borderColor: "#22c55e",
                backgroundColor: "rgba(34, 197, 94, 0.2)",
                borderWidth: 3,
                fill: true,
                tension: 0.4,
                pointRadius: 6,
                pointHoverRadius: 8,
                pointBackgroundColor: "#22c55e",
                pointBorderColor: "#ffffff",
                pointBorderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: "rgba(0, 0, 0, 0.8)",
                    padding: 12,
                    titleColor: "#22c55e",
                    bodyColor: "#ffffff",
                    borderColor: "#22c55e",
                    borderWidth: 1
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: { color: "rgba(34, 197, 94, 0.1)" },
                    ticks: { color: "#9ca3af" }
                },
                x: {
                    grid: { display: false },
                    ticks: { 
                        color: "#9ca3af",
                        maxRotation: 45,
                        minRotation: 45
                    }
                }
            }
        }
    });
    </script>
</body>
</html>';
        
        return $html;
    }
}