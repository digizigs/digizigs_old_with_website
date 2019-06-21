
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
                         
                              <div class="form-group wp-input">
                                 <div class="form-line">
                                    <label class="form-label error">Category</label>
                                    <input type="text" class="form-control input-sm" name="category_name" value="{{ old('category_name') }}">
                                 </div>
                                 <small><i>The name is how it appears on your site.</i></small>
                              </div>
                              
                            
                             <div class="form-group wp-input">

                               <label for="sel1">Web Block</label>

                               <select class="form-control input-sm" name="category_parent" style="border-bottom: 1px solid #ddd;">
                                 <option value="0">--Select Web Block--</option>
                                 @foreach($categories as $category)
                                   <option value="{{$category->id}}" >{{$category->name}}</option>                              
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
                          
                          @foreach($categories as $category)
                          <div class="panel panel-dz dashboard-post-page-comment-indicator">
                             <div class="panel-heading active">
                                <span class="panel-title">
                                   <a data-toggle="collapse" href="#{{$category->id}}">
                                     {{$category->name}}                    
                                   </a>
                                  
                                    <span class="action-text wpfont ml-20">
                                      <a href="{{route('category.edit',$category->id)}}"><small><i class="fa fa-pencil" aria-hidden="true"></i></small></a>
                                       |                                             
                                       <form action="{{route('category.destroy',$category->id)}}" method="POST" class="delete-form">
                                           @csrf
                                           {{ method_field('DELETE') }}
                                          <button style="background: none;border: none;" class="del" data-toggle="tooltip" data-placement="top" title="Delete"><small><i class="fa fa-trash-o" aria-hidden="true"></i></small></button>
                                        </form>

                                    </span>

                                   <i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
                                </span>
                                
                             </div>
                              <div id="{{$category->id}}" class="panel-collapse collapse in">
                                    @if($category->child->count() > 0)
                                 <div class="panel-body open">
                                    
                                        <ul class="quick-list">
                                          @foreach($category->child as $child)
                                            <li class="wpfont">
                                              <a href="{{route('category.edit',$child->id)}}">
                                                {{$child->name}} ({{$child->posts->count()}})
                                              </a>

                                              <span ></span>


                                              <span class="action-text wpfont ml-20">
                                                <a href="{{route('category.edit',$child->id)}}"><small>Edit</small></a>
                                                 |                                             
                                                 <form action="{{route('category.destroy',$child->id)}}" method="POST" class="delete-form">
                                                     @csrf
                                                     {{ method_field('DELETE') }}
                                                    <button style="background: none;border: none;" class="del" data-toggle="tooltip" data-placement="top" title="Delete"><small>Delete</small></button>
                                                  </form>

                                              </span>

                                            </li>
                                          @endforeach
                                        </ul>  
                                       
                                 </div>
                                      @endif
                              </div>
                          </div>
                          @endforeach
                            
                        
                            
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
