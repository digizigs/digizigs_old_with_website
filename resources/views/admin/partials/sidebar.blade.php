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

        <!--Tags-->
        <li class="{{current_page('/tags') ? 'active' : '' }}">
          <a href="{{route('tags')}}">
            <i class="fa fa-tags"></i> <span>Tags</span>
          </a>
        </li><!--Tags-->
                               
        <!--Connects -->
        <li class="{{current_page('/connects') ? 'active' : '' }} treeview">          
          <a href="{{route('subscriptions')}}">
            <i class="fa fa-plug"></i> <span>Connects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{current_page('connects/subscription') ? 'active' : '' }}">
              <a href="{{route('subscriptions')}}"><i class="fa fa-flag-checkered"></i>Subscriptions</a>
            </li> 
            
            <li class="{{current_page('connects/inquiry') ? 'active' : '' }}">
              <a href="{{route('admin.settings')}}"><i class="fa fa-telegram"></i>Inquiry</a>
            </li>
        
          </ul>
        </li><!--Connects-->

         <!--Media Library -->
        <li class="{{current_page('/medialibrary') ? 'active' : '' }} treeview">          
          <a href="">
            <i class="fa fa-picture-o"></i> <span>Media Library</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{current_page('medialibrary/gallery') ? 'active' : '' }}">
              <a href="{{route('medialibrary.gallery')}}"><i class="fa fa-camera-retro"></i>Gallery</a>
            </li> 
            
            <li class="{{current_page('connects/inquiry') ? 'active' : '' }}">
              <a href="{{route('admin.settings')}}"><i class="fa fa-telegram"></i>Inquiry</a>
            </li>
        
          </ul>
        </li><!--Media Library-->

        <!--Access Management -->
        @can('client_manage')
        <li class="{{current_page('/client') ? 'active' : '' }} treeview">          
          <a href="">
            <i class="fa fa-ravelry"></i> <span>Client Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            
            <li class="{{current_page('client/invoice') ? 'active' : '' }}">
              <a href="{{route('invoice.index')}}"><i class="fa fa-money"></i>Invoice</a>
            </li>
          </ul>
        </li><!--Access Management-->
        @endcan


        <!--Access Management -->
        @can('users_manage')
        <li class="{{current_page('/access') ? 'active' : '' }} treeview">          
          <a href="">
            <i class="fa fa-universal-access"></i> <span>Access Management</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{current_page('access/permission') ? 'active' : '' }}">
              <a href="{{route('permission.index')}}"><i class="fa fa-key"></i>Permissions</a>
            </li> 
            
            <li class="{{current_page('access/role') ? 'active' : '' }}">
              <a href="{{route('role.index')}}"><i class="fa fa-briefcase"></i>Roles</a>
            </li>

            <li class="{{current_page('access/user') ? 'active' : '' }}">
              <a href="{{route('user.index')}}"><i class="fa fa-users"></i>Users</a>
            </li>
          </ul>
        </li><!--Access Management-->
        @endcan

         <!--Test Lab -->
        <li class="{{current_page('/testlab/') ? 'active' : '' }} treeview">          
          <a href="">
            <i class="fa fa-flask"></i> <span>Test Lab</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li class="{{current_page('testlab/test') ? 'active' : '' }}">
              <a href="{{route('testlab')}}"><i class="fa fa-circle-o"></i> Test</a>
            </li> 
                
          </ul>
        </li><!--Test Lab-->

        <!--Profile-->
        <li class="{{current_page('account') ? 'active' : '' }}">
          <a href="{{route('profile.index')}}">
            <i class="fa fa-user"></i> <span>Profile</span>
          </a>
        </li><!--Profile-->

        <!--Setting-->
        <li class="{{current_page('setting') ? 'active' : '' }}">
          <!--a href="{{route('admin.settings')}}">
            <i class="fa fa-cogs"></i> <span>Settings</span>
          </a-->
          <a href="{{route('admin.settings')}}">
            <i class="fa fa-cogs"></i> <span>Settings</span>
          </a>
        </li><!--Setting-->

        <!--Logout-->
        <li class="">
          <!--a href="{{route('admin.settings')}}">
            <i class="fa fa-cogs"></i> <span>Settings</span>
          </a-->
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fa fa-power-off"></i> <span>Logout</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
          </form>
        </li><!--Logout-->


      </ul>

    </section>
    <!-- /.sidebar -->
</aside>