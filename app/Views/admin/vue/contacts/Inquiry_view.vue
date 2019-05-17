<template>
	<section>
		<div class="modal fade" id="inqview" tabindex="-1" role="dialog" style="display: none;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="defaultModalLabel">
                        	{{inqiry.name}} <small></small>
                        	<br>
                        	<small>{{inqiry.email}}</small>
                        	<br>
                        	<small>{{inqiry.contact}}</small>
                        </h4>
                        	
                    </div>
                    <div class="modal-body">
                        {{inqiry.message}}
						<br><br>
                        <div class="col-sm-12 col-xs-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea rows="4" class="form-control no-resize" placeholder="Please type response..."></textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                    	<button type="button" class="btn btn-primary btn-sm waves-effect" data-dismiss="modal">Send</button>                      
                        <button type="button" class="btn btn-dark btn-sm waves-effect" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script type="text/javascript">
	export default{
		props:['inqiry'],
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
	.modal-footer{
		padding: 20px 30px;
	}

</style>