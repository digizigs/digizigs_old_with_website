@extends('layouts.admin')

@section('title','Posts')


@section('css')

	<link href="{{asset('public/vendor/quill/quill.core.css')}}" rel="stylesheet">
    <link href="{{asset('public/vendor/quill/quill.snow.css')}}" rel="stylesheet">

@endsection


@section('content')

	<div class="right_col" role="main">
		<posts></posts>
	</div>

@endsection


@section('javascript')
	<script src="{{asset('public/vendor/quill/quill.min.js')}}"></script>
@endsection