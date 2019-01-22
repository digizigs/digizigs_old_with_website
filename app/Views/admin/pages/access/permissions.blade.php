
@extends('layouts.admin')

@section('title','Permission')



@section('content')

	

  
   

	<div class="right_col" role="main">
   
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Permissions <small></small></h3>
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
	                    <a href="#addpermission" class="btn btn-dark btn-sm" data-toggle="modal">Add Permission</a>
	                    <div class="clearfix"></div>
	                  </div>

	                  <div class="x_content">

	                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">                             
                              <th class="column-title"> Permissions </th>
                              <th class="column-title"> Edit </th>                             
                              <th class="column-title"> Delete </th>                                                   
                            </tr>
                          </thead>

                          <tbody>
              
                            @if (count($permissions) > 0)
                              @foreach ($permissions as $permission)
                                <tr id="{{ $permission->id }}">
                                  <td style="width: 90%;">{{ $permission->name }}</td>
                                  <td style="width: 5%;"> 
                                    <a href="{{ route('permissions.edit',$permission->id) }}" data-toggle="tooltip" data-placement="top" title="Edit">
                                      <i class="fa fa-pencil actionicon" aria-hidden="true"></i>
                                    </a>
                                    
                                  <td style="width: 5%;">
                                   
                                    <form action="{{ route('permissions.destroy' , $permission->id ) }}" method="POST" class="delete-form">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button style="background: none;border: none;" class="del" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o actionicon" aria-hidden="true"></i></button>
                                    </form>
                                  </td>
                                </tr>
                              @endforeach
                            @endif        
                            
                          

                          </tbody>
                        </table>

                        
                          {{ $permissions->links() }}
                        
                      </div>
								      
                      



                       
							     
	                  </div>
	                </div>
              	</div>
            </div>
          </div>

          <!--Add Permission modal-->
          <div class="modal fade" id="addpermission" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  <h4 class="modal-title"><b>New Permission</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" class="form-horizontal" action="{{ URL::route('permissions.store') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Permission Name</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" required="Please enter a Permission Name">
                        <i><small>The name is how it appears.</small></i>
                      </div>
                      
                    </div>
                    
                   
                    
                    <button class="btn btn-primary btn-dark btn-sm" >Add Permission</button>
                    
                  </form>
                  
                  
                </div>

              
                
              </div>
            </div>
          </div>
  </div>



    
@endsection

