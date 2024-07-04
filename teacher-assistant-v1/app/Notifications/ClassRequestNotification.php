<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ClassRequestNotification extends Notification
{
    use Queueable;

    private $classRequest;

    public function __construct($classRequest)
    {
        $this->classRequest = $classRequest;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('You have a new class request.')
                    ->action('View Request', url('/classRequests/' . $this->classRequest->id))
                    ->line('Thank you for using our application!');
    }

    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
