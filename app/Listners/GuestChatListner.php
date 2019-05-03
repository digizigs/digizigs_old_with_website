<?php

namespace App\Listners;

use App\Events\GuestChatEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GuestChatListner
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
     * @param  GuestChatEvent  $event
     * @return void
     */
    public function handle(GuestChatEvent $event)
    {
        //
    }
}
