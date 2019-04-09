<template>
	<section>
		<div class="modal fade" id="newinvoice" role="dialog"  data-backdrop="false">
	        <div class="modal-dialog modal-md">
	            <div class="modal-content">
	                <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">New Invoice</h4>
                        </div>

	                <div class="modal-body">
	                	
	                	<div class="row">

	                		<div class="form-group glow-input">
	                          <div class="col-sm-12 col-xs-12 col-md-12">
	                            <b><i><small>Select Client</small></i></b>
	                            <select name="" id="" class="form-control input-sm">
	                            	<option>-Select Client-</option>
	                            	<option v-for="client in clients.data" value="">{{client.client_name}}</option>	                            	
	                            </select>
	                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
	                          </div> 
	                        </div>

	                		<div class="form-group glow-input">
	                          <div class="col-sm-12 col-xs-12 col-md-6">
	                            <b><i><small>Invoice Date</small></i></b>
	                            <input class="form-control input-sm" type="date">
	                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
	                          </div> 
	                        </div>

	                        <div class="form-group glow-input">
	                          <div class="col-sm-12 col-xs-12 col-md-6">
	                            <b><i><small>Due Date</small></i></b>
	                            <input class="form-control input-sm" type="date">
	                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
	                          </div> 
	                        </div>

	                        <div class="form-group glow-input">
	                          	<div class="col-sm-12 col-xs-12 col-md-12">
		                            <b><i><small>Due Date</small></i></b>
		                            <vue-single-select
									        name="maybe"
									        placeholder="pick a post"									     
									        v-model="post"									        
									        :options="posts"									        							        
									        option-label="title"
									></vue-single-select>
		                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
	                          	</div> 
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
				clients:{},
				success:'',
				errors:'',
				list:[{name: 'item1'}, {name: 'item2'}, {name: 'item3'}],
				post:'',
				posts: [{title: "ok dude", id: 1}, {title: "awesome dude", id: 2}]
			}
		},
		watch:{

		},
		methods:{
			validateSelection(){

			},
			getDropdownValues(){

			}
		},
		created(){
			axios.get('invoice/allclient')
			.then((response) => {
				console.log(response.data);			
				this.clients=response.data
			})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>



</style>