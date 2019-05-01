
@extends('layouts.admin')

@section('title','Users')



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
	                    <a href="#adduser" class="btn btn-dark btn-sm pull-right" data-toggle="modal">Add User</a>
                      <div class="clearfix"></div>
	                  </div>

	                  <div class="x_content">

                      <div class="col-md-12 col-xs-12">
                        
                        <div class="panel-group pannel-line-group">
                          @foreach ($users as $user)


                          <div class="panel panel-default pannel-line" style="padding: 0 !important;">
                            <div class="panel-body" style="padding: 8px !important;">
                              <span class="user-name" >
                                
                                <i class="fa fa-user" aria-hidden="true" style="margin-right: 10px;color: green;"></i>
                                
                                <a href="">{{ $user->firstname }},{{ $user->lastname }}</a>
                              </span>
                              <span style="margin-left:10px; width: 20%;">
                                @foreach ($user->roles()->pluck('name') as $role)
                                  <a href=""><span class="label label-info label-many">{{ $role }}</span></a>
                                @endforeach
                              </span>
                              <span class="action-icons pull-right">
                                <a href="{{ route('users.edit',$user->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                  <i class="fa fa-pencil actionicon" aria-hidden="true"></i>
                                </a>
                                
                                <form action="{{ route('users.destroy' , $user->id ) }}" method="POST" class="delete-form">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <button style="background: none;border: none;" class="del" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o actionicon" aria-hidden="true"></i></button>
                                </form>
                              </span>
                              
                            </div>
                          </div>
                          
                          @endforeach
                        </div>
                      </div>

                      {{ $users->links() }}
                    
                                         							     
	                  </div>


                    <!--Add User mODAL-->
                    <div class="modal fade" id="adduser" role="dialog"  data-backdrop="false">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header panel-heading">
                            <button type="button" class="close" data-dismiss="modal" >&times;</button>
                            <h4 class="modal-title"><b>New User</b></h4>
                          </div>
                          <div class="modal-body">
                            
                            <form  role="form" class="form-horizontal" action=" {{ URL::route('users.store')}}" method="post">
                              {{ csrf_field() }}

                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12">
                                  <b><i><small>First Name</small></i></b>
                                  <input class="form-control input-sm" type="text" name="firstname" required="Please ente a Role Name">
                                </div>                
                              </div>

                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12">
                                  <b><i><small>Last Name</small></i></b>
                                  <input class="form-control input-sm" type="text" name="lastname" required="Please ente a Role Name">
                                </div>                
                              </div>

                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12">
                                  <b><i><small>Email</small></i></b>
                                  <input class="form-control input-sm" type="text" name="email" required="Please ente a Role Name">
                                </div>                
                              </div>

                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12">
                                  <b><i><small>Password</small></i></b>
                                  <input class="form-control input-sm" type="password" name="password" required="Please ente a Role Name">
                                </div>                
                              </div>

                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12">
                                  <b><i><small>Confirm Password</small></i></b>
                                  <input class="form-control input-sm" type="password" name="cpassword" required="Please ente a Role Name">
                                </div>                
                              </div>
                              
                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12">
                                  <b><i><small>Roles</small></i></b>
                                  <select class="form-control select2 select2-hidden-accessible input-sm" multiple=""  style="width: 100%;" tabindex="-1" aria-hidden="true" name="roles[]">
                                    @if (count($roles) > 0)
                                      @foreach ($roles as $role)
                                        <option>{{$role->name}}</option>
                                      @endforeach
                                    @endif                  
                                  </select>
                                </div>
                                
                              </div>
                              
                              
                              <button class="btn btn-dark btn-sm" >Add User</button>
                              
                            </form>
                            
                          </div>

                          
                        </div>
                      </div>
                    </div>

	                </div>
              	</div>
            </div>
          </div>
  </div>
    
@endsection

@section('javascript')
  
  <script>
      $("#tags_1").select2();
      $(".select2").select2();


      $(".tags").select2({
        tags: true
      });

  </script>
@endsection