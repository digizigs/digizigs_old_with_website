@extends('layouts.dashboard.appmail')

@section('title','Mailbox')


@section('css')

	<link href="{{asset('public/dashboard/lib/quill/quill.core.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/lib/quill/quill.snow.css')}}" rel="stylesheet">
	
	<link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.mail.css')}}">

@endsection


@section('content')

	<mailbox></mailbox>

@endsection


@section('javascript')
	 

  	<script src="{{asset('public/dashboard/lib/quill/quill.min.js')}}"></script>
	  
	<!--script src="{{asset('public/dashboard/assets/js/dashforge.mail.js')}}"></script-->

	<!-- append theme customizer -->
	<!--script src="{{asset('public/dashboard/lib/js-cookie/js.cookie.js')}}"></script>
  	<script src="{{asset('public/dashboard/assets/js/dashforge.settings.js')}}"></script-->
	
	  <script>
	  	(function($) {

			'use strict'

			var Defaults = $.fn.select2.amd.require('select2/defaults');

			$.extend(Defaults.defaults, {
			searchInputPlaceholder: ''
			});

			var SearchDropdown = $.fn.select2.amd.require('select2/dropdown/search');

			var _renderSearchDropdown = SearchDropdown.prototype.render;

			SearchDropdown.prototype.render = function(decorated) {

			// invoke parent method
			var $rendered = _renderSearchDropdown.apply(this, Array.prototype.slice.apply(arguments));

			this.$search.attr('placeholder', this.options.get('searchInputPlaceholder'));

			return $rendered;
			};

		})(window.jQuery);

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
				
				$('.select2').select2({
					placeholder: 'Choose one',
					searchInputPlaceholder: 'Search options'
				});

				

				// reply form
				//var quill = new Quill('#editor-container', {
					//modules: {
					//toolbar: '#toolbar-container'
					//},
					//placeholder: 'Compose an epic...',
					//theme: 'snow'
				//});

				// compose form
				//var quill2 = new Quill('#editor-container2', {
					//modules: {
						//toolbar: [
								//[{ header: [1, 2, false] }],
								//['bold', 'italic', 'underline'],
								//['image', 'code-block']
							//]
					//},
					//placeholder: 'Write your message here',
					//theme: 'snow'
				//});

				

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

				$('.mail-content-header').removeClass('d-none');
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