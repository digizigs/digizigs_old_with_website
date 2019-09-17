@extends('layouts.dashboard.appfile')

@section('title','All Posts')


@section('css')
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">

    <style>
      .filemgr-sidebar-bodyss {
        position: absolute;
        top: 0px;
        left: 0;
        right: 0;
        bottom: 0; 
    }

    .filemgr-content-bodyss{
      position: absolute;
      top: 0px;
      left: 0;
      right: 0;
      bottom: 0; 
    }

  .filemgr-content-bodys .mediassss {
    padding: 15px 20px;
    background-color: #f8f9fc;
    transition: all 0.2s ease-in-out; }


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
            <li class="nav-label">Dashboard</li>
            <li class="nav-item active"><a href="dashboard-one.html" class="nav-link"><i data-feather="shopping-bag"></i> <span>Sales Monitoring</span></a></li>
            <li class="nav-item"><a href="dashboard-two.html" class="nav-link"><i data-feather="globe"></i> <span>Website Analytics</span></a></li>
            <li class="nav-item"><a href="dashboard-three.html" class="nav-link"><i data-feather="pie-chart"></i> <span>Cryptocurrency</span></a></li>
            <li class="nav-item"><a href="dashboard-four.html" class="nav-link"><i data-feather="life-buoy"></i> <span>Helpdesk Management</span></a></li>
            <li class="nav-label mg-t-25">Web Apps</li>
            <li class="nav-item"><a href="app-calendar.html" class="nav-link"><i data-feather="calendar"></i> <span>Calendar</span></a></li>
            <li class="nav-item"><a href="app-chat.html" class="nav-link"><i data-feather="message-square"></i> <span>Chat</span></a></li>
            <li class="nav-item"><a href="app-contacts.html" class="nav-link"><i data-feather="users"></i> <span>Contacts</span></a></li>
            <li class="nav-item"><a href="app-file-manager.html" class="nav-link"><i data-feather="file-text"></i> <span>File Manager</span></a></li>
            <li class="nav-item"><a href="app-mail.html" class="nav-link"><i data-feather="mail"></i> <span>Mail</span></a></li>

            <li class="nav-label mg-t-25">Pages</li>
            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="user"></i> <span>User Pages</span></a>
                <ul>
                <li><a href="page-profile-view.html">View Profile</a></li>
                <li><a href="page-connections.html">Connections</a></li>
                <li><a href="page-groups.html">Groups</a></li>
                <li><a href="page-events.html">Events</a></li>
                </ul>
            </li>
            <li class="nav-item with-sub">
                <a href="" class="nav-link"><i data-feather="file"></i> <span>Other Pages</span></a>
                <ul>
                <li><a href="page-timeline.html">Timeline</a></li>
                </ul>
            </li>
            <li class="nav-label mg-t-25">User Interface</li>
            <li class="nav-item"><a href="../../components" class="nav-link"><i data-feather="layers"></i> <span>Components</span></a></li>
            <li class="nav-item"><a href="../../collections" class="nav-link"><i data-feather="box"></i> <span>Collections</span></a></li>
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