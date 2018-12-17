<?php 
  function current_page($uri = "/") { 
    return strstr(request()->path(), $uri); 
  } 
?>

<?php 
  function current_link() { 
    return strstr(request()->path()); 
  } 
?>

<!DOCTYPE html>
<html>

<head>
    @include('admin.partials.head')
</head>


<body class="sidebar-mini">
  <div class="wrapper" id="app">
    
     
    @include('admin.partials.topbar')

    @include('admin.partials.sidebar')
    
    <div class="content-wrapper">
      <div class="main-content">
        
        @if (session('status'))
          <div class="alert alert-info">
              {{ session('status') }}
          </div>
        @endif  
    
        <!--Content-->
          <!--router-view></router-view-->
           @yield('content')
        <!--Content-->

      </div>
    </div>
        
    @include('admin.partials.footer')
      
    @include('admin.partials.controlsidebar')
            
    <div class="control-sidebar-bg"></div>

  </div>
<!-- ./wrapper -->


@include('admin.partials.javascript')


@section('FooterSection')

@show

</body>
</html>
