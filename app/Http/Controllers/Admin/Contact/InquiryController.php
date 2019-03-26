<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class InquiryController extends Controller
{
   

    public $email;


    public function index()
    {   


        //Mail::to(Auth::user()->email)->send(new NewUser());
        /*$beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.Beautymail', [], function($message)
        {
            $to_email = 'jaysvishwa@gmail.com';
            $message
                ->from('bar@example.com')
                ->to('foo@example.com', 'John Smith')
                ->subject('Welcome!');
        });*/

        //return 'Inquiry';
        $inquiries = Contact::orderby('created_at','desc')->where('type','inquiry')->paginate(10);
        return view('admin.pages.contact.inquiry',compact('inquiries'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {

    }

    
    public function edit($id)
    {
        $inquiry = Contact::find($id);
        return view('admin.pages.contact.inquiry_show',compact('inquiry'));
    }

    
    public function update(Request $request, $id)
    {
        //return $request->email;
        this.$email = $request->email;
        
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.Beautymail', [], function($message)
        {
            //$email = Input::get('email');
            $message
                ->from('info@digizigs.com','DigiZigs')
                ->to($email, 'John Smith')
                ->subject('Inquiry');
        });


        return redirect()->route('inquiry.index')->with('message', 'Response sent to client successfully');
    }

    
    public function destroy($id)
    {
        //
    }
}
