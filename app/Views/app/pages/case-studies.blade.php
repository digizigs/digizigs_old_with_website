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

</div>


@endsection