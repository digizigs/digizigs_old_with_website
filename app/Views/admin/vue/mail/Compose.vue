<template>
	<div  role="dialog" tabindex="-1" id="composemail" class="modal right fade w80" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">Compose</h4>
				</div>
				<div class="modal-body">
					<form role="form" class="form-horizontal">
						<div class="form-group wp-input">
							<label class="col-lg-2 control-label">To</label>
							<div class="col-lg-10 col-xs-12 col-md-12">
								<input type="text" placeholder="" id="inputEmail1" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group wp-input">
							<label class="col-lg-2 control-label">Cc / Bcc</label>
							<div class="col-lg-10 col-xs-12 col-md-12">
								<input type="text" placeholder="" id="cc" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group wp-input">
							<label class="col-lg-2 control-label">Subject</label>
							<div class="col-lg-10 col-xs-12 col-md-12">
								<input type="text" placeholder="" id="inputPassword1" class="form-control input-sm">
							</div>
						</div>
						<div class="form-group wp-input	">
							<label class="col-lg-2 control-label">Message</label>
							<div class="col-lg-10 col-xs-12 col-md-12">
								<textarea rows="15" cols="25" class="form-control" id="" name=""></textarea>
							</div>
						</div>

						<div class="form-group">
							<div class="col-lg-offset-2 col-lg-10">
								<span class="btn green fileinput-button btn-sm">
								<i class="fa fa-plus fa fa-white"></i>
								<span>Attachment</span>
								<input type="file" name="files[]" multiple="">
								</span>
								<button class="btn btn-dark btn-sm" type="submit">Send</button>
										</div>
									</div>
								</form>
							</div>
						</div><!-- /.modal-content -->
					</div><!-- /.modal-dialog -->
				</div>
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