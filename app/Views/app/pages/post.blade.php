@extends('layouts.app')

@section('title','Blog')



@section('content')

<div class="wrapper">
	



	<!-- start banner Area -->
	<section class="titlebar" style="background: url({{asset('public/images/banner/curve-5.png')}}) no-repeat scroll center center / cover;">
	    <h1 class="page-title">
	    	some <span>Blogs</span>
	    </h1>
	    <div id="particles-js"></div>

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

					@foreach($posts = get_posts('all',1) as $post)

							<div class="single-post row">								
								<div class="col-lg-12 col-md-12 ">
									
									<div class="post-heading">																							<div class="post-title">

											<a class="posts-title" href="blog-single.html">
												<h3>
													{{$post->title}}
												</h3>
											</a>

											<span class="post-meta post-date">
												<a href="#">
													{{ Carbon\Carbon::parse($post->created_at)->format('M d Y') }}
													<span class="lnr lnr-calendar-full"></span>
												</a>
											</span>
												
											<span class="post-meta post-author">
												<a href="#">{{$post->user->firstname}}
													<span class="lnr lnr-user"></span>
												</a>
											</span>
										
											<span class="post-meta post-views">
												<a href="#">1.2M Views</a> 
												<span class="lnr lnr-eye"></span>
											</span>

											<span class="post-meta post-comments">
												<a href="#">06 Comments</a>
												<span class="lnr lnr-bubble"></span>
											</span>

											<span class="post-meta post-cat">
												<ul class="tags">
													@foreach($post->categories as $cat)							                
														<li><a href="#">{{$cat->name}},</a></li>
										            @endforeach										
												</ul>
											</span>
										</div>
									</div>

									<div class="feature-img">
										<img class="img-fluid" src="{{$post->image_url}}" alt="">
									</div>

									<p class="excert">
										{!!Illuminate\Support\Str::words($post->body,40)!!}
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
				    @endforeach
					
					<nav class="blog-pagination justify-content-center d-flex">
						{{ $posts->links() }}
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

</div>

@endsection