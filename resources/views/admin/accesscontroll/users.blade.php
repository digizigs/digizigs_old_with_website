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
						                  		<i class="fa fa-trash-o actionicon" aria-hidden="true" @click="deleterole(role.id)"></i>
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