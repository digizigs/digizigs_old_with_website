@extends('layouts.admin')

@section('title','| Profile')



@section('content')
	
	
  	<section class="roles ">
		
		@if(Session::has('message'))
			<p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
		@endif


		@if(Session::has('deleted'))
			<p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
		@endif

		<div class="main-content-header box-shadow box box-header">
	        <div class="row">
	    	              
	          <div class="col-md-6 col-xs-12 mp-0 alt-font">
	            <i class="fa fa-briefcase"></i><span> Profile</span>
	          </div>
	          	  	         
	        </div>
	    </div>
		
		
		<div class="main-content-body box-shadow box">     
	        
	        <section class="content">

		      	<div class="row">

			        <div class="col-md-3">
				        <!-- Profile Image -->
				        <div class="box box-primary">
				            <div class="box-body box-profile">
				              <img class="profile-user-img img-responsive img-circle" src="" alt="User profile picture">

				              <h3 class="profile-username text-center">Nina Mcintire</h3>

				              <p class="text-muted text-center">Software Engineer</p>

				              <ul class="list-group list-group-unbordered">
				                <li class="list-group-item">
				                  <b>Followers</b> <a class="pull-right">1,322</a>
				                </li>
				                <li class="list-group-item">
				                  <b>Following</b> <a class="pull-right">543</a>
				                </li>
				                <li class="list-group-item">
				                  <b>Friends</b> <a class="pull-right">13,287</a>
				                </li>
				              </ul>

				              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
				            </div>
				            <!-- /.box-body -->
				        </div>

				        <div class="box box-primary">
				            <div class="box-header with-border">
				              <h3 class="box-title">About Me</h3>
				            </div>
				            <!-- /.box-header -->
				            <div class="box-body">
				              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

				              <p class="text-muted">
				                B.S. in Computer Science from the University of Tennessee at Knoxville
				              </p>

				              <hr>

				              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

				              <p class="text-muted">Malibu, California</p>

				              <hr>

				              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

				              <p>
				                <span class="label label-danger">UI Design</span>
				                <span class="label label-success">Coding</span>
				                <span class="label label-info">Javascript</span>
				                <span class="label label-warning">PHP</span>
				                <span class="label label-primary">Node.js</span>
				              </p>

				              <hr>

				              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

				              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
				            </div>
				            <!-- /.box-body -->
				          </div>        
			        </div><!--Col-md-3-->
		      		

		      		<div class="col-md-9">
				          				              				              
		              	<div class="tab-pane" id="settings">
			                <form class="form-horizontal" method="post" action="{{route('profile.store')}}" enctype="multipart/form-data">
			                	@csrf

			                  <div class="form-group">
			                    <label for="inputName" class="col-sm-2 control-label">Name</label>

			                    <div class="col-sm-10">
			                      <input type="email" class="form-control input-sm" id="inputName" placeholder="Name">
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

			                    <div class="col-sm-10">
			                      <input type="email" class="form-control input-sm" id="inputEmail" placeholder="Email">
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label for="inputName" class="col-sm-2 control-label">Name</label>

			                    <div class="col-sm-10">
			                      <input type="text" class="form-control input-sm" id="inputName" placeholder="Name">
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

			                    <div class="col-sm-10">
			                      <textarea class="form-control input-sm" id="inputExperience" placeholder="Experience"></textarea>
			                    </div>
			                  </div>
			                  <div class="form-group">
			                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

			                    <div class="col-sm-10">
			                      <input type="text" class="form-control input-sm" id="inputSkills" placeholder="Skills">
			                    </div>
			                  </div>

			                  <div class="form-group">
			                    <label for="inputSkills" class="col-sm-2 control-label">Profile Image</label>

			                    <div class="col-sm-10">
			                      <div class="custom-file ">
								    <input type="file" class="custom-file-input form-control input-sm" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="profilepic">
								  </div>
			                    </div>
			                  </div>

			                 
			                  <div class="form-group">
			                    <div class="col-sm-offset-2 col-sm-10">
			                      <button type="submit" class="btn btn-primary">Submit</button>
			                    </div>
			                  </div>
			                </form>
		              	</div>

		              	
				        
				       

				    </div><!--Col-md-9-->
		      	</div><!--Row-->
		     

		    </section>
	        
	    </div>



	</section>
@stop

@section('javascript')
	<script>



		$(document).ready(function(){
			$('.role_item').each(function(){
				$(this).click(function(event){
					//console.log('Clicked');
				})
			});


		
    		$(".select2").select2();

    		window.setTimeout(function() {
			    $("#successMessage").fadeTo(500, 0).slideUp(500, function(){
			        $(this).remove(); 
			    });
			}, 2000);

		});
	</script>
@endsection