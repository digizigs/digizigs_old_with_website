<template>
	<section>
		<div class="modal fade" id="editpermission" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">

                <div class="modal-header panel-heading">
                  	<button type="button" class="close" data-dismiss="modal" >&times;</button>
                  	<h4 class="modal-title"><b>{{permission.name}}</b></h4>
              	</div>

              	<div class="modal-body">
                	<form  role="form" @submit.prevent="" class="form-horizontal">
                  		<div class="col-md-12">
                  			<div class="form-group wp-input">
                              	<label for="" class="col-sm-3" >Permission name</label> 
                                <div class="col-sm-9">
                                  <div class="form-line">
                                    <input type="text" class="form-control input-sm" v-model="permission.name">
                                  </div>
                                  <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                  </div>
                                </div>
                            </div>
                  		</div>
                  		<div class="form-group">
	                      <button class="btn btn-dark btn-sm pull-right" @click="updatepermission" >Update Permission</button>
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
		props:['permission'],
		data(){
			return{
				errors:''
			}
		},
		watch:{

		},
		methods:{
			updatepermission(){
				axios.put('permissions/'+this.permission.id,this.permission)
			        .then(data=>{			        	
			            this.$emit('recordupdated',data),
			            $('#editpermission').modal('hide');
			            toast({
			                type: 'success',
			                title: 'Permission Updated successfully'
			            })
			            this.errors=''
			        })
			        .catch((error) => {
			            this.errors=error.response.data.errors;           
			        })
			}
		},
		created(){
		
		}
	};

</script>

<style lang="scss">

</style>