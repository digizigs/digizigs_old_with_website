<template>
    <div class="filemgr-content" >
        
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

        <div class="filemgr-content-body" >
            <div class="pd-10 pd-lg-10 pd-xl-10">
                <div class="container ">
                    <div class="row">

                        <div class="col-lg-8 col-sm-12">
                            
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

                        <div class="col-lg-4 col-sm-12">
                            <div data-label="Style 2" class="df-example">
                            <div id="accordion7" class="accordion ">

                                
                                <div class="accordian-title">
                                    <b class="">
                                        Status & Visiblity
                                    </b>                             
                                </div>              
                                <div class="accordion-body p-2">
                                    <div class="card-body d-flex">
                                        <div class="custom-control custom-radio">
                                        <input type="radio"  id="customRadio1" name="status" class="custom-control-input" checked="" value="publish" v-model="post.status">
                                        <label class="custom-control-label" for="customRadio1">Publish</label>
                                        </div>

                                        <div class="custom-control custom-radio mg-sm-l-30 mg-xs-l-30">
                                        <input type="radio"  id="customRadio2" name="status" class="custom-control-input" value="draft" v-model="post.status">
                                        <label class="custom-control-label" for="customRadio2">Draft</label>
                                        </div>

                                        

                                    </div>
                                </div>

                                <div class="accordian-title">
                                    <b class="">
                                        Blocks
                                    </b>                             
                                </div>              
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

                                <div class="accordian-title">
                                    <b class="">
                                        Category
                                    </b>                             
                                </div>              
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

                                <div class="accordian-title">
                                    <b class="">
                                        Tags
                                    </b>                             
                                </div>              
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


                                
                                <div class="accordion-title"><b>Feature Image</b></div>
                                <div class="accordion-body p-2">
                                    
                                    <div class="avatar-preview  img-thumbnail form-control" style="margin:auto;"></div>
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
        </div><!-- filemgr-content-body -->

    </div><!-- filemgr-content -->
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
                search:'',
                blockdata:[],
								blocks:[],
								categorydata:[],
								category:[],
                tagdata:[],
                tags:[],
                post:{'status':'publish'},
                image:null
			}
		},
		watch:{

		},
		methods:{
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
            
		}
	};

</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss" Scoped>
	
	.accordian-title.ui-state-active{
		color:#0073AA;
		font-weight: 500;
	}
	.accordian-title{
		color:#008EC2;
		font-weight: 500;
	}
	.accordian-title:hover{
		color:#0073AA;
	}
</style>