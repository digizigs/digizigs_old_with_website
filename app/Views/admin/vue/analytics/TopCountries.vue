<template>
    <div class="mat-card">
        <div class="card-header">
            <h5>Top Browsers</h5>
            <span>Browser used to visit app</span>

        </div>
        <div class="card-block">
            <canvas ref="chart"></canvas>
        </div>
    </div>
</template>

<script type="text/javascript">
	import Chart from 'chart.js';

	export default {
		props:['data','charttype'],
		data(){
			return{
				search:'',
				labels:["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
				values:[12, 19, 3, 5, 2, 3],
                background:[],
                border:[],
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
            getRandomColor() {
                var letters = '0123456789ABCDEF'.split('');
                var color = '#';
                for (var i = 0; i < 6; i++) {
                    color += letters[Math.floor(Math.random() * 16)];
                }
                return color;
            },
            getRandomColorEach(count) {
                var data =[];
                for (var i = 0; i < count; i++) {
                    data.push(this.getRandomColor());
                }
                return data;
            },
            random_rgba(count) {
                var o = Math.round, r = Math.random, s = 255;
               
                
                //var g = ;
                //var b = ;
                //var a = ;

                
                for (var i = 0; i < count; i++) {
                    console.log(i + '-' + red + ',' + blue + ',' + green)
                    var red = o(r()*255);
                    var blue = o(r()*255);
                    var green = o(r()*255);
                    this.background.push('rgba(' + red + ',' + blue + ',' + green + ',' + .5 + ')');
                    this.border.push('rgba(' + red + ',' + blue + ',' + green + ',' + .8 + ')');
                }
          

            }
			
		},
		mounted(){

            this.random_rgba(this.values.length)
            this.labels = this.data.map(x => x.country)
            this.values = this.data.map(x => x.sessions)


			var chart = this.$refs.chart;
            var ctx = chart.getContext("2d");
            var myChart = new Chart(ctx, {
                type: this.charttype,
                data: {
                    labels: this.labels,
                    datasets: [{
                        label: 'Country',
                        data: this.values,
                        backgroundColor: this.background,
                        borderColor: this.border,
                        borderWidth: 1
                    }]
                },
                options: {
                    
                }
            });

            
		
		
		}
	};

</script>

<style lang="scss" Scoped>
	

</style>