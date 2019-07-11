<template>
	<section>
		<div class="modal fade right" id="newpermission" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">

                <div class="modal-header">
                  	<button type="button" class="close" data-dismiss="modal" @click="modalclose">&times;</button>
                  	<h4 class="modal-title"><b>New Permission</b></h4>
              	</div>

              	<div class="modal-body">
                	<form  role="form" @submit.prevent="" class="form-horizontal">
                  		<div class="row">
                  			<div class="form-group wp-input">
                              	<label for="" class="control-label col-sm-3" >Permission name</label> 
                                <div class="col-sm-9 col-xs-12">
                                  <div class="form-line">
                                    <input type="text" class="form-control input-sm" v-model="newpermission.name">
                                  </div>
                                  <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                  </div>
                                </div>
                            </div>

                            <div class="form-group wp-input">
                              	<label for="" class="control-label col-sm-3" >Permission Description</label> 
                                <div class="col-sm-9 col-xs-12">
                                  <div class="form-line">
                                    <textarea class="form-control input-sm" cols="30" rows="5" v-model="newpermission.description"></textarea>
                                  </div>
                                  <div class="error-message" v-if="errors.description">
                                    {{ errors.description[0] }}
                                  </div>
                                </div>
                            </div>
							
							<div class="form-group">
		                      	<button class="btn btn-dark btn-sm pull-right" @click="addclient" >Add Permission</button>
		                    </div>

                  		</div>
                  		
                  	</form>
              	</div>

          		</div>
      		</div>
      	</div>
    </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				newpermission:{},
				errors:''
			}
		},
		watch:{

		},
		methods:{
			modalclose(){
				this.newpermission = {};
				NProgress.done();
			},
			addclient(){
				NProgress.start();
		        axios.post('permissions',this.newpermission)
		            .then(data => {		            	             
		              this.$emit('recordupdated',data),                            
		              $('#newpermission').modal('hide');             
		              this.newpermission = {};
		            toast({
		                type: 'success',
		                title: 'New Permission added successfully'
		            })
		            NProgress.done();

		          })
		          .catch((error) => {
		            this.errors = error.response.data.errors;
		            this.error_message = error.response.data.message;           
		          })
		      }
		},
		created(){
		
		}
	};

</script>

<style lang="scss">

</style>