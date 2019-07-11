
@extends('layouts.admin')

@section('title','Quotation')



@section('content')

  

  <div class="right_col" role="main">
      	<quotation regno="{{setting('registration_number')}}"
                gstno="{{setting('gst_number')}}"
                gst="{{setting('gst_tax')}}" 
                due_date="{{setting('invoice_due_days')}}">
  </div>



    
@endsection
