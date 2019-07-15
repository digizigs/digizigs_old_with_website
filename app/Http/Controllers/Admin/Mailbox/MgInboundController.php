<?php

namespace App\Http\Controllers\Admin\Mailbox;

use App\Http\Controllers\Controller;
use App\Models\Mailbox;
use App\Models\Test;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Log;


class MgInboundController extends Controller
{
	


	public function store(Request $request){


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

   		//$mailbox->body_plain = $request->('body-plain');
   		//$mailbox->bodt_html = $request->'body-html';
   		//$mailbox->body = $request->'body-html'; 


   	$mailbox->save();

   	

		return response()->json(['status' => 'ok']);
	}

	public function apitest() {


		http://dev.digizigs.com/api/mailgun/inbound
		http://dev.digizigs.com/laravel-mailbox/mailgun/mime

		//Mailbox::catchAll(CatchAllMailbox::class);


	}
}
