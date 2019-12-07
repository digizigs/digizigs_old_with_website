<template>
	<div class="">

		<select name="" id="" v-model="page" class="wp-input" @change="selectedPage($event)">
			<option disabled value="">Select Facebook Page</option>
	   		<option v-for='page in pages' v-bind:value="page">{{page.page_name}}</option>
	   	</select>
		
		<div v-if='page' class="x_content card">
            <div class="dashboard-widget-content">

                <ul class="list-unstyled timeline widget">
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title p0">
	                        <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
	                    </h2>
                        <div class="byline">
                          <span>13 hours ago</span> by <a>Jane Smith</a>
                        </div>
                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title p0">
                                          <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                      </h2>
                        <div class="byline">
                          <span>13 hours ago</span> by <a>Jane Smith</a>
                        </div>
                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title  p0">
                                          <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                      </h2>
                        <div class="byline">
                          <span>13 hours ago</span> by <a>Jane Smith</a>
                        </div>
                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                        </p>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="block">
                      <div class="block_content">
                        <h2 class="title p0">
                                          <a>Who Needs Sundance When You’ve Got&nbsp;Crowdfunding?</a>
                                      </h2>
                        <div class="byline">
                          <span>13 hours ago</span> by <a>Jane Smith</a>
                        </div>
                        <p class="excerpt">Film festivals used to be do-or-die moments for movie makers. They were where you met the producers that could fund your project, and if the buyers liked your flick, they’d pay to Fast-forward and… <a>Read&nbsp;More</a>
                        </p>
                      </div>
                    </div>
                  </li>
                </ul>
            </div>
        </div>

	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				pages:[],
				page:{}
			}
		},
		watch:{

		},
		methods:{
			getToken(){
				/*axios.get('accesstoken')
				.then((response) => {
						console.log(response.data)
						
					})
				.catch((error) => console.log(error))*/

				const newWindow = openWindow('', 'message')
			},
			selectedPage(e){
				
				axios.get('facebook/'+this.page,this.page)
					.then((response) => {
					console.log(response.data)
				})
				.catch(error => this.errors=error.response.data.errors);
			}
			
		},
		created(){
			axios.get('facebook/create')
			.then((response) => {
					console.log(response.data)
					this.pages = response.data
					
				})
			.catch((error) => console.log(error))
			
		}
	};

</script>

<style type="text/css" Scoped>


</style>