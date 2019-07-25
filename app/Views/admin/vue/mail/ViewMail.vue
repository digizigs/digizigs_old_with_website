<template>
	<div  role="dialog" tabindex="-1" id="viewmail" class="modal right fade" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">{{mail.subject}}</h4>
				</div>
				<div class="modal-body">
					
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['mail'],
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