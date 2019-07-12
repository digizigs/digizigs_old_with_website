<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;
use Log;

class MailgunWidgetsController extends Controller
{
    public function store(Request $request)
    {
        app('log')->debug(request()->all());
	//Log::info($request->all());
	$subject = $request->subject;
        $test = new Test;
   	$test->type = 'Mailgun';
   	$test->value = $subject;
   	$test->save();


        return response()->json(['status' => 'ok']);

    }
}
