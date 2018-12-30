@extends('layouts.app')

@section('title','Home')



@section('content')

	@include('flash::message')

	<div class="top-move"><i class="fa fa-arrow-up"></i></div>  
      
    <header class="main-menu" id="home">

        @include('app.slider')
        
        @include('app.menu')

    </header>

    @include('app.service')

    @include('app.process')

    @include('app.feature')

    @include('app.portfolio')

    @include('app.blog')

    @include('app.contact')

    @include('app.footer')


  

@endsection

@section('javascript')
	<script>
		
	</script>
@endsection