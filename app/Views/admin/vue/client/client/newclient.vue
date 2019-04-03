<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="addclient" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  
                  <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> New Client</h4>
                </div>
                <div class="modal-body">
                  
                  <!--span v-if="error_message.length > 0" >
                    <li v-for="error in errors" class="alert-danger">{{error[0]}}</li>
                  </span-->
                  <form  role="form" @submit.prevent="" class="form-horizontal">
                                   
                    

                  

                    <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

                        <div class="panel">

                          <a class="panel-heading" role="tab" id="headingOne" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="panel-title">Client Basic Details</h4>
                          </a>
                          <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                            <div class="panel-body">
                              <div class="form-group glow-input">
                                  <div class="col-sm-12 col-xs-12 col-xs-12">
                                    <b><i><small>Name</small></i></b>
                                    <input class="form-control input-sm" type="text"    v-model="client.client_name">
                                    <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
                                  </div> 
                                </div>

                                <div class="form-group glow-input">
                                  <div class="col-sm-12 col-xs-12">
                                    <b><i><small>Website</small></i></b>
                                    <input class="form-control input-sm" type="text"    v-model="client.client_website">
                                    <span v-if="errors.client_website" :class="['label label-danger']">{{ errors.client_website[0] }}</span>                               
                                  </div> 
                                </div>

                                <div class="form-group glow-input">
                                  <div class="col-sm-12 col-xs-12">
                                    <b><i><small>Email</small></i></b>
                                    <input class="form-control input-sm" type="text"    v-model="client.client_email"> 
                                    <span v-if="errors.client_email" :class="['label label-danger']">{{ errors.client_email[0] }}</span>                   
                                  </div> 
                                </div>

                                <div class="form-group glow-input">
                                  <div class="col-sm-12 col-xs-12">
                                    <b><i><small>Phone Number</small></i></b>
                                    <input class="form-control input-sm" type="text"   v-model="client.client_phone">
                                    <span v-if="errors.client_phone" :class="['label label-danger']">{{ errors.client_phone[0] }}</span>
                                  </div> 
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel">
                            <a class="panel-heading collapsed" role="tab" id="headingTwo" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                              <h4 class="panel-title">Contact Person Details</h4>
                            </a>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
                              <div class="panel-body">
                                <div class="form-group glow-input">
                                  <div class="col-sm-12 col-xs-12 col-xs-12">
                                    <b><i><small>First Name</small></i></b>
                                    <input class="form-control input-sm" type="text"    v-model="client.contact_first_name">
                                  </div>

                                   <div class="col-sm-12 col-xs-12 col-xs-12">
                                    <b><i><small>Last Name</small></i></b>
                                    <input class="form-control input-sm" type="text"    v-model="client.contact_last_name">
                                  </div> 

                                   <div class="col-sm-12 col-xs-12 col-xs-12">
                                    <b><i><small>Email</small></i></b>
                                    <input class="form-control input-sm" type="text"    v-model="client.contact_email">
                                  </div> 

                                   <div class="col-sm-12 col-xs-12 col-xs-12">
                                    <b><i><small>Phone</small></i></b>
                                    <input class="form-control input-sm" type="text"    v-model="client.contact_phone">
                                  </div>  
                                </div>
                              </div>
                            </div>
                        </div>

                        <div class="panel">
                          <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="panel-title">Client's Address</h4>
                          </a>
                          <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                            <div class="panel-body">
                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12 col-xs-12">
                                  <b><i><small>Line 1</small></i></b>
                                  <input class="form-control input-sm" type="text"    v-model="client.address_line_1">
                                </div>
                              </div>
                              <div class="form-group glow-input">
                                 <div class="col-sm-12 col-xs-12 col-xs-12">
                                  <b><i><small>Line 2</small></i></b>
                                  <input class="form-control input-sm" type="text"    v-model="client.address_line_2">
                                </div>
                              </div>
                              <div class="form-group glow-input">
                                 <div class="col-sm-12 col-xs-12 col-xs-12">
                                  <b><i><small>Street/Landmark</small></i></b>
                                  <input class="form-control input-sm" type="text"    v-model="client.address_street">
                                </div>
                              </div>
                              <div class="form-group glow-input">
                                 <div class="col-sm-12 col-xs-12 col-xs-12">
                                  <b><i><small>City</small></i></b>
                                  <input class="form-control input-sm" type="text"    v-model="client.address_city">
                                </div>
                              </div>
                              <div class="form-group glow-input">
                                 <div class="col-sm-12 col-xs-12 col-xs-12">
                                  <b><i><small>State/Province</small></i></b>
                                  <input class="form-control input-sm" type="text"    v-model="client.address_state">
                                </div>
                              </div>
                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12 col-xs-12">
                                  <b><i><small>Postal Code</small></i></b>
                                  <input class="form-control input-sm" type="text"    v-model="client.address_postal">
                                </div>
                              </div>
                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12 col-xs-12">
                                  <b><i><small>Country</small></i></b>
                                  <input class="form-control input-sm" type="text"    v-model="client.address_country">
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel">
                          <a class="panel-heading collapsed" role="tab" id="headingThree" data-toggle="collapse" data-parent="#accordion" href="#collapsefour" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="panel-title">Additional Notes</h4>
                          </a>
                          <div id="collapsefour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                            <div class="panel-body">
                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12 col-xs-12">
                                  <b><i><small>Public Note</small></i></b>
                                  <textarea class="form-control input-sm"  v-model="client.public_note"></textarea>
                                </div>
                              </div>

                              <div class="form-group glow-input">
                                <div class="col-sm-12 col-xs-12 col-xs-12">
                                  <b><i><small>Private Note</small></i></b>
                                  <textarea class="form-control input-sm"  v-model="client.private_note"></textarea>
                                </div>
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
				client:{
          client_name:'',
          client_website:'',
          client_phone:'',
          client_email:'',
          contact_first_name:'',
          contact_last_name:'',
          contact_email:'',
          contact_phone:'',
          address_line_1:'',
          address_line_2:'',
          address_street:'',
          address_city:'',
          address_state:'',
          address_postal:'',
          address_country:'',
          public_note:'',
          private_note:''
        },
				success:'',
				errors:[],
        error_message:'',
				clients:{},
			}
		},
		watch:{

		},
		methods:{
		  addclient(){
        axios.post('client',this.client)
            .then(data => {
              //console.log(data);
              //this.services=response.data           
              this.$emit('recordupdated',data),
              this.success='Service added successfully'
              this.client={}
            $('#addclient').modal('hide');
            this.client={};

            toast({
                type: 'success',
                title: 'New Client added successfully'
            })

          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            this.error_message = error.response.data.message;
            //console.log(this.errors); 

            /*toast({
                type: 'warning',
                title: 'Please fill the basic details'
            })*/
            new PNotify({
                title: 'New Thing',
                text: 'Just to let you know, something happened.',
                type: 'info',
                styling: 'bootstrap3'
            })

          })
      }
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>