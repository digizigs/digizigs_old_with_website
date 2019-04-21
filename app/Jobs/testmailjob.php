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

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
 
    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to('jaysvishwa@gmail.com')
            ->send(new testMail());
    }
}
