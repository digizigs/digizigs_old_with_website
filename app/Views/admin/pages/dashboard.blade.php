
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
      	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
        		<div class="x_panel">
        			<div class="x_title">	                   
	                    <h2><i class="fa fa-align-left"></i> Dashboard <small>Your app summary</small></h2>
	                    <div class="clearfix"></div>
	                </div>

	                <div class="x_content">
	                	
	                </div>
        		</div>
        	</div>
        </div>

    </div>
    
    
@endsection