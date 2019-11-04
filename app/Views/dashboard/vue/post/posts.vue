<template>

	<div>

		<div class="filemgr-wrapper">

			<div class="filemgr-sidebar">

			    <div class="filemgr-sidebar-header d-flex">
			        <h4>Posts</h4>
			    </div>
			    
			    <div class="filemgr-sidebar-body">
			      <div class="pd-t-20 pd-b-10 pd-x-10">
			        
						<ul class="nav nav-aside">
							
								<li class="nav-label active">Posts</li>

                <li class="nav-item">
                    <a href="#newpost" class="nav-link" data-toggle="modal">
                        <i data-feather="plus-circle"></i> 
                        <span>Add Post</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="" class="nav-link" v-on:click.prevent @click="postType('all')" :class="{ active: sidebar == 'all'}">
                        <i data-feather="cast"></i>
                        <span>All Post</span>
                    </a>
                </li>

                <!--li class="nav-label mg-t-25">Post Types</li-->
                <li class="nav-item">
                		<a href="" class="nav-link" v-on:click.prevent @click="postType('published')" :class="{ active: sidebar == 'published'}">
                			<i data-feather="maximize"></i> <span>Published</span>
                		</a>
                </li>
                <li class="nav-item">
                		<a href="" class="nav-link" v-on:click.prevent @click="postType('draft')" :class="{ active: sidebar == 'draft'}">
                			<i data-feather="minimize"></i> <span>Draft</span>
                		</a>
                </li>
             

						</ul>

			      </div>
			    </div><!-- filemgr-sidebar-body -->
			</div><!-- filemgr-sidebar -->

			
			<div class="filemgr-content">
			    <div class="filemgr-content-header">
			      <nav class="nav d-none d-sm-flex mg-l-auto">
			        <a href="" data-toggle="tooltip" title="Download" class="nav-link"><i data-feather="download"></i></a>
			        <a href=""  data-toggle="tooltip" title="Clean" class="nav-link"><i data-feather="repeat"></i></a>
			        <a href=""  data-toggle="tooltip" title="Deletse All" class="nav-link"><i data-feather="trash"></i></a>
			      </nav>
			    </div><!-- filemgr-content-header -->
			    <div class="filemgr-content-body">
			    
			      <div class="pd-10 pd-lg-10 pd-xl-10">
							
							<div class="pd-10 pd-lg-10 pd-xl-10">
	               <div class="pull-right pd-5">
	                  <pagination :input="posts" @pagechange="paginate"></pagination>
	               </div>
	            </div>
			      	

			        <table class="table table-striped mg-b-0 table-light">
	              <thead>
	                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Author</th>
                    <th scope="col">Category</th>
                    <th scope="col">Action</th>
                  </tr>
	              </thead>

	              <tbody>
	                <tr v-for="post in posts.data">
	                	<td>{{post.title}}</td>
                    <td>{{post.description}}</td>
                    <td>{{post.user.name}}</td>
                    <td>
                      <span v-for="cat in post.categories" class="mr-1 badge badge-info cat-badge">{{cat.name}}</span>
                   	</td>
                   	<td>
                      <a href="" class="btn btn-success btn-xs btn-action" v-on:click.prevent @click="editPost(post.id)">Edit</a>
                      <a href="" class="btn btn-warning btn-xs btn-action" v-on:click.prevent @click="deletePost(post.id)">Delete</a>
                    </td>
	                </tr>
	              </tbody>
            	</table>
			        
			      </div>
			    </div><!-- filemgr-content-body -->
			</div><!-- filemgr-content -->  

		</div><!-- filemgr-wrapper -->

		<div id="modal">
			<postcreate :cat = "categories" @submit="publishPost"></postcreate>
			<!--facebook-post-create :page="page" @postcreated="postCreated"></facebook-post-create> -->
		</div>

	</div>

		

</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				dataloaded:true,
				status:'published',
				search:'',
				posts:[],
				post:{},
				page:'',
				categories:[],
				sidebar:'published'
			}
		},
		watch:{

		},
		methods:{
			paginate(page){
		        NProgress.start();
		        if (typeof page === 'undefined'){
		            page=1;
		        }
		        axios.get('post/create?page=' + page,{params:{filter:this.search,status:this.status}})
		          .then((response) => {
		            console.log(response.data)
		              //this.blockdata = response.data.blocks
		            this.categories = response.data.categories
		            this.posts = response.data.posts
		            NProgress.done();
		          })
		          .catch((error) => console.log(error))
        
     		},
			postType(type){
		      this.status = type
		      this.paginate()
		      this.sidebar = type
		    },
	    editPost(id){

	    },
	    deletePost(id){
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
		        	NProgress.start();
		          axios.delete('post/'+id,{params:{status:this.status}})
		          	.then(response =>{
		          		console.log(response.data)		          	
		            	this.categories = response.data.categories
		            	this.posts = response.data.posts
		            	NProgress.done();
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
	    publishPost(e){
	    	this.post = e
	    	NProgress.start();
          	axios.post('post',this.post)
             	.then((response) => {
	             
		            this.categories = response.data.categories
		            this.posts = response.data.posts
		            NProgress.done()
		            $('#newpost').modal('hide'); 
		            toast({
		                type: 'success',
		                title: 'New Post added successfully'
		            })

	          	})
	            .catch((error) => {
	                //this.errors = error.response.data
	                //this.titleerror = true 
	                console.log(error)         
	            })
            
	    }
		},
		mounted(){
			/*NProgress.start();
			axios.get('facebook/create') //,{params:{filter:this.filter,email:this.user.email}}
				.then((response) => {
						this.pages = response.data
						this.dataloaded = false
						console.log(response.data)
						NProgress.done();
					})
				.catch((error) => console.log(error))*/
			$('#accordion7').accordion({
          heightStyle: 'content'
      });
			this.paginate();
		}
	};

</script>

<style lang="scss" Scoped>
	
.btn-action{
	border-radius: 20px !important;
}
.btn-action.btn-success{
	color: #000;
	background-color: #CFF1DE;
  border-color: #377d56;
}
.btn-action.btn-warning{
	background-color: #F8D7DA;
  border-color: #b05961;
}
.table{
	//border: 1px solid grey;
}
.nav-aside .nav-label{
	color: #0073AA;
}
.nav-link.active{
	font-weight: 600;
	color: #008EC2;
}
.nav-link.active:hover{
	color:#0073AA;
}
.nav-link.active:focus{
	color:#0073AA;
}
</style>