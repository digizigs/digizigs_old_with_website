
@extends('layouts.admin')

@section('title','Subscription')



@section('content')

  

  <div class="right_col" role="main">

        <div class="">
            
            <div class="row">
              

              

                <div class="clearfix"></div>

                @if(Session::has('message'))
                  <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
                @endif

                @if(Session::has('deleted'))
                  <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
                @endif

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <subscription></subscription>
                </div>
            </div>
        </div>
    </div>



    
@endsection
