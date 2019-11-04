<template>
	<div class="modal fade" id="newpost" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"  aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
	    <div class="modal-content tx-14">

	      	<div class="modal-header">
		        <h6 class="modal-title" id="exampleModalLabel3">
		        	Add New Post for {{ page.page_name}}
		        </h6>
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      	</div>

	      	<div class="modal-body">
	        	
	  			
	  				<div class="row">
						<div class="col col-md-12">
			        		

								<div class="form-group row">
								    <label class="col-form-label col-sm-2 pt-0">Post Type</label>
								    <div class="col-sm-12 col-xs-12">

								      	<div class="custom-control custom-radio">
										  	<input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" value="link" v-model="post.type" checked v-on:change="radio('link')">
										  	<label class="custom-control-label" for="customRadio1">Link Post</label>
										</div>

										<div class="custom-control custom-radio">
										  	<input type="radio" id="customRadio2" name="customRadio" class="custom-control-input" value="image" v-model="post.type" v-on:change="radio('image')">
										  	<label class="custom-control-label" for="customRadio2">Image Post</label>
										</div>

									</div>
								</div>
							

							  	<div class="form-group row">
							    	<label for="inputPassword3" class="col-sm-2 col-form-label">Post Link</label>
							    	<div class="col-sm-12 col-xs-12">
							      		<input type="text" class="form-control" id="inputPassword3" placeholder="Post link" v-model="post.link">
							    	</div>
							  	</div>

							  	<div class="custom-file">
								  	<input type="file" class="custom-file-input" id="customFile" @change="processFile($event)">
								  	<label class="custom-file-label" for="customFile">Choose file</label>
								</div>


							  	<div class="form-group row">
								    <label for="inputPassword3" class="col-sm-2 col-form-label">Post Content</label>
								    <div class="col-sm-12">
								      <textarea class="form-control" name="" id="" cols="30" rows="10" v-model="post.message"></textarea>
								    </div>
							  	</div>


						</div>

		        	</div>
	  		

          	</div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary tx-13" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary tx-13" @click="publishPost">Publish Post</button>
            </div>

	    </div>

	    </div>
	  </div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['page'],
		data(){
			return{
				search:'',
				post:{'type':'link'},
				img:''
			}
		},
		watch:{

		},
		methods:{
			publishPost(){
				NProgress.start();
				this.post.page_id = this.page.page_id
				this.post.access_token = this.page.access_token
				axios.post('facebook/post/publish',this.post)
	                .then((response) => {
	                	console.log(response.data)
	                	this.$emit('postcreated',response.data), 
	                	$('#newpost').modal('hide');
		                toast({
		                    type: 'success',
		                    title: 'New Post added successfully'
		                })
	                	NProgress.done()
	              	})
	              	.catch((error) => {
	                      
	           	})
			},
			processFile($event){

			},
			radio(type){
				this.post.type = type
			}
		},
		created(){
		
		}
	};

</script>

<style lang="scss" Scoped>
	.custom-radio{
		margin-right: 20px;
	}

	textarea{
		width: 100%;
		border-radius: 5px;
	}

	.mt-20{
		margin-top: 20px;
	}
</style>