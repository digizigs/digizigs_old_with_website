<template>
	<section>
		<div class="x_panel">

			<div class="x_title">
				<span class="panel-title">
		            <i class="fa fa-align-left hidden-xs"></i>
		            Posts
		      </span>
		      <a href="#newpost" data-toggle="modal" class="btn btn-dark btn-sm pull-right" @click="blockname(block)">
		      	New Post
		      </a>
		         
		      <span class="x-title-option">
		            <ul>
		               	<li>
		               		<a href="" class="option-item wpfont">All</a>
		               	</li>
		               	<li>
		               		<a href="" class="option-item wpfont">Published</a>
		               	</li>
		               	<li>
		               		<a href="" class="option-item wpfont">Draft</a>
		               	</li>
		               	<li>
		               		<a href="" class="option-item wpfont">Trash</a>
		               	</li>
		               	<li>
			                  <span id="x-title-search" class="title-searchs x-title-search c">
			                     <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
			                     <input type="text">
			                     <span class="close-icon" ><i class="fa fa-times" aria-hidden="true"></i></span>
			                  </span>
		               	</li>	               
		            </ul>
		      </span>
			</div>

			<div class="x_content">

				<div v-if="blocks.lengths == 0">
					No Post Found. <a href="">Create your first post</a>
				</div>
				
				
				<div v-for='block in blocks' class="panel panel-dz dashboard-post-page-comment-indicator">

		         	<div class="panel-heading active">
		            	<span class="panel-title">
		              		<a data-toggle="collapse" v-bind:href="'#'+ block.id" class="wpfont">
		                 		{{block.name}}                
		               		</a>
		               		<a href="#newwebblock" data-toggle="modal" class="panel-title-action" @click="addcategory(block)">
		               			Add Category
		               		</a>
		            	</span>
		             	<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
		         	</div>

		          	<div v-if="block.child.length > 0" :id="block.id" class="panel-collapse collapse in">
							{{block.child.name}} 
		             	<div  class="panel-body open">
		           						
								<ul>
									<li v-for='child in block.child'>
										
										<span class="category-title"><u>{{child.name}}</u> <a href="">Add New Post</a></span>

										<ul v-if="child.posts.length > 0">
											<li v-for="post in child.posts" class="posts-list">											
												
												<a href="#viewpost" class="list-title" data-toggle="modal" @click="showpost(post)">
													<i  v-if="post.status == 'draft'" class="fa fa-toggle-off" aria-hidden="true"></i>
													<i v-if="post.status == 'published'" class="fa fa-toggle-on" aria-hidden="true"></i>
													{{post.title}}
												</a>

												<small>
														by
													<i v-if="post.user"><a href="">{{post.user.firstname}}</a></i>
													on
													<i>{{post.created_at | vueAgoTime}}</i>
												</small>
												<span class="action-text">
													<a href="#editpost" class="list-title" data-placement="top" title="Edit" data-toggle="modal" v-on:click.prevent @click="editpost(post)">
							                     <i class="fa fa-pencil" aria-hidden="true"></i>
							                  	</a>
							                  	<a href="" data-toggle="tooltip" data-placement="top" title="Delete" v-on:click.prevent @click="deletepost(post.id)">
							               			<i class="fa fa-trash-o" aria-hidden="true"></i>
							               		</a>
												</span>
											</li>
										</ul>
										<ul v-else>
											<span class="list-info-text">
												No posts found under <b>{{child.name}}</b> 
												<a href="#newpost" data-toggle="modal" @click="selectedcatpost(child)"> Add New Post</a> 
												under {{child.name}} 
											</span>
										</ul>		
									</li>

								</ul>
		             	</div>
		          	</div>
		          	<div v-else class="panel-collapse collapse in">
		          		<span class="info-text">
		          			<i>No Categories Found,add new Category under category page</i>
		          		</span>
		          	</div>

	         	</div>
			</div>

			<div id="modal">
				<viewpost :post="post" ></viewpost>	
				<newpost :categories="categories" :tags="tags" :selcat="selectedpostcat"  @recordupdated="refreshRecord"></newpost>	
				<editpost :categories="categories" :tags="tags" :epost="post"  @recordupdated="refreshRecord"></editpost>
				<newwebblock :block="block" @recordupdated="refreshRecord"></newwebblock>		
			</div>
		</div>
	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				block:'',
				blocks:{},
				post:'',
				categories:[],
				selectedpostcat:{},
				parentcategory:'',
            tags:[],
			}
		},
		watch:{

		},
		methods:{
			paginate(){
				axios.get('post/create')
				.then((response) => {
						console.log(response.data.blocks)
						this.blocks=response.data.blocks
						this.categories = response.data.categories
                  		this.tags = response.data.tags
					})
				.catch((error) => console.log(error))
			},
			refreshRecord(record){
				this.paginate()
			},
			showpost(post){				
				this.post = post
			},
			editpost(post){
				this.post = post
			},
			selectedcatpost(category){
				this.selectedpostcat = category
			},
			addcategory(block){
				this.block = block
			},
			deletepost(id){
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

		          axios.delete('post/'+id)
		          	.then(response =>{		          	
		            	this.blocks=response.data;
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
			blockname(block){
				this.block = block
			},
			statusupdate(status){
				console.log(status)
			}
		},
		mounted(){
			this.paginate()
		}
	};
</script>

<style lang="scss" Scoped>
	.panel-title-action{
		font-size: 11px;
		font-weight: 500;
		color: #008EC2 !important;
	}
	.info-text{
		margin:8px;
		font-size: 11px;
		font-weight: 500;
		a{
			font-size: 11px;
			font-weight: 600;
			color: #008EC2;
		}
	}
	.list-info-text{

		font-size: 11px;
		font-weight: 500;
		a{
			font-size: 11px;
			font-weight: 500;
		}
	}
	.action-text{
		margin-left: 10px;
		i{ margin: 0 2px; }
	}
	.category-title{
		color: #008EC2;
		font-weight: 600;
		a{
			font-size: 11px;
			font-weight: 500;
		}
	}
	ul{
		margin:0 !important;
		padding: 0 !important;
	}
	li{
		margin: !important;
		padding: 0 !important;
	}

	.posts-list{
		margin-top: 5px !important;
		margin-left: 10px;
	}

	.dark{
		background-color: #F2F5F7 !important
	}

	.multiselect__option{
		//margin:0 !important;
		//padding: 0 !important;
	}
	.multiselect__element{
		//margin:0 !important;
		//padding: 0 !important;
	}
</style>