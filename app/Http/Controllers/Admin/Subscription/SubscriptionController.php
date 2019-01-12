<?php

namespace App\Http\Controllers\Admin\Subscription;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.connect.subscription');
    }

    
    /*public function getSubscription(){
        //return 'wola';
        $subscription=Subscription::orderby('created_at','desc')->get();
        return request()->json(200,$subscription);
    }*/

    public function create()
    {
        $subscription=Subscription::orderby('created_at','desc')->get();
        return request()->json(200,$subscription);
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        //
    }
}
