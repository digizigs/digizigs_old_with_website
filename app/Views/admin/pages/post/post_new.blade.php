
@extends('layouts.admin')

@section('title','New Articles')



@section('content')
   <div class="right_col" role="main" style="min-height: 3543px;">

    
       <!--p class="alert alert-info " id="successMessage">Post published successfully</p-->
       @if(Session::has('message'))
         <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
       @endif

       @if(Session::has('deleted'))
         <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
       @endif

      @if ($errors->any())
         @foreach ($errors->all() as $error)
           <div style="color:red;"><small><i>{{$error}}</i></small></div>
         @endforeach
      @endif

      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">                    
                  <h2><i class="fa fa-align-left"></i> New Article <small>add new article </small></h2>
                  <div class="clearfix"></div>
               </div>

               <div class="x_content">
                  <form class="" method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                     @csrf
                     
                     <!-- Post editor area -->
                     <div class="col-md-8 col-xs-12">

                        <div class="form-group form-float">
                           <div class="form-line">
                               <input type="text" class="form-control" name="post_title" value="{{ old('post_title') }}">
                               <label class="form-label">Post Title</label>
                           </div>
                        </div>

                        <div class="form-group form-float">
                           <div class="form-line">
                               <input type="text" class="form-control" name="post_desc" value="{{ old('post_desc') }}">
                               <label class="form-label">Post Description</label>
                           </div>
                        </div>

                        <div class="form-group glow-input">
                            <label for="editor1">Post Content</label>
                            <textarea id="editor1" name="post_body" rows="15" cols="80" class="form-control {{ $errors->has('post_body') ? ' is-invalid' : '' }}" value="{{ old('post_body') }}">                                
                            </textarea>                              
                        </div>
                     </div>
                     <!-- Post editor area -->
                     
                     <!-- Post Options -->
                     <div class="col-md-4 col-xs-12">
                        
                        <div class="x_panel">
                           <div class="header">
                              <div class="x_title">
                                 <h2><i class="fa fa-align-left"></i> Options <small>Post Options</small></h2>
                                 <button class="btn btn-dark btn-sm pull-right">Publish</button>
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                           <div class="body">
                              <div class="panel-group" id="accordion_1" role="tablist" aria-multiselectable="true">

                                 <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="headingOne_1">
                                          <h4 class="panel-title">
                                              <a role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseOne_1" aria-expanded="false" aria-controls="collapseOne_1" class="collapsed">
                                                  Status & visiblity
                                              </a>
                                          </h4>
                                      </div>
                                      <div id="collapseOne_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne_1" aria-expanded="false" style="height: 0px;">
                                          <div class="panel-body">
                                             <div class="">
                                                <input name="status" type="radio" id="radio_1" checked="" value="published">
                                                <label for="status">Published</label>
                                                <input name="status" type="radio" id="radio_2" value="Draft">
                                                <label for="status">Draft</label>                                    
                                             </div>
                                          </div>
                                      </div>
                                 </div>
                                 <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="headingTwo_1">
                                          <h4 class="panel-title">
                                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseTwo_1" aria-expanded="false" aria-controls="collapseTwo_1">
                                                  Category
                                              </a>
                                          </h4>
                                      </div>
                                      <div id="collapseTwo_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo_1" aria-expanded="false" style="height: 0px;">
                                          <div class="panel-body">
                                             <select class="form-control select2 select2-hidden-accessible " multiple=""  style="width: 100%; height: 200px;" tabindex="-1" aria-hidden="true" name="categories[]">
                               
                                                  @foreach($categories as $category)
                                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                                  @endforeach
                                                          
                                             </select>     
                                          </div>
                                      </div>
                                 </div>
                                 <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="headingThree_1">
                                          <h4 class="panel-title">
                                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapseThree_1" aria-expanded="false" aria-controls="collapseThree_1">
                                                  Tags
                                              </a>
                                          </h4>
                                      </div>
                                      <div id="collapseThree_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1" aria-expanded="false">
                                          <div class="panel-body">
                                             <select class="form-control tags" multiple=""  style="width: 100%; height: 200px;" tabindex="-1" aria-hidden="true" name="tags[]"  value="{{ old('tags[]') }}">          
                                             </select>  
                                          </div>
                                      </div>
                                 </div>
                                 <div class="panel panel-default">
                                      <div class="panel-heading" role="tab" id="headingfour_1">
                                          <h4 class="panel-title">
                                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion_1" href="#collapsefour_1" aria-expanded="false" aria-controls="collapseThree_1">
                                                  Feature Image
                                              </a>
                                          </h4>
                                      </div>
                                      <div id="collapsefour_1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree_1" aria-expanded="false">
                                          <div class="panel-body">
                                             <div class="panel-body">
                                                <div class="avatar-preview imgUp img-thumbnail" style="background-image: url({{asset('public/images/picture.jpgs')}});">
                                                    
                                                </div>
                                             </div>
                                             <div class="panel-footer">
                                               <label class="btn btn-dark btn-sm">
                                                   Browse Image
                                                   <input type="file" id="imageUpload" class="uploadFile img" value="Upload Photo" style="width: 0px;height: 0px;overflow: hidden;" name="feature_image">
                                               </label>
                                             </div>
                                          </div>
                                      </div>
                                 </div>

                              </div>
                           </div>
                        </div>                                                                                   
                     </div>
                     <!-- Post Options -->

                  </form>
               </div>
            </div>
         </div>
      </div>         
            
   </div>
   
@endsection

@section('javascript')
  <!--script src="{{asset('public/vendor/dropzone/dist/min/dropzone.min.js')}}"></script-->
  <!--script src="{{asset('public/vendor/ck-editor/ck-editor.js')}}"></script-->
  <!--script src="https://cdn.ckeditor.com/4.11.2/standard-all/ckeditor.js"></script-->

  <script src="{{asset('public/vendor/ckeditor/ckeditor.js')}}"></script>


  <script>
      $("#tags_1").select2();
      $(".select2").select2();


      $(".tags").select2({
        tags: true
      });

  </script>

  <script>
          CKEDITOR.replace( 'editor1' );
  </script>

                
@endsection