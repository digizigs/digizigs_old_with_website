<template>
	<div class="modal fade right w80" id="newpost" role="dialog"  data-backdrop="false">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

        	<!--Modal Header-->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" @click="modalclose">&times;</button>
            <h4 class="modal-title" id="defaultModalLabel">New Post</h4>
          </div>
          <!--Modal Header-->
          
          <!--Modal Body-->
          <div class="modal-body">
            
            <div class="row">
              
              <form @submit="addpost" enctype="multipart/form-data">

                  <div class="col-md-8 col-xs-12">

                     <div class="form-group wp-input">
                       <div class="form-line" v-bind:class="{ 'form-invalid': titleerror }">
                          <label class="form-label">Post Title</label>
                          <input type="text" class="form-control input-sm" v-model="post.title">
                          <small v-if="this.errors.errors">{{this.errors.errors.title[0]}}</small> 
                       </div>
                     </div>

                     <div class="form-group wp-input">
                       <div class="form-line">
                          <label class="form-label">Post Description</label>
                          <input type="text" class="form-control input-sm" v-model="post.description">
                       </div>
                     </div>

                     <div class="form-group wp-input">
                        <label for="editor1">Post Content</label>
                        <ckeditor :editor="editor" v-model="post.body" :config="editorConfig" @ready="onReadyEditor"></ckeditor>                        
                     </div>

                  </div>

                  <div class="col-md-4 col-xs-12">
                  
                     <div class="mat-card">
                      <div class="card-header">
                        <h5>Status & Visiblity</h5>
                        <button class="btn btn-dark btn-sm pull-right btn-publish">{{submitbutton}}</button>               
                      </div>
                      <div class="card-block">
                        <div class="wp-input radio">
                            <input type="radio" id="radio_1" value="published" v-model="post.status" v-on:change="radio('published')">
                            <label for="radio_1">Published</label>
                            <input type="radio" id="radio_2" value="draft" v-model="post.status" v-on:change="radio('draft')">
                            <label for="radio_2">Draft</label>
                         </div>
                      </div>
                     </div>

                     <div class="mat-card pb10">
                      <div class="card-header">
                        <h5>Catagories</h5>
                      </div>
                      <div class="card-block">
                        <multiselect  v-model="catvalue" 
                                      placeholder="Select Category" 
                                      label="name"
                                      track-by="id"
                                      openDirection="bottom"
                                      :max-height="150"
                                      :hideSelected="true"                                      
                                      :options="categories" 
                                      :multiple="true" 
                                      :taggable="false">    
                        </multiselect>
                      </div>
                     </div>

                     <div class="mat-card pb10">
                      <div class="card-header">
                        <h5>Tags</h5>
                      </div>
                      <div class="card-block">
                        <multiselect  v-model="tagvalue" 
                                      tag-placeholder="Press enter to create a tag" 
                                      placeholder="Select or Add tags" 
                                      label="name"
                                      track-by="id"
                                      openDirection="bottom"                                      
                                      :options="tags" 
                                      :multiple="true" 
                                      :taggable="true" 
                                      @tag="addTag">    
                        </multiselect>
                      </div>
                     </div>

                     <div class="mat-card">
                      <div class="card-header">
                        <h5>Feature Image</h5>
                      </div>
                      <div class="card-block ">

                        <div class="avatar-preview  img-thumbnail form-control" style="margin:auto;">                                                
                          
                        </div>
                        <label class="btn btn-dark btn-sm form-control" style="margin-top: 20px;">
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
                     </div>

                  </div>
               
               </form>


            </div>

             
          </div>
          <!--Modal Body-->

         
        
        </div>
      </div>
  </div>
</template>

<script type="text/javascript">

   import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

	export default{
    props:['categories','tags'],
		data(){
			return{
            titleerror:false,
            submitbutton:'Publish',
            editor: ClassicEditor,
            editorData: '',
            editorHeight:'500px',
            editorConfig: {},
            catvalue: [],
            tagvalue: [],
            post:{'status':'published'},
            errors:{},
            files:null

			}
		},
		watch:{
         catvalue(){
           if(this.catvalue !== null){
             this.post.categories = this.catvalue.map(x => x.id)
           }
         },
         tagvalue(){
           if(this.tagvalue !== null){
             this.post.tags = this.tagvalue.map(x => x.name)
           }
         }
		},
		methods:{
         radio(status){
            if(status == 'published'){
               this.submitbutton = 'Publish'
               this.post.status = 'published' 
            }else{
               this.submitbutton = 'Save Draft'
               this.post.status = 'draft'  
            }
         },
         onReadyEditor(){
           //console.log('Editor Ready')     
         },
   		modalclose(){
            $('#newpost').modal('hide');
            this.post = {'status':'published'}
            this.catvalue = []
            this.tagvalue = []
            this.titleerror = false
            this.file=null
            $('.avatar-preview').css('background-image', '');
            //console.log(this.files)
   		},      
         addTag (newTag) {
            const tag = {
                name: newTag,
                //id: newTag,
            }
            this.tagvalue.push(tag)
         },
         onImageChange(e){
           //console.log(e.target.files[0]);
           this.files = e.target.files || e.dataTransfer.files;
           if (!this.files.length)
                      return;
           this.createImage(this.files[0]);
         },
         createImage(file){
           let reader = new FileReader();
           let vm = this;
           reader.onload = (e) => {
                vm.post.image = e.target.result;
           };
           reader.readAsDataURL(file);
         },
         addpost(e){        
           NProgress.start();
           e.preventDefault();
           axios.post('webblock',this.post)
                 .then((response) => {
                 console.log(response.data)
                 this.$emit('recordupdated',response.data),                            
                 this.modalclose()
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
         }
		},
		created(){
		   
		}
	};

</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss" Scoped>
  /* .ck-editor__editable {
    min-height: 500px;
   } */

  .ck-content { min-height:335px; }
    
  .panel{
    border:1px solid #F8F9FA !important;
  }
  .panel-heading{
    
  }
  .modal-body{
    background: #F1F1F1 !important;
    padding-bottom: 0 !important
  }
  .modal-content{
    background: #F1F1F1 !important;
    padding-bottom: 0 !important
  }

  .multiselect{
    padding:0 !important;
    border: 1px solid #ddd;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.07);
    background-color: #fff;
    color: #32373c;
    outline: none;
    transition: 0.05s border-color ease-in-out;
    font-size: 12px;
    .multiselect__tags{
      font-size: 12px;
      border:none;
      //border-bottom: 1px solid #e8e8e8;
      border-radius:2px;

    }
    .multiselect__content-wrapper{
      .multiselect__content{
        .multiselect__element{
          .multiselect__option{
            font-size: 12px !important;
          }
        }
      }
    }
  }

  .pb10{
    padding-bottom: 10px;
  }

  .mat-card{
    border-radius: 2px;
  }
  .btn-publish{
    margin-top: 5px;
  }
  .radio{
    label{
      margin-top: -2px !important;
      margin-right: 10px;
    }

  }
</style>