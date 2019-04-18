<template>
	<section>
		<div class="">
           
            <div class="row">
              
				
              

              	<div class="clearfix"></div>

              	<div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
	                  <div class="x_title">	 
	                  	<span class="title"><i class="fa fa-user"></i> Contacts </span><small>All Contacts</small>                  
	                    <a href="#addclient" class="btn btn-dark btn-sm pull-right" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> New Client</a>
	                    <div class="clearfix"></div>
	                  </div>

	                  <div class="x_content">

	                     <div class="table-responsive">
	                        <table class="table table-striped jambo_table bulk_action">
	                          <thead>
	                            <tr class="headings">
	                              <th class="column-title"> Id </th>
	                              <th class="column-title"> Client </th>
	                              <th class="column-title"> Email </th>
	                              <th class="column-title"> Contact </th>
	                              <th class="column-title"> Status </th>
	                              <th class="column-title"> Service </th>
	                              <th class="column-title">  </th>
	                              <th class="column-title">  </th>
	                              <th class="bulk-actions" colspan="7">
	                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
	                              </th>
	                            </tr>
	                          </thead>

	                          <tbody>

	                            <tr class="even pointer" v-for="client,key in clients.data">
	                              <td class=" "> {{client.id}} </td>
	                              <td class=" " style="width: 15%;">
	                              	<a href="#detailclient" data-toggle="modal" @click="detailclient(client.id)">
	                              		{{client.client_name}}
	                              	</a>
	                              </td>
	                              <td class=" " style="width: 15%;"> {{client.client_email}} </td>
	                              <td class=" " style="width: 10%;"> {{client.client_phone}} </td>
	                              <td class=" " style="width: 10%;"> <span class="label label-warning label-many">WIP</span> </td>
	                              <td class=" " style="width: 40%;"> 
									<span class="label label-info label-many" style="font-weight:300;">Logo Design</span>
									<span class="label label-info label-many">Pakage Upload</span>
									<span class="label label-info label-many">Seo</span>
									
	                              </td>
	                              <td style="width: 1%;">
	                                <a href="#editclient" class="disabled" data-toggle="modal" @click="updateclient(client.id)">
	                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	                                </a>
	                              </td>
	                              <td style="width: 1%;">
	                                <a href="" class="disabled" v-on:click.prevent @click="deleteclient(client.id)">
	                                  <i class="fa fa-trash" aria-hidden="true"></i>
	                                </a>
	                              </td>
	                             
	                            </tr>

	                          </tbody>
	                        </table>

	                        <pagination :data="clients" @pagination-change-page="paginationdata" ></pagination>

	                    </div>  
							     
	                  </div>

	                </div>
              	</div>
            </div>
        </div>

		<div id="modal">
          <newclient @recordupdated="refreshRecord"></newclient>
          <editclient :recrd="clientupdate" @recordupdated="refreshRecord"></editclient>
          <detailclient :recrd="clientdetail" @recordupdated="refreshRecord"></detailclient>
         
        </div>

	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				clients:{},
				clientupdate:{},
				clientdetail:{},
				success:'',
				errors:'',
			}
		},
		watch:{

		},
		methods:{
			paginationdata(page){
		        if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('client/create?page=' + page)
		          .then(response => this.clients = response.data)
		          .catch(error => this.errors=error.response.data.errors);

		    },
			refreshRecord(record){
	        	this.clients=record.data;
	      	},
	      	updateclient(id){
	      		axios.get('client/'+id+'/edit')
		        .then((response) => {
		          this.clientupdate=response.data
		          })//this.apntupdate = response.data
		        .catch(error => this.errors=error.response.data.errors);
	      	},
	      	detailclient(id){
	      		axios.get('client/'+id+'/edit')
		        .then((response) => {
		          this.clientdetail=response.data
		          })//this.apntupdate = response.data
		        .catch(error => this.errors=error.response.data.errors);
	      	},
	      	deleteclient(id){
	      		swalWithBootstrapButtons({
		          title: 'Delete Client?',
		          text: "You won't be able to revert this!",
		          type: 'warning',
		          showCancelButton: true,
		          confirmButtonText: 'Yes, delete it!',
		          cancelButtonText: 'No, cancel!',
		          reverseButtons: true
		        }).then((result) => {
		          if (result.value) {

		            axios.delete('client/'+id)
		            .then(response =>{
		              this.clients=response.data;
		              this.success="Client Deleted Successfuly";

		            })//this.categories=response.data
		            .catch((error) => {
		              console.log(response.data);
		                    this.errors=error.response.data.errors;
		                    this.success='';                
		              });

		            swalWithBootstrapButtons(
		              'Deleted!',
		              'Client deleted successfully',
		              'success'
		            )
		          } 
		        })
	      	}
		},
		created(){
			axios.get('client/create')
			.then((response) => {this.clients=response.data})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>

	.label{
		font-weight: 200;
	}
</style>