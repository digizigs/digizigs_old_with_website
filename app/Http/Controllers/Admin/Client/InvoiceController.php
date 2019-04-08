<?php

namespace App\Http\Controllers\Admin\Client;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    
    public function index()
    {
        $invoices = Invoice::orderby('created_at','desc')->with('client')->get();
        //dd($invoices);
        return view('admin/pages.client.invoice');
    }

    
    public function create()
    {
        //return 'ok';
        $invoices = Invoice::orderby('created_at','desc')->with('client')->get();
        //dd($invoices);
        return request()->json(200,$invoices);
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
