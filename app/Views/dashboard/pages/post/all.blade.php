@extends('layouts.dashboard.appfile')

@section('title','All Posts')


@section('css')
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">

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
@endsection


@section('content')

<div class="filemgr-wrapper">

  <div class="filemgr-sidebar">
      
    <div class="filemgr-content-header">
        <h4 class="mg-t-10">Post & Blocks</h4>
    </div><!-- filemgr-content-header -->

    <div class="filemgr-sidebar-body">
        <div class="pd-t-20 pd-b-10 pd-x-20">
            <ul class="nav nav-aside">

              <li class="nav-label active">Posts</li>
              <li class="nav-item"><a href="dashboard-two.html" class="nav-link active "><i data-feather="cast"></i> <span>All Post</span></a></li>
              <li class="nav-item"><a href="dashboard-three.html" class="nav-link"><i data-feather="plus-circle"></i> <span>Add Post</span></a></li>

              <li class="nav-label mg-t-25">Post Types</li>
              <li class="nav-item"><a href="app-calendar.html" class="nav-link"><i data-feather="maximize"></i> <span>Published</span></a></li>
              <li class="nav-item"><a href="app-chat.html" class="nav-link"><i data-feather="minimize"></i> <span>Draft</span></a></li>
              <li class="nav-item"><a href="app-contacts.html" class="nav-link"><i data-feather="trash"></i> <span>Trash</span></a></li>

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
            Body
        </div>
    </div><!-- filemgr-content-body -->
  </div><!-- filemgr-content -->

</div><!-- filemgr-wrapper -->

@endsection


@section('javascript')

<script>
    $(function(){
    'use strict'

    new PerfectScrollbar('.filemgr-sidebar-body', {
      suppressScrollX: true
    });

    new PerfectScrollbar('.filemgr-content-body', {
      suppressScrollX: true
    });
    
    

    $('#Sidebar').on('click', function(e){
      e.preventDefault();

      $('body').addClass('filemgr-sidebar-show');

      $(this).addClass('d-none');
      $('#mainMenuOpen').removeClass('d-none');

      


    });

    $(document).on('click touchstart', function(e){
      e.stopPropagation();

      // closing of sidebar menu when clicking outside of it
      if(!$(e.target).closest('.burger-menu').length) {
        var sb = $(e.target).closest('.filemgr-sidebar').length;
        if(!sb) {
          $('body').removeClass('filemgr-sidebar-show');

          $('#Sidebar').removeClass('d-none');
          $('#mainMenuOpen').addClass('d-none');
        }
      }
    });


    $('.important').on('click', function(e){
      e.preventDefault();

      var parent = $(this).closest('.card-file');
      var important = parent.find('.marker-icon');

      if(!important.length) {
        $(this).closest('.card-file').append('<div class="marker-icon marker-warning pos-absolute t--1 l--1"><i data-feather="star"></i></div>');

        $(this).html('<i data-feather="star"></i> Unmark as Important');

      } else {
        important.remove();

        $(this).html('<i data-feather="star"></i> Mark as Important');
      }

      feather.replace();
    })

    $('.download').on('click', function(e){
      e.preventDefault();

      $('#toast').toast('show');
    })

    if(window.matchMedia('(max-width: 991px)').matches) {
      console.log('max-width: 991px')
      $('#mainMenuOpen').addClass('d-none');
      //$('#mainMenuOpen').addClass('d-md-flex');
      //$('#mainMenuOpen').removeClass('d-none');
    }

  })
  </script>

@endsection