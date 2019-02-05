<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="editservices" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title"><b>Update Service</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">
                   

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12">
                        <i><small>itle of Service</small></i>
                        <input class="form-control input-sm" type="text"  required="Please ente a Role Name" v-model="recrd.name">
                      </div> 
                    </div>

                    <div class="form-group glow-input">                   
                      <div class="col-md-12 col-xs-12">
                        <i><small>Description Of service</small></i>
                        <textarea class="form-control input-sm" id="" cols="30" rows="5" required="" v-model="recrd.description"></textarea>
                      </div> 
                    </div>

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12">
                        <i><small>Billing charge of service</small></i>
                        <input class="form-control input-sm" type="text" required="Please ente a Role Name" v-model="recrd.charge">
                      </div> 
                    </div>

                    <div class="form-group glow-input">
                      <div class="col-md-12 col-xs-12">
                        <i><small>Expected Completion Time</small></i>
                        <input class="form-control input-sm" type="text" required="Please ente a Role Name" v-model="recrd.duration">
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
			},
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>