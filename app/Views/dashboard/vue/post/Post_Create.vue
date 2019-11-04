<template>
	<div class="modal fade" id="newpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"  aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	    <div class="modal-content tx-14">

	      <div class="modal-header">
	      	<a href="" class="btn btn-primary btn-sm" v-on:click.prevent v-text="submittext" @click="publish"></a>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <div class="modal-body">
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

                         <editor @input="editorValue"></editor>
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

                             <div class="accordian-title"><b>Category</b></div>              
                             <div class="accordion-body p-2">
                                 <multiselect  v-model="category" 
                                   placeholder="Select Category" 
                                   label="name"
                                   track-by="id"
                                   openDirection="bottom"
                                   :max-height="150"
                                   :hideSelected="true"                                      
                                   :options="cat" 
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
	      </div>

	    </div>
	  </div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['cat','tag'],
		data(){
			return{
				search:'',
				posts:[],
				post:{'status':'published'},
            categorydata:[],
            category:[],
            tagdata:[],
            tags:[],
            image:null,
            submittext:'Publish'
			}
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
			publish(){
				this.$emit('submit',this.post)
				this.post = {'status':'published'}
			},
			editorValue(e){
				this.post.body = e
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
         radio(type){
            //console.log(type)
            if(type == 'publish'){
               this.submittext = 'Publish'
               this.post.status = 'published' 
            }else{
               this.submittext = 'Save Draft'
               this.post.status = 'draft' 
            }
         },
		},
		created(){
		
		}
	};

</script>

<style lang="scss" Scoped>
	.modal{
		padding: 0px !important;
		.modal-content{
			padding: 0px !important;
			.modal-body{
				padding: 0px !important;
			}
		}
	}
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
</style>