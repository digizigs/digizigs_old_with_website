@extends('layouts.dashboard.appfile')

@section('title','All Posts')


@section('css')
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">
    
    
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
            <div class="container content-components">
              
            </div>
        </div>
    </div><!-- filemgr-content-body -->
  </div><!-- filemgr-content -->

</div><!-- filemgr-wrapper -->

@endsection


@section('javascript')
  <script src="{{asset('public/dashboard/assets/js/sidebar_page.js')}}"></script>
@endsection