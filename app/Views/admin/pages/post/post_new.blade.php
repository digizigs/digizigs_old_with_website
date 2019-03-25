
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

          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>Add New Post</h3>
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
            <hr>
            <div class="row" >
              <div class="col-md-12 col-sm-12 col-xs-12">
                
                <form class="form-horizontal form-label-left" method="post" action="{{route('post.store')}}" enctype="multipart/form-data">
                  @csrf
                  <div class="col-md-8 col-xs-12">

                    <div class="form-group glow-input">
                      <label for="usr">Post Title</label>
                      <input type="text" class="form-control input-sm {{ $errors->has('post_title') ? ' is-invalid' : '' }}" name="post_title" value="{{ old('post_title') }}">
                    </div>


                    


                    <div class="form-group glow-input">
                      <label for="usr">Post Description</label>
                      <input type="text" class="form-control input-sm {{ $errors->has('post_desc') ? ' is-invalid' : '' }}"  name="post_desc" value="{{ old('post_desc') }}">
                    </div>
              
                    <div class="form-group glow-input">
                      <label for="editor1">Post Body</label>
                      <textarea id="editor1" name="post_body" rows="9" cols="80" class="form-control {{ $errors->has('post_body') ? ' is-invalid' : '' }}" value="{{ old('post_body') }}">
                        
                      </textarea>
                      
                      <small><b>Word Count</b> 12</small>
                    </div>
                    
                  </div>
                  
                  <div class="col-md-4 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2><i class="fa fa-align-left"></i> Options <small>Post Options</small></h2>
                        <button class="btn btn-dark btn-sm pull-right">Publish</button>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">

                        <!-- start accordion -->
                        <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
                          
                          <!-- draft and publish status -->
                          <div class="panel" >
                              <a class="panel-heading collapsed" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="false" aria-controls="collapseOne">
                                <span class=" ">Status & Visiblity</span>
                                <span><i class="fa fa-caret-down pull-right" style="margin-top: 5px;"></i></span>
                              </a>
                              <div id="collapseOne1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                <div class="panel-body" style="background-color: #F2F5F7">

                                  <div class="radio">
                                    <label class="">
                                      <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" checked="" name="status" value="Published" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Published
                                    </label>
                                    
                                    <label class="">
                                      <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" name="status" value="Draft" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Draft
                                    </label>


                                   
                                  </div><!-- pannelbody -->
                                </div>
                              </div>
                          </div>

                          <!-- Category -->
                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo">
                          
                              <span class=" ">Categories</span>
                              <span><i class="fa fa-caret-down pull-right" style="margin-top: 5px;"></i></span>
                            </a>
                            <div id="collapseTwo1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                              <div class="panel-body">

                                <div class="col-md-12">
                                  <select class="form-control select2 select2-hidden-accessible " multiple=""  style="width: 100%; height: 200px;" tabindex="-1" aria-hidden="true" name="categories[]">
                                  
                                      @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                      @endforeach
                                              
                                  </select>
                                </div>
                           
                              </div>
                            </div>
                          </div>

                         <!--  tags -->
                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
                              
                              <span class="">Tags</span>
                              <span><i class="fa fa-caret-down pull-right" style="margin-top: 5px;"></i></span>
                            </a>
                            <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                              <div class="panel-body">
                               
                                <div class="col-md-12" >
                                  <select class="form-control tags" multiple=""  style="width: 100%; height: 200px;" tabindex="-1" aria-hidden="true" name="tags[]"  value="{{ old('tags[]') }}">          
                                  </select>                               
                                </div>


                              </div>
                            </div>
                          </div>

                          <!-- Feature Image -->
                          <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapsefour1" aria-expanded="false" aria-controls="collapseThree">
                              
                              <span class="">Feature Image</span>
                              <span><i class="fa fa-caret-down pull-right" style="margin-top: 5px;"></i></span>
                            </a>
                            <div id="collapsefour1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
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

                          <!-- Excerpt -->
                          <div class="panel" >
                            <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapsefive1" aria-expanded="false" aria-controls="collapseThree">
                              <span class=" ">Excerpt</span>
                              <span><i class="fa fa-caret-down pull-right" style="margin-top: 5px;"></i></span>
                            </a>
                            <div id="collapsefive1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                              <div class="panel-body">
                              <div class="form-group">
                                <small>Write an excerpt (optional)</small>
                                <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3"></textarea>
                              </div>
                              </div>
                            </div>
                          </div>


                          <!--Discussion-->
                          <div class="panel" >
                            <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseseven1" aria-expanded="false" aria-controls="collapseThree">
                              
                              <span>Discussion</span>
                              <i class="fa fa-caret-down pull-right" style="margin-top: 5px;"></i>
                            </a>
                            <div id="collapseseven1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                              <div class="panel-body">

                                <div class="form-group">                              
                                  <div class="checkbox">
                                    <label class="">
                                      <div class="icheckbox_flat-green checked" style="position: relative;"><input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Allow Comments
                                    </label>
                                  </div>

                                  <div class="checkbox">
                                    <label class="">
                                      <div class="icheckbox_flat-green checked" style="position: relative;"><input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Allow Pingbacks & Trackbacks
                                    </label>
                                  </div>
                                </div>



                              </div>
                            </div>
                          </div>

                        </div>
                        <!-- end of accordion -->


                      </div>
                  </div>

                  <div class="clearfix"></div>
                  
                  <div class="col-md-12">
                    
                  </div>

                </form>
                
                
              </div>
            </div>
          </div>

            
          </div>
        </div>
@endsection

@section('javascript')
  <script src="{{asset('public/vendor/dropzone/dist/min/dropzone.min.js')}}"></script>
  <script src="https://cdn.ckeditor.com/4.11.2/standard/ckeditor.js"></script>
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