

<template>

	<div>

		<div class="filemgr-wrapper">

			<div class="filemgr-sidebar">

			    <div class="filemgr-sidebar-header d-flex">
			        <h4>Facebook Manager</h4>
			    </div>
			    
			    <div class="filemgr-sidebar-body">
			      <div class="pd-t-20 pd-b-10 pd-x-10">
			        

			        <nav class="nav nav-sidebar tx-13">
			          
			            <a v-for="page in pages" v-bind:key="page.id" href="#modal3" class="nav-link " data-toggle="modal" @click="pageClick(page)">
			              <i class="fa fa-file-text" aria-hidden="true"></i> <span>{{page.page_name}}</span>
			            </a>
			          
			        </nav>
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

			      	<div v-if="dataloaded" class="dataloading-msg loader-dots">Wait ....... ! we are loading data from Facebook Graph API </div>

			        <div class="row">
			          
			            <div v-for="page in pages" v-bind:key="page.id" class="col-sm-6 col-md-4">
				              <div class="card card-profile">
				                <img :src=page.cover_photo class="card-img-top" alt="">
				                <div class="card-body tx-13">
				                  <div>
				                    <div class="avatar avatar-lg">
				                        <span class="avatar-initial rounded-circle bg-indigo" style="overflow:hidden;">
				                          <a href="#modal3" data-toggle="modal" @click="pageClick(page)">
				                          	<img :src=page.page_photo alt="">
				                          </a>
				                        </span>
				                      </div>
				                    <h5>{{page.page_name}}</h5>
				                    <p>{{page.category}}</p>

				                    <div class="img-group img-group-sm mg-b-5">
				                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
				                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
				                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
				                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
				                      <img src="https://via.placeholder.com/500" class="img wd-40 ht-40 rounded-circle" alt="">
				                    </div>
				                    <div class="mg-b-25">
				                      <span class="tx-12 tx-color-03 info"><i class="fa fa-bullhorn" aria-hidden="true"></i>{{page.page_posts.length}} Posts</span>
				                      <span class="tx-12 tx-color-03 info"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{page.page_likes}} Likes</span>
				                    </div>
														<a href="#newpost" class="btn btn-block btn-white" data-toggle="modal" @click="createPost(page)" >Add Post</a>
				                    
				                  </div>
				                </div>
				              </div><!-- card -->
			            </div>
			        </div>
			        
			      </div>
			    </div><!-- filemgr-content-body -->
			</div><!-- filemgr-content -->  

		</div><!-- filemgr-wrapper -->

		<div id="modal">
			<facebook-page :page="page"></facebook-page>
			<facebook-post-create :page="page" @postcreated="postCreated"></facebook-post-create>
		</div>

	</div>

		

</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				dataloaded:true,
				search:'',
				pages:[],
				page:''
			}
		},
		watch:{

		},
		methods:{
			pageClick(page){
				console.log(page)
				this.page = page
			},
			createPost(page){
				console.log(page)
				this.page = page
			},
			postCreated(data){
				console.log(data)
			}
		},
		created(){
			NProgress.start();
			axios.get('facebook/create') //,{params:{filter:this.filter,email:this.user.email}}
				.then((response) => {
						this.pages = response.data
						this.dataloaded = false
						console.log(response.data)
						NProgress.done();
					})
				.catch((error) => console.log(error))
			
		}
	};

</script>

<style lang="scss" Scoped>
	.dataloading-msg{
		position: relative;
		top: 45%;
		left: 50%;
		transform: translate(-50%, -50%);
  	-ms-transform: translate(-50%, -50%); /* for IE 9 */
  	-webkit-transform: translate(-50%, -50%); /* for Safari */
	}

	.loader-dots {
	  padding:0.5em 2.2em 0.5em 1em; 
	  border-radius:.3em;
	  color:#fff;
	  border:1px solid #fff; 
	  background:#33759D;
	  display:block; 
	  position:fixed; 
	  top:50%;
	  left:50%;
	  transform:translateX(-50%)  translateY(-50%);
	  font:300 1em/1.5 'Lato',sans-serif; 
	  letter-spacing:1px;
	  &:after { 
	    content:'....';
	    width:0;
	    position:absolute;
	    overflow:hidden;
	    animation:loader-dots-animation 1s infinite;  
	    color: #fff;   
	  }
	}

	@keyframes loader-dots-animation {
	  0%   { width:0.0em; }  
	  50%  { width:1.2em; }      
	  100% { width:0.0em; }    
	}
	*,:before,:after{ box-sizing:border-box; margin:0; padding:0; }

</style>