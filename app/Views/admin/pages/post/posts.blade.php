
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

                  <div class="card">
                        <div class="header">
                            <h2>
                                CONTEXTUAL CLASSES WITH LINKED ITEMS
                                <small>Use contextual classes to style list items, default or linked. Also includes <code>.active</code> state.</small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a href="javascript:void(0);" class="list-group-item active">
                                    <h4 class="list-group-item-heading">List group item heading</h4>
                                    <p class="list-group-item-text">
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">List group item heading</h4>
                                    <p class="list-group-item-text">
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <h4 class="list-group-item-heading">List group item heading</h4>
                                    <p class="list-group-item-text">
                                        Lorem ipsum dolor sit amet, ut duo atqui exerci dicunt, ius impedit mediocritatem an. Pri ut tation electram moderatius.
                                        Per te suavitate democritum. Duis nemore probatus ne quo, ad liber essent aliquid
                                        pro. Et eos nusquam accumsan, vide mentitum fabellas ne est, eu munere gubergren
                                        sadipscing mel.
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>

                    
	                <div class="x_panel">
	                  <div class="x_title">	                   
	                    
                      <a href="{{route('post.create')}}" class="btn btn-dark btn-sm">Add New Post</a> 

                                       
                      <span class="pull-rightd" style="margin-top: 30px; padding: 20px;">
                        <a href="{{route('post.index')}}">All</a> | <a href="{{route('post.index',['posts_type'=>'published'])}}">Published</a> | <a href="{{route('post.index',['posts_type'=>'draft'])}}">Draft</a> | <a href="{{route('post.index',['posts_type'=>'trashed'])}}">Trash</a>
                      </span>
                      
                      

                    
	                    <div class="clearfix"></div>
	                  </div>

	                  <div class="x_content">



                        <div class="panel-group pannel-line-group" id="accordion">
                           
                           @foreach($posts as $post)  
                           <div class="panel panel-default pannel-line">
                              <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">
                                 
                                 <span class="post-title">
                                    <i class="fa fa-pencil-square" aria-hidden="true"></i>
                                 
                                    <a href="#{{$post->id}}" data-toggle="collapse" data-parent="#accordion">
                                      <b>{{ $post -> title}}</b> 
                                    </a>
                                    by 
                                    <i>
                                       <a href="{{route('post.index',['author_id'=>$post ->user->id])}}">
                                          {{ $post ->user->firstname}}
                                       </a>
                                    </i>
                                    <a href=""></a>
                                    <span>{{ucfirst($post -> status)}} at {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                                    in
                                    @foreach($post->categories as $cat)                          
                                       <a href="{{route('post.index',['category'=>$cat->slug])}}">
                                          <span class="label label-info label-many" style="font-weight:300; margin:2px;">
                                             {{$cat->name}}
                                          </span>
                                       </a>
                                    @endforeach 
                                 </span>
                                                                  
                              </div>
                              <div id="{{$post->id}}" class="panel-collapse collapse">
                                 <div class="panel-body" style="padding: 8px !important;">

                                    <div class="post-meta" style="margin-bottom:15px;">

                                        <!-- Post Description -->
                                        <span>
                                          <b>{{ $post ->description}}</b>
                                        </span>
                                        <!-- Post Description -->

                                        <!-- <span>
                                          <i class="fa fa-user" aria-hidden="true"></i>
                                          <a href="">{{ $post ->user->firstname}}</a>
                                        </span> -->

                                        <!-- Post Category
                                        @if($post->categories)
                                        <span>
                                          <i class="fa fa-tag" aria-hidden="true"></i>                              
                                          
                                          @foreach($post->categories as $cat)
                                             <a href="">                          
                                                <span class="label label-info label-many" style="font-weight:300; margin: 0">{{$cat->name}}</span>
                                             </a>   
                                          @endforeach
                                                                    
                                        </span>
                                        @endif
                                        Post Category -->

                                        <!-- Post time -->
                                        <!-- <span>
                                          <i class="fa fa-calendar" aria-hidden="true"></i>
                                          <a href="">
                                             {{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}
                                          </a>
                                        </span> -->
                                        <!-- Post time -->

                                        <!-- Post Status
                                        <span>
                                          <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                                          <a href="">
                                             {{ucfirst($post -> status)}}
                                          </a>
                                        </span>
                                        Post Status -->

                                        <!-- Action Icons -->
                                        <span class="action-icons pull-right">
                                          <a href="{{ route('post.edit' , $post->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class="fa fa-pencil actionicon" aria-hidden="true"></i>
                                          </a>
                                       
                                          <form action="{{ route('post.destroy' , $post->id)}}" method="POST" class="delete-form">
                                             @csrf
                                             {{ method_field('DELETE') }}
                                            <button style="background: none;border: none;" class="del" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o actionicon" aria-hidden="true"></i></button>
                                          </form>
                                        </span>
                                        <!-- Action Icons -->

                                    </div>

                                    
                                    <div class="post-body">
                                       {!!$post->body!!}
                                    </div>

                                 </div>                                 
                              </div>
                           </div>
                           @endforeach                          

                        </div>
                        {{ $posts->links() }}

   	               </div>
	                </div>
              	</div>
            </div>
          </div>
  </div>



    
@endsection