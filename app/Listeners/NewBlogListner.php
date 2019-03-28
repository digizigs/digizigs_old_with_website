<?php

namespace App\Listeners;

use App\Event\NewBlog;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class NewBlogListner
{
    
    public function __construct(){
        //
    }

   
    public function handle(NewBlog $event){


    	Log::info('Event Lisned =>New Blog posted @' . \Carbon\Carbon::now());


    	//dd($event);

    	return $event;

        //Log::info('New Blog posted @' . \Carbon\Carbon::now());
        
    }
}
