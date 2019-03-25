@extends('layouts.app')

@section('title','About')



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
							Approachable, curious and smart... <br>and that’s just the studio dog
						</h2>
						<p class="tag-description">
							What defines one company of service from any other? Whilst it can seem intangible in many ways, we know its more than a just a long client list, a fancy portfolio, a bunch of awards, or even a healthy profit.

							<br><br>

							What’s facinate us is the relationships that we build with both our team and our clients – and it’s what happens day-in day-out between these interactions that really matters.For us personal touch to the client's requirement matters most.
						</p>
						
					</div>
					
				</div>
			</div>
		</div>
	</section>
	<!-- End About Area -->

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