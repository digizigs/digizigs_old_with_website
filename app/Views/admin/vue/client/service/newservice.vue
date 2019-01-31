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
                        <input class="form-control input-sm" type="text"  required="Please ente a Role Name" v-model="service.name">
                        <i><small>Title of Service</small></i>
                      </div> 
                    </div><br>

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12" >
                        <textarea class="form-control input-sm"  cols="30" rows="5" required="" v-model="service.desc"></textarea>
                        <i><small>Description Of service</small></i>
                      </div> 
                    </div><br>

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12">
                        <input class="form-control input-sm" type="text" required="Please ente a Role Name" v-model="service.bill">
                        <i><small>Billing charge of service</small></i>
                      </div> 
                    </div><br>

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12">
                        <input class="form-control input-sm" type="text" required="Please ente a Role Name" v-model="service.tat">
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
					.catch((error) => this.errors(error))


				
	
			}
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>

	

</style>