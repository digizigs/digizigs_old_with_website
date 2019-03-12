@extends('layouts.app')

@section('title','Home')



@section('content')

<!-- start banner Area -->
<section class="banner-area" >
	<div class="cover-img" style="background: url({{asset('public/images/banner/portfolixo-icon-1.png')}})">
		<div class="container">
			<div class="row d-flex align-items-center justify-content-center">
				<div class="about-content col-lg-12">
					<h1 class="content-title">
						Blog
					</h1>

					<h2 class="tag-line">Real knowledge is to know the extent of one's ignorance</h2>

					<p class="tag-description">We work on a lot of digital projects - many for our clients and some for ourselves. We regularly face new challenges and changes in technology that, once surmounted, pave the path to new creations, solutions, and deeper understanding. Our blog is our outlet for sharing some of that knowledge. Fuelled by curiosity, a desire to understand and – where possible – answer some of the problems we and our clients face.</p>

					<p class="link-nav">
						
							<a href="index.html" class="box">Get Started </a>
						
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End banner Area -->


<!-- Start top-category-widget Area -->
<section class="top-category-widget-area pt-90 pb-90 ">
	<div class="container">
		<div class="row">
			<div class="col-lg-4">
				<div class="single-cat-widget">
					<div class="content relative">
						<div class="overlay overlay-bg"></div>
						<a href="#" target="_blank">
							<div class="thumb">
								<img class="content-image img-fluid d-block mx-auto" src="{{asset('public/images/blog/cat-widget1.jpg')}}" alt="">
							</div>
							<div class="content-details">
								<h4 class="content-title mx-auto text-uppercase">Social life</h4>
								<span></span>
								<p>Enjoy your social life together</p>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-cat-widget">
					<div class="content relative">
						<div class="overlay overlay-bg"></div>
						<a href="#" target="_blank">
							<div class="thumb">
								<img class="content-image img-fluid d-block mx-auto" src="{{asset('public/images/blog/cat-widget2.jpg')}}" alt="">
							</div>
							<div class="content-details">
								<h4 class="content-title mx-auto text-uppercase">Politics</h4>
								<span></span>
								<p>Be a part of politics</p>
							</div>
						</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="single-cat-widget">
					<div class="content relative">
						<div class="overlay overlay-bg"></div>
						<a href="#" target="_blank">
							<div class="thumb">
								<img class="content-image img-fluid d-block mx-auto" src="{{asset('public/images/blog/cat-widget3.jpg')}}" alt="">
							</div>
							<div class="content-details">
								<h4 class="content-title mx-auto text-uppercase">Food</h4>
								<span></span>
								<p>Let the food be finished</p>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End top-category-widget Area -->

<!-- Start post-content Area -->
<section class="post-content-area ">
	<div class="container">
		<div class="row">

			<div class="col-lg-8 posts-list">
				<div class="single-post row">
					<div class="col-lg-3  col-md-3 meta-details">
						<ul class="tags">
							<li><a href="#">Food,</a></li>
							<li><a href="#">Technology,</a></li>
							<li><a href="#">Politics,</a></li>
							<li><a href="#">Lifestyle</a></li>
						</ul>
						<div class="user-details row">
							<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
							<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
							<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
							<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 ">
						<div class="feature-img">
							<img class="img-fluid" src="{{asset('public/images/blog/feature-img1.jpg')}}" alt="">
						</div>
						<a class="posts-title" href="blog-single.html"><h3>Astronomy Binoculars A Great Alternative</h3></a>
						<p class="excert">
							MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
							on boot camp when you can get the MCSE study materials yourself at a fraction.
						</p>
						<a href="#" class="primary-btn" data-text="View More">
							<span>V</span>
							<span>i</span>
							<span>e</span>
							<span>w</span>
							<span> </span>
							<span>M</span>
							<span>o</span>
							<span>r</span>
							<span>e</span>
						</a>
					</div>
				</div>
				<div class="single-post row">
					<div class="col-lg-3  col-md-3 meta-details">
						<ul class="tags">
							<li><a href="#">Food,</a></li>
							<li><a href="#">Technology,</a></li>
							<li><a href="#">Politics,</a></li>
							<li><a href="#">Lifestyle</a></li>
						</ul>
						<div class="user-details row">
							<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
							<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
							<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
							<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
						</div>
					</div>
					<div class="col-lg-9 col-md-9 ">
						<div class="feature-img">
							<img class="img-fluid" src="{{asset('public/images/blog/feature-img2.jpg')}}" alt="">
						</div>
						<a class="posts-title" href="blog-single.html"><h3>The Basics Of Buying A Telescope</h3></a>
						<p class="excert">
							MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
							on boot camp when you can get the MCSE study materials yourself at a fraction.
						</p>
						<a href="#" class="primary-btn" data-text="View More">
							<span>V</span>
							<span>i</span>
							<span>e</span>
							<span>w</span>
							<span> </span>
							<span>M</span>
							<span>o</span>
							<span>r</span>
							<span>e</span>
						</a>
					</div>
				</div>
				<div class="single-post row">
					<div class="col-lg-3  col-md-3 meta-details">
						<ul class="tags">
							<li><a href="#">Food,</a></li>
							<li><a href="#">Technology,</a></li>
							<li><a href="#">Politics,</a></li>
							<li><a href="#">Lifestyle</a></li>
						</ul>
						<div class="user-details row">
							<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
							<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
							<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
							<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
						</div>
					</div>
					<div class="col-lg-9 col-md-9">
						<div class="feature-img">
							<img class="img-fluid" src="{{asset('public/images/blog/feature-img3.jpg')}}" alt="">
						</div>
						<a class="posts-title" href="blog-single.html"><h3>The Glossary Of Telescopes</h3></a>
						<p class="excert">
							MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
							on boot camp when you can get the MCSE study materials yourself at a fraction.
						</p>
						<a href="#" class="primary-btn" data-text="View More">
							<span>V</span>
							<span>i</span>
							<span>e</span>
							<span>w</span>
							<span> </span>
							<span>M</span>
							<span>o</span>
							<span>r</span>
							<span>e</span>
						</a>
					</div>
				</div>
				<div class="single-post row">
					<div class="col-lg-3  col-md-3 meta-details">
						<ul class="tags">
							<li><a href="#">Food,</a></li>
							<li><a href="#">Technology,</a></li>
							<li><a href="#">Politics,</a></li>
							<li><a href="#">Lifestyle</a></li>
						</ul>
						<div class="user-details row">
							<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
							<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
							<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
							<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
						</div>
					</div>
					<div class="col-lg-9 col-md-9">
						<div class="feature-img">
							<img class="img-fluid" src="{{asset('public/images/blog/feature-img4.jpg')}}" alt="">
						</div>
						<a class="posts-title" href="blog-single.html"><h3>The Night Sky</h3></a>
						<p class="excert">
							MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
							on boot camp when you can get the MCSE study materials yourself at a fraction.
						</p>
						<a href="#" class="primary-btn" data-text="View More">
							<span>V</span>
							<span>i</span>
							<span>e</span>
							<span>w</span>
							<span> </span>
							<span>M</span>
							<span>o</span>
							<span>r</span>
							<span>e</span>
						</a>
					</div>
				</div>
				<div class="single-post row">
					<div class="col-lg-3 col-md-3 meta-details">
						<ul class="tags">
							<li><a href="#">Food,</a></li>
							<li><a href="#">Technology,</a></li>
							<li><a href="#">Politics,</a></li>
							<li><a href="#">Lifestyle</a></li>
						</ul>
						<div class="user-details row">
							<p class="user-name col-lg-12 col-md-12 col-6"><a href="#">Mark wiens</a> <span class="lnr lnr-user"></span></p>
							<p class="date col-lg-12 col-md-12 col-6"><a href="#">12 Dec, 2017</a> <span class="lnr lnr-calendar-full"></span></p>
							<p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span class="lnr lnr-eye"></span></p>
							<p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span class="lnr lnr-bubble"></span></p>
						</div>
					</div>
					<div class="col-lg-9 col-md-9">
						<div class="feature-img">
							<img class="img-fluid" src="{{asset('public/images/blog/feature-img5.jpg')}}" alt="">
						</div>
						<a class="posts-title" href="blog-single.html"><h3>Telescopes 101</h3></a>
						<p class="excert">
							MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money
							on boot camp when you can get the MCSE study materials yourself at a fraction.
						</p>
						<a href="#" class="primary-btn" data-text="View More">
							<span>V</span>
							<span>i</span>
							<span>e</span>
							<span>w</span>
							<span> </span>
							<span>M</span>
							<span>o</span>
							<span>r</span>
							<span>e</span>
						</a>
					</div>
				</div>
				<nav class="blog-pagination justify-content-center d-flex">
					<ul class="pagination">
						<li class="page-item">
							<a href="#" class="page-link" aria-label="Previous">
								<span aria-hidden="true">
									<span class="lnr lnr-chevron-left"></span>
								</span>
							</a>
						</li>
						<li class="page-item"><a href="#" class="page-link">01</a></li>
						<li class="page-item active"><a href="#" class="page-link">02</a></li>
						<li class="page-item"><a href="#" class="page-link">03</a></li>
						<li class="page-item"><a href="#" class="page-link">04</a></li>
						<li class="page-item"><a href="#" class="page-link">09</a></li>
						<li class="page-item">
							<a href="#" class="page-link" aria-label="Next">
								<span aria-hidden="true">
									<span class="lnr lnr-chevron-right"></span>
								</span>
							</a>
						</li>
					</ul>
				</nav>
			</div>

			<div class="col-lg-4 sidebar-widgets">
				<div class="widget-wrap">
					
					
					<div class="single-sidebar-widget popular-post-widget">
						<h4 class="popular-title">Popular Posts</h4>
						<div class="popular-post-list">
							<div class="single-post-list d-flex flex-row align-items-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('public/images/blog/pp1.jpg')}}" alt="">
								</div>
								<div class="details">
									<a href="blog-single.html"><h6>Space The Final Frontier</h6></a>
									<p>02 Hours ago</p>
								</div>
							</div>
							<div class="single-post-list d-flex flex-row align-items-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('public/images/blog/pp2.jpg')}}" alt="">
								</div>
								<div class="details">
									<a href="blog-single.html"><h6>The Amazing Hubble</h6></a>
									<p>02 Hours ago</p>
								</div>
							</div>
							<div class="single-post-list d-flex flex-row align-items-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('public/images/blog/pp3.jpg')}}" alt="">
								</div>
								<div class="details">
									<a href="blog-single.html"><h6>Astronomy Or Astrology</h6></a>
									<p>02 Hours ago</p>
								</div>
							</div>
							<div class="single-post-list d-flex flex-row align-items-center">
								<div class="thumb">
									<img class="img-fluid" src="{{asset('public/images/blog/pp4.jpg')}}" alt="">
								</div>
								<div class="details">
									<a href="blog-single.html"><h6>Asteroids telescope</h6></a>
									<p>02 Hours ago</p>
								</div>
							</div>
						</div>
					</div>					

					<div class="single-sidebar-widget post-category-widget">
						<h4 class="category-title">Post Catgories</h4>
						<ul class="cat-list">
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Technology</p>
									<p>37</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Lifestyle</p>
									<p>24</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Fashion</p>
									<p>59</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Art</p>
									<p>29</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Food</p>
									<p>15</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Architecture</p>
									<p>09</p>
								</a>
							</li>
							<li>
								<a href="#" class="d-flex justify-content-between">
									<p>Adventure</p>
									<p>44</p>
								</a>
							</li>
						</ul>
					</div>

					<div class="single-sidebar-widget tag-cloud-widget">
						<h4 class="tagcloud-title">Tag Clouds</h4>
						<ul>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Architecture</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Art</a></li>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Architecture</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Adventure</a></li>
							<li><a href="#">Food</a></li>
							<li><a href="#">Lifestyle</a></li>
							<li><a href="#">Adventure</a></li>
							<li><a href="#">Technology</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Architecture</a></li>
							<li><a href="#">Fashion</a></li>
							<li><a href="#">Food</a></li>
						</ul>
					</div>
				</div>
			</div>

		</div>
	</div>
</section>
<!-- End post-content Area -->

<!-- Horizontal bar -->
<div class="container">
	<hr>
</div>

@endsection