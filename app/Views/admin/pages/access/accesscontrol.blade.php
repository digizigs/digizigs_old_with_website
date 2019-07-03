
@extends('layouts.admin')

@section('title','Access Control')



@section('content')

	

<div class="right_col" role="main">

	<div class="x_panel">

		<div class="x_title">
			<span class="panel-title">
				<i class="fa fa-align-left hidden-xs"></i>
				Access Control
			</span>
		</div>

		<div class="x_content">

			@can('can_manage_user')
				<div class="col-md-12 col-xs-12">
					<userblock></userblock>
				</div>
			@endcan
			
			@can('manage_role')
				<div class="col-md-12 col-xs-12">
					<rolesblock></rolesblock>
				</div>
			@endcan

			@can('manage_permission')
				<div class="col-md-12 col-xs-12">
					<permissionsblock></permissionsblock>
				</div>
			@endcan

		</div>


	</div>

	
</div>
    
@endsection

@section('javascript')
  
  
@endsection