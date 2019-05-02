<template>
	<div id="live-chat">
		
		<header class="clearfix">
			
			<a href="#" class="chat-close">x</a>
			<img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" alt="" width="32" height="32" style="display:inline-flex;">
			<span> Digizigs Bot </span>

			<span class="chat-message-counter" style="display: block;">{{chat.message.length}}</span>

		</header>

		<div class="chat" style="display: none">

			<ul class="chat-history" v-chat-scroll>


				<li class="clearfix chat-message">
		            <div class="message-data align-right">
		              <span class="message-data-time" >10:12 AM, Today</span> &nbsp; &nbsp;
		              <span class="message-data-name" >DZ Bot</span> <i class="fa fa-circle me"></i>
		              
		            </div>
		            <div class="message other-message float-right">
		              Hi Vincent, how are you? How is the project coming along?
		            </div>
		        </li>

		        <li v-for="msg in chat.message" :key=msg.index>
		            <div class="message-data">
		              <span class="message-data-name"><i class="fa fa-circle online"></i> Me</span>
		              <span class="message-data-time">10:12 AM, Today</span>
		            </div>
		            <div class="message my-message">
		              {{msg}}
		            </div>
		        </li>
				
			</ul>
						
			<form action="#" method="post" v-on:submit.prevent="send">

				<fieldset>
					<span class="chat-feedback">Your partner is typing…</span>
					<input type="text" placeholder="Type your message…" autofocus v-model='message'>
				</fieldset>

			</form>

		</div> <!-- end chat -->

	</div> <!-- end live-chat -->
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				message:'',
				chat:{
					message:[]
				}
			}
		},
		watch:{

		},
		computed: {
		    now () {
		      return new Date
		    }
		},
		methods:{
			send(){
				if(this.message.length != 0){
					this.chat.message.push(this.message)
										
					axios.post('send',{
						message : this.message
					})
					.then(response => {
						//console.log(response)
						this.message=''
					})
					.catch(error => {
						console.log(error)
					})

				}			
			}
		},
		mounted(){
			Echo.private('chat')
		    .listen('ChatEvent', (e) => {
		    	this.chat.message.push(e.message)
		        //console.log(e);
		    });
		}
	};

</script>

<style type="text/css" Scoped>
	

</style>