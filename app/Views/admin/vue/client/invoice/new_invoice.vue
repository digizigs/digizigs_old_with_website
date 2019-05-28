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
							
							<div class="col-xs-12 col-md-12">
								<!-- CLient -->
								<div class="form-group wp-input form-invalid">
		                		 	<div class="col-sm-12 col-xs-12 col-md-12" v-bind:class="{ 'form-invalid': clienterror }">
			                            <i><small ><b></b></small></i>
			                            <label for="" >Select Client</label>
			                            <vue-single-select
										        name="maybe"
										        placeholder="Select Client"									     
										        v-model="invoice.client"									        
										        :options="clients"									        							        
										        option-label="client_name"
										></vue-single-select>
										<small><a href="#addclient" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i>New Client</a></small>	                            
			                            <div class="error-message" v-if="errors.client_name">
	                                        {{ errors.client_name[0] }}
	                                    </div>    
		                          	</div> 
			                    </div>

								<!-- Due Date -->
		                        <div class="form-group wp-input mt20">
		                          <div class="col-sm-12 col-xs-12 col-md-12">
		                            <label for="">Due Date</label>
		                            <datepicker v-model="invoice.duedate" :disabledDates="disabledDates" class="wp-input" :bootstrap-styling="false" :format="customFormatter"></datepicker>	                            
		                          </div> 
		                        </div>														

								<!-- Discount -->
	                            <div class="form-group wp-input mt20">
	                              <div class="col-sm-12 col-xs-12 col-md-12">
	                                <label for="">Discount(%)</label>
	                                <input class="form-control input-sm" type="number" v-model="invoice.discount"> 
	                                <span v-if="errors.client_email" :class="['label label-danger']">{{ errors.client_email[0] }}</span>                   
	                              </div> 
	                            </div>

								<!-- Services -->
	                            <div class="form-group wp-input mb10">
		                          	<div class="col-sm-12 col-xs-12 col-md-12">
			                            <label for="" style="margin-top: 10px;">Service</label>
			                            <vue-single-select
										        name="maybe"
										        placeholder="Select Service to add to service list"									     
										        v-model="selectedservices"									        
										        :options="services"									        							        
										        option-label="name"
										        v-on:change="onChange"										        
										>
											
										</vue-single-select>
										<a href="" v-on:click.prevent="addmoreitem" v-if="selectedservices !== null" class="add-new-item">
											<i class="fa fa-plus" aria-hidden="true"></i>
											Add another item
										</a>
			                            
		                          	</div>		                       
		                        </div>
	                        </div>

	                        <div class="col-xs-12 col-md-12">
	                        	<div class="service-line" v-if="serviceadded == true" style="margin-top: 20px;">
								<div class="col-sm-12 col-xs-12 col-md-12">
									<div class="">
							            <table class="table">
							                <thead>
							                  <tr class="headings">
							                  	<th class="column-title">Service </th>                    
							                    <th class="column-title">Description</th>						                  
							                    <th class="column-title">Price</th>
							                    <th class="column-title"></th>						                           
							                    <th class="bulk-actions" colspan="7">
							                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
							                    </th>
							                  </tr>
							                </thead>

							                <tbody>						                  
							                	<tr class="even pointer" v-for="service in servicelines">
								                  	<td class=" " style="">{{service['name']}}</td>
								                  	<td class=" " style="">{{service['description']}}</td>	                 
								                    <td class=" ">{{service['charge']}}</td>
								                    <td style="width: 1%;">
								                    	<a href="" v-on:click.prevent="removeservice(service['name'])">
						                          			<i class="fa fa-trash" aria-hidden="true"></i>
						                          		</a>
								                    </td>
							                  	</tr>

							                   	<tr class="even pointer" >
								                  	<th class="column-title">Sub-Total </th> 
								                  	<th class="column-title"> </th>                
								                    <th class="column-title"><i class="fa fa-inr" aria-hidden="true"></i>{{totalcharge}}</th>
								                    <th class="column-title"> </th>		
							                  	</tr>

							                  	<tr class="even pointer" >
								                  	<th class="column-title">Discount @ {{this.discount}}% </th> 
								                  	<th class="column-title"> </th>                
								                    <th class="column-title"><i class="fa fa-inr" aria-hidden="true"></i>{{totalcharge}}</th>
								                    <th class="column-title"> </th>		
							                  	</tr>
							                  
							                  	<tr class="even pointer" >
								                  	<th class="column-title">GST @ {{this.qgst}}% </th> 
								                  	<th class="column-title"> </th>                
								                    <th class="column-title"><i class="fa fa-inr" aria-hidden="true"></i>{{ctax}}</th>
								                    <th class="column-title"> </th>		
							                  	</tr>
							                 
							                  	<tr class="even pointer" >
								                  	<th class="column-title">Net Charge </th> 
								                  	<th class="column-title"> </th>                 
								                    <th class="column-title"><i class="fa fa-inr" aria-hidden="true"></i>{{ccharge}}</th>
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

						<div class="row">
							
						</div>

	                </div>
	            </div>
	        </div>
	    </div>
	    <div id="modal">
          <newclient @recordupdated="refreshRecord"></newclient>       
        </div>

	</section>
</template>

<script type="text/javascript">
	import Datepicker from 'vuejs-datepicker';


	export default{
		props:['qgst','qduedate'],
		components: {
		    Datepicker
		 },
		data(){
			return{	
				clienterror: false,			
				invoice:{
					//client
					//tax:null,
					//discount:null,
					//totalbill:null,
				},
				gst:this.qgst,
				discount:'0',
				invoice_item:{},
				multipleSelections:'',
				selected:'',
				value:[],
				clients:[],
				selectedclient:null,
				services:[],
				selectedservices:null,
				servicelines:[],
				serviceadded:false,
				success:'',
				errors:[],					
				billdate:new Date(),
				duedate:new Date().addDays(this.qduedate),				
				disabledDates: {			   
			    	days: [6, 0], // Disable Saturday's and Sunday's				    			    
				},
				error:''
			}
		},
		watch:{
			selectedservices:function(){
				//console.log(this.selectedservices)
				//this.selectedservices=null;
				if (this.selectedservices != null) {
    				this.servicelines.push(this.selectedservices);
    				//this.selectedservices=null;
    				this.serviceadded=true
    			}
    			  
			},
			servicelines:function(){
				//console.log('Item added')
				//this.selectedservices=null;
			},
			selectedclient:function(){
				if (this.selectedclient != null) {
					this.clienterror = false
				}
			}
		},
		computed: {
			totalcharge: function(){
			
    			return this.servicelines.reduce(function (total, service) { 
                	return total + Number(service['charge']);  					
            	}, 0);
    		},
    		ctax:function(){
    			return (this.totalcharge * this.qgst )/100;
    		},
    		cdiscount:function(){
    			return (this.totalcharge * this.discount )/100;
    		},
    		ccharge:function(){    			
    			return (this.totalcharge - this.cdiscount) + this.ctax ;
    		}
		},
		methods:{		
			refreshRecord(){

			},
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
    				this.invoice.services.push(this.selectedservices);
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

    			if(this.selectedclient == null){
    				this.clienterror = true
    				return
    			}


    			this.invoice.totalbill = this.totalcharge
    			NProgress.start();
    			axios.post('invoice',{ 'selectedclient':this.selectedclient,
    								   'dates':{'bill_date':moment(this.billdate).format('YYYY/MM/DD'),'due_date':moment(this.duedate).format('YYYY/MM/DD')},
    								   'selectedservices':this.servicelines,'invoice':this.invoice
    								})
	            .then(data => {
	                console.log(response.data)  
	              	this.$emit('recordupdated',data),
	              	this.success='Invoice Created successfully'
	              	this.selectedclient=null;
	              	this.selectedservices=null;
	              	this.servicelines=[];
	              	this.billdate = new Date();
	              	this.duedate = new Date().addDays(this.qduedate);
	              	this.serviceadded=false;
	              	this.clienterror = false;
	            	$('#newinvoice').modal('hide');
	            	
		            toast({
		                type: 'success',
		                title: 'Invoice Created successfully'
		            })
		            NProgress.done();

	          	})
	          	.catch((error) => {
	          		NProgress.done();
	          		this.errors=error.response.data.errors
	          		toast({
		                type: 'warning',
		                title: 'Error creatinng invoice'
		            })
	          	})
    		},
    		addTag (newTag) {
			    const tag = {
			        name: newTag,
			        id: newTag,
			    }
			    this.options.push(tag)
			    this.value.push(tag)
			},
		    updateSelected(){
		        console.log('@input')
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

<style lang="scss">

	.vdp-datepicker input{
		
			background-color: #fff !important;
			width: 100% !important;
			border-radius: 1px !important;
			font-size: 12px !important;
			height: 28px;
			border: 1px solid #aaa;
			margin-bottom: 5px !important;
			//border-bottom: 1px solid #aaa	 !important;
	}
	.single-select-wrapper{
		margin-bottom:0px !important;
		input{
			//border: none;
			//border-bottom: 1px solid #aaa	 !important;
			border-radius: 1px !important;
			border: 1px solid #ddd;
			box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.07);
			background-color: #fff;
			color: #32373c;
			outline: none;
			transition: 0.05s border-color ease-in-out;
			font-size: 12px;
		}
		input:focus{
			border-color: #5b9dd9;
		}
		label{
			margin-top: 10px;
		}
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

	.add-new-item{
		color: #1f91f3;
		font-weight: 500;
	}
	.error-message{
		margin-top:-5px;
	}
	/* .select2-container--default .select2-selection--single,
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


	 */
	 .mb10{
	 	margin-bottom: 10px;
	 }

	 .mt20{
	 	margin-top: -20px;
	 }
</style>