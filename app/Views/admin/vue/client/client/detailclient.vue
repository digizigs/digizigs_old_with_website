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
                  <div class="x_content">

                    <div class="col-xs-3">
                      <!-- required for floating -->
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs tabs-left">
                        <li class="active"><a href="#home" data-toggle="tab" aria-expanded="false">Details</a>
                        </li>
                        <li class=""><a href="#profile" data-toggle="tab" aria-expanded="false">Contact</a>
                        </li>
                        <li class=""><a href="#messages" data-toggle="tab" aria-expanded="true">Address</a>
                        </li>
                        <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Notes</a>
                        </li>
                      </ul>
                    </div>

                    <div class="col-xs-9">
                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div class="tab-pane" id="home">
                          <p class="lead">Home tab</p>
                          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher
                            synth. Cosby sweater eu banh mi, qui irure terr.</p>
                        </div>
                        <div class="tab-pane" id="profile">Profile Tab.</div>
                        <div class="tab-pane active" id="messages">Messages Tab.</div>
                        <div class="tab-pane" id="settings">Settings Tab.</div>
                      </div>
                    </div>

                    <div class="clearfix"></div>

                  </div>
                  <ul class="list-unstyled timeline">
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag">
                            <span>Details</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title"><a>Client Name</a></h2><p class="excerpt">{{recrd.client_name}}</p>                          
                          <h2 class="title"><a>Client Website</a></h2><p class="excerpt">{{recrd.client_website}}</p>
                          <h2 class="title"><a>Client Email</a></h2><p class="excerpt">{{recrd.client_email}}</p>
                          <h2 class="title"><a>Client Phone</a></h2><p class="excerpt">{{recrd.client_phone}}</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag">
                            <span>Contact</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title"><a>First Name</a></h2><p class="excerpt">{{recrd.contact_first_name}}</p>                         
                          <h2 class="title"><a>Last Name</a></h2><p class="excerpt">{{recrd.contact_last_name}}</p>
                          <h2 class="title"><a>Email</a></h2><p class="excerpt">{{recrd.contact_email}}</p>
                          <h2 class="title"><a>Phone</a></h2><p class="excerpt">{{recrd.contact_phone}}</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag">
                            <span>Address</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title"><a>Line 1</a></h2><p class="excerpt">{{recrd.address_line_1}}</p>                          
                          <h2 class="title"><a>Line 2</a></h2><p class="excerpt">{{recrd.address_line_2}}</p>
                          <h2 class="title"><a>Street/Landmark</a></h2><p class="excerpt">{{recrd.address_street}}</p>
                          <h2 class="title"><a>City</a></h2><p class="excerpt">{{recrd.address_city}}</p>
                          <h2 class="title"><a>State/Province</a></h2><p class="excerpt">{{recrd.address_state}}</p>
                          <h2 class="title"><a>Postal Code</a></h2><p class="excerpt">{{recrd.address_postal}}</p>
                          <h2 class="title"><a>Postal Code</a></h2><p class="excerpt">{{recrd.address_country}}</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="block">
                        <div class="tags">
                          <a href="" class="tag">
                            <span>Notes</span>
                          </a>
                        </div>
                        <div class="block_content">
                          <h2 class="title"><a>Public Note</a></h2><p class="excerpt">{{recrd.private_note}}</p>                         
                          <h2 class="title"><a>Private Note</a></h2><p class="excerpt">{{recrd.public_note}}</p>                        
                        </div>
                      </div>
                    </li>
                  </ul>
                  
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