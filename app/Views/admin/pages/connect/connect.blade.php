@extends('layouts.admin')

@section('title','All Articles')



@section('content')


<div class="right_col" role="main">

	<div class="x_panel">

		<div class="x_title">
			<span class="panel-title">
				<i class="fa fa-align-left hidden-xs"></i>
				Connects
			</span>
		</div>

		<div class="x_content">

			<div class="col-md-12">
				<subscription></subscription>
			</div>

			<div class="col-md-12">
				<inquiry></inquiry>
			</div>

		</div>


	</div>

	
</div>



@endsection