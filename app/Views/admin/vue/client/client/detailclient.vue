<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="detailclient" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                  <h4 class="modal-title green"><b>{{recrd.client_name}}</b></h4>
                </div>
                <div class="modal-body">                                 
              
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content111" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Details</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content222" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Contact</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content333" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Address</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content444" role="tab" id="profile-tab2" data-toggle="tab" aria-expanded="false">Notes</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content111" aria-labelledby="home-tab" style="margin-left:20px;">
                            <div class="project_detail">
                              <p class="title">Name</p>
                              <p>{{recrd.client_name}}</p>
                              <p class="title">Website</p>
                              <p>{{recrd.client_website}}</p>
                              <p class="title">Email</p>
                              <p>{{recrd.client_email}}</p>
                              <p class="title">Phone</p>
                              <p>{{recrd.client_phone}}</p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content222" aria-labelledby="profile-tab" style="margin-left:20px;">
                          <div class="project_detail">
                            <p class="title">First Name</p>
                            <p>{{recrd.contact_first_name}}</p>
                            <p class="title">Last Name</p>
                            <p>{{recrd.contact_last_name}}</p>
                            <p class="title">Email</p>
                            <p>{{recrd.contact_email}}</p>
                            <p class="title">Phone</p>
                            <p>{{recrd.contact_phone}}</p>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content333" aria-labelledby="profile-tab" style="margin-left:20px;">
                          <div class="project_detail">
                            
                              <p class="title">Line 1</p>
                              <p>{{recrd.address_line_1}}</p>
                            
                            
                              <p class="title">Street/Landmark</p>
                              <p>{{recrd.address_street}}</p>
                            
                            
                              <p class="title">City</p>
                              <p>{{recrd.address_city}}</p>
                            
                            
                              <p class="title">State/Province</p>
                              <p>{{recrd.address_state}}</p>
                            
                            
                              <p class="title">Postal Code</p>
                              <p>{{recrd.address_postal}}</p>
                            
                            
                              <p class="title">Country</p>
                              <p>{{recrd.address_country}}</p>
                            
                            
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content444" aria-labelledby="profile-tab" style="margin-left:20px;">
                           <div class="project_detail">
                            <p class="title">Public Note</p>
                            <p>{{recrd.private_note}}</p>
                            <p class="title">Private Note</p>
                            <p>{{recrd.public_note}}</p>
                          </div>
                        </div>

                      </div>
                    </div>

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