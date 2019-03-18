@extends('layouts.app')

@section('title','Leading Web Design and Devlopment Agency')



@section('content')

<div class="home-wrapper">

    <!-- Start Preloader Area -->
    <div class="preloader-area">
        <div class="loader-box">
            <div class="loader"></div>
        </div>
    </div>
    <!-- End Preloader Area --> 

    

    <!-- start banner Area -->
    <section class="home-banner-area" style="background: url({{asset('public/images/banner/home-banner.png')}}) no-repeat center center fixed;">
        <div class="ban-img" >
            <div class="container">
                <div class="row fullscreen d-flex align-items-center">
                    <div class="banner-content col-lg-8 col-md-12 justify-content-center ">
                        <!--div class="me wow fadeInDown" data-wow-duration="1s" data-wow-delay="1.2s">It's us</div-->
                        <h1 class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.7s">DigiZigs</h1>
                        <div class="designation mb-50 wow fadeInUp" data-wow-duration="1s" data-wow-delay="2.1s">
                            <span>We design and develop experiences to . . . .</span><br>
                            <span   class="txt-rotate" 
                                    data-period="2000" 
                                    data-rotate='["make your Business grow.",
                                                 "stablish your Brand", 
                                                 "improve your Productivity", 
                                                 "create your Digital Identity", 
                                                 "manage your Business" ]'>
                            </span>
                        </div>
                        <a href="#" class="primary-btn" data-text="Get Started">
                            <span>G</span>
                            <span>e</span>
                            <span>t</span>
                            <span> </span>
                            <span>S</span>
                            <span>t</span>
                            <span>a</span>
                            <span>r</span>
                            <span>t</span>
                            <span>e</span>
                            <span>d</span>
                        </a>
                    </div>
                    <div class="banner-img col-lg-4 col-md-4 align-self-end">
                        <div class="banner-slider owl-carousel owl-theme">
                          <div class="item" data-dot="<button>01</button>">
                            <img src="{{asset('public/images/banner/1.png')}}" class="img-responsive">
                          </div>
                          <div class="item" data-dot="<button>02</button>">
                            <img src="{{asset('public/images/banner/2.png')}}" class="img-responsive">
                          </div> 
                                           
                        </div>   
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <div style="height: 1200px;">
        
    </div>
</div>

@endsection