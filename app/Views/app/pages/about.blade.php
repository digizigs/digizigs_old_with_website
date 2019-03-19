@extends('layouts.app')

@section('title','About')



@section('content')

<div class="wrapper">
	
	<!-- start banner Area -->
	<!--section class="banner-area" >
		<div class="cover-img" style="background: url({{asset('public/images/banner/portfolixo-icon-1.png')}})">
			<div class="container">
				<div class="row d-flex align-items-center justify-content-center">
					<div class="about-content col-lg-12">
						<h1 class="content-title">
							About Digizigs
						</h1>

						<h2 class="tag-line">Real knowledge is to know the extent of one's ignorance</h2>

						<p class="tag-description">We work on a lot of digital projects - many for our clients and some for ourselves. We regularly face new challenges and changes in technology that, once surmounted, pave the path to new creations, solutions, and deeper understanding. Our blog is our outlet for sharing some of that knowledge. Fuelled by curiosity, a desire to understand and – where possible – answer some of the problems we and our clients face.</p>

						<p class="link-nav">
							
								<a href="{{route('apphome')}}" class="box">Get Started </a>
							
						</p>
					</div>
				</div>
			</div>
		</div>
	</section-->
	<!-- End banner Area -->
	
	<!-- start banner Area -->
	<section class="titlebar">
        <h1 class="page-title">
        	<span>About </span>
        	us
        </h1>
        <div id="particles-js"></div>
    </section>
    <!-- End banner Area -->

    <div class="bottom-line"></div>
	
	<hr class="col-md-6">

	<!-- Start About Area -->
	<section class="about-area section-gap">
		<div class="container">
			<div class="row align-items-center justify-content-between">				
				<div class="col-lg-12 col-md-12 about-right">
					<div class="section-title">
						<h2>A bit about digizigs</h2>
					</div>
					<div class="mb-50 wow fadeIn" data-wow-duration=".8s">
						<h2 class="tag-title">Approachable, curious and smart... <br>and that’s just the studio dog</h2>
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
	<section class="testimonials_area section-gap offwhite">
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