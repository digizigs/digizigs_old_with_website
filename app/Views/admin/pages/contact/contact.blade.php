
@extends('layouts.admin')

@section('title','All Articles')



@section('content')

	

	<div class="right_col" role="main">


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
	                    <h2><i class="fa fa-user"></i> Contacts <small>All Contacts</small></h2>
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
                            <th class="column-title">Name </th>
                            <th class="column-title">Email </th>
                            <th class="column-title">Contact </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Contact Type </th>
                            <th class="column-title">Created </th>
                            <th class="column-title no-link last"><span class="nobr">Last Active</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>

                        <tbody>

                          @foreach($contacts as $key=>$contact)

                            <tr class="even pointer">
                              <td class="a-center ">
                                <input type="checkbox" class="flat" name="table_records">
                              </td>
                              <td class=" ">{{$contact->name}}</td>
                              <td class=" ">{{$contact->email}} </td>
                              <td class=" ">{{$contact->contact}} <i class="success fa fa-long-arrow-up"></i></td>
                              <td class=" ">@if($contact->status == 1)Active @else Inactive @endif</td>
                              <td class=" ">{{ucfirst($contact -> type)}}</td>
                              <td class="a-right a-right ">{{ Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}</td>
                              <td class=" last"><a href="#">{{ Carbon\Carbon::parse($contact->updated_at)->diffForHumans() }}</a>
                              </td>
                            </tr>

                          @endforeach
                          
                        </tbody>


                      </table>
                      
                      {{$contacts->links()}}
                    </div>
							     
	                  </div>

	                </div>
              	</div>
            </div>
        
  	</div>



    
@endsection
