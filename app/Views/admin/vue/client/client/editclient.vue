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
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">

                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content11" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content22" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Contacts</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content33" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Address</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content44" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Additional Info</a>
                        </li>
                      </ul>

                      <div id="myTabContent" class="tab-content">

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content11" aria-labelledby="home-tab">

                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Name</small></i>
                              <input class="form-control input-sm" type="text"    v-model="recrd.client_name">
                              <span v-if="errors.client_name" :class="['label label-danger']">{{ errors.client_name[0] }}</span>    
                            </div> 
                          </div>

                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12">
                              <i><small>Website</small></i>
                              <input class="form-control input-sm" type="text"    v-model="recrd.client_website">
                              <span v-if="errors.client_website" :class="['label label-danger']">{{ errors.client_website[0] }}</span>                               
                            </div> 
                          </div>

                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12">
                              <i><small>Email</small></i>
                              <input class="form-control input-sm" type="text"    v-model="recrd.client_email"> 
                              <span v-if="errors.client_email" :class="['label label-danger']">{{ errors.client_email[0] }}</span>                   
                            </div> 
                          </div>

                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12">
                              <i><small>Phone Number</small></i>
                              <input class="form-control input-sm" type="text"   v-model="recrd.client_phone">
                              <span v-if="errors.client_phone" :class="['label label-danger']">{{ errors.client_phone[0] }}</span>
                            </div> 
                          </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content22" aria-labelledby="profile-tab">
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>First Name</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.contact_first_name">
                            </div>

                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Last Name</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.contact_last_name">
                            </div> 

                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Email</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.contact_email">
                            </div> 

                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Phone</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.contact_phone">
                            </div>  
                          </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content33" aria-labelledby="profile-tab">
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Line 1</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.address_line_1">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Line 2</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.address_line_2">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Street/Landmark</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.address_street">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>City</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.address_city">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                             <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>State/Province</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.address_state">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Postal Code</small></i>
                              <input class="form-control input-sm" type="text" v-model="recrd.address_postal">
                            </div>
                          </div>
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Country</small></i>
                              <input class="form-control input-sm" type="text"    v-model="recrd.address_country">
                            </div>
                          </div>
                        </div>

                        <div role="tabpanel" class="tab-pane fade" id="tab_content44" aria-labelledby="profile-tab">
                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Public Note</small></i>
                              <textarea class="form-control input-sm"  v-model="recrd.public_note"></textarea>
                            </div>
                          </div>

                          <div class="form-group glow-input">
                            <div class="col-sm-12 col-xs-12 col-xs-12">
                              <i><small>Private Note</small></i>
                              <textarea class="form-control input-sm"  v-model="recrd.private_note"></textarea>
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