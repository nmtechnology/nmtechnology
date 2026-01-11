<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Generate a nonce for inline scripts
        $nonce = base64_encode(random_bytes(16));
        $request->attributes->set('csp_nonce', $nonce);

        // Build CSP header
        $csp = [
            "default-src 'self'",
            "script-src 'self' 'nonce-{$nonce}' https://www.google.com https://www.gstatic.com https://www.googletagmanager.com https://api.descope.com https://app.descope.com",
            "style-src 'self' 'unsafe-inline' https://fonts.googleapis.com",
            "font-src 'self' https://fonts.gstatic.com data:",
            "img-src 'self' data: https: http:",
            "connect-src 'self' https://www.google.com https://www.googletagmanager.com https://api.descope.com https://app.descope.com",
            "frame-src 'self' https://www.google.com https://app.descope.com",
            "object-src 'none'",
            "base-uri 'self'",
            "form-action 'self'",
            "frame-ancestors 'none'",
            "upgrade-insecure-requests"
        ];

        // In development, allow eval for Vite HMR
        if (config('app.debug')) {
            $csp[1] = "script-src 'self' 'nonce-{$nonce}' 'unsafe-eval' https://www.google.com https://www.gstatic.com https://www.googletagmanager.com";
            $csp[] = "connect-src 'self' ws://localhost:* http://localhost:* https://www.google.com https://www.googletagmanager.com";
        }

        $response->headers->set('Content-Security-Policy', implode('; ', $csp));

        // Additional security headers
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'DENY');
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');

        return $response;
    }
}
