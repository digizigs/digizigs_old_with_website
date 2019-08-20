<template>
	<section>
		<div class="x_panel">
			<div class="x_title">
				<span class="panel-title">
					<i class="fa fa-align-left"></i>
					Users
				</span>
				<a href="#addnewuser" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
					<i class="fa fa-plus" aria-hidden="true"></i> Add User
				</a>
				<span class="x-title-option">
				<ul>
					<li>
						<span id="x-title-search" class="title-searchs x-title-search c">
							<span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
							<input type="text" v-model="search">
							<span class="close-icon" @click="closesearch"><i class="fa fa-times" aria-hidden="true"></i></span>
						</span>
					</li>
				</ul>
				
			</span>         	
          	</div>

            <div class="x_content">
            	<div class="panel-group pannel-line-group" id="accordion">
			                        		                         
                    <div v-for="user in users.data"  class="panel panel-default pannel-line">

                        <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">		                        
                          	<span class="title">{{user.name}}</span>
                          	<span v-for="role in user.roles">
                          		<span class="label label-info label-many" style="margin-left:5px;">
                          			{{ role.name }}
                          		</span>
                          	</span>                             
                          
							<!-- Action icons -->
                          	<span class="action-text subscription pull-right">
                            	<a href="#edituser" v-on:click.prevent data-toggle="modal" @click="detailuser(user.id)" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            	|
                            	<a href="" v-on:click.prevent ><i class="fa fa-trash-o" aria-hidden="true" @click="deleteuser(user.id)"></i></a>	                               
                          	</span>
                          	<!-- Action icons -->                                    
                        </div>

                    </div>
		
            	</div>

            	<!--div class="panel panel-dz dashboard-post-page-comment-indicator">
						<div class="panel-heading active">
							<span class="panel-title">
								<a data-toggle="collapse" >
									Users
								</a>
															
								<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
							</span>
							
						</div>
						
							
						<div  class="panel-body open">
							
							<ul class="quick-list">
								
								<li v-for="user in users.data" class="wpfont">
									

									<span class="action-text wpfont ml-20">
		                            	<a href="#edituser" v-on:click.prevent data-toggle="modal" @click="detailuser(user.id)" ><i class="fa fa-eye" aria-hidden="true"></i></a>
		                            	|
		                            	<a href="" v-on:click.prevent ><i class="fa fa-trash-o" aria-hidden="true" @click="deleteuser(user.id)"></i></a>	                               
		                          	</span>

		                          	<a href="#edituser" v-on:click.prevent data-toggle="modal" @click="detailuser(user.id)">
										{{user.firstname}},{{user.lastname}}
									</a>
									<span v-for="role in user.roles" class="label label-info label-many">
										{{ role.name }}
									</span>

									
								</li>
								
							</ul>
							
						</div>
							
						
				</div-->

				
				<vuepagination :input="users" @pagechange="paginationdata"></vuepagination>
          
            </div>
		</div>
		<div id="modal">
          <newuser @recordupdated="refreshRecord" :roles="roles"></newuser>
          <edituser :roles="roles" :user="user" @recordupdated="refreshRecord"></edituser>
         
        </div>
    </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				users:{},
				roles:{},
				userdetails:{},
				errors:'',
				user:''

			}
		},
		watch:{
			search(){
				if(this.search.length >= 0){
					axios.get('users/create',{params:{search_string:this.search}})
						.then((response) => {
						this.users = response.data.users
						this.roles = response.data.roles
					})
					.catch((error) => {
						this.errors = error.errors
						console.log(error)
					})
				}
			}
		},
		methods:{
			paginationdata(page){
		        if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('users/create?page=' + page)
		          .then((response) => {
		          	this.users = response.data.users
		          	this.roles = response.data.roles
		          })
		          //	.catch(error => this.errors=error.response.data.errors);

		  },
	    detailuser(id){
	    	axios.get('users/'+id+'/edit')
					.then((response) => {
						console.log(response.data)
						this.user=response.data.user
				})
				.catch(error => this.errors=error.response.data.errors);
	    },
	    closesearch(){
				this.search=''
			},
	    deleteuser(id){
	    	swalWithBootstrapButtons({
	          title: 'Delete User?',
	          text: "You won't be able to revert this!",
	          type: 'warning',
	          showCancelButton: true,
	          confirmButtonText: 'Yes, delete it!',
	          cancelButtonText: 'No, cancel!',
	          reverseButtons: true
	        }).then((result) => {
	          if (result.value) {

	            axios.delete('users/'+id)
	            .then(response =>{
	              this.users=response.data;
	              
	              toast({
	                	type: 'success',
	                	title: 'User  deleted successfully'	                	
	            	})

	            })//this.categories=response.data
	            .catch((error) => {
	              //console.log(response.data);
	              	
	                    this.errors=error.response.data.errors;		                                  
	              });
	          } 
	        })
	    },
	    refreshRecord(record){
	    	this.users = record.data
	    }
		
		},
		created(){
			this.paginationdata()
		}
	};

</script>

<style type="text/css" Scoped>
	.fa{
		font-size: 12px !important;
	}
	.label-info{
		padding: 2px 5px !important;
		margin-right: 4px;
	}

</style>