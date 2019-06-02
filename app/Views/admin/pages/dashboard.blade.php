
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
        <div class="nav navbar navbar-default" style="margin:0 !important"></div>
      	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
        		<div class="x_panel">
        			<div class="x_title">	                   
	                    <h2><i class="fa fa-align-left"></i> Dashboard <small>Your app summary</small></h2>
	                    <div class="clearfix"></div>
	                </div>

	                <div class="x_content">
	                	Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.


                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Magnam molestiae, veniam eius rem excepturi, ullam odio culpa, mollitia et aut sed unde nostrum accusamus, doloremque amet animi neque voluptatibus ratione.
	                </div>
        		</div>
        	</div>
        </div>

    </div>
    
    
@endsection