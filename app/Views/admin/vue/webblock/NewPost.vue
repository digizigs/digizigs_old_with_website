<template>
	<div class="modal fade right w80" id="newpost" role="dialog"  data-backdrop="false">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

        	<!--Modal Header-->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" @click="modalclose">&times;</button>
            <h4 class="modal-title" id="defaultModalLabel">New Post ({{block}})</h4>
          </div>
          <!--Modal Header-->
          
          <!--Modal Body-->
          <div class="modal-body">
            
            <div class="row">
              
              <div class="col-md-8 col-xs-12">
                
                <div class="form-group wp-input">
                   <div class="form-line">
                      <label class="form-label">Post Title</label>
                      <input type="text" class="form-control input-sm" v-model="post.title"> 
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
                    <ckeditor :editor="editor" v-model="post.body" :config="editorConfig"></ckeditor>                        
                </div>


              </div>

              <div class="col-md-4 col-xs-12">
                
              

                <div class="mat-card">
                  <div class="card-header">
                    <h5>Status & Visiblity</h5>
                    <button class="btn btn-dark btn-sm pull-right btn-publish">Publish</button>
                  </div>
                  <div class="card-block">
                    <div class="wp-input radio">
                        <input name="status" type="radio" id="radio_1" checked="" value="published" v-model="post.status" v-bind:value="draft">
                        <label for="radio_1">Published</label>
                        <input name="status" type="radio" id="radio_2" value="draft" v-model="post.status">
                        <label for="radio_2">Draft</label>
                     </div>
                  </div>
                </div>

                <div class="mat-card pb10">
                  <div class="card-header">
                    <h5>Catagories</h5>
                  </div>
                  <div class="card-block">
                    <multiselect  v-model="value" 
                                        tag-placeholder="Add this as new tag" 
                                        placeholder="Select Category" 
                                        label="name"
                                        track-by="id"                                      
                                        :options="options" 
                                        :multiple="true" 
                                        :taggable="false"
                                        @input="updateSelected">    
                                   </multiselect>
                  </div>
                </div>

                <div class="mat-card pb10">
                  <div class="card-header">
                    <h5>Tags</h5>
                  </div>
                  <div class="card-block">
                    <multiselect  v-model="value" 
                                        tag-placeholder="Add this as new tag" 
                                        placeholder="Select or Add tags" 
                                        label="name"
                                        track-by="id"                                      
                                        :options="tags" 
                                        :multiple="true" 
                                        :taggable="true"
                                        @input="updateSelected" 
                                        @tag="addTag">    
                                   </multiselect>
                  </div>
                </div>

                <div class="mat-card">
                  <div class="card-header">
                    <h5>Feature Image</h5>
                  </div>
                  <div class="card-block ">

                    <div class="avatar-preview imgUp img-thumbnail form-control" style="margin:auto;">                                                
                      
                    </div>
                    <label class="btn btn-dark btn-sm form-control" style="margin-top: 20px;">
                       Browse Image
                       <input type="file" id="imageUpload" class="uploadFile img" style="width: 0px;height: 0px;overflow: hidden;">
                    </label>             
                  </div>
                </div>


              </div>



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
    props:['block'],
		data(){
			return{
        submitbutton:'',
        editor: ClassicEditor,
        editorData: '',
        editorHeight:'500px',
        editorConfig: {},
        value: null,
        options: [{"id":4,"name":"admin","description":"sdsdsd","guard_name":"web","created_at":"2019-06-17 22:10:48","updated_at":"2019-06-18 23:22:34"},{"id":3,"name":"new role","description":"asddadds","guard_name":"web","created_at":"2019-06-17 22:10:40","updated_at":"2019-06-18 23:29:00"},{"id":2,"name":"Test role","description":"sasdadasdaad","guard_name":"web","created_at":"2019-06-17 22:10:31","updated_at":"2019-06-18 23:35:00"},{"id":1,"name":"superadmin","description":"f","guard_name":"web","created_at":"2019-06-03 20:49:10","updated_at":"2019-06-18 23:26:38"}],
        tags:[],
        post:{}

			}
		},
		watch:{

		},
		methods:{
			modalclose(){

			},
      updateSelected(){
        console.log('@input')
      },
      addTag (newTag) {
          const tag = {
              name: newTag,
              id: newTag,
          }
          this.options.push(tag)
          this.value.push(tag)
      },
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

   .ck-content { min-height:440px; }
    
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