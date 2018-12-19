<template>
	<section class="roles ">

		<div class="main-content-header box-shadow box box-header">
	        <div class="row">
	    	              
	          <div class="col-md-6 col-xs-12 mp-0 alt-font">
	            <i class="fa fa-briefcase"></i><span> Roles</span>
	          </div>
	          	  	         
	        </div>
	    </div>
		
		
		<div class="main-content-body box-shadow box">     
	        <div class="row"> 
				
				<div class="col-md-6 col-xs-6">
					<div class="input-group input-group-sm" >
	                  <input type="text" name="role_name" class="form-control pull-right" placeholder="Add new role" v-model="role.role_name">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-primary" @click="addrole"><i class="fa fa-plus"></i> Add Role</button>
	                  </div>
	                </div>
				</div>

				<div class="col-md-6 col-xs-6">
					<div class="input-group input-group-sm" >
	                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
	                  </div>
	                </div>
				</div>


				<div class="col-md-12">
					
					<div class="box-body table-responsive no-padding" >					
		              	<table class="table table-hover" style="margin-top:20px;">
			                <tbody>
			                	<tr>
					                <th>Name</th>
					                <th>Permissions</th>
					                <th>Actions</th>
			                	</tr>
				                <tr v-for="role in roles" v-bind:id="role.id">
				                  <td>{{role.name}}</td>
				                  <td><span class="label label-success" >read</span> <span class="label label-success" >write</span></td>
				                  <td>
				                  	<i class="fa fa-key actionicon" aria-hidden="true"></i> | 
				                  	<i class="fa fa-pencil actionicon" aria-hidden="true"></i> | 
				                  	<i class="fa fa-trash-o actionicon" aria-hidden="true" @click="deleterole(role.id)"></i>
				                  </td>                 
				                </tr>
		                
		              		</tbody>
		          		</table>
	            	</div>
				</div>
				
			
	        </div>
	        
	    </div>

	    <div id="modal">
			<addroles></addroles>
		</div>	

	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				role:{role_name:''},
				roles:{},
				permissions:{},
				success:'',
				errors:'',
			}
		},
		watch:{

		},
		methods:{
			addrole(){
				axios.post('addrole',this.role)
		          .then((response)=>{
		          	this.role={};
		          	this.roles=response.data;
		          	this.success="Category Saved Successfuly";		          	
		          	this.errors='';
		          	console.log(response.data);
					toast({
			  			type: 'success',
			  			title: 'Role added successfully'
					})

		          	}) // recordadded can be catched in component
		          .catch((error) => {
		            this.errors=error.response.data.errors;
		            this.success='';		            
		        });
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

				  	axios.delete('addrole/'+id)
					.then(response =>{
						this.roles=response.data;
						this.success="Role Deleted Successfuly";

					})//this.categories=response.data
					.catch((error) => {
						//console.log(response.data);
		            	this.errors=error.response.data.errors;
		            	this.success='';		            
		        	});

				    swalWithBootstrapButtons(
				      'Deleted!',
				      'Category deleted successfully',
				      'success'
				    )
				  } 
				})
			}
		},
		created(){
			axios.get('getroles')
			.then((response) => {
				this.roles=response.data.roles
				this.permissions=response.data.permissions
				console.log(response.data.roles)
			})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>
	.actionicon{
		margin-right:10px;
		margin-left:10px;
		cursor: pointer;
	}

	.fa-key{
		color:#4b75d6;
		font-weight: 600;
	}

	.fa-pencil{
		color: #e49606;
		font-weight: 600;
	}

	.fa-trash-o{
		color: #bd3535;
		font-weight: 600;
	}

	.swal2-confirm{
		margin-left: 10px;
	}

</style>