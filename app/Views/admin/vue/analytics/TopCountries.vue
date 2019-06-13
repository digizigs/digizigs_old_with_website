<template>
    <div class="mat-card">
        <div class="card-header">
            <h5>Top Countries</h5>
            <span>Hits from countries</span>

        </div>
        <div class="card-block">
            <canvas ref="chart"></canvas>
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
                background:[],
                border:[],
			}
		},
		watch:{
			data(){
                this.renderchart()
            }
		},
		computed:{
			
		},
		methods:{
            random_rgba(count) {
                var o = Math.round, r = Math.random, s = 255;                              
                for (var i = 0; i < count; i++) {
                    var red = o(r()*255);
                    var blue = o(r()*255);
                    var green = o(r()*255);
                    this.background.push('rgba(' + red + ',' + blue + ',' + green + ',' + .6 + ')');
                    this.border.push('rgba(' + red + ',' + blue + ',' + green + ',' + .8 + ')');
                }          
            },
            renderchart(){
                this.labels = this.data.map(x => x.country)
                this.values = this.data.map(x => x.sessions)
                this.random_rgba(this.values.length)

                var chart = this.$refs.chart;
                var ctx = chart.getContext("2d");
                var myChart = new Chart(ctx, {
                    type: 'horizontalBar',
                    data: {
                        labels: this.labels,
                        datasets: [{
                            label: 'Country',
                            data: this.values,
                            backgroundColor: this.background,
                            borderColor: this.border,
                            borderWidth: .5
                        }]
                    },
                    options: {
                        maintainAspectRatio: true,
                        legend: {
                            display: false,
                        },
                    }
                });
            }
		},
		mounted(){
            this.renderchart()
            

            
		
		
		}
	};

</script>

<style lang="scss" Scoped>
	

</style>