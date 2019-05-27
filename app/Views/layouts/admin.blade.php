<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.partials.head')
  </head>

  <body class="nav-md">
    <div class="container body" id="app">
      <div class="main_container" style="margin-bottom: -20px; height: 90vh">

        <!-- sidebar -->
        @include('admin.partials.sidebar')

        <!-- top navigation -->
        @include('admin.partials.topnav')
        <!-- /top navigation -->

        <!-- page content -->
        @yield('content')
        <!-- /page content -->

        <!-- footer content -->
        @include('admin.partials.footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->

     @include('admin.partials.javascript')
  </body>
</html>
