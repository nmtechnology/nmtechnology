<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorStat;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VisitorEmailNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Models\VisitorAction;

class MathVerificationController extends Controller
{
    public function verify(Request $request)
    {
        try {
            $ip = $request->ip();
            $location = 'Unknown';
            $userAgent = $request->header('User-Agent');
            $referer = $request->header('Referer');
            $attempts = $request->input('attempts', 1);
            $timeSpent = $request->input('time_spent', null);
            $answer = $request->input('answer');
            $correct = $request->input('correct');
            $mathStatus = $correct ? 'success' : 'failed';
            $visitType = $correct ? 'Entered site' : 'Failed verification';
            $landingPage = $request->input('landing_page', $referer ?? 'unknown');

            // Geo lookup
            $country = null;
            $geo = [];
            try {
                $geo = @json_decode(file_get_contents('http://ip-api.com/json/' . $ip), true);
                if (isset($geo['country']) && isset($geo['city'])) {
                    $location = $geo['city'] . ', ' . $geo['country'];
                    $country = $geo['country'];
                } elseif (isset($geo['country'])) {
                    $location = $geo['country'];
                    $country = $geo['country'];
                }
            } catch (\Exception $e) {}

            // Block any country or city not in the United States, and block any city from China
            if (empty($country) || strtolower(trim($country)) !== 'united states' || strtolower(trim($country)) === 'china') {
                \Log::info('Blocked non-US or China visitor', ['ip' => $ip, 'country' => $country, 'city' => $geo['city'] ?? null]);
                // Only notify ONCE per session for block event
                if (!session('visitor_notified')) {
                    Notification::route('mail', 'service@nmtis.com')
                        ->notify(new VisitorEmailNotification($ip, $location, 'blocked', $userAgent, $referer, 'Blocked', $timeSpent, $attempts, $landingPage));
                    session(['visitor_notified' => true]);
                }
                return response()->json([
                    'error' => 'Access restricted to US visitors.',
                    'us_only' => true
                ], 403);
            }

            $stat = VisitorStat::where('ip', $ip)->first();
            $now = now();
            $shouldNotify = false;
            if ($stat && $stat->locked_out_until && $now->lt($stat->locked_out_until)) {
                // Only notify ONCE per session for lockout event
                if (!session('visitor_notified')) {
                    Notification::route('mail', 'service@nmtis.com')
                        ->notify(new VisitorEmailNotification($ip, $location, 'locked_out', $userAgent, $referer, 'Blocked', $timeSpent, $attempts, $landingPage));
                    session(['visitor_notified' => true]);
                }
                return response()->json(['locked_out' => true], 403);
            }
            if (!$stat) {
                $stat = VisitorStat::create([
                    'ip' => $ip,
                    'location' => $location,
                    'visits' => 1,
                    'last_visited' => $now,
                    'locked_out_until' => null,
                    'user_agent' => $userAgent,
                    'referer' => $referer,
                    'time_spent' => $timeSpent,
                    'attempts' => $attempts,
                    'math_status' => $mathStatus,
                    'visit_type' => $visitType,
                    'landing_page' => $landingPage,
                ]);
            } else {
                $stat->visits += 1;
                $stat->location = $location;
                $stat->last_visited = $now;
                $stat->user_agent = $userAgent;
                $stat->referer = $referer;
                $stat->time_spent = $timeSpent;
                $stat->attempts = $attempts;
                $stat->math_status = $mathStatus;
                $stat->visit_type = $visitType;
                $stat->landing_page = $landingPage;
            }

            session(['math_attempts' => $attempts]);
            session(['math_time_spent' => $timeSpent]);
            session(['math_landing_page' => $landingPage]);

            // On successful math verification, start a new session log for this visitor
            if ($correct) {
                session(['visitor_verified' => true]);
                session(['visitor_log_start' => now()->toDateTimeString()]);
                session(['visitor_actions' => []]); // initialize actions array
            }

            // Only notify ONCE: on successful verification
            if ($correct && !session('visitor_notified')) {
                Notification::route('mail', 'service@nmtis.com')
                    ->notify(new VisitorEmailNotification($ip, $location, $mathStatus, $userAgent, $referer, $visitType, $timeSpent, $attempts, $landingPage));
                session(['visitor_notified' => true]);
            }
            // Lockout logic
            if (!$correct && $attempts >= 6 && (!$stat->locked_out_until || $now->gt($stat->locked_out_until))) {
                $stat->locked_out_until = $now->addHours(24);
                if (!session('visitor_notified')) {
                    Notification::route('mail', 'service@nmtis.com')
                        ->notify(new VisitorEmailNotification($ip, $location, 'locked_out', $userAgent, $referer, 'Blocked', $timeSpent, $attempts, $landingPage));
                    session(['visitor_notified' => true]);
                }
            }

            $stat->save();
            return response()->json(['success' => $correct, 'locked_out' => !$correct && $attempts >= 6]);
        } catch (\Throwable $e) {
            \Log::error('verify-math fatal error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine());
            return response()->json(['error' => 'Fatal error: ' . $e->getMessage()], 500);
        }
    }

    public function logAction(Request $request)
    {
        $ip = $request->ip();
        $page = $request->input('page');
        $details = $request->input('details', null);
        $timestamp = now();
        // Only log actions if visitor has verified
        if (session('visitor_verified')) {
            $stat = VisitorStat::where('ip', $ip)->first();
            $action = new \App\Models\VisitorAction([
                'visitor_stat_id' => $stat ? $stat->id : null,
                'ip' => $ip,
                'page' => $page,
                'timestamp' => $timestamp,
                'details' => $details,
            ]);
            $action->save();
            // Also store in session for individual report
            $actions = session('visitor_actions', []);
            $actions[] = [
                'page' => $page,
                'timestamp' => $timestamp->toDateTimeString(),
                'details' => $details,
            ];
            session(['visitor_actions' => $actions]);
        }
        return response()->json(['logged' => true]);
    }

    public function leftSite(Request $request)
    {
        $ip = $request->ip();
        $stat = VisitorStat::where('ip', $ip)->first();
        // Fetch all actions for this visitor from session (individual session report)
        $actions = session('visitor_actions', []);
        if (!session('visitor_notified')) {
            $location = $stat ? $stat->location : 'Unknown';
            $userAgent = $request->header('User-Agent');
            $referer = $request->header('Referer');
            $attempts = $stat ? $stat->attempts : null;
            $timeSpent = $stat ? $stat->time_spent : null;
            $landingPage = $stat ? $stat->landing_page : ($referer ?? 'unknown');
            Notification::route('mail', 'service@nmtis.com')
                ->notify(new VisitorEmailNotification($ip, $location, 'left', $userAgent, $referer, 'Left site', $timeSpent, $attempts, $landingPage, $actions));
            session(['visitor_notified' => true]);
        }
        // Clear session log for this visitor
        session()->forget(['visitor_verified', 'visitor_log_start', 'visitor_actions']);
        return response()->json(['notified' => true]);
    }

    public function sendTrafficReport()
    {
        $now = Carbon::now();
        $periods = [
            'Today' => $now->copy()->startOfDay(),
            '7 Days' => $now->copy()->subDays(7),
            '30 Days' => $now->copy()->subDays(30),
            '1 Year' => $now->copy()->subYear(),
        ];
        $reportHtml = '<html><head><style>' . $this->getReportStyles() . '</style></head><body>';
        $reportHtml .= '<div style="text-align:center;margin-bottom:2rem;"><img src="https://nmtechnology.net/images/nmtis-logo.png" alt="NM Technology Logo" style="height:60px;max-width:220px;display:inline-block;"></div>';
        $reportHtml .= '<h1 style="color:#10b981;font-size:2rem;text-align:center;margin-bottom:1rem;">NM Technology Visitor Traffic Report</h1>';

        // Daily chart data
        $dailyStats = VisitorStat::where('last_visited', '>=', $now->copy()->subDays(7))->get();
        $dailyCounts = [];
        for ($i = 0; $i < 7; $i++) {
            $date = $now->copy()->subDays($i)->format('Y-m-d');
            $dailyCounts[$date] = 0;
        }
        foreach ($dailyStats as $stat) {
            $date = Carbon::parse($stat->last_visited)->format('Y-m-d');
            if (isset($dailyCounts[$date])) {
                $dailyCounts[$date] += $stat->visits;
            }
        }
        $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">Daily Visits (Past 7 Days)</h2>';
        $reportHtml .= '<canvas id="dailyVisitsChart" style="width:100%;max-width:600px;height:300px;margin:0 auto 2rem auto;background:#222;border-radius:8px;"></canvas>';
        $reportHtml .= '<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>';
        $reportHtml .= '<script>const ctx = document.getElementById("dailyVisitsChart").getContext("2d");'
            . 'new Chart(ctx, {'
            . 'type: "bar",'
            . 'data: {labels: ' . json_encode(array_reverse(array_keys($dailyCounts))) . ', datasets: [{label: "Visits", data: ' . json_encode(array_reverse(array_values($dailyCounts))) . ', backgroundColor: "#10b981"}]},'
            . 'options: {scales: {y: {beginAtZero: true}}, plugins: {legend: {display: false}}}});'
            . '</script>';

        foreach ($periods as $label => $start) {
            $stats = VisitorStat::where('last_visited', '>=', $start)->get();
            $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">' . $label . '</h2>';
            $reportHtml .= '<table style="width:100%;border-collapse:collapse;margin-bottom:2rem;">';
            $reportHtml .= '<thead><tr style="background:#222;color:#10b981;">'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">IP</th>'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">Location</th>'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">Attempts</th>'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">Time Spent</th>'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">Math Status</th>'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">User Agent</th>'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">Referer</th>'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">Visit Type</th>'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">Landing Page</th>'
                . '<th style="padding:8px;border-bottom:1px solid #10b981;">Last Visited</th>'
                . '</tr></thead><tbody>';
            foreach ($stats as $stat) {
                $reportHtml .= '<tr style="background:#333;color:#fff;">'
                    . '<td style="padding:8px;">' . e($stat->ip) . '</td>'
                    . '<td style="padding:8px;">' . e($stat->location) . '</td>'
                    . '<td style="padding:8px;">' . e($stat->attempts) . '</td>'
                    . '<td style="padding:8px;">' . e($stat->time_spent) . 's</td>'
                    . '<td style="padding:8px;">' . e($stat->math_status) . '</td>'
                    . '<td style="padding:8px;">' . e($stat->user_agent) . '</td>'
                    . '<td style="padding:8px;">' . e($stat->referer) . '</td>'
                    . '<td style="padding:8px;">' . e($stat->visit_type) . '</td>'
                    . '<td style="padding:8px;">' . e($stat->landing_page) . '</td>'
                    . '<td style="padding:8px;">' . e($stat->last_visited) . '</td>'
                    . '</tr>';
            }
            $reportHtml .= '</tbody></table>';
        }
        $reportHtml .= '<div style="text-align:center;color:#10b981;font-size:1rem;margin-top:2rem;">&copy; ' . $now->year . ' NM Technology. All rights reserved.</div>';
        $reportHtml .= '</body></html>';
        Mail::raw([], function ($message) use ($reportHtml) {
            $message->to('service@nmtis.com')
                ->subject('NM Technology Visitor Traffic Report')
                ->setBody($reportHtml, 'text/html');
        });
        return response()->json(['sent' => true]);
    }

    public static function sendDailyTrafficReport()
    {
        $now = Carbon::now('America/Denver');
        $start = $now->copy()->startOfDay();
        $stats = VisitorStat::where('last_visited', '>=', $start)->get();
        $reportHtml = '<html><head><style>' . (new self)->getReportStyles() . '</style></head><body>';
        $reportHtml .= '<div style="text-align:center;margin-bottom:2rem;"><img src="https://nmtechnology.net/images/nmtis-logo.png" alt="NM Technology Logo" style="height:60px;max-width:220px;display:inline-block;"></div>';
        $reportHtml .= '<h1 style="color:#10b981;font-size:2rem;text-align:center;margin-bottom:1rem;">NM Technology Daily Visitor Report</h1>';
        $reportHtml .= '<h2 style="color:#fff;background:#10b981;padding:0.5rem 1rem;border-radius:8px;">Today</h2>';
        $reportHtml .= '<table style="width:100%;border-collapse:collapse;margin-bottom:2rem;">';
        $reportHtml .= '<thead><tr style="background:#222;color:#10b981;">'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">IP</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Location</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Attempts</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Time Spent</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Math Status</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">User Agent</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Referer</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Visit Type</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Landing Page</th>'
            . '<th style="padding:8px;border-bottom:1px solid #10b981;">Last Visited</th>'
            . '</tr></thead><tbody>';
        foreach ($stats as $stat) {
            $reportHtml .= '<tr style="background:#333;color:#fff;">'
                . '<td style="padding:8px;">' . e($stat->ip) . '</td>'
                . '<td style="padding:8px;">' . e($stat->location) . '</td>'
                . '<td style="padding:8px;">' . e($stat->attempts) . '</td>'
                . '<td style="padding:8px;">' . e($stat->time_spent) . 's</td>'
                . '<td style="padding:8px;">' . e($stat->math_status) . '</td>'
                . '<td style="padding:8px;">' . e($stat->user_agent) . '</td>'
                . '<td style="padding:8px;">' . e($stat->referer) . '</td>'
                . '<td style="padding:8px;">' . e($stat->visit_type) . '</td>'
                . '<td style="padding:8px;">' . e($stat->landing_page) . '</td>'
                . '<td style="padding:8px;">' . e($stat->last_visited) . '</td>'
                . '</tr>';
        }
        $reportHtml .= '</tbody></table>';
        $reportHtml .= '<div style="text-align:center;color:#10b981;font-size:1rem;margin-top:2rem;">&copy; ' . $now->year . ' NM Technology. All rights reserved.</div>';
        $reportHtml .= '</body></html>';
        Mail::raw([], function ($message) use ($reportHtml) {
            $message->to('service@nmtis.com')
                ->subject('NM Technology Daily Visitor Report')
                ->setBody($reportHtml, 'text/html');
        });
    }

    private function getReportStyles()
    {
        return 'body{background:#111;font-family:sans-serif;}h1,h2{font-family:sans-serif;}table{border-radius:8px;overflow:hidden;}th,td{border:none;}';
    }
}