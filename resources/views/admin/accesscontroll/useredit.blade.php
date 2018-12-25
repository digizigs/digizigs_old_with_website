@extends('layouts.admin')

@section('title','| Users')



@section('content')
  <section class="users ">

		<div class="main-content-header box-shadow box box-header">
	        <div class="row">
	    	              
	          <div class="col-md-6 col-xs-12 mp-0 alt-font">
	            <i class="fa fa-briefcase"></i><span> Users</span>
	          </div>
	          	  	         
	        </div>
	    </div>
		
		
		<div class="main-content-body box-shadow box">
		{!! Form::model($user, ['method' => 'PUT', 'route' => ['user.update', $user->id]]) !!}
	        <div class="row">       
		        <div class="col-xs-12 form-group">
	                {!! Form::label('firstname', 'Name*', ['class' => 'control-label']) !!}
	                {!! Form::text('firstname', old('firstname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
	                <p class="help-block"></p>
	                @if($errors->has('firstname'))
	                    <p class="help-block">
	                        {{ $errors->first('firstname') }}
	                    </p>
	                @endif
	            </div>
            </div>

            <div class="row">       
		        <div class="col-xs-12 form-group">
	                {!! Form::label('lastname', 'Name*', ['class' => 'control-label']) !!}
	                {!! Form::text('lastname', old('lastname'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
	                <p class="help-block"></p>
	                @if($errors->has('lastname'))
	                    <p class="help-block">
	                        {{ $errors->first('lastname') }}
	                    </p>
	                @endif
	            </div>
            </div>
	        
	        <div class="row">       
		        <div class="col-xs-12 form-group">
	                {!! Form::label('email', 'Email*', ['class' => 'control-label']) !!}
	                {!! Form::text('email', old('email'), ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
	                <p class="help-block"></p>
	                @if($errors->has('email'))
	                    <p class="help-block">
	                        {{ $errors->first('email') }}
	                    </p>
	                @endif
	            </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('password', 'Password', ['class' => 'control-label']) !!}
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('password'))
                        <p class="help-block">
                            {{ $errors->first('password') }}
                        </p>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 form-group">
                    {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
                    {!! Form::select('roles[]', $roles, old('roles') ? old('roles') : $user->roles()->pluck('name', 'name'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
                    <p class="help-block"></p>
                    @if($errors->has('roles'))
                        <p class="help-block">
                            {{ $errors->first('roles') }}
                        </p>
                    @endif
                </div>
            </div>

	        {!! Form::submit(trans('Update'), ['class' => 'btn btn-primary']) !!}
    		{!! Form::close() !!}

	    </div>
		
	
	
	</section>
@stop

@section('javascript')
	<script>



		$(document).ready(function(){
			$('.role_item').each(function(){
				$(this).click(function(event){
					console.log('Clicked');
				})
			});


		
    		$(".select2").select2();



		});
	</script>
@endsection