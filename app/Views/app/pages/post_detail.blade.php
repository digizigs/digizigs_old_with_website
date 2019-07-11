@extends('layouts.app')

@section('title',$post->title)



@section('content')

<div class="wrapper">
	

<!-- start banner Area -->
<section class="titlebar" style="background: url({{asset('public/images/banner/curve-5.png')}}) no-repeat scroll center center / cover;">
    
    <div id="particles-js"></div>

</section>
<!-- End banner Area -->

<!-- Start post-content Area -->
<section class="post-content-area ">
	<div class="container">
		<div class="row">

			<div class="col-sm-offset-1 col-lg-10 posts-list">								
				<div class="single-post row">
					<div class="col-lg-12 col-md-12 ">
						
						<div class="post-heading">
							<div class="post-title">

								<a class="posts-title" href="blog-single.html">
									<h3>
										{{$post->title}}
									</h3>
								</a>

								<span class="post-meta post-date">
									<a href="#">
										{{ Carbon\Carbon::parse($post->created_at)->format('M d Y') }}
										<i class="fa fa-calendar" aria-hidden="true"></i>
									</a>
								</span>
									
								<span class="post-meta post-author">
									<a href="#">
										{{$post->user->firstname}}
										<i class="fa fa-user" aria-hidden="true"></i>
									</a>
								</span>
							
								<span class="post-meta post-views">
									<a href="#">
										{{$post->views}} Views
										<i class="fa fa-eye" aria-hidden="true"></i>
									</a> 
									
								</span>

								<span class="post-meta post-comments">
									<a href="#">
										06 Comments
										<i class="fa fa-comments" aria-hidden="true"></i>
									</a>
									
								</span>

								<span class="post-meta post-cat">
									<ul class="tags">
										@foreach($post->categories as $cat)							                
											<li><a href="#">{{$cat->name}}</a></li>											
							            @endforeach										
									</ul>
								</span>
							</div>
						</div>

						<div class="feature-img">
							<img class="img-fluid" src="{{$post->image_url}}" alt="">
						</div>

						<p class="excert">
							{!!$post->body!!}
						</p>

						
					</div>
				</div>
				<div class="navigation-area">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
							<div class="thumb">
								<a href="#"><img class="img-fluid" src="img/blog/prev.jpg" alt=""></a>
							</div>
							<div class="arrow">
								<a href="#"><span class="lnr text-white lnr-arrow-left"></span></a>
							</div>
							<div class="detials">
								<p>Prev Post</p>
								<a href="#"><h4>Space The Final Frontier</h4></a>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
							<div class="detials">
								<p>Next Post</p>
								<a href="#"><h4>Telescopes 101</h4></a>
							</div>
							<div class="arrow">
								<a href="#"><span class="lnr text-white lnr-arrow-right"></span></a>
							</div>
							<div class="thumb">
								<a href="#"><img class="img-fluid" src="img/blog/next.jpg" alt=""></a>
							</div>
						</div>
					</div>
				</div>
				<div class="comments-area">
					<h4>05 Comments</h4>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c1.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Emilly Blunt</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list left-padding">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c2.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Elsie Cunningham</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list left-padding">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c3.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Annie Stephens</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c4.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Maria Luna</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
					<div class="comment-list">
						<div class="single-comment justify-content-between d-flex">
							<div class="user justify-content-between d-flex">
								<div class="thumb">
									<img src="img/blog/c5.jpg" alt="">
								</div>
								<div class="desc">
									<h5><a href="#">Ina Hayes</a></h5>
									<p class="date">December 4, 2017 at 3:12 pm </p>
									<p class="comment">
										Never say goodbye till the end comes!
									</p>
								</div>
							</div>
							<div class="reply-btn">
								<a href="" class="btn-reply text-uppercase">reply</a>
							</div>
						</div>
					</div>
				</div>
				<div class="comment-form">
					<h4>Leave a Comment</h4>
					<form>
						<div class="form-group form-inline">
							<div class="form-group col-lg-6 col-md-12 name">
								<input type="text" class="form-control" id="name" placeholder="Enter Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
							</div>
							<div class="form-group col-lg-6 col-md-12 email">
								<input type="email" class="form-control" id="email" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'">
							</div>
						</div>
						<div class="form-group">
							<input type="text" class="form-control" id="subject" placeholder="Subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
						</div>
						<div class="form-group">
							<textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'"
							 required=""></textarea>
						</div>
						<a href="#" class="primary-btn" data-text="Post Comment">
							<span>P</span>
							<span>o</span>
							<span>s</span>
							<span>t</span>
							<span> </span>
							<span>C</span>
							<span>o</span>
							<span>m</span>
							<span>m</span>
							<span>e</span>
							<span>n</span>
							<span>t</span>
						</a>
					</form>
				</div>          			 												
			</div>

			

		</div>
	</div>
</section>
<!-- End post-content Area -->	

</div>

@endsection