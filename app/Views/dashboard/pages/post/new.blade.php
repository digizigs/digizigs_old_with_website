@extends('layouts.dashboard.appfile')

@section('title','All Posts')


@section('css')
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">
    <link href="{{asset('public/dashboard/lib/quill/quill.core.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/lib/quill/quill.snow.css')}}" rel="stylesheet">
    
@endsection


@section('content')

<div class="filemgr-wrapper sidebar-page">

  <div class="filemgr-sidebar">
      
    <div class="filemgr-content-header">
        <h4 class="mg-t-10">Posts</h4>
    </div><!-- filemgr-content-header -->

    <div class="filemgr-sidebar-body">
        <div class="pd-t-20 pd-b-10 pd-x-20">
            <ul class="nav nav-aside">

              <li class="nav-label active">Posts</li>
              <li class="nav-item"><a href="{{route('post.index')}}" class="nav-link"><i data-feather="cast"></i> <span>All Post</span></a></li>
              <li class="nav-item"><a href="{{route('post.create')}}" class="nav-link"><i data-feather="plus-circle"></i> <span>Add Post</span></a></li>

              <li class="nav-label mg-t-25">Post Types</li>
              <li class="nav-item"><a href="{{route('post.index',['type'=>'published'])}}" class="nav-link"><i data-feather="maximize"></i> <span>Published</span></a></li>
              <li class="nav-item"><a href="{{route('post.index',['type'=>'draft'])}}" class="nav-link"><i data-feather="minimize"></i> <span>Draft</span></a></li>
              <li class="nav-item"><a href="{{route('post.index',['type'=>'trash'])}}" class="nav-link"><i data-feather="trash"></i> <span>Trash</span></a></li>

            </ul>
        </div>
    </div>

  </div><!-- filemgr-sidebar -->

  <div class="filemgr-content">

    <div class="filemgr-content-header">
        <div class="content-search">
          <i data-feather="search"></i>
          <input type="search" class="form-control" placeholder="Search...">
        </div>
        <nav class="nav d-none d-sm-flex mg-l-auto">
          <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
          <a href="" class="nav-link"><i data-feather="grid"></i></a>
          <a href="" class="nav-link"><i data-feather="align-left"></i></a>
        </nav>
    </div><!-- content-header -->

    

    <div class="filemgr-content-body">
        <div class="pd-10 pd-lg-10 pd-xl-10">
            <div class="container">
            <div class="row">
              <div class="col-lg-8 col-sm-12">

                <div class="form-group wp-input">
                  <label for="email">Post Title</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Post Title">
                </div>

                <div class="form-group wp-input">
                  <label for="email">Post Description</label>
                  <input type="text" class="form-control form-control-sm" placeholder="Post Description">
                </div>
                
               <div class="form-group wp-input">

                <div id="toolbar-container">
                  <span class="ql-formats">
                    <select class="ql-font"></select>
                    <select class="ql-size"></select>
                  </span>
                  <span class="ql-formats">
                    <button class="ql-bold"></button>
                    <button class="ql-italic"></button>
                    <button class="ql-underline"></button>
                    <button class="ql-strike"></button>
                  </span>
                  <span class="ql-formats">
                    <button class="ql-script" value="sub"></button>
                    <button class="ql-script" value="super"></button>
                  </span>
                  <span class="ql-formats">
                    <button class="ql-header" value="1"></button>
                    <button class="ql-header" value="2"></button>
                    <button class="ql-blockquote"></button>
                    <button class="ql-code-block"></button>
                  </span>
                  <span class="ql-formats mg-t-5">
                    <button class="ql-list" value="ordered"></button>
                    <button class="ql-list" value="bullet"></button>
                    <button class="ql-indent" value="-1"></button>
                    <button class="ql-indent" value="+1"></button>
                  </span>
                  <span class="ql-formats mg-t-5">
                    <button class="ql-direction" value="rtl"></button>
                    <select class="ql-align"></select>
                  </span>
                  <span class="ql-formats mg-t-5">
                    <button class="ql-link"></button>
                    <button class="ql-image"></button>
                    <button class="ql-video"></button>
                    <button class="ql-formula"></button>
                  </span>
                  <span class="ql-formats">
                    <button class="ql-clean"></button>
                  </span>
                </div>

                <div id="editor-container" class="ht-300" style="height:250px;background:#fff;">      
                </div>

               </div> 

              </div>
             
              <div class="col-lg-4 col-sm-12">

                <div class="card mb-10">
                  <div class="card-header">
                    <i data-feather="send"></i> Status & Visiblity
                    <button class="btn btn-dark btn-xs pull-right"> Publish</button>
                  </div>
                  <div class="card-body d-flex">
                    <div class="custom-control custom-radio">
                      <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
                      <label class="custom-control-label" for="customRadio1">Publish</label>
                    </div>

                    <div class="custom-control custom-radio mg-sm-l-30 mg-xs-l-30">
                      <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
                      <label class="custom-control-label" for="customRadio2">Draft</label>
                    </div>
                    
                  </div>
                </div>

                <div class="card mb-10">
                  <div class="card-header"><i data-feather="grid"></i> Blocks</div>
                  <div class="card-body">
                  <select class="form-control form-control-sm select2" multiple="multiple" style="width:100%;">
                    <option label="Choose one"></option>
                    <option value="Firefox">Firefox</option>
                    <option value="Chrome" selected>Chrome</option>
                    <option value="Safari">Safari</option>
                    <option value="Opera">Opera</option>
                    <option value="Internet Explorer" selected>Internet Explorer</option>
                  </select>
                  </div>
                </div>

                <div class="card mb-10">
                  <div class="card-header"><i data-feather="slack"></i> Catagories</div>
                  <div class="card-body">...</div>
                </div>

                <div class="card mb-10">
                  <div class="card-header">Tags</div>
                  <div class="card-body">...</div>
                </div>

                <div data-label="Style 2" class="df-example mg-t-50">
                  <div id="accordion4" class="accordion accordion-style2 ui-accordion ui-widget ui-helper-reset" role="tablist">
                    <h6 class="accordion-title ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-collapsed ui-corner-all" role="tab" id="ui-id-19" aria-controls="ui-id-20" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>What does royalty free mean?</h6>
                    <div class="accordion-body ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-20" aria-labelledby="ui-id-19" role="tabpanel" aria-hidden="true" style="display: none;">Royalty free means you just need to pay for rights to use the item once per end product. You don't need to pay additional or ongoing fees for each person who sees or uses it.</div>
                    <h6 class="accordion-title ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-collapsed ui-corner-all" role="tab" id="ui-id-21" aria-controls="ui-id-22" aria-selected="false" aria-expanded="false" tabindex="-1"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-e"></span>What do you mean by item and end product?</h6>
                    <div class="accordion-body ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content" id="ui-id-22" aria-labelledby="ui-id-21" role="tabpanel" aria-hidden="true" style="display: none;">The item is what you purchase from Envato Market. The end product is what you build with that item. For example, the item is a business card template; the end product is the finalized business card. The item is a button graphic; the end product is an app using the button graphic in the app's interface. </div>
                    <h6 class="accordion-title ui-accordion-header ui-corner-top ui-state-default ui-accordion-icons ui-accordion-header-active ui-state-active" role="tab" id="ui-id-23" aria-controls="ui-id-24" aria-selected="true" aria-expanded="true" tabindex="0"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span>What are some examples of permitted end products?</h6>
                    <div class="accordion-body ui-accordion-content ui-corner-bottom ui-helper-reset ui-widget-content ui-accordion-content-active" id="ui-id-24" aria-labelledby="ui-id-23" role="tabpanel" aria-hidden="false" style="">You can buy a web template, add your text and images, and use it as your website. You can buy an HTML site template, convert it to WordPress, and use it as your website (but not as a stock template for sale. You can buy a flyer template, modify the text, print a flyer, and hand it out. You can buy a game starter kit, compile it, and put the game on an app store. You can buy a music track and use it in your radio or TV ad.</div>
                  </div><!-- az-accordion -->
                </div>

                


              </div>
            </div>
            </div>
        </div>
    </div><!-- filemgr-content-body -->
  </div><!-- filemgr-content -->

</div><!-- filemgr-wrapper -->

@endsection


@section('javascript')
  <script src="{{asset('public/dashboard/assets/js/sidebar_page.js')}}"></script>
  <script src="{{asset('public/dashboard/lib/quill/quill.min.js')}}"></script>

  <script>
    var quill = new Quill('#editor-container', {
      modules: {
        toolbar: '#toolbar-container'
      },
      placeholder: 'Compose an epic...',
      theme: 'snow'
    });

    $('.select2').select2({
      placeholder: 'Choose one',
      searchInputPlaceholder: 'Search options'
    });

    $('#accordion').accordion({
      heightStyle: 'content'
    });

  </script>
@endsection