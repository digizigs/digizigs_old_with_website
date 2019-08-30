<!DOCTYPE html>
<html lang="en">

    <head>
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
    
    

        <link href="{{asset('public/css/dashboard.css')}}" rel="stylesheet">

    </head>

    <body class="">

        <div class="" id="vueapp">
            @yield('content')
        </div>

    

        <!-- Javascript -->
        <script src="{{asset('public/vendor/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('public/vendor/bootstrap/dist/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/js/dashboard.js')}}"></script>
        @include('admin.partials.javascript')


    </body>
</html>
