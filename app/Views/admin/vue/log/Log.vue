<template>
	<div class="x_panel">
		<div class="x_title">
			<span class="panel-title">
	            <i class="fa fa-align-left hidden-xs"></i>
	            Log
	         </span>  
		</div>
		<div class="x_content">
			Content
		</div>

		<div id="modal">
					
		</div>


	</div>
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
            NProgress.start();
			axios.get('getlogs')
			.then((response) => {
					console.log(response)
					
				})
			.catch((error) => console.log(error))
			NProgress.done();
		}
	};

</script>

<style type="text/css" Scoped>


</style>