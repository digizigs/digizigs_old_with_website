<template>
	<div class="x_panel">
		<div class="x_title">
			<span class="panel-title">
	            <i class="fa fa-align-left hidden-xs"></i>
	            Google Analytics
	         </span>
	        
	         <span class="x-title-option">
	            <ul>             
	               <li>
	               	<select name="" id="" v-model="duration">
	               		<option value="7">Current Week</option>
	               		<option value="30">Current Month</option>
	               		<option value="180">Six Month</option>
	               		<option value="365">Current Year</option>
	               		<option value="1000">All Data</option>
	               	</select>
	               </li>
	            </ul>
	         </span>

		</div>
		<div class="x_content">
			<topcountries  :data ="topcountries"></topcountries>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				duration:'7',
				topcountries:[],
			}
		},
		watch:{
			duration(){
				this.request();
			}
		},
		methods:{
			request(){
				NProgress.start();
				axios.get('analytics/topcountries',{params:{period:this.duration}})
            	.then((response) => {
            		this.topcountries = response.data
            		console.log(response.data)
            		NProgress.done();
            	})
            	.catch((error) => {
            		//this.errors=error.response.data.errors
            		NProgress.done();
            	});
			}
		},
		created(){
			this.request();
		}
	};

</script>

<style type="text/css" Scoped>


</style>