<template>
	<section>

		<div class="x_panel">
          <div class="x_title">
            
            <span class="panel-title">
              <i class="fa fa-align-left"></i>
               Quotations <small></small> 
            </span>

          	

          	<a href="#newquotation" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
              <i class="fa fa-plus" aria-hidden="true"></i>New Quotation
            </a>

        	  

            <span class="x-title-option">
              <ul>
                <li>
                  <span id="x-title-search" class="title-searchs x-title-search c">
                      <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                      <input type="text" v-model="filter">
                      <span class="close-icon" @click="closesearch"><i class="fa fa-times" aria-hidden="true"></i></span>
                   </span>
                </li>
              </ul>
               
               
               
               
            </span>

          

          </div>

          <div class="x_content">

          	<div class="panel-group pannel-line-group" id="accordion">
			                        		                         
                <div v-for="(invoice,key) in invoices.data" class="panel panel-default pannel-line">

                    <div class="panel-heading" >
                      <i v-if="invoice.bill_status == 'paid'" class="fa fa-thumbs-up" aria-hidden="true"></i>
                      <i v-if="invoice.bill_status == 'pending'" class="fa fa-thumbs-down" aria-hidden="true"></i>	                        
                      <span class="title">{{invoice.client.client_name}}</span>                             
                      
                      
                        <!-- <span v-for="(item) in invoice.invoice_item" class="label label-info label-many" style="margin-right:5px;">
                          {{item.service['name']}}
                        </span> -->
                    

                     	<span class="label label-success">
                     		Total Bill:
                     		<i class="fa fa-inr" aria-hidden="true"></i>
                     		 <!-- {{invoice.invoice_item.reduce((a, c) => a + parseInt(c.service['charge']), 0)}} -->{{invoice.net_bill_amount}}
                     	</span>

                     	<span style="margin-left: 10px;"> creatred on </span> <span class="time">{{ invoice.created_at | vueDate }}</span>
						

                    	<span class="action-text subscription">
                    		<a href="#quotationview" class="disabled" data-toggle="modal" @click="invoiceview(invoice.id)" title="View Invoice">
                   	        <i class="fa fa-file-text" aria-hidden="true"></i>
                   	    </a>
                    		
                      	<a href="#editquotation" v-on:click.prevent data-toggle="modal" @click="invoiceedit(invoice.id)" title="Edit Invoice">
                          <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>

                        <a href="" v-on:click.prevent  @click="sendreminder(invoice.id)" title="Send Reminder">
                          <i class="fa fa-bell" aria-hidden="true"></i>
                        </a>

                      	<a href="" v-on:click.prevent @click="invoicedelete(invoice.id)" title="Delete Invoice">
                          <i class="fa fa-trash-o" aria-hidden="true"></i>
                        </a>    

                    	</span>
                      	<!-- Action icons -->                                    
                    </div>

                </div>

	
        	  </div>

            <vuepagination :input="invoices" @pagechange="paginationdata"></vuepagination>
            
        
        
          </div>
    </div>

		<div id="modal">

          <viewquotation  :regno="regno"
                          :gstno="gstno"
                          :qgst="gst" 
                          :client="client" 
                          :invoice="invoice" 
                          :items="items" 
                          :invc="invoicedetail" 
                        @recordupdated="refreshRecord">                
          </viewquotation>
          <editquotation  :qgst="gst" 
                          :qduedate="due_date"
                          :invc="invoicedetail" 
                          :clt="client"
                          :edtclient="client" 
                          :edtinvoice="invoice" 
                          :edtitems="items"  
                          @recordupdated="refreshRecord">
          </editquotation>
          <newquotation :qgst="gst" :qduedate="due_date":invc="invoicedetail" :clt="client" @recordupdated="refreshRecord"></newquotation>
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
        dt:'all',
				filter:'',
				invoices:{},			
				clientdetail:{},
				invoicedetail:{},
				success:'',
				errors:'',
				moment:moment,
				client:'',
        invoice:'',
        items:'',
        invoicetest:{}
			}
		},
		watch:{
      filter(){
        this.paginationdata()
      }

		},
    computed:{
      servicecount(){
      
      }
    },	
		methods:{
    	paginationdata(page){

        if (typeof page === 'undefined'){
        	page=1;
        } 
        axios.get('quotation/create?page=' + page,{params:{filter:this.filter}})       
          	.then((response) => {
              //console.log(response.data)
              this.invoices = response.data
            })
          	.catch(error => this.errors=error.response.data.errors);
    	},
     
  	  refreshRecord(record){
      	this.invoices=record.data;
    	},
      closesearch(){
        this.filter=''
      },
      paymenttoggle(id){

      },
      invoicedataview(data){
          
        this.dt = data
        this.filter = data
        //this.paginationdata()

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
    		axios.get('quotation/'+id)
        .then((response) => {
          this.invoicedetail=response.data;
          this.client = response.data.client
          this.invoice = response.data.invoice
          this.items = response.data.items
          //console.log(response.data);
          })//this.apntupdate = response.data
        .catch(error => this.errors=error.response.data.errors);
    	},
      invoiceedit(id){
        axios.get('quotation/'+id+'/edit')
        .then((response) => {
          this.invoicedetail=response.data;
          this.client = response.data.client
          this.invoice = response.data.invoice
          this.items = response.data.items
          //console.log(response.data);
          })//this.apntupdate = response.data
        .catch(error => this.errors=error.response.data.errors);
      },
      sendreminder(id){
        Console.log('Reminder')
      },
    	invoicedelete(id){
      	swalWithBootstrapButtons({
        	title: 'Delete Quotation?',
        	text: "You won't be able to revert this!",
        	type: 'warning',
        	showCancelButton: true,
        	confirmButtonText: 'Yes, delete it!',
        	cancelButtonText: 'No, cancel!',
        	reverseButtons: true
         }).then((result) => {
          if (result.value) {

            axios.delete('quotation/'+id)
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
                  title: 'Quotation deleted successfully'
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

.ui-pnotify-icon{

}

</style>