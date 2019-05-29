<template>
	<section>
		<div class="x_panel">
          <div class="x_title">
          	<h2>
          	<i class="fa fa-align-left"></i>
          		Invoices <small></small> 
          	<span class="search">
					   <i class="fa fa-search"></i>
					   <div class="form-group wp-input">
				        <div class="form-line">
				            <input type="text" class="form-control input-sm" placeholder="Search here..." v-model="search">
				        </div>

				      </div>
				    </span>	
          	</h2>	                              	                 
        	<a href="#newinvoice" class="btn btn-dark btn-sm pull-right" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i>New Invoice</a>
        	<div class="clearfix"></div>

          </div>

          <div class="x_content">

          	<div class="panel-group pannel-line-group" id="accordion">
			                        		                         
                <div v-for="(invoice,key) in invoices.data" class="panel panel-default pannel-line">

                    <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">		                        
                      	<span class="title">{{invoice.client.client_name}}</span>                             
                      	<span v-for="(item) in invoice.invoice_item" class="label label-info label-many" style="margin-right:5px;">
                     		{{item.service['name']}}
                     	</span>

                     	<span class="label label-success">
                     		Total Bill:
                     		<i class="fa fa-inr" aria-hidden="true"></i>
                     		 <!-- {{invoice.invoice_item.reduce((a, c) => a + parseInt(c.service['charge']), 0)}} -->{{invoice.bill_amount}}
                     	</span>

                     	<span style="margin-left: 10px;"> creatred on </span> <span class="time">{{ invoice.created_at | vueDate }}</span> due on
                     	<span class="time">{{ invoice.due_date | vueDate }}</span> 
						
						          <span class="label label-warning">Pending</span>	

                      	<span class="action-text subscription">
                      		<a href="#invoiceview" class="disabled" data-toggle="modal" @click="invoiceview(invoice.id)">
                     	        <i class="fa fa-file-text" aria-hidden="true"></i>
                     	    </a>
                      		|
                        	<a href="#editclient" v-on:click.prevent data-toggle="modal" @click="detailclient(invoice.id)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        	|
                        	<a href="" v-on:click.prevent @click="invoicedelete(invoice.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>                             
                      	</span>
                      	<!-- Action icons -->                                    
                    </div>

                </div>

	
        	  </div>

        	
      		  <pagination :data="invoices" @pagination-change-page="paginationdata" ></pagination>


  			    <div v-if="invoices.total > 0">	          
              Showing {{invoices.from}} to {{invoices.to}} of total {{invoices.total}}              	                    	
            </div>

            <div v-else> No Data is avaliable</div>	
        
        
          </div>
    </div>
		<div id="modal">

          <invoiceview  :regno="regno"
                        :gstno="gstno"
                        :qgst="gst" 
                        :client="client" 
                        :invoice="invoice" 
                        :items="items" 
                        :invc="invoicedetail" 
                        @recordupdated="refreshRecord">                
          </invoiceview>
          <newinvoice :qgst="gst" :qduedate="due_date":invc="invoicedetail" :clt="client" @recordupdated="refreshRecord"></newinvoice>
         
        </div>
	</section>
</template>

<script type="text/javascript">
  	Vue.component('pagination', require('laravel-vue-pagination'));
	var moment = require('moment');

	export default{
    props:['regno','gstno','gst','due_date'],
		data(){
			return{
				search:'',
				invoices:{},			
				clientdetail:{},
				invoicedetail:{},
				success:'',
				errors:'',
				moment:moment,
				client:'',
        invoice:'',
        items:''
			}
		},
		watch:{

		},		
		methods:{
    	paginationdata(page){
        if (typeof page === 'undefined'){
        	page=1;
        } 
        axios.get('invoice/create?page=' + page)
          	.then(response => this.invoices = response.data)
          	.catch(error => this.errors=error.response.data.errors);
    	},
  	  refreshRecord(record){
      	this.invoices=record.data;
    	},
    	updateservice(id){
        axios.get('service/'+id+'/edit')
        .then((response) => {
          	//console.log(response.data)
          	this.serviceupdate=response.data
        })//this.apntupdate = response.data
        .catch(error => this.errors=error.response.data.errors);
    	},
    	detailclient(id){
    		axios.get('client/'+id+'/edit')
        .then((response) => {
          this.clientdetail=response.data;		          
          })//this.apntupdate = response.data
        .catch(error => this.errors=error.response.data.errors);
    	},
    	invoiceview(id){
    		axios.get('invoice/'+id)
        .then((response) => {
          this.invoicedetail=response.data;
          this.client = response.data.client
          this.invoice = response.data.invoice
          this.items = response.data.items
          //console.log(response.data);
          })//this.apntupdate = response.data
        .catch(error => this.errors=error.response.data.errors);
    	},
    	invoicedelete(id){
      	swalWithBootstrapButtons({
        	title: 'Delete Invoice?',
        	text: "You won't be able to revert this!",
        	type: 'warning',
        	showCancelButton: true,
        	confirmButtonText: 'Yes, delete it!',
        	cancelButtonText: 'No, cancel!',
        	reverseButtons: true
         }).then((result) => {
        if (result.value) {

          axios.delete('invoice/'+id)
          .then(response =>{
            this.invoices=response.data;
            this.success="Invoice Deleted Successfuly";

          })
          .catch((error) => {
            console.log(response.data);
                  this.errors=error.response.data.errors;
                  this.success='';                
            });

          toast({
                type: 'success',
                title: 'Invoice deleted successfully'
            })
        } 
        })
      }
		},
		created(){
			/*axios.get('invoice/create')
			.then((response) => {this.invoices=response.data})//this.appointments=response.data
			.catch((error) => this.errors = error)	*/
			this.paginationdata();		
		}
	};

</script>

<style type="text/css" Scoped>
	
.fa{
	margin-right:5px !important;
}
.fa-inr{
	margin-top: 3px !important;
}
</style>