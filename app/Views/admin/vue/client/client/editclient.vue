<template>
  <section>
    <!--Add service-->
        <div class="modal fade modal-right-slide" id="editclient" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  <h4 class="modal-title"><b>{{selClient.client_name}}</b></h4>
                </div>
                <div class="modal-body">
                  <form  role="form" @submit.prevent="" class="form-horizontal">

                    <div class="material-tab-pane">
                      <ul class="nav nav-tabs" role="tablist">
                          <li role="presentation" class="active"><a href="#basic_details2" aria-controls="settings" role="tab" data-toggle="tab">Basic Details</a></li>
                          <li role="presentation"><a href="#contact_person2" aria-controls="settings" role="tab" data-toggle="tab">Contact Person</a></li>
                          <li role="presentation"><a href="#contact_address2" aria-controls="settings" role="tab" data-toggle="tab">Address</a></li>
                          <li role="presentation"><a href="#notes2" aria-controls="settings" role="tab" data-toggle="tab">Notes</a></li>
                      </ul>


                      <div class="tab-content">
                        
                        <!--Basic Details-->
                        <div role="tabpanel" class="tab-pane fade in active" id="basic_details2">
                            <div class="row">
                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label" >Name</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="text" class="form-control input-sm" v-model="selClient.client_name">
                                          </div>
                                           <div class="error-message" v-if="errors.client_name">
                                            {{ errors.client_name[0] }}
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Website</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="text"  class="form-control input-sm" v-model="selClient.client_website">
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Email</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="text" class="form-control input-sm" v-model="selClient.client_email">
                                          </div>
                                          <div class="error-message" v-if="errors.client_email" >
                                            {{ errors.client_email[0] }}
                                          </div>
                                        </div>
                                        
                                    </div>

                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Contact Number</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="text" class="form-control input-sm" v-model="selClient.client_phone">
                                          </div>
                                          <div class="error-message" v-if="errors.client_phone">
                                            {{ errors.client_phone[0] }}
                                          </div>
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <!--Contact info-->
                        <div role="tabpanel" class="tab-pane fade in" id="contact_person2">
                            <div class="row">
                                  <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Name</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="text"  class="form-control input-sm" v-model="selClient.contact_name">
                                          </div>
                                        </div>
                                    </div>

                                  <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Email</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="email" class="form-control input-sm" v-model="selClient.contact_email">
                                          </div>
                                        </div>
                                    </div>

                                  <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Contact Number</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="text" class="form-control input-sm" v-model="selClient.contact_phone">
                                          </div>
                                        </div>
                                  </div>                                
                            </div>
                        </div> 

                        <!-- Address -->
                        <div role="tabpanel" class="tab-pane fade in" id="contact_address2">
                            <div class="row">
                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Address</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="text" class="form-control input-sm">
                                          </div>
                                        </div>
                                    </div>                                  

                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Landmark</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="text" class="form-control input-sm">
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">City</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line" style="text-align: center;">
                                            <select name="" class="form-control input-sm" >
                                              <option selected="selected" value="0">-Select-</option> 
                                              <option value="1">uncategorised</option> 
                                              <option value="2">Blog</option>
                                            </select>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">State</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line" style="text-align: center;">
                                            <select name="" class="form-control input-sm" >
                                              <option selected="selected" value="0">-Select-</option> 
                                              <option value="1">uncategorised</option> 
                                              <option value="2">Blog</option>
                                            </select>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Postal Code</label> 
                                        <div class="col-sm-9 col-xs-9">
                                          <div class="form-line">
                                            <input type="text" class="form-control input-sm">
                                          </div>
                                        </div>
                                    </div>

                                    <div class="form-group wp-input">
                                      <label for="" class="col-sm-3 col-xs-3 control-label">Country</label> 
                                        <div class="col-sm-9 col-xs-9">
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
                        
                        <!-- Notes -->
                        <div role="tabpanel" class="tab-pane fade in" id="notes2">
                            <div class="row">                                
                                <div class="form-group wp-input">
                                  <label for="" class="col-sm-3 col-xs-3 control-label">Public Note</label> 
                                    <div class="col-sm-9 col-xs-9">
                                      <div class="form-line">
                                        <textarea rows="3" class="form-control input-sm"  v-model="selClient.public_note"></textarea>
                                      </div>
                                    </div>
                                </div>


                                <div class="form-group wp-input">
                                  <label for="" class="col-sm-3 col-xs-3 control-label">Private Note</label> 
                                    <div class="col-sm-9 col-xs-9">
                                      <div class="form-line">
                                        <textarea rows="3" class="form-control input-sm" v-model="selClient.private_note"></textarea>
                                      </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                      </div>


                    </div>

                    <div class="form-group">
                      <button class="btn btn-dark btn-sm pull-right" @click="updateclient" >Update Client</button>
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
    props:['selClient'],
    data(){
      return{       
        success:'',
        errors:'',
        clients:{},
      }
    },
    watch:{

    },
    methods:{
      updateclient(){
        axios.put('client/'+this.selClient.id,this.selClient)
         .then(data=>{
            this.$emit('recordupdated',data),
            $('#editclient').modal('hide');
            toast({
                type: 'success',
                title: 'Client Updated successfully'
            })
            this.errors=''
         })
         .catch((error) => {
            this.errors=error.response.data.errors;           
          })
      },
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