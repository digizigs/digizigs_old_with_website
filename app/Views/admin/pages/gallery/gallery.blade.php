
@extends('layouts.admin')

@section('title','Gallery')



@section('content')

  

  <div class="right_col" role="main">

        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Media Library <small></small></h3>
              </div>
 
            </div>

            <div class="clearfix"></div>

            <div class="row">
              
              
              <div class="clearfix"></div>
                

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">                   
                  <div class="x_content">

                    <gallery></gallery>

                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>



    
@endsection


@section('javascript')
  
  <script>
      
  </script>
@endsection