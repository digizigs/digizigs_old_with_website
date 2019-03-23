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

                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content111" aria-labelledby="home-tab" style="margin-left:25px;">
                            <div class="project_detail">
                              <b><i class="title"><i class="fa fa-user" aria-hidden="true"></i> Name</i></b>
                              <p>{{recrd.client_name}}</p>
                              <b><i class="title"><i class="fa fa-globe" aria-hidden="true"></i> Website</i></b>
                              <p>{{recrd.client_website}}</p>
                              <b><i class="title"><i class="fa fa-envelope" aria-hidden="true"></i> Email</i></b>
                              <p>{{recrd.client_email}}</p>
                              <b><i class="title"><i class="fa fa-phone" aria-hidden="true"></i> Phone</i></b>
                              <p>{{recrd.client_phone}}</p>
                            </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content222" aria-labelledby="profile-tab" style="margin-left:25px;">
                          <div class="project_detail">
                            <b><i class="title"><i class="fa fa-info" aria-hidden="true"></i> First Name</i></b>
                            <p>{{recrd.contact_first_name}}</p>
                            <b><i class="title"><i class="fa fa-info" aria-hidden="true"></i> Last Name</i></b>
                            <p>{{recrd.contact_last_name}}</p>
                            <b><i class="title"><i class="fa fa-envelope" aria-hidden="true"></i> Email</i></b>
                            <p>{{recrd.contact_email}}</p>
                            <b><i class="title"><i class="fa fa-phone" aria-hidden="true"></i> Phone</i></b>
                            <p>{{recrd.contact_phone}}</p>
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content333" aria-labelledby="profile-tab" style="margin-left:25px;">
                          <div class="project_detail">
                            
                              <b><i class="title"><i class="fa fa-map-o" aria-hidden="true"></i>Line 1</i></b>
                              <p>{{recrd.address_line_1}}</p>

                              <b><i class="title"><i class="fa fa-map-o" aria-hidden="true"></i>Line 2</i></b>
                              <p>{{recrd.address_line_2}}</p>
                            
                            
                              <i class="title"><i class="fa fa-language" aria-hidden="true"></i>Street/Landmark</i>
                              <p>{{recrd.address_street}}</p>
                            
                            
                              <b><i class="title"><i class="fa fa-map-o" aria-hidden="true"></i>City</i></b>
                              <p>{{recrd.address_city}}</p>
                            
                            
                              <b><i class="title"><i class="fa fa-map-o" aria-hidden="true"></i>State/Province</i></b>
                              <p>{{recrd.address_state}}</p>
                            
                            
                              <b><i class="title"><i class="fa fa-map-pin" aria-hidden="true"></i>Postal Code</i></b>
                              <p>{{recrd.address_postal}}</p>
                            
                            
                              <b><i class="title"><i class="fa fa-globe" aria-hidden="true"></i>Country</i></b>
                              <p>{{recrd.address_country}}</p>
                            
                            
                          </div>
                        </div>
                        <div role="tabpanel" class="tab-pane fade" id="tab_content444" aria-labelledby="profile-tab" style="margin-left:25px;">
                           <div class="project_detail">
                            <b><i class="title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>Public Note</i></b>
                            <p>{{recrd.private_note}}</p>
                            <b><i class="title"><i class="fa fa-sticky-note-o" aria-hidden="true"></i>Private Note</i></b>
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
  .fa{
    margin-right: 10px;
  }

</style>