<template>
	<section>
		
		<div class="main-content-header box-shadow">
	        <div class="row">
	    	              
	          <div class="col-md-6 col-xs-12 mp-0 alt-font">
	            <i class="fa fa-object-group"></i><span> Categories</span>
	          </div>
	          	  	         
	        </div>
	    </div>
      

	    <div class="main-content-body box-shadow">

	    	
	      
	      	<div class="container category">

		        <div class="col-md-4 ">
		          
		          <form role="form" @submit.prevent="processForm">
		            

		            <!--catagory-->
		            <div class="form-group">
		              <label for="usr">Add New Category</label>
		              <input type="text" class="form-control input-sm" v-model="category_data.name">
		              <small><i>The name is how it appears on your site.</i></small>
		            </div>
		            
		            
		            <!--slug-->
		            <div class="form-group">
		              <label for="usr">Slug</label>
		              <input type="text" class="form-control input-sm" name="category_slug" v-model="category_data.slug">
		              <small><i>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</i></small>
		            </div>
		            

		            <!--Parent category dropdown-->
		            <div class="form-group">
		              <label for="sel1">Parent Catagory</label>
		              <select class="form-control input-sm" name="parent_category" v-model="category_data.parent_id">
		                <option value="">None</option>
		                <option v-for="cat in categories" v-bind:value="cat.id">{{cat.name}}</option>
		              </select>
		              <small><i>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</i></small>
		            </div>
		            
		            <!--Description-->
		            <div class="form-group">
		              <label for="comment">Description</label>
		              <textarea class="form-control" rows="2" name="description" v-model="category_data.description"></textarea>
		              <small><i>The description is not prominent by default; however, some themes may show it.</i></small>
		            </div>

		            <div>
		              <button type="submit" class="btn btn-primary btn-sm" style="margin-bottom: 20px;" @click="addcategory">
		                Add New Category
		              </button>
		            </div>

		          </form>

		        </div>

		        <div class="col-md-7 " >
		          <table class="table table-bordered table-condensed" style="margin: 0 !important">
		            <thead>
		              <tr>
		                <th><input type="checkbox" value=""></th>
		                <th>Name</th>
		                <th>Slug</th>
		                <th>Count</th>
		              </tr>
		            </thead>
		            <tbody>
		              <tr v-for="cat in categories" v-bind:id="cat.id">
		                <td ><input type="checkbox" value=""></td>
		                <td>
		                	{{cat.name}}
							<div>
		                		<small>
		                			<span>
		                				<a href="#editcat" data-toggle="modal" @click="editCategory(cat.id)">Edit</a>
		                			</span> | <span>
		                				<a href="" v-on:click.prevent @click="deletecat(cat.id)">Delete</a>
		                			</span>
		                		</small>
		                	</div>
		                </td>
		                <td>{{cat.slug}}</td>
		                <td>7</td>
		              </tr> 
		            </tbody>
		          </table>

		          <div style="overflow: hidden;">
		            <b><i>Note:</i></b>
		            <small><i>Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category <b>Uncategorized</b>.</i></small>
		          </div>
		        </div>

	      	</div>
	    </div>
			
		<div id="modal">
			<editcategory :recrd="catupdate" @recordupdated="refreshRecord"></editcategory>
		</div>	
		
	</section>
</template>

<script type="text/javascript">
	

	export default{
		data(){
			return{
				categories:{},
				category_data:{parent_id:'',name:'',slug:'',description:''},
				errors:'',
				success:'',
				catupdate:{},
			}
		},
		watch:{

		},
		methods:{
			processForm(){

			},
			addcategory(){
				axios.post('savecategory',this.category_data)
		          .then((response)=>{
		          	this.categories=response.data;
		          	this.success="Category Saved Successfuly";
		          	this.category_data={};
		          	this.errors='';

					toast({
			  			type: 'success',
			  			title: 'Category added successfully'
					})

		          	}) // recordadded can be catched in component
		          .catch((error) => {
		            this.errors=error.response.data.errors;
		            this.success='';		            
		        });
			},
			deletecat(id){
			
				swalWithBootstrapButtons({
				  title: 'Delete Categoty?',
				  text: "You won't be able to revert this!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonText: 'Yes, delete it!',
				  cancelButtonText: 'No, cancel!',
				  reverseButtons: true
				}).then((result) => {
				  if (result.value) {

				  	axios.delete('updatecategory/'+id)
					.then(response =>{
						this.categories=response.data;
						this.success="Category Deleted Successfuly";

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

				//const rply = confirm('Do you want to delete the category : '. name)
				//if(rply){
					
				//}	
			},
			editCategory(id){							
				axios.get('updatecategory/'+id+'/edit')
				.then(response => this.catupdate = response.data)//this.apntupdate = response.data
				.catch(error => this.errors=error.response.data.errors);			
			},
			refreshRecord(record){
				console.log('Record updated' + record)
				this.categories=record.data
				
			},

		},
		created(){
			axios.get('getcategory')
			.then((response) => {
				this.categories=response.data
				//console.log(this.categories)
			})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>
	
	.swal2-confirm{
		margin-left: 10px;
	}

</style>