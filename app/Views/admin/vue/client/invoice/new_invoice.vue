<template>
	<section>
		<div class="modal fade" id="newinvoice" role="dialog"  data-backdrop="false">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" @click="clearmodal"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel">New Invoice</h4>
                        </div>

	                <div class="modal-body">
	                	
	                	<div class="row">
							
							<!-- Client selection -->
	                		<div class="box-container">
	                			<h4 class="box-title">Select Client</h4>
		                        <div class="form-group glow-input">
		                          	<div class="col-sm-12 col-xs-12 col-md-12">
			                            <i><small>Select Client</small></i>
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
							

							<!-- Bill and Due Dates -->
							<div class="box-container">
								<h4 class="box-title">Billing Dates</h4>
	                			<div class="form-group glow-input">
		                          <div class="col-sm-12 col-xs-12 col-md-6">
		                            <i><small>Bill Date</small></i>
		                            <datepicker v-model="billdate" :disabledDates="disabledDates" class="" :bootstrap-styling="true" :format="customFormatter"></datepicker>
		                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
		                          </div> 
		                        </div>

		                        <div class="form-group glow-input">
		                          <div class="col-sm-12 col-xs-12 col-md-6">
		                            <i><small>Due Date</small></i>
		                            <datepicker v-model="duedate" :disabledDates="disabledDates" class="" :bootstrap-styling="true" :format="customFormatter"></datepicker>
		                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
		                          </div> 
		                        </div>
	                		</div>
	                		
							
							<!-- Tax and discounts -->
							<div class="box-container">
								<h4 class="box-title">Tax and Discounts</h4>
								<div class="form-group glow-input">
                                  <div class="col-sm-12 col-xs-12 col-md-6">
                                    <b><i><small>Tax</small></i></b>
                                    <input class="form-control input-sm" type="number" :value="tax"> 
                                    <span v-if="errors.client_email" :class="['label label-danger']">{{ errors.client_email[0] }}</span>                   
                                  </div> 
                                </div>

                                <div class="form-group glow-input">
                                  <div class="col-sm-12 col-xs-12 col-md-6">
                                    <b><i><small>Discount</small></i></b>
                                    <input class="form-control input-sm" type="number" :value="discount"> 
                                    <span v-if="errors.client_email" :class="['label label-danger']">{{ errors.client_email[0] }}</span>                   
                                  </div> 
                                </div>
							</div>


							<!-- Service Selector -->	
	                        <div class="box-container">
	                        	<h4 class="box-title">Services</h4>
		                        <div class="form-group glow-input">
		                          	<div class="col-sm-12 col-xs-12 col-md-6">
			                            <i><small>Select Service</small></i>
			                            <vue-single-select
										        name="maybe"
										        placeholder="Select Service to add to service list"									     
										        v-model="selectedservices"									        
										        :options="services"									        							        
										        option-label="name"
										        v-on:change="onChange"										        
										>
											
										</vue-single-select>
										<a href="" v-on:click.prevent="addmoreitem" v-if="selectedservices !== null">Add another item</a>
			                            <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>
		                          	</div>		                       
		                        </div>
	                		</div>
							
							
							

							<div class="box-container" v-if="serviceadded == true">
								<div class="col-sm-12 col-xs-12 col-md-12">
									<div class="table-responsive">
							            <table class="table table-striped jambo_table">
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
							                    <td style="width: 1%;">
							                    	<a href="" v-on:click.prevent="removeservice(service['name'])">
					                          			<i class="fa fa-trash" aria-hidden="true"></i>
					                          		</a>
							                    </td>
							                  </tr>
							                  <tr class="even pointer" >
							                  	<th class="column-title">Subtotal </th>                    
							                    <th class="column-title"> </th>
							                    <th class="column-title"><i class="fa fa-inr" aria-hidden="true"></i>{{totalcharge}}</th>
							                    <th class="column-title"> </th>		
							                  </tr>
							                  <tr class="even pointer" >
							                  	<th class="column-title">Tax (6%) </th>                    
							                    <th class="column-title"> </th>
							                    <th class="column-title"><i class="fa fa-inr" aria-hidden="true"></i>1010</th>
							                    <th class="column-title"> </th>		
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
						        
						        <a href="" class="btn btn-dark btn-sm pull-right" v-on:click.prevent="createinvoice">Create Invoice</a>
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
				selectedclient:null,
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
				},
				tax:6,
				discount:0
			}
		},
		watch:{
			selectedservices:function(){
				if (this.selectedservices != null) {
    				this.servicelines.push(this.selectedservices);
    				//this.selectedservices=null;
    				this.serviceadded=true
    			}
    			  
			},
			servicelines:function(){
				//console.log('Item added')
				//this.selectedservices=null;
			}
		},
		computed: {
			totalcharge: function(){    			
    			return this.servicelines.reduce(function (total, service) {
                	return total + Number(service['charge']);  					
            	}, 0);
    		}
		},
		methods:{
			myChangeEvent(val){
            	console.log(val);
	        },
	        mySelectEvent({id, text}){
	            console.log({id, text})
	        },
			validateSelection(){ },
			getDropdownValues(){ },
			customFormatter(date) {
      			return moment(date).format('Do MMM YYYY');
    		},
    		onChange(){
    			console.log('On change');
    		},
    		addmoreitem(){
    			this.selectedservices=null;
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
    			this.selectedclient=null;
	            this.selectedservices=null;
	            this.billdate='';
	            this.duedate='';
    		},
    		createinvoice:function(){
    			axios.post('invoice',{ 'selectedclient':this.selectedclient,
    								   'dates':{'bill_date':moment(this.billdate).format('YYYY/MM/DD'),'due_date':moment(this.duedate).format('YYYY/MM/DD')},
    								   'selectedservices':this.servicelines
    								})
	            .then(data => {
	              	//console.log(data);
	              	//this.services=response.data           
	              	this.$emit('recordupdated',data),
	              	this.success='Invoice Created successfully'
	              	this.selectedclient=null;
	              	this.selectedservices=null;
	              	this.servicelines=[];
	              	this.billdate='';
	              	this.duedate='';
	              	this.serviceadded=false;
	            	$('#newinvoice').modal('hide');
	            	
		            toast({
		                type: 'success',
		                title: 'Invoice Created successfully'
		            })

	          	})
	          	.catch((error) => this.errors=error)//this.errors=error
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
		width: 245% !important;
		border-radius: 1px !important;
		font-size: 12px !important;
		height: 28px;
}

.box-container{
	

}
.box-title{
	font-size: 14px;
	font-weight: 550 ;
	padding: 5px 10px;
	margin: 0;
	border: 1px solid grey;
}

.select2-container--default .select2-selection--single,
.select2-container--default .select2-selection--multiple {
    background-color: #fff;
    border: 1px solid #ccc !important;
    border-radius: 0;
    min-height: 30px
}
.select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #000;
    padding-top: 3px
}
.select2-container--default .select2-selection--multiple .select2-selection__rendered {
    padding-top: 3px
}
.select2-container--default .select2-selection--single .select2-selection__arrow {
    height: 30px
}
.select2-container--default .select2-selection--multiple .select2-selection__choice,
.select2-container--default .select2-selection--multiple .select2-selection__clear {
    margin-top: 2px;
    border: none;
    border-radius: 0;
    padding: 3px 5px
}
.select2-container--default.select2-container--focus .select2-selection--multiple {
    border: 1px solid #ccc
}

.select2-selection__choice{
	background-color: #3F5367 !important;
	color: #fff;
	border-radius: 3px !important;
	-webkit-tap-highlight-color: transparent;
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16),0 2px 10px 0 rgba(0,0,0,0.12);
    letter-spacing: .5px;
    transition: .2s ease-out;
}
.select2-container{
	border-radius: 1px solid #fff !important;
}

</style>