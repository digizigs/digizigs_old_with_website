<?php

namespace App\Http\Controllers\Dashboard\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mail;

class MailController extends Controller
{
    public $email;

    public function index(){
       
        return view('dashboard.pages.mail.mail');
      
    }

   
    public function create(Request $request){
        
        $mail = Mail::orderby('id','desc')->get();
        return request()->json(200,$mail);
        
    }

   
    public function store(Request $request){
        //
    }

    
    public function show($id){
        //
    }

    public function markMail(Request $request){
        
        //return $request->all();
        $id = $request->id;
        if($request->type == 'read'){

            $mail = Mail::find($id);
            $mail->status = 'read';
            $mail->save();
            
            $mail = Mail::orderby('id','desc')->get();
            return request()->json(200,$mail);
            

        }elseif($request->type == 'unread'){

            $mail = Mail::find($id);
            $mail->status = 'unread';
            $mail->save();

            $mail = Mail::orderby('id','desc')->get();
            return request()->json(200,$mail);

        }elseif($request->type == 'trash'){

            $mail = Mail::find($id);
            $mail->label = 'trash';
            $mail->save();

            $mail = Mail::orderby('id','desc')->get();
            return request()->json(200,$mail);

        }elseif($request->type == 'important'){

            $mail = Mail::find($id);
            if($mail->label == 'important'){
                $mail->label = 'inbox';
            }else{
                $mail->label = 'important';
            }
            $mail->save();

            $mail = Mail::orderby('id','desc')->get();
            return request()->json(200,$mail);

        }
    }

    public function moveMail(Request $request){

        
        $ids = $request->mailid;
        foreach($ids as $id){
            $mail = Mail::find($id);
            $mail->label = $request->type;
            $mail->save();
        }

        $mail = Mail::orderby('created_at','desc')->get();
        return request()->json(200,$mail);
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

    public function getData($type){

        //return $this->email;
        //$email = $request->email;

         if($type == 'inbox'){
            $mail = Mail::where('type','inbound')
                ->where('label','inbox')
                ->where('to','like', '%'.$this->email.'%')
                ->orWhere('cc','like', '%'.$this->email.'%')
                ->orWhere('bcc','like', '%'.$this->email.'%')
                ->orderby('created_at','desc')
                ->with('attachments')
                ->paginate(10);
         }elseif($type == 'sent'){
            $mail = Mail::where('type','outbound')->where('label','sent')->orderby('created_at','desc')->with('attachments')->paginate(10);
         }elseif($type == 'important'){
            $mail = Mail::where('type','inbound')->where('label','<>','trash')->where('label','<>','spam')->where('starred',1)->orderby('created_at','desc')->with('attachments')->paginate(10);
         }elseif($type == 'draft'){
            $mail = Mail::where('type','outbound')->where('label','draft')->orderby('created_at','desc')->with('attachments')->paginate(10);
         }elseif($type == 'trash'){
            $mail = Mail::where('type','inbound')->where('label','trash')->orderby('created_at','desc')->with('attachments')->paginate(10);
         }elseif($type == 'spam'){
            $mail = Mail::where('type','inbound')->where('label','spam')->orderby('created_at','desc')->with('attachments')->paginate(10);
         }

        return $mail;
    }
}
