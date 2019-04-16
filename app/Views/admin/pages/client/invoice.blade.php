
@extends('layouts.admin')

@section('title','Invoices')



@section('content')

  

  <div class="right_col" role="main"> 	
      <invoice></invoice>     
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