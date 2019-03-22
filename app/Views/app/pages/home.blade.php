@extends('layouts.app')

@section('title','Leading Web Design and Devlopment Agency')



@section('content')

<div class="wrapper" >

    
    <!-- start banner Area -->
    <section class="home-banner">
        <div id="particles-js"></div>
        <div class="home-content">
            <h1 class="hero-title">we are <br><span>digizigs</span></h1>
            <p class="s-ttl top_45">
                We are a design & development company. We are<br> into 
                <span   class="element" data-text1="web design."
                                        data-text2="web development."  
                                        data-text3="mobile app."  
                                        data-text4="digital marketing." 
                                        data-text5="social marketing."  
                                        data-text6="branding identity." 
                                        data-text7="logo." 
                        data-loop="true" 
                        data-backdelay="1500">
                            
                </span>
            </p>

            <div class="social">
                <a class="text">social links</a>
                <div class="line"></div>
                <a href="#"><i class="fa fa-facebook"></i>  </a>
                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i>  </a>
                <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i>  </a>               
            </div>
        </div>
    </section>
    <!-- End banner Area -->


    <!-- Start Service Area -->
    <section class="service-area sp-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Service Offers</h2>
                        <p>Exceptional websites and app experiences are a blend of the right message and the right technology. Our interactive design approach focuses on usability, impact, and achieving results.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="single-service wow fadeInUp" data-wow-duration="1s">
                        <span class="lnr lnr-screen"></span>
                        <h4>
                            <span>Web</span> Design
                        </h4>
                        <p>If you’re looking blank casvsettes on the web, you may confuse.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <span class="lnr lnr-laptop-phone"></span>
                        <h4><span>Application</span> Development
                        </h4>
                        <p>If you’re looking blank casvsettes on the web, you may confuse.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <span class="lnr lnr-database"></span>
                        <h4><span>Web</span> Development
                        </h4>
                        <p>If you’re looking blank casvsettes on the web, you may confuse.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                        <span class="lnr lnr-chart-bars"></span>
                        <h4><span>Logo </span> Design
                        </h4>
                        <p>If you’re looking blank casvsettes on the web, you may confuse.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-service wow fadeInUp" data-wow-duration="1s">
                        <span class="lnr lnr-screen"></span>
                        <h4>
                            <span>Digital</span> Marketing
                        </h4>
                        <p>If you’re looking blank casvsettes on the web, you may confuse.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.2s">
                        <span class="lnr lnr-laptop-phone"></span>
                        <h4><span>Social</span> Marketing
                        </h4>
                        <p>If you’re looking blank casvsettes on the web, you may confuse.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                        <span class="lnr lnr-database"></span>
                        <h4><span>Brand</span> Positioning
                        </h4>
                        <p>If you’re looking blank casvsettes on the web, you may confuse.</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="single-service wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                        <span class="lnr lnr-chart-bars"></span>
                        <h4><span>Media</span> Design
                        </h4>
                        <p>If you’re looking blank casvsettes on the web, you may confuse.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Service Area -->


    <!-- Start Work Area Area -->
    <section class="work-area sp-60" id="work">
        <div class="container">
            <div class="row d-flex justify-content-between align-items-end mb-80">
                <div class="col-lg-6">
                    <div class="section-title">
                        <h2>Latest Works</h2>
                        <p>We help brands engage with their consumers, start conversations, and boost conversions.</p>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="filters">
                        <ul>
                            <li class="active" data-filter=".all">All Categories</li>
                            <li data-filter=".branding">Branding</li>
                            <li data-filter=".creative">Creative Work</li>
                            <li data-filter=".web-design">Web Design</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="filters-content">
                <div class="row grid">
                    <div class="single-work col-lg-3 col-xs-6 col-md-6 col-sm-12 all creative wow fadeInUp" data-wow-duration="2s">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="{{asset('public/images/work/w1.jpg')}}" alt="">
                            </div>
                            <div class="middle">
                                <h4>2D Vinyl Design</h4>
                                <div class="cat">Client Project</div>
                            </div>
                            <a class="overlay" href="portfolio-details.html"></a>
                        </div>
                    </div>
                    <div class="single-work col-lg-3 col-xs-6 col-md-6 col-sm-12 all web-design branding wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="{{asset('public/images/work/w2.jpg')}}" alt="">
                            </div>
                            <div class="middle">
                                <h4>2D Vinyl Design</h4>
                                <div class="cat">Client Project</div>
                            </div>
                            <a class="overlay" href="portfolio-details.html"></a>
                        </div>
                    </div>
                    <div class="single-work col-lg-3 col-xs-6 col-md-6 col-sm-12 all branding web-design wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.4s">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="{{asset('public/images/work/w3.jpg')}}" alt="">
                            </div>
                            <div class="middle">
                                <h4>2D Vinyl Design</h4>
                                <div class="cat">Client Project</div>
                            </div>
                            <a class="overlay" href="portfolio-details.html"></a>
                        </div>
                    </div>
                    <div class="single-work col-lg-3 col-xs-6 col-md-6 col-sm-12 all web-design wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.6s">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="{{asset('public/images/work/w6.jpg')}}" alt="">
                            </div>
                            <div class="middle">
                                <h4>2D Vinyl Design</h4>
                                <div class="cat">Client Project</div>
                            </div>
                            <a class="overlay" href="portfolio-details.html"></a>
                        </div>
                    </div>
                    <div class="single-work col-lg-3 col-xs-6 col-md-6 col-sm-12 all creative wow fadeInUp" data-wow-duration="2s">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="{{asset('public/images/work/w4.jpg')}}" alt="">
                            </div>
                            <div class="middle">
                                <h4>2D Vinyl Design</h4>
                                <div class="cat">Client Project</div>
                            </div>
                            <a class="overlay" href="portfolio-details.html"></a>
                        </div>
                    </div>
                    <div class="single-work col-lg-3 col-xs-6 col-md-6 col-sm-12 all branding wow fadeInUp" data-wow-duration="2s" data-wow-delay="0.2s">
                        <div class="relative">
                            <div class="thumb">
                                <div class="overlay overlay-bg"></div>
                                <img class="image img-fluid" src="{{asset('public/images/work/w5.jpg')}}" alt="">
                            </div>
                            <div class="middle">
                                <h4>2D Vinyl Design</h4>
                                <div class="cat">Client Project</div>
                            </div>
                            <a class="overlay" href="portfolio-details.html"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Work Area Area -->
    
</div>

@endsection