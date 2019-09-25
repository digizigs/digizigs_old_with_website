@extends('layouts.dashboard.appfile')

@section('title','All Posts')


@section('css')
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">
<<<<<<< HEAD

    <style> 
      .filemgr-sidebar-body{
          .nav-aside{
            ul{
              li{
                svg{color: red !important;}
                a{
                 span{
                   color: red !important;
                 }
                }
              }
            }
          }
        }
        
    </style>
=======
    
    
>>>>>>> 40f78c7d4cf72ce0bb1e9055b9332fa38a292784
@endsection


@section('content')

<div class="filemgr-wrapper sidebar-page">

  @include('dashboard.pages.post.sidebar')

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

    

    <div class="filemgr-content-body" style="background-color: #fff">
        <div class="pd-10 pd-lg-10 pd-xl-10">
            <div class="container content-components">
              <div class="table-responsive">
                <table class="table table-striped mg-b-0">
                  <thead>
                    <tr>
                      
                      <th scope="col">Title</th>
                      <th scope="col">Description</th>
                      <th scope="col">Author</th>
                      <th scope="col">Category</th>
                    </tr>
                  </thead>
                  <tbody>

                  @foreach($posts as $post)
                    <tr>                  
                      <td>{{$post->title}}</td>
                      <td>{{$post->description}}</td>
                      <td>Computer Science</td>
                      <td>$120,000</td>
                    </tr>
                  @endforeach

                  </tbody>
                </table>
              </div>
            </div>
        </div>
    </div><!-- filemgr-content-body -->
  </div><!-- filemgr-content -->

</div><!-- filemgr-wrapper -->

@endsection


@section('javascript')
  <script src="{{asset('public/dashboard/assets/js/sidebar_page.js')}}"></script>
@endsection