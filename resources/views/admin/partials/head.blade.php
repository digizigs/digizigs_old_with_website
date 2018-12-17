<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title> {{config('app.name')}} Admin @yield('title')</title>

<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Favicon -->
<link rel="shortcut icon" href="{{asset('public/images/fevicon/logo-icon.png')}}" type="image/x-icon">

<!-- Font Awesome -->
<!--ink rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"-->
<!--script src="https://use.fontawesome.com/3ebd152d2f.js"></script-->

<!--script src="{{asset('public/assets/ckeditor/ckeditor.js')}}"></script-->
<!--script src="https://cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script-->

<link rel="stylesheet" href="{{asset('public/css/admin.css')}}">

@section('HeaderSection')

@show