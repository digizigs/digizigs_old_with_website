<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
   
    public function index() {
        $services = Service::orderby('created_at','desc')->paginate(10);
        return view('admin.pages.client.service',compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $services = Service::orderby('created_at','desc')->paginate(8);
        return request()->json(200,$services);
    }

  
    public function store(Request $request) {

       
        $data = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'desc'=>'required|max:255',
            'bill'=>'required|max:255',
            'tat'=>'required|max:255',     
        ],[
            'name.required' => 'Name of service is required', 
            'desc.required' => 'Description of service is required', 
            'bill.required' => 'Billing Charge of service is required', 
            'tat.required' => 'Duration for complition of service is required', 

        ])->Validate();

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

        $data = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'description'=>'required|max:255',
            'charge'=>'required|max:255',
            'duration'=>'required|max:255',     
        ],[
            'name.required' => 'Name of service is required', 
            'description.required' => 'Description of service is required', 
            'charge.required' => 'Billing Charge of service is required', 
            'duration.required' => 'Duration for complition of service is required', 

        ])->Validate();

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
