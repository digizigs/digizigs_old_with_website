<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Test;

class MailgunWidgetsController extends Controller
{
    public function store()
    {
        app('log')->debug(request()->all());

        //$test = new Test;
   		//$test->type = 'Mailgun';
   		//$test->value = request()->all();
   		//$test->save();


        return response()->json(['status' => 'ok']);

    }
}
