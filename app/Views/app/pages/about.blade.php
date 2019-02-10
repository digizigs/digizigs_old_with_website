@extends('layouts.app')

@section('title','Home')



@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 style="color: red;">{{$page->title}}</h3>
				</div>
				<div class="panel-body">
					<p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facilis a beatae consequuntur iusto repellendus sapiente harum eum quidem neque nesciunt iure, quis, consectetur ea omnis quibusdam, maxime tempore debitis expedita.</p>
				</div>
			</div>
		</div>
	</div>
</div>


@endsection