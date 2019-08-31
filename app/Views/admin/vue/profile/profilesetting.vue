<template>
	<div>
		<form class="form-horizontal" v-on:submit.prevent="updateprofile(user.id)">

			
	        <!-- Lastname -->
	        <div class="form-group wp-input">
	            <label for="name" class="col-sm-3 col-xs-3 ">Name</label>
	            <div class="col-sm-9 col-xs-9">
	                <div class="form-line">
	                    <input type="text" class="form-control input-sm"  v-model="user_update.name">
	                </div>
	            </div>
	        </div>
	        
	        <!-- Designation -->
	        <div class="form-group wp-input">
	            <label for="Email" class="col-sm-3 col-xs-3 ">Designation</label>
	            <div class="col-sm-9 col-xs-9">
	                <div class="form-line">
	                    <input type="text" class="form-control input-sm" v-model="user_update.designation">
	                </div>
	            </div>
	        </div>

	        <!--Experience-->
	        <div class="form-group wp-input">
	            <label for="InputExperience" class="col-sm-3 col-xs-3 ">Experience</label>

	            <div class="col-sm-9 col-xs-9">
	                <div class="form-line">
	                    <textarea class="form-control input-sm" rows="2"  v-model="user_update.experience"></textarea>
	                </div>
	            </div>
	        </div>

	        <!-- Skills -->
	        <div class="form-group wp-input">
	            <label for="Skills" class="col-sm-3 col-xs-3 ">My Skills</label>

	            <div class="col-sm-9 col-xs-9">
	                <div class="form-line">
	                    <textarea class="form-control input-sm" rows="2"  v-model="user_update.skills"></textarea>
	                </div>
	            </div>
	        </div>

	        <!-- description -->
	        <div class="form-group wp-input">
	            <label for="InputSkills" class="col-sm-3 col-xs-3">About me</label>

	            <div class="col-sm-9 col-xs-9">
	                <div class="form-line">
	                    <textarea class="form-control input-sm" rows="2"  v-model="user_update.description"></textarea>
	                </div>
					<a v-if="!this.user_update.avatar_url == ''" href="" v-on:click.prevent @click="removeavatar(user.id)">Remove profile Image</a>
	            </div>
	        </div>
			
			<!-- Avtar Image -->
	        <div v-if="this.user_update.avatar_url == null" class="form-group wp-input">
	            <label for="InputSkills" class="col-sm-3 col-xs-3">Avatar Image</label>
	            <div class="col-sm-9 col-xs-9">
	                <div   class="form-line">
	                    <input type="file" class="form-control input-sm" v-on:change="onImageChange">
	                </div>    
	            </div>
	        </div>

	       
	        <!-- Submit Button -->
	        <div class="form-group wp-input">
	            <div class="col-sm-offset-2 col-sm-10">
	                <button class="btn btn-primary btn-sm waves-ef">Update</button>
	            </div>
	        </div>


	    </form>
    </div>
</template>

<script type="text/javascript">
	export default{
		props:['user'],
		data(){
			return{
				//user:'',
				profile:'',
			    user_update:{
			    	'setting_update':true,
			    	'profile_id':'',
			    	'name':'',
			    	'email':'',
			    	'designation':'',
			    	'experience':'',
			    	'skills':'',
			    	'description':'',
			    	'avatar_url':''
			    },
			}
		},
		watch:{
			user(){
				this.user_update.name = this.user.name;
	            this.user_update.designation = this.user.profile.designation;
	            this.user_update.experience = this.user.profile.experience;
	            this.user_update.skills = this.user.profile.skills;
	            this.user_update.description = this.user.profile.description;
	            this.user_update.avatar_url = this.user.profile.avatar_url;
			}
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
				NProgress.start();
				axios.put('profile/'+id,this.user_update)
					.then((response) => {
						//console.log(response)						
						this.$emit('profileupdated',response)
						NProgress.done();	
						toast({
			                type: 'success',
			                title: 'Profile updated successfully'
			            })
					})
			},
			removeavatar(id){
				NProgress.start();
				axios.get('profile/' + id + '/edit',id)
					.then((response) => {
						console.log(response)						
						this.$emit('profileupdated',response)
						NProgress.done();
						toast({
			                type: 'success',
			                title: 'Avatar image removed successfully'
			            })
					})
			}
		
		},
		mounted(){
			
		}
	};

</script>

<style type="text/css" Scoped>


</style>