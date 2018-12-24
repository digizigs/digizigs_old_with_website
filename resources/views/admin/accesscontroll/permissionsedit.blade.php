@extends('layouts.admin')

@section('title','| Permissions')



@section('content')
	<section class="permissions">
		
		@if(Session::has('message'))
			<p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
		@endif

		@if(Session::has('deleted'))
			<p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
		@endif


		<div class="main-content-header box-shadow box">
			<div class="row">
				
				<div class="col-md-6 col-xs-12 mp-0 alt-font">
					<i class="fa fa-key"></i><span>Edit Permissions</span>
				</div>
				
			</div>
		</div>
		
		
		<div class="main-content-body box-shadow box">
			{!! Form::model($permission, ['method' => 'PUT', 'route' => ['permission.update', $permission->id]]) !!}

				<div class="row">
	                <div class="col-xs-12 form-group">
	                    {!! Form::label('name', 'Name*', ['class' => 'control-label']) !!}
	                    {!! Form::text('name', old('title'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
	                    <p class="help-block"></p>
	                    @if($errors->has('name'))
	                        <p class="help-block">
	                            {{ $errors->first('name') }}
	                        </p>
	                    @endif
	                </div>
	            </div>

            {!! Form::submit(trans('Update Permission'), ['class' => 'btn btn-primary']) !!}
    		{!! Form::close() !!}
		</div>

	</section>
@endsection

@section('javascript')
	<script>
		$(document).ready(function(){
			
			setTimeout(function() {
			    $('#successMessage').fadeOut('fast');
			}, 30000); 

			//$("#successMessage").delay(3000).slideUp(300);

			window.setTimeout(function() {
			    $("#successMessage").fadeTo(500, 0).slideUp(500, function(){
			        $(this).remove(); 
			    });
			}, 2000);

		});
	</script>
@endsection