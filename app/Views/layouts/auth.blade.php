
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{asset('public/images/brand_assets/d-fevi-orange.png')}}" type="image/ico" />
    <title>{{setting('app_name')}} |  @yield('title')</title>

    <!-- Bootstrap -->
    <link href="{{asset('public/vendor/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('public/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('public/vendor/nprogress/nprogress.css')}}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{asset('public/vendor/animate.css/animate.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('public/css/custom.css')}}" rel="stylesheet">
  </head>

  <body class="login ">

          
      <div class="login_wrapper">     
         @yield('content')
      </div>

    <script src='https://www.google.com/recaptcha/api.js'></script>
   
  </body>
</html>
