@extends('layouts.dashboard.appmail')

@section('title','Mailbox')


@section('css')
	
	<link href="{{asset('public/dashboard/lib/quill/quill.core.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/lib/quill/quill.snow.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.mail.css')}}">

@endsection


@section('content')

	<mailbox></mailbox>

	<div id="mailCompose" class="mail-compose">
		<div class="mail-compose-dialog">
		<div class="mail-compose-header">
			<h6 class="mail-compose-title tx-white">New Message</h6>
			<nav class="nav nav-icon-only">
			<a id="mailComposeMinimize" href="" class="nav-link nav-link-minimize d-none d-lg-block">
				<i data-feather="minus"></i>
				<i data-feather="square"></i>
			</a>
			<a id="mailComposeShrink" href="" class="nav-link nav-link-shrink d-none d-lg-block">
				<i data-feather="minimize-2"></i>
				<i data-feather="maximize-2"></i>
			</a>
			<a id="mailComposeClose" href="" class="nav-link nav-link-close"><i data-feather="x"></i></a>
			</nav>
		</div><!-- mail-compose-header -->
		<div class="mail-compose-body">
			<div class="form-row align-items-center">
			<div class="col-sm">Recipient:</div>
			<div class="col-sm-10">
				<input type="text" class="form-control bd-0 pd-x-0" placeholder="Enter recipient's email address">
			</div>
			</div>
			<hr class="mg-y-10">
			<div class="form-row align-items-center">
			<div class="col-sm">Subject:</div>
			<div class="col-sm-10">
				<input type="text" class="form-control bd-0 pd-x-0" placeholder="Enter subject">
			</div>
			</div>
			<div id="editor-container2" class="ht-150 mg-t-15"></div>
			<div class="d-sm-flex align-items-center justify-content-between mg-t-25">
			<div id="toolbar-container2" class="bd-0-f pd-0-f">
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
			<div class="tx-13 mg-t-15 mg-sm-t-0">
				<button class="btn btn-white mg-r-5">Save as Draft</button>
				<button class="btn btn-primary">Send</button>
			</div>
			</div>
		</div><!-- mail-compose-body -->
		</div><!-- mail-compose-dialog -->
	</div><!-- mail-compose -->

@endsection


@section('javascript')
	 
	
  	<script src="{{asset('public/dashboard/lib/quill/quill.min.js')}}"></script>
	<!--script src="{{asset('public/dashboard/assets/js/dashforge.mail.js')}}"></script-->

	<!-- append theme customizer -->
	<!--script src="{{asset('public/dashboard/lib/js-cookie/js.cookie.js')}}"></script>
  	<script src="{{asset('public/dashboard/assets/js/dashforge.settings.js')}}"></script-->

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

				//new PerfectScrollbar('.mail-content-body', {
					//suppressScrollX: true
				//});


				// UI INTERACTION
				$('.mail-group-body .media').on('click', function(e){

					// removing previous selected item
					$('.mail-group .selected').removeClass('selected');

					$(this).addClass('selected');
					$(this).removeClass('unread');

					$('.mail-content-header').removeClass('d-none');
					$('.mail-content-body').removeClass('d-none');

					if(window.matchMedia('(max-width: 1199px)').matches) {
						$('body').addClass('mail-content-show');
					}

					if(window.matchMedia('(min-width: 768px)').matches) {
						$('#Sidebar').removeClass('d-md-none');
						$('#mainMenuOpen').removeClass('d-md-flex');
					}
				})

				// reply form
				//var quill = new Quill('#editor-container', {
					//modules: {
					//toolbar: '#toolbar-container'
					//},
					//placeholder: 'Compose an epic...',
					//theme: 'snow'
				//});

				// compose form
				var quill2 = new Quill('#editor-container2', {
					modules: {
					toolbar: '#toolbar-container2'
					},
					placeholder: 'Write your message here',
					theme: 'snow'
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


				$('#Sidebar').on('click touchstart', function(e){
					e.preventDefault()

					if($('body').hasClass('mail-content-show')) {
					$('body').removeClass('mail-content-show');
					} else {
					$('body').addClass('mail-sidebar-show');

					$('#Sidebar').addClass('d-none');
					$('#mainMenuOpen').removeClass('d-none');
					}

					if(window.matchMedia('(min-width: 768px)').matches) {
					$('#Sidebar').addClass('d-md-none');
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

						$('#Sidebar').removeClass('d-none');
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