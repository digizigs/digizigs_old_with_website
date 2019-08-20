<template>
	<div class="panel panel-dz dashboard-post-page-comment-indicator">
		<div class="panel-heading active">
			<span class="panel-title">
				<a data-toggle="collapse" href="#permission">
					Permissions <span v-if="rendered == true">({{count}})</span> 
				</a>
				
				<a href="#newpermission" class="btn btn-dark btn-xs add-new" data-toggle="modal">
					<i class="fa fa-plus" aria-hidden="true"></i> New Permission
				</a>

				<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
			</span>
			
		</div>
		<div id="permission" class="panel-collapse collapse">
			<div class="panel-body open">
				<ul>
					<li v-for="permission in permissions.data">
						<a href="" class="list-title">{{permission.name}}</a>
						<span class="action-text wpfont ml-20">
							<a href="#editpermission" v-on:click.prevent data-toggle="modal" @click="detailpermission(permission.id)" >
								<small><i class="fa fa-pencil" aria-hidden="true"></i></small>
							</a>
							|
							<a href="" v-on:click.prevent @click="deletepermission(permission.id)">
								<small><i class="fa fa-trash-o" aria-hidden="true"></i></small>
							</a>
						</span>
					</li>
				</ul>
				
				<div class="pgn">
					<vuepagination :input="permissions" @pagechange="permissionpagination" @count="permissioncount"></vuepagination>
				</div>

				<div id="modal">
		          <newpermission @recordupdated="refreshRecord"></newpermission>
		          <editpermission :permission="permissiondetail" @recordupdated="refreshRecord"></editpermission>
		        </div>

			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				permissions:{},
				permissiondetail:{},
				count:'',
				rendered:false
			}
		},
		watch:{

		},
		methods:{
			permissionpagination(page){
				if (typeof page === 'undefined'){
		          page=1;
		        } 
		        NProgress.start()  
		        axios.get('permissions/create?page=' + page)
		          .then((response) => {
		          	this.permissions = response.data
		          	this.rendered = true
		          	NProgress.done()
		          })
			},
			permissioncount(record){
				this.count = record
			},
			detailpermission(id){
		    	axios.get('permissions/'+id+'/edit')
		        .then((response) => {		        	
		          	this.permissiondetail=response.data
		          })
		        .catch(error => this.errors=error.response.data.errors);
		    },
		    refreshRecord(record){
		    	this.permissions=record.data;
		    },
		    deletepermission(id){
		    	NProgress.start();
	      		swalWithBootstrapButtons({
		          title: 'Delete Permission?',
		          text: "You won't be able to revert this!",
		          type: 'warning',
		          showCancelButton: true,
		          confirmButtonText: 'Yes, delete it!',
		          cancelButtonText: 'No, cancel!',
		          reverseButtons: true
		        }).then((result) => {
		          if (result.value) {

		            axios.delete('permissions/'+id)
		            .then(response =>{
		              this.permissions=response.data;
		              
		              toast({
		                	type: 'success',
		                	title: 'Permission  deleted successfully'	                	
		            	})
		              NProgress.done();

		            })//this.categories=response.data
		            .catch((error) => {
		              console.log(response.data);
		                    this.errors=error.response.data.errors;
		                    this.success='';                
		              });
		          } 
		        })
	      	},
		},
		created(){
			this.permissionpagination()
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