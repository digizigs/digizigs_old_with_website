<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mail\MailCollection;
use App\Http\Resources\Mail\MailResource;
use App\Jobs\MailAttachmentDownload;
use App\Models\Mail;
use Illuminate\Http\Request;

class MailController extends Controller
{

    public function __construct(){

        $this->middleware('auth:api')->except('inbound')
    }
   
    public function index()
    { 
        return MailCollection::collection(Mail::all());
    }


    
    public function store(Request $request,$email,$type)
    {
        

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

    public function inbound(Request $request,$email)
    {
        $mail = new Mail;
        $mail->domain = $request->domain;
        $mail->type = 'inbound';
        $mail->label = 'inbox';
        $mail->status = 'unread';
        $mail->sender = $request->sender;
        $mail->recipient = $request->recipient;
        $mail->from = $request->From;
        $mail->to = $request->To;
        $mail->cc = $request->Cc;
        $mail->bcc = $request->Bcc;
        $mail->subject = $request->Subject;
        $mail->body_plain = $request->{'body-plain'};
        $mail->body_html = $request->{'body-html'};

        if($request->attachments){
            $mail->attachment = 1;
        }else{
            $mail->attachment = 0;
        }

        $mail->save();

        $mailbox = $request->domain;
        /*$files = collect(json_decode($request->input('attachments'), true))->filter(function ($file) {
                return $file['content-type'];
        });*/
        $files = collect($request->input('attachments'))->filter(function ($file) {
                return $file['content-type'];
        });
            
        if($files){
            foreach ($files as $file) {
            $mailid = $mail->id;
            dispatch(new MailAttachmentDownload($mailbox,$mailid,$file));
            }
        }
            
        return response()->json(['status' => 'ok']);
    }
}
