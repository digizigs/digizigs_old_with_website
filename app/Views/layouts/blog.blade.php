


<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}} | @yield('title')</title>

    <link href="{{asset('/public/css/blog.css')}}" rel="stylesheet">
   
</head>
<body>
    
    @include('blog.includes.nav')

    <div id="app">    
      
            @yield('content')
     
    </div>

   @include('blog.includes.footer')

    <!--Script-->
    <script src="{{asset('/public/js/blog.js')}}"></script>

</body>
</html>