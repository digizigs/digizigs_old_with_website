<template>
	<section>
		<div class="x_panel">
			<div class="x_title">
              	<h2>
              		<i class="fa fa-align-left"></i>
              		Users <small></small> 
              		<span class="search">
						<i class="fa fa-search"></i>
						<div class="form-group">
					        <div class="form-line">
					            <input type="text" class="form-control" placeholder="Search here..." v-model="search">
					        </div>

					    </div>
					</span>	
              	</h2>	                              	                 
            	<a href="#addnewuser" class="btn btn-dark btn-sm pull-right" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> New Client</a>
            	<div class="clearfix"></div>
          	</div>

            <div class="x_content">
            	<div class="panel-group pannel-line-group" id="accordion">
			                        		                         
                    <div v-for="user in users.data"  class="panel panel-default pannel-line">

                        <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">		                        
                          	<span class="title">{{user.firstname}},{{user.lastname}}</span>                             
                          
							<!-- Action icons -->
                          	<span class="action-text subscription pull-right">
                            	<a href="#adduser" v-on:click.prevent data-toggle="modal" @click="detailuser(user.id)" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            	|
                            	<a href="" v-on:click.prevent ><i class="fa fa-trash-o" aria-hidden="true" @click="deleteuser(user.id)"></i></a>	                               
                          	</span>
                          	<!-- Action icons -->                                    
                        </div>

                    </div>
		
            	</div>

            	<pagination :data="users" @pagination-change-page="paginationdata" ></pagination>
				<div>		                    	
                    Showing {{users.from}} to {{users.to}} of total {{users.total}}	                    	
                </div>	
            </div>
		</div>
		<div id="modal">
          <newuser @recordupdated="refreshRecord" :roles="roles"></newuser>
          <!--editclient :selClient="clientdetail" @recordupdated="refreshRecord"></editclient-->
         
        </div>
    </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				search:'',
				users:{},
				roles:{}
			}
		},
		watch:{

		},
		methods:{
			paginationdata(page){
		        if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('users/create?page=' + page)
		          .then((response) => {
		          	console.log(response)
		          	this.users = response.data.users
		          	this.roles = response.data.roles
		          })
		          //	.catch(error => this.errors=error.response.data.errors);

		    },
		    detailuser(id){

		    },
		    deleteuser(id){

		    },
		    refreshRecord(record){

		    }
		
		},
		created(){
			this.paginationdata()
		}
	};

</script>

<style type="text/css" Scoped>


</style>