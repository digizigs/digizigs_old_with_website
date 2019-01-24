
@extends('layouts.admin')

@section('title','All Articles')



@section('content')

	

	<div class="right_col" role="main">

        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Services <small></small></h3>
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

                <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>

              	<div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
  	                <div class="x_title">                     
                      <a href="#addservice" class="btn btn-dark btn-sm" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> Add Service</a>
                      <div class="clearfix"></div>
                    </div>

	                  <div class="x_content">
                      <div class="table-responsive">
                          <table class="table table-striped jambo_table bulk_action">
                            <thead>
                              <tr class="headings">
                                <th>
                                  <input type="checkbox" id="check-all" class="flat">
                                </th>
                                <th class="column-title"> Service </th>
                                <th class="column-title"> Description </th>
                                <th class="column-title"> Service Charge </th>
                                <th class="column-title"> Duration </th>
                                <th class="column-title">  </th>
                                <th class="column-title">  </th>
                                <th class="bulk-actions" colspan="7">
                                  <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                                </th>
                              </tr>
                            </thead>

                            <tbody>
                
                              @foreach($services as $service)

                              <tr class="even pointer">
                                <td class="a-center ">
                                  <input type="checkbox" class="flat" name="table_records">
                                </td>
                                <td class=" "> {{$service->name}} </td>
                                <td class=" "> {{$service->description}} </td>
                                <td class=" "> {{$service->charge}} </td>
                                <td class=" "> {{$service->duration}} </td>
                                <td class="" style="width: 5%;">
                                  <a href="" class="disabled">
                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                  </a>
                                
                                  
                                </td>
                                <td style="width: 5%;">
                                  <form action="" method="POST" class="delete-form">
                                      @csrf
                                      {{ method_field('DELETE') }}
                                      <button style="background: none;border: none;"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                  </form>
                                </td>
                              </tr>
                            
                              @endforeach
                              
                            </tbody>
                          </table>
                      </div>  
                    </div>

	                     

	                </div>
              	</div>


                <!--Add service-->
                <div class="modal fade" id="addservice" role="dialog"  data-backdrop="false">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header panel-heading">
                          <button type="button" class="close" data-dismiss="modal" >&times;</button>
                          <h4 class="modal-title"><b>New Service</b></h4>
                        </div>
                        <div class="modal-body">
                          
                          <form  role="form" class="form-horizontal" action=" {{ route('service.store')}}" method="post">
                            {{ csrf_field() }}

                            <div class="form-group">
                              <label class="col-sm-2 control-label">Service</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="text" name="service_name" required="Please ente a Role Name">
                                <i><small>The name is how it appears.</small></i>
                              </div> 
                            </div>

                            <div class="form-group">
                              <label class="col-sm-2 control-label">Description</label>
                              <div class="col-sm-10">
                                <textarea class="form-control" name="service_desc" id="" cols="30" rows="5" required=""></textarea>
                                <i><small>Breif description of service</small></i>
                              </div> 
                            </div>

                            <div class="form-group">
                              <label class="col-sm-2 control-label">Service Charge</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="text" name="service_charge" required="Please ente a Role Name">
                                <i><small>Billing charge of service</small></i>
                              </div> 
                            </div>

                            <div class="form-group">
                              <label class="col-sm-2 control-label">Duration</label>
                              <div class="col-sm-10">
                                <input class="form-control" type="text" name="service_duration" required="Please ente a Role Name">
                                <i><small>Expected Completion Time</small></i>
                              </div> 
                            </div>
                            
                            
                            
                            
                            <button class="btn btn-dark btn-sm" >Add Service</button>
                            
                          </form>
                          
                          
                        </div>

                      
                        
                      </div>
                    </div>
                </div>
            </div>

        </div>
  </div>



    
@endsection
