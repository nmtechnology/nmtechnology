<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\GoogleCrawl;
use App\Mail\GoogleCrawlNotification;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class DetectGoogleCrawler
{
    /**
     * Known Google crawler user-agents
     */
    protected $googleBots = [
        'Googlebot',           // Main web crawler
        'Googlebot-Image',     // Image crawler
        'Googlebot-News',      // News crawler
        'Googlebot-Video',     // Video crawler
        'Google-InspectionTool', // Search Console inspection
        'GoogleOther',         // Other Google services
        'AdsBot-Google',       // AdWords crawler
        'Mediapartners-Google', // AdSense crawler
        'APIs-Google',         // Google APIs
        'FeedFetcher-Google',  // Feedburner
        'Google-Read-Aloud',   // Google Assistant
        'DuplexWeb-Google',    // Google Duplex
        'Storebot-Google',     // Google Shopping
    ];

    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $userAgent = $request->userAgent();
        
        // Check if the user agent matches any Google bot
        $isGoogleBot = false;
        $botType = null;
        
        foreach ($this->googleBots as $bot) {
            if (stripos($userAgent, $bot) !== false) {
                $isGoogleBot = true;
                $botType = $bot;
                break;
            }
        }
        
        if ($isGoogleBot) {
            try {
                // Verify it's actually Google (optional but recommended for security)
                $isVerified = $this->verifyGoogleBot($request->ip());
                
                // Log the crawl
                $crawl = GoogleCrawl::create([
                    'bot_type' => $botType,
                    'user_agent' => $userAgent,
                    'ip_address' => $request->ip(),
                    'url' => $request->fullUrl(),
                    'method' => $request->method(),
                    'referer' => $request->header('referer'),
                    'is_verified' => $isVerified,
                    'headers' => json_encode($request->headers->all()),
                    'crawled_at' => now(),
                ]);
                
                // Send email notification
                $this->sendNotification($crawl, $request);
                
                Log::info('Google crawler detected', [
                    'bot_type' => $botType,
                    'url' => $request->fullUrl(),
                    'ip' => $request->ip(),
                    'verified' => $isVerified,
                ]);
                
            } catch (\Exception $e) {
                Log::error('Error logging Google crawler visit: ' . $e->getMessage());
            }
        }
        
        return $next($request);
    }

    /**
     * Verify that the request is actually from Google
     * This prevents spoofed user-agents
     */
    protected function verifyGoogleBot($ip): bool
    {
        try {
            // Reverse DNS lookup
            $hostname = gethostbyaddr($ip);
            
            // Check if hostname ends with googlebot.com or google.com
            if (preg_match('/\.(googlebot|google)\.com$/i', $hostname)) {
                // Forward DNS lookup to verify
                $verifyIp = gethostbyname($hostname);
                return $verifyIp === $ip;
            }
            
            return false;
        } catch (\Exception $e) {
            Log::warning('Could not verify Google bot: ' . $e->getMessage());
            return false;
        }
    }

    /**
     * Send email notification about the crawl
     */
    protected function sendNotification(GoogleCrawl $crawl, Request $request)
    {
        try {
            // You can add throttling here to avoid too many emails
            // For example, only send one email per hour for the same URL
            
            Mail::to(env('ADMIN_EMAIL', 'hr@nmtechnology.us'))
                ->send(new GoogleCrawlNotification($crawl, $request));
                
        } catch (\Exception $e) {
            Log::error('Error sending Google crawler notification: ' . $e->getMessage());
        }
    }
}
