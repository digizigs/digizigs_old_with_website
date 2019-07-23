<?php

namespace App\Http\Controllers\Admin\Mailbox;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Jobs\MailAttachmentDownload;
=======
use App\Models\Mailbox;
>>>>>>> c4c53b3315721236ef484e4e9c2d0726232d89bf
use App\Models\Test;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Log;
use Nexmo\Laravel\Facade\Nexmo;
use Option;

class MgInboundController extends Controller
{
	

	public function inbound(Request $request){

        app('log')->debug($request->all());
	    /*
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
   		*/
   	
		return response()->json(['status' => 'ok']);
		
	}

	public function store(Request $request){

<<<<<<< HEAD
		app('log')->debug($request->all());

      $mailbox = $request->domain;
      

      $files = collect(json_decode($request->input('attachments'), true))->filter(function ($file) {
            return $file['content-type'];
      });
        
      if($files){
      	foreach ($files as $file) {
	      	$mailbox_id = 5;
	      	dispatch(new MailAttachmentDownload($mailbox,$mailbox_id,$file));
	      }
      }
        
        
=======

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
   	
>>>>>>> c4c53b3315721236ef484e4e9c2d0726232d89bf
		return response()->json(['status' => 'ok']);
		
	}

	public function apitest() {
<<<<<<< HEAD
=======

>>>>>>> c4c53b3315721236ef484e4e9c2d0726232d89bf
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
