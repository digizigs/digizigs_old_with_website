<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    
    public function index()
    {
        $invoices = Invoice::orderby('created_at','desc')->with('client','invoice_item.service')->get();
        //dd($invoices);
        return view('admin/pages.client.invoice');
    }

    
    public function create()
    {
        //return 'ok';
        $invoices = Invoice::orderby('created_at','desc')->with('client','invoice_item.service')->get();
        //dd($invoices);
        return request()->json(200,$invoices);
    }

     public function clients()
    {       
        $clients = Client::orderby('created_at','desc')->paginate(8);
        return request()->json(200,$clients);
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
        $invoice = Invoice::where('id',$id)->with('client','invoice_item.service')->first();
        return request()->json(200,$invoice);
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
