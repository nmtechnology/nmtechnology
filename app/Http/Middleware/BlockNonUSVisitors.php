<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockNonUSVisitors
{
    public function handle($request, Closure $next)
    {
        // Check if IP blocking is bypassed in environment
        if (env('BYPASS_IP_BLOCKING', false)) {
            return $next($request);
        }

        // Get real client IP (trust proxies)
        $ip = $request->header('X-Forwarded-For') ?? $request->ip();
        $ip = explode(',', $ip)[0]; // In case of multiple IPs
        $country = null;
        $city = null;
        try {
            $geo = @json_decode(file_get_contents('http://ip-api.com/json/' . trim($ip)), true);
            if (isset($geo['country'])) {
                $country = strtolower(trim($geo['country']));
            }
            if (isset($geo['city'])) {
                $city = strtolower(trim($geo['city']));
            }
        } catch (\Exception $e) {}
        // Block non-US visitors and any city from China
        if ($country !== 'united states' || $country === 'china') {
            \Log::info('Blocked visitor', ['ip' => $ip, 'country' => $country, 'city' => $city]);
            return response('Access restricted to US visitors.', 403);
        }
        return $next($request);
    }
}