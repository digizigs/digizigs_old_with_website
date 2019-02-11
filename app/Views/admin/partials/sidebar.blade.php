<div class="col-md-3 left_col">
  <div class="left_col scroll-view">


    <div class="navbar nav_title" style="border: 0;">
      <a href="{{route('admin.home')}}" class="site_title" >
        <img src="{{asset('public/images/DigiZigs_new_2.png')}}" style="width: 180px;" > 
      </a>
    </div>

    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

      <div class="menu_section">

        <h3>General</h3>
        <ul class="nav side-menu">
          <li class=""><a href="{{route('admin.home')}}"><i class="fa fa-tachometer"></i> Dashboard </a>
          </li>

          <li><a><i class="fa fa-edit"></i> Article <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{route('post.index')}}">All Article</a></li>
              <li><a href="{{route('post.create')}}">Add Article</a></li>
            </ul>
          </li>
          
          <li>
            <a href="{{route('category.index')}}"><i class="fa fa-object-group"></i> Category </a>
          </li>

          <li>
            <a href="{{route('menu-index')}}"><i class="fa fa-bars"></i> Menus </a>
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
              <li><a href="{{route('client.index')}}">Clients</a></li>
              <li><a href="{{route('service.index')}}">Products</a></li>
              <li><a href="{{route('project.index')}}">Projects</a></li>
              <li><a href="{{route('project.index')}}">Tasks</a></li>
              <li><a href="{{route('project.index')}}">Vendors</a></li>
              <li><a href="{{route('project.index')}}">Proposels</a></li>
              <li><a href="{{route('project.index')}}">Quotations</a></li>
              <li><a href="{{route('billing.index')}}">Payments</a></li>
              <li><a href="{{route('billing.index')}}">Credits</a></li>
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
      <a href="{{route('settings.index')}}" data-toggle="tooltip" data-placement="top" title="Settings">
        <i class="fa fa-cog" aria-hidden="true"></i>
      </a>
      <a href="{{route('apphome')}}" data-toggle="tooltip" data-placement="top" title="Homepage">
        <i class="fa fa-home" aria-hidden="true"></i>
      </a>
      <a href="{{route('profile.index')}}" data-toggle="tooltip" data-placement="top" title="Profile">
        <i class="fa fa-user" aria-hidden="true"></i>
      </a>
      <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="Logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-power-off" aria-hidden="true"></i>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
        </form>
      </a>
    </div>
    <!-- /menu footer buttons -->

    
  </div>
</div>