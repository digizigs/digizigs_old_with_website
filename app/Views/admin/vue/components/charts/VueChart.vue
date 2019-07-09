<template>
	<div class="mat-card">
        <div class="card-header">
            <h5>Top Countries</h5>
            <span>Hits from countries</span>

        </div>
        <div id="blockchart" class="card-block">
            <vuechartjs :chartData="datacollection" :options="chartOptions"></vuechartjs>
            <button @click="fillData">add data</button>
        </div>
    </div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return {
				duration:'7',
		        datacollection: null,
		        chartOptions:null,
		      }
		},
		mounted(){
			this.fillData()
			
		},
		watch:{
			duration:function(){
				NProgress.start();
				axios.get('analytics/topcountries',{params:{period:this.duration}})
		        	.then((response) => {
		        		//this.topcountries = response.data
		        		console.log(response.data)
		        		NProgress.done();
		        	})
		        	.catch((error) => {
		        		//this.errors=error.response.data.errors
		        		NProgress.done();
		        	});
			}
		},
		methods:{
			fillData(){
				this.datacollection = {
		          labels: [this.getRandomInt(), this.getRandomInt()],
		          datasets: [
		            {
		              label: 'Data One',
		              backgroundColor: '#f87979',
		              data: [this.getRandomInt(), this.getRandomInt()]
		            }]
		        }
		        this.chartOptions = {
		        	responsive: true,
			      	maintainAspectRatio: false
		        }
			},
			getRandomInt () {
		        return Math.floor(Math.random() * (50 - 5 + 1)) + 5
		    },
		    updated(){
		    	Console.log("Wola chart updated")
		    }
		}
	};

</script>

<style type="text/css" Scoped>


</style>