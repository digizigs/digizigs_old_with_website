<template>
	<div class="panel panel-dz dashboard-post-page-comment-indicator">
		<div class="panel-heading active">
			<span class="panel-title">
				<a data-toggle="collapse" href="#users">
					Users <span v-if="rendered == true">({{count}})</span> 
				</a>

				

				<a href="#addnewuser" class="btn btn-dark btn-xs add-new" data-toggle="modal">
					<i class="fa fa-plus" aria-hidden="true"></i> Add User
				</a>


				<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
			</span>
			
		</div>
		<div id="users" class="panel-collapse collapse">
			<div class="panel-body open">
				<ul>
					<li v-for="user in users.data">
						<a href="" class="list-title">{{user.name}}</a>
						<span v-for="role in user.roles" class="label label-info"><small>{{role.name}}</small></span>
						<span class="action-text wpfont ml-20">
							<a href="#edituser" data-toggle="modal" v-on:click.prevent @click="detailuser(user.id)">
								<small><i class="fa fa-pencil" aria-hidden="true"></i></small>
							</a>
							|
							<a href="" v-on:click.prevent @click="deleteuser(user.id)">
								<small><i class="fa fa-trash-o" aria-hidden="true"></i></small>
							</a>
						</span>
					</li>
				</ul>

				<div class="pgn">
					<vuepagination :input="users" @pagechange="userpagination" @count="usercount"></vuepagination>
				</div>

				<div id="modal">
		        	<newuser @recordupdated="refreshRecord" :roles="roles"></newuser>
		         <edituser :roles="roles" :user="user" @recordupdated="refreshRecord"></edituser>
		      </div>


			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		
		data(){
			return{
				users:{},
				user:{},
				roles:{},
				count:'',
				rendered:false,
			}
		},
		watch:{
			users(){
				console.log(this.users)
			}
		},
		methods:{
			userpagination(page){
				if (typeof page === 'undefined'){
		          page=1;
		        }
		        NProgress.start() 
		        axios.get('users/create?page=' + page)
		          .then((response) => {
		          	this.users = response.data.users
		          	this.roles = response.data.roles
		          	this.rendered = true
		          	NProgress.done()
		          })
			},
			usercount(record){
				this.count = record
			},
			detailuser(id){
	    		axios.get('users/'+id+'/edit')
					.then((response) => {
						console.log(response.data)
						this.user=response.data.user
					})
					.catch(error => this.errors=error.response.data.errors);
		    },
		   refreshRecord(record){
		    	this.users = record.data
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
		},
		created(){
			this.userpagination()
		}
	};

</script>

<style type="text/css" Scoped>

	.label{
		padding: 2px 4px !important;
		margin-right: 2px;
		font-weight: 400 !important;
	}

	.add-new{
		margin-top: 5px;
		margin-left: 10px;
	}
	.btn-dark{
		color: #fff !important;
	}

	
</style>