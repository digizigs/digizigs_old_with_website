@extends('layouts.app')

@section('title','Home')



@section('content')


<nav class="navbar navbar-default navbar-fixed-top">
  	<div class="container">
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="{{route('apphome')}}">{{setting('app_name')}}</a>
	    </div>
	    <div id="navbar" class="collapse navbar-collapse">
	      <ul class="nav navbar-nav navbar-right">
	        <li><a href="#">About</a></li>
	        <li><a href="#">Link</a></li>
	        <li><a href="#">Another Link</a></li>
	      </ul>
	    </div><!--/.nav-collapse -->
  	</div>
</nav>

<<<<<<< HEAD
<div class="container content" style="height: 5000px;">
=======
<div class="container content"">
>>>>>>> ab2e25948f1444dfa164ace8de6b6783f0b9847a
	<div class="col-md-10">
		@foreach($posts as $post)
		
			<h1>{{$post->title}}</h1>
			<h4>{{$post->description}}</h4>
			<p>{!!$post->body!!}</p>

		@endforeach
	</div>
	
<<<<<<< HEAD
	<div class="col-md-2">
		sidebar Area
	</div>
=======
	<div class="col-md-2"></div>
>>>>>>> ab2e25948f1444dfa164ace8de6b6783f0b9847a
</div>


@endsection