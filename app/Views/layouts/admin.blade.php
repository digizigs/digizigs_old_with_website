<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.partials.head')
  </head>

  <body class="nav-md ">
    <div class="container body" id="app">
      <div class="main_container">

        @include('admin.partials.sidebar')

        @include('admin.partials.topnav')

        @yield('content')

        @include('admin.partials.footer')


      </div>
    </div>

    <!-- jQuery -->

     @include('admin.partials.javascript')
  </body>
</html>
