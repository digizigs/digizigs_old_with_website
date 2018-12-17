<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\User;

class verifyEmail extends Notification
{
    use Queueable;

    public $user;

   
    public function __construct(User $user) {
        $this->user = $user;
    }

    
    public function via($notifiable) {
        return ['mail'];
    }

    
    public function toMail($notifiable) {
        return (new MailMessage)
                    ->line('Please verify your user account to continue.')
                    ->action('Verify Account', route('verifyAccount',$this->user->verifyToken))
                    ->line('Thank you for associating with us');
    }

    
    public function toArray($notifiable) {
        return [
            //
        ];
    }
}
