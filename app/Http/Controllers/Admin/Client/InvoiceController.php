<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use App\Models\Invoice_item;
use App\Models\Service;
use App\Notifications\NewInvoice;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class InvoiceController extends Controller
{
    
    public function index()
    {
        //$invoices = Invoice::orderby('created_at','desc')->with('client','invoice_item.service')->get();
        //dd($invoices['client']);
        return view('admin/pages.client.invoice');
    }

    
    public function create(Request $request)
    {
        
        $data = $request->filter;

        if($data == ''){

            $invoices = Invoice::orderby('created_at','desc')
                                ->where('type','invoice')
                                ->with('client','invoice_item.service')
                                ->paginate(7);
            return request()->json(200,$invoices);

        } elseif($data == 'pending'){

            $invoices['data'] = Invoice::where('bill_status',$data)
                                ->where('type','invoice')
                                ->orderby('created_at','desc')
                                ->with('client','invoice_item.service')
                                ->get();
            return request()->json(200,$invoices);

        }elseif($data == 'paid'){

            $invoices['data'] = Invoice::where('bill_status',$data)
                                ->where('type','invoice')
                                ->orderby('created_at','desc')
                                ->with('client','invoice_item.service')
                                ->get();
            return request()->json(200,$invoices);

        }elseif($data == 'partial'){

            $invoices['data'] = Invoice::where('bill_status',$data)
                                ->where('type','invoice')
                                ->orderby('created_at','desc')
                                ->with('client','invoice_item.service')
                                ->get();
            return request()->json(200,$invoices);
            
        }else{
            $invoices['data'] = Invoice::where('type','invoice')
                                ->with('client','invoice_item.service')
                                ->whereHas('client', function ($query) use ($data) {
                                    $query->where('client_name','like', '%'.$data.'%')
                                          ->orWhere('client_email','like', '%'.$data.'%')
                                          ->orWhere('client_phone','like', '%'.$data.'%')
                                          ->orWhere('id','like', '%'.$data.'%');
                                    })
                                ->orderBy('created_at', 'DESC')
                                ->get();//$request->filter;
            return request()->json(200,$invoices);
        }






        /*if($request->search_string == ''){
            $invoices = Client::orderby('created_at','desc')->paginate(8);
            return request()->json(200,$clients);
        }else{
            $invoices['data'] = Client::where('client_name','like', '%'.$request->search_string.'%')
                                ->orWhere('client_email','like', '%'.$request->search_string.'%')
                                ->orWhere('client_phone','like', '%'.$request->search_string.'%')
                                ->orderby('created_at','desc')->get();
            return request()->json(200,$clients);
        }*/

        $invoices = Invoice::orderby('created_at','desc')
                            ->where('type','invoice')
                            ->with('client','invoice_item.service')
                            ->paginate(7);
        //dd($invoices);
        return request()->json(200,$invoices);
    }

    public function clients()
    {       
        $clients = Client::orderby('created_at','desc')->get();
        return request()->json(200,$clients);
    }

    public function services()
    {       
        $services = Service::orderby('created_at','desc')->get();
        return request()->json(200,$services);
    }

   
    public function store(Request $request) {

        
        $invoice = new Invoice;
        $invoice->client_id = $request->client['id'];
        $invoice->tax = $request->tax;
        $invoice->discount = $request->discount;
        $invoice->bill_amount = $request->totalbill;
        $invoice->net_bill_amount = $request->netbill;
        $invoice->bill_date = $request->billdate;
        $invoice->due_date = $request->duedate;
        $invoice->type = 'invoice';
        $saved = $invoice->save();

        

        $invoice_id = $invoice->id;
        $client_name = $request->client['client_name'];    
       
        foreach($request->services as $service){
            
            $s_line = new Invoice_item;
            $s_line->invoice_id = $invoice->id;
            $s_line->service_id = $service['id'];
            $s_line->name = $service['name'];
            $s_line->description = $service['description'];
            $s_line->charge = $service['charge'];
            $s_line->tax = $service['tax'];
            $s_line->save();            
            
        }
        
        //Notification 
        $users = User::all();
        $newinvoice = collect(['title'=>'New invoice','body'=>'New invoice created for ' . $client_name ,'id'=>$invoice_id]);
        Notification::send($users, new NewInvoice($newinvoice));


        if($saved){
            $invoices = Invoice::orderby('created_at','desc')->where('type','invoice')->with('client','invoice_item.service')->paginate(7);
            return request()->json(200,$invoices);
        }
               
    }

    
    public function show($id) {

        $invoicea = Invoice::where('id',$id)->where('type','invoice')->with('client','invoice_item')->first();
        $items = Invoice::where('id',$id)->with('invoice_item')->get();
        //dd($invoice->client->client_name);

        $invoice = Invoice::where('id',$id)->first();
        $client = Invoice::find($id)->client()->first();
        $items = Invoice::find($id)->invoice_item()->get();

        $data = ['invoice'=>$invoice , 'client'=> $client , 'items'=>$items];
   

        return request()->json(200,$data);
    }

    
    public function edit($id) {
              
        $invoicea = Invoice::where('id',$id)->with('client','invoice_item')->first();
        $items = Invoice::where('id',$id)->with('invoice_item')->get();
        //dd($invoice->client->client_name);

        $invoice = Invoice::where('id',$id)->first();
        $client = Invoice::find($id)->client()->first();
        $items = Invoice::find($id)->invoice_item()->get();

        $data = ['invoice'=>$invoice , 'client'=> $client , 'items'=>$items];
   

        return request()->json(200,$data);
    }

   
    public function update(Request $request, $id)
    {
        $invoice = Invoice::find($id);
        $invoice->client_id = $request->client['id'];
        $invoice->tax = $request->tax;
        $invoice->discount = $request->discount;
        $invoice->bill_amount = $request->totalbill;
        $invoice->net_bill_amount = $request->netbill;
        $invoice->bill_date = $request->billdate;
        $invoice->due_date = $request->duedate;
        $saved = $invoice->save();
        
       
        $lines = Invoice_item::where('invoice_id',$invoice->id)->delete();

        //return $request->services;

        foreach($request->services as $service){
            
            $s_line = new Invoice_item;
            $s_line->invoice_id = $invoice->id;
            $s_line->service_id = $service['service_id'];
            $s_line->name = $service['name'];
            $s_line->description = $service['description'];
            $s_line->charge = $service['charge'];
            $s_line->tax = $service['tax'];
            $s_line->save();            
            
        }

        if($saved){
            $invoices = Invoice::orderby('created_at','desc')
                                ->where('type','invoice')
                                ->with('client','invoice_item.service')
                                ->paginate(8);
            return request()->json(200,$invoices);
        }
    }

    
    public function destroy($id){
        
        $invoice = Invoice::find($id);
        $is_deleted=$invoice->delete();

        if($is_deleted){
            $invoices = Invoice::orderby('created_at','desc')
                                ->where('type','invoice')
                                ->with('client','invoice_item.service')
                                ->paginate(8);
            //dd($invoices);
            return request()->json(200,$invoices);
        }

    }
}
