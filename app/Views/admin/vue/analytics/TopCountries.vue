<template>
	<div class="col-md-12 col-lg-4">
        <div class="mat-card">
            <div class="card-header">
                <h5>Top Browsers</h5>
                <span>Browser used to visit app</span>

            </div>
            <div class="card-block">
            	<canvas ref="chart"></canvas>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
	import Chart from 'chart.js';

	export default {
		props:['data'],
		data(){
			return{
				search:'',
				labels:[],
				values:[],
			}
		},
		watch:{
			data(){
				this.labels = this.data.map(x => x.country)
			}
		},
		computed:{
			
		},
		methods:{

			
		},
		mounted(){
			var chart = this.$refs.chart;
            var ctx = chart.getContext("2d");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
                    datasets: [{
                        label: '# of Votes',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
		
			//this.labels = this.data.map(x => x.country)
			//this.values = this.data.map(x => x.sessions)
		}
	};

</script>

<style lang="scss" Scoped>
	

</style>