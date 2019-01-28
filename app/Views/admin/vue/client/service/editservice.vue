<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="editservices" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  <h4 class="modal-title"><b>Update Service</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="">
                   

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Service</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text"  required="Please ente a Role Name" v-model="recrd.name">
                        <i><small>The name is how it appears.</small></i>
                      </div> 
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Description</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="" cols="30" rows="5" required="" v-model="recrd.description"></textarea>
                        <i><small>Breif description of service</small></i>
                      </div> 
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Service Charge</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" required="Please ente a Role Name" v-model="recrd.charge">
                        <i><small>Billing charge of service</small></i>
                      </div> 
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Duration</label>
                      <div class="col-sm-10">
                        <input class="form-control" type="text" required="Please ente a Role Name" v-model="recrd.duration">
                        <i><small>Expected Completion Time</small></i>
                      </div> 
                    </div>
                    
                    
                    <hr><br>
                    
                    <button class="btn btn-dark btn-sm" @click="updateservice">Update</button>
                    
                  </form>
                  
                  
                </div>

              
                
              </div>
            </div>
        </div>
	</section>
</template>

<script type="text/javascript">
	export default{
		props:['recrd'],
		data(){
			return{
				service:{name:'',desc:'',bill:'',tat:''},
				success:'',
				errors:'',
        errormessage:'',
				services:{},
			}
		},
		watch:{

		},
		methods:{
			updateservice(){
         axios.put('service/'+this.recrd.id,this.recrd)
          .then(data=>{
            this.success='Appointment Updated successfully'
            this.$emit('recordupdated',data)
            this.service={}
            $('#editservices').modal('hide');

            toast({
                type: 'success',
                title: 'Service Updated successfully'
            })

          }) 

          .catch((error) => {
            this.errors=error.response.data;
            this.errormessage=this.errors.message;
          });
			}
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>