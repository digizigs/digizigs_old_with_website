<template>
	<div class="panel panel-dz dashboard-post-page-comment-indicator">
		<div class="panel-heading active">
			<span class="panel-title">
				<a data-toggle="collapse" href="#roles">
					Roles <span v-if="rendered == true">({{count}})</span> 
				</a>
			
				
				<a href="#addrole" class="btn btn-dark btn-xs add-new" data-toggle="modal">
					<i class="fa fa-plus" aria-hidden="true"></i> Add Roles
				</a>

				
				<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
			</span>
			
		</div>
		<div id="roles" class="panel-collapse collapse">
			<div class="panel-body open">
				<ul>
					<li v-for="role in roles.data">
						<a href="" class="list-title">{{role.name}}</a>
						<span v-for="permission in role.permissions" class="label label-success"><small>{{permission.name}}</small></span>
						<span class="action-text wpfont ml-20">
							<a href="#editrole" data-toggle="modal" v-on:click.prevent @click="detailrole(role.id)">
								<small><i class="fa fa-pencil" aria-hidden="true"></i></small>
							</a>
							|
							<a href="" v-on:click.prevent @click="deleterole(role.id)">
								<small><i class="fa fa-trash-o" aria-hidden="true"></i></small>
							</a>
						</span>
					</li>
				</ul>


				
				<div class="pgn">
					<vuepagination :input="roles" @pagechange="rolepagination" @count="rolecount"></vuepagination>
				</div>

			</div>

			<div id="modal">
          		<newrole  :roles="roles" :permissions="permissions" @recordupdated="refreshRecord"></newrole>
          		<editrole :role="role" :permissions="permissions"  @recordupdated="refreshRecord"></editrole>
        	</div>

		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				roles:{},
				role:{},
				permissions:{},
				count:'',
				rendered:false
			}
		},
		watch:{
			
		},
		methods:{
			rolepagination(page){
				if (typeof page === 'undefined'){
		          page=1;
		        }
		        NProgress.start()  
		        axios.get('roles/create?page=' + page)
		          .then((response) => {
		          	this.roles = response.data.roles
		          	this.permissions = response.data.permissions
		          	this.rendered = true
		          	NProgress.done()
		          })
			},
			rolecount(record){
				this.count = record
			},
			refreshRecord(record){
				this.roles = record.data.roles
			},
			detailrole(id){
		    	axios.get('roles/'+id+'/edit')
						.then((response) => {
							//console.log(response.data)
							this.role = response.data
					})
					.catch(error => this.errors=error.response.data.errors);
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
			}
		},
		created(){
			this.rolepagination()
		}
	};

</script>

<style type="text/css" Scoped>

	.label{
		padding: 2px 4px !important;
		margin-right: 2px;
		font-weight: 400 !important;
	}
	
</style>