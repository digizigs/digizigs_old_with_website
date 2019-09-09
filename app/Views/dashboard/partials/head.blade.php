<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
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
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">


<!-- vendor css -->
<link href="{{asset('public//dashboard/lib/@fortawesome/fontawesome-free/css/all.min.css')}}" rel="stylesheet">
<link href="{{asset('public//dashboard/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
<link href="{{asset('public//dashboard/lib/nprogress/nprogress.css')}}" rel="stylesheet">
<!--link href="{{asset('public//dashboard/lib/jqvmap/jqvmap.min.css')}}" rel="stylesheet"-->
<!--link rel="stylesheet" href="{{asset('public//dashboard/assets/css/dashforge.css')}}">
<link rel="stylesheet" href="{{asset('public//dashboard/assets/css/dashforge.css')}}"-->
<link rel="stylesheet" href="{{asset('public//dashboard/assets/css/dashboard.css')}}">
<link rel="stylesheet" href="{{asset('public//dashboard/assets/css/dashforge.css')}}">
<!-- DashForge CSS -->
<!--link rel="stylesheet" href="{{asset('public//dashboard/assets/css/dashforge.css')}}">
<link rel="stylesheet" href="{{asset('public//dashboard/assets/css/dashforge.dashboard.css')}}"-->