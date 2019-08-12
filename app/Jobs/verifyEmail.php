<?php

namespace App\Jobs;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class verifyEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

   
    public function handle()
    {   
        $data = ['foo' => 'bar'];
        Mail::send('email.testmail', $data, function($message) {
            $message->to('amitvishwa19@gmail.com')->subject('MAilgun api mail test');
        });

        /*Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
        {
            $message->subject($this->user['name']);
            $message->from('info@digizigs.com', 'DigiZigs Mailer');
            //$message->to('info@digizigs.com');
            $message->to('amitvishwa19@gmail.com');
        });*/

    }
}
