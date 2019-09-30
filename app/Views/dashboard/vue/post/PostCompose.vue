<template>

	<div class="mail-wrapper">

		<div class="mail-sidebar">
			<div class="mail-sidebar-body">

				<div class="filemgr-sidebar-header">
                    <h4 class="mg-t-10">Posts</h4>
                </div><!-- filemgr-sidebar-header -->

				<div class="filemgr-sidebar-body">
                    <div class="pd-t-20 pd-b-10 pd-x-20">
                        <ul class="nav nav-aside">

                        <li class="nav-label active">Posts</li>

                        <li class="nav-item">
                            <a href="" class="nav-link">
                                <i data-feather="cast"></i>
                                <span>All Post</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="" class="nav-link" v-on:click.prevent @click="showContent">
                                <i data-feather="plus-circle"></i> 
                                <span>Add Post</span>
                            </a>
                        </li>

                        <li class="nav-label mg-t-25">Post Types</li>
                        <li class="nav-item"><a href="" class="nav-link"><i data-feather="maximize"></i> <span>Published</span></a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i data-feather="minimize"></i> <span>Draft</span></a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i data-feather="trash"></i> <span>Trash</span></a></li>

                        <li class="nav-label mg-t-25">Blocks</li>
                        <li v-for="block in blockdata" class="nav-item">
                           <a href="" class="nav-link">
                              <i class="fa fa-cubes" aria-hidden="true"></i>
                              <span>{{block.name}}</span>
                           </a>
                        </li>

                        <li class="nav-label mg-t-25">Categories</li>
                        <li v-for="category in categorydata" class="nav-item">
                           <a href="" class="nav-link">
                              <i class="fa fa-th-large" aria-hidden="true"></i>
                              <span>{{category.name}}</span>
                           </a>
                        </li>
                     



                        </ul>
                    </div>
                </div>

			</div><!-- mail-sidebar-body -->
		</div><!-- mail-sidebar -->

		<div class="mail-group">

			<div class="filemgr-content-header">
                <div class="content-search">
                    <i data-feather="search"></i>
                    <input type="search" class="form-control" placeholder="Search...">
                </div>
                <nav class="nav d-none d-sm-flex mg-l-auto">
                    <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
                    <a href="" class="nav-link"><i data-feather="grid"></i></a>
                    <a href="" class="nav-link"><i data-feather="align-left"></i></a>
                </nav>
            </div><!-- content-header -->

			<div class="mail-group-body">

			   <div class="pd-10 pd-lg-10 pd-xl-10">
                <div class="container content-components">
                  <div class="table-responsive">
                    <table class="table table-striped mg-b-0">
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

                      
                        <tr v-for="post in posts">                  
                          <td>{{post.title}}</td>
                          <td>{{post.description}}</td>
                          <td>{{post.user.name}}</td>
                          <td>
                              <span v-for="cat in post.categories" class="badge badge-info cat-badge">{{cat.name}}</span>
                           </td>
                           <td>
                              <span><i class="fa fa-pencil-square" aria-hidden="true"></i></span>
                              <span><i class="fa fa-trash" aria-hidden="true"></i></span>
                           </td>
                        </tr>
                        <tr>                  
                          <td>Post Title</td>
                          <td>Here goes the post body</td>
                          <td>Computer Science</td>
                          <td>$120,000</td>
                        </tr>
                        <tr>                  
                          <td>Post Title</td>
                          <td>Here goes the post body</td>
                          <td>Computer Science</td>
                          <td>$120,000</td>
                        </tr>
                        <tr>                  
                          <td>Post Title</td>
                          <td>Here goes the post body</td>
                          <td>Computer Science</td>
                          <td>$120,000</td>
                        </tr>
                        <tr>                  
                          <td>Post Title</td>
                          <td>Here goes the post body</td>
                          <td>Computer Science</td>
                          <td>$120,000</td>
                        </tr>
                        <tr>                  
                          <td>Post Title</td>
                          <td>Here goes the post body</td>
                          <td>Computer Science</td>
                          <td>$120,000</td>
                        </tr>
                     

                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
			
			</div><!-- mail-group-body -->

		</div><!-- mail-group -->

		<div class="mail-content">

			<div class="mail-content-header d-none">
				<a href="" id="mailContentClose" class="link-02 d-none d-lg-block  mg-r-20"><i data-feather="arrow-left"></i></a>
				
				<div class="media">				
					<div class="media-body mg-l-10">
					    <h4  class="mg-b-2 tx-13">Create New Post</h4>
					    <span class="d-block tx-11 tx-color-03"></span>
					</div><!-- media-body -->
				</div><!-- media -->
				
				<nav  class="nav nav-icon-only mg-l-auto">
					<a href="" data-toggle="tooltip" title="Report Spam" class="nav-link d-none d-sm-block">
						<i data-feather="slash"></i>
					</a>
					<a href="" data-toggle="tooltip" title="Mark Unread" class="nav-link d-none d-sm-block" >
						<i data-feather="mail"></i>
					</a>
					<span class="nav-divider d-none d-sm-block"></span>
					<a href="#" data-toggle="tooltip" title="Mark Important" class="nav-link d-none d-sm-block" >
						<i data-feather="star"></i>
					</a>
					<a href="" data-toggle="tooltip" title="Trash" class="nav-link d-none d-sm-block">
						<i data-feather="trash"></i>
					</a>
					<a href="" data-toggle="tooltip" title="Print" class="nav-link d-none d-sm-block">
						<i data-feather="printer"></i>
					</a>
					<a href="" data-toggle="tooltip" title="Options" class="nav-link d-sm-none">
						<i data-feather="more-vertical"></i>
					</a>
				</nav>
			</div><!-- mail-content-header -->

			<div  class="mail-content-body d-none">
				<div class="pd-20 pd-lg-25 pd-xl-30">
					<div class="row">

                        <div class="col-lg-9 col-sm-12">
                            
                            <div class="form-group wp-input">
                                <label for="email">Post Title</label>
                                <input type="text" name="title" class="form-control form-control-sm" placeholder="Post Title">
                            </div>

                            <div class="form-group wp-input">
                                <label for="email">Post Description</label>
                                <input type="text" name="description" class="form-control form-control-sm" placeholder="Post Description">
                            </div>

                            <editor></editor>

                        </div>

                        <div class="col-lg-3 col-sm-12">
                            <div data-label="Style 2" class="df-example">
                            <div id="accordion7" class="accordion ">
                            
                                <div class="accordian-title"><b class="">Status & Visiblity</b></div>              
                                <div class="accordion-body p-2 d-flex">
                                   
                                        <div class="custom-control custom-radio">
                                        <input type="radio"  id="customRadio1" name="status" class="custom-control-input" checked="" value="publish" v-model="post.status">
                                        <label class="custom-control-label" for="customRadio1">Publish</label>
                                        </div>

                                        <div class="custom-control custom-radio mg-sm-l-30 mg-xs-l-30">
                                        <input type="radio"  id="customRadio2" name="status" class="custom-control-input" value="draft" v-model="post.status">
                                        <label class="custom-control-label" for="customRadio2">Draft</label>
                                        </div>                               
                                    
                                </div>

                                <div class="accordian-title"><b>Blocks</b></div>              
                                <div class="accordion-body p-2">
                                    <multiselect  v-model="blocks" 
                                      placeholder="Select Block" 
                                      label="name"
                                      track-by="id"
                                      openDirection="bottom"
                                      :max-height="150"
                                      :hideSelected="true"                                      
                                      :options="blockdata" 
                                      :multiple="true" 
                                      :taggable="false">    
                                    </multiselect>
                                </div>

                                <div class="accordian-title"><b>Category</b></div>              
                                <div class="accordion-body p-2">
                                    <multiselect  v-model="category" 
                                      placeholder="Select Category" 
                                      label="name"
                                      track-by="id"
                                      openDirection="bottom"
                                      :max-height="150"
                                      :hideSelected="true"                                      
                                      :options="categorydata" 
                                      :multiple="true" 
                                      :taggable="false">    
                                    </multiselect>
                                </div>

                                <div class="accordian-title"><b >Tags</b></div>              
                                <div class="accordion-body p-2">
                                    <multiselect
                                         v-model="tagdata" 
                                         tag-placeholder="Add this as new tag" 
                                         placeholder="Search or add a tag" 
                                         label="name" track-by="code"
                                         openDirection="bottom"
                                         :max-height="150"  
                                         :options="tags" 
                                         :multiple="true" 
                                         :taggable="true" 
                                         @tag="addTag">
                                    </multiselect>

                                </div>
                              
                                <div class="accordian-title"><b>Feature Image</b></div>
                                <div class="accordion-body p-2">                                  
                                    <div class="avatar-preview  img-thumbnail form-control" style="width:100%"></div>
                                    <label class="btn btn-wp btn-xs form-control mt-1">
                                        Browse Image
                                        <input type="file" 
                                                id="imageUpload"
                                                ref="fileInput" 
                                                class="uploadFile img" 
                                                v-on:change="onImageChange" 
                                                style="width: 0px;height: 0px;overflow: hidden;"
                                                >
                                    </label> 
                                </div>
                                                            
                            </div><!-- az-accordion -->
                            </div><!-- df-example -->  
                        </div>

                    </div>
				</div>
			</div><!-- mail-content-body -->

		</div><!-- mail-content -->

    </div><!-- mail-wrapper -->

</template>

<script type="text/javascript">

	export default{
		
		data(){
			return{
				   blockdata:[],
               blocks:[],
               categorydata:[],
               category:[],
               tagdata:[],
               tags:[],
               posts:[],
               post:{'status':'publish'},
               image:null
			}
		},
		computed:{
			

		},
		watch:{
			
		},
		methods:{
         paginate(){
            NProgress.start();
            axios.get('post/create')
               .then((response) => {
                  console.log(response.data)
                  this.blockdata = response.data.blocks
                  this.categorydata = response.data.categories
                  this.posts = response.data.posts
               })
               .catch((error) => console.log(error))
            NProgress.done();
         },
         showContent(){
             new PerfectScrollbar('.mail-content-body', {
                 suppressScrollX: true
             });

             $('.mail-group .selected').removeClass('selected');

             $(this).addClass('selected');
             $(this).removeClass('unread');

             $('.mail-content-header').removeClass('d-none');
             $('.mail-content-body').removeClass('d-none');
             $('body').addClass('mail-content-show');
             //console.log('Mail group body clicked')
             
             if(window.matchMedia('(max-width: 1199px)').matches) {
                 $('body').addClass('mail-content-show');
             }

             if(window.matchMedia('(min-width: 768px)').matches) {
                 $('#Sidebar').removeClass('d-md-none');
                 $('#mainMenuOpen').removeClass('d-md-flex');
             }
         },
			addTag (newTag) {
             const tag = {
                 name: newTag,
                 //id: newTag,
             }
             this.tags.push(tag)
             this.tagdata.push(tag)
         },
         onImageChange(e){
             //console.log(e.target.files[0]);
             this.image = e.target.files || e.dataTransfer.files;
             if (!this.image.length)
                         return;
             this.createImage(this.image[0]);
         },
         createImage(file){
             let reader = new FileReader();
             let vm = this;
             reader.onload = (e) => {
                     vm.post.image = e.target.result;
             };
             reader.readAsDataURL(file);
         },
		
		},
		mounted(){		
            $('#accordion7').accordion({
                heightStyle: 'content'
            });
            this.paginate();
		},
		
	};

</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss"  Scoped>
    .accordian-title.ui-state-active{
		color:#0073AA;
		font-weight: 500 !important;
	}
	.accordian-title{
        span{
            display: none;
        }
        padding-top: 10px;
        padding-bottom: 10px;
		color:#008EC2;
		font-weight: 400 !important;
	}
	.accordian-title:hover{
		color:#0073AA;
	}
   .cat-badge{
      margin-right: 5px;
   }
</style>