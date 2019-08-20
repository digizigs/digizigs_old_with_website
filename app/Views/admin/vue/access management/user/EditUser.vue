<template>
	<div class="modal fade right" id="edituser" role="dialog"  data-backdrop="false">
        <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" @click="modalclose">&times;</button>
                  
                  <h4 class="modal-title" id="defaultModalLabel">{{user.name}}</h4>
                </div>
                <div class="modal-body">
                	<form  role="form" @submit.prevent="" class="form-horizontal">
                  		<div class="col-md-12">

                           <div class="form-group wp-input">
                              <label for="" class="control-label col-sm-3" >Name</label>
                              <div class="col-sm-9 col-xs-12">
                                 <div class="form-line">
                                    <input type="text" class="form-control input-sm" v-model="user.name">
                                 </div>
                                 <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                 </div>
                              </div>
                           </div>                          
                           <div class="form-group wp-input">
                              <label for="" class="control-label col-sm-3" >Email</label>
                              <div class="col-sm-9 col-xs-12">
                                 <div class="form-line">
                                    <input type="text" class="form-control input-sm" v-model="user.email">
                                 </div>
                                 <div class="error-message" v-if="errors.email">
                                    {{ errors.email[0] }}
                                 </div>
                              </div>
                           </div>
                           <div class="form-group wp-input">
                              <label for="" class="control-label col-sm-3" >Password</label>
                              <div class="col-sm-9 col-xs-12">
                                 <div class="form-line">
                                    <input type="password" class="form-control input-sm" v-model="user.password">
                                 </div>
                                 <div class="error-message" v-if="errors.password">
                                    {{ errors.password[0] }}
                                 </div>
                              </div>
                           </div>
                           <div class="form-group wp-input">
                              <label for="" class="control-label col-sm-3" >Confirm Password</label>
                              <div class="col-sm-9 col-xs-12">
                                 <div class="form-line">
                                    <input type="password" class="form-control input-sm" v-model="newuser.cpassword">
                                 </div>
                                 <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                 </div>
                              </div>
                           </div>
                           <div class="form-group">
              								<label for="" class="control-label col-sm-3">Roles</label>
              								<div class="col-sm-9 col-xs-12">
              									<multiselect  v-model="value" 
                                              tag-placeholder="Add this as new tag" 
                                              placeholder="Search or add a role" 
                                              label="name"
                                              track-by="id"                                      
                                              :options="options" 
                                              :multiple="true" 
                                              :taggable="true" 
                                              @input="updateSelected"
                                              @tag="addTag">
                                              
                                         </multiselect>
                                      
              								</div>							  								  	
            					     </div>

                           
                  		</div>
                  		<div class="form-group">
	                      <button class="btn btn-dark btn-sm pull-right" @click="updateuser" >Update User</button>
	                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
	export default{
		props:['roles','user'],
		data(){
			return{
				search:'',
				newuser:{},
				errors:'',
			  selected:'',
        value: null,
        options: []
			}
		},
		watch:{
      user(){
        this.value = this.user.roles
      },
      roles(){
        this.options = Object.values(this.roles)
      },
      value(){
        if(this.value !== null){
          this.user.roles = this.value.map(x => x.id)
        }
      }
		},
    computed:{
    },
		methods:{
			updateuser(){
        axios.put('users/'+this.user.id,this.user)
         .then(data=>{
            this.$emit('recordupdated',data),
            $('#edituser').modal('hide');
            toast({
                type: 'success',
                title: 'User Updated successfully'
            })
            //this.errors=''
         })
         .catch((error) => {
            this.errors=error.response.data.errors;           
          })
      },
			addTag (newTag) {
			    const tag = {
			        name: newTag,
			        id: newTag,
			    }
			    this.options.push(tag)
			    this.value.push(tag)
			},
      updateSelected(){
        console.log('@input')
      },
      modalclose(){
        this.newuser = {}
        this.value = null
      }
		},
		created(){
		
		}
	};

</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss">
  label{
    color: #23282d;
    font-weight: 500;
    text-shadow: none;
    vertical-align: baseline;
  }
  .multiselect{
    padding:0 !important;
    border: 1px solid #ddd;
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.07);
    background-color: #fff;
    color: #32373c;
    outline: none;
    transition: 0.05s border-color ease-in-out;
    font-size: 12px;
    .multiselect__tags{
      font-size: 12px;
      border:none;
      border-bottom: 1px solid #e8e8e8;
      border-radius:0px;

    }
    .multiselect__content-wrapper{
      .multiselect__content{
        .multiselect__element{
          .multiselect__option{
            font-size: 12px !important;
          }
        }
      }
    }
  }
</style>