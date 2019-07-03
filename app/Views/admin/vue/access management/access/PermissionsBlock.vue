<template>
	<div class="panel panel-dz dashboard-post-page-comment-indicator">
		<div class="panel-heading active">
			<span class="panel-title">
				<a data-toggle="collapse" href="#permission">
					Permissions <span v-if="rendered == true">({{count}})</span> 
				</a>
				<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
			</span>
			
		</div>
		<div id="permission" class="panel-collapse collapse">
			<div class="panel-body open">
				<ul>
					<li v-for="permission in permissions.data">
						<a href="" class="list-title">{{permission.name}}</a>
						
					</li>
				</ul>
				
				<div class="pgn">
					<vuepagination :input="permissions" @pagechange="permissionpagination" @count="permissioncount"></vuepagination>
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
				permissions:{},
				count:'',
				rendered:false
			}
		},
		watch:{

		},
		methods:{
			permissionpagination(page){
				if (typeof page === 'undefined'){
		          page=1;
		        } 
		        NProgress.start()  
		        axios.get('permissions/create?page=' + page)
		          .then((response) => {
		          	this.permissions = response.data
		          	this.rendered = true
		          	NProgress.done()
		          })
			},
			permissioncount(record){
				this.count = record
			}
		},
		created(){
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

</style>