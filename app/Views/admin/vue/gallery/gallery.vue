<template>
	<section>
		<div class="col-md-12">
			<vue-dropzone id="dropzone" :options="dropzoneOptions" :useCustomSlot=true v-on:vdropzone-queue-complete="sendingEvent">
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

                        <img style="width: 100%; display: block;" v-bind:src="med.uri" v-bind:alt="image">
                        <div class="mask">
                          <p>Your Text</p>
                          <div class="tools tools-bottom">
                            <a href="#"><i class="fa fa-link"></i></a>
                            <a href="#"><i class="fa fa-pencil"></i></a>
                            <a href="#"><i class="fa fa-times"></i></a>
                          </div>
                        </div>
                      </div>
                      <div class="caption">
                        <p>Snow and Ice Incoming for the South</p>
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


	export default{
		components: {
		    vueDropzone: vue2Dropzone
		  },
		data(){
			return{
				dropzoneOptions: {
			        url: 'formSubmit',
			        thumbnailWidth: 200,
			        thumbnailheight: 50,
        			addRemoveLinks: true,
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