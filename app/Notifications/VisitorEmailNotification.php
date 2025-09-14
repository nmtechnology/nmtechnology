<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VisitorEmailNotification extends Notification
{
    public $ip;
    public $location;
    public $mathStatus;
    public $isBot;

    public function __construct($ip, $location, $mathStatus = 'not attempted', $isBot = false)
    {
        $this->ip = $ip;
        $this->location = $location;
        $this->mathStatus = $mathStatus;
        $this->isBot = $isBot;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('New Website Visitor')
            ->greeting('Hello!')
            ->line('Someone just visited your website.')
            ->line('Time: ' . now()->toDateTimeString())
            ->line('IP Address: ' . $this->ip)
            ->line('Location: ' . $this->location)
            ->line('Math Verification Status: ' . $this->mathStatus)
            ->line('Bot Detection: ' . ($this->isBot ? 'Likely bot' : 'Human'))
            ->action('View Site', url('/'))
            ->line('This is an automated notification from NM Technology.');
    }
}
