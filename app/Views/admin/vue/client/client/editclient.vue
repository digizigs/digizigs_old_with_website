<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="editclient" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" @close="colosemodal" >&times;</button>
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                  <h4 class="modal-title green"><b>{{recrd.client_name}}</b></h4>
                </div>
                <div class="modal-body">


                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">

                    <div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">

                      <div class="panel">
                        <a class="panel-heading" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="panel-title">Basic Client Detais</h4>
                        </a>
                        <div id="collapseOne1" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                          <div class="panel-body">

                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Name</small></i></b>
                                <input class="form-control input-sm" type="text"    v-model="recrd.client_name">
                                <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
                              </div> 
                            </div>

                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12">
                                <b><i><small>Website</small></i></b>
                                <input class="form-control input-sm" type="text"    v-model="recrd.client_website">
                                <span v-if="errors.client_website" :class="['label label-danger']">{{ errors.client_website[0] }}</span>                               
                              </div> 
                            </div>

                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12">
                                <b><i><small>Email</small></i></b>
                                <input class="form-control input-sm" type="text"    v-model="recrd.client_email"> 
                                <span v-if="errors.client_email" :class="['label label-danger']">{{ errors.client_email[0] }}</span>                   
                              </div> 
                            </div>

                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12">
                                <b><i><small>Phone Number</small></i></b>
                                <input class="form-control input-sm" type="text"   v-model="recrd.client_phone">
                                <span v-if="errors.client_phone" :class="['label label-danger']">{{ errors.client_phone[0] }}</span>
                              </div> 
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo">
                          <h4 class="panel-title">Contact Person Details</h4>
                        </a>
                        <div id="collapseTwo1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                          <div class="panel-body">
                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>First Name</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.contact_first_name">
                              </div>

                               <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Last Name</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.contact_last_name">
                              </div> 

                               <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Email</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.contact_email">
                              </div> 

                               <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Phone</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.contact_phone">
                              </div>  
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Address</h4>
                        </a>
                        <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">

                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Line 1</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.address_line_1">
                              </div>
                            </div>
                            <div class="form-group glow-input">
                               <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Line 2</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.address_line_2">
                              </div>
                            </div>
                            <div class="form-group glow-input">
                               <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Street/Landmark</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.address_street">
                              </div>
                            </div>
                            <div class="form-group glow-input">
                               <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>City</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.address_city">
                              </div>
                            </div>
                            <div class="form-group glow-input">
                               <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>State/Province</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.address_state">
                              </div>
                            </div>
                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Postal Code</small></i></b>
                                <input class="form-control input-sm" type="text" v-model="recrd.address_postal">
                              </div>
                            </div>
                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Country</small></i></b>
                                <input class="form-control input-sm" type="text"    v-model="recrd.address_country">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="panel">
                        <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseFour" aria-expanded="false" aria-controls="collapseThree">
                          <h4 class="panel-title">Additional Notes</h4>
                        </a>
                        <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                          <div class="panel-body">
                            
                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Public Note</small></i></b>
                                <textarea class="form-control input-sm"  v-model="recrd.public_note"></textarea>
                              </div>
                            </div>

                            <div class="form-group glow-input">
                              <div class="col-sm-12 col-xs-12 col-xs-12">
                                <b><i><small>Private Note</small></i></b>
                                <textarea class="form-control input-sm"  v-model="recrd.private_note"></textarea>
                              </div>
                            </div>
                            
                          </div>
                        </div>
                      </div>

                    </div>
                                                                        
                    <hr>
                   
                    <div class="form-group">
                      <button class="btn btn-dark btn-sm pull-right" @click="updateclient" >Update</button>
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
    props:['recrd'],
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
        errormessage:'',
				clients:{},
			}
		},
		watch:{

		},
		methods:{
		  updateclient(){
         axios.put('client/'+this.recrd.id,this.recrd)
          .then(data=>{
            this.success='Client Updated successfully'
            this.$emit('recordupdated',data)
            this.client={}
            $('#editclient').modal('hide');

            toast({
              type: 'success',
              title: 'Client Updated successfully',
            })

          }) 

          .catch((error) => {
            this.errors = error.response.data.errors;
            this.error_message = error.response.data.message;
            //console.log(this.errors);
          });
      },
      colosemodal(){
        this.client={};
        this.recrd=null;
      }  
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>