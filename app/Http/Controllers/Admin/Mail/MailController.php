<?php

namespace App\Http\Controllers\Admin\Mail;

use App\Http\Controllers\Controller;
use App\Models\Mail;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MailController extends Controller
{
    
    public $email;

    public function index(){
       
        return view('admin.pages.mailbox.mailbox',compact('mail'));
      
    }

   
    public function create(Request $request){
        
        $client = new Client();
        $uri = 'http://localhost:8080/digizigs/api/mailbox/info@digizigs.com/inbox';
    
        $params['headers'] = [
                            'Accept' => 'application/json',
                            'Content-type' => 'application/x-www-form-urlencoded',
                            'Authorization' => 'Bearer ' . env('DZ_API_KEY', null)
                        ];
        $params['form_params'] =[
                                'email' => 'test@gmail.com',
                                'name' => 'Test user',
                                'password' => 'testpassword',
                            ];
        $data = $client->get($uri, $params );
        //return json_decode($request->getBody(), true);
        return request()->json(200,$data);
    }

   
    public function store(Request $request){
        //
    }

    
    public function show($id){
        //
    }

    public function markMail($id,Request $request){
        
        if($request->type == 'read'){

            $mail = Mail::find($id);
            $mail->status = 'read';
            $mail->save();

            $type = $request->filter;
            $mail = $this->getData($type);
            return response()->json($mail);

        }elseif($request->type == 'unread'){

            $mail = Mail::find($id);
            $mail->status = 'unread';
            $mail->save();

            $type = $request->filter;
            $mail = $this->getData($type);
            return response()->json($mail);

        }elseif($request->type == 'trash'){

            $mail = Mail::find($id);
            $mail->label = 'trash';
            $mail->save();

            $type = $request->filter;
            $mail = $this->getData($type);
            return response()->json($mail);

        }elseif($request->type == 'star'){

            $mail = Mail::find($id);
            if($mail->starred == 1){
                $mail->starred = 0;
            }else{
                $mail->starred = 1;
            }
            $mail->save();

            $type = $request->filter;
            $mail = $this->getData($type);
            return response()->json($mail);

        }
    }

    public function moveMail(Request $request){

        $ids = $request->mailid;
        foreach($ids as $id){
            $mail = Mail::find($id);
            $mail->label = $request->type;
            $mail->save();
        }

        $type = $request->filter;
        $mail = $this->getData($type);
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
