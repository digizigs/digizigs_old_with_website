<template>
	<section>
		<div class="">
           
            <div class="row">             

              	<div class="clearfix"></div>

              	<div class="col-md-12 col-sm-12 col-xs-12">             	

	                <div class="x_panel">
	                  	<div class="x_title">
		                  	<h2>
		                  		<i class="fa fa-align-left"></i>
		                  		Contacts <small></small> 
		                  		<span class="search">
									<i class="fa fa-search"></i>
									<div class="form-group">
								        <div class="form-line">
								            <input type="text" class="form-control" placeholder="Search here..." v-model="search">
								        </div>

								    </div>
								</span>	
		                  	</h2>	                              	                 
	                    	<a href="#addclient" class="btn btn-dark btn-sm pull-right" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> New Client</a>
	                    	<div class="clearfix"></div>
	                  	</div>

	                  	<div class="x_content">

		                  	<div class="panel-group pannel-line-group" id="accordion">
			                        		                         
			                    <div v-for="client in clients.data" class="panel panel-default pannel-line">

			                        <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">		                        
			                          	<span class="title">{{client.client_name}}</span>                             
			                          
										<!-- Action icons -->
			                          	<span class="action-text subscription pull-right">
			                            	<a href="" data-toggle="tooltip" title="Hooray!"><i class="fa fa-eye" aria-hidden="true"></i></a>
			                            	|
			                            	<a href="" v-on:click.prevent @click="deleteclient(client.id)""><i class="fa fa-trash-o" aria-hidden="true"></i></a>  		                               
			                          	</span>
			                          	<!-- Action icons -->                                    
			                        </div>

			                    </div>

					
		                	</div>

	                  		<pagination :data="clients" @pagination-change-page="paginationdata" ></pagination>

							<div>		                    	
			                    Showing {{clients.from}} to {{clients.to}} of total {{clients.total}}	                    	
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
				clientsnew:[],
				clientupdate:{},
				clientdetail:{},
				search:'',
				success:'',
				errors:'',
				
			}
		},
		watch:{
			search:function(){
				axios.get('client/create',{params:{search_string:this.search}})
				.then((response) => {
					//console.log(response.data)
					this.clients=response.data
					//this.clientsnew = response.data
				})
				.catch((error) => console.log(error))
			}
		},
		computed:{
			filteredList(){
				var self=this;

				return this.clients.data.filter(function(cust){
					return cust.client_name.toLowerCase().indexOf(self.search.toLowerCase())>=0;
				});	
			},
			filterClient:function(){
				this.clients.data.filter(function(cust){
					let clientname = cust.client_name.toLowerCase();
					let filters = this.search.toLowerCase();
					return clientname.includes(filters);
				});
			}			
		},
		methods:{
			paginationdata(page){
		        if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('client/create?page=' + page)
		          .then(response => this.clients = response.data)
		          //	.catch(error => this.errors=error.response.data.errors);

		    },
			refreshRecord(record){
				console.log('client updated')
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

		              toast({
		                	type: 'success',
		                	title: 'Client  deleted successfully'	                	
		            	})

		            })//this.categories=response.data
		            .catch((error) => {
		              console.log(response.data);
		                    this.errors=error.response.data.errors;
		                    this.success='';                
		              });
		          } 
		        })
	      	}
		},
		created(){
			axios.get('client/create',{params:{search_string:this.search}})
			.then((response) => {
				//console.log(response.data)
				this.clients=response.data
				//this.clientsnew = response.data
			})
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>

	.label{
		font-weight: 200;
	}
</style>