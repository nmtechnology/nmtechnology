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
        try {
            $geo = @json_decode(file_get_contents('http://ip-api.com/json/' . $ip), true);
            if (isset($geo['country']) && isset($geo['city'])) {
                $location = $geo['city'] . ', ' . $geo['country'];
            } elseif (isset($geo['country'])) {
                $location = $geo['country'];
            }
        } catch (\Exception $e) {}

        // Lockout logic
        $stat = VisitorStat::where('ip', $ip)->first();
        $now = now();
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
            ]);
        } else {
            $stat->visits += 1;
            $stat->location = $location;
            $stat->last_visited = $now;
        }

        // If failed 6+ times, lock out for 24h
        if (!$correct && $attempts >= 6) {
            $stat->locked_out_until = $now->addHours(24);
            $stat->save();
            Notification::route('mail', 'service@nmtis.com')
                ->notify(new VisitorEmailNotification($ip, $location, $mathStatus, $userAgent, $referer, $visitType, $timeSpent, $attempts));
            return response()->json(['locked_out' => true], 403);
        }

        // Only notify/record on actual verification event
        if ($correct || (!$correct && $attempts >= 6)) {
            Notification::route('mail', 'service@nmtis.com')
                ->notify(new VisitorEmailNotification($ip, $location, $mathStatus, $userAgent, $referer, $visitType, $timeSpent, $attempts));
        }
        $stat->save();
        return response()->json(['success' => $correct, 'locked_out' => false]);
    }
}