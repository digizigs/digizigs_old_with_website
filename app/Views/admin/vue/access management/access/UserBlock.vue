<template>
	<div class="panel panel-dz dashboard-post-page-comment-indicator">
		<div class="panel-heading active">
			<span class="panel-title">
				<a data-toggle="collapse" href="#users">
					Users <span v-if="rendered == true">({{count}})</span> 
				</a>
				<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
			</span>
			
		</div>
		<div id="users" class="panel-collapse collapse in">
			<div class="panel-body open">
				<ul>
					<li v-for="user in users.data">
						<a href="" class="list-title">{{user.firstname}}</a>
						<span v-for="role in user.roles" class="label label-info"><small>{{role.name}}</small></span>
						<span class="action-text wpfont ml-20">
							<a href="#editCategory" data-toggle="modal" v-on:click.prevent >
								<small><i class="fa fa-pencil" aria-hidden="true"></i></small>
							</a>
							|
							<a href="" v-on:click.prevent >
								<small><i class="fa fa-trash-o" aria-hidden="true"></i></small>
							</a>
						</span>
					</li>
				</ul>

				<div class="pgn">
					<vuepagination :input="users" @pagechange="userpagination" @count="usercount"></vuepagination>
				</div>


			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		
		data(){
			return{
				users:{},
				count:'',
				rendered:false,
			}
		},
		watch:{
			users(){
				console.log(this.users)
			}
		},
		methods:{
			userpagination(page){
				if (typeof page === 'undefined'){
		          page=1;
		        }
		        NProgress.start() 
		        axios.get('users/create?page=' + page)
		          .then((response) => {
		          	this.users = response.data
		          	this.rendered = true
		          	NProgress.done()
		          })
			},
			usercount(record){
				this.count = record
			}
		},
		created(){
			this.userpagination()
		}
	};

</script>

<style type="text/css" Scoped>

	.label{
		padding: 2px 4px !important;
		margin-right: 2px;
		font-weight: 400 !important;
	}
	
</style>