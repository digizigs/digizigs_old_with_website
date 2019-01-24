<div class="col-md-3 left_col menu_fixed">
  <div class="left_col scroll-view">
    <div class="navbar nav_title" style="border: 0;">
      <a href="{{route('admin.home')}}" class="site_title"><i class="fa fa-paw"></i> <span>{{setting('app_name')}}</span></a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
      <div class="profile_pic">
        <img src="{{asset('public/images/img.jpg')}}" alt="..." class="img-circle profile_img">
      </div>
      <div class="profile_info">
        <span>Welcome,</span>
        <h2>{{ Auth::user()->firstname }}, {{ Auth::user()->lastname }}</h2>
      </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          <li class=""><a href="{{route('admin.home')}}"><i class="fa fa-tachometer"></i> Dashboard </a>
          </li>

          <li><a><i class="fa fa-edit"></i> Post <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('post.index')}}">All Posts</a></li>
              <li><a href="{{route('post.create')}}">Add Post</a></li>
            </ul>
          </li>
          
          <li>
            <a href="{{route('category.index')}}"><i class="fa fa-object-group"></i> Category </a>
          </li>

          <li><a><i class="fa fa-universal-access"></i>Access Management<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('users.index')}}">Users</a></li>
              <li><a href="{{route('roles.index')}}">Roles</a></li>
              <li><a href="{{route('permissions.index')}}">Permission</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-plug"></i>Connects<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('subscription.index')}}">Subscriptions</a></li>
              <li><a href="{{route('inquiry.index')}}">Inquiry</a></li>
            </ul>
          </li>

          <li><a><i class="fa fa-users"></i>Client Management<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('service.index')}}">Services</a></li>
              <li><a href="{{route('project.index')}}">Projects</a></li>
              <li><a href="{{route('client.index')}}">Clients</a></li>
              <li><a href="{{route('billing.index')}}">Billing</a></li>
              <li><a href="{{route('invoice.index')}}">Invoice</a></li>
            </ul>
          </li>








        </ul>

        


      </div>
      <div class="menu_section">
       
      </div>

    </div>
    <!-- /sidebar menu -->

    <!-- /menu footer buttons -->
    <div class="sidebar-footer hidden-small">
      <a  href="{{route('settings.index')}}" data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Profile" href="{{route('profile.index')}}">
        <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
      </a>
      <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
      </form>
    </div>
    <!-- /menu footer buttons -->

    
  </div>
</div>