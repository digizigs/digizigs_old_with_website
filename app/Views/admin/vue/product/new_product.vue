<template>
	<div class="modal fade" id="new-product" role="dialog"  data-backdrop="false">
        <div class="modal-dialog modal-lg">
            	<div class="modal-content">
              		<div class="modal-header panel-heading">
		                <button type="button" class="close" data-dismiss="modal" >&times;</button>
		                  
		                <h4 class="modal-title"><i class="fa fa-user" aria-hidden="true"></i> Product</h4>
		            </div>
		            <div class="modal-body table-form">
						
						<div class="form-block-container">
							<h4 class="block-title">Product Details</h4>
							<table class="table value-table">
								
									<tr>
				            			<td class="fieldLabel" style="width:25%;">
				            				Product Name&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<input type="text" autofocus="autofocus" name="" value="">
				            			</td>
				            			<td class="fieldLabel">
				            				Model No.&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<input type="text" autofocus="autofocus" name="" value="">
				            			</td>
				            		</tr>

				            		<tr>
				            			<td class="fieldLabel">
				            				Active&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<input type="checkbox">
				            			</td>		            			

				            			<td class="fieldLabel">
				            				Category&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<select name="" id="">
				            					<option value="">sdasda</option>
				            					<option value="">sdasda</option>
				            					<option value="">sdasda</option>
				            					<option value="">sdasda</option>
				            				</select>
				            			</td>		            			
				            		</tr>

				            		<tr>
				            			<td class="fieldLabel">
				            				Vendor Name&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<select name="" id="">
				            					<option value="">sdasda</option>
				            					<option value="">sdasda</option>
				            					<option value="">sdasda</option>
				            					<option value="">sdasda</option>
				            				</select>
				            			</td>
				            			<td class="fieldLabel">
				            				Manufacturer &nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<select name="" id="">
				            					<option value="">sdasda</option>
				            					<option value="">sdasda</option>
				            					<option value="">sdasda</option>
				            					<option value="">sdasda</option>
				            				</select>
				            			</td>
				            		</tr>
								
									<tr>
				            			<td class="fieldLabel">
				            				Sales Start Date&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<input type="date">
				            			</td>
				            			<td class="fieldLabel">
				            				Sales End Date &nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<input type="date">
				            			</td>
				            		</tr>
									
									<h4 class="block-title">Stock Information</h4>
				            		<tr>
				            			<td class="fieldLabel">
				            				Unit Price&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<input type="text">
				            			</td>
				            			<td class="fieldLabel">
				            				Stock Count&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<input type="number">
				            			</td>
				            		</tr>

				            		<tr>
				            			<td class="fieldLabel">
				            				Product Image&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<input type="file">
				            			</td>		            			
				            		</tr>
									
									
									<h4 class="block-title">Product Description</h4>	
				            		<tr>
				            			<td class="fieldLabel">
				            				Product Description&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<textarea name="" id="" cols="50" rows="3"></textarea>
				            			</td>
				            			<td class="fieldLabel" >
				            				Comments&nbsp;&nbsp;&nbsp;
				            				<span class=" f-r">*</span>
				            			</td>
				            			<td class="fieldvalue">
				            				<textarea name="" id="" cols="50" rows="3"></textarea>
				            			</td>
				            		</tr>								
								
							</table>
						</div>
		            	
		            	
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
	}
	

	.form-block-container{
		margin-bottom: 40px;

		h4{
			font-size: 12px !important;
			font-weight: 400 !important;
		}

		input{width:100%;height:auto!important;min-height:26px;padding:4px 20px 4px 5px;margin:0;outline:0;font-family:sans-serif;font-size:1em;border:1px solid #aaa;border-radius:0;-webkit-box-shadow:none;box-shadow:none;background:#fff;}
	}
	
	input 				{
	  font-size:14px;
	  display:block;	  
	  border:none;
	  border-bottom:1px solid #757575;
	  width: 100%;
	}

	

	h4{
		font-size: 16px !important;
		font-weight: 500 !important;
		color: #2A3F54;
	}

	.fieldLabel {
	    width: 15%;
	    word-break: keep-all;
	    min-width: 30%;
	    vertical-align: top;
	    padding: 0 10px;
	}
	.fieldvalue{
		width: 30%;
		min-width: 30%;
		padding: 0 10px;
	}









	

</style>