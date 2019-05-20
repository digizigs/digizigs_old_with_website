<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="addclient" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  
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

                                        <div class="form-group">
                                          <label for="" class="col-sm-3" >Name</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="text" class="form-control" v-model="newclient.client_name">
                                              </div>
                                              <div class="error-message" v-if="errors.client_name">
                                                {{ errors.client_name[0] }}
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="" class="col-sm-3">Website</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="text"  class="form-control" v-model="newclient.client_website">
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="" class="col-sm-3">Email</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="text" class="form-control" v-model="newclient.client_email">
                                              </div>
                                              <div class="error-message" v-if="errors.client_email" >
                                                {{ errors.client_email[0] }}
                                              </div>
                                            </div>
                                            
                                        </div>

                                        <div class="form-group">
                                          <label for="" class="col-sm-3">Contact Number</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="text" class="form-control" v-model="newclient.client_phone">
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

                                      <div class="form-group">
                                          <label for="" class="col-sm-3">Name</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="text"  class="form-control" v-model="newclient.contact_name">
                                              </div>
                                            </div>
                                        </div>

                                      <div class="form-group">
                                          <label for="" class="col-sm-3">Email</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="email" class="form-control" v-model="newclient.contact_email">
                                              </div>
                                            </div>
                                        </div>

                                      <div class="form-group">
                                          <label for="" class="col-sm-3">Contact Number</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="text" class="form-control" v-model="newclient.contact_phone">
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

                                        <div class="form-group">
                                          <label for="" class="col-sm-3 ">Address</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="text" class="form-control">
                                              </div>
                                            </div>
                                        </div>                                  

                                        <div class="form-group">
                                          <label for="" class="col-sm-3 ">Landmark</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="text" class="form-control">
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="default_post_category" class="col-sm-3">City</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line" style="text-align: center;">
                                                <select name="" class="form-control input-sm" >
                                                  <option selected="selected" value="0">-Select-</option> 
                                                  <option value="1">uncategorised</option> 
                                                  <option value="2">Blog</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="default_post_category" class="col-sm-3">State</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line" style="text-align: center;">
                                                <select name="" class="form-control input-sm" >
                                                  <option selected="selected" value="0">-Select-</option> 
                                                  <option value="1">uncategorised</option> 
                                                  <option value="2">Blog</option>
                                                </select>
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="" class="col-sm-3">Postal Code</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line">
                                                <input type="text" class="form-control">
                                              </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                          <label for="default_post_category" class="col-sm-3">Country</label> 
                                            <div class="col-sm-9">
                                              <div class="form-line" style="text-align: center;">
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
                            </div>
                            
                            <!-- Notes -->
                            <div role="tabpanel" class="tab-pane fade in" id="notes">
                                <div class="row">                                
                                  <div class="col-md-12">
                                  

                                    <div class="form-group">
                                      <label for="" class="col-sm-3">Public Note</label> 
                                        <div class="col-sm-9">
                                          <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize"  v-model="newclient.public_note"></textarea>
                                          </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                      <label for="" class="col-sm-3">Private Note</label> 
                                        <div class="col-sm-9">
                                          <div class="form-line">
                                            <textarea rows="2" class="form-control no-resize" v-model="newclient.private_note"></textarea>
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
        error_message:'',
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
		  addclient(){
        axios.post('client',this.newclient)
            .then(data => {                    
              this.$emit('recordupdated',data),                            
              $('#addclient').modal('hide');             
              this.newclient = {};
            toast({
                type: 'success',
                title: 'New Client added successfully'
            })

          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            this.error_message = error.response.data.message;           
          })
      }
		},
	};

</script>

<style type="text/css" Scoped>

select{
  outline: none !important;
  border-bottom: 1px solid grey;
}

</style>