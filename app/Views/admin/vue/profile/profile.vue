<template>
	<div>
		<div class="x_panel">
            <div class="x_title">
                <h2>User Profile <small>Update your profile information</small></h2>
                
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

              	<div class="container-fluid">
                    <div class="row clearfix">

                        <div class="col-xs-12 col-sm-3">
                            <profilecard :user="user" :roles="roles" :profile="profile" ></profilecard>                           
                        </div>

                        <div class="col-xs-12 col-sm-9">
                            <div class="card">
                                <div class="body">
                                    <div class="material-tab-pane">
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                            <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                        </ul>

                                        <div class="tab-content">
                                            
                                            <!--User Details edit area-->
                                            <div role="tabpanel" class="tab-pane fade in active" id="profile_settings">
                                                <profilesetting :user="user" @profileupdated="profileupdate"></profilesetting>
                                            </div>
                                            <!--User Details edit area-->
                                            
                                            <!--PAssword change area-->
                                            <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                                <passwordchange :user="user"></passwordchange>
                                            </div>
                                            <!--PAssword change area-->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
             	</div>
            </div>
      	</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				user:'',
                profile:'',
                roles:[]
			}
		},
		watch:{

		},
		methods:{
			profileupdate(record){
                console.log(record)				
				////this.profile=record.profile
				this.user = record.data.user;
                //this.roles = response.data.roles
                this.profile = record.data.user.profile
			}	
		},
		mounted(){
			axios.get('profile/create')
                .then((response) => {                    
                    this.user = response.data.user;
                    this.roles = response.data.roles
                    this.profile = response.data.user.profile
                    console.log(response.data)
                })
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>