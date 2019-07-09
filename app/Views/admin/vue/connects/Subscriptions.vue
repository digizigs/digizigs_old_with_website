<template>
	<section>
		<div class="panel panel-dz dashboard-post-page-comment-indicator">
			<div class="panel-heading active">
				<span class="panel-title">
					<a data-toggle="collapse" href="#collapse1">
						Subscriptions <span v-if="loading == true">({{scount}})</span> 
					</a>
					<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
				</span>
				
			</div>
			<div id="collapse1" class="panel-collapse collapse in">
				<div class="panel-body open">

					<ul>
						<li v-for="subs in subscriptions.data">

							<i v-if="subs.status =='0'" class="fa fa-circle active" aria-hidden="true"></i>

							<i v-else class="fa fa-circle" aria-hidden="true"></i>

							<a href="" class="list-title">{{subs.email}}</a>
							<span class="time"><small>at  {{subs.created_at | vueAgoTime }}</small></span>

							<span class="action-text subscription">
	                            <a v-if="subs.status =='0'" href="" class="unsubscribe" v-on:click.prevent @click="subscribe(subs.id)">
	                             	Subscribe
	                            </a>

	                            <a v-else href="" class="subscribe" v-on:click.prevent @click="unsubscribe(subs.id)">
	                            	UnSubscribe
	                            </a>
	                               		                               
	                        </span>


						</li>
					</ul>
					
					<div class="pgn">
						<vuepagination :input="subscriptions" @pagechange="paginationdata" @count="subscount"></vuepagination>
					</div>


				</div>
			</div>
		</div>
    </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				subscriptions:{},
				scount:'',
				status:{'action':''},
				errors:'',
				prevpage:'',
				nextpage:'',
				loading:false,
			}
		},
		watch:{

		},
		methods:{
			paginationdata(page){
				console.log(this.loading)
				if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('subscription/create?page=' + page)
		          .then(response => {
		          	this.subscriptions = response.data
		          	this.loading = true
		          	console.log(this.loading)
		          })
		          .catch(error => this.errors=error.response.data.errors);
			},
			subscribe(id){
				NProgress.start();
				this.status.action = 'subscribe'
				axios.put('subscription/'+id,this.status)
	                .then((response) => {	                	         
	                    this.subscriptions = response.data;
	                    this.loading = true
	                    toast({
		                	type: 'success',
		                	title: 'Subscribed successfully '
		                	
		            	})
		            	NProgress.done();	                    
	                })
			},
			unsubscribe(id){
				NProgress.start();
				this.status.action = 'unsubscribe'
				axios.put('subscription/'+id,this.status)
	                .then((response) => {                   
	                    this.subscriptions = response.data;
	                    this.loading = true
	                    toast({
		                	type: 'success',
		                	title: 'Unsubscribed successfully '
		                	
		            	})
		            	NProgress.done();	                    
	                })
			},
			closesearch(){
				this.filter=''
			},
			subscount(record){
				console.log(record)
				this.scount = record
			}
		},
		mounted(){
			this.paginationdata()
		
		}
	};

</script>

<style lang="scss" Scoped>
	
	.action-text{

		.unsubscribe{
			color: #FF9600 !important;
			font-weight: 600 !important;
			font-size:11px;
		}
		.subscribe{
			color: #2B982B !important;
			font-weight: 600 !important;
			font-size:11px;
		}
	}

	.fa-circle{
		color: #2B982B !important;
		font-size: 10px;
	}
	.fa-circle.active{
		color: #FF9600 !important;
	}
</style>