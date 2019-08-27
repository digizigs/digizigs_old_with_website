<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\MailResource;
use App\Jobs\MailAttachmentDownload;
use App\Models\Mail;

class MailController extends Controller
{

    public function index(Request $request)
    {
        //return $request->all();
        //$mail = Mail::all();
        $email = $request->email;
        $mail = Mail::where('to','like', '%'.$email.'%')
        ->orWhere('cc','like', '%'.$email.'%')
        ->orWhere('bcc','like', '%'.$email.'%')
        ->orderby('created_at','desc')
        ->with('attachments')->get();
        return MailResource::collection($mail);
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Mail $mail)
    {
        return $id;
    }


    public function update(Request $request, Mail $mail)
    {
        //
    }


    public function destroy(Mail $mail)
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

    public function getData($email,$type)
    {

      //return $type;
      $mail = null;

      if($type == 'inbox'){

         $mail = Mail::where('type','inbound')
                ->where('label','inbox')
                ->where('to','like', '%'.$email.'%')
                ->orWhere('cc','like', '%'.$email.'%')
                ->orWhere('bcc','like', '%'.$email.'%')
                ->orderby('created_at','desc')
                ->with('attachments')
                ->paginate(5);

        }elseif($type == 'sent'){

          $mail = Mail::where('type','outbound')
                ->where('label','sent')
                ->where('from','like', '%'.$email.'%')
                ->orderby('created_at','desc')
                ->with('attachments')
                ->paginate(5);

        }elseif($type == 'important'){

          $mail = Mail::where('type','inbound')
                ->where('label','<>','trash')
                ->where('label','<>','spam')
                ->where('starred',1)
                ->where('to','like', '%'.$email.'%')
                ->orWhere('cc','like', '%'.$email.'%')
                ->orWhere('bcc','like', '%'.$email.'%')
                ->orderby('created_at','desc')
                ->with('attachments')
                ->paginate(5);

        }elseif($type == 'draft'){

            $mail = Mail::where('type','outbound')
                ->where('label','draft')
                ->where('from','like', '%'.$email.'%')
                ->orderby('created_at','desc')
                ->with('attachments')
                ->paginate(5);

        }elseif($type == 'trash'){

            $mail = Mail::where('type','inbound')
                ->where('label','trash')
                ->where('to','like', '%'.$email.'%')
                ->orWhere('cc','like', '%'.$email.'%')
                ->orWhere('bcc','like', '%'.$email.'%')
                ->orderby('created_at','desc')
                ->with('attachments')
                ->paginate(5);

        }elseif($type == 'spam'){

            $mail = Mail::where('type','inbound')
                ->where('label','spam')
                ->orderby('created_at','desc')
                ->where('to','like', '%'.$email.'%')
                ->orWhere('cc','like', '%'.$email.'%')
                ->orWhere('bcc','like', '%'.$email.'%')
                ->with('attachments')
                ->paginate(5);

        }

        return $mail;
    }

    public function unreadCount($email,$type)
    {
        $inbox = Mail::where('to','like', '%'.$email.'%')
                            ->where('label',$type)
                            ->where('status','unread')
                            ->get()
                            ->count();

        $draft = Mail::where('from','like', '%'.$email.'%')
                            ->where('label','draft')
                            ->get()
                            ->count();

        return $data = ['unreadinbox'=> $inbox ,'draft'=>$draft];
    }
}
