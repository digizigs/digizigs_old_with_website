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
        return view('admin.pages.contact.subscription');
    }

    
    /*public function getSubscription(){
        //return 'wola';
        $subscription=Subscription::orderby('created_at','desc')->get();
        return request()->json(200,$subscription);
    }*/

    public function create()
    {
        $subscription=Contact::orderby('created_at','desc')->where('type','newsletter')->paginate(8);
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
        return 'edit';
    }

    
    public function update(Request $request, $id)
    {   
        if($request->action == 'subscribe'){

            $subscription = Contact::find($id);
            $subscription->status = 1;
            $subscription->save();

            $subscription=Contact::orderby('created_at','desc')->where('type','newsletter')->paginate(8);
            return request()->json(200,$subscription);

         }else{
            $subscription = Contact::find($id);
            $subscription->status = 0;
            $subscription->save();

            $subscription=Contact::orderby('created_at','desc')->where('type','newsletter')->paginate(8);
            return request()->json(200,$subscription);
         }
        
       
        /*if($request->action == 'subscribe'){
            
            $subscription = Contact::find($id);
            $subscription->status = 1;
            $subscription->save();

            $subscription=Contact::orderby('created_at','desc')->where('type','newsletter')->paginate(10);
            return request()->json(200,$subscription);

        }else{
            
            $subscription = Contact::find($id);
            $subscription->status = 0;
            $subscription->save();

            $subscription=Contact::orderby('created_at','desc')->where('type','newsletter')->paginate(10);
            return request()->json(200,$subscription);

        }*/
       
    }

    
    public function destroy($id)
    {
        //
    }
}
