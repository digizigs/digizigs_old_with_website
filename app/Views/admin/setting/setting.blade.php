
@extends('layouts.admin')

@section('title','All Articles')



@section('content')

	

	<div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>App Setting <small></small></h3>
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
	                	<div class="x_content">

                 			
			          

	                    <form method="post" action="{{ route('settings.store') }}" class="form-horizontal" role="form">
					        {!! csrf_field() !!}
								

								@if(count(config('setting_fields', [])) )
					            		@foreach(config('setting_fields') as $section => $fields)   
										<div class="x_panel">
						                    <div class="x_title">
						                    	
						                      	<h2>
						                      		<i class="{{ array_get($fields, 'icon', 'glyphicon glyphicon-flash') }}"></i>
						                      		{{ $fields['title'] }}
						                       		<small>{{ $fields['desc'] }}</small>
						                       	</h2>
						                      
						                     	<div class="clearfix"></div>
						                    </div>
							                <div class="x_content">
							                    @foreach($fields['elements'] as $field) 
				                                    @includeIf('admin.setting.fields.' . $field['type'] )
				                                @endforeach
							                </div>
						                </div>
					        	    @endforeach
				        		@endif         

								
					        

					        <div class="row m-b-md">
					            <div class="col-md-12">
					                <button class="btn-dark btn btn-sm pull-right">
					                    Save Settings
					                </button>
					            </div>
					        </div>
					    </form>
								      
                      	



                       
							     
	                  </div>
	                </div>
              	</div>
            </div>
          </div>
  </div>



    
@endsection
