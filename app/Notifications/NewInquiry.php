<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewInquiry extends Notification
{
    use Queueable;
    private $inquiry_n;
    
    public function __construct($newInquiry) {

        $this->inquiry_n = $newInquiry;
    }

    
    public function via($notifiable) {

        return ['database'];
    }

    
    public function toMail($notifiable) {

        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    
    public function toDatabase($notifiable) {

        return [

            'notify' => $this->inquiry_n

        ];
    }
}
