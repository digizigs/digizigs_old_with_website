@extends('layouts.dashboard.appmail')

@section('title','Dashboard')


@section('css')
	
	<link href="{{asset('public/dashboard/lib/quill/quill.core.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/lib/quill/quill.snow.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.mail.css')}}">
<style>
    .mail-group-body {
        position: absolute;
        top: 0px;
        left: 0;
        right: 0;
        bottom: 0; 
    }
    .logstack{
      display:none;
    }
    .logstack.show{
      display:block;
    }  
</style>
@endsection


@section('content')

<div class="mail-wrapper">

  	<div class="mail-sidebar">
		<div class="mail-sidebar-body">	
			<div class="pd-y-10 pd-x-10">
                <nav class="nav nav-sidebar tx-13">
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
                    @foreach($files as $file)
                    
                        <a href="?l={{ \Illuminate\Support\Facades\Crypt::encrypt($file) }}" class="nav-link @if ($current_file == $file) active @endif">
                            {{$file}}
                        </a>
                    
                    @endforeach      
                </nav>
			</div>
		</div><!-- mail-sidebar-body -->
  	</div><!-- mail-sidebar -->

	<div class="mail-group">
		
		<div class="mail-group-body">

      <div class="pd-y-10 pd-x-10">
        @if($current_file)
          <a href="?dl={{ \Illuminate\Support\Facades\Crypt::encrypt($current_folder ? $current_folder . "/" . $current_file : $current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
            <span class="fa fa-download"></span> Download file
          </a>
          -
          <a id="clean-log" href="?clean={{ \Illuminate\Support\Facades\Crypt::encrypt($current_folder ? $current_folder . "/" . $current_file : $current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
            <span class="fa fa-sync"></span> Clean file
          </a>
          -
          <a id="delete-log" href="?del={{ \Illuminate\Support\Facades\Crypt::encrypt($current_folder ? $current_folder . "/" . $current_file : $current_file) }}{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
            <span class="fa fa-trash"></span> Delete file
          </a>
          @if(count($files) > 1)
            -
            <a id="delete-all-log" href="?delall=true{{ ($current_folder) ? '&f=' . \Illuminate\Support\Facades\Crypt::encrypt($current_folder) : '' }}">
              <span class="fa fa-trash-alt"></span> Delete all files
            </a>
          @endif
        @endif
      </div>

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
        @endforeach

			</ul>
			
			
		
    
		</div><!-- mail-group-body -->
	</div><!-- mail-group -->

	<div class="mail-content">
		<div class="mail-content-header d-none">
			<a href="" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
			<div class="media">
			<div class="avatar avatar-sm"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
			<div class="media-body mg-l-10">
				<h6 class="mg-b-2 tx-13">Reynante Labares</h6>
				<span class="d-block tx-11 tx-color-03">Today, 11:40am</span>
			</div><!-- media-body -->
			</div><!-- media -->
			<nav class="nav nav-icon-only mg-l-auto">
			<a href="" data-toggle="tooltip" title="Archive" class="nav-link d-none d-sm-block"><i data-feather="archive"></i></a>
			<a href="" data-toggle="tooltip" title="Report Spam" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
			<a href="" data-toggle="tooltip" title="Mark Unread" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
			<a href="" data-toggle="tooltip" title="Add Label" class="nav-link d-none d-sm-block"><i data-feather="folder"></i></a>
			<a href="" data-toggle="tooltip" title="Add Tag" class="nav-link d-none d-sm-block"><i data-feather="tag"></i></a>
			<span class="nav-divider d-none d-sm-block"></span>
			<a href="" data-toggle="tooltip" title="Mark Important" class="nav-link d-none d-sm-block"><i data-feather="star"></i></a>
			<a href="" data-toggle="tooltip" title="Trash" class="nav-link d-none d-sm-block"><i data-feather="trash"></i></a>
			<a href="" data-toggle="tooltip" title="Print" class="nav-link d-none d-sm-block"><i data-feather="printer"></i></a>
			<a href="" data-toggle="tooltip" title="Options" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
			</nav>
		</div><!-- mail-content-header -->
		<div class="mail-content-body d-none">
			<div class="pd-20 pd-lg-25 pd-xl-30">
			<h5 class="mg-b-30">30 Seconds Survey to Your Next Job</h5>

			<h6 class="tx-semibold mg-b-0">Ms. Katherine Lumaad</h6>
			<span class="tx-color-03">ThemePixels, Inc.</span>
			<p class="tx-color-03">San Francisco, CA, United States</p>

			<p>Greetings!</p>
			<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
			<p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. </p>
			<p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem.</p>
			<p>
				<span>Sincerely yours,</span><br>
				<strong>Envato Design Team</strong>
			</p>
			</div>
			<div class="pd-20 pd-lg-25 pd-xl-30 pd-t-0-f">
			<div id="editor-container" class="tx-13 tx-lg-14 ht-500">
				Type here to <u>Reply</u> or <u>Forward</u>
			</div>
			<div class="d-flex align-items-center justify-content-between mg-t-10">
				<div id="toolbar-container" class="bd-0-f pd-0-f">
					<span class="ql-formats">
					<button class="ql-bold"></button>
					<button class="ql-italic"></button>
					<button class="ql-underline"></button>
					</span>
					<span class="ql-formats">
					<button class="ql-link"></button>
					<button class="ql-image"></button>
					</span>
				</div>
				<button class="btn btn-primary">Reply</button>
			</div>
			</div>
		</div><!-- mail-content-body -->
	</div><!-- mail-content -->

</div><!-- mail-wrapper -->



@endsection


@section('javascript')

<script>
$(function(){
  'use strict'

  $('[data-toggle="tooltip"]').tooltip()

  new PerfectScrollbar('.mail-sidebar-body', {
    suppressScrollX: true
  });

  new PerfectScrollbar('.mail-group-body', {
    suppressScrollX: true
  });

  new PerfectScrollbar('.mail-content-body', {
    suppressScrollX: true
  });


  // UI INTERACTION
  $('#showmore').on('click',function(e){
    e.preventDefault()
    $('#logstack').toggleClass('show')
  });

  

  $('#mailComposeBtn').on('click', function(){
    $('#mailCompose').addClass('show');
  })

  $('#mailComposeClose').on('click', function(e){
    e.preventDefault()

    if($('#mailCompose').hasClass('minimize') || $('#mailCompose').hasClass('shrink')) {
      $('#mailCompose').addClass('d-none');

      setTimeout(function(){
        $('#mailCompose').attr('class', 'mail-compose');
      },500);

    } else {
      $('#mailCompose').removeClass('show');
    }
  })

  $('#mailComposeShrink').on('click', function(e){
    e.preventDefault()
    $('#mailCompose').toggleClass('shrink')
    $('#mailCompose').removeClass('minimize')
  })

  $('#mailComposeMinimize').on('click', function(e){
    e.preventDefault()
    $('#mailCompose').toggleClass('minimize')
  })


  $('#mailSidebar').on('click touchstart', function(e){
    e.preventDefault()

    if($('body').hasClass('mail-content-show')) {
      $('body').removeClass('mail-content-show');
    } else {
      $('body').addClass('mail-sidebar-show');

      $('#mailSidebar').addClass('d-none');
      $('#mainMenuOpen').removeClass('d-none');
    }

    if(window.matchMedia('(min-width: 768px)').matches) {
      $('#mailSidebar').addClass('d-md-none');
      $('#mainMenuOpen').addClass('d-md-flex');
    }
  })

  $(document).on('click touchstart', function(e){
    e.stopPropagation();

    // closing of sidebar menu when clicking outside of it
    if(!$(e.target).closest('.burger-menu').length) {
      var sb = $(e.target).closest('.mail-sidebar').length;
      if(!sb) {
        $('body').removeClass('mail-sidebar-show');

        $('#mailSidebar').removeClass('d-none');
        $('#mainMenuOpen').addClass('d-none');
      }
    }
  });

  // closing mail content in lg breakpoint only
  $('#mailContentClose').on('click', function(e){
    e.preventDefault()
    $('body').removeClass('mail-content-show');
  })


  // set one mail item as selected in xl breakpoint by default
  // for demo purpose only
  if(window.matchMedia('(min-width: 1200px)').matches) {
    $('.mail-group-body .media:nth-of-type(2)').addClass('selected');

    $('.mail-content-header').removeClass('d-none');
    $('.mail-content-body').removeClass('d-none');
  }

});
</script>

@endsection