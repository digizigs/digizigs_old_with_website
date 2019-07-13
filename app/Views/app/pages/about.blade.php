@extends('layouts.app')

@section('title', setting('app_name') .' | About')



@section('content')

<div class="wrapper about-us">
		
	
	<!-- start banner Area -->
	<section class="titlebar" style="background: url({{asset('public/images/banner/curve-5.png')}}) no-repeat scroll center center / cover;">
        <h1 class="page-title">
        	a bit <span> About </span>
        	us
        </h1>

        <div id="particles-js"></div>
        
    </section>
    <!--hr class="col-md-6 col-xs-8"-->
    <!-- End banner Area -->

	
	

	<!-- Start About Area -->
	<section class="about-area sp-60">
		<div class="container">
			<div class="row">				
				<div class="col-lg-12 col-md-12 about-right">					
					<div class="section-content wow fadeIn" data-wow-duration=".8s">
						<h2 class="tag-title">
							We are innovative, creative, dedicated and mission oriented.
						</h2>
						<p class="tag-description">
							Digizigs is a dynamic, customer focussed, outcome orientated Digital Agency, working with businesses to enable operational efficiencies, create non-traditional revenue streams and connecting the online and offline worlds in a seamless manner.
							<br><br>
							The cornerstone to the Digizigs online offering is our own Enterprise Level E-commerce platform. Developed with the latest open source technologies and designed to be more configurable, portable, user friendly and powerful as a business tool. 
						</p>
						
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End About Area -->

	<!-- What we Do Area -->
    <section class="what-we-do sp-60">
        <div class="container">
            <div class="row align-items-center">
                <!-- Choose Us Content -->
                <div class="col-12 col-lg-12">
                    <div class="choose-us-content mb-80">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h2>What we do?</h2>
                                <p>We’re Your Partner in Your Success</p>
                            </div>
                        </div>
                        <ul class="col-lg-12">
                            <li>
                            	<i class="fa fa-check" aria-hidden="true"></i> 
                            	<span><b>Growth Driven Design : </b></span> GDD Sites for Ecommerce, Brochure and Custom applications.
                            </li>
                            <li>
                            	<i class="fa fa-check" aria-hidden="true"></i>
                            	<span><b>Inbound marketing : </b></span> Funnel Optimisation, Lead Generation, SEO. 
                            </li>
                            <li>
                            	<i class="fa fa-check" aria-hidden="true"></i> 
                            	<span><b>Content Marketing : </b></span> Content Creation, Content Planning, Content Optimisation. 
                            </li>
                            <li>
                            	<i class="fa fa-check" aria-hidden="true"></i> 
                           		<span><b>Digital Strategy : </b></span> Competitive Advantage/Intelligence.
                        	</li>
                            <li>
                            	<i class="fa fa-check" aria-hidden="true"></i> 
                            	<span><b>Measurement and Analysis : </b></span> Analytics, Split Testing, Conversion Tracking.  
                            </li>
                            
                        </ul>
                        <br><br>
                        <div style="padding: 20px;">
                        	<h4 class="tagline">
								Learn more how Element 7 Digital can create a dynamic online presence, power up your online sales, or create a superior Digital Strategy by <span><a href="{{route('contact')}}">contacting us</a></span> today. .
							</h4>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    <!-- What we Do Area -->

	<!-- Start Testimonials Area -->
	<section class="testimonials_area sp-60">
		<div class="container">
			<div class="testi_slider owl-carousel">
				<div class="item">
					<div class="testi_item">
						<img src="{{asset('public/images/quote.png')}}" alt="">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel
								across her face <br> and She is the host to your journey.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi_item">
						<img src="{{asset('public/images/quote.png')}}" alt="">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel
								across her face <br> and She is the host to your journey.
							</p>
						</div>
					</div>
				</div>
				<div class="item">
					<div class="testi_item">
						<img src="img/quote.png" alt="">
						<h4>Fanny Spencer</h4>
						<ul class="list">
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
							<li><a href="#"><i class="fa fa-star"></i></a></li>
						</ul>
						<div class="wow fadeIn" data-wow-duration="1s">
							<p>
								As conscious traveling Paup ers we must always be oncerned about our dear Mother Earth. If you think about it, you travel
								across her face <br> and She is the host to your journey.
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Testimonials Area -->

</div>

@endsection