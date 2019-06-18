<template>
	<section>
		<div class="x_panel">
			<div class="x_title">
				<span class="panel-title">
					<i class="fa fa-align-left"></i>
					Roles
				</span>
				<a href="#addrole" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
					<i class="fa fa-plus" aria-hidden="true"></i> Add Roles
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
			                        		                         
                    <div v-for="role in roles.data"  class="panel panel-default pannel-line">

                        <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">		                        
                          	<span class="title">{{role.name}}</span>
                          	<span v-for="permission in role.permissions">
                          		<span class="label label-info label-many" style="margin-left:5px;">
                          			{{permission.name}}
                          		</span>
                          	</span>                             
                          
							<!-- Action icons -->
                          	<span class="action-text subscription pull-right">
                            	<a href="#editrole" v-on:click.prevent data-toggle="modal" @click="detailrole()" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            	|
                            	<a href="" v-on:click.prevent ><i class="fa fa-trash-o" aria-hidden="true" @click="deleterole(role.id)"></i></a>	                               
                          	</span>
                          	<!-- Action icons -->                                    
                        </div>

                    </div>
		
            	</div>
				
				<vuepagination :input="roles" @pagechange="paginationdata"></vuepagination>
          
            </div>
		</div>
		<div id="modal">
          <newrole  :roles="roles" :permissions="permissions" @recordupdated="refreshRecord"></newrole>
          <editrole :roles="roles" :permissions="permissions"  @recordupdated="refreshRecord"></editrole>
         
        </div>
    </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				roles:{},
				permissions:[],		
				errors:'',
			}
		},
		watch:{
			search(){
				if(this.search.length >= 0){
					axios.get('roles/create',{params:{search_string:this.search}})
						.then((response) => {

							this.roles = response.data.roles
							this.permissions = response.data.permissions
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
		        axios.get('roles/create?page=' + page)
		          .then((response) => {
		          	console.log(response.data)
		          	this.roles = response.data.roles
		          	this.permissions = response.data.permissions
		          })
		          //	.catch(error => this.errors=error.response.data.errors);

		  },
	    detailrole(id){
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
	    deleterole(id){
	    	swalWithBootstrapButtons({
	          title: 'Delete Role?',
	          text: "You won't be able to revert this!",
	          type: 'warning',
	          showCancelButton: true,
	          confirmButtonText: 'Yes, delete it!',
	          cancelButtonText: 'No, cancel!',
	          reverseButtons: true
	        }).then((result) => {
	          if (result.value) {

	            axios.delete('roles/'+id)
	            .then(response =>{
	              this.roles = response.data.roles
	              this.permissions = response.data.permissions     
	              toast({
	                	type: 'success',
	                	title: 'Role  deleted successfully'	                	
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
	    	this.roles = record.data.roles
	    	this.permissions = response.data.permissions
	    }
		
		},
		created(){
			this.paginationdata()
		}
	};

</script>

<style type="text/css" Scoped>


</style>