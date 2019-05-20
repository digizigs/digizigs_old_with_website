<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
   
    public function index() {
        
        return view('admin.pages.client.service');
    }

  
    public function create(Request $request) {

       

        if($request->search_string == ''){

            $services = Service::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$services);

        }else{

            $services['data'] = Service::where('name','like', '%'.$request->search_string.'%')
                                ->orWhere('description','like', '%'.$request->search_string.'%')                               
                                ->orderby('created_at','desc')->get();
            return request()->json(200,$services);

        }


        
    }

  
    public function store(Request $request) {

        

        $this->validate($request,[
            'name'=>'required|max:255',
            'desc'=>'required|max:255',
            'bill'=>'required|numeric',
            'tat'=>'required|numeric',     
        ],[
            'name.required' => 'Name of service is required', 
            'desc.required' => 'Description of service is required', 
            'bill.required' => 'Billing Charge of service is required', 
            'tat.required' => 'Duration for complition of service is required', 

        ]);

        $service = new Service;
        $service->name = $request->name;
        $service->description = $request->desc;
        $service->charge = $request->bill;
        $service->duration = $request->tat;
        $service->save();

        //return redirect()->route('service.index')->with('message', 'Service added successfully');
        $services = Service::orderby('created_at','desc')->paginate(8);
        return request()->json(200,$services);

     
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id) {   

        $service = Service::find($id);
        return request()->json(200,$service);
    }

   
    public function update(Request $request, $id) {

        

        $this->validate($request,[
            'name'=>'required|max:255',
            'description'=>'required|max:255',
            'charge'=>'required|numeric',
            'duration'=>'required|numeric',     
        ],[
            'name.required' => 'Name of service is required', 
            'description.required' => 'Description of service is required', 
            'charge.required' => 'Billing Charge of service is required', 
            'duration.required' => 'Duration for complition of service is required', 

        ]);

        $service = Service::find($id);
        $service->name = $request->name;
        $service->description = $request->description;
        $service->charge = $request->charge;
        $service->duration = $request->duration;
        $service_save = $service->save();

        if($service_save){
            $services = Service::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$services);
        }
    }

    
    public function destroy($id) {

        $service = Service::find($id);
        $is_deleted=$service->delete();
        if($is_deleted){
            $services = Service::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$services);
        }
    }
}
