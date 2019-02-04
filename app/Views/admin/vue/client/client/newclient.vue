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
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Contacts</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Address</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content4" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Additional Info</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Name</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">                              
                            </div> 
                          </div>

                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12">
                              <i><small>Website</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientemail">                              
                            </div> 
                          </div>

                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12">
                              <i><small>Email</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientemail">                              
                            </div> 
                          </div>

                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12">
                              <i><small>Phone Number</small></i>
                              <input class="form-control input-sm" type="text"   v-model="client.contact_name">                             
                            </div> 
                          </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>First Name</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div>

                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Last Name</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div> 

                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Email</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div> 

                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Phone</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div>  
                          </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="profile-tab">
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Line 1</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Line 2</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Street/Landmark</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>City</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>State/Province</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Postal Code</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Country</small></i>
                              <input class="form-control input-sm" type="text"    v-model="client.clientname">
                            </div>
                          </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content4" aria-labelledby="profile-tab">
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Public Note</small></i>
                              <textarea class="form-control input-sm"></textarea>
                            </div>
                          </div>

                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Private Note</small></i>
                              <textarea class="form-control input-sm"></textarea>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>

                  
                  
                   

                    <hr>
                   
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