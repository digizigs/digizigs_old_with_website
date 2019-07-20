<?php

namespace App\Http\Controllers\Admin\Mailbox;

use App\Http\Controllers\Controller;
use App\Models\Mailbox;
use App\Models\Test;
use BeyondCode\Mailbox\Facades\Mailbox;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Log;
use Nexmo\Laravel\Facade\Nexmo;
use Option;

class MgInboundController extends Controller
{
	


	public function store(Request $request){


	    app('log')->debug($request->all());
        
        $test = new Test;
   		$test->type = 'Sender';
   		$test->value = 'Test Sender';
   		$test->save();
   		//app('log')->debug('App Service provider boot function triggred');
   		
        
        $mailbox = new Mailbox;
   		$mailbox->date = $request->Date;
   		$mailbox->mail_type = 'received';
   		$mailbox->mail_status = 'unread';
   		$mailbox->domain = $request->domain;
   		$mailbox->sender = $request->sender;
   		$mailbox->recipient = $request->recipient;
   		$mailbox->from = $request->From;
   		$mailbox->to = $request->To;
   		$mailbox->subject = $request->subject;
   		$mailbox->body_plain = $request->{'body-plain'};
   		$mailbox->bodt_html = $request->{'body-html'};
   		$mailbox->save();
   	
		return response()->json(['status' => 'ok']);
		
	}

	public function apitest() {

	}

	public function nexmo(){
		/*$basic  = new \Nexmo\Client\Credentials\Basic('5f3459c7', 'ktOO7tE1mB3v0COS');
		$client = new \Nexmo\Client($basic);

		$message = $client->message()->send([
		    'to' => '919712340450',
		    'from' => 'Nexmo',
		    'text' => 'Hello from Nexmo'
		]);*/

		/*Nexmo::message()->send([
		    'to'   => '9712340450',
		    'from' => '9712340450',
		    'text' => 'Using the facade to send a message.'
		]);*/

		option(['test' => 'Wola Test Option']);

		

		/*if(option_exists('Test')){
			return option('Test');
		}else{
			return 'No key found for Test';
		}*/

		$check = Option::exists('test');
		if($check){
			return option('Test');
		}else{
			return 'No key found for Test';
		}
	}


}
