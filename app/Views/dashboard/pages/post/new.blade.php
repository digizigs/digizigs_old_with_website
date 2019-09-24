@extends('layouts.dashboard.appfile')

@section('title','All Posts')


@section('css')
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">
    <link href="{{asset('public/dashboard/lib/quill/quill.core.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/lib/quill/quill.snow.css')}}" rel="stylesheet">
    
@endsection


@section('content')

<div class="filemgr-wrapper sidebar-page">

  @include('dashboard.pages.post.sidebar')

  <newpost></newpost>

  

</div><!-- filemgr-wrapper -->

@endsection


@section('javascript')
  <script src="{{asset('public/dashboard/assets/js/sidebar_page.js')}}"></script>
  <script src="{{asset('public/dashboard/lib/quill/quill.min.js')}}"></script>

  <script>
    //var quill = new Quill('#editor-container', {
      //modules: {
        //toolbar: '#toolbar-container'
      //},
      //placeholder: 'Compose an epic...',
      //theme: 'snow'
    //});

    $('#postform').on('submit',function(){
      $("#hiddenArea").val(quill.container.firstChild.innerHTML);
    })

    $('.select2').select2({
      placeholder: 'Choose one',
      searchInputPlaceholder: 'Search options'
    });

    $('#accordion').accordion({
      //heightStyle: 'content'
    });

    $('.collapse').collapse()


    $('#accordion5').accordion({
      heightStyle: 'content'
    });

    $('#accordion4').accordion({
      heightStyle: 'content'
    });

    $('#accordion7').accordion({
      heightStyle: 'content'
    });


  </script>
@endsection