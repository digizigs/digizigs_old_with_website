
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
        	<div class="col-xs-12 col-md-3 col-lg-3">
                <div class="mat-card bg-c-yellow update-card">
                    <div class="card-block">
                        <div class="row align-items-end">
                            <div class="col-8">
                                <h4 class="text-white">$30200</h4>
                                <h6 class="text-white m-b-0">Live Visitor(s)</h6>
                            </div>
                            <div class="col-4 text-right"><iframe class="chartjs-hidden-iframe" tabindex="-1" style="display: block; overflow: hidden; border: 0px; margin: 0px; top: 0px; left: 0px; bottom: 0px; right: 0px; height: 100%; width: 100%; position: absolute; pointer-events: none; z-index: -1;"></iframe>
                                <canvas id="update-chart-1" height="62" style="display: block; height: 50px; width: 32px;" width="40"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <p class="text-white m-b-0"><i class="feather icon-clock text-white f-14 m-r-10"></i>update : 2:15 am</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    
@endsection