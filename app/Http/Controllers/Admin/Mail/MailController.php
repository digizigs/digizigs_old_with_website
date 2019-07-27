<?php

namespace App\Http\Controllers\Admin\Mail;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    
    public function index(){
       
        return view('admin.pages.mailbox.mailbox',compact('mail'));
      
    }

   
    public function create(){
       
        //$mail2 =  getData();

        $mail = Mail::orderby('created_at','desc')->with('attachments')->paginate(10);
        return response()->json($mail);
    }

   
    public function store(Request $request){
        //
    }

    
    public function show($id){
        //
    }

    public function markread($id){
        $mail = Mail::find($id);
        $mail->status = 'read';
        $mail->save();
        $mail = Mail::orderby('created_at','desc')->with('attachments')->paginate(10);
        return response()->json($mail);
    }
    
    public function edit($id){
        $mail = Mail::find($id);
        $mail->status = 'read';
        $mail->save();
        $mail = Mail::orderby('created_at','desc')->get();
        return response()->json($mail);
    }

   
    public function update(Request $request, $id){
        //
    }

    
    public function destroy($id){
        //
    }

    public function getData(){
        $mail = Mail::orderby('created_at','desc')->with('attachments')->paginate(10);
        return response()->json($mail);
    }
}
