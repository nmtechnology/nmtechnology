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

        // Block non-US IPs
        if ($country !== 'United States') {
            return response()->json([
                'error' => 'Access restricted to US visitors.',
                'us_only' => true
            ], 403);
        }

        // Only collect stats and notify for landing page verification
        // This endpoint is only called from LandingPage.vue, so no need to check route
        $stat = VisitorStat::where('ip', $ip)->first();
        $now = now();
        $shouldNotify = false;
        if ($stat && $stat->locked_out_until && $now->lt($stat->locked_out_until)) {
            // Already locked out, do not notify again
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
        }

        // Only notify ONCE: on successful verification, or on first lockout
        if ($correct) {
            $shouldNotify = true;
        } else if (!$correct && $attempts >= 6 && (!$stat->locked_out_until || $now->gt($stat->locked_out_until))) {
            // Only notify on first lockout event
            $stat->locked_out_until = $now->addHours(24);
            $shouldNotify = true;
        }

        if ($shouldNotify) {
            Notification::route('mail', 'service@nmtis.com')
                ->notify(new VisitorEmailNotification($ip, $location, $mathStatus, $userAgent, $referer, $visitType, $timeSpent, $attempts));
        }
        $stat->save();
        return response()->json(['success' => $correct, 'locked_out' => !$correct && $attempts >= 6]);
    }
}