<template>
	<section>
		<div class="">
           
            <div class="row">
              
				
              

              	<div class="clearfix"></div>

              	<div class="col-md-12 col-sm-12 col-xs-12">

              		<div class="card">
                        <div class="header">
                            <h2>
                                Clients
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                        <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div class="list-group">
                                <a v-for="client,key in clients.data" href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-cyan">14 New</span>
                                    <span class="title">{{client.client_name}}</span>
                                    <span class="action-text">
                                    	<a href="">View</a> | <a href="">Delete</a>
                                    </span>
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-cyan">99 Unread</span>Dapibus ac facilisis in
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-teal">99+</span>Morbi leo risus
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-orange">21</span>Porta ac consectetur ac
                                </a>
                                <a href="javascript:void(0);" class="list-group-item">
                                    <span class="badge bg-purple">18</span>Vestibulum at eros
                                </a>
                            </div>
                        </div>
                    </div>

	                <div class="x_panel">
	                  <div class="x_title">	 
	                  	<i class="fa fa-align-left"></i> Contacts <small>All Contacts</small>                  
	                    <a href="#addclient" class="btn btn-dark btn-sm pull-right" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> New Client</a>
	                    <div class="clearfix"></div>
	                  </div>

	                  <div class="x_content">

	                  	<div class="panel-group pannel-line-group" id="accordion">
		                        		                         
		                    <div v-for="client in clients.data" class="panel panel-default pannel-line">
		                        <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">
		                        
		                          <span class="title">{{client.client_name}}</span>                             
		                          <span class="time">at  Time</span>
			
		                          <span class="action-text subscription">
		                            <a href="">View</a>
		                            |
		                            <a href="">Delete</a>
		                               		                               
		                          </span>
		                                                            
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