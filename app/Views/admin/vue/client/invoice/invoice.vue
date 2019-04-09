<template>
	<section>
		<div class="x_panel">
          <div class="x_title">
            <span class="title"><i class="fa fa-cart-arrow-down"></i> Invoices </span><small>All Invoices</small>            
            <a href="#newinvoice" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
              <i class="fa fa-plus" aria-hidden="true"></i> 
              New Invoice
            </a>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                  	<th class="column-title">ID </th>                    
                    <th class="column-title">CLient </th>
                    <th class="column-title">Email </th>
                    <th class="column-title">Contact </th>
                    <th class="column-title">Service </th>
                    <th class="column-title">Billing</th>
                    <th class="column-title">Bill Date </th>
                    <th class="column-title">Due Date </th>    
                    <th class="column-title">Bill Status </th>
                    <th class="column-title">  </th>
	                <th class="column-title">  </th>                   
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr class="even pointer" v-for="(invoice,key) in invoices">
                  	<td class=" " style="width:2%;">{{invoice.id}}{{invoice.client['id']}}</td>                   
                    <td class=" ">
                    	<a href="#detailclient" data-toggle="modal" @click="detailclient(invoice.client['id'])">
                    		{{invoice.client['client_name']}}
                    	</a>
                    </td>
                    <td class=" ">{{invoice.client['client_email']}} </td>
                    <td class=" ">{{invoice.client['client_phone']}} </td>
                    <td class=" ">
                    	<span v-for="(item) in invoice.invoice_item" class="label label-info label-many" style="margin-right:5px;">
                    		{{item.service['name']}}
                    	</span>
                    </td>
                    <td class=" ">
                    	<i class="fa fa-inr" aria-hidden="true"></i>
                    	{{invoice.invoice_item.reduce((a, c) => a + parseInt(c.service['charge']), 0)}}
                    </td>
                    <td class="a-right a-right ">
                    	{{ invoice.created_at | vueDate }}
                    	
                    </td>
                    <td class="a-right a-right ">
                    	{{ invoice.due_date | vueDate }}
                    	
                    </td>
                    <td class="a-right a-right ">{{invoice.status}}</td>
                    <td style="width: 1%;">
	                    <a href="#editclient" class="disabled" data-toggle="modal" @click="updateclient(client.id)">
	                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	                    </a>
	                  </td>
	                  <td style="width: 1%;">
	                    <a href="#invoiceview" class="disabled" data-toggle="modal" @click="invoiceview(invoice.id)">
	                      <i class="fa fa-eye" aria-hidden="true"></i>
	                    </a>
	                  </td>
                    
                  </tr>
                  
                
                </tbody>
              </table>
          
              
            </div>
        
          </div>
    </div>
		<div id="modal">

         
          <detailclient :recrd="clientdetail" @recordupdated="refreshRecord"></detailclient>
          <invoiceview :invc="invoicedetail" :clt="client" @recordupdated="refreshRecord"></invoiceview>
          <newinvoice :invc="invoicedetail" :clt="client" @recordupdated="refreshRecord"></newinvoice>
         
        </div>
	</section>
</template>

<script type="text/javascript">
  	Vue.component('pagination', require('laravel-vue-pagination'));
	var moment = require('moment');

	export default{
		data(){
			return{
				invoices:[],			
				client:['asdadad'],
				clientdetail:{},
				invoicedetail:{},
				success:'',
				errors:'',
				moment:moment,
			}
		},
		watch:{

		},		
		methods:{
	      	paginationdata(page){
	        if (typeof page === 'undefined'){
	          page=1;
	        } 
	        axios.get('service/create?page=' + page)
	          .then(response => this.services = response.data)
	          .catch(error => this.errors=error.response.data.errors);

	      	},
		  	refreshRecord(record){
	        	this.services=record.data;
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
	      		axios.get('invoice/'+id+'/edit')
		        .then((response) => {
		          this.invoicedetail=response.data;
		          console.log(response.data);
		          })//this.apntupdate = response.data
		        .catch(error => this.errors=error.response.data.errors);
	      	},
	      	deleteservice(id){
	        swalWithBootstrapButtons({
	          title: 'Delete Service?',
	          text: "You won't be able to revert this!",
	          type: 'warning',
	          showCancelButton: true,
	          confirmButtonText: 'Yes, delete it!',
	          cancelButtonText: 'No, cancel!',
	          reverseButtons: true
	        }).then((result) => {
	          if (result.value) {

	            axios.delete('service/'+id)
	            .then(response =>{
	              this.services=response.data;
	              this.success="Service Deleted Successfuly";

	            })//this.categories=response.data
	            .catch((error) => {
	              console.log(response.data);
	                    this.errors=error.response.data.errors;
	                    this.success='';                
	              });

	            swalWithBootstrapButtons(
	              'Deleted!',
	              'Service deleted successfully',
	              'success'
	            )
	          } 
	        })
	      }
		},
		created(){
			axios.get('invoice/create')
			.then((response) => {this.invoices=response.data})//this.appointments=response.data
			.catch((error) => console.log(error))			
		}
	};

</script>

<style type="text/css" Scoped>


</style>