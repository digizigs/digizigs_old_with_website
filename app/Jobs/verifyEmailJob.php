<?php

namespace App\Jobs;

use App\Mail\ActivationEmail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class verifyEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

   
    public function handle()
    {   
        Mail::to($this->user)->send(new ActivationEmail($this->user));

        /*$data = [
           'name' => $this->user->name,
           'password' => 'asdasdasdasd'
        ];

        Mail::send('email.activation', ["data1"=>$data] , function($message){
            $message->to('amitvishwa19@gmail.com', 'itsFromMe') ->subject('thisIsMySucject');
        });*/
    }
}
