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

   
    public function create(Request $request){

        //getData();
       
        $type = $request->filter;

        if($type == 'inbox'){
            $mail = Mail::where('type','inbound')->where('label','inbox')->orderby('created_at','desc')->with('attachments')->paginate(10);
        }elseif($type == 'sent'){
            $mail = Mail::where('type','outbound')->where('label','sent')->orderby('created_at','desc')->with('attachments')->paginate(10);
        }elseif($type == 'important'){
            $mail = Mail::where('type','inbound')->where('label','inbox')->where('starred',1)->orderby('created_at','desc')->with('attachments')->paginate(10);
        }

        
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

     public function markstar($id){
        $mail = Mail::find($id);

        if($mail->starred == 1){
            $mail->starred = 0;
        }else{
            $mail->starred = 1;
        }
       
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
        $this->data = Mail::orderby('created_at','desc')->with('attachments')->paginate(10);
        //return response()->json($mail);
    }
}
