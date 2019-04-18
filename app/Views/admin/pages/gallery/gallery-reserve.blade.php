
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

                @if(Session::has('message'))
                  <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
                @endif

                @if(Session::has('deleted'))
                  <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
                @endif

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <!--div class="x_title">                     
                      <h2><i class="fa fa-align-left"></i> Options <small>App settings Options</small></h2>
                      <div class="clearfix"></div>
                    </div-->

                    <div class="x_content">
                      <div class="row">

                        @if(Session::has('message'))
                          <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
                        @endif

                        @if(Session::has('deleted'))
                          <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
                        @endif


                        <div class="col-md-12">
                          
                          
                          <ul class="nav nav-tabs">
                            <li class="active"><a data-toggle="tab" href="#all">All Media</a></li>
                            <li><a data-toggle="tab" href="#new">Add New</a></li>
                            
                          </ul>

                          <div class="tab-content">

                            <div id="all" class="tab-pane fade in active">
                              <div class="row" style="padding: 10px;">

                              @foreach($media as $med)

                                

                                <div class="col-md-55">
                                  <div class="thumbnail">
                                    <div class="image view view-first">
                                      <img style="width: 100%; display: block;" src="{{asset('public/uploads/' . $med->filename)}}" alt="image">
                                      <div class="mask">
                                        <p>Your Text</p>
                                        <div class="tools tools-bottom">
                                          <a href="#"><i class="fa fa-link"></i></a>
                                          <a href="#"><i class="fa fa-pencil"></i></a>
                                          <a href="#"><i class="fa fa-times"></i></a>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="caption">
                                      <p>{{ $med->filename }}</p>
                                    </div>
                                  </div>
                                </div>


                              @endforeach

                             
                              
                            </div>
                            </div>

                            <div id="new" class="tab-pane fade">
                              <form method="post" action="{{route('gallery.store')}}" enctype="multipart/form-data" 
                                                class="dropzone" id="dropzone">
                                  @csrf
                              </form>   
                            </div>
                        
                          </div>
                          

                            

                            
                            
                          

                        </div>
                        
                      </div>

                    </div>

                  </div>
                </div>
            </div>
        </div>
    </div>



    
@endsection


@section('javascript')
  
  <script>
      Dropzone.options.dropzone =
         {
            maxFilesize: 12,
            renameFile: function(file) {
                var dt = new Date();
                var time = dt.getTime();
               return time+file.name;
            },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            dictRemoveFile: 'Remove file',
            timeout: 5000,
            success: function(file, response) 
            {
                console.log(response);
            },
            error: function(file, response)
            {
               return false;
            }
};
  </script>
@endsection