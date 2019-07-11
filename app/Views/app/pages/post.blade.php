@extends('layouts.app')

@section('title', setting('app_name') .' | Blog')



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
	<!--section class="top-category-widget-area pt-90 pb-90 ">
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
									<h4 class="content-title mx-auto text-uppercase">Social life  ui iuhhu  iu  huiuh oi iu iuh iuhiu iugugu </h4>
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
	</section-->
	<!-- End top-category-widget Area -->

	<!-- Start post-content Area -->
	<section class="post-content-area ">
		<div class="container">
			<div class="row">

				<div class="col-lg-8 posts-list">
					
					@foreach($posts as $post)

							<div class="single-post row">								
								<div class="col-lg-12 col-md-12 ">
									
									<div class="post-heading">																							<div class="post-title">

											<a class="posts-title" href="{{route('app.blog.detail',$post->slug)}}">
												<h3>
													{{$post->title}}
												</h3>
											</a>

											<span class="post-meta post-date">												
												{{ Carbon\Carbon::parse($post->created_at)->format('M d Y') }}
												<i class="fa fa-calendar" aria-hidden="true"></i>											
											</span>
												
											<span class="post-meta post-author">
												<a href="{{route('app.blog.author',$post->user->id)}}">
													{{$post->user->firstname}}
													<i class="fa fa-user" aria-hidden="true"></i>
												</a>
											</span>
										
											<span class="post-meta post-views">												
												{{$post->views}} Views												 
												<i class="fa fa-eye" aria-hidden="true"></i>
											</span>

											<span class="post-meta post-comments">
												06 Comments
												<i class="fa fa-comments" aria-hidden="true"></i>
											</span>

											<span class="post-meta post-cat">
												<ul class="tags">
													@foreach($post->categories as $cat)							                
														<li><a href="{{route('app.blog.category',$cat->name)}}" >{{$cat->name}}</a></li>
										            @endforeach										
												</ul>
											</span>
										</div>
									</div>

									<div class="feature-img">										
										<img class="img-fluid" src="{{$post->image_url}}" alt="">
									</div>

									<p class="excert">
										{!!Illuminate\Support\Str::words($post->body,60)!!}
									</p>

									<a href="{{route('app.blog.detail',$post->slug)}}" class="primary-btn" data-text="View More" id="{{$post->id}}">
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

								@foreach($popular_post as $popular)

									<div class="single-post-list d-flex flex-row align-items-center">
										<div class="thumb">
											<img class="img-fluid" src="{{$popular->image_url}}" alt="" style="width: 100px;">
										</div>
										<div class="details">
											<a href="{{route('app.blog.detail',$popular->slug)}}"><h6>{{$popular->title}}</h6></a>
											<p>{{ Carbon\Carbon::parse($popular->created_at)->diffForHumans() }}</p>
										</div>
									</div>

								@endforeach
								
								
							</div>
						</div>					

						<div class="single-sidebar-widget post-category-widget">
							<h4 class="category-title">Post Catgories</h4>
							<ul class="cat-list">

								@foreach($categories as $category)

									<li>
										<a href="#" class="d-flex justify-content-between">
											<p>{{ucfirst($category->name)}}</p>
											<p>{{ $category->posts->count() }}</p>
										</a>
									</li>

								@endforeach
								
							</ul>
						</div>

						<div class="single-sidebar-widget tag-cloud-widget">
							<h4 class="tagcloud-title">Tag Clouds</h4>
							<ul>
								@foreach($tags as $tag)
									<li><a href="#">{{ ucfirst($tag->name)}}</a></li>
								@endforeach								
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