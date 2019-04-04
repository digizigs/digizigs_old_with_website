
@extends('layouts.admin')

@section('title','All Articles')



@section('content')

	

	<div class="right_col" role="main">

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>All Posts <small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <!--div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div-->
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
	                    
                      <a href="{{route('post.create')}}" class="btn btn-dark btn-sm">Add New Post</a> 

                                       
                      <span class="pull-rightd" style="margin-top: 30px; padding: 20px;">
                        <a href="{{route('post.index')}}">All</a> | <a href="{{route('post.index',['posts_type'=>'published'])}}">Published</a> | <a href="{{route('post.index',['posts_type'=>'draft'])}}">Draft</a> | <a href="{{route('post.index',['posts_type'=>'trashed'])}}">Trash</a>
                      </span>
                      
                      

                    
	                    <div class="clearfix"></div>
	                  </div>

	                  <div class="x_content">

	                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">                      
                              <th class="column-title"> Title </th>
                              <th class="column-title"> Author </th>
                              <th class="column-title"> Category </th>
                              
                              <th class="column-title"> Date </th>
                              <th class="column-title"> Status </th>
                              <th class="column-title"> Edit </th>
                              <th class="column-title no-link last"> Delete </th>
                              <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                            </tr>
                          </thead>

                          <tbody>
              
                          @foreach($posts as $post)
                            <tr class="even pointer">                             
                              <td class=" "><a href="">{{ $post -> title}}</a></td>
                              <td class=" ">{{ $post ->user->firstname}} </td>
                              <td class=" ">                               
                                 @foreach($post->categories as $cat)                          
                                    <span class="label label-info label-many" style="font-weight:300;">{{$cat->name}}</span>
                                 @endforeach
                              </td>
                              
                              <td class=" ">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
                              <td class=" "> {{ucfirst($post -> status)}} </td>
                              <td class="" style="width: 5%;">
                                
                                
                                <a href="{{ route('post.edit' , $post->id)}}" >
                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                             
                                
                              </td>
                              <td style="width: 5%;">
                                <form action="{{ route('post.destroy' , $post->id)}}" method="POST" class="delete-form">
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
								      
                      {{ $posts->links() }}



                       
							     
	                  </div>
	                </div>
              	</div>
            </div>
          </div>
  </div>



    
@endsection