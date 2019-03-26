
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
<<<<<<< HEAD
                    
                    @foreach($media as $med)
                      {{$med->uri}}
                    @endforeach

=======
                    <div class="col-md-55"><div class="thumbnail"><div class="image view view-first"><img src="C:/xampp/htdocs/digizigs/public/uploads/1553530837_feature-img3.jpg" style="width: 100%; display: block;"> <div class="mask"><p>Your Text</p> <div class="tools tools-bottom"><a href="#"><i class="fa fa-link"></i></a> <a href="#"><i class="fa fa-pencil"></i></a> <a href="#"><i class="fa fa-times"></i></a></div></div></div> <div class="caption"><p>Snow and Ice Incoming for the South</p></div></div></div>
>>>>>>> 773641c5a69c6c6902d0f664c31523165a439f31
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