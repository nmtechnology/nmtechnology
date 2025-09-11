<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\VisitorSmsNotification;

class NotifyOnVisit
{
    public function handle(Request $request, Closure $next)
    {
        // Only notify for GET requests to the homepage
        if ($request->is('/') && $request->method() === 'GET') {
            Notification::route('twilio', '5056595097')->notify(new VisitorSmsNotification('5056595097'));
        }
        return $next($request);
    }
}
