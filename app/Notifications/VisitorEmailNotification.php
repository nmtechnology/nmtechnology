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
        return (new MailMessage)
            ->subject('New Website Visitor')
            ->view('emails.visitor_notification', [
                'ip' => $this->ip,
                'location' => $this->location,
                'mathStatus' => $this->mathStatus,
                'userAgent' => $this->userAgent,
                'referer' => $this->referer,
                'visitType' => $this->visitType,
                'timeSpent' => $this->timeSpent,
                'attempts' => $this->attempts,
                'landingPage' => $this->landingPage,
            ]);
    }
}
