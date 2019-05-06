
@extends('layouts.admin')

@section('title','Chat')



@section('content')

	

<div class="right_col" role="main">
	<div class="">          
        <div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
        		<div class="x_panel">
        			<div class="x_title">	                   
	                    <h2><i class="fa fa-align-left"></i> Chat <small>Manage chats with users</small></h2>
	                    <div class="clearfix"></div>
	                </div>

	                <div class="x_content">
	                	<chat-app :user="{{ auth()->user() }}"></chat-app>
	                </div>
        		</div>
        	</div>
        </div>
    </div>
</div>



    
@endsection
