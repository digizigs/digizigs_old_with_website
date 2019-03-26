<template>
	<section>
		<div class="col-md-12">
			<vue-dropzone id="dropzone" :options="dropzoneOptions" :useCustomSlot=true v-on:vdropzone-queue-complete="sendingEvent" ref="dropzone">
		      <div class="dropzone-custom-content">
		        <h3 class="dropzone-custom-title">Drag and drop to upload content!</h3>
		        <div class="subtitle">...or click to select a file from your computer</div>
		      </div>
		    </vue-dropzone>
		</div>
		<div class="col-md-12">
			<div class="gal-area">
				<div class="col-md-55" v-for="med,key in media.data">
					
                    <div class="thumbnail">
                      <div class="image view view-first">

                        <img style="width: 100%; display: block;" v-bind:src="med.uri" alt="image">
                        <div class="mask">
                          
                        </div>
                      </div>
                      <div class="caption">
                        <p><a href="" v-on:click.prevent @click="deleteimage(med.id)">Remove <i class="fa fa-times" ></i></a></p>
                      </div>
                    </div>
                </div>
			</div>
		</div>

	</section>
</template>

<script type="text/javascript">

	import vue2Dropzone from 'vue2-dropzone'
	import 'vue2-dropzone/dist/vue2Dropzone.min.css'
	var currentFile = null;

	export default{
		components: {
		    vueDropzone: vue2Dropzone
		  },
		data(){
			return{
				dropzoneOptions: {
			        url: 'gallery',
			        thumbnailWidth: 200,
			        thumbnailheight: 50,       			
        			dictDefaultMessage: "<i class='fa fa-cloud-upload'></i>UPLOAD ME",
        			headers: {
		               "X-CSRF-TOKEN": document.head.querySelector("[name=csrf-token]").content
		            }
			    },
			    media:{},
			}
		},
		watch:{

		},
		methods:{

			sendingEvent(){
				axios.get('gallery/create')
				.then((response) => {this.media=response.data})//this.appointments=response.data
				.catch((error) => console.log(error))

				toast({
                	type: 'success',
                	title: 'Media added successfully'
            	})
            	//window.location.reload(true);
            	//.removeFile(this.file)
			},
			deleteimage(id){
				swalWithBootstrapButtons({
		          title: 'Delete media?',
		          text: "You won't be able to revert this!",
		          type: 'warning',
		          showCancelButton: true,
		          confirmButtonText: 'Yes, delete it!',
		          cancelButtonText: 'No, cancel!',
		          reverseButtons: true
		        }).then((result) => {
		          if (result.value) {

		            axios.delete('gallery/'+id)
		            .then(response =>{
		            	this.media=response.data  
		            })
		            .catch((error) => {
		                           
		            });

		            swalWithBootstrapButtons(
		              'Deleted!',
		              'Client deleted successfully',
		              'success'
		            )
		          } 
		        })
			}
		},
		created(){
			axios.get('gallery/create')
			.then((response) => {this.media=response.data})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>

	#dropzone{
		border: 2px dashed #00b782;
		padding: 0;
		margin: 0;
		height: 240px;
	}
	.dropzone-custom-content {
	  position: absolute;
	  top: 50%;
	  left: 50%;
	  transform: translate(-50%, -50%);
	  text-align: center;
	}

	.dropzone-custom-title {
	  margin-top: 0;
	  color: #00b782;
	}

	.subtitle {
	  color: #314b5f;
	}

	.dz-image{
		margin: 0;
		height: 150px;
	}
	.gal-area{
		padding: 20px 0;
	}
	
</style>