<?php

namespace App\Http\Controllers\Admin\Connect;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
        $inquiries = Inquiry::orderby('created_at','desc')->paginate(10);
        return view('admin.pages.connect.inquiry',compact('inquiries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inquiry = Inquiry::find($id);
        return view('admin.pages.connect.inquiry_show',compact('inquiry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //return $request->email;
        $to_email = $request->email;

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.Beautymail', [], function($message)
        {
            $email = Input::get('email');
            $message
                ->from('info@digizigs.com','DigiZigs')
                ->to($email, 'John Smith')
                ->subject('Inquiry');
        });


        return redirect()->route('inquiry.index')->with('message', 'Response sent to client successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
