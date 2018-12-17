@extends('layouts.ecom')

@section('title','Home')



@section('content')

<div class="super_container">
	
	<!--Header Area for nav and other things-->
	<header class="ecom-header">
		<nav class="navbar navbar-default">
		  <div class="container">
		    <!-- Brand and toggle get grouped for better mobile display -->
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		        <span class="icon-bar"></span>
		      </button>
		      <a class="navbar-brand" href="#">Brand</a>
		    </div>

		    <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      
		      
		      <ul class="nav navbar-nav navbar-right">
		        <li><a href="#">Link</a></li>
		        <li class="dropdown">
		          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
		          <ul class="dropdown-menu">
		            <li><a href="#">Action</a></li>
		            <li><a href="#">Another action</a></li>
		            <li><a href="#">Something else here</a></li>
		            <li role="separator" class="divider"></li>
		            <li><a href="#">Separated link</a></li>
		          </ul>
		        </li>
		      </ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
		</nav>
	</header>
	
	<!--Banner and carousal-->
	<div class="top-banner " style="background-image:url({{asset('public/images/ecom/banner_background.jpg')}})" >			
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="{{asset('public/images/ecom/banner_product.png')}}" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">new era of smartphones</h1>
						<div class="banner_price"><span>$530</span>$460</div>
						<div class="banner_product_name">Apple Iphone 6s</div>
						<div class="button banner_button"><a href="#">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!--Info Area-->
	<div class="info-area ">
		<div class="container">
			<div class="row">
				
				<!--Info Item-->
				<div class="col-lg-3 col-md-6 col-xs-12 ">					
					<div class="char_item">
						<div class="row d-flex char_item_inner">
							<div class="char_icon"><img src="{{asset('public/images/ecom/char_1.png')}}" alt=""></div>
							<div class="char_content ">
								<div class="char_title">Free Delivery</div>
								<div class="char_subtitle">from $50</div>
							</div>
						</div>
					</div>
				</div>
				<!--Info Item-->
				<div class="col-lg-3 col-md-6 col-xs-12 ">					
					<div class="char_item flex-row align-items-center justify-content-start">
						<div class="row d-flex char_item_inner">
							<div class="char_icon"><img src="{{asset('public/images/ecom/char_2.png')}}" alt=""></div>
							<div class="char_content ">
								<div class="char_title">Free Delivery</div>
								<div class="char_subtitle">from $50</div>
							</div>
						</div>
					</div>
				</div>
				<!--Info Item-->
				<div class="col-lg-3 col-md-6 col-xs-12 ">					
					<div class="char_item flex-row align-items-center justify-content-start">
						<div class="row d-flex char_item_inner">
							<div class="char_icon"><img src="{{asset('public/images/ecom/char_3.png')}}" alt=""></div>
							<div class="char_content ">
								<div class="char_title">Free Delivery</div>
								<div class="char_subtitle">from $50</div>
							</div>
						</div>
					</div>
				</div>
				<!--Info Item-->
				<div class="col-lg-3 col-md-6 col-xs-12 ">					
					<div class="char_item flex-row align-items-center justify-content-start">
						<div class="row d-flex char_item_inner">
							<div class="char_icon"><img src="{{asset('public/images/ecom/char_4.png')}}" alt=""></div>
							<div class="char_content ">
								<div class="char_title">Free Delivery</div>
								<div class="char_subtitle">from $50</div>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
	</div>


	<!-- Deals of the week -->
	<div class="deals_featured">
		<div class="container">
			<div class="row">
				
				<!--Weekly Deals-->
				<div class="col-md-4 col-xs-12">

					<div class="weekly_deals bdr">

						<div class="weekly_deals_title">Deals of the Week</div>
						<div class="weekly_deals_slider_container">

							<!--Deals slider-->
							<div class="owl-carousel owl-theme deals_slider">
				
								<!--Weekly deals carousel item-->
								<div class="item deals_item">
									<div class="deals_item_image"><img src="{{asset('public/images/ecom/deals.png')}}" alt=""></div>
									<div class="deals-item-content">

										<div class="item_info">
											<div class="item_category"><a href="#">Headphones</a></div>
										</div>
										<div class="item_info">
											<div class="row">
												<div class="item_name col-md-6 col-xs-6">Beoplay H7</div>
												<div class="item_price col-md-6 col-xs-6">$225</div>
											</div>
										</div>
										<div class="item_available ">
											<div class="available_line">
												<div class="row">
													<div class="available_title col-md-6 col-xs-5">Available: <span>6</span></div>
													<div class="sold_title col-md-6 col-xs-7">Already sold: <span>28</span></div>	
												</div>
												
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex">
											<div class="row">
												<div class="deals_timer_title_container col-md-6 col-xs-6">
													<div class="deals_timer_title">Hurry Up</div>
													<div class="deals_timer_subtitle">Offer ends in:</div>
												</div>
												<div class="deals_timer_content col-md-6 col-xs-6">
													<div class="deals_timer_box clearfix d-flex" data-target-time="Nov 26, 2018">
														<div class="deals_timer_unit">
															<div id="deals_timer1_hr" class="deals_timer_hr"></div>
															<span>hours</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_min" class="deals_timer_min"></div>
															<span>mins</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_sec" class="deals_timer_sec"></div>
															<span>secs</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>
									<div class="item-offer">
										<div class="off">50%</div>
									</div>
								</div>

								<!--Weekly deals carousel item-->
								<div class="item deals_item">
									<div class="deals_item_image"><img src="{{asset('public/images/ecom/deals.png')}}" alt=""></div>
									<div class="deals-item-content">

										<div class="item_info">
											<div class="item_category"><a href="#">Headphones</a></div>
										</div>
										<div class="item_info">
											<div class="row">
												<div class="item_name col-md-6 col-xs-6">Beoplay H7</div>
												<div class="item_price col-md-6 col-xs-6">$56</div>
											</div>
										</div>
										<div class="item_available ">
											<div class="available_line">
												<div class="row">
													<div class="available_title col-md-6 col-xs-5">Available: <span>6</span></div>
													<div class="sold_title col-md-6 col-xs-7">Already sold: <span>28</span></div>	
												</div>
												
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex">
											<div class="row">
												<div class="deals_timer_title_container col-md-6 col-xs-6">
													<div class="deals_timer_title">Hurry Up</div>
													<div class="deals_timer_subtitle">Offer ends in:</div>
												</div>
												<div class="deals_timer_content col-md-6 col-xs-6">
													<div class="deals_timer_box clearfix d-flex" data-target-time="Nov 28, 2018">
														<div class="deals_timer_unit">
															<div id="deals_timer1_hr" class="deals_timer_hr"></div>
															<span>hours</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_min" class="deals_timer_min"></div>
															<span>mins</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_sec" class="deals_timer_sec"></div>
															<span>secs</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										
									</div>
									<div class="item-offer">
										<div class="off">20%</div>
									</div>
								</div>

								<!--Weekly deals carousel item-->
								<div class="item deals_item">
									<div class="deals_item_image"><img src="{{asset('public/images/ecom/deals.png')}}" alt=""></div>
									<div class="deals-item-content">

										<div class="item_info">
											<div class="item_category"><a href="#">Headphones</a></div>
										</div>
										<div class="item_info">
											<div class="row">
												<div class="item_name col-md-6 col-xs-6">Beoplay H7</div>
												<div class="item_price col-md-6 col-xs-6">$556</div>
											</div>
										</div>
										<div class="item_available ">
											<div class="available_line">
												<div class="row">
													<div class="available_title col-md-6 col-xs-5">Available: <span>6</span></div>
													<div class="sold_title col-md-6 col-xs-7">Already sold: <span>28</span></div>	
												</div>
												
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex">
											<div class="row">
												<div class="deals_timer_title_container col-md-6 col-xs-6">
													<div class="deals_timer_title">Hurry Up</div>
													<div class="deals_timer_subtitle">Offer ends in:</div>
												</div>
												<div class="deals_timer_content col-md-6 col-xs-6">
													<div class="deals_timer_box clearfix d-flex" data-target-time="Nov 25, 2018">
														<div class="deals_timer_unit">
															<div id="deals_timer1_hr" class="deals_timer_hr"></div>
															<span>hours</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_min" class="deals_timer_min"></div>
															<span>mins</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_sec" class="deals_timer_sec"></div>
															<span>secs</span>
														</div>
													</div>
												</div>
											</div>
										</div>
									
									</div>
									<div class="item-offer">
										<div class="off">45%</div>
									</div>
								</div>

								<!--Weekly deals carousel item-->
								<div class="item deals_item">
									<div class="deals_item_image"><img src="{{asset('public/images/ecom/deals.png')}}" alt=""></div>
									<div class="deals-item-content">

										<div class="item_info">
											<div class="item_category"><a href="#">Headphones</a></div>
										</div>
										<div class="item_info">
											<div class="row">
												<div class="item_name col-md-6 col-xs-6">Beoplay H7</div>
												<div class="item_price col-md-6 col-xs-6">$321</div>
											</div>
										</div>
										<div class="item_available ">
											<div class="available_line">
												<div class="row">
													<div class="available_title col-md-6 col-xs-5">Available: <span>6</span></div>
													<div class="sold_title col-md-6 col-xs-7">Already sold: <span>28</span></div>	
												</div>
												
											</div>
											<div class="available_bar"><span style="width:17%"></span></div>
										</div>
										<div class="deals_timer d-flex">
											<div class="row">
												<div class="deals_timer_title_container col-md-6 col-xs-6">
													<div class="deals_timer_title">Hurry Up</div>
													<div class="deals_timer_subtitle">Offer ends in:</div>
												</div>
												<div class="deals_timer_content col-md-6 col-xs-6">
													<div class="deals_timer_box clearfix d-flex" data-target-time="Nov 26, 2018">
														<div class="deals_timer_unit">
															<div id="deals_timer1_hr" class="deals_timer_hr"></div>
															<span>hours</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_min" class="deals_timer_min"></div>
															<span>mins</span>
														</div>
														<div class="deals_timer_unit">
															<div id="deals_timer1_sec" class="deals_timer_sec"></div>
															<span>secs</span>
														</div>
													</div>
												</div>
											</div>
										</div>
										

									</div>
									<div class="item-offer">
										<div class="off">80%</div>
									</div>
								</div>


							</div>
						</div>

						<div class="deals_slider_nav_container">
							<div class="deals_slider_prev deals_slider_nav" id="customPrevBtn"><i class="fa fa-arrow-left"></i></div>
							<div class="deals_slider_next deals_slider_nav" id="customNextBtn"><i class="fa fa-arrow-right"></i></div>
						</div>

						
						
					</div>
				</div>
				
				<!--Featured-->
				<div class="col-md-8 col-xs-12">
					<div class="feature_item ">
						
						<div class="feature_item_nav">
							<ul class="nav nav-tabs">
								<li class="active"><a data-toggle="tab" href="#featured">Featured</a></li>
								<li><a data-toggle="tab" href="#onsale">On Sale</a></li>
								<li><a data-toggle="tab" href="#bestrated">Best Rated</a></li>
							</ul>

							<div class="tab-content">
								
								<div id="featured" class="tab-pane fade in active">
									<div class="row">

										<div class="col-md-3 m-p-0">
											<div class="product_card bdr">

												<div class="imagebox bdr">
													<img src="{{asset('public/images/ecom/featured_1.png')}}" alt="">
												</div>

												<div class="details">
													<h4>Samsung<br><span>Samsung s3 64 Gb</span></h4>
													
													<div class="c_price">19000</div>
													<label>Color</label>
													<ul>
														<li>Black</li>
														<li>Blue</li>
														<li>White</li>
													</ul>
													<a href="">Add to cart</a>
												</div>
												
											</div>
										</div>
								
										
											
										</div>
									</div>
								</div>


								<div id="onsale" class="tab-pane fade">
								   	<h3>Menu 1</h3>
								   	<p>Some content in menu 1.</p>
								</div>

								<div id="bestrated" class="tab-pane fade">
								   	<h3>Menu 2</h3>
								   	<p>Some content in menu 2.</p>
								</div>


							</div>
						</div>

					</div>
				</div>



				
			</div>
		</div>
	</div>




</div>
    
@endsection