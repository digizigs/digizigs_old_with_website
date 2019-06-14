<template>
    <div class="mat-card">
        <div class="card-header">
            <h5>Top Countries</h5>
            <span>Hits from countries</span>

        </div>
        <div id="blockchart" class="card-block">
            <canvas ref="chart"></canvas>
            <button @click="adddata">add data</button>
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
                
                this.renderchart();
            }
		},
		computed:{
			
		},
		methods:{
            adddata(){
               
                console.log('Add Data')
              
            },
            random_rgba(count) {
                var o = Math.round, r = Math.random, s = 255;                              
                for (var i = 0; i < count; i++) {
                    this.background.push('rgba(' + o(r()*255) + ',' + o(r()*255) + ',' + o(r()*255) + ',' + .6 + ')');
                    this.border.push('rgba(' + o(r()*255) + ',' + o(r()*255) + ',' + o(r()*255) + ',' + .8 + ')');
                }          
            },
            renderchart(){
                this.labels = this.data.map(x => x.country)
                this.values = this.data.map(x => x.sessions)
                this.random_rgba(this.values.length)

                var ctx = this.$refs.chart.getContext("2d");
                var myChart = new Chart(ctx, {
                    type: 'bar',
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
                        legend: {
                            display: false,
                        },
                    }
                });

                //myChart.update()
            }
		},
		mounted(){
            this.renderchart()
		}
	};

</script>

<style lang="scss" Scoped>
	

</style>