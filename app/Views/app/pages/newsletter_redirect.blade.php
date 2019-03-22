@extends('layouts.app')

@section('title','About')



@section('content')


<div class="wrapper">

	<!-- start banner Area -->
	<section class="titlebar" style="background: url({{asset('public/images/banner/curve-5.png')}}) no-repeat scroll center center / cover;">
	    <h1 class="page-title">
	    	<span>Thank </span>
	    	you
	    </h1>
	    <div id="particles-js"></div>
	</section>
	<!-- End banner Area -->

		
	<section class="tag-line">
		<div class="container">
			<h2 class="tag-title">Thank you for subscribing to our newsletter.</h2>
			<p class="tag-description">Please check your inbox (and spam folder, just in case) for the confirmation email, you will need to click on the link to verify your subscription.</p>
		</div>
	</section>

	

</div>

@endsection

@section('javascript')
	<script>
	
	</script>
@endsection