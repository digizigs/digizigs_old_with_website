<template>
	<div class="modal fade right" id="addrole" role="dialog"  data-backdrop="false">
        <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" @click="modalclose">&times;</button>
                  
                  <h4 class="modal-title" id="defaultModalLabel">New Role</h4>
                </div>
                <div class="modal-body">
                	<form  role="form" @submit.prevent="" class="form-horizontal">
                  		<div class="col-md-12">

                           <div class="form-group wp-input">
                              <label for="" class="control-label col-sm-3" >Role Name</label>
                              <div class="col-sm-9 col-xs-12">
                                 <div class="form-line">
                                    <input type="text" class="form-control input-sm" v-model="role.name">
                                 </div>
                                 <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                 </div>
                              </div>
                           </div>
                           <div class="form-group wp-input">
                              <label for="" class="control-label col-sm-3" >Role Description</label>
                              <div class="col-sm-9 col-xs-12">
                                 <div class="form-line">
                                    <textarea class="form-control input-sm" cols="30" rows="5" v-model="role.description"></textarea>
                                 </div>
                                 <div class="error-message" v-if="errors.description">
                                    {{ errors.description[0] }}
                                 </div>
                              </div>
                           </div>
                                                    
                           <div class="form-group">
              								<label for="" class="control-label col-sm-3">Permissions</label>
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
	                      <button class="btn btn-dark btn-sm pull-right" @click="addrole" >Add Role</button>
	                    </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
	export default{
		props:['roles','permissions'],
		data(){
			return{
				role:{},
				errors:'',
			  selected:'',
        value: null,
        options: []
			}
		},
		watch:{
      permissions(){
        this.options = Object.values(this.permissions)
      },
      value(){
        if(this.value !== null){
          this.role.permissions = this.value.map(x => x.id)
        }
        
        //console.log(this.value.map(x => x.id))
      }
		},
    computed:{
    },
		methods:{
			addrole(){
        NProgress.start();
         axios.post('roles',this.role)
            .then(data => {
              //console.log(data)                              
              this.$emit('recordupdated',data),                            
              $('#addrole').modal('hide');             
              this.role = {};
            toast({
                type: 'success',
                title: 'New User added successfully'
            })
            NProgress.done();
          })
          .catch((error) => {
            this.errors = error.response.data.errors;        
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
        this.role = {}
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