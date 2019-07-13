
@extends('layouts.admin')

@section('title','Dashboard')



@section('content')

	   @if(Session::has('message'))
      <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
    @endif
	
    @if(Session::has('deleted'))
      <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
    @endif

    

	<div class="right_col" role="main">

      <div class="x_panel">

         <div class="x_title">

              <span class="panel-title">
                <i class="fa fa-align-left"></i>
                Dashboard
              </span>       

         </div>

         <div class="x_content">
            <div class="row">
               <div class="col-md-6 col-xs-12">

                  <div class="panel panel-dz dashboard-post-page-comment-indicator">
                       <div class="panel-heading active">
                          <span class="panel-title">
                             <a data-toggle="collapse" href="#collapse1">
                               At a Glance                    
                             </a>
                             <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                          </span>
                          
                       </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                           <div class="panel-body open">
                              <span class="col-md-6 col-xs-12">
                                 <i class="fa fa-pencil-square"></i>
                                 <a href="">5 Posts</a>
                              </span>
                              <span class="col-md-6 col-xs-12">
                                 <i class="fa fa-paper-plane"></i>
                                 <a href=""> 9 Page</a>
                              </span>
                              <span class="col-md-6 col-xs-12">
                                 <i class="fa fa-comment"></i>
                                 <a href="">4 Comments</a>
                              </span>
                           </div>
                        </div>
                  </div>
               </div>
                
           </div>
         </div>
      </div>

   </div>
    
    
@endsection