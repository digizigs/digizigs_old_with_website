	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('public/images/brand_assets/d-fevi-orange.png')}}" type="image/ico" />

    <title> {{setting('app_name')}} | @yield('title') </title>

    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <meta name="user-id" content="{{Auth::check() ? Auth::user()->id : ''}}">

   
    <!-- Font Awesome -->
    <link href="{{asset('public/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/vendor/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{asset('public/vendor/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  
    <!-- bootstrap-progressbar -->
    <link href="{{asset('public/vendor/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{asset('public/vendor/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="{{asset('public/vendor/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

    <!-- select2 -->
    <link href="{{asset('public/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendor/dropzone/dist/min/dropzone.min.css')}}" rel="stylesheet">

    <!-- switchery -->
    <link href="{{asset('public/vendor/switchery/dist/switchery.min.css')}}" rel="stylesheet">

      <!-- prittyfy -->
    <link href="{{asset('public/vendor/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendor/starrr/dist/starrr.css')}}" rel="stylesheet">


    
    
    <!-- Custom Theme Style -->
    <link href="{{asset('public/css/admin_main.css')}}" rel="stylesheet">

@section('HeaderSection')

@show