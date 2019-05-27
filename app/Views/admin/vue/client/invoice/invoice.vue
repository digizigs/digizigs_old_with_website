<template>
	<section>
		<div class="x_panel">
          <div class="x_title">
          	<h2>
          		<i class="fa fa-align-left"></i>
          		Clients <small></small> 
          		<span class="search">
					<i class="fa fa-search"></i>
					<div class="form-group">
				        <div class="form-line">
				            <input type="text" class="form-control" placeholder="Search here..." v-model="search">
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
                     		 {{invoice.invoice_item.reduce((a, c) => a + parseInt(c.service['charge']), 0)}}
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


			<div>		                    	
                Showing {{invoices.from}} to {{invoices.to}} of total {{invoices.total}}	                    	
            </div>	

            
            <!-- <div class="table-responsive">
                       <table class="table table-striped jambo_table">
                         <thead>
                           <tr class="headings">
                           	<th class="column-title">ID </th>                    
                             <th class="column-title">CLient </th>                    
                             <th class="column-title">Service </th>
                             <th class="column-title">Billing</th>
                             <th class="column-title">Bill Date </th>
                             <th class="column-title">Due Date </th>    
                             <th class="column-title">Bill Status </th>
                             <th class="column-title">  </th>
                     	                <th class="column-title">  </th>
                     	                <th class="column-title">  </th>               
                             
                           </tr>
                         </thead>
                         <tbody>
                           
                           <tr class="even pointer" v-for="(invoice,key) in invoices">
                           	<td class=" " style="width: 2%;">{{invoice.id}}{{invoice.client['id']}}</td>                   
                             <td class=" " style="width: 20% !important; min-width: 20% !important;">
                             	<a href="#detailclient" data-toggle="modal" @click="detailclient(invoice.client['id'])">
                             		{{invoice.client['client_name']}}
                             	</a>
                             </td>                  
                             <td style="width: 30% !important; max-width:30% !important;;">
                             	<span v-for="(item) in invoice.invoice_item" class="label label-info label-many" style="margin-right:5px;">
                             		{{item.service['name']}}
                             	</span>
                             </td>
                             <td style="width: 10% !important;">
                             	<i class="fa fa-inr" aria-hidden="true"></i>
                             	{{invoice.invoice_item.reduce((a, c) => a + parseInt(c.service['charge']), 0)}}
                             </td>
                             <td style="width: 10% !important;">
                             	{{ invoice.created_at | vueDate }}
                             	
                             </td>
                             <td style="width: 10% !important;">
                             	{{ invoice.due_date | vueDate }}                   	
                             </td>
                             <td class="a-right a-right ">{{invoice.status}}</td>
                             <td>
                     	                    <a href="#editclient" class="disabled" data-toggle="modal" @click="updateclient(client.id)">
                     	                      <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                     	                    </a>
                     	                  </td>
                     	                  <td>
                     	                    <a href="#invoiceview" class="disabled" data-toggle="modal" @click="invoiceview(invoice.id)">
                     	                      <i class="fa fa-eye" aria-hidden="true"></i>
                     	                    </a>
                     	                  </td>
                     	                  <td>
                     	                    <a href="" class="disabled" v-on:click.prevent @click="invoicedelete(invoice.id)">
                     	                      <i class="fa fa-trash" aria-hidden="true"></i>
                     	                    </a>
                     	                  </td>
                             
                           </tr>
                           
                         
                         </tbody>
                       </table>             
                     </div>   -->         
        
          </div>
    </div>
		<div id="modal">

         
          <!--detailclient :recrd="clientdetail" @recordupdated="refreshRecord"></detailclient-->
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
				search:'',
				invoices:{},			
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
	      		axios.get('invoice/'+id+'/edit')
		        .then((response) => {
		          this.invoicedetail=response.data;
		          console.log(response.data);
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

	            swalWithBootstrapButtons(
	              'Deleted!',
	              'Invoice deleted successfully',
	              'success'
	            )
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