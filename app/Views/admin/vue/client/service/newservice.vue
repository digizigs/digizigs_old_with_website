<template>
	<section>
		<!--Add service-->
        <div class="modal fade modal-right-slide" id="addservices" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" @click="modal_close" >&times;</button>
                  <h4 class="modal-title"><b>Add New Service</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">                                   

                    <div class="form-group wp-input">
                      <label for="" class="col-sm-3 col-xs-3 control-label">Service Name</label> 
                        <div class="col-sm-9 col-md-9 col-xs-9">
                          <div class="form-line">
                            <input type="text" class="form-control input-sm" v-model="newservice.name">
                          </div>
                          <div class="error-message" v-if="errors.name">
                            {{ errors.name[0] }}
                          </div>
                        </div>
                    </div>

                    <div class="form-group wp-input">
                      <label for="" class="col-sm-3 col-xs-3 control-label">Service Description</label> 
                        <div class="col-sm-9 col-md-9 col-xs-9">
                          <div class="form-line">
                            <textarea class="form-control input-sm" cols="30" rows="3" v-model="newservice.desc"></textarea>
                          </div>
                          <div class="error-message" v-if="errors.desc">
                            {{ errors.desc[0] }}
                          </div>
                        </div>
                    </div>

                    <div class="form-group wp-input">
                      <label for="" class="col-sm-3 col-xs-3 control-label">Service Charge</label> 
                        <div class="col-sm-9 col-md-9 col-xs-9">
                          <div class="form-line">
                            <input type="text" class="form-control input-sm" v-model="newservice.bill">
                          </div>
                          <div class="error-message" v-if="errors.bill">
                            {{ errors.bill[0] }}
                          </div>
                        </div>
                    </div>

                    <div class="form-group wp-input">
                      <label for="" class="col-sm-3 col-xs-3 control-label">Product Deadline</label> 
                        <div class="col-sm-9 col-md-9 col-xs-9">
                          <div class="form-line">
                            <input type="text" class="form-control input-sm" v-model="newservice.tat">
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
      newservice(){
        
       
      }
		},
		methods:{
      modal_close(){
        this.errors = ''
        this.newservice = {}
        NProgress.done();
      },
			addservice(){
        NProgress.start();
				axios.post('service',this.newservice)
		        .then(data => {		        
						  this.$emit('recordupdated',data),					 
			        this.newservice={}
						  $('#addservices').modal('hide');
  						toast({
  				  			type: 'success',
  				  			title: 'New Service added successfully'
  						})
              NProgress.done();

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

<style lang="scss">
  .error-message{
    i{
      color: #E45447;
    }
  }

</style>