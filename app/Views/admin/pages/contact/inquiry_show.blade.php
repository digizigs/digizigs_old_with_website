
@extends('layouts.admin')

@section('title','Inquiries)



@section('content')

	

	<div class="right_col" role="main">

        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Inquiry Details <small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
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
                      
	                      <form action="{{route('inquiry.update',$inquiry->id)}}" method="post">
                          @csrf
                          {{method_field('PUT')}}
                          <h3> <b>{{$inquiry->name}}</b><small> {{ Carbon\Carbon::parse($inquiry->created_at)->diffForHumans() }}</small></h3>
                          <input type="text" name="name" value="{{$inquiry->name}}" style="display: none">

                          <p> Email: {{$inquiry->email}}</p>
                          <input type="text" name="email" value="{{$inquiry->email}}" style="display: none">

                          <p> Contact: {{$inquiry->contact}}</p>
                          
                          <hr>
                          <h5>Message:</h5>
                          <p>{{$inquiry->message}}</p>
                          <input type="text" name="message" value="{{$inquiry->message}}" style="display: none">  

                          <hr>
                          <h4>Reply:</h4>
                          <div class="form-group">
                            <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                          </div>
                          <div class="form-group">
                            <a href="{{URL::previous()}}" class="btn btn-dark btn-sm">
                              <i class="fa fa-undo" aria-hidden="true"></i>
                               Back
                            </a>
                            <button class="btn btn-dark btn-sm pull-right">
                              <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                               Send
                            </button>
                          </div>
                         
                        </form>
	                  </div>

	                </div>
              	</div>
            </div>
        </div>
  	</div>



    
@endsection
