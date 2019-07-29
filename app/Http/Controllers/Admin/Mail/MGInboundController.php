<?php

namespace App\Http\Controllers\Admin\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\MailAttachmentDownload;
use App\Models\Test;
use App\Models\Mail;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;
use Log;
use Nexmo\Laravel\Facade\Nexmo;
use Option;

class MGInboundController extends Controller
{

    public function inbound(Request $request){

        app('log')->debug($request->all());
        /*
        app('log')->debug($request->all());
            
            $test = new Test;
        $test->type = 'Sender';
        $test->value = 'Test Sender';
        $test->save();
        //app('log')->debug('App Service provider boot function triggred');
        
            
            $mailbox = new Mailbox;
        $mailbox->date = $request->Date;
        $mailbox->mail_type = 'received';
        $mailbox->mail_status = 'unread';
        $mailbox->domain = $request->domain;
        $mailbox->sender = $request->sender;
        $mailbox->recipient = $request->recipient;
        $mailbox->from = $request->From;
        $mailbox->to = $request->To;
        $mailbox->subject = $request->subject;
        $mailbox->body_plain = $request->{'body-plain'};
        $mailbox->bodt_html = $request->{'body-html'};
        $mailbox->save();
        */
        
        return response()->json(['status' => 'ok']);
        
    }

    public function store(Request $request){

        app('log')->debug($request->all());
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
        $files = collect(json_decode($request->input('attachments'), true))->filter(function ($file) {
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

    public function apitest() {
    }

    public function nexmo(){
        /*$basic  = new \Nexmo\Client\Credentials\Basic('5f3459c7', 'ktOO7tE1mB3v0COS');
        $client = new \Nexmo\Client($basic);

        $message = $client->message()->send([
            'to' => '919712340450',
            'from' => 'Nexmo',
            'text' => 'Hello from Nexmo'
        ]);*/

        /*Nexmo::message()->send([
            'to'   => '9712340450',
            'from' => '9712340450',
            'text' => 'Using the facade to send a message.'
        ]);*/

        option(['test' => 'Wola Test Option']);

        

        /*if(option_exists('Test')){
        return option('Test');
        }else{
        return 'No key found for Test';
        }*/

        $check = Option::exists('test');
        if($check){
        return option('Test');
        }else{
        return 'No key found for Test';
        }
    }
}
