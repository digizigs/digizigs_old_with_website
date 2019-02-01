<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         return view('admin/pages.client.client');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::orderby('created_at','desc')->paginate(8);
        return request()->json(200,$clients);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        
        $data = Validator::make($request->all(),[

            'clientname'=>'required|max:255',
            'clientemail'=>'required|max:255',
            'contact_name'=>'required|max:255',
            'contact_email'=>'required|max:255',     
            'contact_phone'=>'required|max:255',     
        ],[
            'clientname.required' => 'Name of service is required', 
            'clientemail.required' => 'Description of service is required', 
            'contact_name.required' => 'Billing Charge of service is required', 
            'contact_email.required' => 'Duration for complition of service is required',
            'contact_phone.required' => 'Duration for complition of service is required',  

        ])->Validate();


        $client = new Client;
        $client->clientname = $request->clientname;
        $client->clientemail = $request->clientemail;
        $client->contact_name = $request->contact_name;
        $client->contact_email = $request->contact_email;
        $client->contact_phone = $request->contact_phone;
        $client->address = $request->address;
        $client->save();

        //return redirect()->route('service.index')->with('message', 'Service added successfully');
        $clients = Client::orderby('created_at','desc')->paginate(8);
        return request()->json(200,$clients);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
