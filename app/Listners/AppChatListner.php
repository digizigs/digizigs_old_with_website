<?php

namespace App\Listners;

use App\Events\AppChatEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppChatListner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AppChatEvent  $event
     * @return void
     */
    public function handle(AppChatEvent $event)
    {
        //
    }
}
