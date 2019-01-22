<template>
	<section>

		<div class="table-responsive">
		      <table class="table table-striped jambo_table bulk_action">
		        <thead>
		          <tr class="headings">
		            
		            <th class="column-title"> Title </th>
		            <th class="column-title"> Author </th>
		            <th class="column-title"> Category </th>
		            <th class="column-title"> Tags </th>
		            <th class="column-title"> Date </th>
		            <th class="column-title"> Status </th>
		            <th class="column-title"> Action </th>

		            <th class="bulk-actions" colspan="7">
		              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
		            </th>
		          </tr>
		        </thead>

		        <tbody>
				
				
		          <tr class="even pointer"  v-for="post,key in posts">
		            
		            <td class=" ">{{post.title}}</td>
		            <td class=" ">{{post.user.firstname}}</td>
		            <td class=" ">sport,media,news</td>
		            <td class=" ">Tags</td>
		            <td class=" ">{{post.created_at | myDate}}</td>
		            <td class="a-right a-right "> {{post.status}} </td>
		           	<td class="a-right a-right  table-action-font-icon">
		           		<a href="#editpost" data-toggle="modal" @click="editPost(post.id)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
		           		<span>|</span>
		           		<a href="" v-on:click.prevent @click="deletepost(post.id)"><i class="fa fa-trash" aria-hidden="true"></i></a>
		           	</td>
		          </tr>
		        

		        </tbody>
		      </table>
		</div>

		<div id="modal">
			<editposts ></editposts>
		</div>

	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				posts:{},
				success:'',
				errors:'',
			}
		},
		watch:{

		},
		methods:{
			deletepost(id){
				swalWithBootstrapButtons({
				  title: 'Do you want to delete selected post?',
				  text: "You won't be able to revert this!",
				  type: 'warning',
				  showCancelButton: true,
				  confirmButtonText: 'Yes, delete it!',
				  cancelButtonText: 'No, cancel!',
				  reverseButtons: true
				}).then((result) => {
				  if (result.value) {

				  	axios.delete('post/'+id)
					.then(response =>{
						this.posts=response.data;
						this.success="Category Deleted Successfuly";

					})//this.categories=response.data
					.catch((error) => {
						//console.log(response.data);
		            	this.errors=error.response.data.errors;
		            	this.success='';		            
		        	});

				    swalWithBootstrapButtons(
				      'Deleted!',
				      'Post deleted successfully',
				      'success'
				    )
				  } 
				})
			},
			editPost(id){

			},
		},
		created(){
			
			axios.get('allpost')
			.then((response) => {
				this.posts=response.data				
			})
			.catch((error) => this.error=error.response.data)
		}
	};

</script>

<style type="text/css" Scoped>


</style>