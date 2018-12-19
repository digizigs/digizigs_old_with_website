<template>
	<section class="permission ">

		<div class="main-content-header box-shadow box">
	        <div class="row">
	    	              
	          <div class="col-md-6 col-xs-12 mp-0 alt-font">
	            <i class="fa fa-key"></i><span> Permissions</span>
	          </div>
	          	  	         
	        </div>
	    </div>
		
		
		<div class="main-content-body box-shadow box">     
	        <div class="row"> 
				
				<div class="col-md-6 col-xs-6">
					<div class="input-group input-group-sm" >
	                  <input type="text" name="role_name" class="form-control pull-right" placeholder="Add new permission" v-model="permission.permission_name">

	                  <div class="input-group-btn">
	                    <button type="submit" class="btn btn-primary" @click="addpermission"><i class="fa fa-plus"></i> Add Permission</button>
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
					                <th>Actions</th>
			                	</tr>
				                <tr v-for="permission in permissions" v-bind:id="permission.id">
				                  <td>{{permission.name}}</td>
				                  <td><span class="label label-success" >read</span> <span class="label label-success" >write</span></td>
				                  <td>				                 
				                  	<i class="fa fa-pencil actionicon" aria-hidden="true"></i> | 
				                  	<i class="fa fa-trash-o actionicon" aria-hidden="true" @click="deletepermission(permission.id)"></i>
				                  </td>                 
				                </tr>
		                
		              		</tbody>
		          		</table>
	            	</div>
				</div>
			
	        </div>
	    </div>

	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				permission:{permission_name:''},
				permissions:{},
				success:'',
				errors:'',
			}
		},
		watch:{

		},
		methods:{
			addpermission(){
				axios.post('addpermission',this.permission)
		          .then((response)=>{
		          	this.permission={};
		          	this.permissions=response.data;
		          	this.success="Category Saved Successfuly";		          	
		          	this.errors='';
		          	console.log(response.data);

					toast({
			  			type: 'success',
			  			title: 'Permission added successfully'
					})

		          	}) // recordadded can be catched in component
		          .catch((error) => {
		            this.errors=error.response.data.errors;
		            this.success='';		            
		        });
			},
		},
		created(){
			axios.get('getpermissions')
			.then((response) => {
				this.permissions=response.data				
				console.log(response.data)
			})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>


</style>