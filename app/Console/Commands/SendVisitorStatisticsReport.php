<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\VisitorStat;

class SendVisitorStatisticsReport extends Command
{
    protected $signature = 'visitor:send-statistics-report';
    protected $description = 'Send comprehensive visitor statistics report for 7, 15, and 30 days';

    public function handle()
    {
        $now = Carbon::now('America/Denver');
        
        $this->info('Generating comprehensive visitor statistics report...');
        
        // Get stats for different periods
        $stats7Days = $this->getStatsForPeriod(7);
        $stats15Days = $this->getStatsForPeriod(15);
        $stats30Days = $this->getStatsForPeriod(30);
        
        // Generate comparison data
        $comparisonData = $this->generateComparisonData($stats7Days, $stats15Days, $stats30Days);
        
        // Generate HTML report
        $reportHtml = $this->generateReportHtml($comparisonData, $now);
        
        // Send email
        Mail::send([], [], function ($message) use ($reportHtml, $now) {
            $message->to('service@nmtechnology.us')
                ->subject('Visitor Statistics Report - ' . $now->format('M d, Y'))
                ->html($reportHtml);
        });
        
        $this->info('Visitor statistics report sent successfully.');
        
        return 0;
    }
    
    private function getStatsForPeriod($days)
    {
        $startDate = Carbon::now('America/Denver')->subDays($days)->startOfDay();
        $endDate = Carbon::now('America/Denver')->endOfDay();
        
        $stats = VisitorStat::where('last_visited', '>=', $startDate)
                           ->where('last_visited', '<=', $endDate)
                           ->orderBy('last_visited', 'desc')
                           ->get();
        
        $uniqueVisitors = $stats->pluck('ip')->unique()->count();
        $totalVisits = $stats->sum('visits');
        
        // Get daily breakdown
        $dailyVisits = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::now('America/Denver')->subDays($i)->format('Y-m-d');
            $dailyVisits[$date] = 0;
        }
        
        foreach ($stats as $stat) {
            $date = Carbon::parse($stat->last_visited)->format('Y-m-d');
            if (isset($dailyVisits[$date])) {
                $dailyVisits[$date] += $stat->visits;
            }
        }
        
        // Top locations
        $topLocations = $stats->groupBy('location')
            ->map(function ($group) {
                return [
                    'location' => $group->first()->location ?: 'Unknown',
                    'count' => $group->count(),
                    'visits' => $group->sum('visits')
                ];
            })
            ->sortByDesc('visits')
            ->take(5)
            ->values()
            ->toArray();
        
        return [
            'stats' => $stats,
            'uniqueVisitors' => $uniqueVisitors,
            'totalVisits' => $totalVisits,
            'dailyVisits' => $dailyVisits,
            'topLocations' => $topLocations,
            'avgDailyVisits' => $days > 0 ? round($totalVisits / $days, 1) : 0
        ];
    }
    
    private function generateComparisonData($stats7Days, $stats15Days, $stats30Days)
    {
        return [
            '7_days' => $stats7Days,
            '15_days' => $stats15Days,
            '30_days' => $stats30Days
        ];
    }
    
    private function generateReportHtml($data, $now)
    {
        $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Statistics Report</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            background: linear-gradient(to bottom, #000000 0%, #111827 50%, #1f2937 100%);
            color: #ffffff;
            padding: 20px;
            line-height: 1.6;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: rgba(17, 24, 39, 0.9);
            border-radius: 16px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
            padding-bottom: 30px;
            border-bottom: 3px solid;
            border-image: linear-gradient(to right, #22c55e, #84cc16) 1;
        }
        .logo {
            height: 60px;
            max-width: 220px;
            margin-bottom: 20px;
        }
        h1 {
            font-size: 2.5rem;
            background: linear-gradient(to right, #22c55e, #84cc16);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 10px;
            font-weight: 800;
        }
        .subtitle {
            color: #9ca3af;
            font-size: 1.1rem;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        .stat-card {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(34, 197, 94, 0.2);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(34, 197, 94, 0.3);
        }
        .stat-period {
            display: inline-block;
            background: rgba(34, 197, 94, 0.1);
            color: #22c55e;
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-bottom: 15px;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }
        .stat-value {
            font-size: 3rem;
            font-weight: 800;
            background: linear-gradient(to right, #22c55e, #84cc16);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin: 15px 0;
        }
        .stat-label {
            color: #9ca3af;
            font-size: 1rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-weight: 500;
        }
        .stat-sublabel {
            color: #6b7280;
            font-size: 0.9rem;
            margin-top: 8px;
        }
        .chart-section {
            margin: 40px 0;
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            border-radius: 12px;
            padding: 30px;
            border: 1px solid rgba(34, 197, 94, 0.2);
        }
        .chart-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            color: #22c55e;
            font-weight: 700;
        }
        .chart-container {
            position: relative;
            height: 350px;
            margin-bottom: 20px;
        }
        .locations-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 8px;
        }
        .locations-table thead {
            background: linear-gradient(to right, #22c55e, #16a34a);
        }
        .locations-table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #ffffff;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .locations-table td {
            padding: 12px 15px;
            background: rgba(31, 41, 55, 0.5);
            border-bottom: 1px solid rgba(34, 197, 94, 0.1);
        }
        .locations-table tbody tr:hover {
            background: rgba(34, 197, 94, 0.1);
        }
        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.85rem;
            font-weight: 600;
        }
        .badge-primary {
            background: rgba(34, 197, 94, 0.2);
            color: #22c55e;
            border: 1px solid rgba(34, 197, 94, 0.3);
        }
        .footer {
            text-align: center;
            margin-top: 50px;
            padding-top: 30px;
            border-top: 1px solid rgba(34, 197, 94, 0.2);
            color: #6b7280;
            font-size: 0.9rem;
        }
        .gradient-divider {
            height: 3px;
            background: linear-gradient(to right, #22c55e, #84cc16);
            border-radius: 2px;
            margin: 30px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://nmtechnology.us/images/nmtis-logo.png" alt="NM Technology Logo" class="logo">
            <h1>📊 Visitor Statistics Report</h1>
            <p class="subtitle">Comprehensive Analytics for ' . $now->format('F d, Y') . '</p>
        </div>';

        // Summary Stats Grid
        $html .= '<div class="stats-grid">';
        
        foreach (['7_days' => '7 Days', '15_days' => '15 Days', '30_days' => '30 Days'] as $key => $label) {
            $stats = $data[$key];
            $html .= '
            <div class="stat-card">
                <span class="stat-period">' . $label . '</span>
                <div class="stat-value">' . number_format($stats['totalVisits']) . '</div>
                <div class="stat-label">Total Visits</div>
                <div class="stat-sublabel">
                    ' . number_format($stats['uniqueVisitors']) . ' unique visitors<br>
                    ' . $stats['avgDailyVisits'] . ' avg daily visits
                </div>
            </div>';
        }
        
        $html .= '</div>';
        
        $html .= '<div class="gradient-divider"></div>';

        // Charts for each period
        foreach (['7_days' => ['7 Days', '#22c55e'], '15_days' => ['15 Days', '#16a34a'], '30_days' => ['30 Days', '#84cc16']] as $key => $config) {
            list($label, $color) = $config;
            $stats = $data[$key];
            
            $chartId = 'chart_' . $key;
            $labels = array_keys($stats['dailyVisits']);
            $values = array_values($stats['dailyVisits']);
            
            // Format labels for better display
            $formattedLabels = array_map(function($date) {
                return Carbon::parse($date)->format('M d');
            }, $labels);
            
            $html .= '
            <div class="chart-section">
                <h2 class="chart-title">📈 ' . $label . ' Traffic Trend</h2>
                <div class="chart-container">
                    <canvas id="' . $chartId . '"></canvas>
                </div>
                
                <h3 class="chart-title" style="font-size: 1.2rem; margin-top: 30px;">🌍 Top Locations</h3>
                <table class="locations-table">
                    <thead>
                        <tr>
                            <th>Location</th>
                            <th>Unique Visitors</th>
                            <th>Total Visits</th>
                        </tr>
                    </thead>
                    <tbody>';
            
            foreach ($stats['topLocations'] as $location) {
                $html .= '
                        <tr>
                            <td><span class="badge badge-primary">' . htmlspecialchars($location['location']) . '</span></td>
                            <td>' . $location['count'] . '</td>
                            <td><strong>' . $location['visits'] . '</strong></td>
                        </tr>';
            }
            
            $html .= '
                    </tbody>
                </table>
            </div>';
            
            // Chart script
            $html .= "
            <script>
            (function() {
                const ctx = document.getElementById('{$chartId}').getContext('2d');
                new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: " . json_encode($formattedLabels) . ",
                        datasets: [{
                            label: 'Daily Visits',
                            data: " . json_encode($values) . ",
                            borderColor: '{$color}',
                            backgroundColor: '{$color}33',
                            borderWidth: 3,
                            fill: true,
                            tension: 0.4,
                            pointRadius: 5,
                            pointHoverRadius: 7,
                            pointBackgroundColor: '{$color}',
                            pointBorderColor: '#ffffff',
                            pointBorderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleColor: '{$color}',
                                bodyColor: '#ffffff',
                                borderColor: '{$color}',
                                borderWidth: 1
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: 'rgba(34, 197, 94, 0.1)',
                                    drawBorder: false
                                },
                                ticks: {
                                    color: '#9ca3af',
                                    font: {
                                        size: 12
                                    }
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#9ca3af',
                                    font: {
                                        size: 11
                                    },
                                    maxRotation: 45,
                                    minRotation: 45
                                }
                            }
                        }
                    }
                });
            })();
            </script>";
        }

        $html .= '
        <div class="footer">
            <p>&copy; ' . $now->year . ' NM Technology. All rights reserved.</p>
            <p style="margin-top: 10px;">Generated automatically on ' . $now->format('F d, Y \a\t g:i A T') . '</p>
        </div>
    </div>
</body>
</html>';
        
        return $html;
    }
}
