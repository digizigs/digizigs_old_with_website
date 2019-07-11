<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        'App\Events\TaskEvent'=>[
            'App\Listners\TaskEventListner',
        ],
        'App\Events\ChatEvent'=>[
            'App\Listners\ChatListner',
        ],
        'App\Events\GuestChatEvent'=>[
            'App\Listners\GuestChatListner',
        ],
        'App\Events\AppChatEvent'=>[
            'App\Listners\AppChatListner',
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
