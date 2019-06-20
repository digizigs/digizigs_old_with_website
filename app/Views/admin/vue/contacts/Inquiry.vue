<template>
	<section>
		
		<div class="x_panel">
			<div class="x_title">

				<span class="panel-title">
	              <i class="fa fa-align-left"></i>
	               Inquiry <small></small> 
	            </span>
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
                   	                           
                   <div v-for="inq,key in inquiries.data" class="panel panel-default pannel-line">
                      <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">
                           	                                   	                                  
                           	<span class="title">{{inq.name}}</span> 
                        
                           	<span>email:-{{inq.email}}</span>

                           	<span class="time">at {{inq.created_at | vueAgoTime }}</span>

                            <span class="action-text">
                            	<a href="#inqview" data-toggle="modal" v-on:click.prevent @click="view(inq.id)">
                             		View
                             	</a>  |                               
                              	<a href="" class="subscribe" v-on:click.prevent @click="delet(inq.id)">
                             		Delete
                             	</a> 
                            </span>
                                                          
                      </div>

                      <div id="inq.id" class="panel-collapse collapse">
                        <div class="panel-body" style="padding: 8px !important;">
                          <p>messagwe</p>  
                                                                                               
                        </div>                                 
                      </div>
                   </div>	                           
                  
                </div>
                
                <vuepagination :input="inquiries" @pagechange="paginationdata"></vuepagination>
                
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
				errors:''
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
		},
		mounted(){
			axios.get('inquiry/create')
                .then((response) => {                    
                    this.inquiries = response.data;
                    //this.roles = response.data.roles
                    //console.log(response.data)
                })
		}
	};

</script>

<style type="text/css" Scoped>


</style>