<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvoiceCreated extends Notification
{
    use Queueable;
    private $invoice;

   
    public function __construct($newinvoice) {
        
        $this->invoice = $newinvoice;
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
            
            'newinvoice' => $this->invoice
        ];
    }
}
