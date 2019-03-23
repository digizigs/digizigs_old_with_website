<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="addservices" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  <h4 class="modal-title"><b>New Service</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">
                   

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12">
                        <i><small>Poduct Name</small></i>
                        <input class="form-control input-sm" type="text"  v-model="service.name">
                        <span v-if="errors.name" :class="['label label-danger']">{{ errors.name[0] }}</span>
                      </div> 
                    </div><br>

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12" >
                        <i><small>Product description</small></i>
                        <textarea class="form-control input-sm"  cols="30" rows="3"  v-model="service.desc"></textarea>
                        <span v-if="errors.desc" :class="['label label-danger']">{{ errors.desc[0] }}</span>
                      </div> 
                    </div><br>

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12">
                        <i><small>Product Cost</small></i>
                        <input class="form-control input-sm" type="text" v-model="service.bill">
                        <span v-if="errors.bill" :class="['label label-danger']">{{ errors.bill[0] }}</span>
                      </div> 
                    </div><br>

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12">
                        <i><small>Product Deadline</small></i>
                        <input class="form-control input-sm" type="text" v-model="service.tat">
                        <span v-if="errors.tat" :class="['label label-danger']">{{ errors.tat[0] }}</span>
                      </div> 
                    </div>
                    
                    
                    <div class="form-group">
                      <button class="btn btn-dark btn-sm pull-right" @click="addservice">Add Service</button>  
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
				service:{name:'',desc:'',bill:'',tat:''},
				success:'',
				errors:[],
        error_message:'',
				services:{},
			}
		},
		watch:{

		},
		methods:{
			addservice(){
				axios.post('service',this.service)
		          	.then(data => {
		          		//console.log(response.data);
						//this.services=response.data						
						this.$emit('recordupdated',data),
						this.success='Service added successfully'
			            this.service={}
						$('#addservices').modal('hide');

						toast({
				  			type: 'success',
				  			title: 'New Service added successfully'
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

<style type="text/css" Scoped>

	

</style>