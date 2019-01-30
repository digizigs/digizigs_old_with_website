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
                  
                  <form  role="form" @submit.prevent="">
                   

                    <div class="form-group">
                      <div class="col-sm-10 col-xs-12">
                        <input class="form-control" type="text" placeholder="Name of the service"  required="Please ente a Role Name" v-model="service.name">
                      </div> 
                    </div><br>

                    <div class="form-group">
                      <div class="col-sm-10 col-xs-12" >
                        <textarea class="form-control" placeholder="Breif description of service"  cols="30" rows="5" required="" v-model="service.desc"></textarea>
                      </div> 
                    </div><br>

                    <div class="form-group">
                      <div class="col-sm-10 col-xs-12">
                        <input class="form-control" type="text" placeholder="Billing charge of service" required="Please ente a Role Name" v-model="service.bill">
                      </div> 
                    </div><br>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Duration</label>
                      <div class="col-sm-10 col-xs-12">
                        <input class="form-control" type="text" required="Please ente a Role Name" v-model="service.tat">
                        <i><small>Expected Completion Time</small></i>
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
				errors:'',
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
					.catch((error) => console.log(error))


				
	
			}
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>