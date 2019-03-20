<!-- Start Header Area -->
<header id="header" class="">
    <div class="container main-menu">
        <div class="row align-items-center d-flex">
            <div id="logo" class="logo-black logo-hide">
                <a href="{{route('apphome')}}">
                    <img src="{{asset('public/images/brand_assets/DZ-Logo Orange-black.png')}}" alt="digizigs-logo" />
                </a>                
            </div>
            <div id="logo" class="logo-white ">
                <a href="{{route('apphome')}}">
                    <img src="{{asset('public/images/brand_assets/DZ-Logo Orange-black.png')}}" alt="digizigs-logo" />
                </a>                
            </div>            
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    
                    <li><a href="{{route('app.about')}}" class="{{ request()->is('about') ? 'active' : '' }}">About</a></li>
                    <li><a href="{{route('app.portfolio')}}" class="{{ request()->is('portfolio') ? 'active' : '' }}">Portfolio</a></li>
                    <li><a href="{{url('/services')}}" class="{{ request()->is('services') ? 'active' : '' }}">Services</a></li>
                    <!--li class="menu-has-children"><a href="#" >Services</a>
                        <ul class="child_menu">
                            <li><a href="elements.html">Web Design</a></li>
                            <li><a href="contact.html">Web Development</a></li>
                            <li><a href="contact.html">App Development</a></li>
                            <li><a href="services.html">UX/UI</a></li>
                            <li><a href="portfolio-details.html">Digital</a></li>
                            <li><a href="portfolio-details.html">Logo & Media</a></li>
                        </ul-->
                    </li>
                    <li><a href="{{url('/case-studies')}}" class="{{ request()->is('case-studies') ? 'active' : '' }}">Case Studies</a></li>
                    <li><a href="{{route('app.blog')}}" class="{{ request()->is('blog') ? 'active' : '' }}">Blog</a></li>
                    <li><a href="{{route('contact')}}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a></li>
                    
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- End Header Area -->