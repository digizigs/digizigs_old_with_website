@extends('layouts.app')

@section('title','Home')



@section('content')

	@include('flash::message')

	<div class="top-move"><i class="fa fa-arrow-up"></i></div>  
      
    <header class="main-menu" id="home">

        <div class="home_slider">
            <div id="myCarousel" class="carousel slide carousel-fade">

                <div class="carousel-inner">
                    <div class="item active">

                        <div class="fill" style="background-image:url({{asset('public/images/web/slider/11.jpg')}})"></div>
                        <div class="caption">
                           
                            <h1>
                                <span   class="txt-rotate" 
                                        data-period="2000" 
                                        data-rotate='[ "Hello.",
                                                     "We are DigiZigs ", 
                                                     "we transfer research", 
                                                     "..into insight to create", 
                                                     " memorable experience on the web" ]'>
                                </span>
                            </h1>
                            <p class="animated fadeInRightBig">Web App - Web Design - Social - Mobile App</p>
                            <a data-scroll class="btn btn-start animated fadeInUpBig nav-link sscroll" href="#contact">Start now</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="fill" style="background-image:url({{asset('public/images/web/slider/22.jpg')}})"></div>
                        <div class="caption">
                            <h1>
                                <span   class="txt-rotate" 
                                        data-period="2000" 
                                        data-rotate='[ "Hello.",
                                                     "We are DigiZigs", 
                                                     "we transfer research", 
                                                     "..into insight to create", 
                                                     " memorable experience on the web" ]'>
                                </span>
                            </h1>
                            <p class="animated fadeInRightBig">Web App - Web Design - Social - Mobile App</p>
                            <a data-scroll class="btn btn-start animated fadeInUpBig nav-link sscroll" href="#contact">Start now</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="fill" style="background-image:url({{asset('public/images/web/slider/33.jpg')}})"></div>
                        <div class="caption">
                            <h1>
                                <span   class="txt-rotate" 
                                        data-period="2000" 
                                        data-rotate='[ "Hello.",
                                                     "We are DigiZigs", 
                                                     "we transfer research", 
                                                     "..into insight to create", 
                                                     " memorable experience on the web" ]'>
                                </span>
                            </h1>
                            <p class="animated fadeInRightBig">Web App - Web Design - Social - Mobile App</p>
                            <a data-scroll class="btn btn-start animated fadeInUpBig nav-link sscroll" href="#contact">Start now</a>
                        </div>
                    </div>
                </div>

                <!-- Controls -->
                <a class="left-control" href="#myCarousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                <a class="right-control" href="#myCarousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
                
                <a id="tohash" href="#our-service" class="sscroll"><i class="fa fa-angle-down"></i></a>
                

            </div>
        </div>
        
        <div class="main-nav">
            <!--Menu Icon-->

            <div class="menuicon">
                <div class="open">
                    <span class="line1"></span>
                    <span class="line2"></span>
                </div>
                <div class="close">
                    <span class="line3"></span>
                    <span class="line4"></span>
                </div>
                
            </div>
            
            <!--Web Branding-->
            <div class="branding">
                <a href="{{url('/')}}"><img src="{{asset('public/images/DigiZigs_new_2.png')}}" alt="" style="width: 200px;"></a>
            </div>

            
            <!--Navigation Menu-->
            <div class="main">
                <div class="menu">                          
                    <a href="" class="sscroll" ><span class="menuitem" data="Web Design">Web Design</span></a>
                    <a href="" class="sscroll" ><span class="menuitem" data="UX/UI">UX/UI</span></a>
                    <a href="#our-service" class="sscroll" ><span class="menuitem" data="Services">Services</span></a>
                    <a href="#features" class="sscroll" ><span class="menuitem" data="Features">Features</span></a>
                    <a href="#blog" class="sscroll" ><span class="menuitem" data="Updates">Updates</span></a>       
                    <a href="#contact" class="sscroll" ><span class="menuitem" data="Contact">Contact</span></a>
                </div>
            </div>
        </div>

    </header>

    <!--Service-->
    <section id="our-service" class="">

            <div class="title">Our Services</div>
            <div class="row" style="padding: 0;margin: 0;">
            
                <div class="col-md-4 part-1 info-box">
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
                    <h4>WEB & INTERACTIVE DESIGN</h4>
                    <p>Exceptional websites and app experiences are a blend of the right message and the right technology. Our interactive design approach focuses on usability, impact, and achieving results.</p>
                </div>
                <div class="col-md-4 part-2 info-box">
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
                    <h4>BRANDING & STRATEGY</h4>
                    <p>Whether a new or established business or organization, you can look to us to best articulate who you are, what you do, and most importantly, why any of it matters – beautifully.</p>
                </div>
                <div class="col-md-4 part-3 info-box">
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
                    <h4>WEB & APPLICATION DEVELOPMENT</h4>
                    <p>The best-planned experience is wasted without a top-notch implementation. We craft functional websites and applications engineered for stability, performance, and long-term adaptability.</p>
                </div>

            </div>
    </section>  


    <!--Our Process-->
    <section id="process" class="">
        <div class="content">
            <div class="title">We Design Experience</div>
            <div class="subtag">DigiZigs is a full-service creative agency working with brands worldwide</div>
            <div class="title" >Collaborative collective of strategists, designers and developers.</div>
            <p>An integrated design agency team headquartered in Chicago. Our visual, content and brand communication strategies deliver the most engaging user experiences to the worlds innovative brands.</p>
            
            <a data-scroll class="btn-process animated fadeInUpBig" href="#services">Our Process</a>
        </div>
    </section>

  

    <!--Features-->
    <section id="features" class="" style="background: url({{asset('public/images/web/features/poster.jpg')}});">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading text-center">
                        <h3>DigiZigs Features</h3>
                        <p>Ours is company providing full spectrum of custom services. Be it mobile app, web app, e-commerce solutions or digital promotions, you have it all.</p>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">

                <div class="col-md-4 col-sm-6 ">
                    <!--feature single start-->
                    <div class="single-feature">
                        <div class="feature-icon">
                            <div class="icon icon-shape bg-color white-text">
                                <i class="fas fa-mobile"></i>
                            </div>
                        </div>
                        <div class="feature-content">
                            <h5>Responsive web design</h5>
                            <p >Responsive Web Design is the combination of flexible grids, flexible images, and media queries.</p>
                        </div>
                    </div>
                    <!--feature single end-->
                    <!--feature single start-->
                    <div class="single-feature mb-5">
                        <div class="feature-icon">
                            <div class="icon icon-shape bg-color white-text">
                                 <i class="fas fa-boxes"></i>
                            </div>
                        </div>
                         <div class="feature-content">
                            <h5>Loaded with features</h5>
                            <p class="mb-0">Discover the web design trends, techniques, and tools that will define website and digital product design.</p>
                        </div>
                    </div>
                    <!--feature single end-->
                    <!--feature single start-->
                    <div class="single-feature mb-5">
                        <div class="feature-icon">
                            <div class="icon icon-shape bg-color white-text">
                                <i class="fas fa-headphones-alt"></i>
                            </div>
                        </div>
                        <div class="feature-content">
                            <h5>Customer Support</h5>
                            <p class="mb-0">Our ongoing customer support helps you to make changes yourself anything.</p>
                        </div>
                    </div>
                    <!--feature single end-->
                </div>

                <div class="col-md-4 hidden-sm hidden-xs ">
                    <div class="feature-image">
                        <img src="{{asset('public/images/web/features/animation-rocket.gif')}}" class="pos-hcenter img-responsive " alt="">
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 ">
                    <!--feature single start-->
                    <div class="single-feature mb-5">
                        <div class="feature-icon">
                            <div class="icon icon-shape bg-color white-text">
                                <i class="fas fa-space-shuttle"></i>
                            </div>
                        </div>
                        <div class="feature-content">
                            <h5>Free updates forever</h5>
                            <p class="mb-0">We will give you updates by every week or month for you website get better.</p>
                        </div>
                    </div>
                   
                    <div class="single-feature mb-5">
                            <div class="feature-icon">
                                <div class="icon icon-shape bg-color white-text">
                                 <i class="fas fa-pencil-ruler"></i>
                             </div>
                            </div>
                             <div class="feature-content">
                                <h5>Easy to Edit</h5>
                                <p class="mb-0">We provide you a 100% Customization with admin panel you can edit easily.</p>
                            </div>
                    </div>
                    
                    <div class="single-feature mb-5">
                        <div class="feature-icon">
                            <div class="icon icon-shape bg-color white-text">
                                <i class="fas fa-user-lock"></i>
                            </div>
                        </div>
                        <div class="feature-content">
                            <h5>Fully Secured</h5>
                            <p class="mb-0">The Website is fully secured there is no issues and bug will faced to you!</p>
                        </div>
                    </div>

                    <!--feature single end-->
                </div>
            </div>

            <div class="row mp0">
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 ">
                    <div class="text-icon-box mb50 center wow fadeInUp padding20 box-hover-1" data-wow-delay="0.1s">
                        <div class="box-img-icon features-box-icon">
                            <img src="{{asset('public/images/web/features/design-tool.svg')}}" alt="">
                        </div>
                        <h3 class="box-title">PROTOTYPING</h3>
                        <p>Planning / sketching an early sample of work as per requirement of the clients before processing concept !</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 ">
                    <div class="text-icon-box relative mb50 center  wow fadeInUp padding20 box-hover-1" data-wow-delay="0.2s">
                        <div class="box-img-icon features-box-icon">
                            <img src="{{asset('public/images/web/features/tools.svg')}}" alt="">
                        </div>
                        <h3 class="box-title">DESIGN PROCESS</h3>
                        <p>Stepping into the design process with an efficient approach, applying it to the best-chosen concept !</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 ">
                    <div class="text-icon-box relative mb50 center wow fadeInUp padding20 box-hover-1" data-wow-delay="0.2s">
                        <div class="box-img-icon features-box-icon">
                            <img src="{{asset('public/images/web/features/schedule.svg')}}" alt="">
                        </div>
                        <h3 class="box-title">DEVELOPMENT</h3>
                        <p>Creating responsive, functional website with all the graphical elements and contents chosen by client !</p>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3 col-sm-6 col-xs-12 ">
                    <div class="text-icon-box relative mb50 center wow fadeInUp padding20 box-hover-1" data-wow-delay="0.2s">
                        <div class="box-img-icon features-box-icon">
                            <img src="{{asset('public/images/web/features/quality.svg')}}" alt="">
                        </div>
                        <h3 class="box-title">TESTING</h3>
                        <p>Ensuring the performance and security of the website developed using the advanced testing and tools !</p>
                    </div>
                </div>
            </div>      

        </div>
    </section>

    <!--Portfolio-->
    <section id="portfolio">

        <div class="container">
          <div class="row">
            <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <h2>Our Works</h2>
              <p>Over the years we’ve taken numbers of projects, succeeding in every single one of those!</p>
            </div>
          </div> 
        </div>

        <div class="container-fluid">
            <div class="row">

                <div class="col-sm-3">
                  <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <div class="folio-image">
                      <img class="img-responsive" src="{{asset('public/images/web/portfolio/1.jpg')}}" alt="">
                    </div>
                    <div class="overlay">
                      <div class="overlay-content">
                        <div class="overlay-text">
                          <div class="folio-info">
                            <h3>Time Hours</h3>
                            <p>Design, Photography</p>
                          </div>
                          <div class="folio-overview">
                            <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                            <span class="folio-expand"><a href="{{asset('public/images/web/portfolio/portfolio-details.jpg')}}" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="400ms">
                    <div class="folio-image">
                      <img class="img-responsive" src="{{asset('public/images/web/portfolio/2.jpg')}}" alt="">
                    </div>
                    <div class="overlay">
                      <div class="overlay-content">
                        <div class="overlay-text">
                          <div class="folio-info">
                            <h3>Time Hours</h3>
                            <p>Design, Photography</p>
                          </div>
                          <div class="folio-overview">
                            <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                            <span class="folio-expand"><a href="{{asset('public/images/web/portfolio/portfolio-details.jpg')}}" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="500ms">
                    <div class="folio-image">
                      <img class="img-responsive" src="{{asset('public/images/web/portfolio/3.jpg')}}" alt="">
                    </div>
                    <div class="overlay">
                      <div class="overlay-content">
                        <div class="overlay-text">
                          <div class="folio-info">
                            <h3>Time Hours</h3>
                            <p>Design, Photography</p>
                          </div>
                          <div class="folio-overview">
                            <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                            <span class="folio-expand"><a href="{{asset('public/images/web/portfolio/portfolio-details.jpg')}}" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="600ms">
                    <div class="folio-image">
                      <img class="img-responsive" src="{{asset('public/images/web/portfolio/4.jpg')}}" alt="">
                    </div>
                    <div class="overlay">
                      <div class="overlay-content">
                        <div class="overlay-text">
                          <div class="folio-info">
                            <h3>Time Hours</h3>
                            <p>Design, Photography</p>
                          </div>
                          <div class="folio-overview">
                            <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                            <span class="folio-expand"><a href="{{asset('public/images/web/portfolio/portfolio-details.jpg')}}" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="700ms">
                    <div class="folio-image">
                      <img class="img-responsive" src="{{asset('public/images/web/portfolio/5.jpg')}}" alt="">
                    </div>
                    <div class="overlay">
                      <div class="overlay-content">
                        <div class="overlay-text">
                          <div class="folio-info">
                            <h3>Time Hours</h3>
                            <p>Design, Photography</p>
                          </div>
                          <div class="folio-overview">
                            <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                            <span class="folio-expand"><a href="{{asset('public/images/web/portfolio/portfolio-details.jpg')}}" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="800ms">
                    <div class="folio-image">
                      <img class="img-responsive" src="{{asset('public/images/web/portfolio/6.jpg')}}" alt="">
                    </div>
                    <div class="overlay">
                      <div class="overlay-content">
                        <div class="overlay-text">
                          <div class="folio-info">
                            <h3>Time Hours</h3>
                            <p>Design, Photography</p>
                          </div>
                          <div class="folio-overview">
                            <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                            <span class="folio-expand"><a href="{{asset('public/images/web/portfolio/portfolio-details.jpg')}}" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="900ms">
                    <div class="folio-image">
                      <img class="img-responsive" src="{{asset('public/images/web/portfolio/7.jpg')}}" alt="">
                    </div>
                    <div class="overlay">
                      <div class="overlay-content">
                        <div class="overlay-text">
                          <div class="folio-info">
                            <h3>Time Hours</h3>
                            <p>Design, Photography</p>
                          </div>
                          <div class="folio-overview">
                            <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                            <span class="folio-expand"><a href="{{asset('public/images/web/portfolio/portfolio-details.jpg')}}" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3">
                  <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="1000ms">
                    <div class="folio-image">
                      <img class="img-responsive" src="{{asset('public/images/web/portfolio/8.jpg')}}" alt="">
                    </div>
                    <div class="overlay">
                      <div class="overlay-content">
                        <div class="overlay-text">
                          <div class="folio-info">
                            <h3>Time Hours</h3>
                            <p>Design, Photography</p>
                          </div>
                          <div class="folio-overview">
                            <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                            <span class="folio-expand"><a href="{{asset('public/images/web/portfolio/portfolio-details.jpg')}}" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
        </div>

        <div id="portfolio-single-wrap">
          <div id="portfolio-single">
          </div>
        </div><!-- /#portfolio-single-wrap -->
    </section><!--/#portfolio-->


    <section id="blog">
        <div class="container">
          <div class="row">
            <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
              <h2>Recent Updates</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
            </div>
          </div>
          <div class="blog-posts">
            <div class="row">

                <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
                    <div class="post-thumb">
                      <a href="#"><img class="img-responsive" src="{{asset('public/images/web/blog/1.jpg')}}" alt=""></a> 
                      <div class="post-meta">
                        <span><i class="fa fa-comments-o"></i> 3 Comments</span>
                        <span><i class="fa fa-heart"></i> 0 Likes</span> 
                      </div>
                      <div class="post-icon">
                        <i class="fa fa-pencil"></i>
                      </div>
                    </div>
                    <div class="entry-header">
                      <h3><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h3>
                      <span class="date">June 26, 2014</span>
                      <span class="cetagory">in <strong>Photography</strong></span>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>

                <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="400ms">
                    <div class="post-thumb">
                      <a href="#"><img class="img-responsive" src="{{asset('public/images/web/blog/1.jpg')}}" alt=""></a> 
                      <div class="post-meta">
                        <span><i class="fa fa-comments-o"></i> 3 Comments</span>
                        <span><i class="fa fa-heart"></i> 0 Likes</span> 
                      </div>
                      <div class="post-icon">
                        <i class="fa fa-pencil"></i>
                      </div>
                    </div>
                    <div class="entry-header">
                      <h3><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h3>
                      <span class="date">June 26, 2014</span>
                      <span class="cetagory">in <strong>Photography</strong></span>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>

                <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="800ms">
                    <div class="post-thumb">
                      <a href="#"><img class="img-responsive" src="{{asset('public/images/web/blog/3.jpg')}}" alt=""></a>
                      <div class="post-meta">
                        <span><i class="fa fa-comments-o"></i> 3 Comments</span>
                        <span><i class="fa fa-heart"></i> 0 Likes</span> 
                      </div>
                      <div class="post-icon">
                        <i class="fa fa-video-camera"></i>
                      </div>
                    </div>
                    <div class="entry-header">
                      <h3><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h3>
                      <span class="date">June 26, 2014</span>
                      <span class="cetagory">in <strong>Photography</strong></span>
                    </div>
                    <div class="entry-content">
                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                    </div>
                </div>
                                    
            </div>
            <div class="load-more wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
              <a href="#" class="btn-loadmore"><i class="fa fa-repeat"></i> Load More</a>
            </div>                
          </div>
        </div>
    </section><!--/#blog-->


     <!--Contact-->
    <section id="contact" style="background: url({{asset('public/images/web/contact/contact-bg.jpg')}});">
        <div id="google-map" class="wow fadeIn" data-latitude="52.365629" data-longitude="4.871331" data-wow-duration="1000ms" data-wow-delay="400ms">
            
        </div>
        <div id="contact-us" class="parallax" >
            <div class="container">
                <div class="row">
                  <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                    <h2>Contact Us</h2>
                    <p>Let drop a line to us & we will be in touch soon.</p>
                  </div>
                </div>
                <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
                  <div class="row">

                    <div class="col-sm-12">
                      <form id="main-contact-form" name="contact-form" method="post" action="{{route('app.inquiry')}}">
                        @csrf
                        <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <input type="test" name="contact" class="form-control" placeholder="Contact Number" required="required">
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <input type="email" name="email" class="form-control" placeholder="Email Address" required="required">
                        </div>
                        <div class="form-group">
                          <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required="required"></textarea>
                        </div>                        
                        <div class="form-group">
                          <button type="submit" class="btn-submit form-control">Send Now</button>
                        </div>
                      </form>   
                    </div>
                   

                  </div>
                </div>
            </div>
        </div>        
    </section><!--/#contact-->
    

    <!--Footer Section-->
    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 col-lg-3 footer_widget">
                        <div class="inner">
                            <h4>Strategy</h4>
                            <p>When it comes to the success of your website, app or software, strategy is everything. It’s the foundation for your success. It’s do or die.We understand business. That's why we begin every project with a workshop — crafting a one-of-a-kind, unique strategy that is designed to help you win.</p>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 footer_widget">
                        <div class="inner">
                            <h4>Our Services</h4>
                            <ul>
                                <li><a href="#">Web Design</a></li>
                                <li><a href="#">Web Application Design</a></li>
                                <li><a href="#">Branding & Strategy</a></li>
                                <li><a href="#">Logo & Identity Systems</a></li>
                                <li><a href="#">Social</a></li>
                                <li><a href="#">Front and Backend Web Development</a></li>
                                <li><a href="#">iOS (iPhone & iPad) Development</a></li>
                                <li><a href="#">Android Development</a></li>
                                <li><a href="#">API Integrations</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 footer_widget">
                        <div class="inner">
                            <h4>Recent Updates</h4>
                            <div class="media">
                                <a href="#">
                                    <img src="{{asset('images\web\recent1.jpg')}}" class="d-flex mr-3" alt="">
                                </a>
                                <div class="media-body">
                                    <h5>
                                        <a href="#">Curling irons are as individual as the women</a>
                                    </h5>
                                    <span>June 22, 2017</span>
                                </div>
                            </div>
                            <div class="media">
                                <a href="#">
                                    <img src="{{asset('images\web\recent2.jpg')}}" class="d-flex mr-3" alt="">
                                </a>
                                <div class="media-body">
                                    <h5>
                                        <a href="#">Curling irons are as individual as the women</a>
                                    </h5>
                                    <span>June 22, 2017</span>
                                </div>
                            </div>
                            <div class="media">
                                <a href="#">
                                    <img src="{{asset('images\web\recent3.jpg')}}" class="d-flex mr-3" alt="">
                                </a>
                                <div class="media-body">
                                    <h5>
                                        <a href="#">Curling irons are as individual as the women</a>
                                    </h5>
                                    <span>June 22, 2017</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-3 footer_widget">
                        <div class="inner">
                            <h4>Address</h4>
                            <h5>DigiZigs Web Technologies.</h5>
                            <p>@ : info@digizigs.com <br>P: (+91) 9712340450</p>
                            <h4>Newsletter</h4>


                            @if (Session::has('subscription'))
                                <h4>You are successfully subscribed to our news letter,we will keep you posted</h4>              

                            @else
                                <form action="{{route('app.subscribe')}}" class="nw_form" method="post">
                                    {!! csrf_field() !!}
                                    <input placeholder="Enter your email" type="email" name="email" >
                                    <button><i class="fa fa-paper-plane"></i></button>
                                </form>
                                @if ($errors->count() > 0)
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                @endif
                            @endif

                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="copyright-txt">
                            © 2018 <a href="{{url('/')}}">DigiZigs Web Technologies.</a> All Rights Reserved.
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        <div class="footer-nav">
                            <a href="#">Home</a>
                            <a href="#">Portfolio</a>
                            <a href="#">Pages</a>
                            <a href="#">Shortcode</a>
                            <a href="#">Blog</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer> 


  

@endsection

@section('javascript')
	<script>
		
	</script>
@endsection