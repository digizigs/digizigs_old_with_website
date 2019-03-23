@extends('layouts.app')

@section('title','Blog')



@section('content')


<div class="wrapper">
	
	<!-- start banner Area -->
	<section class="titlebar" style="background: url({{asset('public/images/banner/curve-5.png')}}) no-repeat scroll center center / cover;">
        <h1 class="page-title">
        	<span>Our </span>
        	Services
        </h1>
        <div id="particles-js"></div>
    </section>  
    <!-- End banner Area -->

	
	

	<!-- Start Tag Line -->
	<section class="tag-line">
		<div class="container">
			<h2 class="tag-title">We help brands engage with their consumers, start conversations, and boost conversions.</h2>
			
		</div>
	</section>
	<!-- End Tag Line -->

	<!-- Start Service Area -->
    <section class="service-area sp-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Service Offers</h2>
                        <p>If you are looking at blank cassettes on the web, you may be very confused at the difference in price. You may see
                            some for as low as $.17 each.</p>
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


</div>

@endsection