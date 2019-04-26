
@extends('layouts.admin')

@section('title','Categories')



@section('content')

	

	<div class="right_col" role="main">

         <div class="">
                      
            <div class="row">
                          
                @if(Session::has('message'))
                  <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
                @endif

                @if(Session::has('deleted'))
                  <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
                @endif

                @if ($errors->any())
                  <p class="alert alert-danger " id="successMessage">
                    @foreach($errors->all() as $error)
                      {{$error}} <br>
                    @endforeach
                  </p>
                @endif

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


                               <div class="form-group glow-input">
                                 <label for="usr">Category Name</label>
                                 <input type="text" class="form-control input-sm" name="category_name" value="{{ old('category_name') }}" v-model="cat">
                                 <small><i>The name is how it appears on your site.</i></small>
                               </div>

                               <!--Parent category dropdown-->
                               <div class="form-group glow-input">
                                 <label for="sel1">Parent Catagory</label>
                                 <select class="form-control input-sm" name="parent_id">
                                   <option value="0">None</option>
                                   @foreach($categories as $category)
                                     <option value="{{$category->id}}" >{{$category->name}}</option>
                                     <!-- @foreach ($category->child as $child)
                                       <option value="{{$child->id}}" >--{{ $child->name }}</option>
                                     @endforeach -->
                                   @endforeach
                                   
                                 </select>
                                 <small><i>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</i></small>
                               </div>

                               <div>
                                 <button type="submit" class="btn btn-dark btn-sm" style="margin-bottom: 20px;">
                                   Add New Category
                                 </button>
                               </div>



                             </form>
                           </div>

                           @{{testmsg}}
                           <div class="col-md-8 col-xs-12">                        
                              <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                                 @foreach($categories as $parent)

                                    @if($parent->child->count() > 0)
                                        
                                    
                                    
                                    <div class="panel">
                                      <a class="panel-heading collapsed" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#{{$parent->slug}}" aria-expanded="false" aria-controls="collapseOne">
                                       <span><b>{{$parent->name}}</b></span>
                                       <span class="pull-right"><b>{{ $parent->posts->count() }}</b></span>
                                       </a>
                                       <div id="{{$parent->slug}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                          <div class="panel-body">
                                             
                                             <div class="table-responsive">
                                                <table class="table table-striped jambo_table bulk_action">
                                                      <tbody>
                                                         @foreach($parent->child as $cat)
                                                         <tr id="">
                                                           
                                                           <td style="width: 35%;"> <a href="">{{$cat->name}}</a> </td>
                                                           <td style="width: 20%" style="margin-left: 20px;">
                                                             {{ $cat->posts->count() }}
                                                           </td>
                                                            <td style="width: 2%;"> 
                                                             <a href="{{route('category.edit',$category->id)}}" data-toggle="tooltip" data-placement="top" title="Edit">
                                                               <i class="fa fa-pencil actionicon" aria-hidden="true"></i>
                                                             </a>
                                                           </td>  
                                                           
                                                           <td style="width: 2%;">
                                                            
                                                             <form action="{{route('category.destroy',$category->id)}}" method="POST" class="delete-form">
                                                                 {{ csrf_field() }}
                                                                 {{ method_field('DELETE') }}
                                                                 <button style="background: none;border: none;" class="del" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash-o actionicon" aria-hidden="true"></i></button>
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
                                    @endif
                                 @endforeach                             
                              </div>                                               
                           </div>
                           


                          
                        </div> 
							     
	                  </div>

	                </div>
              	</div>
            </div>
         </div>

         
  	</div>



    
@endsection
