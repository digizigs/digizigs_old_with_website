<?php

namespace App\Listners;

use App\Events\AppActivityLogEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class AppActivityLogListner
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
     * @param  AppActivityLogEvent  $event
     * @return void
     */
    public function handle(AppActivityLogEvent $event)
    {
        app('log')->debug('App Activity update ');
    }
}
