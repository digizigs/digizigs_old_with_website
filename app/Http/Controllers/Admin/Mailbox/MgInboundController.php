<?php

namespace App\Http\Controllers\Admin\Mailbox;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;
use Log;

class MgInboundController extends Controller
{
<<<<<<< HEAD:app/Http/Controllers/MailgunWidgetsController.php
    public function store(Request $request)
=======

    public function store()
>>>>>>> 940ed96230cbf60d1a3abd2f697305e201119354:app/Http/Controllers/Admin/Mailbox/MgInboundController.php
    {
        app('log')->debug(request()->all());
	//Log::info($request->all());
	$subject = $request->subject;
        $test = new Test;
<<<<<<< HEAD:app/Http/Controllers/MailgunWidgetsController.php
   	$test->type = 'Mailgun';
   	$test->value = $subject;
   	$test->save();
=======
   		$test->type = 'Mailgun';
   		$test->value = 'test';
   		$test->save();
>>>>>>> 940ed96230cbf60d1a3abd2f697305e201119354:app/Http/Controllers/Admin/Mailbox/MgInboundController.php


        return response()->json(['status' => 'ok']);

    }
}
