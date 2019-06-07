
@extends('layouts.admin')

@section('title','Categories')



@section('content')

	

	<div class="right_col" role="main">

         <div class="">
                      
            <div class="row">                          
                
                @include('admin.partials.alerts')

               
              	<div class="col-md-12 col-sm-12 col-xs-12">
                  
	                <div class="x_panel">
	                  <div class="x_title">	                   
	                    <h2><i class="fa fa-align-left"></i> Categories <small>Manage app categories</small></h2>
	                    <div class="clearfix"></div>
	                  </div>

	                  <div class="x_content">

	                    <div class="row">
                      
                           <div class="col-md-4 col-xs-12">
                 
                             <form method="post" action="{{route('category.store')}}" >
                               @csrf

                               <!--catagory-->

                                <div class="form-group wp-input">
                                   <div class="form-line">
                                      <label class="form-label error">Category</label>
                                      <input type="text" class="form-control input-sm" name="category_name" value="{{ old('category_name') }}">
                                   </div>
                                   <small><i>The name is how it appears on your site.</i></small>
                                </div>
                                
                               <!--Parent category dropdown-->
                               <div class="form-group wp-input">
                                 <label for="sel1">Parent Catagory</label>
                                 <select class="form-control input-sm" name="parent_id" style="border-bottom: 1px solid #ddd;">
                                   <option value="0">--None--</option>
                                   @foreach($categories as $category)
                                     <option value="{{$category->id}}" >{{$category->name}}</option>
                                     <!-- @foreach ($category->child as $child)
                                       <option value="{{$child->id}}" >--{{ $child->name }}</option>
                                     @endforeach -->
                                   @endforeach
                                   
                                 </select>
                                 <small><i style="color:#aaa">Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</i></small>
                               </div>



                               <div>
                                 <button type="submit" class="btn btn-dark btn-sm" style="margin-bottom: 20px;">
                                   Add New Category
                                 </button>
                               </div>



                             </form>
                           </div>
                           
                          <div class="col-md-8 col-xs-12">
                              
                            <div class="panel-group pannel-line-group" id="accordion">

                                  @foreach($categories as $category)

                                    <!-- Panel -->
                                    <div class="panel panel-default pannel-line">
                                      <!-- Panel Heading -->
                                      <div class="panel-heading">
                                          <a href="#{{$category->slug}}" data-toggle="collapse" data-parent="#accordion">
                                            <b>{{$category->name}}</b>
                                          </a>
                                          <span class="action-text">
                                            <a href="{{route('category.edit',$category->id)}}"><small>Edit</small></a>
                                             |                                             
                                             <form action="{{route('category.destroy',$category->id)}}" method="POST" class="delete-form">
                                                 @csrf
                                                 {{ method_field('DELETE') }}
                                                <button style="background: none;border: none;" class="del" data-toggle="tooltip" data-placement="top" title="Delete"><small>Delete</small></button>
                                              </form>

                                          </span>

                                          <span class="pull-right badge">
                                            <b class="count">{{$category->child->count()}}</b>
                                          </span>

                                      </div>
                                      <!-- Panel Heading -->
                                      
                                      @if($category->child->count() > 0)
                                      <!-- Panel Body -->
                                      <div id="{{$category->slug}}" class="panel-collapse collapse">                                      
                                         <div class="panel-body">
                                          <ul class="list-group">
                                            @foreach($category->child as $child)
                                              <li class="list-group-item">
                                                  <b>{{$child->name}}</b>
                                                  <span class="action-text">
                                                    <a href="{{route('category.edit',$child->id)}}"><small>Edit</small></a>
                                                     |                                             
                                                     <form action="{{route('category.destroy',$child->id)}}" method="POST" class="delete-form">
                                                         @csrf
                                                         {{ method_field('DELETE') }}
                                                        <button style="background: none;border: none;" class="del" data-toggle="tooltip" data-placement="top" title="Delete"><small>Delete</small></button>
                                                      </form>
                                                  </span>
                                                  <span class="count pull-right badge">
                                                    {{$child->posts->count()}}
                                                  </span>
                                              </li>
                                            @endforeach
                                          </ul>
                                            
                                         </div>                                                                 
                                      </div>
                                      <!-- Panel Body -->
                                      @endif

                                    </div>
                                    <!-- Panel -->

                                  @endforeach
        
                            </div>
                              
                            <b><i style="color:#aaa">Note:</i></b>
                            <p>
                              <i style="color:#aaa">
                                Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category <b>Uncategorized</b>.
                              </i>
                            </p>  
                                                
                          </div>     

                      </div> 
                      							     
	                  </div>

	                </div>
              	</div>
            </div>
         </div>

         
  	</div>



    
@endsection
