<template>
	<section class="">
		
		<div class="main-content-header box-shadow">
	        <div class="row">
	          
	              
	          <div class="col-md-12 col-xs-12 mp-0 alt-font">
	            <h4><span>New Post</span></h4>
	          </div>
	         
	        </div>
	    </div>

		<div class="main-content-body box-shadow">
      	
      	<div class="alert alert-success" v-if="errormsg.length > 0">
           	<ul>
           		<li v-for="error in errors">{!!error!!}</li>
           	</ul>
        </div>
      
        <div class="row">
       
          	<div class="col-md-9">
	            <form action="">

	              <div class="form-group">
	                <label for="usr">Post Title</label>
	                <input type="text" class="form-control input-sm"  v-model="post.title">
	              </div>

	              <div class="form-group">
	                <label for="usr">Post description</label>
	                <input type="text" class="form-control input-sm"  v-model="post.desc">
	              </div>
					
	              <div class="form-group">
	                <label for="editor1">Post Body</label>
	                <textarea id="textarea" name="textarea" rows="10" cols="80" class="form-control" v-model="post.body">
	                  This is my textarea to be replaced with CKEditor.
	                </textarea>
	                
	                <small><b>Word Count</b> 12</small>
	              </div>



	            </form>
          	</div>

          	<div class="col-md-3">
				
				<!--Panel Publish-->	
	            <div class="panel panel-default">
	              <div class="panel-heading">
	              	Publish
	              </div>
	              <div class="panel-body">
					
	              	<div>
	              		<i class="fa fa-map-pin" aria-hidden="true"></i> 
	              		Status: <span>Draft</span> <small><a href="#status" data-toggle="collapse" >Edit</a></small>
	              		<div id="status" class="collapse">
							<div class="form-group">							  
							  <select class="form-control input-sm" >
							    <option>draft</option>
							    <option>publish</option>
							    <option></option>						    
							  </select>
							  <a href="#status" data-toggle="collapse" class="cancel">Cancel</a>							
							</div>
						</div>	
	              	</div>


	              	<div>
	              		<i class="fa fa-eye" aria-hidden="true"></i>
		              		 Visiblity: <span>Public</span> <small><a href="#visiblity" data-toggle="collapse" >Edit</a></small>
		              		 <div id="visiblity" class="collapse">
		              		 	<select class="" id="sel1" class="form-control input-sm">
								    <option>Public</option>
								    <option>Private</option>							    
								</select>
								<a href="#visiblity" data-toggle="collapse" class="cancel">Cancel</a>									
							</div>	
	              	</div>
	              	

	              </div>
	              <div class="panel-footer">
					<button class="btn btn-primary btn-sm" @click= "savepost">Save Draft</button>
	              	<button class="btn btn-primary btn-sm pull-right" @click= "publishpost">Publish</button>
	              </div>
	            </div>

				<!--Panel Category-->
            	<div class="panel panel-default">
              		<div class="panel-heading">Categories</div>

              		<div class="panel-body">
						<div class="card">
		                <ul class="nav nav-tabs">
		                  <li class="active"><a data-toggle="tab" href="#home">All Categories</a></li>
		                  <li><a data-toggle="tab" href="#menu1">Most Used</a></li>
		                </ul>

		                <div class="tab-content">
		                  	<div id="home" class="tab-pane fade in active">
								<div class="category-list">
									<ul>
										<li v-for="cat in categories">										
											<input type="checkbox" :value="cat.id" id="cat.name" v-model="selectedcategories" > <small>{{cat.name}}</small>
										</li>
									</ul>
								</div>
		                  	</div>

		                  <div id="menu1" class="tab-pane fade">
		                    <h3>Menu 1</h3>
		                    <p>Some content in menu 1.</p>
		                  </div>

		                  <!--Quick cat addition-->
		                  <a href="#addcat" data-toggle="collapse">+ Add New Category</a>
		                  	<div id="addcat" class="collapse">
		              		 	<div class="form-group">
		              		 		<div class="form-group">
					                	<input type="text" class="form-control input-sm" name="post_title" v-model="category_data.name">
					                </div>
					                <div class="form-group">	
						                <select class="form-control input-sm" name="parent_category" v-model="category_data.parent_id">
							                <option value="">None</option>
							                <option v-for="cat in categories" v-bind:value="cat.id">{{cat.name}}</option>
							            </select>
						            </div>
						            <button class="btn btn-primary btn-sm" @click="addcategory">Add New Category</button>
					            </div>
							</div>
		                </div>
		                </div>

              		</div>

            	</div>

				<!--Panel Tags-->
	            <div class="panel panel-default">
	              	<div class="panel-heading">Tags</div>
	              	<div class="panel-body">

		                <div class="tab-content">
		                  <div id="home" class="tab-pane fade in active">
		                    <h3>HOME</h3>
		                    <p>Some content.</p>
		                  </div>
		                  <div id="menu1" class="tab-pane fade">
		                    <h3>Menu 1</h3>
		                    <p>Some content in menu 1.</p>
		                  </div>
		                  <a href="">+ Add New Category</a>
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
				post:{
					title:'',
					desc:'',
					body:'',
					status:'draft',
					visiblity:'public',
				},
				categories:{},
				selectedcategories:[],
				category_data:{parent_id:'',name:'',slug:'',description:''},
				success : false,
				errors:[],
				errormsg:'',
			}
		},
		watch:{

		},
		methods:{

			addcategory(){
				axios.post('savecategory',this.category_data)
		          .then((response)=>{
		          	console.log(response.data)
		          	this.categories=response.data;
		          	this.success="Category Saved Successfuly";
		          	this.category_data={};
		          	this.errors='';
		          	}) // recordadded can be catched in component
		          .catch((error) => {
		            this.errors=error.response.data.errors;
		            this.success='';		            
		        });
			},
			savepost(){

			},
			publishpost(){
				axios.post('publishpost',this.post)
		          	.then((response)=>{
		          	console.log(response.data)
		          	//this.categories=response.data;
		          	//this.success="Category Saved Successfuly";
		          	//this.category_data={};
		          	//this.errors='';
		          	}) // recordadded can be catched in component
		          	.catch(error => {
		          	  if(error.response.status == 422){
		          	  	this.errors=error.response.data.errors;
		          	  	this.errormsg=error.response.data.message;
		          	  	console.log(this.errormsg.length);
		          	  }
		        	});
			}

		},
		created(){
			axios.get('getcategory')
			.then((response) => {
				this.categories=response.data				
			})
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>

	.panel{
		
	}
	.panel-default{
		border-radius: 0 !important;

	}
	.panel-heading{
		padding: 5px !important;
		font-weight: 400;
	}
	.panel-body{
		padding: 5px !important;
		line-height: 35px;
	}
	.panel-footer{
		padding: 5px !important;
	}
	.nav-tabs a{
		border-radius: 0 !important;
		padding: 5px !important;
		font-size: 12px;
		font-weight: 400;
	}
	ul{
		margin: 0 !important;
		padding: 0 !important;
	}
	.category-list{
		margin-top: 10px !important;
	}
	.category-list li{
		list-style: none;
		font-weight: 300;
		margin: 0 !important;
		padding: 5px !important;
		margin-left: 10px;
		line-height: 15px !important;

	}
	.tab-pane{
	  max-height:200px;
	  overflow-y:scroll;
	  width:100%;
	}
	input[type=checkbox]{
		border: 1px solid #b4b9be;
		//height: 16px !important;
		//width: 16px !important;
		vertical-align: middle;
		//-webkit-appearance: none;
		color: #fff;
		background-color: #fff !important;
		padding: 0 !important;
		margin: 0 !important;
	}
	input[type=select]{
		border-radius: 3px;
	}
	.cancel{
		color: #b30000;
		font-weight: 500;
		font-size: 12px;
	}

	.fa{
		margin-right: 10px;
	}

	.alert{
		//position: absolute;
		//top: 60px;
		//right: 40px;
		//width: 80%;
	}
	
</style>