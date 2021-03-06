<?php

namespace App\Events;

use App\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class GuestChatEvent implements ShouldBroadcast
{
     use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $user;


    public function __construct($message,$user)
    {
        $this->message = $message;
        $this->user = $user->firstname . ',' . $user->lastname;
        $this->dontBroadcastToCurrentUser();
    }

    
    public function broadcastOn()
    {
        return new PrivateChannel('guestchat');
        //return new use Illuminate\Broadcasting\Channel('guestchat');
    }
}
