<?php

namespace App\Http\Controllers\App;

use App\Events\ChatEvent;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    //

	public function __construct()
    {
        $this->middleware('auth');
    }


    public function send(Request $request){

    	//return $request->message;
    	//$message = 'Test chat message';
    	$user = User::find(Auth::id());
    	event(new ChatEvent($request->message,$user));

    }

    /*public function send(){

    	$message = 'Test chat message';
    	$user = User::find(Auth::id());
    	event(new ChatEvent($message,$user));

    }*/
}
