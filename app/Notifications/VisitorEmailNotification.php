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

    public function __construct($ip, $location, $mathStatus = 'unknown', $userAgent = null, $referer = null, $visitType = null)
    {
        $this->ip = $ip;
        $this->location = $location;
        $this->mathStatus = $mathStatus;
        $this->userAgent = $userAgent;
        $this->referer = $referer;
        $this->visitType = $visitType;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $mail = (new MailMessage)
            ->subject('New Website Visitor')
            ->greeting('Hello!')
            ->line('Someone just visited your website.')
            ->line('Time: ' . now()->toDateTimeString())
            ->line('IP Address: ' . $this->ip)
            ->line('Location: ' . $this->location)
            ->line('Math Verification Status: ' . $this->mathStatus)
            ->line('User Agent: ' . ($this->userAgent ?: 'Unknown'))
            ->line('Referer: ' . ($this->referer ?: 'Unknown'))
            ->line('Visit Type: ' . ($this->visitType ?: 'Unknown'))
            ->action('View Site', url('/'))
            ->line('This is an automated notification from NM Technology.');
        return $mail;
    }
}
