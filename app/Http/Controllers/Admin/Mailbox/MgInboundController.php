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
	

<<<<<<< HEAD
	public function store(Request $request){

		app('log')->debug(request()->all());

		$test = new Test;
		$test->type = 'Sender';
		$test->value = $request->sender;
		$test->save();
=======
	    app('log')->debug(request()->all());

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

   		/*$response = (new Client())->get($file['url'], [
		    'auth' => ['api', config('services.mailgun.secret')],
		]);*/
>>>>>>> 691d40f5ab050c0cecd51449854223d4beccea94

		return response()->json(['status' => 'ok']);

	}

}
