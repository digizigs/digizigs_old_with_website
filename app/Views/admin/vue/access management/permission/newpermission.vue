<template>
	<section>
		<div class="modal fade" id="newpermission" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">

                <div class="modal-header panel-heading">
                  	<button type="button" class="close" data-dismiss="modal" >&times;</button>
                  	<h4 class="modal-title"><b>New Permission</b></h4>
              	</div>

              	<div class="modal-body">
                	<form  role="form" @submit.prevent="" class="form-horizontal">
                  		<div class="col-md-12">
                  			<div class="form-group">
                              	<label for="" class="col-sm-3" >Permission name</label> 
                                <div class="col-sm-9">
                                  <div class="form-line">
                                    <input type="text" class="form-control" v-model="newpermission.name">
                                  </div>
                                  <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                  </div>
                                </div>
                            </div>
                  		</div>
                  		<div class="form-group">
	                      <button class="btn btn-dark btn-sm pull-right" @click="addclient" >Add Permission</button>
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
			addclient(){
		        axios.post('permissions',this.newpermission)
		            .then(data => {		            	             
		              this.$emit('recordupdated',data),                            
		              $('#newpermission').modal('hide');             
		              this.newpermission = {};
		            toast({
		                type: 'success',
		                title: 'New Permission added successfully'
		            })

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