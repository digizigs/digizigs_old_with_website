
@extends('layouts.admin')

@section('title','Mailbox')



@section('content')

<div class="right_col" role="main">

	<div class="x_panel">
		<div class="x_title">
			<span class="panel-title">
            <i class="fa fa-align-left hidden-xs"></i>
            Mailbox
         </span>
	       
		</div>

		<div class="x_content">
			<div class="mat-card" style="padding: 20px 0px">
				


				{{$mail}}








			</div>
		</div>

	</div>

</div>
    
@endsection

