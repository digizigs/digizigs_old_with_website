
<?php
use Illuminate\Support\Facades\Auth;
?>

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
			<inbox :user="{{ Auth::user()}}"></inbox>
		</div>

	</div>

</div>
    
@endsection


