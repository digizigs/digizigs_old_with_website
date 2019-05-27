<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="editservices" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content" >
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>{{service.name}}</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">
                   

                    

                    <div class="form-group wp-input">
                      <div class="form-line">
                         <label class="form-label error">Service Name</label>
                         <input type="text" class="form-control input-sm" v-model="service.name">                        
                      </div>
                      <div class="error-message" v-if="errors.name">
                        {{ errors.name[0] }}
                      </div>
                      <div v-else>
                        <small><i>Name of the service</i></small>
                      </div>
                    </div>

                    <div class="form-group wp-input">
                      <div class="form-line">
                         <label class="form-label error">Service Description</label>
                        
                         <textarea class="form-control input-sm" cols="30" rows="3" v-model="service.desc"></textarea>
                      </div>
                      <div class="error-message" v-if="errors.desc">
                        {{ errors.desc[0] }}
                      </div>
                      <div v-else>
                        <small><i>Breif description about service</i></small>
                      </div>
                    </div>
                  
                    <div class="form-group wp-input">
                      <div class="form-line">
                         <label class="form-label error">Service Charge</label>
                         <input type="text" class="form-control input-sm" v-model="service.charge">
                      </div>
                      <div class="error-message" v-if="errors.charge">
                        {{ errors.charge[0] }}
                      </div>
                      <div v-else>
                        <small><i>Billing amount for each service</i></small>
                      </div>
                    </div>

                    <div class="form-group wp-input">
                      <div class="form-line" >
                         <label class="form-label error">Product Deadline</label>
                         <input type="text" class="form-control input-sm" v-model="service.duration">
                      </div>
                      <div class="error-message" v-if="errors.duration">
                        {{ errors.duration[0] }}
                      </div>
                      <div v-else>
                        <small><i>Time for project completion</i></small>
                      </div>
                    </div>
                    
                    
                    <button class="btn btn-dark btn-sm pull-right" @click="updateservice">Update</button>
                    
                  </form>
                  
                  
                </div>

              
                
              </div>
            </div>
        </div>
	</section>
</template>

<script type="text/javascript">
	export default{
		props:['service'],
		data(){
			return{				
				success:'',
				errors:[],
        errormessage:'',
				services:{},
			}
		},
		watch:{

		},
		methods:{
			updateservice(){
        NProgress.start()
         axios.put('service/'+this.service.id,this.service)
          .then(data=>{      
            this.$emit('recordupdated',data)
            $('#editservices').modal('hide');

            toast({
              type: 'success',
              title: 'Service Updated successfully'
            })
            NProgress.done()

          }) 

          .catch((error) => {
            this.errors = error.response.data.errors;          
          });
			},
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>

.modal-content{
  background-color: #FFFFFF;
}
</style>