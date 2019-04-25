<template>
	<section>
		<div class="">          
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
            		<div class="x_panel">
            			<div class="x_title">	                   
		                    <h2><i class="fa fa-align-left"></i> Categories <small>Manage app categories</small></h2>
		                    <div class="clearfix"></div>
		                </div>

		                <div class="x_content">
		                	<div class="col-md-4 col-xs-12">

		                		<div class="form-group glow-input">
	                                <label for="usr">Category Name</label>
	                                <input type="text" class="form-control input-sm" v-model="category">
	                                <small><i>The name is how it appears on your site.</i></small>
	                            </div>

	                            <!--Parent category dropdown-->
                               	<div class="form-group glow-input">
                                	<label for="sel1">Parent Catagory</label>
	                                <select class="form-control input-sm" v-model="selectedparent">	                                   
	                                   <option value="">--Please select parent--</option>
	                                   <option v-for="cat,key in categories" >{{cat.name}}</option>	                                   	                                   
	                                </select>
                                 	<small><i>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</i></small>
                               	</div>

                               	<div>
                                 <button type="submit" class="btn btn-dark btn-sm" style="margin-bottom: 20px;" >
                                   Add Category
                                 </button>
                               </div>

		                	</div>
		                	<div class="col-md-8 col-xs-12">
		                		<div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">

		                			<div class="panel" v-for="cat,key in categories">

                                    	<a class="panel-heading collapsed" role="tab" data-toggle="collapse" data-parent="#accordion" href="#a" aria-expanded="false" aria-controls="collapseOne">
                                      		<span><b>{{cat.name}}</b></span>
                                       		<span class="pull-right"><b>Post Count</b></span>
                                      	</a>

                                      	<div id="a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                          	<div class="panel-body">
                                    
                                            	<div class="table-responsive">
	                                                <table class="table table-striped jambo_table bulk_action">
	                                                      <tbody>
	                                                         
	                                                         <tr id="">
	                                                           <td style="width: 35%;"> aa </td>
	                                                           <td style="width: 35%;"> <a href="">cc</a> </td>
	                                                           <td style="width: 20%">
	                                                             3
	                                                           </td>
	                                                            <td style="width: 2%;"> 
	                                                             <a href="" data-toggle="tooltip" data-placement="top" title="Edit">
	                                                               <i class="fa fa-pencil actionicon" aria-hidden="true"></i>
	                                                             </a>
	                                                           </td>  
	                                                           
	                                                           <td style="width: 2%;">                                   
	                                                             <a href="" data-toggle="tooltip" data-placement="top" title="Edit">
	                                                               <i class="fa fa-trash actionicon" aria-hidden="true"></i>
	                                                             </a>
	                                                           </td>
	                                                         </tr>
	                                                         
	                                                      </tbody>
	                                                </table>
                                             	</div>                                    
                                             
                                          	</div>
                                       	</div>

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
				categories:[],
				category:'',
				selectedparent:'',
			}
		},
		watch:{

		},
		methods:{
		
		},
		created(){
			axios.get('category/create')
			.then((response) => {this.categories=response.data})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>

	.panel-heading{
		margin: 0;
		padding: 0;
	}

	.panel-body{

	}
	table{
		margin:0;
	}
</style>