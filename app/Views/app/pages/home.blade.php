@extends('layouts.app')

@section('title','Home')



@section('content')


<!--Header-area-->
<header id="header-area" class="header-area overlay full-height relative v-center" id="home-page" style="background:#000000 url({{asset('public/web/images/parallax-2.jpg')}}) no-repeat scroll center center / cover;">

    <div class="absolute anlge-bg" style="background: url({{asset('public/web/images/angle-bg.png')}}) no-repeat scroll center bottom -120px / 100% auto;">
        
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

                <a href="#" class="button white">Get Started</a>
            </div>
            <div class="hidden-xs hidden-sm col-md-5 text-right">
                <div class="screen-box screen-slider">
                    <div class="item bdr">
                       <a href="">
                          <div class="item-box">
                              sss
                          </div> 
                       </a> 
                    </div>
                    <div class="item bdr">
                       <a href="">
                          <div class="item-box">
                              
                          </div> 
                       </a>
                    </div>
                    <div class="item bdr">
                       <a href="">
                         <div class="item-box">
                             
                         </div>  
                       </a> 
                    </div>
                    <div class="item bdr">
                       <a href="">
                         <div class="item-box">
                             
                         </div>  
                       </a> 
                    </div>
                    <div class="item bdr">
                       <a href="">
                         <div class="item-box">
                             
                         </div>  
                       </a> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--Header-area/-->


<!--feature page-->    
<section id="feature-area" class="feature-area gray-bg section-padding" >
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-sm-offset-3 text-center">
                <div class="page-title">
                    <h2>SPECIAL FEATURES</h2>
                    <p>Ours is company providing full spectrum of custom services. Be it mobile app, web app, e-commerce solutions or digital promotions, you have it all.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="box">
                    <div class="box-icon">
                        <img src="{{asset('public/web/images/portfolio-icon-1.png')}}" alt="">
                    </div>
                    <h3>Responsive web design</h3>
                    <p>Responsive Web Design is the combination of flexible grids, flexible images, and media queries.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="box">
                    <div class="box-icon" data-animation="animated fadeInRight">
                        <img src="{{asset('public/web/images/portfolio-icon-2.png')}}" alt="">
                    </div>
                    <h3>Loaded with features</h3>
                    <p>Discover the web design trends, techniques, and tools that will define website and digital product design.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="box">
                    <div class="box-icon">
                        <img src="{{asset('public/web/images/portfolio-icon-3.png')}}" alt="">
                    </div>
                    <h3>Customer Support</h3>
                    <p>Our ongoing customer support helps you to make client aplication up to date and 99.99% up and running</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="box">
                    <div class="box-icon">
                        <img src="{{asset('public/web/images/portfolio-icon-4.png')}}" alt="">
                    </div>
                    <h3>Free updates forever</h3>
                    <p>We will give you updates by every week or month for you website get better.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="box">
                    <div class="box-icon">
                        <img src="{{asset('public/web/images/portfolio-icon-5.png')}}" alt="">
                    </div>
                    <h3>Easy to Edit</h3>
                    <p>We provide you a 100% Customization with admin panel you can edit easily.</p>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
                <div class="box">
                    <div class="box-icon">
                        <img src="{{asset('public/web/images/portfolio-icon-6.png')}}" alt="">
                    </div>
                    <h3>Fully Secured</h3>
                    <p>The Website is fully secured there is no issues and bug will faced to you!</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--feature page-->


<!--Case Study-->
<section id="case_study" class="angle-bg sky-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div id="caption_slide" class="carousel slide caption-slider" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">

                            <div class="item active row">
                                <div class="v-center">
                                    <div class="col-xs-12 col-md-6">
                                        <div class="caption-title" data-animation="animated fadeInUp">
                                            <h2>Easy to build</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>
                                        </div>
                                        <div class="caption-button" data-animation="animated fadeInUp">
                                            <a href="#" class="button">Read more</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
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
                                            <h2>Easy to use</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>
                                        </div>
                                        <div class="caption-button" data-animation="animated fadeInUp">
                                            <a href="#" class="button">Read more</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
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
                                            <h2>Easy to customize</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>
                                        </div>
                                        <div class="caption-button" data-animation="animated fadeInUp">
                                            <a href="#" class="button">Read more</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
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
                                            <h2>Awesome design</h2>
                                        </div>
                                        <div class="caption-desc" data-animation="animated fadeInUp">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute</p>
                                        </div>
                                        <div class="caption-button" data-animation="animated fadeInUp">
                                            <a href="#" class="button">Read more</a>
                                        </div>
                                    </div>
                                    <div class="col-xs-6 col-md-6">
                                        <div class="caption-photo two" data-animation="animated fadeInRight">
                                            <img src="{{asset('public/web/images/small1.jpg')}}" class="img-responsive" alt="">
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        </div>
                        <!-- Indicators -->
                        <ul class="carousel-indicators caption-indector">
                            <li data-target="#caption_slide" data-slide-to="0" class="active">
                                <strong>Lorem ipsum </strong>consectetur adipisicing elit.
                            </li>
                            <li data-target="#caption_slide" data-slide-to="1">
                                <strong>Lorem ipsum </strong>consectetur adipisicing elit.
                            </li>
                            <li data-target="#caption_slide" data-slide-to="2">
                                <strong>Lorem ipsum </strong>consectetur adipisicing elit.
                            </li>
                            <li data-target="#caption_slide" data-slide-to="3">
                                <strong>Lorem ipsum </strong>consectetur adipisicing elit.
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--Case Study-->


<!-- ps://www.liquidlight.co.uk
https://codepen.io/shamim539/pen/GZPZBp -->
<section class="testimonials">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-sm-offset-1 text-center">
                <div class="page-title">
                    <p>Award winning web design</p>
                    <h2>Our portfolio contains 4 years of <i>Client satifaction</i></h2>
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
              <div id="customers-testimonials" class="owl-carousel">

                <!--TESTIMONIAL 1 -->
                <div class="item">
                  <div class="shadow-effect">
                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                  </div>
                  <div class="testimonial-name">EMILIANO AQUILANI</div>
                </div>
                <!--END OF TESTIMONIAL 1 -->
                <!--TESTIMONIAL 2 -->
                <div class="item">
                  <div class="shadow-effect">
                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                  </div>
                  <div class="testimonial-name">ANNA ITURBE</div>
                </div>
                <!--END OF TESTIMONIAL 2 -->
                <!--TESTIMONIAL 3 -->
                <div class="item">
                  <div class="shadow-effect">
                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                  </div>
                  <div class="testimonial-name">LARA ATKINSON</div>
                </div>
                <!--END OF TESTIMONIAL 3 -->
                <!--TESTIMONIAL 4 -->
                <div class="item">
                  <div class="shadow-effect">
                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                  </div>
                  <div class="testimonial-name">IAN OWEN</div>
                </div>
                <!--END OF TESTIMONIAL 4 -->
                <!--TESTIMONIAL 5 -->
                <div class="item">
                  <div class="shadow-effect">
                    <img class="img-circle" src="http://themes.audemedia.com/html/goodgrowth/images/testimonial3.jpg" alt="">
                    <p>Dramatically maintain clicks-and-mortar solutions without functional solutions. Completely synergize resource taxing relationships via premier niche markets. Professionally cultivate.</p>
                  </div>
                  <div class="testimonial-name">MICHAEL TEDDY</div>
                </div>
                <!--END OF TESTIMONIAL 5 -->
              </div>
            </div>
        </div>
    </div>
</section>
<!-- END OF TESTIMONIALS -->



@endsection