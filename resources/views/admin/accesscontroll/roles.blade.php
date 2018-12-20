@extends('layouts.admin')

@section('title','| Roles')



@section('content')
  <section class="roles ">

		<div class="main-content-header box-shadow box box-header">
	        <div class="row">
	    	              
	          <div class="col-md-6 col-xs-12 mp-0 alt-font">
	            <i class="fa fa-briefcase"></i><span> Roles</span>
	          </div>
	          	  	         
	        </div>
	    </div>
		
		
		<div class="main-content-body box-shadow box">     
	        <div class="row"> 
				
				<div class="col-md-6 col-xs-6">
					<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addrole">Add Role</button>
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
					                <th>Permissions</th>
					                <th>Actions</th>
			                	</tr>
		              		</thead>
			                <tbody>
			                	
			                	@if (count($roles) > 0)
									@foreach ($roles as $role)
										<tr class="role_item">
						                	<td>{{ $role->name }}</td>
						                  	<td>
												@foreach ($role->permissions()->pluck('name') as $permission)
			                                        <span class="label label-info label-many">{{ $permission }}</span>
			                                    @endforeach
						                  	</td>
						                  	<td>
						                  		<i class="fa fa-key actionicon" aria-hidden="true"></i> | 
						                  		<i class="fa fa-pencil actionicon" aria-hidden="true"></i> | 
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

	   

		<!--Add Role modal-->
		<div class="modal fade" id="addrole" role="dialog"  data-backdrop="false">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header ">
						<button type="button" class="close" data-dismiss="modal" >&times;</button>
						<h4 class="modal-title"><b>New Role</b></h4>
					</div>
					<div class="modal-body">
						
						<form  role="form" class="form-horizontal">
							<div class="form-group">
								<label class="col-sm-2 control-label">Role Name</label>
								<div class="col-sm-10">
									<input class="form-control" type="text"  >
									<i><small>The name is how it appears.</small></i>
								</div>
								
							</div>
							
							<div class="form-group">
								<label class="col-sm-2 control-label">Permission</label>
								<div class="col-sm-10">
									<select class="form-control select2 select2-hidden-accessible " multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
										<option>Alabama</option>
										<option>Alaska</option>
										<option>California</option>
										<option>Delaware</option>
										<option>Tennessee</option>
										<option>Texas</option>
										<option>Washington</option>
										</select>

									</div>
									
								</div>
								
							</form>
						</div>
						<div class="modal-footer">
							<button class="btn btn-primary btn-sm" >Add Role</button>
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