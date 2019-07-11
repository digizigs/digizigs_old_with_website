<template>
	<section>
		<div class="">          
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
            		<div class="x_panel">
            			<div class="x_title">	                   
	                    <h2><i class="fa fa-align-left"></i> Chat <small></small>
	                    	<span class="search">
	                  			<i class="fa fa-search"></i>
	                  			<div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="Search here...">

                                    </div>

                                </div>
                            </span>	
	                    </h2>
	                    <div class="clearfix"></div>
	                </div>

	                <div class="x_content">
	                	<div class="row">
	                		<div class="col-md-3 users-block">

	                			<div class="list-group">

									<a href="#" v-for="user in users" class="list-group-item chat-user">
										<span class="user-img mr-10">
											<img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32" style="display:inline-flex;">
										</span>
										
										<span class="user-status mr-10 online">
											<i class="fa fa-circle" aria-hidden="true"></i>
										</span>

										<span class="user-name mr-10">
											{{user.firstname}},{{user.lastname}}
										</span>
									</a>

									
								  
								</div>
	                			
	                		</div>
	                	</div>
	                </div>
            		</div>
            	</div>
            </div>
        </div>
    </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				users:[],
			}
		},
		watch:{

		},
		methods:{
		
		},
		created(){
			axios.get('chatusers')
				.then(response => {
					this.users=response.data
					
					
				})
				.catch(error => {
					//console.log(error)
				})
		}
	};

</script>

<style type="text/css" Scoped>
	.mr-10{
		margin-right:10px;
	}
	.mr-20{
		margin-right:20px;
	}
	.chat-user img{
		border-radius: 50%;
		
	}
	.online .fa{
		color: green;
	}
</style>