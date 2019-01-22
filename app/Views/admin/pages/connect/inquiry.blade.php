
@extends('layouts.admin')

@section('title','All Articles')



@section('content')

	

	<div class="right_col" role="main">

        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Inquiry <small></small></h3>
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
	                  <!--div class="x_title">	                   
	                    <h2><i class="fa fa-align-left"></i> Options <small>App settings Options</small></h2>
	                    <div class="clearfix"></div>
	                  </div-->

	                  <div class="x_content">

	                   <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th>
                                <input type="checkbox" id="check-all" class="flat">
                              </th>
                              <th class="column-title"> Name </th>
                              <th class="column-title"> Email </th>
                              <th class="column-title"> Contact </th>
                              <th class="column-title"> Date </th>
                              <th class="column-title"> Message </th>
                              <th class="column-title">  </th>
                              <th class="column-title no-link last">  </th>
                              <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                            </tr>
                          </thead>

                          <tbody>
              
                            @foreach($inquiries as $inquiry)

                            <tr class="even pointer">
                              <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                              </td>
                              <td class=" "> {{$inquiry->name}} </td>
                              <td class=" "> {{$inquiry->email}} </td>
                              <td class=" "> {{$inquiry->contact}} </td> 
                              <td class=" ">{{ Carbon\Carbon::parse($inquiry->created_at)->diffForHumans() }}</td>
                              <td class=" "> {{str_limit($inquiry->message,50)}} </td>
                              <td class="" style="width: 5%;">
                                <a href="{{route('inquiry.show',$inquiry->id)}}">
                                  <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                              
                                
                              </td>
                              <td style="width: 5%;">
                                <form action="" method="POST" class="delete-form">
                                    @csrf
                                    {{ method_field('DELETE') }}
                                    <button style="background: none;border: none;"><i class="fa fa-trash" aria-hidden="true"></i></button>
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
            </div>
        </div>
  	</div>



    
@endsection
