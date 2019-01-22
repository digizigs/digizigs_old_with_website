
@extends('layouts.admin')

@section('title','Roles')



@section('content')

	

	<div class="right_col" role="main">

    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Access Roles <small></small></h3>
        </div>

        <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
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
                <a href="#addrole" class="btn btn-dark btn-sm" data-toggle="modal">Add Role</a>
                <div class="clearfix"></div>
              </div>

              <div class="x_content">

                <div class="table-responsive">
                  <table class="table table-striped jambo_table bulk_action">
                    <thead>
                      <tr class="headings">                             
                        <th class="column-title"> Role </th>
                        <th class="column-title"> Permissions </th>
                        <th class="column-title"> Edit </th>
                        <th class="column-title"> Delete </th>                            
                                                                            
                      </tr>
                    </thead>

                    <tbody>
        
                    
                      @if (count($roles) > 0)
                        @foreach ($roles as $role)
                          <tr class="role_item">
                            <td style="width: 30%;">{{ $role->name }}</td>
                            <td style="width: 60%;">
                                @foreach ($role->permissions()->pluck('name') as $permission)
                                    <span class="label label-info label-many">{{ $permission }}</span>
                                @endforeach
                            </td>
                            <td style="width: 5%;">                              
                              <a href="{{ route('roles.edit',$role->id) }}">
                                <i class="fa fa-pencil actionicon" aria-hidden="true"></i>
                              </a>  
                            </td>
                            <td style="width: 5%;">
                              <form action="{{ route('roles.destroy' , $role->id ) }}" method="POST" class="delete-form">
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

          <!--Add Role modal-->
            <div class="modal fade" id="addrole" role="dialog"  data-backdrop="false">
              <div class="modal-dialog modal-md">
                <div class="modal-content">
                  <div class="modal-header panel-heading">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h4 class="modal-title"><b>New Role</b></h4>
                  </div>
                  <div class="modal-body">
                    
                    <form  role="form" class="form-horizontal" action=" {{ URL::route('roles.store')}}" method="post">
                      {{ csrf_field() }}
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Role Name</label>
                        <div class="col-sm-10">
                          <input class="form-control" type="text" name="name" required="Please ente a Role Name">
                          <i><small>The name is how it appears.</small></i>
                        </div>
                        
                      </div>
                      
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Permission</label>
                        <div class="col-sm-10">
                          <select class="form-control select2 select2-hidden-accessible " multiple=""  style="width: 100%;" tabindex="-1" aria-hidden="true" name="permission[]">
                            @if (count($permissions) > 0)
                              @foreach ($permissions as $permission)
                                <option>{{$permission}}</option>
                              @endforeach
                            @endif                  
                          </select>
                        </div>
                        
                      </div>
                      
                      
                      <button class="btn btn-dark btn-sm" >Add Role</button>
                      
                    </form>
                    
                    
                  </div>

                
                  
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