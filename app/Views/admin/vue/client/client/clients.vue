<template>
<section>
	<div class="x_panel">
		<div class="x_title">
			
			<span class="panel-title">
				<i class="fa fa-align-left"></i>
				Clients
			</span>
			<a href="#addclient" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
				<i class="fa fa-plus" aria-hidden="true"></i> New Client
			</a>
			<span class="x-title-option">
				<ul>
					<li>
						<span id="x-title-search" class="title-searchs x-title-search c">
							<span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
							<input type="text" v-model="search">
							<span class="close-icon" @click="closesearch"><i class="fa fa-times" aria-hidden="true"></i></span>
						</span>
					</li>
				</ul>
				
			</span>
		</div>
		<div class="x_content">
			<div class="panel-group pannel-line-group" id="accordion">
				
				<div v-for="client in clients.data" class="panel panel-default pannel-line">
					<div class="panel-heading">
						<span class="title">{{client.client_name}}</span>
						
						<!-- Action icons -->
						<span class="action-text subscription pull-right">
							<a href="#editclient" v-on:click.prevent data-toggle="modal" @click="detailclient(client.id)"><i class="fa fa-eye" aria-hidden="true"></i></a>
							|
							<a href="" v-on:click.prevent @click="deleteclient(client.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
						</span>
						<!-- Action icons -->
					</div>
				</div>
				
			</div>
			
			
			<vuepagination :input="clients" @pagechange="paginationdata"></vuepagination>
			
		</div>
	</div>
	
	<div id="modal">
		<newclient @recordupdated="refreshRecord"></newclient>
		<editclient :selClient="clientdetail" @recordupdated="refreshRecord"></editclient>
		
	</div>
</section>
</template>
<script type="text/javascript">
	export default{
		data(){
			return{
				clients:{},
				clientsnew:[],
				clientupdate:{},
				clientdetail:{},
				search:'',
				success:'',
				errors:'',
				pagination: {}
				
			}
		},
		watch:{
			search:function(){
				if(this.search.length >= 0){
					axios.get('client/create',{params:{search_string:this.search}})
											.then((response) => {
											this.clients=response.data
					})
					.catch((error) => console.log(error))
				}
			}
		},
		computed:{
				
		},
		methods:{
			paginationdata(page){
		if (typeof page === 'undefined'){
		page=1;
		}
		axios.get('client/create?page=' + page)
		.then(response => this.clients = response.data)
			//	.catch(error => this.errors=error.response.data.errors);
				},
							refreshRecord(record){
		this.clients=record.data;
		},
		closesearch(){
		this.filter=''
			},
		detailclient(id){
			axios.get('client/'+id+'/edit')
					.then((response) => {
			this.clientdetail=response.data
		})
		.catch(error => this.errors=error.response.data.errors);
		},
		deleteclient(id){
			NProgress.start();
			swalWithBootstrapButtons({
		title: 'Delete Client?',
		text: "You won't be able to revert this!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonText: 'Yes, delete it!',
		cancelButtonText: 'No, cancel!',
		reverseButtons: true
		}).then((result) => {
		if (result.value) {
		axios.delete('client/'+id)
		.then(response =>{
		this.clients=response.data;
		this.success="Client Deleted Successfuly";
		toast({
			type: 'success',
					title: 'Client  deleted successfully'
			})
		NProgress.done();
		})//this.categories=response.data
			.catch((error) => {
		this.errors=error.response.data.errors;
		this.success='';
		});
		}
		})
		}
		},
		created(){
			
			this.paginationdata();
		}
	};
</script>
<style type="text/css" Scoped>
</style>