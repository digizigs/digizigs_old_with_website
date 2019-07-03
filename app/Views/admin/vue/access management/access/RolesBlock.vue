<template>
	<div class="panel panel-dz dashboard-post-page-comment-indicator">
		<div class="panel-heading active">
			<span class="panel-title">
				<a data-toggle="collapse" href="#roles">
					Roles <span v-if="rendered == true">({{count}})</span> 
				</a>
				<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
			</span>
			
		</div>
		<div id="roles" class="panel-collapse collapse">
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
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				roles:{},
				count:'',
				rendered:false
			}
		},
		watch:{
			
		},
		methods:{
			rolepagination(page){
				if (typeof page === 'undefined'){
		          page=1;
		        }
		        NProgress.start()  
		        axios.get('roles/create?page=' + page)
		          .then((response) => {
		          	this.roles = response.data
		          	this.rendered = true
		          	NProgress.done()
		          })
			},
			rolecount(record){
				this.count = record
			}
		},
		created(){
			this.rolepagination()
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