<template>
	<div>
		<form class="form-horizontal" v-on:submit.prevent="updateprofile(user.id)">

			<!-- Firstname -->
	        <div class="form-group">
	            <label for="firstname" class="col-sm-2 control-label">First Name</label>
	            <div class="col-sm-10">
	                <div class="form-line">
	                    <input type="text" class="form-control"  v-model="user_update.firstname">
	                </div>
	            </div>
	        </div>

	        <!-- Lastname -->
	        <div class="form-group">
	            <label for="lastname" class="col-sm-2 control-label">Last Name</label>
	            <div class="col-sm-10">
	                <div class="form-line">
	                    <input type="text" class="form-control"  v-model="user_update.lastname">
	                </div>
	            </div>
	        </div>
	        
	        <!-- Designation -->
	        <div class="form-group">
	            <label for="Email" class="col-sm-2 control-label">Designation</label>
	            <div class="col-sm-10">
	                <div class="form-line">
	                    <input type="text" class="form-control" v-model="user_update.designation">
	                </div>
	            </div>
	        </div>

	        <!--Experience-->
	        <div class="form-group">
	            <label for="InputExperience" class="col-sm-2 control-label">Experience</label>

	            <div class="col-sm-10">
	                <div class="form-line">
	                    <textarea class="form-control" rows="2"  v-model="user_update.experience"></textarea>
	                </div>
	            </div>
	        </div>

	        <!-- Skills -->
	        <div class="form-group">
	            <label for="Skills" class="col-sm-2 control-label">My Skills</label>

	            <div class="col-sm-10">
	                <div class="form-line">
	                    <textarea class="form-control" rows="2"  v-model="user_update.skills"></textarea>
	                </div>
	            </div>
	        </div>

	        <!-- description -->
	        <div class="form-group">
	            <label for="InputSkills" class="col-sm-2 control-label">About me</label>

	            <div class="col-sm-10">
	                <div class="form-line">
	                    <textarea class="form-control" rows="2"  v-model="user_update.description"></textarea>
	                </div>
	            </div>
	        </div>
			
			<!-- Avtar Image -->
	        <div class="form-group">
	            <label for="InputSkills" class="col-sm-2 control-label">Avatar Image</label>

	            <div class="col-sm-10">
	                <div class="form-line">
	                    <input type="file" class="form-control" v-on:change="onImageChange">
	                </div>
	            </div>
	        </div>			
	       
	        <!-- Submit Button -->
	        <div class="form-group">
	            <div class="col-sm-offset-2 col-sm-10">
	                <button type="submit" class="btn btn-info waves-effect">Update</button>
	            </div>
	        </div>

	    </form>
    </div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				user:'',
				profile:'',
			    user_update:{
			    	'setting_update':true,
			    	'profile_id':'',
			    	'firstname':'',
			    	'lastname':'',
			    	'email':'',
			    	'designation':'',
			    	'experience':'',
			    	'skills':'',
			    	'description':'',
			    	'avatar':null
			    },
			}
		},
		watch:{

		},
		methods:{
			onImageChange(e){
				let files = e.target.files || e.dataTransfer.files;
				if (files.length){
					let reader = new FileReader();
                	reader.onload = (e) => {
	                    this.user_update.avatar = e.target.result;
	                };
	                reader.readAsDataURL(files[0]);
				}
			},
			updateprofile(id){
				axios.put('profile/'+id,this.user_update)
					.then((data) => {						
						this.$emit('profileupdated',data)
						toast({
			                type: 'success',
			                title: 'Profile updated successfully'
			            })
					})
			}
		
		},
		mounted(){
			this.user_update.firstname = this.user.firstname;
            this.user_update.lastname = this.user.lastname;
            this.user_update.email = this.user.email;
            this.user_update.designation = this.user.designation;
            this.user_update.experience = this.user.experience;
            this.user_update.skills = this.user.skills;
            this.user_update.description = this.user.description;

			axios.get('profile/create')
                .then((response) => {

                    this.profile = response.data.profile;
                    this.user = response.data.user[0];
                    this.roles = response.data.roles;
                    

                    this.user_update.firstname = this.user.firstname;
                    this.user_update.lastname = this.user.lastname;
                    this.user_update.email = this.user.email;
                    this.user_update.designation = this.user.designation;
                    this.user_update.experience = this.user.experience;
                    this.user_update.skills = this.user.skills;
                    this.user_update.description = this.user.description;
                    //this.user_update.avatar_url = this.profile.avatar_url;

                })
            
		}
	};

</script>

<style type="text/css" Scoped>


</style>