
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
            
            <a href="{{route('post.create')}}" class="btn btn-dark btn-sm">New Article</a> 

                             
            <span class="pull-rightd" style="margin-top: 30px; padding: 20px;">
              <a href="{{route('post.index')}}">All</a> | <a href="{{route('post.index',['posts_type'=>'published'])}}">Published</a> | <a href="{{route('post.index',['posts_type'=>'draft'])}}">Draft</a> | <a href="{{route('post.index',['posts_type'=>'trashed'])}}">Trash</a>
            </span>
            
            <span class="search pull-right">
              <i class="fa fa-search"></i>
              <div class="form-group col-xs-12">
                  <div class="form-line">
                      <input type="text" class="form-control" placeholder="Search here...">
                  </div>
              </div>
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
                       
                          <span class="title">
                            <a href="#{{$post->id}}" data-toggle="collapse" data-parent="#accordion">
                              <b class="title">{{ $post -> title}}</b> 
                            </a>
                          </span>
                          by 
                          <i>
                             <a href="{{route('post.index',['author_id'=>$post ->user->id])}}">
                                {{ $post ->user->firstname}}
                             </a>
                          </i>
                          <a href=""></a>

                          <span class="time">{{ucfirst($post -> status)}}</span> at
                          <span class="time">{{ Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</span>
                          in
                          @foreach($post->categories as $cat)                          
                             <a href="{{route('post.index',['category'=>$cat->slug])}}">
                                <span class="label label-info label-many" style="font-weight:300; margin:2px;">
                                   {{$cat->name}}
                                </span>
                             </a>
                          @endforeach 
                       </span>
                       <span class="action-text">
                          <a href="{{ route('post.edit' , $post->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                            Edit
                          </a>
                          |
                          <form action="{{ route('post.destroy' , $post->id)}}" method="POST" class="delete-form">
                             @csrf
                             {{ method_field('DELETE') }}
                            <button style="background: none;border: none;" class="del" data-toggle="tooltip" data-placement="top" title="Delete">Delete</button>
                          </form>
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
    
@endsection