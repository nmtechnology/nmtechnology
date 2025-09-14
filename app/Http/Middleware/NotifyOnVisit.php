<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VisitorEmailNotification;
use App\Models\VisitorStat;

class NotifyOnVisit
{
    public function handle($request, Closure $next)
    {
        if ($request->is('/') && $request->method() === 'GET') {
            // Only notify and record if math verification just completed
            $isVerified = session('math_verified');
            $mathStatus = $isVerified ? 'success' : 'failed';
            $ip = $request->ip();
            $location = 'Unknown';
            $userAgent = $request->header('User-Agent');
            $referer = $request->header('Referer');
            $visitType = $isVerified ? 'Entered site' : 'Failed verification';
            try {
                $geo = @json_decode(file_get_contents('http://ip-api.com/json/' . $ip), true);
                if (isset($geo['country']) && isset($geo['city'])) {
                    $location = $geo['city'] . ', ' . $geo['country'];
                } elseif (isset($geo['country'])) {
                    $location = $geo['country'];
                }
            } catch (\Exception $e) {}
            
            Notification::route('mail', 'service@nmtis.com')
                ->notify(new VisitorEmailNotification($ip, $location, $mathStatus, $userAgent, $referer, $visitType));
            $stat = VisitorStat::where('ip', $ip)->first();
            if ($stat) {
                $stat->visits += 1;
                $stat->location = $location;
                $stat->last_visited = now();
                $stat->save();
            } else {
                VisitorStat::create([
                    'ip' => $ip,
                    'location' => $location,
                    'visits' => 1,
                    'last_visited' => now(),
                ]);
            }
            // Reset session so only one notification per verification
            session()->forget('math_verified');
        }
        return $next($request);
    }
}
