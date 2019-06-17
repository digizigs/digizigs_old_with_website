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
			<div class="row">
				<div class="col-md-6 col-xs-12">
					<topcountries :dataset="topcountries"></topcountries>
				</div>

				<div class="col-md-6 col-xs-12">
					<topbrowser :dataset="topbrowser"></topbrowser>
				</div>

				<div class="col-md-6 col-xs-12">
					<visitor :dataset="visitors"></visitor>
				</div>

				<div class="col-md-6 col-xs-12">
					<referrer :dataset="referrer"></referrer>
				</div>

				<div class="col-md-12 col-xs-12">
					<mobiletraffic :dataset="mobiletraffic"></mobiletraffic>
				</div>

				<div class="col-md-12 col-xs-12">
					<trafficsource :dataset="trafficsource"></trafficsource>
				</div>

				


			</div>
			
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
				topbrowser:[],
				visitors:[],
				referrer:[],
				mobiletraffic:[],
				trafficsource:[],
				trending:[],
				renderComponent:true
			}
		},
		watch:{
			duration(){
				this.request();
			}
		},
		methods:{
			adddata(){

			},
			request(){
				NProgress.start();
				axios.get('analytics/analyticsdata',{params:{period:this.duration}})
            	.then((response) => {
            		this.topcountries = response.data.topcountries
            		this.topbrowser = response.data.topbrowser
            		this.visitors = response.data.visitor
            		this.referrer = response.data.referrer
            		this.mobiletraffic = response.data.mobiletraffic.rows
            		this.trafficsource = response.data.trafficsource.rows
            		//this.overalltraffic = response.data.trafficsource.rows
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