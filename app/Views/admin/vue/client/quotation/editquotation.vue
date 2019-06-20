<template>
	<section>
		<div class="modal fade modal-right-slide" id="editquotation" role="dialog"  data-backdrop="false">
	        <div class="modal-dialog modal-lg">
	            <div class="modal-content">
	                <div class="modal-header">
                    	<button type="button" class="close" data-dismiss="modal" @click="clearmodal"><span aria-hidden="true">×</span>
                      	</button>
                      	<h4 class="modal-title" id="myModalLabel">Edit Quotation</h4>
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
										        v-model="client"									        
										        :options="ClientList"     
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
		                          <div class="col-sm-12 col-xs-12 col-md-6">
		                            <label for="">Due Date</label>
		                            <datepicker v-model="edtinvoice.due_date" :disabledDates="disabledDates" class="wp-input" :bootstrap-styling="false" :format="customFormatter"></datepicker>	                            
		                          </div> 
		                        </div>														

								<!-- Discount -->
	                            <div class="form-group wp-input mt20">
	                              <div class="col-sm-12 col-xs-12 col-md-6">
	                                <label for="">Discount(%)</label>
	                                <input class="form-control input-sm" type="number" v-model="discount"> 
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
										        v-model="service"									        
										        :options="servicelist"     
										        option-label="name"
										       								        
										>
											
										</vue-single-select>
										<a href="" v-on:click.prevent="addmoreitem" v-if="service !== null" class="add-new-item">
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
							                    <th class="column-title">Price (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
							                    <th class="column-title"></th>							                    
							                  </tr>
							                </thead>

							                <tbody>						                  
							                	<tr class="table-data" v-for="service in edtitems">
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
								                    <th class="column-title">{{subtotal}}</th>
								                    <th class="column-title"> </th>		
							                  	</tr>

							                  	<tr class="even pointer" >
								                  	<th class="column-title">Discount @ {{this.discount}}% </th> 
								                  	<th class="column-title"> </th>                
								                    <th class="column-title">{{cdiscount}}</th>
								                    <th class="column-title"> </th>		
							                  	</tr>
							                  
							                  	<tr class="even pointer" >
								                  	<th class="column-title">GST @ {{this.qgst}}% </th> 
								                  	<th class="column-title"> </th>                
								                    <th class="column-title">{{ctax}}</th>
								                    <th class="column-title"> </th>		
							                  	</tr>
							                 
							                  	<tr class="even pointer" >
								                  	<th class="column-title">Net Charge </th> 
								                  	<th class="column-title"> </th>                 
								                    <th class="column-title">{{ccharge}}</th>
								                    <th class="column-title"> </th>		
							                  	</tr>								                  						  
							                </tbody>
							            </table>             
							        </div>
						        </div>
						        
						        <a href="" class="btn btn-dark btn-sm pull-right" v-on:click.prevent="createinvoice">Update Quotation</a>
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
		props:['edtinvoice','edtclient','edtitems','qgst'],
		components: {
		    Datepicker
		 },
		data(){
			return{	
				clienterror: false,			
				invoice:{
					client:null,
					discount:0,
					tax:0,
					totalbill:0,
					netbill:0,
					billdate:moment(new Date()).format('YYYY/MM/DD'),
					duedate:moment(new Date().addDays(this.qduedate)).format('YYYY/MM/DD'),
					services:[]
				},			
				tax:this.qgst,
				discount:0,
				client:null,
				service:null,
				duedate:moment(new Date().addDays(this.qduedate)).format('YYYY/MM/DD'),
				ClientList:[],
				servicelist:[],
				serviceitem:{},
				serviceadded:true,		
				disabledDates: {			   
			    	days: [6, 0], // Disable Saturday's and Sunday's				    			    
				},
				errors:''
			}
		},
		watch:{
			edtinvoice(){
				this.client = this.edtclient
				this.discount = (this.edtinvoice.discount / this.edtinvoice.bill_amount) * 100
				this.duedate = this.edtinvoice.due_date
				this.invoice.services = this.edtitems		
			},
			client(){
				if (this.client != null) {
					this.invoice.client = this.client
					this.clienterror = false
				}
			},
			service(){
				if (this.service != null) {

					this.serviceitem.service_id = this.service.id
					this.serviceitem.name = this.service.name
					this.serviceitem.description = this.service.description
					this.serviceitem.charge = this.service.charge
					this.serviceitem.tax = this.service.tax


    				this.invoice.services.push(this.serviceitem);
    				this.serviceadded=true
    			}
			},
			duedate(){
				this.invoice.duedate = moment(this.duedate).format('YYYY/MM/DD')
			},
			selectedservices(){
				if (this.selectedservices != null) {
    				
    			}	  
			},			
			subtotal(){
				this.invoice.totalbill = this.subtotal
			},
			cdiscount(){
				this.invoice.discount = this.cdiscount
			},
			ctax(){
				this.invoice.tax = this.ctax
			},
			ccharge(){
				this.invoice.netbill = this.ccharge
			}

		},
		computed: {
			subtotal(){
				if(this.edtitems !== ''){
					return this.edtitems.reduce(function (total, item) { 
	                	return total + Number(item.charge);  					
	            	}, 0);
	            }
			},
    		ctax:function(){
    			return ((this.subtotal - this.cdiscount) * this.qgst )/100;
    		},
    		cdiscount:function(){
    			return (this.subtotal * this.discount )/100;
    		},
    		ccharge:function(){    			
    			return (this.subtotal - this.cdiscount) + this.ctax ;
    		}
		},
		methods:{		
			refreshRecord(){

			},
			customFormatter(date) {
      			return moment(date).format('YYYY/MM/DD');
    		},
    		addmoreitem(){
    			this.service=null;
    		},
    		addservice(){
    			/*if (this.selectedservices != null) {
    				this.invoice.services.push(this.selectedservices);
    				this.selectedservices=null;
    				this.serviceadded=true
    			}  */            	   			
    		},
    		removeservice(id){this.invoice.services.splice(id, 1)},
    		clearmodal(){
    			this.invoice.services = [];
              	//this.serviceadded=false;
              	this.client = null;
              	this.service = null;
              	this.duedate = moment(new Date().addDays(this.qduedate));
              	this.discount = 0;
    		},
    		createinvoice:function(){

    			if(this.client == null){
    				this.clienterror = true
    				return
    			}
  				
    			NProgress.start();
    			//console.log(this.invoice)
    			axios.put('quotation/'+this.edtinvoice.id,this.invoice)
		            .then(data => {
		              	this.$emit('recordupdated',data);
		              	this.invoice.services = [];		              	
		              	this.client = null;
		              	this.service = null;
		              	this.duedate = moment(new Date().addDays(this.qduedate));
		              	this.discount = 0;
		            	$('#editquotation').modal('hide');
		            	
			            toast({
			                type: 'success',
			                title: 'Quotation Updated successfully'
			            })
			            NProgress.done();

		          	})
		          	.catch((error) => {
		          		NProgress.done();
		          		this.errors=error.response.data//.errors
		          		console.log(error.response.data)
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
			.then((response) => {this.ClientList=response.data})
			.catch((error) => console.log(error))

			axios.get('invoice/allservice')
			.then((response) => {this.servicelist=response.data})
			.catch((error) => console.log(error))

			var totalbill = this.edtinvoice.bill_amount
    		var dis = this.edtinvoice.discount
    		var per = (dis / totalbill) * 100
    		this.discount = per
		}
	};

</script>

<style lan="scss">
	.fa-inr{
		margin-left: 5px;
	}
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
	.table-data{
		color: #1f91f3;
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

	 .modal-body{
	 	background-color: #fff !important;
	 }
</style>