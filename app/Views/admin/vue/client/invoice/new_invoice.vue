<template>
	<section>
		<div class="modal fade" id="newinvoice" role="dialog"  data-backdrop="false">
	        <div class="modal-dialog modal-md">
	            <div class="modal-content">
	                <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" @click="clearmodal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">New Invoice</h4>
                        </div>

	                <div class="modal-body">
	                	
	                	<div class="row">

	                		<div class="box-container">
	                				                		

		                        <div class="form-group glow-input">
		                          	<div class="col-sm-12 col-xs-12 col-md-12">
			                            <b><i><small>Select Client</small></i></b>
			                            <vue-single-select
										        name="maybe"
										        placeholder="Select Client"									     
										        v-model="selectedclient"									        
										        :options="clients"									        							        
										        option-label="client_name"
										></vue-single-select>
			                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
		                          	</div> 
		                        </div>

		                		
	                		</div>
							
							<div class="box-container">
	                			

	                			<div class="form-group glow-input">
		                          <div class="col-sm-12 col-xs-12 col-md-6">
		                            <b><i><small>Due Date</small></i></b>
		                            <datepicker v-model="billdate" :disabledDates="disabledDates" class="" :bootstrap-styling="true" :format="customFormatter"></datepicker>
		                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
		                          </div> 
		                        </div>

		                        <div class="form-group glow-input">
		                          <div class="col-sm-12 col-xs-12 col-md-6">
		                            <b><i><small>Due Date</small></i></b>
		                            <datepicker v-model="duedate" :disabledDates="disabledDates" class="" :bootstrap-styling="true" ></datepicker>
		                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
		                          </div> 
		                        </div>

	                		</div>
	                		

	                        <div class="box-container">
	                				                		

		                        <div class="form-group glow-input">
		                          	<div class="col-sm-10 col-xs-10 col-md-10">
			                            <b><i><small>Select Service</small></i></b>
			                            <vue-single-select
										        name="maybe"
										        placeholder="Select Service"									     
										        v-model="selectedservices"									        
										        :options="services"									        							        
										        option-label="name"
										></vue-single-select>
			                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>			                            
		                          	</div>
		                       
		                          	<div class="col-sm-1 col-xs-1 col-md-1" style="padding:20px; font-size:18px;" v-if="selectedservices !== null">
		                          		<a href="" v-on:click.prevent="addservice" style="margin:0;" class="">
		                          			<i class="fa fa-plus" aria-hidden="true"></i>
		                          		</a>
		                          	</div> 
		                        </div>

								
		                		
	                		</div>
							
							
							<div class="box-container" v-if="serviceadded == true">
								<div class="col-sm-12 col-xs-12 col-md-12">
								<div class="table-responsive">
						            <table class="table table-striped">
						                <thead>
						                  <tr class="headings">
						                  	<th class="column-title">Service </th>                    
						                    <th class="column-title">Description </th>
						                    <th class="column-title">Charge </th>
						                    <th class="column-title"></th>						                           
						                    <th class="bulk-actions" colspan="7">
						                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
						                    </th>
						                  </tr>
						                </thead>

						                <tbody>						                  
						                  <tr class="even pointer" v-for="service in servicelines">
						                  	<td class=" " style="">{{service['name']}}</td>                   
						                    <td class=" ">{{service['description']}}</td>
						                    <td class=" ">{{service['charge']}}</td>
						                    <td>
						                    	<a href="" v-on:click.prevent="removeservice(service['name'])">
				                          			<i class="fa fa-trash" aria-hidden="true"></i>
				                          		</a>
						                    </td>
						                  </tr>
						                  <tr class="even pointer" >
						                  	<th class="column-title">Total Charge </th>                    
						                    <th class="column-title"> </th>
						                    <th class="column-title"><i class="fa fa-inr" aria-hidden="true"></i>{{totalcharge}}</th>
						                    <th class="column-title"> </th>		
						                  </tr>						                  						  
						                </tbody>
						            </table>             
						        </div>
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
	import Datepicker from 'vuejs-datepicker';
	
	export default{
		components: {
		    Datepicker
		 },
		data(){
			return{
				clients:[],
				selectedclient:[],
				services:[],
				selectedservices:null,
				servicelines:[],
				serviceadded:false,
				success:'',
				errors:'',					
				billdate:'',
				duedate:'',
				disabledDates: {			   
			    	days: [6, 0], // Disable Saturday's and Sunday's				    			    
				}
			}
		},
		watch:{

		},
		computed: {
			totalcharge: function(){    			
    			return this.servicelines.reduce(function (total, service) {
                	return total + Number(service['charge']);  					
            	}, 0);
    		}
		},
		methods:{
			validateSelection(){ },
			getDropdownValues(){ },
			customFormatter(date) {
      			return moment(date).format('MMMM Do YYYY');
    		},
    		addservice(){
    			if (this.selectedservices != null) {
    				this.servicelines.push(this.selectedservices);
    				this.selectedservices=null;
    				this.serviceadded=true
    			}              	   			
    		},
    		removeservice(id){this. servicelines.splice(id, 1)},
    		clearmodal(){
    			this.servicelines=[];
    			this.serviceadded=false
    		}
    		
		},
		created(){
			axios.get('invoice/allclient')
			.then((response) => {this.clients=response.data})
			.catch((error) => console.log(error))

			axios.get('invoice/allservice')
			.then((response) => {this.services=response.data})
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>

.vdp-datepicker input{
	
		background-color: #fff !important;
		width: 160% !important;
		border-radius: 1px !important;
		font-size: 12px !important;
		height: 28px;
}

.box-containers{
	margin-bottom: 40px;

}
.box-containers .box-title{
	//padding: 10px;
}
</style>