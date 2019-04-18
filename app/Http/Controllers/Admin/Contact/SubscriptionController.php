<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use App\Models\Contact;
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
        $subscriptions=Contact::orderby('created_at','desc')->where('type','newsletter')->paginate(10);
        return view('admin.pages.contact.subscription',compact('subscriptions'));
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
