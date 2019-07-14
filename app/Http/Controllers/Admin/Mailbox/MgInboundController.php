<?php

namespace App\Http\Controllers\Admin\Mailbox;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;
use Log;

class MgInboundController extends Controller
{
	public function store(Request $request){

	    app('log')->debug(request()->all());

        $test = new Test;
   		$test->type = 'Sender';
   		$test->value = $request->sender;
   		$test->save();


        return response()->json(['status' => 'ok']);

    	}

}
