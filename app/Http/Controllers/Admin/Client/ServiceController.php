<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Service::orderby('created_at','desc')->paginate(10);
        return view('admin.pages.client.service',compact('services'));
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

        $data = Validator::make($request->all(),[
            'service_name'=>'required|max:255',
            'service_desc'=>'required|max:255',
            'service_charge'=>'required|max:255',
            'service_duration'=>'required|max:255',     
        ],[
            'service_name.required' => 'Name of service is required', 
            'service_desc.required' => 'Description of service is required', 
            'service_charge.required' => 'Billing Charge of service is required', 
            'service_duration.required' => 'Duration for complition of service is required', 

        ])->Validate();

        $service = new Service;
        $service->name = $request->service_name;
        $service->description = $request->service_desc;
        $service->charge = $request->service_charge;
        $service->duration = $request->service_duration;
        $service->save();

        return redirect()->route('service.index')->with('message', 'Service added successfully');

     
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
