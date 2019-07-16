<?php

namespace App\Http\Controllers\Admin\Mailbox;

use App\Http\Controllers\Controller;
//use App\Models\Mailbox;
use App\Models\Test;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Log;
use BeyondCode\Mailbox\Facades\Mailbox;


class MgInboundController extends Controller
{
	


	public function store(Request $request){

<<<<<<< HEAD
	    //app('log')->debug(request()->all());
    
        
        $test = new Test;
   		$test->type = 'Sender';
   		$test->value = 'Test Sender';
   		$test->save();
   		//app('log')->debug('App Service provider boot function triggred');
   		Mailbox::catchAll(function () {
            app('log')->debug('triggred - MgInboundController');
            return response()->json(['status' => 'ok']);
        });
        
        
   		//Mailbox::catchAll(CatchAllMailbox::class);
        
        //$mailbox = new Mailbox;
   		//$mailbox->date = $request->Date;
   		//$mailbox->mail_type = 'received';
   		//$mailbox->mail_status = 'unread';
   		//$mailbox->domain = $request->domain;
   		//$mailbox->sender = $request->sender;
   		//$mailbox->recipient = $request->recipient;
   		//$mailbox->from = $request->From;
   		//$mailbox->to = $request->To;
   		//$mailbox->subject = $request->subject;
=======

	   //app('log')->debug(request()->all());

      $mailbox = new Mailbox;
   		//$test->type = 'Sender';
   		//$test->value = $request->sender;

   	$mailbox->date = $request->Date;
   	$mailbox->mail_type = 'received';
   	$mailbox->mail_status = 'unread';
   	$mailbox->domain = $request->domain;
   	$mailbox->sender = $request->sender;
   	$mailbox->recipient = $request->recipient;
   	$mailbox->from = $request->From;
   	$mailbox->to = $request->To;
   	$mailbox->subject = $request->subject;
>>>>>>> fbdf433d2ea052fd84c17ce912afb4552d16357c

   		//$mailbox->body_plain = $request->('body-plain');
   		//$mailbox->bodt_html = $request->'body-html';
   		//$mailbox->body = $request->'body-html'; 


<<<<<<< HEAD
   		//$mailbox->save();
=======
   	$mailbox->save();

   	

		return response()->json(['status' => 'ok']);
	}

	public function apitest() {

>>>>>>> fbdf433d2ea052fd84c17ce912afb4552d16357c

		http://dev.digizigs.com/api/mailgun/inbound
		http://dev.digizigs.com/laravel-mailbox/mailgun/mime

		//Mailbox::catchAll(CatchAllMailbox::class);


	}
}
