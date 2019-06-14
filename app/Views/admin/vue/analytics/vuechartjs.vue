
<script>
	
import { Line } from 'vue-chartjs';
import { Bar } from 'vue-chartjs';


export default {
  	extends: Bar,
	data(){
	    return{
	    	chartdata: {
		      labels: ['a', 'b', 'c', 'd', 'e'],
		      datasets: [
		        {
		          label: 'Data One',
		          backgroundColor: '#f87979',
		          data: [40, 30,60,150,10]
		        }
		      ]
		    },
		    options: {
		      responsive: true,
		      maintainAspectRatio: false
		    }
	    }
	},
	watch: {
		chartData () {
		    this.$data._chart.update()
		}
	},
	mounted () {
	    this.renderChart(this.chartdata, this.options)
	}
};

</script>