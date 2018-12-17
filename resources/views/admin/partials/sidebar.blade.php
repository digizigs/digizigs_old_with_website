<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
   
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        

        <!--Dashboard-->
        <li class="{{current_page('dashboard') ? 'active' : '' }}">
          <a href="{{route('admin.home')}}">
            <i class="fa fa-tachometer"></i> <span>Dashboard</span>
          </a>
        </li><!--Dashboard-->
        
        <!--Posts -->
        <li class="{{current_page('/post/') ? 'active' : '' }} treeview">          
          <a href="{{url('/admin/appointment/all')}}">
            <i class="fa fa-thumb-tack"></i> <span>Post</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{current_page('post/all') ? 'active' : '' }}">
              <a href="{{route('post.all')}}"><i class="fa fa-circle-o"></i> All Posts</a>
            </li> 
            
            <li class="{{current_page('post/new') ? 'active' : '' }}">
              <a href="{{route('post.new')}}"><i class="fa fa-circle-o"></i>Add New</a>
            </li>
       
          </ul>
        </li><!--Posts-->

        <!--Category-->
        <li class="{{current_page('/category') ? 'active' : '' }}">
          <a href="{{route('categories')}}">
            <i class="fa fa-object-group"></i> <span>Categories</span>
          </a>
        </li><!--Category-->

        <!--Category-->
        <li class="{{current_page('/tags') ? 'active' : '' }}">
          <a href="{{route('tags')}}">
            <i class="fa fa-tags"></i> <span>Tags</span>
          </a>
        </li><!--Category-->

        
        <!--New Vue Appointment -->
        <li class="{{current_page('/appointment') ? 'active' : '' }} treeview">          
          <a href="{{url('/admin/appointment/all')}}">
            <i class="fa fa-handshake-o"></i> <span>Appointment</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{current_page('appointment/all') ? 'active' : '' }}">
              <a href="{{url('/admin/appointment/all')}}"><i class="fa fa-circle-o"></i> All Appointments</a>
            </li> 
            
            <li class="{{current_page('appointment/new') ? 'active' : '' }}">
              <a href="{{url('/admin/appointment/new')}}"><i class="fa fa-circle-o"></i>Book Appointment</a>
            </li>

            <li class="{{current_page('appointment/create') ? 'active' : '' }}">
              <a href="{{url('/admin/appointment/create')}}"><i class="fa fa-circle-o"></i> Doctor Schedule</a>
            </li>
          </ul>
        </li><!--Appointment-->




        <!--Profile-->
        <li class="{{current_page('profile') ? 'active' : '' }}">
          <a href="{{url('/admin/profile')}}">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li><!--Profile-->
        
        <!--Subscriptions-->
        <li class="{{current_page('subscription') ? 'active' : '' }}">
          <a href="{{route('subscriptions')}}">
            <i class="fa fa-flag-checkered"></i> <span>Subscriptions</span>
          </a>
        </li><!--Subscriptions-->

        <!--Inquiry-->
        <li class="{{current_page('inquiry') ? 'active' : '' }}">
          <a href="{{route('admin.settings')}}">
            <i class="fa fa-telegram"></i> <span>Inquiry</span>
          </a>
        </li><!--Inquiry-->

        <!--User Management -->
        <li class="{{current_page('/appointment') ? 'active' : '' }} treeview">          
          <a href="{{url('/admin/appointment/all')}}">
            <i class="fa fa-users"></i> <span>User Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{current_page('appointment/all') ? 'active' : '' }}">
              <a href="{{url('/admin/appointment/all')}}"><i class="fa fa-briefcase"></i>Permissions</a>
            </li> 
            
            <li class="{{current_page('appointment/new') ? 'active' : '' }}">
              <a href="{{url('/admin/appointment/new')}}"><i class="fa fa-briefcase"></i>Roles</a>
            </li>

            <li class="{{current_page('appointment/create') ? 'active' : '' }}">
              <a href="{{url('/admin/appointment/create')}}"><i class="fa fa-user"></i>Users</a>
            </li>
          </ul>
        </li><!--User Management-->

        <!--Setting-->
        <li class="{{current_page('setting') ? 'active' : '' }}">
          <!--a href="{{route('admin.settings')}}">
            <i class="fa fa-cogs"></i> <span>Settings</span>
          </a-->
          <a href="{{route('admin.settings')}}">
            <i class="fa fa-cogs"></i> <span>Settings</span>
          </a>
        </li><!--Setting-->
      </ul>

    </section>
    <!-- /.sidebar -->
</aside>