<template>
	<div>
		<form class="form-horizontal" v-on:submit.prevent="updatepassword(user.id)">
            <div class="form-group">
                <label for="OldPassword" class="col-sm-3 ">Old Password</label>
                <div class="col-sm-9">
                    <div class="form-line">
                        <input type="password" class="form-control" placeholder="Old Password" required v-model="password.oldpass">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="NewPassword" class="col-sm-3 ">New Password</label>
                <div class="col-sm-9">
                    <div class="form-line">
                        <input type="password" class="form-control" placeholder="New Password" required v-model="password.newpass">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="NewPasswordConfirm" class="col-sm-3">New Password (Confirm)</label>
                <div class="col-sm-9">
                    <div class="form-line">
                        <input type="password" class="form-control" placeholder="New Password (Confirm)" required v-model="password.cnfpass">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
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
				password:{
					'oldpass':'',
					'newpass':'',
					'cnfpass':''
				},
				status:''
			}
		},
		watch:{
			status:function(){
				//console.log('PasswordNORT')
			}
		},
		methods:{
			updatepassword(id){

				if(this.newpass !== this.cnfpass){
					toast({
	                type: 'warning',
	                	title: 'PConfirm password not matched'
	            	})
	            	return
				}

				axios.put('profile/'+id,this.password)
					.then((response) => {
						this.status = response.data						
						if(response.data === false){
							toast({
			                type: 'warning',
			                	title: 'Old password is not matched'
			            	})
						}else{
							toast({
			                type: 'success',
			                	title: 'Password changed successfully'
			            	})
			            	this.password.oldpass = '';
			            	this.password.newpass = '';
			            	this.password.cnfpass = '';
						}						
					})
			}
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>