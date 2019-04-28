<?php

namespace App\Jobs;

use App\Mail\testMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class testmailjob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $contact;
    public function __construct($contact)
    {
        $this->contact = $contact;
    }
 
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   

        $user = \Auth::loginUsingId(1);
        $email = 'jaysvishwa@gmail.com';

        
        Mail::to('jaysvishwa@gmail.com')
            ->send(new testMail($this->contact));
    }
}
