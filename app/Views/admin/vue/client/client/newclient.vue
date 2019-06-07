<template>
	<section>
		<!--Add service-->
        <div class="modal fade modal-right-slide" id="addclient" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" @click="modalclose">&times;</button>
                  
                  <h4 class="modal-title" id="defaultModalLabel">New Client</h4>
                </div>
                
                <div class="modal-body">


                  <form  role="form" @submit.prevent="" class="form-horizontal">

                    <div class="material-tab-pane">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#basic_details" aria-controls="settings" role="tab" data-toggle="tab">Basic Details</a></li>
                            <li role="presentation"><a href="#contact_person" aria-controls="settings" role="tab" data-toggle="tab">Contact Person</a></li>
                            <li role="presentation"><a href="#contact_address" aria-controls="settings" role="tab" data-toggle="tab">Address</a></li>
                            <li role="presentation"><a href="#notes" aria-controls="settings" role="tab" data-toggle="tab">Notes</a></li>
                        </ul>

                        <div class="tab-content">
                            
                            <!--Basic Details-->
                            <div role="tabpanel" class="tab-pane fade in active" id="basic_details">
                                <div class="row">
                                    <div class="col-md-12">                                   

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">Name</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="text" class="form-control input-sm" v-model="newclient.client_name">
                                              </div>
                                              <div class="error-message" v-if="errors.client_name">
                                                {{ errors.client_name[0] }}
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">Website</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="text"  class="form-control input-sm" v-model="newclient.client_website">
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">Email</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="text" class="form-control input-sm" v-model="newclient.client_email">
                                              </div>
                                              <div class="error-message" v-if="errors.client_email" >
                                                {{ errors.client_email[0] }}
                                              </div>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">Contact Number</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="text" class="form-control input-sm" v-model="newclient.client_phone">
                                              </div>
                                              <div class="error-message" v-if="errors.client_phone">
                                                {{ errors.client_phone[0] }}
                                              </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>                     
                            
                            <!--Contact info-->
                            <div role="tabpanel" class="tab-pane fade in" id="contact_person">
                                <div class="row">
                                  <div class="col-md-12">                                 

                                      <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">Name</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="text"  class="form-control input-sm" v-model="newclient.contact_name">
                                              </div>
                                            </div>
                                        </div>

                                      <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">Email</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="email" class="form-control input-sm" v-model="newclient.contact_email">
                                              </div>
                                            </div>
                                        </div>

                                      <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">Contact Number</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="text" class="form-control input-sm" v-model="newclient.contact_phone">
                                              </div>
                                            </div>
                                        </div>
                                  </div>                                  
                                </div>
                            </div>
                             
                            <!-- Address -->
                            <div role="tabpanel" class="tab-pane fade in" id="contact_address">
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label ">Address</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="text" class="form-control input-sm">
                                              </div>
                                            </div>
                                        </div>                                  

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label ">Landmark</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="text" class="form-control input-sm">
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">City</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <select name="" class="form-control input-sm" >
                                                  <option selected="selected" value="0">-Select-</option> 
                                                  <option value="1">uncategorised</option> 
                                                  <option value="2">Blog</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label" >State</label> 
                                            <div class="col-sm-10">
                                            
                                                <select name="" class="form-control input-sm" >
                                                  <option selected="selected" value="0">-Select-</option> 
                                                  <option value="1">uncategorised</option> 
                                                  <option value="2">Blog</option>
                                                </select>
                                         
                                            </div>
                                        </div>

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">Postal Code</label> 
                                            <div class="col-sm-10">
                                              <div class="form-line">
                                                <input type="text" class="form-control input-sm">
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group wp-input">
                                          <label for="" class="col-sm-2 control-label">Country</label> 
                                            <div class="col-sm-10">                                              
                                                <select name="" class="form-control input-sm" >
                                                  <option selected="selected" value="0">-Select-</option> 
                                                  <option value="1">uncategorised</option> 
                                                  <option value="2">Blog</option>
                                                </select>
                                            </div>
                                        </div>
                                                                 
                                    </div>
                                                                  
                                </div>
                            </div>
                            
                            <!-- Notes -->
                            <div role="tabpanel" class="tab-pane fade in" id="notes">
                                <div class="row">                                
                                  <div class="col-md-12">
                                  

                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-2 control-label">Public Note</label> 
                                        <div class="col-sm-10">
                                          <div class="form-line">
                                            <textarea rows="3" class="form-control input-sm"  v-model="newclient.public_note"></textarea>
                                          </div>
                                        </div>
                                    </div>


                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-2 control-label">Private Note</label> 
                                        <div class="col-sm-10">
                                          <div class="form-line">
                                            <textarea rows="3" class="form-control input-sm" v-model="newclient.private_note"></textarea>
                                          </div>
                                        </div>
                                    </div>                              


                                  </div>
                                </div>
                            </div>

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
        newclient:{},				
				success:'',
				errors:[],
				clients:{},
			}
		},
		watch:{

		},
    computed:{
      validationErrors(){
          let errors = Object.values(this.errors);
          errors = errors.flat();
          return errors;
      }
    },
		methods:{
      modalclose(){
        NProgress.done();
        this.newclient = {};
        this.errors = []
      },
		  addclient(){
        NProgress.start();
        axios.post('client',this.newclient)
            .then(data => {                    
              this.$emit('recordupdated',data),                            
              $('#addclient').modal('hide');             
              this.newclient = {};
            toast({
                type: 'success',
                title: 'New Client added successfully'
            })
            NProgress.done();

          })
          .catch((error) => {
            this.errors = error.response.data.errors;          
          })
      }
		},
	};

</script>

<style type="text/css" Scoped>

  .modal-content{
    border-radius: 1px;
  }
</style>