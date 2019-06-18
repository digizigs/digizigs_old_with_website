
@extends('layouts.admin')

@section('title','Users')



@section('content')

	

	<div class="right_col" role="main">
    <users></users>
  </div>
    
@endsection

@section('javascript')
  
  <script>
      $("#tags_1").select2();
      $(".select2").select2();


      $(".tags").select2({
        tags: true
      });

  </script>
@endsection