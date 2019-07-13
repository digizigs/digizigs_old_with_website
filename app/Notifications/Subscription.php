<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Subscription extends Notification
{
    use Queueable;
    private $subscription;
   
    public function __construct($newsubscription)
    {
        $this->subscription = $newsubscription;
    }

    
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

   
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

   
    public function toDatabase($notifiable)
    {
        return [

            'notify' => $this->subscription

        ];
    }

    public function toBroadcast($notifiable){

        return new BroadcastMessage([
            'notify' => $this->subscription,
            'count' => $notifiable->unreadNotifications->count(),
        ]);
    }
}
