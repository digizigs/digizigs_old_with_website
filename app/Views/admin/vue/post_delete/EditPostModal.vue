<template>
	<div class="modal fade" id="editpost">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" @click="modalclose" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span></button>
				</div>
				<div class="modal-body">
					<div class="row">
						<div class="col-md-8">
						
							<div class="form-group">
			                    <label for="usr">Post Title</label>
			                    <input type="text" class="form-control input-sm" name="post_title">
			                </div>

			                <div class="form-group">
			                    <label for="usr">Post description</label>
			                    <input type="text" class="form-control input-sm"  name="post_desc">
			                </div>
			              
			                <div class="form-group">
			                    <label for="editor1">Post Body</label>
			                    <textarea id="textarea" name="post_body" rows="15" cols="80" class="form-control">
			                        
			                    </textarea>
			                      
			                    <small><b>Word Count</b> 12</small>
			                </div>
						</div>

						<div class="col-md-4">
							<div class="x_panel">
								<div class="x_title">
									<h2><i class="fa fa-align-left"></i> Options </h2>
                        			<button class="btn btn-dark btn-sm pull-right">Update</button>
                        			<div class="clearfix"></div>
								</div>
								<div class="x_content">
									<div class="accordion" id="accordion1" role="tablist" aria-multiselectable="true">
										
										<div class="panel">
			                              <a class="panel-heading collapsed" role="tab" id="headingOne1" data-toggle="collapse" data-parent="#accordion1" href="#collapseOne1" aria-expanded="false" aria-controls="collapseOne">
			                                <span class=" ">Status & Visiblity</span>
			                                <span><i class="fa fa-caret-down pull-right" style="margin-top: 5px;"></i></span>
			                              </a>
			                              <div id="collapseOne1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
			                                <div class="panel-body">

			                                  <div class="radio">
			                                    <label class="">
			                                      <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" checked="" name="status" value="Published" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Published
			                                    </label>
			                                    
			                                    <label class="">
			                                      <div class="iradio_flat-green" style="position: relative;"><input type="radio" class="flat" name="status" value="Draft" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Draft
			                                    </label>


			                                   
			                                  </div><!-- pannelbody -->
			                                </div>
			                              </div>
			                          	</div>

			                          	<!-- Category -->
				                        <div class="panel">
				                            <a class="panel-heading collapsed" role="tab" id="headingTwo1" data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo1" aria-expanded="false" aria-controls="collapseTwo">
				                          
				                              <span class=" ">Categories</span>
				                              <span><i class="fa fa-caret-down pull-right" style="margin-top: 5px;"></i></span>
				                            </a>
				                            <div id="collapseTwo1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false" style="height: 0px;">
				                              <div class="panel-body">

				                                <div class="col-md-12">
				                                  <select class="form-control select2 select2-hidden-accessible " multiple=""  style="width: 100%; height: 200px;" tabindex="-1" aria-hidden="true" name="category[]">
				                                  
				                                      
				                                        <option>Category</option>
				                                     
				                                              
				                                  </select>
				                                </div>
				                           
				                              </div>
				                            </div>
				                        </div>

				                         <!--  tags -->
				                        <div class="panel">
				                            <a class="panel-heading collapsed" role="tab" id="headingThree1" data-toggle="collapse" data-parent="#accordion1" href="#collapseThree1" aria-expanded="false" aria-controls="collapseThree">
				                              
				                              <span class="">Tags</span>
				                              <span><i class="fa fa-caret-down pull-right" style="margin-top: 5px;"></i></span>
				                            </a>
				                            <div id="collapseThree1" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
				                              <div class="panel-body">
				                               
				                                <div class="col-md-12" >
				                                  <select class="form-control tags" multiple=""  style="width: 100%; height: 200px;" tabindex="-1" aria-hidden="true" name="tags[]">          
				                                  </select>                               
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
				<div class="modal-footer">
					Footer
				</div>
				
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['recrd'],
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


</style>