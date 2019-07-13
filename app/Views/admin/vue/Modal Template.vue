<template>
	<div class="modal fade modal-right-slide" id="addclient" role="dialog"  data-backdrop="false">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">

        	<!--Modal Header-->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" @click="modalclose">&times;</button>
            <h4 class="modal-title" id="defaultModalLabel">Modal Title</h4>
          </div>
          <!--Modal Header-->
          
          <!--Modal Body-->
          <div class="modal-body">
            Modal Body
          </div>
          <!--Modal Body-->

          <!--Modal Footer-->
          <div class="modal-footer">
            Modal Footer
          </div>
          <!--Modal Footer-->
        
        </div>
      </div>
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
			modalclose(){

			}
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>