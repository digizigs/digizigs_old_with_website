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
                  
                  <form  role="form" @submit.prevent="">
                   

                    <div class="form-group">
                      <div class="col-sm-12">
                        <input class="form-control" type="text" placeholder="Client Name"  required="Please ente a Role Name" v-model="client.clientname">
                        <i><small>The name is how it appears.</small></i>
                      </div> 
                    </div>

                    <div class="form-group">
                      <div class="col-sm-12">
                        <input class="form-control" type="text" placeholder="Client Email"  required="Please ente a Role Name" v-model="client.clientemail">
                        <i><small>Breif description of service</small></i>
                      </div> 
                    </div>

                    <div class="form-group">
                      <div class="col-sm-12">
                        <input class="form-control" type="text" placeholder="Contact Person Name" required="Please ente a Role Name" v-model="client.contact_name">
                        <i><small>Billing charge of service</small></i>
                      </div> 
                    </div>

                    <div class="form-group">
                      <div class="col-sm-12">
                        <input class="form-control" type="text" placeholder="Contact Person Email" required="Please ente a Role Name" v-model="client.contact_email">
                        <i><small>Billing charge of service</small></i>
                      </div> 
                    </div>

                    <div class="form-group">
                      <div class="col-sm-12">
                        <input class="form-control" type="text" placeholder="Contact Number" required="Please ente a Role Name" v-model="client.contact_phone">
                        <i><small>Expected Completion Time</small></i>
                      </div> 
                    </div>

                    <div class="form-group">
                      <div class="col-sm-12">
                        <textarea class="form-control" name="" id="" cols="30" rows="5" placeholder="Address" v-model="client.address"></textarea>
                        <i><small>Expected Completion Time</small></i>
                      </div> 
                    </div>
                    
                    <div class="form-group">
                      <button class="btn btn-dark btn-sm form-control" >Add Client</button>
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
				services:{},
			}
		},
		watch:{

		},
		methods:{
		
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>