@extends('layouts.admin')

@section('title','| Users')



@section('content')

	@if(Session::has('message'))
		<p class="alert alert-info info-alert" id="successMessage">{{ Session::get('message') }}</p>
	@endif


	@if(Session::has('deleted'))
		<p class="alert alert-danger info-alert" id="successMessage">{{ Session::get('deleted') }}</p>
	@endif

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
				

				<!--div class="col-md-6 col-xs-6">
					<div class="input-group input-group-sm" >
	                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
				</div-->


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
						                  		<a href="{{ route('user.edit',$user->id) }}">
						                  			<i class="fa fa-pencil actionicon" aria-hidden="true"></i>
						                  		</a>
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
		<div class="modal fade" id="addrole" role="dialog"  data-backdrop="false">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header panel-heading">
						<button type="button" class="close" data-dismiss="modal" >&times;</button>
						<h4 class="modal-title"><b>New User</b></h4>
					</div>
					<div class="modal-body">
						
						<form  role="form" class="form-horizontal" action=" {{ URL::route('user.store')}}" method="post">
							{{ csrf_field() }}

							<div class="form-group">
								<label class="col-sm-2 control-label">First Name</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="firstname" required="Please ente a Role Name">
									<i><small>The name is how it appears.</small></i>
								</div>								
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Last Name</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="lastname" required="Please ente a Role Name">
									<i><small>The name is how it appears.</small></i>
								</div>								
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Email</label>
								<div class="col-sm-10">
									<input class="form-control" type="text" name="email" required="Please ente a Role Name">
									<i><small>The name is how it appears.</small></i>
								</div>								
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Password</label>
								<div class="col-sm-10">
									<input class="form-control" type="password" name="password" required="Please ente a Role Name">
									<i><small>The name is how it appears.</small></i>
								</div>								
							</div>

							<div class="form-group">
								<label class="col-sm-2 control-label">Confirm Password</label>
								<div class="col-sm-10">
									<input class="form-control" type="password" name="cpassword" required="Please ente a Role Name">
									<i><small>The name is how it appears.</small></i>
								</div>								
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Roles</label>
								<div class="col-sm-10">
									<select class="form-control select2 select2-hidden-accessible " multiple=""  style="width: 100%;" tabindex="-1" aria-hidden="true" name="roles[]">
										@if (count($roles) > 0)
											@foreach ($roles as $role)
												<option>{{$role}}</option>
											@endforeach
										@endif									
									</select>
								</div>
								
							</div>
							
							
							<button class="btn btn-primary btn-sm" >Add User</button>
							
						</form>
						

						
						
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

    		window.setTimeout(function() {
			    $(".info-alert").fadeTo(500, 0).slideUp(500, function(){
			        $(this).remove(); 
			    });
			}, 2000);

		});
	</script>
@endsection