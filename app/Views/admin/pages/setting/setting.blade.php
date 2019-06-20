
@extends('layouts.admin')

@section('title','Settings')



@section('content')

	

	<div class="right_col" role="main">

        <div class="">
            

            <div class="row">
              

              

              	<div class="clearfix"></div>

                 @include('admin.partials.alerts')
				
             
              	<div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
	                	<div class="x_content">

                 			
			          

	                    <form method="post" action="{{ route('settings.store') }}" class="form-horizontal" role="form">
					        {!! csrf_field() !!}
								

								@if(count(config('setting_fields', [])) )
					            		@foreach(config('setting_fields') as $section => $fields)   
										<div class="x_panel">
						                    <div class="x_title">
						                    		
						                    		<span class="title">
										              <i class="{{ array_get($fields, 'icon', 'glyphicon glyphicon-flash') }}"></i>
										               {{ $fields['title'] }} <small></small> 
										            </span>
										            <span class="subtitle">
										            	{{ $fields['desc'] }}
										            </span>
						                      
						                     	<div class="clearfix"></div>
						                    </div>
							                <div class="x_content">
							                    @foreach($fields['elements'] as $field) 
				                                    <div class="col-md-10 col-xs-12 ">@includeIf('admin.pages.setting.fields.' . $field['type'] )</div>
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
