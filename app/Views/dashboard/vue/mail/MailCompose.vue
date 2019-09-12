<template>
	<div id="mailCompose" class="mail-compose">
		<div class="mail-compose-dialog">
		<div class="mail-compose-header">
			<h6 class="mail-compose-title tx-white">New Message</h6>
			<nav class="nav nav-icon-only">
			<a id="mailComposeMinimize" href="" class="nav-link nav-link-minimize d-none d-lg-block">
				<i data-feather="minus"></i>
				<i data-feather="square"></i>
			</a>
			<a id="mailComposeShrink" href="" class="nav-link nav-link-shrink d-none d-lg-block">
				<i data-feather="minimize-2"></i>
				<i data-feather="maximize-2"></i>
			</a>
			<a id="mailComposeClose" href="" class="nav-link nav-link-close"><i data-feather="x"></i></a>
			</nav>
		</div><!-- mail-compose-header -->
		<div class="mail-compose-body">
			<div class="form-row align-items-center">
				<div class="col-sm">Recipient:</div>
				<div class="col-sm-10">
					<input type="text" class="form-control bd-0 pd-x-0" placeholder="Enter recipient's email address">
				</div>
			</div>
			<hr class="mg-y-10">
			<div class="form-row align-items-center">
				<div class="col-sm">Subject:</div>
				<div class="col-sm-10">
					<input type="text" class="form-control bd-0 pd-x-0" placeholder="Enter subject">
				</div>
			</div>
			
			<editor :height="'100'"></editor>

			<div class="tx-13 mg-t-15 mg-sm-t-0 margin-top" >
				<button class="btn btn-white mg-r-5">Save as Draft</button>
				<button class="btn btn-primary">Send</button>
			</div>


		</div><!-- mail-compose-body -->


		</div><!-- mail-compose-dialog -->
	</div><!-- mail-compose -->
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:''
			}
		},
		watch:{

		},
		methods:{
		
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>