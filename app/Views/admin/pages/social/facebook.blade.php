@extends('layouts.admin')

@section('title','Facebook')





@section('content')
<div class="right_col" role="main">
	

    <div class="x_panel">

        <div class="x_title">
        	
			<span class="panel-title" style="color: #306287">
	            <i class="fa fa-align-left hidden-xs"></i>
	            Facebook Post Management 
	        </span>
	        <span style="margin-left: 10px;">
	        	<i class="fa fa-refresh" aria-hidden="true"></i>
	        	<small><a href="{{route('facebook.access.token')}}"><b>Switch Account</b></a></small>
	        </span>

		</div>
		
		
		<div class="x_content">

			
			@if(!Auth::user()->facebook)				

				<div class="alert alert-info">
					No access token found to show Facebook pages, Please 
						<b><a href="{{route('facebook.access.token')}}">Click here</a></b>
					to get new access token.
				</div>

			@else

				<facebook></facebook>

			@endif

        	

        </div>

	</div>
</div>
@endsection
