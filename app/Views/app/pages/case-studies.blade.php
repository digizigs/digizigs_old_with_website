@extends('layouts.app')

@section('title','Blog')



@section('content')

<div class="wrapper">
	
	<!-- start banner Area -->
	<section class="titlebar" style="background: url({{asset('public/images/banner/curve-5.png')}}) no-repeat scroll center center / cover;">
        <h1 class="page-title">
        	<span>Case </span>
        	Studies
        </h1>
        <div id="particles-js"></div>
    </section>   
    <!-- End banner Area -->

	
	

	<!-- Start Tag Line -->
	<section class="tag-line">
		<div class="container">
			<h2 class="tag-title">Who said you can’t judge a book by its cover?</h2>
			<p class="tag-description">First impressions really matters. Especially in the fast changing digital era. Whilst it’s got to look good and capture your attention, we believe digital projects need to engage – and that takes more than just a pretty interface. You need to understand your audience – what their requirements and motivations are. Only then can you write meaningful content and experiences or useful services and applications for them.</p>
		</div>
	</section>
	<!-- End Tag Line -->


	<section class="case-study-area">
		<div class="row">
			
			<div class="col-lg-6 col-md-6 wow slideInLeft" data-wow-duration="1s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="{{asset('public\images\blog\cat-widget1.jpg')}}" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 wow slideInRight" data-wow-duration="1s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="{{asset('public\images\blog\cat-widget2.jpg')}}" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-4 col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.2s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.4s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.6s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>

			<div class="col-lg-6 col-md-6 wow slideInLeft" data-wow-duration="1s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 wow slideInRight" data-wow-duration="1s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>


			<div class="col-lg-4 col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.2s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.4s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6 wow slideInRight" data-wow-duration="1s" data-wow-delay="0.6s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>



			<div class="col-lg-6 col-md-6 wow slideInLeft" data-wow-duration="1s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 wow slideInRight" data-wow-duration="1s">
				<div class="blog_items">
					<div class="blog_img_box">
						<img class="img-fluid" src="img/blog_img1.png" alt="">
					</div>
					<div class="blog_content">
						<a class="title" href="blog.html">Portable Fashion for women</a>
						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
							dolore magna aliqua. Ut enim ad minim veniam, quis nostrud.</p>
						<div class="date">
							<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>13th Dec </a>
							<a href="#"><i class="fa fa-heart" aria-hidden="true"></i> 15</a>
							<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
						</div>
					</div>
				</div>
			</div>



		</div>
	</section>

</div>


@endsection