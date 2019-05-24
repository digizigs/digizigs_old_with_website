<template>
	<section>
		<div class="">          
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
            		<div class="x_panel">
            			<div class="x_title">	                   
		                    <h2>
		                    	<i class="fa fa-align-left"></i> Subscriptions <small></small>
		                    	<span class="search">
		                  			<i class="fa fa-search"></i>
		                  			<div class="form-group">
	                                    <div class="form-line">
	                                        <input type="text" class="form-control" placeholder="Search here...">

	                                    </div>

	                                </div>
	                            </span>	
		                    </h2>
		                    <div class="clearfix"></div>
		                </div>

		                <div class="x_content">
		                	<div class="panel-group pannel-line-group" id="accordion">
		                        		                         
		                        <div v-for="subs in subscriptions.data" class="panel panel-default pannel-line">
		                            <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">
		                            
		                              <span class="title">{{subs.email}}</span>                             
		                              <span class="time">at  {{subs.created_at | vueAgoTime }}</span>
				
		                              <span class="action-text subscription">
		                                <a v-if="subs.status =='0'" href="" class="unsubscribe" v-on:click.prevent @click="subscribe(subs.id)">
		                                 	Subscribe
		                                </a>

		                                <a v-else href="" class="subscribe" v-on:click.prevent @click="unsubscribe(subs.id)">
		                                	UnSubscribe
		                                </a>
		                                   		                               
		                              </span>
		                                                                
		                            </div>                            
		                        </div>		                         		                         
		                    </div>

		                    <pagination :data="subscriptions" @pagination-change-page="paginationdata" ></pagination>
		                    <div>		                    	
		                    	Showing {{subscriptions.from}} to {{subscriptions.to}} of total {{subscriptions.total}}	                    	
		                    </div>		                                     
		                </div>
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
				subscriptions:{},
				status:{'action':''},
				errors:'',
				prevpage:'',
				nextpage:''
			}
		},
		watch:{

		},
		methods:{
			paginationdata(page){
				if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('subscription/create?page=' + page)
		          .then(response => {
		          	this.subscriptions = response.data
		          })
		          .catch(error => this.errors=error.response.data.errors);
			},
			subscribe(id){
				NProgress.start();
				this.status.action = 'subscribe'
				axios.put('subscription/'+id,this.status)
	                .then((response) => {	                	         
	                    this.subscriptions = response.data;
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
	                    toast({
		                	type: 'success',
		                	title: 'Unsubscribed successfully '
		                	
		            	})
		            	NProgress.done();	                    
	                })
			}
		},
		mounted(){
			axios.get('subscription/create')
                .then((response) => {                    
                    this.subscriptions = response.data;                    
                })
                .catch(error => this.errors=error.response.data.errors);
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>