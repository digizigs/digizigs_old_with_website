@extends('layouts.dashboard.appfile')

@section('title','Facebook Page Management')


@section('css')
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.filemgr.css')}}">
    <link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.profile.css')}}">
@endsection


@section('content')

  <facebook></facebook>
  
@endsection


@section('javascript')
    <script src="{{asset('public/dashboard/assets/js/dashforge.filemgr.js')}}"></script>
@endsection