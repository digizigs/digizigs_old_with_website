<template>
	<section>
		<div class="">          
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
            		<div class="x_panel">
            			<div class="x_title">	                   
		                    <h2>
			              		<i class="fa fa-align-left"></i>
			              		Tite <small></small> 
			              		<span class="search">
									<i class="fa fa-search"></i>
									<div class="form-group">
								        <div class="form-line">
								            <input type="text" class="form-control" placeholder="Search here..." v-model="search">
								        </div>

								    </div>
								</span>	
			              	</h2>
		                </div>

		                <div class="x_content">
		                	
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
				search:''
			}
		},
		watch:{

		},
		methods:{
		
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>