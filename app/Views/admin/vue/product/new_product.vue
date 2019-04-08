<template>
	<div class="modal fade" id="new-product" role="dialog"  data-backdrop="false">
        <div class="modal-dialog modal-lg">
            	<div class="modal-content">
              		<div class="modal-header panel-heading">
		                <button type="button" class="close" data-dismiss="modal" >&times;</button>
		                  
		                <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Product</h4>
		            </div>
		            <div class="modal-body table-form">
						
						<form  role="form" class="form-horizontal" action=" " method="post">
                              
							<div class="block-container" style="margin-bottom:40px;">
								<div class="block-heading">
									<h4>Product Details</h4>
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="form-group glow-input">
			                                <div class="col-sm-12 col-xs-12">
			                                  <b><i><small>Product Name</small></i></b>
			                                  <input class="form-control input-sm" type="text" name="prod-name" required="Enter name of product">
			                                </div>                
			                            </div>

			                            <div class="form-group glow-input">
			                                <div class="col-sm-12 col-xs-12">
			                                  <b><i><small>Last Name</small></i></b>
			                                  <input class="form-control input-sm" type="text" name="lastname" required="Please ente a Role Name">
			                                </div>                
			                            </div>	
									</div>
									<div class="col-md-6">
										<div class="form-group glow-input">
			                                <div class="col-sm-12 col-xs-12">
			                                  <b><i><small>Category</small></i></b>
			                                  <select name="" id="" class="form-control input-sm">
			                                  	<option value="">op-1</option>
			                                  	<option value="">op-2</option>
			                                  	<option value="">op-3</option>
			                                  </select>
			                                </div>                
			                            </div>

			                            <div class="form-group glow-input">
			                                <div class="col-sm-12 col-xs-12">
			                                  <b><i><small>Last Name</small></i></b>
			                                  <input class="form-control input-sm" type="text" name="lastname" required="Please ente a Role Name">
			                                </div>                
			                            </div>
									</div>
								</div>

								<div class="form-group glow-input">
	                                <div class="col-sm-12 col-xs-12">
	                                  <b><i><small>status</small></i></b>
	                                  <input class="form-control input-sm" type="checkbox" name="firstname" required="Please ente a Role Name">
	                                </div>                
	                            </div>

	                            <div class="form-group glow-input">
	                                <div class="col-sm-12 col-xs-12">
	                                  <b><i><small>Model</small></i></b>
	                                  <input class="form-control input-sm" type="text" name="lastname" required="Please ente a Role Name">
	                                </div>                
	                            </div>

							</div>

							<div class="block-container">
								<div class="block-heading">
									<h4>Stock Details</h4>
								</div>

								<div class="col-md-6">
									<div class="form-group glow-input">
		                                <div class="col-sm-12 col-xs-12">
		                                  <b><i><small>Unit Price</small></i></b>
		                                  <input class="form-control input-sm" type="text" name="firstname" required="Please ente a Role Name">
		                                </div>                
		                            </div>
								</div>

	                            <div class="col-md-6">
	                            	<div class="form-group glow-input">
		                                <div class="col-sm-12 col-xs-12">
		                                  <b><i><small>Quantity</small></i></b>
		                                  <input class="form-control input-sm" type="text" name="lastname" required="Please ente a Role Name">
		                                </div>                
		                            </div>
	                            </div>

							</div>

                              

                              
                              
                              
                              
                              
                              <button class="btn btn-dark btn-sm" >Add User</button>
                              
                            </form>

		            	
		            </div>
              	</div>
        </div>
    </div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
			
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

	.modal-content{
		border-radius: 1px !important;
		border-radius: 4px !important;
	    transition: all 0.56s cubic-bezier(0.25, 0.8, 0.25, 1);
	    -webkit-box-shadow: 0 1px 20px 0 rgba(69, 90, 100, .08);
	    box-shadow: 0 1px 20px 0 rgba(69, 90, 100, .08) !important;
	}
	

	.form-block-container{
		margin-bottom: 40px;

		input{width:100%;height:auto!important;min-height:26px;padding:4px 20px 4px 5px;margin:0;outline:0;font-family:sans-serif;font-size:1em;border:1px solid #aaa;border-radius:0;-webkit-box-shadow:none;box-shadow:none;background:#fff;}
	}
	
	input 				{
	  font-size:14px;
	  display:block;	  
	  border:none;
	  border-bottom:1px solid #757575;
	  width: 100%;
	}

	
	.test{
		.woha{

		}
	}
	h4{
		font-size: 16px !important;
		font-weight: 600 !important;
		color: #2A3F54;
	}

	.fieldLabels {
	    width: 10%;
	    word-break: keep-all;
	    min-width: 30%;
	    vertical-align: top;
	    padding: 0 10px;
	}
	.fieldvalues{
		width: 30%;
		min-width: 30%;
		padding: 0 10px;
	}





	.card-header{
		margin-bottom: 0;
	    color: #505458;
	    font-size: 14px;
	    font-weight: 600;
	    display: inline-block;
	    margin-right: 10px;
	    line-height: 1.4
	}



	

</style>