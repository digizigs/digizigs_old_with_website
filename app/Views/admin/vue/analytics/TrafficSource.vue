<template>
    <div class="mat-card">
        <div class="card-header">
            <h5>Overall Traffic</h5>
            <span> Traffic source from origin</span>

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
                device:[],
                source:[],
                sessions:[],
                pageviews:[],
                duration:[]
			}
		},
		watch:{
			
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
            }
			
		},
		mounted(){

            this.device = this.data.map(x => x[0])
            this.sessions = this.data.map(x => x[2])
            this.pageviews = this.data.map(x => x[3])
            this.duration = this.data.map(x => x[4] / 60)
            this.random_rgba(this.device.length)

			var chart = this.$refs.chart;
            var ctx = chart.getContext("2d");
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: this.device,
                    datasets: [{
                        label: 'Sessions',
                        data: this.sessions,
                        backgroundColor: this.background,
                        borderColor: this.border,
                        borderWidth: .5
                    },
                    {
                        label: 'Pageviews',
                        data: this.pageviews,
                        type: 'line',
                        borderColor: this.border,
                        borderWidth: .5
                    },
                    {
                        label: 'Duration',
                        data: this.duration,
                        type: 'line',
                        borderColor: this.border,
                        borderWidth: .5
                    }]
                },
                options: {
                    maintainAspectRatio: true,
                    animation: {
                        onComplete:function(animation){
                        },
                    }
                }
            });

            
		
		
		}
	};

</script>

<style lang="scss" Scoped>
	

</style>