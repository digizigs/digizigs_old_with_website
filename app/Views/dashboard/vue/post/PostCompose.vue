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
                  <li class="nav-item"><a href="" class="nav-link" v-on:click.prevent @click="postType('post')"><i data-feather="maximize"></i> <span>Published</span></a></li>
                  <li class="nav-item"><a href="" class="nav-link" v-on:click.prevent @click="postType('post')"><i data-feather="minimize"></i> <span>Draft</span></a></li>
                  <li class="nav-item"><a href="" class="nav-link" v-on:click.prevent @click="postType('post')"><i data-feather="trash"></i> <span>Trash</span></a></li>

                  <li class="nav-label mg-t-25">Blocks</li>
                  <li v-for="block in blockdata" class="nav-item">
                     <a href="" class="nav-link" v-on:click.prevent @click="postType(block.name)">
                        <i class="fa fa-cubes" aria-hidden="true"></i>
                        <span>{{block.name}}</span>
                     </a>
                  </li>

                  <li class="nav-label mg-t-25">Categories</li>
                  <li v-for="category in categorydata" class="nav-item">
                     <a href="" class="nav-link" v-on:click.prevent @click="postType(category.name)">
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
                 <input type="search" class="form-control" placeholder="Search..." v-model="search">
             </div>
             <nav class="nav d-none d-sm-flex mg-l-auto">
                 <a href="" class="nav-link"><i data-feather="help-circle"></i></a>
                 <a href="" class="nav-link"><i data-feather="grid"></i></a>
                 <a href="" class="nav-link"><i data-feather="align-left"></i></a>
             </nav>
         </div><!-- content-header -->

      <div class="mail-group-body">
            <div class="pd-10 pd-lg-10 pd-xl-10">
               <div class="pull-right pd-5">
                  <pagination :input="posts" @pagechange="paginate"></pagination>
               </div>
            </div>
         <div class="pd-10 pd-lg-10 pd-xl-10">
                <div class="content-components">
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
                      
                        <tr v-for="post in posts.data">                  
                          <td>{{post.title}}</td>
                          <td>{{post.description}}</td>
                          <td>{{post.user.name}}</td>
                          <td>
                              <span v-for="cat in post.categories" class="badge badge-info cat-badge">{{cat.name}}</span>
                           </td>
                           <td>
                              <a href="" v-on:click.prevent @click="editPost(post.id)"><i class="fa fa-pencil-square" aria-hidden="true"></i></a>
                              <a href="" v-on:click.prevent @click="deletePost(post.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                           </td>
                        </tr>                    

                      </tbody>
                    </table>
                  </div>
                </div>
            </div>
      
      </div><!-- mail-group-body -->
    </div><!-- mail-group -->

    <div class="mail-content">

         <div class="post-compose">

        <div class="mail-content-header d-none">
          <a href="" id="mailContentClose" class="link-02 d-none d-lg-block  mg-r-20"><i data-feather="arrow-left"></i></a>
          
          <div class="media">       
            <div class="media-body mg-l-10">
                <h4  class="mg-b-2 tx-13">Create New Post</h4>
                <span class="d-block tx-11 tx-color-03"></span>
            </div><!-- media-body -->
          </div><!-- media -->
          
          <nav  class="nav nav-icon-only mg-l-auto">
            <a href="" class="d-sm-block btn btn-primary btn-xs" v-on:click.prevent @click="publishPost">
              {{submitbutton}}
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
                             <input type="text" name="title" class="form-control form-control-sm" placeholder="Post Title" v-model="post.title">
                         </div>

                         <div class="form-group wp-input">
                             <label for="email">Post Description</label>
                             <input type="text" name="description" class="form-control form-control-sm" placeholder="Post Description" v-model="post.description">
                         </div>

                         <editor :value="editortext" @input="editorValue"></editor>
                     </div>

                     <div class="col-lg-3 col-sm-12">
                         <div data-label="Style 2" class="df-example">
                         <div id="accordion7" class="accordion ">
                         
                             <div class="accordian-title"><b class="">Status & Visiblity</b></div>              
                             <div class="accordion-body p-2 d-flex">                             
                                 <div class="custom-control custom-radio">
                                    <input type="radio"  id="customRadio1" class="custom-control-input" value="published" v-model="post.status" v-on:change="radio('publish')">
                                    <label class="custom-control-label" for="customRadio1">Publish</label>
                                 </div>

                                 <div class="custom-control custom-radio mg-sm-l-30 mg-xs-l-30">
                                    <input type="radio"  id="customRadio2" class="custom-control-input" value="draft" v-model="post.status" v-on:change="radio('draft')">
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

         </div><!--Post Compose area--> 
    </div><!-- mail-content -->

    </div><!-- mail-wrapper -->

</template>

<script type="text/javascript">

  export default{
    
    data(){
      return{
               search:'',
               posttype:'all',
               submitbutton:'Publish',
           blockdata:[],
               blocks:[],
               categorydata:[],
               category:[],
               tagdata:[],
               tags:[],
               posts:[],
               post:{'status':'published'},
               image:null,
               editortext:'Enter your content here'
      }
    },
    computed:{
      

    },
    watch:{
         category(){
           if(this.catvalue !== null){
             this.post.categories = this.category.map(x => x.id)
           }
         },
         tags(){
           if(this.tagvalue !== null){
             this.post.tags = this.tags.map(x => x.name)
           }
         }  
      
    },
    methods:{
         paginate(page){
            NProgress.start();
            if (typeof page === 'undefined'){
                page=1;
            }
            axios.get('post/create?page=' + page,{params:{filter:this.search}})
               .then((response) => {
                  console.log(response.data)
                  this.blockdata = response.data.blocks
                  this.categorydata = response.data.categories
                  this.posts = response.data.posts
               })
               .catch((error) => console.log(error))
            NProgress.done();
         },
         postType(type){
            console.log(type)
         },
         publishPost(){
            NProgress.start();
            axios.post('post',this.post)
                 .then((response) => {
                 //console.log(response.data)
                 //this.$emit('recordupdated',response.data),                            
                 //this.modalclose()
                  this.blockdata = response.data.blocks
                  this.categorydata = response.data.categories
                  this.posts = response.data.posts
                  $('body').removeClass('mail-content-show');
                  this.post = {'status':'published'}
                  this.editortext = ''
                 toast({
                    type: 'success',
                    title: 'New Post added successfully'
                 })

              })
              .catch((error) => {
                 this.errors = error.response.data
                 this.titleerror = true          
            })
            NProgress.done()
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
         editorValue(e){
            this.post.body = e
         },
         radio(type){
            //console.log(type)
            if(type == 'publish'){
               this.submitbutton = 'Publish'
               this.post.status = 'published' 
            }else{
               this.submitbutton = 'Save Draft'
               this.post.status = 'draft' 
            }
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

               axios.delete('post/'+id)
                  .then((response) =>{ 
                     console.log(response.data)                 
                     this.blockdata = response.data.blocks
                     this.categorydata = response.data.categories
                     this.posts = response.data.posts
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
         editPost(id){
            console.log('Edit '+ id)
         }
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