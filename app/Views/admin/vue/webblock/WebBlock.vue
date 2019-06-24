<template>
	<div class="x_panel">

		<div class="x_title">
			<span class="panel-title">
	            <i class="fa fa-align-left hidden-xs"></i>
	            Web Blocks
	      </span>
	         
	      <span class="x-title-option">
	            <ul>
	            	<li>
	               	<a href="#newwebblock" class="option-item wpfont" data-toggle="modal">New WebBlock</a>
	               </li>
	               <li>
	                  <span id="x-title-search" class="title-searchs x-title-search c">
	                     <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
	                     <input type="text">
	                     <span class="close-icon" ><i class="fa fa-times" aria-hidden="true"></i></span>
	                  </span>
	               </li>	               
	            </ul>
	      </span>
		</div>

		<div class="x_content">
			
			<div v-for='block in blocks' class="panel panel-dz dashboard-post-page-comment-indicator">
         	<div class="panel-heading active">
            	<span class="panel-title">
              		<a data-toggle="collapse" v-bind:href="'#'+ block.id" class="wpfont">
                 		{{block.name}}                    
               	</a>
            	</span>
            	<span class="action-text">
               	<a href="#newpost" data-toggle="modal" @click="blockname(block.slug)">
                     <i class="fa fa-plus" aria-hidden="true" ></i>
                  </a>
               	<a href="">
                     <i class="fa fa-pencil" aria-hidden="true"></i>
                  </a>
                  <a href="" data-toggle="tooltip" data-placement="top" title="Delete" v-on:click.prevent @click="deleteblock(block.id)">
               		<i class="fa fa-trash-o" aria-hidden="true"></i>
               	</a>
               </span>
             	<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
            
         	</div>

          	<div :id="block.id" class="panel-collapse collapse in">
             	<div v-if="block.posts.length > 0" class="panel-body open">
           						
						<ul>
							<li v-for='post in block.posts'>
								<a href="#viewpost" class="list-title" data-toggle="modal" @click="showpost(post)">{{post.title}}</a>
								<small>
										by
									<i v-if="post.user"><a href="">{{post.user.firstname}}</a></i>
									on
									<i>{{post.created_at | vueAgoTime}}</i>
								</small>
								<span class="action-text">
									<a href="">
			                     <i class="fa fa-pencil" aria-hidden="true"></i>
			                  </a>
			                  <a href="" data-toggle="tooltip" data-placement="top" title="Delete" v-on:click.prevent @click="deletepost(post.id)">
			               		<i class="fa fa-trash-o" aria-hidden="true"></i>
			               	</a>
								</span>
							</li>
						</ul>

             	</div>
          	</div>

         </div>

		</div>

		<div id="modal">
			<newwebblock @recordupdated="refreshRecord"></newwebblock>	
			<viewpost :post="post" @recordupdated="refreshRecord"></viewpost>	
			<newpost :block="block"  @recordupdated="refreshRecord"></newpost>	
		</div>


	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				block:'',
				blocks:{},
				post:{}
			}
		},
		watch:{

		},
		methods:{
			refreshRecord(record){
				this.blocks = record.data
			},
			showpost(post){
				this.post = post
			},
			deleteblock(id){
				swalWithBootstrapButtons({
	        	title: 'Delete WebBlock?',
	        	text: "You won't be able to revert this!",
	        	type: 'warning',
	        	showCancelButton: true,
	        	confirmButtonText: 'Yes, delete it!',
	        	cancelButtonText: 'No, cancel!',
	        	reverseButtons: true
	         }).then((result) => {
	        if (result.value) {

	          axios.delete('webblock/'+id)
	          .then(response =>{
	          	console.log(response.data)
	            this.blocks=response.data;
	          })
	          .catch((error) => {
	            console.log(response.data);
	                  this.errors=error.response.data.errors;
	                  this.success='';                
	            });

	          toast({
	                type: 'success',
	                title: 'WebBlock deleted successfully'
	            })
	        } 
	        })
			},
			deletepost(id){
				console.log(id)
			},
			blockname(slug){
				this.block = slug
			}
		},
		mounted(){
			axios.get('webblock/create')
			.then((response) => {
					console.log(response.data)
					this.blocks=response.data
				})
			.catch((error) => console.log(error))
		}
	};

</script>

<style lang="scss" Scoped>

	.action-text{
		margin-left: 10px;
		i{ margin: 0 2px; }
	}

</style>