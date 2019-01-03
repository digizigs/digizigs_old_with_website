<?php

namespace App\Http\Controllers\Admin\Connect;

use App\Http\Controllers\Controller;
use App\Models\Connect;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
   
    public function index()
    {
        return view('admin.connect.contact');
    }

   
    public function create()
    {
        $contact=Connect::where('type','inquiry')->orderby('created_at','desc')->get();
        return request()->json(200,$contact);
    }

   
    public function store(Request $request)
    {
        //Mail::
        return $request->all();
    }

  
    public function show($id)
    {   
        //return $id;
        $contact = Connect::find($id);
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
