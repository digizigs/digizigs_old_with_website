<template>
	<div class="modal fade" id="addrole" role="dialog"  data-backdrop="false">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              	 <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                    <h4 class="modal-title"><b>New Role</b></h4>
                </div>
              	<div class="modal-body">

              		
              		<form  role="form" class="form-horizontal">

						<div class="form-group">
						    <label class="col-sm-2 control-label">Role Name</label>
						    <div class="col-sm-10">
						      <input class="form-control" type="text"  >
						      <i><small>The name is how it appears.</small></i>
						    </div>
						    
						</div>

						  
						<div class="form-group">
			                <label class="col-sm-2 control-label">Permission</label>
				            <div class="col-sm-10">
				                <select class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true">
				                  <option>Alabama</option>
				                  <option>Alaska</option>
				                  <option>California</option>
				                  <option>Delaware</option>
				                  <option>Tennessee</option>
				                  <option>Texas</option>
				                  <option>Washington</option>
				                </select><span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1"><ul class="select2-selection__rendered"><li class="select2-search select2-search--inline"><input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Select a State" style="width: 518px;"></li></ul></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
				            </div>
			            	
			            </div>
							

					</form>
              	</div>

              	<div class="modal-footer">
              		<button class="btn btn-primary btn-sm pull-left" >Add</button>             		
              	</div>
          	</div>
      	</div>
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