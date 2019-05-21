<template>
	<div class="modal fade" id="addnewuser" role="dialog"  data-backdrop="false">
        <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  
                  <h4 class="modal-title" id="defaultModalLabel">New User</h4>
                </div>
                <div class="modal-body">
                	<form  role="form" @submit.prevent="" class="form-horizontal">
                  		<div class="col-md-12">

                  			<div class="form-group">
                              	<label for="" class="col-sm-3" >First name</label> 
                                <div class="col-sm-9">
                                  <div class="form-line">
                                    <input type="text" class="form-control" v-model="newuser.name">
                                  </div>
                                  <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                              	<label for="" class="col-sm-3" >Last name</label> 
                                <div class="col-sm-9">
                                  <div class="form-line">
                                    <input type="text" class="form-control" v-model="newuser.name">
                                  </div>
                                  <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                              	<label for="" class="col-sm-3" >Email</label> 
                                <div class="col-sm-9">
                                  <div class="form-line">
                                    <input type="text" class="form-control" v-model="newuser.name">
                                  </div>
                                  <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                              	<label for="" class="col-sm-3" >Password</label> 
                                <div class="col-sm-9">
                                  <div class="form-line">
                                    <input type="text" class="form-control" v-model="newuser.name">
                                  </div>
                                  <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
                              	<label for="" class="col-sm-3" >Confirm Password</label> 
                                <div class="col-sm-9">
                                  <div class="form-line">
                                    <input type="text" class="form-control" v-model="newuser.name">
                                  </div>
                                  <div class="error-message" v-if="errors.name">
                                    {{ errors.name[0] }}
                                  </div>
                                </div>
                            </div>

                            <div class="form-group">
								<label for="" class="col-sm-3">Roles</label>
								<div class="col-sm-9">
									<multiselect v-model="value" tag-placeholder="Add this as new tag" placeholder="Search or add a role" label="name" track-by="name" :options="roles" :multiple="true" :taggable="true" ></multiselect>
								</div>							  								  	
							</div>


                  		</div>
                  		<div class="form-group">
	                      <button class="btn btn-dark btn-sm pull-right" @click="adduser" >Add User</button>
	                    </div>
                  	</form>
                </div>
            </div>
        </div>
    </div>
</template>

<script type="text/javascript">
	export default{
		props:['roles'],
		data(){
			return{
				search:'',
				newuser:{},
				errors:'',
				value: [],
			    options: [
			        { name: 'Vue.js', code: 'vu' },
			        { name: 'Javascript', code: 'js' },
			        { name: 'Open Source', code: 'os' },
			        { name: 'Vue.js', code: 'vu' },
			        { name: 'Javascript', code: 'js' },
			        { name: 'Open Source', code: 'os' },
			        { name: 'Vue.js', code: 'vu' },
			        { name: 'Javascript', code: 'js' },
			        { name: 'Open Source', code: 'os' },
			    ]
			}
		},
		watch:{

		},
		methods:{
			adduser(){

			},
			addTag (newTag) {
			    const tag = {
			        name: newTag,
			        code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
			    }
			    this.options.push(tag)
			    this.value.push(tag)
			}
		},
		created(){
		
		}
	};

</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss">
	.multiselect{
		font-size:12px;
		border:none !important;
		input{
			border:none !important;
		}
	}
</style>