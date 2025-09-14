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
    public $experience;
    public $actions;

    public function __construct($ip, $location, $mathStatus, $userAgent, $referer, $visitType, $timeSpent, $attempts, $landingPage, $actions = null)
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
        $this->actions = $actions;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('NM Technology Visitor Notification')
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
                'actions' => $this->actions,
            ]);
    }
}
