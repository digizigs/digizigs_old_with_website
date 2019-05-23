
@extends('layouts.admin')

@section('title',$user->firstname)



@section('content')

	

	<div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>User Management <small></small></h3>
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
	                           
	                    <div class="x_title">
                        <h2>User Management <small>Assign role to user</small></h2>
                        <div class="clearfix"></div>
               
	                  </div>

	                  <div class="x_content">

	                     {!! Form::model($user, ['method' => 'PUT', 'route' => ['users.update', $user->id]]) !!}
                        <div class="row">       
                          <div class="col-xs-12 form-group glow-input">
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
                          <div class="col-xs-12 form-group glow-input">
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
                          <div class="col-xs-12 form-group glow-input">
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


                          



                        {!! Form::submit(trans('Update'), ['class' => 'btn btn-dark btn-sm']) !!}
                      {!! Form::close() !!}
                       
							     
	                  </div>
	                </div>
              	</div>
            </div>
          </div>
  </div>
    
@endsection

@section('javascript')
  <script src="{{asset('public/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  <script>
      $("#tags_1").select2();
      $(".select2").select2();


      $(".tags").select2({
        tags: true
      });

  </script>
@endsection