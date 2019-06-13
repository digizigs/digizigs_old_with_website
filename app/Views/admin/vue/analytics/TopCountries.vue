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
                        tooltips: {
                            mode: 'nearest'
                        },
                        animation: {
                            onComplete:function(animation){
                                var ctx = this.chart.ctx;
                                this.data.datasets.forEach(function (dataset) {
                                    for (var i = 0; i < dataset.data.length; i++) {
                                        for(var key in dataset._meta){
                                            var model = dataset._meta[key].data[i]._model;
                                            ctx.fillText(dataset.data[i], model.x+12, model.y+5);
                                        }
                                    }
                                });
                            },
                        }
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