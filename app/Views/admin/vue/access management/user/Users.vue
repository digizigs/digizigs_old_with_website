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
          	</div>

            <div class="x_content">
            	<div class="panel-group pannel-line-group" id="accordion">
			                        		                         
                    <div v-for="user in users.data"  class="panel panel-default pannel-line">

                        <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">		                        
                          	<span class="title">{{user.firstname}},{{user.lastname}}</span>                             
                          
							<!-- Action icons -->
                          	<span class="action-text subscription pull-right">
                            	<a href="#adduser" v-on:click.prevent data-toggle="modal" @click="detailuser(user.id)" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            	|
                            	<a href="" v-on:click.prevent ><i class="fa fa-trash-o" aria-hidden="true" @click="deleteuser(user.id)"></i></a>	                               
                          	</span>
                          	<!-- Action icons -->                                    
                        </div>

                    </div>
		
            	</div>
				
				<vuepagination :input="users" @pagechange="paginationdata"></vuepagination>
          
            </div>
		</div>
		<div id="modal">
          <newuser @recordupdated="refreshRecord" :roles="roles"></newuser>
          <!--editclient :selClient="clientdetail" @recordupdated="refreshRecord"></editclient-->
         
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
				errors:''
			}
		},
		watch:{

		},
		methods:{
			paginationdata(page){
		        if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('users/create?page=' + page)
		          .then((response) => {
		          	console.log(response.data)
		          	this.users = response.data.users
		          	this.roles = response.data.roles
		          })
		          //	.catch(error => this.errors=error.response.data.errors);

		    },
		    detailuser(id){

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


</style>