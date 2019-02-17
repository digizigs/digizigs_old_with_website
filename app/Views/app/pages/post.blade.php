@extends('layouts.app')

@section('title','Home')



@section('content')


<div class="post-content" id="blog-page">

	<div class="container-fluid" style="height: 5000px;">
		<div class="col-md-10">
			@foreach($posts as $post)
			
				<h1>{{$post->title}}</h1>
				<h4>{{$post->description}}</h4>
				<p>{!!$post->body!!}</p>

				<br><hr><br>

			@endforeach
			
			
			{{ $posts->links() }}
			
		</div>
		

		<div class="col-md-2"></div>

	</div>
</div>

@endsection