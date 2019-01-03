<template>
	 <div class="modal fade modal-info" id="viewcontacts">
        <div class="modal-dialog modal-lg">
        	<div class="modal-content">
              	<div class="modal-header">
              		<button type="button" class="close" data-dismiss="modal" aria-label="Close" @click="clearddata">
                  	<span aria-hidden="true">×</span></button>
                  	<h4 v-model="message.name">{{recrd.name}}</h4>
              	</div>
              	<div class="modal-body">
              		<h4>Email:</h4><span><i>{{recrd.email}}</i></span>
              		<h4>Contact:</h4><span><i>{{recrd.contact}}</i></span>
              		<h4>Message:</h4><span><i>{{recrd.message}}</i></span>
              		<h4>Response:</h4><textarea name="" id="" rows="10" class="form-control" v-model="message.responsemessage"></textarea>
              		<button class="btn btn-primary form-control" id="responsesend" @click="responsesend">
              			<i class="fa fa-paper-plane-o" aria-hidden="true"></i>
              			Send Response
              		</button>
              	</div>
              	<div class="modal-footer">
              		<button type="button" class="btn btn-primary pull-left" data-dismiss="modal" @click="clearddata">Close</button>
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
				message:{name:'',email:'',contact:'',message:'',responsemessage:''},
				success:'',
				errors:'',
				contacts:{},
			}
		},
		watch:{

		},
		methods:{
			responsesend(){

				axios.post('contact',this.message)
				.then((response) => {
					//this.contacts=response.data
					console.log(response.data);
					//$('#viewcontacts').modal('hide');
				})
				.catch((error) => console.log(error))

				toast({
		  			type: 'success',
		  			title: 'Category added successfully'
				})
				
			},
			clearddata(){
				this.message={};
			},
			
		},
		created(){
			message.name='dddddd';
		}
	};

</script>

<style type="text/css" Scoped>

	textarea{
		color: #000;
	}

	#responsesend{
		margin-top: 20px;
	}
</style>