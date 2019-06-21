<template>
	<section>
		<div class="">          
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
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
	                                </div>
	                            </div>

	                            

	                            <!--Parent category dropdown-->
                               	<div class="form-group wp-input">
                                	<label for="sel1">Parent Catagory</label>
	                                <select class="form-control input-sm" v-model="category.category_parent">	                                   
	                                   <option value="">--Please select parent--</option>
	                                   <option v-for="cat,key in categories" v-bind:value="cat.id">{{cat.name}}</option>	                                   	                                   
	                                </select>
                                 	<small><i>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</i></small>
                               	</div>

                               	<div>
                                	<button type="submit" class="btn btn-dark btn-sm" style="margin-bottom: 20px;" @click="addcategory">
                                   		Add Category
                                 	</button>
                               	</div>
		                	</div>

		                	<div class="col-md-8 col-xs-12">

		                		<div class="panel-group pannel-line-group" id="accordion">
		                			
		                			<div v-for="cat,key in categories" class="panel panel-default pannel-line">
		                				<div class="panel-heading">
		                					<a href="#" data-toggle="collapse" data-parent="#accordion">
	                                            <span class="title">{{cat.name}}</span>
	                                        </a>
	                                        <span class="action-text">
	                                        	<a href=""><small>Edit</small></a>
	                                        	|
	                                        	<a href=""><small>Delete</small></a>
	                                        </span>

	                                        <span v-if="cat.child.length > 0" class="pull-right label label-info">
	                                        	{{cat.child.length}}
	                                        </span>
		                				</div>

		                				<div v-if="cat.child.length > 0" class="panel-body">
		                					<span >
		                						<ul class="list-group">
		                							<li v-for="child in cat.child" class="list-group-item">
		                								<span class="title">{{child.name}}</span>
		                								<span class="action-text">
		                                        	<a href=""><small>Edit</small></a>
		                                        	|
		                                        	<a href=""><small>Delete</small></a>
		                                        </span>
		                							</li>
		                						</ul>	                						
		                					</span>
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
				categories:[],
				category:{'category_name':'','category_parent':''},
				selectedparent:'',
				catgerror:false
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
					.catch((error) => console.log(error))
				}
				
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