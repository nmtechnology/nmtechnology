<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VisitorEmailNotification extends Notification
{
    public $ip;
    public $location;
    public $mathStatus;
    public $userAgent;
    public $referer;
    public $visitType;
    public $timeSpent;
    public $attempts;
    public $landingPage;

    public function __construct($ip, $location, $mathStatus = 'unknown', $userAgent = null, $referer = null, $visitType = null, $timeSpent = null, $attempts = null, $landingPage = null)
    {
        $this->ip = $ip;
        $this->location = $location;
        $this->mathStatus = $mathStatus;
        $this->userAgent = $userAgent;
        $this->referer = $referer;
        $this->visitType = $visitType;
        $this->timeSpent = $timeSpent;
        $this->attempts = $attempts;
        $this->landingPage = $landingPage;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $themeColor = '#10b981';
        $bgColor = '#222';
        $textColor = '#fff';
        $borderColor = '#10b981';
        $body = '<div style="background:' . $bgColor . ';color:' . $textColor . ';font-family:sans-serif;padding:2rem;border-radius:12px;max-width:600px;margin:auto;">';
        $body .= '<h2 style="color:' . $themeColor . ';font-size:2rem;text-align:center;margin-bottom:1rem;">New Website Visitor</h2>';
        $body .= '<table style="width:100%;border-collapse:collapse;margin-bottom:1rem;">';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">Time</td><td style="padding:8px;">' . now()->toDateTimeString() . '</td></tr>';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">IP Address</td><td style="padding:8px;">' . e($this->ip) . '</td></tr>';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">Location</td><td style="padding:8px;">' . e($this->location) . '</td></tr>';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">Math Verification Status</td><td style="padding:8px;">' . e($this->mathStatus) . '</td></tr>';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">Number of Attempts</td><td style="padding:8px;">' . e($this->attempts ?? 'Unknown') . '</td></tr>';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">Time Spent on Page</td><td style="padding:8px;">' . e($this->timeSpent ?? 'Unknown') . 's</td></tr>';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">User Agent</td><td style="padding:8px;">' . e($this->userAgent ?: 'Unknown') . '</td></tr>';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">Referer</td><td style="padding:8px;">' . e($this->referer ?: 'Unknown') . '</td></tr>';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">Visit Type</td><td style="padding:8px;">' . e($this->visitType ?: 'Unknown') . '</td></tr>';
        $body .= '<tr><td style="color:' . $themeColor . ';font-weight:bold;padding:8px;">Landing Page</td><td style="padding:8px;">' . e($this->landingPage ?: 'Unknown') . '</td></tr>';
        $body .= '</table>';
        $body .= '<div style="text-align:center;color:' . $themeColor . ';font-size:1rem;margin-top:2rem;">&copy; ' . now()->year . ' NM Technology. All rights reserved.</div>';
        $body .= '</div>';
        return (new MailMessage)
            ->subject('New Website Visitor')
            ->view(['html' => $body]);
    }
}
