<!-- Start Header Area -->
<header id="header" class="">
    <div class="container main-menu">
        <div class="row align-items-center d-flex">
            <div id="logo">
                <a href="{{route('apphome')}}"><img src="{{asset('public/images/brand_assets/DZ-Logo Orange-black.png')}}" alt="digizigs-logo" /></a>
            </div>
            <nav id="nav-menu-container">
                <ul class="nav-menu">
                    <li class=""><a class="active" href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li><a href="portfolio.html">Portfolio</a></li>
                    <li class="menu-has-children"><a href="#">Pages</a>
                        <ul>
                            <li><a href="elements.html">Elements</a></li>
                            <li><a href="contact.html">Contact</a></li>
                            <li><a href="services.html">Service</a></li>
                            <li><a href="portfolio-details.html">Portfolio Details</a></li>
                        </ul>
                    </li>
                    <li><a href="{{route('app.blog')}}">Blog</a></li>
                    
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- End Header Area -->