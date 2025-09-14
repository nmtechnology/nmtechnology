<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BlockNonUSVisitors
{
    public function handle($request, Closure $next)
    {
        // Get real client IP (trust proxies)
        $ip = $request->header('X-Forwarded-For') ?? $request->ip();
        $ip = explode(',', $ip)[0]; // In case of multiple IPs
        $country = null;
        try {
            $geo = @json_decode(file_get_contents('http://ip-api.com/json/' . trim($ip)), true);
            if (isset($geo['country'])) {
                $country = strtolower(trim($geo['country']));
            }
        } catch (\Exception $e) {}
        if ($country !== 'united states') {
            return response('Access restricted to US visitors.', 403);
        }
        return $next($request);
    }
}