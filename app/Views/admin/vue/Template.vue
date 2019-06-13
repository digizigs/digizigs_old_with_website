<template>
	<div class="x_panel">
		<div class="x_title">
			<span class="panel-title">
	            <i class="fa fa-align-left hidden-xs"></i>
	            Title
	         </span>
	         <a href="#addservices" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
	            <i class="fa fa-plus" aria-hidden="true"></i> Action
	         </a>
	         <span class="x-title-option">
	            <ul>
	               <li>
	                  <span id="x-title-search" class="title-searchs x-title-search c">
	                     <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
	                     <input type="text">
	                     <span class="close-icon" ><i class="fa fa-times" aria-hidden="true"></i></span>
	                  </span>
	               </li>
	            </ul>
	         </span>

		</div>
		<div class="x_content">
			Content
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
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>