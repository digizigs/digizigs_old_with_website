<?php

namespace App\Http\Controllers\App;


use App\Events\GuestChatEvent;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //

	/*public function __construct()
    {
        $this->middleware('auth');
    }*/


    public function chatSend(Request $request){

    	//return $request->message;
    	//$message = 'Test chat message';
    	$user = User::find(Auth::id());
    	event(new ChatEvent($request->message,$user));

    }

    public function guestChatSend(Request $request){

    	//return $request->message;
    	//$message = 'Test chat message';
    	//$user = User::find(Auth::id());
    	event(new GuestChatEvent($request->message));

    }

    /*public function guestChatSend(){
    	//return $request->message;
    	$message = 'Test chat message';
    	$user = User::find(Auth::id());
    	event(new GuestChatEvent($message));

    }*/
}
