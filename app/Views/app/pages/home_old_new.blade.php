@extends('layouts.app')

@section('title','Leading Web Design and Devlopment Agency')



@section('content')


<!--Header-area-->
<header id="header-area" class="header-area overlay full-height relative v-center" id="home-page" style="background:#000000 url({{asset('public/web/images/parallax-2.jpg')}}) no-repeat scroll center center / cover;">

    <div class="absolute anlge-bgk" style="background: url({{asset('public/web/images/angle-bg.png')}}) no-repeat scroll center bottom -120px / 100% auto;">
        
    </div>
    <div class="container">
        <div class="row v-center">

            <div class="col-xs-12 col-md-7 header-text">
                <h2>
                    <span>We design and develop experiences to . . . .</span><br>
                    <span   class="txt-rotate" 
                            data-period="2000" 
                            data-rotate='["make Your Business Grow.",
                                         "stablish your Brand", 
                                         "improve your Productivity", 
                                         "create your Digital Identity", 
                                         "Manage your Business" ]'>
                    </span>
                </h2>
                <p>When it about success of your website, app or software, strategy is everything. We understand the business. That's why we create every project as a workshop — crafting a one-of-a-kind, Our unique strategy that is designed to help you win in this competitive market.We keep you one step ahead of your competitor.</p>

                <a href="#" class="button">Get Started</a>
            </div>

            <div class="hidden-xs hidden-sm col-md-5 text-right">
                <div class="screen-box screen-slider">
                    <div class="item ">
                       <a href="">
                          <div class="item-box">
                              <img src="{{asset('public/web/images/service-icon-3.png')}}" alt="">
                              <h3>SPECIAL FEATURES</h3>
                                <p>Ours is company providing full spectrum of custom services. Be it mobile app, web app, e-commerce solutions or digital promotions, you have it all.</p>
                          </div>
                          
                       </a> 
                    </div>
                    <div class="item ">
                       <a href="">
                          <div class="item-box">
                              <img src="{{asset('public/web/images/portfolio-icon-1.png')}}" alt="">
                              <h3>Loaded with features</h3>
                                <p>Discover the web design trends, techniques, and tools that will define website and digital product design.</p>
                          </div>
                       </a>
                    </div>
                    <div class="item ">
                       <a href="">
                         <div class="item-box">
                             <img src="{{asset('public/web/images/portfolio-icon-6.png')}}" alt="">
                             <h3>Responsive web design</h3>
                            <p>Responsive Web Design is the combination of flexible grids, flexible images, and media queries.</p>
                         </div>                        
                       </a> 
                    </div>
                    <div class="item ">
                       <a href="">
                         <div class="item-box">
                             <img src="{{asset('public/web/images/service-icon-1.png')}}" alt="">
                             <h3>Easy to Edit</h3>
                                <p>We provide you a 100% Customization with admin panel you can edit easily.</p>
                         </div>                       
                       </a> 
                    </div>
                    <div class="item ">
                       <a href="">
                         <div class="item-box">
                             <img src="{{asset('public/web/images/portfolio-icon-5.png')}}" alt="">
                             <h3>Fully Secured</h3>
                            <p>The Website is fully secured there is no issues and bug will faced to you!</p>
                         </div>
                         
                       </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Header-area/-->


<!--Our Process-->
<section id="our-service" class="">

        <div class="title"><h1>Our Services</h1></div>
        <div class="row" style="padding: 0;margin: 0;">
        
            <div class="col-md-4 part-1 info-box ">
                <svg version="1.1" id="svg-services-design" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="150px" viewBox="0 0 150 150" enable-background="new 0 0 150 150" xml:space="preserve">
                    <g>
                        <path fill="none" stroke="#fff" stroke-width="4" stroke-miterlimit="10" d="M120,110c0,2.2-1.8,4-4,4H35c-2.2,0-4-1.8-4-4V42
                            c0-2.2,1.8-4,4-4h81c2.2,0,4,1.8,4,4V110z"></path>
                    </g>
                    <rect x="38" y="63" fill="#fff" width="30" height="44"></rect>
                    <g>
                        <path fill="none" stroke="#fff" stroke-width="3" stroke-miterlimit="10" d="M48.5,51c0,2.5-2,4.5-4.5,4.5c-2.5,0-4.5-2-4.5-4.5
                            s2-4.5,4.5-4.5C46.5,46.5,48.5,48.5,48.5,51z"></path>
                    </g>
                    <rect x="74" y="63" fill="#fff" width="39" height="19"></rect>
                    <rect x="74" y="89" fill="#fff" width="16" height="18"></rect>
                    <path fill="none" stroke="#fff" stroke-width="3" stroke-miterlimit="10" d="M111.5,54c0,0.3-0.2,0.5-0.5,0.5H58
                        c-0.3,0-0.5-0.2-0.5-0.5v-6c0-0.3,0.2-0.5,0.5-0.5h53c0.3,0,0.5,0.2,0.5,0.5V54z"></path>
                    <rect x="96" y="89" fill="#fff" width="17" height="18"></rect>
                </svg>
                <h4>WEB &amp; INTERACTIVE DESIGN</h4>
                <p>Exceptional websites and app experiences are a blend of the right message and the right technology. Our interactive design approach focuses on usability, impact, and achieving results.</p>
            </div>
            <div class="col-md-4 part-2 info-box ">
                <svg version="1.1" id="svg-services-branding" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="150px" viewBox="0 0 150 150" enable-background="new 0 0 150 150" xml:space="preserve">
                    <path fill="#B2DAE3" d="M104.9,66.4c-2.4,10.1-9.8,18.2-19.5,21.5c0.5,2.2,0.8,4.6,0.8,7c0,9.2-4.1,17.4-10.6,22.9
                        c5.2,4.5,12,7.2,19.5,7.2c16.6,0,30.1-13.5,30.1-30.1C125.2,81.7,116.7,70.5,104.9,66.4z"></path>
                    <path fill="#B2DAE3" d="M75.6,71.9c-4.8,4.1-8.3,9.6-9.8,16c3.1,1.1,6.4,1.6,9.8,1.6c3.4,0,6.7-0.6,9.8-1.6
                        C83.9,81.6,80.4,76,75.6,71.9z"></path>
                    <circle fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="56.1" cy="94.9" r="30.1"></circle>
                    <circle fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="95.1" cy="94.9" r="30.1"></circle>
                    <circle fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" cx="75.6" cy="59.5" r="30.1"></circle>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="26" y1="94.9" x2="48.4" y2="72.4"></line>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="27.7" y1="105" x2="53.1" y2="79.6"></line>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="31.8" y1="112.7" x2="59.6" y2="84.9"></line>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="37.7" y1="118.7" x2="65.2" y2="91.2"></line>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="45.3" y1="122.9" x2="65.9" y2="102.3"></line>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="55" y1="125" x2="69.4" y2="110.6"></line>
                </svg>
                <h4>BRANDING &amp; STRATEGY</h4>
                <p>Whether a new or established business or organization, you can look to us to best articulate who you are, what you do, and most importantly, why any of these thingd matters – beautifully.</p>
            </div>
            <div class="col-md-4 part-3 info-box ">
                <svg version="1.1" id="svg-services-development" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="150px" height="150px" viewBox="0 0 150 150" enable-background="new 0 0 150 150" xml:space="preserve">
                    <polygon fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
                        83,77 50,77 50.1,61 83.1,61 "></polygon>
                    <polygon fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
                        83,106 50,106 50.1,90 83.1,90 "></polygon>
                    <polygon fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
                        129.9,106 97,106 97.1,90 130,90 "></polygon>
                    <polygon fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
                        77.1,36.5 66.6,46.9 56.1,36.5 66.6,26 "></polygon>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="67" y1="46" x2="67" y2="60"></line>
                    <polyline fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" points="
                        48,69 26,69 26,98 49,98 "></polyline>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="84" y1="98" x2="97" y2="98"></line>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="84" y1="69" x2="96" y2="69"></line>
                    <g>
                        <path fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
                            M110,69.5c0,3.6-2.9,6.5-6.5,6.5S97,73.1,97,69.5s2.9-6.5,6.5-6.5S110,65.9,110,69.5z"></path>
                    </g>
                    <line fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="67" y1="107" x2="67" y2="119"></line>
                    <g>
                        <path fill="none" stroke="#fff" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" d="
                            M66.5,133c-3.6,0-6.5-2.9-6.5-6.5s2.9-6.5,6.5-6.5c3.6,0,6.5,2.9,6.5,6.5S70.1,133,66.5,133z"></path>
                    </g>
                    <line fill="none" stroke="#B2DAE3" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="60" y1="69" x2="73" y2="69"></line>
                    <line fill="none" stroke="#B2DAE3" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="60" y1="98" x2="73" y2="98"></line>
                    <line fill="none" stroke="#B2DAE3" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" x1="107" y1="98" x2="121" y2="98"></line>
                </svg>
                <h4>WEB &amp; APPLICATION DEVELOPMENT</h4>
                <p>The best-planned experience is wasted without a top-notch implementation. We craft functional websites and applications engineered for stability, performance, and long-term adaptability.</p>
            </div>

        </div>
</section>

<!--How we work-->
<section class="how-we-work">   
    <div class="block-inner left-x-large">
        <div class="row">

            <div class="img-area small-12 col-sm-7 medium-7 col-option-left-x-large col-image">
                <img alt="our approach" class="img-responsive" src="{{asset('public/web/images/rawpixel.jpg')}}">
            </div>

            <div class="text-area columns small-12 col-sm-5 medium-5 col-option-left-x-large">
                <h2>How We Work</h2>
                <p >We work in small teams using data to&nbsp;make creative and innovative solutions of the box  for our clients. Our way of work is simple, we understand our client  before we create then we measure and repeat till perfection. We are a different leauge as we never satisfy,. We customize our process to better suit your specific goals, and we work to redefine the digital experience in your industry.</p>
                <p><a class="button" href="https://www.digizigs.com">View our Approach</a></p>
            </div>
        </div>
    </div>
</section>
<!--How we work-->

<section class="get-started">

    
    <div class="block-inner">
        <div class="row align-center">
            <div class="">
                <h2>Ready to get started?</h2>
                <h4>Exited to start a project or really curious about our process? Just drop us a note or give us a call (+91)&nbsp;9712340450; we’re happy to answer all your questions.</h4>
                <a class="button secondary" href="https://www.digizigs.com/contact/">Work With Us</a>
            </div>
        </div>
    </div>
</section>


<!--Case Study-->
<section id="case_study" class="angle-bg">
    <div class="wraper">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="caption_slide" class="carousel slide caption-slider" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">

                            <div class="item active row">
                                <div class="v-center">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-title" data-animation="animated fadeInUp">
                                            <h2>PROTOTYPING</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Planning / sketching an early sample of work as per requirement of the clients before processing concept !</p>
                                        </div>
                                        <div class="caption-button" data-animation="animated fadeInUp">
                                            <a href="#" class="button">Read more</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-photo two" data-animation="animated fadeInRight">
                                            <img src="{{asset('public/web/images/quality.svg')}}" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="item row">
                                <div class="v-center">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-title" data-animation="animated fadeInUp">
                                            <h2>DESIGN PROCESS</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Stepping into the design process with an efficient approach, applying it to the best-chosen concept !</p>
                                        </div>
                                        <div class="caption-button" data-animation="animated fadeInUp">
                                            <a href="#" class="button">Read more</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-photo two " data-animation="animated fadeInRight">
                                            <img src="{{asset('public/web/images/small1.jpg')}}" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="item row">
                                <div class="v-center">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-title" data-animation="animated fadeInUp">
                                            <h2>DEVELOPMENT</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Creating responsive, functional website with all the graphical elements and contents chosen by client !</p>
                                        </div>
                                        <div class="caption-button" data-animation="animated fadeInUp">
                                            <a href="#" class="button">Read more</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-photo two" data-animation="animated fadeInRight">
                                            <img src="{{asset('public/web/images/small1.jpg')}}" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="item row">
                                <div class="v-center">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-title" data-animation="animated fadeInUp">
                                            <h2>TESTING</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Ensuring the performance and security of the website developed using the advanced testing and tools !</p>
                                        </div>
                                        <div class="caption-button" data-animation="animated fadeInUp">
                                            <a href="#" class="button">Read more</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-photo two" data-animation="animated fadeInRight">
                                            <img src="{{asset('public/web/images/small1.jpg')}}" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <!-- Indicators -->
                        <ul class="carousel-indicators caption-indector hidden-xs">
                            <li data-target="#caption_slide" data-slide-to="0" class="active">
                                <strong>Easy to build </strong>consectetur adipisicing elit.
                            </li>
                            <li data-target="#caption_slide" data-slide-to="1">
                                <strong>Easy to use</strong>consectetur adipisicing elit.
                            </li>
                            <li data-target="#caption_slide" data-slide-to="2">
                                <strong>Easy to customize</strong>consectetur adipisicing elit.
                            </li>
                            <li data-target="#caption_slide" data-slide-to="3">
                                <strong>Awesome design</strong>consectetur adipisicing elit.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Case Study-->



<!--Our Process-->
<section id="process" class="">
    <div class="content">
        <div class="title">We Design Experience</div>
        <div class="subtag">DigiZigs is a full-service creative agency working with brands worldwide</div>
        <div class="title" >Collaborative collective of strategists, designers and developers.</div>
        <p>An integrated app devlopment agency team headquartered in Vadodara. Our visual, content and brand communication strategies deliver the most engaging user experiences to the worlds innovative brands.</p>
        
        <a data-scroll class="button" href="#services">Our Process</a>
    </div>
</section>



@endsection