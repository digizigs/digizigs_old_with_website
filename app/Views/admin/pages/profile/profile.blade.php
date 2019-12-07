
@extends('layouts.admin')

@section('title','Profile')



@section('content')

	

	<div class="right_col" role="main">

            <div class="row">
              
                @if(Session::has('message'))
                  <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
                @endif

                @if(Session::has('deleted'))
                  <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
                @endif

                
                <profile></profile>
              	
            </div>
   </div>



    
@endsection
