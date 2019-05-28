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
       
        return view('admin/pages.client.invoice');
    }

    
    public function create()
    {
        
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

        $invoices = Invoice::orderby('created_at','desc')->with('client','invoice_item.service')->paginate(8);
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

        return $request->all();
        //$selected_services = $request->selectedservices;
        //$selected_lines= collect($request->selectedservices)->only('id');
        //$service_array = $selected_lines;
        /*$client_name = $request->selectedclient['client_name'];

        $this->validate($request, [
           'selectedclient['client_name']' => 'required|string|max:200',
        ]);
*/
   
        $invoice = new Invoice;
        $invoice->client_id = $request->selectedclient['id'];

        $invoice->tax = $request->invoice['tax'];
        $invoice->discount = $request->invoice['discount'];
        $invoice->bill_amount = $request->invoice['totalbill'];
        $invoice->bill_date = $request->dates['bill_date'];
        $invoice->due_date = $request->dates['due_date'];
        $saved = $invoice->save();

        $invoice_id = $invoice->id;
        $client_name = $request->selectedclient['client_name'];    
        //$invoice->services()->sync($request->selectedservices);
        
        //saving service lines
        foreach($request->selectedservices as $service){
            //$invoice->services()->sync($service['id']);
            $s_line = new Invoice_item;
            $s_line->invoice_id = $invoice->id;
            $s_line->service_id = $service['id'];
            $s_line->service_name = $service['name'];
            $s_line->service_description = $service['description'];
            $s_line->service_charge = $service['charge'];
            $s_line->save();            
            //return request()->json(200,$service['id']);
        }
        
        //Notification 
        $users = User::all();
        $newinvoice = collect(['title'=>'New invoice','body'=>'New invoice created for ' . $client_name ,'id'=>$invoice_id]);
        Notification::send($users, new NewInvoice($newinvoice));


        if($saved){
            $invoices = Invoice::orderby('created_at','desc')->with('client','invoice_item.service')->paginate(8);
            return request()->json(200,$invoices);
        }
               
    }

    
    public function show($id)
    {
        $invoicea = Invoice::where('id',$id)->with('client','invoice_item')->first();
        $items = Invoice::where('id',$id)->with('invoice_item')->get();
        //dd($invoice->client->client_name);

        $invoice = Invoice::where('id',$id)->first();
        $client = Invoice::find($id)->client()->first();
        $items = Invoice::find($id)->invoice_item()->get();

        $data = ['invoice'=>$invoice , 'client'=> $client , 'items'=>$items];
   

        return request()->json(200,$data);
    }

    
    public function edit($id)
    {          
        //$invoice = Invoice::where('id',$id)->with('client','invoice_item.service')->first();
        //return request()->json(200,$invoice);
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id){
        
        $invoice = Invoice::find($id);
        $is_deleted=$invoice->delete();

        if($is_deleted){
            $invoices = Invoice::orderby('created_at','desc')->with('client','invoice_item.service')->paginate(8);
            //dd($invoices);
            return request()->json(200,$invoices);
        }

    }
}
