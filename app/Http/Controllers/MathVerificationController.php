<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VisitorStat;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VisitorEmailNotification;

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
            $stat->locked_out_until = $now->addHours(24);
            $shouldNotify = true;
        }

        if ($shouldNotify) {
            Notification::route('mail', 'service@nmtis.com')
                ->notify(new VisitorEmailNotification($ip, $location, $mathStatus, $userAgent, $referer, $visitType, $timeSpent, $attempts, $landingPage));
        }
        $stat->save();
        return response()->json(['success' => $correct, 'locked_out' => !$correct && $attempts >= 6]);
    }
}