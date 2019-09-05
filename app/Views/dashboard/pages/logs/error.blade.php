@extends('layouts.dashboard.appfile')

@section('title','File Manager')


@section('css')

    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">
  
    <style>
      .filemgr-sidebar-body {
        position: absolute;
        top: 0px;
        left: 0;
        right: 0;
        bottom: 0; 
    }

    .filemgr-content-body{
      position: absolute;
      top: 0px;
      left: 0;
      right: 0;
      bottom: 0; 
    }

  .filemgr-content-body .media {
    padding: 15px 20px;
    background-color: #f8f9fc;
    transition: all 0.2s ease-in-out; }


    </style>
@endsection


@section('content')

<div class="filemgr-wrapper">

  <div class="filemgr-sidebar">
    
    <div class="filemgr-sidebar-body">
      <div class="pd-t-20 pd-b-10 pd-x-10">
        @foreach($folders as $folder)
            {{$folder}}
            @if ($current_folder == $folder)
            @foreach($folder_files as $file)
                {{$file}}
            @endforeach
            @endif
        @endforeach
        @if(!$files)
          <h5>No Files to show</h5>
        @endif

        <nav class="nav nav-sidebar tx-13">
          @foreach($files as $file)
            <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}" class="nav-link @if ($current_file == $file) active @endif">
              <i data-feather="folder"></i> <span>{{$file}}</span>
            </a>
          @endforeach 
        </nav>
      </div>
    </div><!-- filemgr-sidebar-body -->
  </div><!-- filemgr-sidebar -->

  <div class="filemgr-content">
    <div class="filemgr-content-header">
      <nav class="nav d-none d-sm-flex mg-l-auto">
        <a href="" class="nav-link"><i data-feather="list"></i></a>
        <a href="" class="nav-link"><i data-feather="alert-circle"></i></a>
        <a href="" class="nav-link"><i data-feather="settings"></i></a>
      </nav>
    </div><!-- filemgr-content-header -->
    <div class="filemgr-content-body">
      <div class="pd-10 pd-lg-10 pd-xl-10">
        
        <div class="row">
          <ul class="list-unstyled media-list mg-b-0">
            @if(!$logs)
              <div class="pd-y-10 pd-x-10">
                <H3>No App log to show</H3>
              </div>
            @endif
            @foreach($logs as $key => $log)
            <li class="media">  
                <div class="media-body mg-l-15">
                    <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
                        <h5 class="">{{$log['level']}} :: {{$log['context']}} :: {{{$log['date']}}}</h5>
                    </div>
                                                              
                    <p class="tx-12 tx-color-03 mg-b-0">{{{$log['text']}}}</p>
                    
                    @if (isset($log['in_file']))
                      <br/>{{{$log['in_file']}}}
                    @endif
                </div><!-- media-body -->
            </li>
            <hr>
            @endforeach

          </ul>
        </div>

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