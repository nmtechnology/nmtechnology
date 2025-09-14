<?php
namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class VisitorEmailNotification extends Notification
{
    public $ip;
    public $location;

    public function __construct($ip, $location)
    {
        $this->ip = $ip;
        $this->location = $location;
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
            ->action('View Site', url('/'))
            ->line('This is an automated notification from NM Technology.');
    }
}
