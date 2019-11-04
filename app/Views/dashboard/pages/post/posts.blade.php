@extends('layouts.dashboard.appfile')

@section('title','Posts')


@section('css')
	<link href="{{asset('public/dashboard/lib/quill/quill.core.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/lib/quill/quill.snow.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.profile.css')}}">
@endsection


@section('content')

  <post></post>
  
@endsection


@section('javascript')
	<script src="{{asset('public/dashboard/lib/quill/quill.min.js')}}"></script>
    <script src="{{asset('public/dashboard/assets/js/dashforge.filemgr.js')}}"></script>
@endsection