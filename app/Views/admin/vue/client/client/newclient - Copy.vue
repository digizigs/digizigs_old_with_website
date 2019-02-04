<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="addclient" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  <h4 class="modal-title"><b>New Client</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">
                   

                    <div class="form-group glow-input">
                      <div class="col-sm-12 col-xs-12 col-xs-12">
                        <input class="form-control input-sm" type="text"    v-model="client.clientname">
                        <i><small>Name of Client</small></i>
                      </div> 
                    </div>

                    <div class="form-group glow-input">
                      <div class="col-sm-12 col-xs-12">
                        <input class="form-control input-sm" type="text"    v-model="client.clientemail">
                        <i><small>Client Email-id</small></i>
                      </div> 
                    </div>

                    <div class="form-group glow-input">
                      <div class="col-sm-12 col-xs-12">
                        <input class="form-control input-sm" type="text"   v-model="client.contact_name">
                        <i><small>Contact person Name</small></i>
                      </div> 
                    </div>

                    <div class="form-group glow-input">
                      <div class="col-sm-12 col-xs-12">
                        <input class="form-control input-sm" type="text"   v-model="client.contact_email">
                        <i><small>Contact person email</small></i>
                      </div> 
                    </div>

                    <div class="form-group glow-input">
                      <div class="col-sm-12 col-xs-12">
                        <input class="form-control input-sm" type="text"   v-model="client.contact_phone">
                        <i><small>Contact number</small></i>
                      </div> 
                    </div>

                    <div class="form-group glow-input">
                      <div class="col-sm-12 col-xs-12">
                        <textarea class="form-control input-sm" name="" id="" cols="30" rows="5"  v-model="client.address"></textarea>
                        <i><small>Address of client</small></i>
                      </div> 
                    </div>
                    
                    <div class="form-group">
                      <button class="btn btn-dark btn-sm pull-right" @click="addclient" >Add Client</button>
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
				client:{clientname:'',clientemail:'',contact_name:'',contact_email:'',contact_phone:'',address:''},
				success:'',
				errors:'',
				clients:{},
			}
		},
		watch:{

		},
		methods:{
		  addclient(){
        axios.post('client',this.client)
            .then(data => {
              console.log(data);
              //this.services=response.data           
              this.$emit('recordupdated',data),
              this.success='Service added successfully'
              this.client={}
            $('#addclient').modal('hide');

            toast({
                type: 'success',
                title: 'New Client added successfully'
            })

          })
          .catch((error) => {
            this.errors=error.response.data.errors;           
          })
      }
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>