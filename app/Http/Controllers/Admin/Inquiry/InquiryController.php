<?php

namespace App\Http\Controllers\Admin\Inquiry;

use App\Http\Controllers\Controller;
use App\Mail\NewUser;
use App\Models\Inquiry;
use Auth;
use Illuminate\Http\Request;
use Mail;
use Snowfire\Beautymail\Beautymail;

class InquiryController extends Controller
{
   
    public function index() {

        //Mail::to(Auth::user()->email)->send(new NewUser());
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.Beautymail', [], function($message)
        {
            $to_email = 'jaysvishwa@gmail.com';
            $message
                ->from('bar@example.com')
                ->to('foo@example.com', 'John Smith')
                ->subject('Welcome!');
        });
        return view('admin.connect.contact');
    }

   
    public function create()
    {
        $inquiry=Inquiry::orderby('created_at','desc')->get();
        return request()->json(200,$inquiry);
    }

   
    public function store(Request $request)
    {
       
        return $request->all();
    }

  
    public function show($id)
    {   
        //return $id;
        $contact = Inquiry::find($id);
        return request()->json(200,$contact);
    }

    public function contactResponse(Request $request){

        return 'adsad';
    }
   
    public function edit($id)
    {
        //
    }

  
    public function update(Request $request, $id)
    {
        return 'mail send';
    }

   
    public function destroy($id)
    {
        //
    }
}
