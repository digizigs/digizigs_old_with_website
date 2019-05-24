<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="addservices" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" @click="modal_close" >&times;</button>
                  <h4 class="modal-title"><b>Add New Service</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">                

                    <div class="form-group form-float">
                      <div class="form-line">
                         <input type="text" class="form-control" v-model="newservice.name">
                         <label class="form-label error">Service Name</label>
                      </div>
                      <div class="error-message" v-if="errors.name">
                        <small><i>{{ errors.name[0] }}</i></small>
                      </div>
                      <div v-else>
                        <small><i>Name of the service</i></small>
                      </div>
                    </div>

                    <div class="form-group form-float">
                      <div class="form-line">
                         <input type="text" class="form-control" v-model="newservice.desc">
                         <label class="form-label error">Service Description</label>
                      </div>
                      <div class="error-message" v-if="errors.desc">
                        <small><i>{{ errors.desc[0] }}</i></small>
                      </div>
                      <div v-else>
                        <small><i>Breif description about service</i></small>
                      </div>
                    </div>

                    <div class="form-group form-float">
                      <div class="form-line">
                         <input type="text" class="form-control" v-model="newservice.bill">
                         <label class="form-label error">Service Charge</label>
                      </div>
                      <div class="error-message" v-if="errors.bill">
                        <small><i>{{ errors.bill[0] }}</i></small>
                      </div>
                      <div v-else>
                        <small><i>Billing amount for each service</i></small>
                      </div>
                    </div>


                    <div class="form-group form-float">
                      <div class="form-line" >
                         <input type="text" class="form-control" v-model="newservice.tat">
                         <label class="form-label error">Product Deadline</label>
                      </div>
                      <div class="error-message" v-if="errors.tat">
                        <small><i>{{ errors.tat[0] }}</i></small>
                      </div>
                      <div v-else>
                        <small><i>Time for project completion</i></small>
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