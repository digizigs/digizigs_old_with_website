<?php

namespace App\Http\Controllers\Admin\Mailbox;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Test;

class MgInboundController extends Controller
{

    public function store()
    {
        app('log')->debug(request()->all());

        $test = new Test;
   		$test->type = 'Mailgun';
   		$test->value = 'test';
   		$test->save();


        return response()->json(['status' => 'ok']);

    }
}
