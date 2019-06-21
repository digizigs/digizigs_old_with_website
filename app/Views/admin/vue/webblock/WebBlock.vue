<template>
	<div class="x_panel">
		<div class="x_title">
			<span class="panel-title">
	            <i class="fa fa-align-left hidden-xs"></i>
	            Web Blocks
	         </span>
	         
	         <span class="x-title-option">
	            <ul>
	               <li>
	                  <span id="x-title-search" class="title-searchs x-title-search c">
	                     <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
	                     <input type="text">
	                     <span class="close-icon" ><i class="fa fa-times" aria-hidden="true"></i></span>
	                  </span>
	               </li>
	               <li>
	               		<a href="#newwebblock" class="wpfont" data-toggle="modal">Create New</a>
	               </li>
	            </ul>
	         </span>

		</div>
		<div class="x_content">
			Content
		</div>

		<div id="modal">
			<newwebblock @recordupdated="refreshRecord"></newwebblock>	
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
			refreshRecord(){

			}
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>