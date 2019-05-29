
@extends('layouts.admin')

@section('title','Invoices')



@section('content')

  @if(Session::has('message'))
    <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
  @endif

  @if(Session::has('deleted'))
    <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
  @endif 

  <div class="right_col" role="main">
      <invoice  regno="{{setting('registration_number')}}"
                gstno="{{setting('gst_number')}}"
                gst="{{setting('gst_tax')}}" 
                due_date="{{setting('invoice_due_days')}}">            
          
  </div>



    
@endsection


@section('javascript')
  <!--script src="{{asset('public/vendor/dropzone/dist/min/dropzone.min.js')}}"></script-->
  <!--script src="{{asset('public/vendor/ck-editor/ck-editor.js')}}"></script-->
  <!--script src="https://cdn.ckeditor.com/4.11.2/standard-all/ckeditor.js"></script-->
  <script>
      $("#tags_1").select2();
      $(".select2").select2();


      $(".tags").select2({
        tags: true
      });

  </script>

 

                
@endsection