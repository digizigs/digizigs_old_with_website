  <div class="top_nav">
  <div class="nav_menu">
    <nav>
      <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
      </div>

      <ul class="nav navbar-nav navbar-right">

        <li class="">
          <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{asset('public/images/img.jpg')}}" alt="">{{ Auth::user()->firstname }}, {{ Auth::user()->lastname }}
            <span class=" fa fa-angle-down"></span>
          </a>
          <ul class="dropdown-menu dropdown-usermenu pull-right">
            <li><a href="{{route('profile.index')}}"> Profile</a></li>
            <li>
              <a href="{{route('settings.index')}}">
                <span class="badge bg-red pull-right">50%</span>
                <span>Settings</span>
              </a>
            </li>
            
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-sign-out pull-right"></i> Log Out</a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
              </form>

            </li>
          </ul>
        </li>

        <li role="presentation" class="dropdown">
          
          <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
            @if(Auth::user()->unreadNotifications->count())
            <i class="fa fa-bell"></i>
            
              <span class="badge bg-orange">{{Auth::user()->unreadNotifications->count()}}</span>
            @endif
          </a>
          
          <ul id="menu1" class="dropdown-menu list-unstyled msg_list to_do" role="menu">
            
            @foreach(Auth::user()->unreadNotifications()->paginate(5) as $notification)
              <li>                
                <a>
                  <span>
                    <span><b>{{$notification->data['notify']['title']}}</b></span>
                    <span class="time">{{Carbon\Carbon::parse($notification->created_at)->diffForHumans()}}</span>
                    
                  </span>
                  <span class="message">
                    {{$notification->data['notify']['body']}}
                    <span>
                        <a href="">View</a>
                    </span>                    
                  </span>
                </a>
                               
                
              </li>
          
            @endforeach                      
              <div class="text-center">

                @if(Auth::user()->unreadNotifications->count())
                  <a class="pull-left" style="padding:5px 10px;">
                    See All Alerts
                  </a>
                  <a href="{{route('marknotificationread')}}" class="pull-right" style="padding:5px 10px;">
                    Mark all as read
                  </a>
                
                @endif

              </div>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</div>