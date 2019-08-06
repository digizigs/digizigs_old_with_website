<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{   
    public $email;
   
    public function index() {
        
        $mail = Mail::all();
        return response()->json($mail);
    }

    public function getMails(Request $request) {
        
        $type = $request->filter;
        $mail = $this->getData($type);
        return response()->json($mail);

    }
    
    public function store(Request $request) {
        //
    }

    
    public function update(Request $request, $id) {
        //
    }

    
    public function destroy($id) {
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
