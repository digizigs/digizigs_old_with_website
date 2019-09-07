<template>
	<div class="mail-wrapper">

		<mailbox-sidebar></mailbox-sidebar>

		<mailbox-group :mails = "mails"></mailbox-group>

		<mail-compose></mail-compose>

	</div><!-- mail-wrapper -->
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				filter:'',
				email:'',
				user:{},
				mails:[],
				mail:{},
			}
		},
		watch:{

		},
		methods:{
		
		},
		created(){
			axios.get('mail/create',{params:{filter:this.filter,email:this.user.email}})
					.then((response) => {
						console.log(response.data)
						this.mails=response.data
						//this.mails=response.data
						//this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === 'inbox')
						//this.dataloaded = true
					})
				.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>


</style>