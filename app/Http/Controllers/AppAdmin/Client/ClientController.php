<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
   
    public function index() {
        
         return view('admin/pages.client.client');
    }

   
    public function create(Request $request) {


        if($request->search_string == ''){
            $clients = Client::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$clients);
        }else{
            $clients['data'] = Client::where('client_name','like', '%'.$request->search_string.'%')
                                ->orWhere('client_email','like', '%'.$request->search_string.'%')
                                ->orWhere('client_phone','like', '%'.$request->search_string.'%')
                                ->orderby('created_at','desc')->get();
            return request()->json(200,$clients);
        }

        //$clients = Client::orderby('created_at','desc')->paginate(8);
        //return request()->json(200,$clients);
    }

   
    public function store(Request $request) {   

        //return $request->all();
        
        /*$data = Validator::make($request->all(),[
e 
            'client_name'=>'required|max:255',
            'client_email'=>'required|max:255|email',
            'client_phone'=>'required|numeric',
        ],[
            'client_name.required' => 'Name of Client is required', 
            'client_email.required' => 'Email of client is required', 
            'client_phone.required' => 'Phone of client is required', 

        ])->Validate();*/

        $this->validate($request, [
            'client_email' => 'required|string|email|max:200',
            'client_name' => 'required|string|max:200',
            'client_phone' => 'required|numeric|min:7'
        ]);


        $client = new Client;
        $client->client_name = $request->client_name;
        $client->client_email = $request->client_email;
        $client->client_website = $request->client_website;
        $client->client_phone = $request->client_phone;

        $client->contact_name = $request->contact_name;    
        $client->contact_email = $request->contact_email;
        $client->contact_phone = $request->contact_phone;
        

        $client->address_line_1 = $request->address_line_1;
        $client->address_line_2 = $request->address_line_2;
        $client->address_street = $request->address_street;
        $client->address_city = $request->address_city;
        $client->address_state = $request->address_state;
        $client->address_postal = $request->address_postal;
        $client->address_country = $request->address_country;

        $client->public_note = $request->public_note;
        $client->private_note = $request->private_note;

        
        $client->save();

        //return redirect()->route('service.index')->with('message', 'Service added successfully');
        $clients = Client::orderby('created_at','desc')->paginate(8);
        return request()->json(200,$clients);
    }

  
    public function show($id) {
        //
    }

   
    public function edit($id) {

        $client = Client::find($id);
        return request()->json(200,$client);

    }

 
    public function update(Request $request, $id) {

        $this->validate($request, [
            'client_email' => 'required|string|email|max:200',
            'client_name' => 'required|string|max:200',
            'client_phone' => 'required|min:10|numeric'
        ]);

        $client = Client::find($id);
        
        $client->client_name = $request->client_name;
        $client->client_email = $request->client_email;
        $client->client_website = $request->client_website;
        $client->client_phone = $request->client_phone;

        $client->contact_name = $request->contact_name;
        $client->contact_email = $request->contact_email;
        $client->contact_phone = $request->contact_phone;
        

        //$client->address_line_1 = $request->address_line_1;
        //$client->address_line_2 = $request->address_line_2;
        //$client->address_street = $request->address_street;
        //$client->address_city = $request->address_city;
        //$client->address_state = $request->address_state;
        //$client->address_postal = $request->address_postal;
        //$client->address_country = $request->address_country;

        $client->public_note = $request->public_note;
        $client->private_note = $request->private_note;
        $client_save = $client->save();

        if($client_save){
            $clients = Client::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$clients);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::find($id);
        $is_deleted=$client->delete();
        if($is_deleted){
            $client = Client::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$client);
        }
    }
}
