<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorStat;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VisitorEmailNotification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class MathVerificationController extends Controller
{
    public function verify(Request $request)
    {
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
            // Log the blocked IP and country for debugging
            \Log::info('Blocked non-US or China visitor', ['ip' => $ip, 'country' => $country, 'city' => $geo['city'] ?? null]);
            return response()->json([
                'error' => 'Access restricted to US visitors.',
                'us_only' => true
            ], 403);
        }

        // Only collect stats and notify for landing page verification
        $stat = VisitorStat::where('ip', $ip)->first();
        $now = now();
        $shouldNotify = false;
        // Only notify if math verification is completed (success or lockout)
        if ($stat && $stat->locked_out_until && $now->lt($stat->locked_out_until)) {
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

        // Only notify ONCE: on successful verification, or on first lockout
        if ($correct) {
            $shouldNotify = true;
        } else if (!$correct && $attempts >= 6 && (!$stat->locked_out_until || $now->gt($stat->locked_out_until))) {
            // Only notify if lockout is being set now
            if (!$stat->locked_out_until || $now->gt($stat->locked_out_until)) {
                $stat->locked_out_until = $now->addHours(24);
                $shouldNotify = true;
            } else {
                $shouldNotify = false;
            }
        } else {
            $shouldNotify = false;
        }

        if ($shouldNotify) {
            Notification::route('mail', 'service@nmtis.com')
                ->notify(new VisitorEmailNotification($ip, $location, $mathStatus, $userAgent, $referer, $visitType, $timeSpent, $attempts, $landingPage));
        }
        $stat->save();
        return response()->json(['success' => $correct, 'locked_out' => !$correct && $attempts >= 6]);
    }

    public function sendTrafficReport()
    {
        $now = Carbon::now();
        $periods = [
            '7 Days' => $now->copy()->subDays(7),
            '30 Days' => $now->copy()->subDays(30),
            '1 Year' => $now->copy()->subYear(),
        ];
        $reportHtml = '<html><head><style>' . $this->getReportStyles() . '</style></head><body>';
        $reportHtml .= '<h1 style="color:#10b981;font-size:2rem;text-align:center;margin-bottom:1rem;">NM Technology Visitor Traffic Report</h1>';
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

    private function getReportStyles()
    {
        return 'body{background:#111;font-family:sans-serif;}h1,h2{font-family:sans-serif;}table{border-radius:8px;overflow:hidden;}th,td{border:none;}';
    }
}