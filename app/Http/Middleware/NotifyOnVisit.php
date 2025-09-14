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
            $ip = $request->ip();
            $location = 'Unknown';
            // Use a free geoip service (e.g. ip-api.com)
            try {
                $geo = @json_decode(file_get_contents('http://ip-api.com/json/' . $ip), true);
                if (isset($geo['country']) && isset($geo['city'])) {
                    $location = $geo['city'] . ', ' . $geo['country'];
                } elseif (isset($geo['country'])) {
                    $location = $geo['country'];
                }
            } catch (\Exception $e) {}
            Notification::route('mail', 'service@nmtis.com')->notify(new VisitorEmailNotification($ip, $location));
            
            // Update visitor statistics
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
        }
        return $next($request);
    }
}
