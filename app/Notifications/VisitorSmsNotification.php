<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class VisitorSmsNotification extends Notification
{
    use Queueable;

    protected $phone;

    public function __construct($phone)
    {
        $this->phone = $phone;
    }

    public function via($notifiable)
    {
        return ['twilio'];
    }

    public function toTwilio($notifiable)
    {
        return [
            'to' => $this->phone,
            'message' => 'New visitor on NM Technology website!'
        ];
    }
}
