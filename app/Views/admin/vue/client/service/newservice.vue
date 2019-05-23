<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="addservices" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" @click="modal_close" >&times;</button>
                  <h4 class="modal-title"><b>New Service</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">
                   
                  
                    <div class="form-group">
                      <label for="" class="col-sm-3" >Service Name</label> 
                        <div class="col-sm-9">
                          <div class="form-line">
                            <input type="text" class="form-control" v-model="newservice.name">
                          </div>
                          <div class="error-message" v-if="errors.name">
                            {{ errors.name[0] }}
                          </div>
                        </div>
                    </div>


                    <div class="form-group">
                      <label for="" class="col-sm-3">Service Description</label> 
                        <div class="col-sm-9">
                          <div class="form-line">
                            <textarea rows="2" class="form-control no-resize"  v-model="newservice.desc"></textarea>
                          </div>
                          <div class="error-message" v-if="errors.desc">
                            {{ errors.desc[0] }}
                          </div>
                        </div>
                    </div>


                    <div class="form-group">
                      <label for="" class="col-sm-3" >Service Charge</label> 
                        <div class="col-sm-9">
                          <div class="form-line">
                            <input type="text" class="form-control" v-model="newservice.bill">
                          </div>
                          <div class="error-message" v-if="errors.bill">
                            {{ errors.bill[0] }}
                          </div>
                        </div>
                    </div>


                    <div class="form-group">
                      <label for="" class="col-sm-3" >Product Deadline</label> 
                        <div class="col-sm-9">
                          <div class="form-line">
                            <input type="text" class="form-control" v-model="newservice.tat">
                          </div>
                          <div class="error-message" v-if="errors.tat">
                            {{ errors.tat[0] }}
                          </div>
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
        newservice:{},				
				success:'',
				errors:'',		
			}
		},
		watch:{

		},
		methods:{
      modal_close(){
        this.errors=''
      },
			addservice(){
				axios.post('service',this.newservice)
		        .then(data => {		        
						  this.$emit('recordupdated',data),					 
			        this.newservice={}
						  $('#addservices').modal('hide');
  						toast({
  				  			type: 'success',
  				  			title: 'New Service added successfully'
  						})

					})
					.catch((error) => {
            this.errors = error.response.data.errors;         
          })


				
	
			}
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>

	

</style>