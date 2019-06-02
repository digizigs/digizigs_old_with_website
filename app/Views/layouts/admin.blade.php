<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.partials.head')
  </head>

  <body class="nav-md">
    <div class="container body" id="app">
      <div class="main_container">

        @include('admin.partials.sidebar')

        <!-- top navigation -->
        @include('admin.partials.topnav')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        @include('admin.partials.footer')
      </div>
    </div>

    <!-- jQuery -->

     @include('admin.partials.javascript')
  </body>
</html>
