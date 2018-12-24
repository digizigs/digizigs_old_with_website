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
	        <div class="row"> 
				
				<div class="col-md-6 col-xs-6">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addrole"><i class="fa fa-plus"></i> Add User</button>
				</div>
				
				


				<div class="col-md-6 col-xs-6">
					<div class="input-group input-group-sm" >
	                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
				</div>


				<div class="col-md-12">
					
					<div class="box-body table-responsive no-padding" >					
		              	<table class="table table-hover" style="margin-top:20px;">

		              		<thead>
		              			<tr>
					                <th>Name</th>
					                <th>Email</th>
					                <th>Roles</th>
					                <th>Actions</th>
			                	</tr>
		              		</thead>
			                <tbody>
			                	
			                	@if (count($users) > 0)
									@foreach ($users as $user)
										<tr class="role_item">
						                	<td>{{ $user->firstname }},{{ $user->lastname }}</td>
						                	<td>{{ $user->email }}</td>
						                  	<td>
												@foreach ($user->roles()->pluck('name') as $role)
			                                        <span class="label label-info label-many">{{ $role }}</span>
			                                    @endforeach
						                  	</td>
						                  	<td>						                  
						                  		<i class="fa fa-pencil actionicon" aria-hidden="true"></i>
						                  		<span class="role-action-seperator">|</span> 
						                  		<form action="{{ route('user.destroy' , $user->id ) }}" method="POST" style="display: inline-block;">
												    {{ csrf_field() }}
												    {{ method_field('DELETE') }}
												    <button style="background: none;border: none;"><i class="fa fa-trash-o actionicon" aria-hidden="true"></i></button>
												</form>
						                  	</td>                 
						                </tr>
									@endforeach
			                	@endif
				               
		              		</tbody>
		          		</table>
	            	</div>
				</div>
				
			
	        </div>
	        
	    </div>
		

		<!--Add User-->
		<!--Add Role modal-->
		<div class="modal fade" id="addrole" role="dialog"  data-backdrop="false">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header panel-heading">
						<button type="button" class="close" data-dismiss="modal" >&times;</button>
						<h4 class="modal-title"><b>New User</b></h4>
					</div>
					<div class="modal-body">
						
						{!! Form::open(['method' => 'POST', 'route' => ['user.store']]) !!}

						<div class="row">
			                <div class="col-xs-12 form-group">
			                    {!! Form::label('firstname', 'First Name*', ['class' => 'control-label']) !!}
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
			                    {!! Form::label('lastname', 'Last Name*', ['class' => 'control-label']) !!}
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
			                    @if($errors->has('eamil'))
			                        <p class="help-block">
			                            {{ $errors->first('email') }}
			                        </p>
			                    @endif
			                </div>
			            </div>

			            <div class="row">
			                <div class="col-xs-12 form-group">
			                    {!! Form::label('password', 'Password*', ['class' => 'control-label']) !!}
			                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
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
			                    {!! Form::label('cpassword', 'Confirm Password*', ['class' => 'control-label']) !!}
			                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => '', 'required' => '']) !!}
			                    <p class="help-block"></p>
			                    @if($errors->has('cpassword'))
			                        <p class="help-block">
			                            {{ $errors->first('cpassword') }}
			                        </p>
			                    @endif
			                </div>
			            </div>

			            <div class="row">
			                <div class="col-xs-12 form-group">
			                    {!! Form::label('roles', 'Roles*', ['class' => 'control-label']) !!}
			                    {!! Form::select('roles[]', $roles, old('roles'), ['class' => 'form-control select2', 'multiple' => 'multiple', 'required' => '']) !!}
			                    <p class="help-block"></p>
			                    @if($errors->has('roles'))
			                        <p class="help-block">
			                            {{ $errors->first('roles') }}
			                        </p>
			                    @endif
			                </div>
			            </div>


						{!! Form::submit(trans('Add User'), ['class' => 'btn btn-primary']) !!}
    					{!! Form::close() !!}
						
					</div>

					<div class="modal-footer">
						
					</div>
					
				</div>
			</div>
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