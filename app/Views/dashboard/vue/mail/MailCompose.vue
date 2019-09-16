<template>
	<div id="mailCompose" class="mail-compose">
		<div class="mail-compose-dialog">
		<div class="mail-compose-header">
			<h6 class="mail-compose-title tx-white">New Message</h6>
			<nav class="nav nav-icon-only">
			<a id="mailComposeMinimize" href="" class="nav-link nav-link-minimize d-none d-lg-block tx-white">
				<i data-feather="minus"></i>
				<i data-feather="square"></i>
			</a>
			<a id="mailComposeShrink" href="" class="nav-link nav-link-shrink d-none d-lg-block tx-white">
				<i data-feather="minimize-2"></i>
				<i data-feather="maximize-2"></i>
			</a>
			<a id="mailComposeClose" href="" class="nav-link nav-link-close tx-white"><i data-feather="x"></i></a>
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
			<div>Cc</div>
			<input type="text" class="form-control mb-2 input-sm" placeholder="To">
			
			<editor :height="'100'" @input="editor"></editor>

			<div class="tx-13 mg-t-15 mg-sm-t-0 mt-2" >
				<button class="btn btn-white mg-r-5 btn-sm">Save as Draft</button>
				<button class="btn btn-primary btn-sm">Send</button>
			</div>


		</div><!-- mail-compose-body -->


		</div><!-- mail-compose-dialog -->
	</div><!-- mail-compose -->
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				mailbody:''
			}
		},
		watch:{

		},
		methods:{
			editor(e){
				console.log(e)
				this.mailbody = e
			}
		},
		created(){
		
		}
	};

</script>

<style lang="scss" Scoped>



.tx-white{
	color: #8f9dae !important;
}
a{
	svg{
		color: #8f9dae !important;
	}
	
}
</style>