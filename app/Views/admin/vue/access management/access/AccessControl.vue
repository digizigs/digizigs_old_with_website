<template>
	<div class="x_panel">

		<div class="x_title">
			<span class="panel-title">
				<i class="fa fa-align-left hidden-xs"></i>
				Access Control
			</span>
		</div>

		<div class="x_content">

			<div class="col-md-12 col-xs-12">
				<div class="panel panel-dz dashboard-post-page-comment-indicator">
					<div class="panel-heading active">
						<span class="panel-title">
							<a data-toggle="collapse" href="#collapse1">
								Users <span v-if="loading == true">({{usercnt}})</span> 
							</a>
							<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
						</span>
						
					</div>
					<div id="collapse1" class="panel-collapse collapse in">
						<div class="panel-body open">

							<ul>
								<li v-for="user in users.data">
									<a href="" class="list-title">{{user.firstname}},{{user.lastname}}</a>
									<span v-for="role in user.roles" class="label label-info"><small>{{role.name}}</small></span>
								</li>
							</ul>
							
							<div class="pgn">
								<vuepagination :input="users" @pagechange="userpagination" @count="usercount"></vuepagination>
							</div>


						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-xs-12">
				<div class="panel panel-dz dashboard-post-page-comment-indicator">
					<div class="panel-heading active">
						<span class="panel-title">
							<a data-toggle="collapse" href="#collapse1">
								Roles <span v-if="loading == true">({{rolescnt}})</span>
							</a>
							<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
						</span>
						
					</div>
					<div id="collapse1" class="panel-collapse collapse in">
						<div class="panel-body open">
							<ul>
								<li v-for="role in roles.data">
									<a href="" class="list-title">{{role.name}}</a>
									<span v-for="permission in role.permissions" class="label label-success"><small>{{permission.name}}</small></span>
								</li>
							</ul>
							
							<div class="pgn">
								<vuepagination :input="roles" @pagechange="rolepagination" @count="rolecount"></vuepagination>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-xs-12">
				<div class="panel panel-dz dashboard-post-page-comment-indicator">
					<div class="panel-heading active">
						<span class="panel-title">
							<a data-toggle="collapse" href="#collapse1">
								Permissions <span v-if="loading == true">({{percnt}})</span>
							</a>
							<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
						</span>
						
					</div>
					<div id="collapse1" class="panel-collapse collapse in">
						<div class="panel-body open">
							<ul>
								<li v-for="permission in permissions.data">
									<a href="" class="list-title">{{permission.name}}</a>
									
								</li>
							</ul>
							
							<div class="pgn">
								<vuepagination :input="permissions" @pagechange="userpagination" @count="permcount"></vuepagination>
							</div>
						</div>
					</div>
				</div>
			</div>

			
		</div>

		<div id="modal">
					
		</div>


	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				users:{},
				usercnt:'',
				roles:{},
				rolescnt:'',
				permissions:{},
				percnt:'',
				loading:false
			}
		},
		watch:{

		},
		methods:{
			userpagination(page){
				if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('users/create?page=' + page)
		          .then((response) => {
		          	this.users = response.data
		          })
			},
			rolepagination(page){
				if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('roles/create?page=' + page)
		          .then((response) => {
		          	this.roles = response.data
		          })
			},
			permissionpagination(page){
				if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('permissions/create?page=' + page)
		          .then((response) => {
		          	this.permissions = response.data
		          })
			},
			usercount(record){
				this.usercnt = record
			},
			rolecount(record){
				this.rolescnt = record
			},permcount(record){
				this.percnt = record
			}
		},
		created(){
			axios.get('accesss/create')
		          .then((response) => {
		          	//console.log(response.data.permissions)
		          	//this.users = response.data.users
		          	//this.roles = response.data.roles
		          	//this.permissions = response.data.permissions
		          	this.loading = true
		          })

		   this.userpagination()
		   this.rolepagination()
		   this.permissionpagination()
		}
	};

</script>

<style type="text/css" Scoped>

	.label{
		padding: 2px 4px !important;
		margin-right: 2px;
		font-weight: 400 !important;
	}

	.pgn{
		margin-top: 20px;
	}
</style>