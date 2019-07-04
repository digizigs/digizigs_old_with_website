<template>
	<section>
		
		<div class="panel panel-dz dashboard-post-page-comment-indicator">
			<div class="panel-heading active">
				<span class="panel-title">
					<a data-toggle="collapse" href="#collapse1">
						Inquries <span v-if="loading == true">({{inqcount}})</span> 
					</a>
					

					<i class="fa fa-caret-down pull-right" aria-hidden="true"></i>
				</span>
				
			</div>
			<div id="collapse1" class="panel-collapse collapse in">
				<div class="panel-body open">

					<ul>
						<li v-for="inq,key in inquiries.data">
							
							<a href="#inqview" data-toggle="modal" v-on:click.prevent @click="view(inq.id)" class="list-title">
								{{inq.name}}
							</a>
							
							<span class="time"><small>at  {{inq.created_at | vueAgoTime }} </small></span>

							<span class="action-text">
                    	<a href="#inqview" data-toggle="modal" v-on:click.prevent @click="view(inq.id)">
                     		View
                     	</a>  |                               
                      	<a href=""  v-on:click.prevent @click="delet(inq.id)">
                     		Delete
                     	</a> 
                   </span>


						</li>
					</ul>
					
					<div class="pgn">
						<vuepagination :input="inquiries" @pagechange="paginationdata" @count="subscount"></vuepagination>
					</div>

				</div>
			</div>
		</div>

        <div id="modal">
          <inquiryview  :inqiry="inquiry"></inquiryview>
        </div>
    </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				inquiries:{},
				inquiry:'',
				inqcount:'',
				errors:'',
				loading:false
			}
		},
		watch:{

		},
		methods:{
			paginationdata(page){
				if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('inquiry/create?page=' + page)
		          .then(response => {
		          	this.inquiries = response.data
		          	this.loading=true
		          })
		          .catch(error => this.errors=error.response.data.errors);
			},
			view(id){				
				axios.get('inquiry/'+id+'/edit')
			        .then((response) => {		        	
			          	this.inquiry=response.data
			          })//this.apntupdate = response.data
			        //.catch(error => this.errors=error.response.data.errors);
			},
			delet(id){
				NProgress.start();
				swalWithBootstrapButtons({
					//position: 'top-end',
		          	title: 'Delete Inquiry?',
		          	text: "You won't be able to revert this!",
		          	type: 'warning',
		          	showCancelButton: true,
		          	confirmButtonText: 'Yeah, delete it!',
		          	cancelButtonText: 'Noooooo!',
		          	reverseButtons: true
		        }).then((result) => {
		          if (result.value) {

		            axios.delete('inquiry/'+id)
		            .then(response =>{
		            	this.inquiries=response.data;
		            	toast({
		                	type: 'success',
		                	title: 'Inquiry deleted'
		                	
		            	})
		            	NProgress.done();
		            	
		            })
		            .catch((error) => {
		              console.log(response.data);
		                    this.errors=error.response.data.errors;
		                    this.success='';                
		              });

		            
		          } 
		        })
			},
			closesearch(){
				this.filter=''
			},
			subscount(record){
				this.inqcount = record
			}
		},
		mounted(){
			this.paginationdata()
		}
	};

</script>

<style lang="scss" Scoped>

	.time{
		font-weight: 400;
		color: #aaa;
		font-size:11px;
	}
	.action-text{
		a{
			font-weight: 600 !important;
		font-size:11px;
		}
	}
</style>