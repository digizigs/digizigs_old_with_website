
@extends('layouts.admin')

@section('title','All Articles')



@section('content')

	

<div class="right_col" role="main">
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
        <div class="x_title">
          <span class="title"><i class="fa fa-user"></i> Products </span><small>All Contacts</small>
          <span class="" style="margin-top: 60px; padding: 40px;">
            <a href="">Inquiry</a> | <a href="">Subscriptions</a>
          </span>
          <div class="clearfix"></div>
        </div>

        <div class="x_content">
          
      
        </div>
      </div>
    </div>
  </div>

</div>



    
@endsection
