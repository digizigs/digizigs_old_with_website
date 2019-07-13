<template>
	<section>
		<div class="x_panel">
			<div class="x_title">	                   
              <h2><i class="fa fa-align-left"></i> Categories <small>Manage app categories</small></h2>
              <div class="clearfix"></div>
         </div>

         <div class="x_content">

				<div class="col-md-4 col-xs-12">
					<div class="form-group wp-input" >
						<div v-bind:class="{ 'form-invalid': catgerror }">
							<label for="usr">Category Name</label>
							<input type="text" class="form-control input-sm " v-model="category.category_name">
							<small><i>The name is how it appears on your site.</i></small>
							<small v-if="this.errors.errors">{{this.errors.errors.title[0]}}</small>
						</div>
					</div>
					
					<!--Parent category dropdown-->
					<div class="form-group wp-input">
						<label for="sel1">Parent Catagory</label>
						<select class="form-control input-sm" v-model="category.category_parent">
							<option value="">--Please select parent--</option>
							<option v-for="cat,key in categories" v-bind:value="cat.id">{{cat.name}}</option>
						</select>
						<small><i>By Selecting this WebBlock Name will become category under select parent/Block</i></small>
					</div>
					<div>
						<button type="submit" class="btn btn-dark btn-sm" style="margin-bottom: 20px;" @click="addcategory">
						Add New
						</button>
					</div>
				</div>

				<div class="col-md-8 col-xs-12">
					<div v-for="cat in categories" class="panel panel-dz dashboard-post-page-comment-indicator">
						<div class="panel-heading active">
							<span class="panel-title">
								<a data-toggle="collapse" v-bind:href="'#'+ cat.id">
									{{cat.name}}
								</a>
								
								<span class="action-text wpfont ml-20">
									<a href="#editCategory" data-toggle="modal" v-on:click.prevent @click="updatecategory(cat.id)">
										<small><i class="fa fa-pencil" aria-hidden="true"></i></small>
									</a>
									|
									<a href="" v-on:click.prevent @click="deletecategory(cat.id)">
										<small><i class="fa fa-trash-o" aria-hidden="true"></i></small>
									</a>
								</span>
								<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
							</span>
							
						</div>
						<div :id="cat.id" class="panel-collapse collapse in">
							
							<div v-if="cat.child.length > 0" class="panel-body open">
								
								<ul class="quick-list">
									
									<li v-for="child in cat.child" class="wpfont">
										<a v-on:click.prevent >
											{{child.name}} ({{child.posts.length}})
										</a>
										<span ></span>
										<span class="action-text wpfont ml-20">
											<a href="#editCategory" data-toggle="modal" v-on:click.prevent @click="updatecategory(child.id)">
												<small>Edit</small>
											</a>
											|
											<a href="" v-on:click.prevent @click="deletecategory(child.id)">
												<small>Delete</small>
											</a>
										</span>
									</li>
									
								</ul>
								
							</div>
							
						</div>
					</div>
                 
					<b><i style="color:#aaa">Note:</i></b>
               <p>
                  <i style="color:#aaa">
                    Deleting a category does not delete the posts in that category. Instead, posts that were only assigned to the deleted category are set to the category <b>Uncategorized</b>.
                  </i>
               </p>  	
          		
          	</div>

         </div>

         <div id="modal">
				<editcategory :cat="catprop" :cats="categories"  @recordupdated="refreshRecord"></editcategory>					
			</div>


		</div>
    </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				categories:[],
				category:{'category_name':'','category_parent':''},
				catprop:{},
				selectedparent:'',
				catgerror:false,
				errors:{},
			}
		},
		watch:{

		},
		methods:{
			addcategory(){
				if(this.category.category_name == ''){
					this.catgerror = true
					toast({
	                type: 'warning',
	                title: 'Please enter a category name'
	            })
				}else{
					this.catgerror = false
					axios.post('category',this.category)
					.then((response) => {
						//console.log(response.data)
						this.categories=response.data
						this.category = {'category_name':'','category_parent':''};
						this.selectedparent = '';
						toast({
		                type: 'success',
		                title: 'Category Added Successfully'
		            })

					})
					.catch((error) => {
						console.log(error.response.data)
                 	this.errors = error.response.data
                 	this.catgerror = true          
              	})  
				}
			},
			deletecategory(id){
				swalWithBootstrapButtons({
		        	title: 'Delete Post?',
		        	text: "You won't be able to revert this!",
		        	type: 'warning',
		        	showCancelButton: true,
		        	confirmButtonText: 'Yes, delete it!',
		        	cancelButtonText: 'No, cancel!',
		        	reverseButtons: true
	         }).then((result) => {
		        if (result.value) {

		          axios.delete('category/'+id)
		          	.then(response =>{		          	
		            	this.categories=response.data;
		          	})
		          	.catch((error) => {		            	
		                this.errors=error.response.data.errors;
		                this.success='';                
		            });

		          toast({
		                type: 'success',
		                title: 'Post deleted successfully'
		            })
		        } 
	        })
			},
			updatecategory(id){
				 axios.get('category/'+id+'/edit')
		         .then(response=>{
		         	this.catprop = response.data
		         })
		         .catch((error) => {
		            this.errors=error.response.data.errors;           
		          })

			},
			refreshRecord(record){
				console.log(record)
				this.categories = record.data
			}
		},
		created(){
			axios.get('category/create')
			.then((response) => {
					console.log(response.data)
					this.categories=response.data
				})
			.catch((error) => console.log(error))
		}
	};

</script>

<style lan="scss">

	.panel-heading{
		margin: 0;
		padding: 0;
	}

	.panel-body{

	}
	table{
		margin:0;
	}
	.label{
		margin-top: 4px;
	}
</style>