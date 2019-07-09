<template>
	<div class="mat-card">
        <div class="card-header">
            <h5>Referrer Visitors</h5>
            <a href="" v-on:click.prevent @click="type('pie')"><i class="fa fa-pie-chart" aria-hidden="true"></i></a>
            <a href="" v-on:click.prevent @click="type('bar')"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
            <a href="" v-on:click.prevent @click="type('line')"><i class="fa fa-area-chart" aria-hidden="true"></i></a>
            <span>Referrer visitors from source</span>

        </div>
        <div id="blockchart" class="card-block">
            <horizontalbarchartjs v-if="this.charttype == 'bar'" :chartData="datacollection" :options="chartOptions"></horizontalbarchartjs>
            <doughnutchartjs v-if="this.charttype == 'pie'" :chartData="datacollection" :options="chartOptions"></doughnutchartjs>
            <linechartjs v-if="this.charttype == 'line'" :chartData="datacollection" :options="chartOptions"></linechartjs>
        </div>
    </div>
</template>

<script type="text/javascript">
	export default{
		props:['dataset'],
		data(){
			return {
		        datacollection: null,
		        chartOptions:null,
                labels:[],
                values:[],
                background:[],
                border:[],
                charttype:'bar'
		      }
		},
		mounted(){
			//console.log(this.topcountries)
			//this.fillData()
			
		},
		watch:{
			dataset:function(){
				//console.log(this.topcountries)
                this.labels = this.dataset.map(x => x.url)
                this.values = this.dataset.map(x => x.pageViews)
                this.random_rgba(this.values.length)
                this.fillData()
			}
				
		},
		methods:{
            random_rgba(count) {
                var o = Math.round, r = Math.random, s = 255;                              
                for (var i = 0; i < count; i++) {
                    var red = o(r()*255)
                    var green = o(r()*255)
                    var blue = o(r()*255)
                    this.background.push('rgba(' + red + ',' + green + ',' + blue + ',' + .6 + ')');
                    this.border.push('rgba(' + red + ',' + green + ',' + blue + ',' + 1 + ')');
                }          
            },
            type(type){
                console.log(type)
                this.charttype = type
            },
			getdata(){
				NProgress.start();
				axios.get('analytics/topcountries',{params:{period:this.period}})
		        	.then((response) => {
		        		//this.topcountries = response.data
		        		console.log(response.data)
		        		NProgress.done();
		        	})
		        	.catch((error) => {
		        		//this.errors=error.response.data.errors
		        		NProgress.done();
		        	});
			},
			fillData(){
				this.datacollection = {
		          labels: this.labels,
		          datasets: [
		            {
		                label: 'Sessions',
		                data: this.values,
		                backgroundColor: this.background,
                        borderColor: this.border,
                        borderWidth: 1
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
		},
			
	};

</script>

<style type="text/css" Scoped>


</style>