<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mail\MailCollection;
use App\Http\Resources\Mail\MailResource;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
   
    public function index()
    { 
        return MailCollection::collection(Mail::all());
    }


    
    public function store(Request $request,$email,$type)
    {
        return $request->all();
        
    }

   
    public function show(Mail $mail)
    {   

        return new MailResource($mail);
    
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
