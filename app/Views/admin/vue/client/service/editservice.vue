<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="editservices" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>{{service.name}}</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">
                   

                    <div class="form-group">
                      <label for="" class="col-sm-3" >Service Name</label> 
                        <div class="col-sm-9">
                          <div class="form-line">
                            <input type="text" class="form-control" v-model="service.name">
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
                            <textarea rows="2" class="form-control no-resize"  v-model="service.description"></textarea>
                          </div>
                          <div class="error-message" v-if="errors.description">
                            {{ errors.description[0] }}
                          </div>
                        </div>
                    </div>


                    <div class="form-group">
                      <label for="" class="col-sm-3" >Service Charge</label> 
                        <div class="col-sm-9">
                          <div class="form-line">
                            <input type="text" class="form-control" v-model="service.charge">
                          </div>
                          <div class="error-message" v-if="errors.charge">
                            {{ errors.charge[0] }}
                          </div>
                        </div>
                    </div>


                    <div class="form-group">
                      <label for="" class="col-sm-3" >Product Deadline</label> 
                        <div class="col-sm-9">
                          <div class="form-line">
                            <input type="text" class="form-control" v-model="service.duration">
                          </div>
                          <div class="error-message" v-if="errors.duration">
                            {{ errors.duration[0] }}
                          </div>
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


</style>