<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\VisitorStat;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class VisitorReportService
{
    /**
     * Generate an inline SVG bar chart (email-compatible)
     */
    public static function generateBarChartSVG($data, $labels, $title = '', $width = 600, $height = 250)
    {
        if (empty($data) || max($data) == 0) {
            return '<div style="text-align:center;padding:40px;color:#888;">No data available</div>';
        }

        $maxValue = max($data) ?: 1;
        $barCount = count($data);
        $barWidth = max(30, ($width - 80) / $barCount - 10);
        $chartHeight = $height - 60;
        
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' . $width . '" height="' . $height . '" viewBox="0 0 ' . $width . ' ' . $height . '">';
        
        // Background
        $svg .= '<rect x="0" y="0" width="' . $width . '" height="' . $height . '" fill="#1a1a1a" rx="8"/>';
        
        // Title
        if ($title) {
            $svg .= '<text x="' . ($width / 2) . '" y="25" fill="#10b981" font-size="14" font-weight="bold" text-anchor="middle">' . htmlspecialchars($title) . '</text>';
        }
        
        // Grid lines
        for ($i = 0; $i <= 4; $i++) {
            $y = 45 + ($chartHeight * $i / 4);
            $svg .= '<line x1="50" y1="' . $y . '" x2="' . ($width - 20) . '" y2="' . $y . '" stroke="#333" stroke-width="1"/>';
            $gridValue = round($maxValue * (4 - $i) / 4);
            $svg .= '<text x="45" y="' . ($y + 4) . '" fill="#888" font-size="10" text-anchor="end">' . $gridValue . '</text>';
        }
        
        // Bars
        $x = 60;
        foreach ($data as $i => $value) {
            $barHeight = ($value / $maxValue) * $chartHeight;
            $y = 45 + $chartHeight - $barHeight;
            
            // Gradient bar
            $svg .= '<defs><linearGradient id="barGrad' . $i . '" x1="0%" y1="0%" x2="0%" y2="100%">';
            $svg .= '<stop offset="0%" style="stop-color:#22c55e;stop-opacity:1"/>';
            $svg .= '<stop offset="100%" style="stop-color:#15803d;stop-opacity:1"/>';
            $svg .= '</linearGradient></defs>';
            
            $svg .= '<rect x="' . $x . '" y="' . $y . '" width="' . $barWidth . '" height="' . $barHeight . '" fill="url(#barGrad' . $i . ')" rx="4"/>';
            
            // Value on top of bar
            if ($value > 0) {
                $svg .= '<text x="' . ($x + $barWidth / 2) . '" y="' . ($y - 5) . '" fill="#10b981" font-size="11" font-weight="bold" text-anchor="middle">' . $value . '</text>';
            }
            
            // Label below
            $label = isset($labels[$i]) ? $labels[$i] : '';
            $svg .= '<text x="' . ($x + $barWidth / 2) . '" y="' . ($height - 10) . '" fill="#aaa" font-size="9" text-anchor="middle" transform="rotate(-45 ' . ($x + $barWidth / 2) . ' ' . ($height - 10) . ')">' . htmlspecialchars($label) . '</text>';
            
            $x += $barWidth + 10;
        }
        
        $svg .= '</svg>';
        return $svg;
    }

    /**
     * Generate an inline SVG donut/pie chart (email-compatible)
     */
    public static function generateDonutChartSVG($data, $labels, $title = '', $size = 200)
    {
        if (empty($data) || array_sum($data) == 0) {
            return '<div style="text-align:center;padding:40px;color:#888;">No data available</div>';
        }

        $colors = ['#22c55e', '#84cc16', '#eab308', '#f97316', '#ef4444', '#8b5cf6', '#06b6d4', '#ec4899'];
        $total = array_sum($data);
        $centerX = $size / 2;
        $centerY = $size / 2;
        $radius = ($size / 2) - 20;
        $innerRadius = $radius * 0.6;
        
        $svg = '<svg xmlns="http://www.w3.org/2000/svg" width="' . ($size + 150) . '" height="' . $size . '" viewBox="0 0 ' . ($size + 150) . ' ' . $size . '">';
        $svg .= '<rect x="0" y="0" width="' . ($size + 150) . '" height="' . $size . '" fill="#1a1a1a" rx="8"/>';
        
        $startAngle = -90;
        foreach ($data as $i => $value) {
            if ($value <= 0) continue;
            
            $percentage = ($value / $total) * 100;
            $angle = ($value / $total) * 360;
            $endAngle = $startAngle + $angle;
            
            $x1 = $centerX + $radius * cos(deg2rad($startAngle));
            $y1 = $centerY + $radius * sin(deg2rad($startAngle));
            $x2 = $centerX + $radius * cos(deg2rad($endAngle));
            $y2 = $centerY + $radius * sin(deg2rad($endAngle));
            
            $x1Inner = $centerX + $innerRadius * cos(deg2rad($startAngle));
            $y1Inner = $centerY + $innerRadius * sin(deg2rad($startAngle));
            $x2Inner = $centerX + $innerRadius * cos(deg2rad($endAngle));
            $y2Inner = $centerY + $innerRadius * sin(deg2rad($endAngle));
            
            $largeArc = $angle > 180 ? 1 : 0;
            $color = $colors[$i % count($colors)];
            
            $svg .= '<path d="M ' . $x1 . ' ' . $y1 . ' A ' . $radius . ' ' . $radius . ' 0 ' . $largeArc . ' 1 ' . $x2 . ' ' . $y2 . ' L ' . $x2Inner . ' ' . $y2Inner . ' A ' . $innerRadius . ' ' . $innerRadius . ' 0 ' . $largeArc . ' 0 ' . $x1Inner . ' ' . $y1Inner . ' Z" fill="' . $color . '"/>';
            
            $startAngle = $endAngle;
        }
        
        // Center text
        $svg .= '<text x="' . $centerX . '" y="' . ($centerY - 5) . '" fill="#fff" font-size="20" font-weight="bold" text-anchor="middle">' . $total . '</text>';
        $svg .= '<text x="' . $centerX . '" y="' . ($centerY + 15) . '" fill="#888" font-size="11" text-anchor="middle">Total</text>';
        
        // Legend
        $legendX = $size + 10;
        $legendY = 30;
        foreach ($data as $i => $value) {
            if ($value <= 0) continue;
            $color = $colors[$i % count($colors)];
            $label = isset($labels[$i]) ? $labels[$i] : 'Unknown';
            $percentage = round(($value / $total) * 100, 1);
            
            $svg .= '<rect x="' . $legendX . '" y="' . $legendY . '" width="12" height="12" fill="' . $color . '" rx="2"/>';
            $svg .= '<text x="' . ($legendX + 18) . '" y="' . ($legendY + 10) . '" fill="#ccc" font-size="10">' . htmlspecialchars(substr($label, 0, 15)) . ' (' . $percentage . '%)</text>';
            $legendY += 20;
        }
        
        $svg .= '</svg>';
        return $svg;
    }

    /**
     * Generate stat card HTML
     */
    public static function generateStatCard($label, $value, $icon = '📊', $color = '#10b981')
    {
        return '
        <div style="background:linear-gradient(135deg, #1f2937, #111827);border-radius:12px;padding:20px;border:1px solid rgba(34,197,94,0.2);text-align:center;min-width:140px;">
            <div style="font-size:24px;margin-bottom:8px;">' . $icon . '</div>
            <div style="font-size:28px;font-weight:800;color:' . $color . ';margin-bottom:4px;">' . $value . '</div>
            <div style="font-size:12px;color:#9ca3af;text-transform:uppercase;letter-spacing:1px;">' . $label . '</div>
        </div>';
    }

    /**
     * Send Daily Report
     */
    public static function sendDailyReport()
    {
        try {
            $now = Carbon::now('America/Denver');
            $start = $now->copy()->startOfDay();
            $end = $now->copy()->endOfDay();
            
            $stats = VisitorStat::where('last_visited', '>=', $start)
                               ->where('last_visited', '<=', $end)
                               ->orderBy('last_visited', 'desc')
                               ->get();
            
            $uniqueVisitors = $stats->pluck('ip')->unique()->count();
            $totalVisits = $stats->sum('visits');
            $successfulVerifications = $stats->where('math_status', 'success')->count();
            $failedVerifications = $stats->where('math_status', 'failed')->count();
            $blockedVisitors = $stats->whereIn('math_status', ['blocked', 'locked_out'])->count();
            
            // Hourly breakdown
            $hourlyData = array_fill(0, 24, 0);
            $hourlyLabels = [];
            for ($i = 0; $i < 24; $i++) {
                $hourlyLabels[] = sprintf('%02d:00', $i);
            }
            foreach ($stats as $stat) {
                $hour = Carbon::parse($stat->last_visited)->hour;
                $hourlyData[$hour] += $stat->visits;
            }
            
            // Top locations
            $topLocations = $stats->groupBy('location')
                ->map(fn($g) => $g->count())
                ->sortDesc()
                ->take(5)
                ->toArray();
            
            // Device breakdown
            $deviceBreakdown = [
                'Desktop' => 0,
                'Mobile' => 0,
                'Tablet' => 0,
                'Other' => 0
            ];
            foreach ($stats as $stat) {
                $ua = strtolower($stat->user_agent ?? '');
                if (preg_match('/(iphone|android.*mobile|mobile)/i', $ua)) {
                    $deviceBreakdown['Mobile']++;
                } elseif (preg_match('/(ipad|tablet|android(?!.*mobile))/i', $ua)) {
                    $deviceBreakdown['Tablet']++;
                } elseif (!empty($ua)) {
                    $deviceBreakdown['Desktop']++;
                } else {
                    $deviceBreakdown['Other']++;
                }
            }
            
            $reportHtml = self::buildReportHtml([
                'type' => 'Daily',
                'date' => $now->format('l, F j, Y'),
                'uniqueVisitors' => $uniqueVisitors,
                'totalVisits' => $totalVisits,
                'successfulVerifications' => $successfulVerifications,
                'failedVerifications' => $failedVerifications,
                'blockedVisitors' => $blockedVisitors,
                'chartData' => $hourlyData,
                'chartLabels' => $hourlyLabels,
                'chartTitle' => 'Visits by Hour',
                'topLocations' => $topLocations,
                'deviceBreakdown' => $deviceBreakdown,
                'stats' => $stats,
            ]);
            
            Mail::send([], [], function ($message) use ($reportHtml, $now) {
                $message->to('service@nmtechnology.us')
                    ->subject('📊 Daily Visitor Report - ' . $now->format('M j, Y'))
                    ->html($reportHtml);
            });
            
            Log::info('Daily visitor report sent successfully');
            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send daily report: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send Weekly Report
     */
    public static function sendWeeklyReport()
    {
        try {
            $now = Carbon::now('America/Denver');
            $start = $now->copy()->subDays(7)->startOfDay();
            $end = $now->copy()->endOfDay();
            
            $stats = VisitorStat::where('last_visited', '>=', $start)
                               ->where('last_visited', '<=', $end)
                               ->orderBy('last_visited', 'desc')
                               ->get();
            
            $uniqueVisitors = $stats->pluck('ip')->unique()->count();
            $totalVisits = $stats->sum('visits');
            $successfulVerifications = $stats->where('math_status', 'success')->count();
            $failedVerifications = $stats->where('math_status', 'failed')->count();
            $blockedVisitors = $stats->whereIn('math_status', ['blocked', 'locked_out'])->count();
            
            // Daily breakdown for the week
            $dailyData = [];
            $dailyLabels = [];
            for ($i = 6; $i >= 0; $i--) {
                $date = $now->copy()->subDays($i);
                $dailyLabels[] = $date->format('D');
                $dailyData[] = $stats->filter(function ($stat) use ($date) {
                    return Carbon::parse($stat->last_visited)->isSameDay($date);
                })->sum('visits');
            }
            
            // Top locations
            $topLocations = $stats->groupBy('location')
                ->map(fn($g) => $g->count())
                ->sortDesc()
                ->take(5)
                ->toArray();
            
            // Device breakdown
            $deviceBreakdown = self::calculateDeviceBreakdown($stats);
            
            // Browser breakdown
            $browserBreakdown = self::calculateBrowserBreakdown($stats);
            
            $reportHtml = self::buildReportHtml([
                'type' => 'Weekly',
                'date' => $start->format('M j') . ' - ' . $end->format('M j, Y'),
                'uniqueVisitors' => $uniqueVisitors,
                'totalVisits' => $totalVisits,
                'avgDaily' => round($totalVisits / 7, 1),
                'successfulVerifications' => $successfulVerifications,
                'failedVerifications' => $failedVerifications,
                'blockedVisitors' => $blockedVisitors,
                'chartData' => $dailyData,
                'chartLabels' => $dailyLabels,
                'chartTitle' => 'Visits by Day',
                'topLocations' => $topLocations,
                'deviceBreakdown' => $deviceBreakdown,
                'browserBreakdown' => $browserBreakdown,
                'stats' => $stats,
            ]);
            
            Mail::send([], [], function ($message) use ($reportHtml, $now) {
                $message->to('service@nmtechnology.us')
                    ->subject('📈 Weekly Visitor Report - Week of ' . $now->copy()->subDays(7)->format('M j'))
                    ->html($reportHtml);
            });
            
            Log::info('Weekly visitor report sent successfully');
            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send weekly report: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send Monthly Report
     */
    public static function sendMonthlyReport()
    {
        try {
            $now = Carbon::now('America/Denver');
            $start = $now->copy()->subMonth()->startOfMonth();
            $end = $now->copy()->subMonth()->endOfMonth();
            $monthName = $start->format('F Y');
            
            $stats = VisitorStat::where('last_visited', '>=', $start)
                               ->where('last_visited', '<=', $end)
                               ->orderBy('last_visited', 'desc')
                               ->get();
            
            $daysInMonth = $start->daysInMonth;
            $uniqueVisitors = $stats->pluck('ip')->unique()->count();
            $totalVisits = $stats->sum('visits');
            $successfulVerifications = $stats->where('math_status', 'success')->count();
            $failedVerifications = $stats->where('math_status', 'failed')->count();
            $blockedVisitors = $stats->whereIn('math_status', ['blocked', 'locked_out'])->count();
            
            // Weekly breakdown for the month
            $weeklyData = [];
            $weeklyLabels = [];
            $currentWeekStart = $start->copy();
            $weekNum = 1;
            
            while ($currentWeekStart->lte($end)) {
                $weekEnd = $currentWeekStart->copy()->addDays(6);
                if ($weekEnd->gt($end)) $weekEnd = $end->copy();
                
                $weeklyLabels[] = 'Week ' . $weekNum;
                $weeklyData[] = $stats->filter(function ($stat) use ($currentWeekStart, $weekEnd) {
                    $visitDate = Carbon::parse($stat->last_visited);
                    return $visitDate->gte($currentWeekStart) && $visitDate->lte($weekEnd);
                })->sum('visits');
                
                $currentWeekStart = $currentWeekStart->addDays(7);
                $weekNum++;
            }
            
            // Top locations
            $topLocations = $stats->groupBy('location')
                ->map(fn($g) => $g->count())
                ->sortDesc()
                ->take(10)
                ->toArray();
            
            // Device breakdown
            $deviceBreakdown = self::calculateDeviceBreakdown($stats);
            
            // Browser breakdown
            $browserBreakdown = self::calculateBrowserBreakdown($stats);
            
            // Verification success rate
            $totalVerifications = $successfulVerifications + $failedVerifications;
            $successRate = $totalVerifications > 0 ? round(($successfulVerifications / $totalVerifications) * 100, 1) : 0;
            
            $reportHtml = self::buildReportHtml([
                'type' => 'Monthly',
                'date' => $monthName,
                'uniqueVisitors' => $uniqueVisitors,
                'totalVisits' => $totalVisits,
                'avgDaily' => round($totalVisits / $daysInMonth, 1),
                'successfulVerifications' => $successfulVerifications,
                'failedVerifications' => $failedVerifications,
                'blockedVisitors' => $blockedVisitors,
                'successRate' => $successRate,
                'chartData' => $weeklyData,
                'chartLabels' => $weeklyLabels,
                'chartTitle' => 'Visits by Week',
                'topLocations' => $topLocations,
                'deviceBreakdown' => $deviceBreakdown,
                'browserBreakdown' => $browserBreakdown,
                'stats' => $stats,
                'showDetailedTable' => false, // Too many records for monthly
            ]);
            
            Mail::send([], [], function ($message) use ($reportHtml, $monthName) {
                $message->to('service@nmtechnology.us')
                    ->subject('📅 Monthly Visitor Report - ' . $monthName)
                    ->html($reportHtml);
            });
            
            Log::info('Monthly visitor report sent successfully');
            return true;
        } catch (\Exception $e) {
            Log::error('Failed to send monthly report: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Calculate device breakdown from stats
     */
    private static function calculateDeviceBreakdown($stats)
    {
        $breakdown = ['Desktop' => 0, 'Mobile' => 0, 'Tablet' => 0];
        
        foreach ($stats as $stat) {
            $ua = strtolower($stat->user_agent ?? '');
            if (preg_match('/(iphone|android.*mobile|mobile|webos|blackberry)/i', $ua)) {
                $breakdown['Mobile']++;
            } elseif (preg_match('/(ipad|tablet|android(?!.*mobile))/i', $ua)) {
                $breakdown['Tablet']++;
            } else {
                $breakdown['Desktop']++;
            }
        }
        
        return $breakdown;
    }

    /**
     * Calculate browser breakdown from stats
     */
    private static function calculateBrowserBreakdown($stats)
    {
        $breakdown = ['Chrome' => 0, 'Safari' => 0, 'Firefox' => 0, 'Edge' => 0, 'Other' => 0];
        
        foreach ($stats as $stat) {
            $ua = $stat->user_agent ?? '';
            if (preg_match('/Edg\//i', $ua)) {
                $breakdown['Edge']++;
            } elseif (preg_match('/Chrome\//i', $ua) && !preg_match('/Edg\//i', $ua)) {
                $breakdown['Chrome']++;
            } elseif (preg_match('/Safari\//i', $ua) && !preg_match('/Chrome\//i', $ua)) {
                $breakdown['Safari']++;
            } elseif (preg_match('/Firefox\//i', $ua)) {
                $breakdown['Firefox']++;
            } else {
                $breakdown['Other']++;
            }
        }
        
        return $breakdown;
    }

    /**
     * Build the complete HTML report
     */
    private static function buildReportHtml($data)
    {
        $type = $data['type'];
        $date = $data['date'];
        $showDetailedTable = $data['showDetailedTable'] ?? true;
        
        $html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>' . $type . ' Visitor Report</title>
</head>
<body style="margin:0;padding:0;background:#111;font-family:-apple-system,BlinkMacSystemFont,\'Segoe UI\',Roboto,sans-serif;">
<div style="max-width:800px;margin:0 auto;padding:20px;">
    
    <!-- Header -->
    <div style="text-align:center;padding:30px 20px;background:linear-gradient(135deg,#1a1a1a,#111);border-radius:16px 16px 0 0;border-bottom:3px solid #10b981;">
        <div style="margin-bottom:15px;">
            <span style="font-size:40px;">📊</span>
        </div>
        <h1 style="margin:0;font-size:28px;background:linear-gradient(to right,#22c55e,#84cc16);-webkit-background-clip:text;-webkit-text-fill-color:transparent;background-clip:text;font-weight:800;">
            ' . $type . ' Visitor Report
        </h1>
        <p style="margin:10px 0 0;color:#9ca3af;font-size:14px;">' . $date . '</p>
    </div>
    
    <!-- Stats Cards -->
    <div style="background:#1a1a1a;padding:25px;">
        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="padding:8px;text-align:center;">' . self::generateStatCard('Unique Visitors', $data['uniqueVisitors'], '👥', '#22c55e') . '</td>
                <td style="padding:8px;text-align:center;">' . self::generateStatCard('Total Visits', $data['totalVisits'], '📈', '#84cc16') . '</td>
                <td style="padding:8px;text-align:center;">' . self::generateStatCard('Verified', $data['successfulVerifications'], '✅', '#10b981') . '</td>
                <td style="padding:8px;text-align:center;">' . self::generateStatCard('Blocked', $data['blockedVisitors'], '🚫', '#ef4444') . '</td>
            </tr>
        </table>';
        
        if (isset($data['avgDaily'])) {
            $html .= '
        <div style="text-align:center;margin-top:15px;padding:15px;background:#111;border-radius:8px;">
            <span style="color:#9ca3af;">Average Daily: </span>
            <span style="color:#22c55e;font-weight:bold;font-size:18px;">' . $data['avgDaily'] . ' visits</span>
        </div>';
        }
        
        if (isset($data['successRate'])) {
            $html .= '
        <div style="text-align:center;margin-top:10px;">
            <span style="color:#9ca3af;">Verification Success Rate: </span>
            <span style="color:#22c55e;font-weight:bold;">' . $data['successRate'] . '%</span>
        </div>';
        }
        
        $html .= '
    </div>
    
    <!-- Main Chart -->
    <div style="background:#1a1a1a;padding:25px;border-top:1px solid #333;">
        <h2 style="color:#22c55e;font-size:18px;margin:0 0 20px;text-align:center;">📈 ' . ($data['chartTitle'] ?? 'Traffic Overview') . '</h2>
        <div style="text-align:center;">
            ' . self::generateBarChartSVG($data['chartData'], $data['chartLabels'], '', 700, 250) . '
        </div>
    </div>
    
    <!-- Two Column Section: Locations & Devices -->
    <div style="background:#1a1a1a;padding:25px;border-top:1px solid #333;">
        <table style="width:100%;border-collapse:collapse;">
            <tr>
                <td style="width:50%;vertical-align:top;padding-right:15px;">
                    <h3 style="color:#22c55e;font-size:16px;margin:0 0 15px;">📍 Top Locations</h3>';
        
        if (!empty($data['topLocations'])) {
            $html .= '<table style="width:100%;border-collapse:collapse;">';
            $rank = 1;
            foreach ($data['topLocations'] as $location => $count) {
                $html .= '<tr style="border-bottom:1px solid #333;">
                    <td style="padding:8px;color:#888;width:30px;">#' . $rank . '</td>
                    <td style="padding:8px;color:#fff;">' . htmlspecialchars($location ?: 'Unknown') . '</td>
                    <td style="padding:8px;color:#22c55e;text-align:right;font-weight:bold;">' . $count . '</td>
                </tr>';
                $rank++;
            }
            $html .= '</table>';
        } else {
            $html .= '<p style="color:#888;">No location data</p>';
        }
        
        $html .= '
                </td>
                <td style="width:50%;vertical-align:top;padding-left:15px;border-left:1px solid #333;">
                    <h3 style="color:#22c55e;font-size:16px;margin:0 0 15px;">📱 Devices</h3>
                    <div style="text-align:center;">
                        ' . self::generateDonutChartSVG(
                            array_values($data['deviceBreakdown']),
                            array_keys($data['deviceBreakdown']),
                            '',
                            160
                        ) . '
                    </div>
                </td>
            </tr>
        </table>
    </div>';
        
        // Browser breakdown if available
        if (isset($data['browserBreakdown'])) {
            $html .= '
    <div style="background:#1a1a1a;padding:25px;border-top:1px solid #333;">
        <h3 style="color:#22c55e;font-size:16px;margin:0 0 15px;text-align:center;">🌐 Browsers</h3>
        <div style="text-align:center;">
            ' . self::generateBarChartSVG(
                array_values($data['browserBreakdown']),
                array_keys($data['browserBreakdown']),
                '',
                500,
                180
            ) . '
        </div>
    </div>';
        }
        
        // Detailed visitor table (for daily/weekly only)
        if ($showDetailedTable && $data['stats']->count() > 0 && $data['stats']->count() <= 50) {
            $html .= '
    <div style="background:#1a1a1a;padding:25px;border-top:1px solid #333;">
        <h3 style="color:#22c55e;font-size:16px;margin:0 0 15px;">📋 Visitor Details</h3>
        <div style="overflow-x:auto;">
            <table style="width:100%;border-collapse:collapse;font-size:12px;">
                <thead>
                    <tr style="background:#111;">
                        <th style="padding:10px;color:#22c55e;text-align:left;border-bottom:2px solid #22c55e;">IP</th>
                        <th style="padding:10px;color:#22c55e;text-align:left;border-bottom:2px solid #22c55e;">Location</th>
                        <th style="padding:10px;color:#22c55e;text-align:left;border-bottom:2px solid #22c55e;">Status</th>
                        <th style="padding:10px;color:#22c55e;text-align:left;border-bottom:2px solid #22c55e;">Time</th>
                        <th style="padding:10px;color:#22c55e;text-align:left;border-bottom:2px solid #22c55e;">Visited</th>
                    </tr>
                </thead>
                <tbody>';
            
            foreach ($data['stats']->take(30) as $stat) {
                $statusColor = $stat->math_status === 'success' ? '#22c55e' : ($stat->math_status === 'failed' ? '#eab308' : '#ef4444');
                $html .= '
                    <tr style="border-bottom:1px solid #333;">
                        <td style="padding:8px;color:#fff;font-family:monospace;">' . htmlspecialchars($stat->ip) . '</td>
                        <td style="padding:8px;color:#ccc;">' . htmlspecialchars($stat->location ?: 'Unknown') . '</td>
                        <td style="padding:8px;"><span style="color:' . $statusColor . ';font-weight:bold;">' . strtoupper($stat->math_status ?: 'N/A') . '</span></td>
                        <td style="padding:8px;color:#888;">' . ($stat->time_spent ? $stat->time_spent . 's' : 'N/A') . '</td>
                        <td style="padding:8px;color:#888;">' . Carbon::parse($stat->last_visited)->format('M j, g:ia') . '</td>
                    </tr>';
            }
            
            $html .= '
                </tbody>
            </table>
        </div>';
            
            if ($data['stats']->count() > 30) {
                $html .= '<p style="color:#888;font-size:11px;margin-top:10px;text-align:center;">Showing 30 of ' . $data['stats']->count() . ' visitors</p>';
            }
            
            $html .= '
    </div>';
        }
        
        // Footer
        $html .= '
    <div style="background:#111;padding:20px;border-radius:0 0 16px 16px;text-align:center;border-top:1px solid #333;">
        <p style="color:#22c55e;font-size:12px;margin:0;">© ' . date('Y') . ' NM Technology. All rights reserved.</p>
        <p style="color:#666;font-size:11px;margin:5px 0 0;">This is an automated report. Do not reply to this email.</p>
    </div>
    
</div>
</body>
</html>';
        
        return $html;
    }
}
