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

				
				
				<div v-for="msg,index in chat.message" :key=msg.index>					
					<li v-if="chat.user[index] === 'Me'">
						<div class="message-data">
			              <span class="message-data-name"><i class="fa fa-circle online"></i> {{chat.user[index]}}</span>
			              <span class="message-data-time">{{chat.time[index]}}</span>
			            </div>
			            <div class="message my-message">
			              {{msg}}
			            </div>			            
					</li>
					<li v-else >
						<div class="clearfix chat-message">
			            	<div class="message-data align-right">
				            	<span class="message-data-time" >{{chat.time[index]}}</span> &nbsp; &nbsp;
				              	<span class="message-data-name" >{{chat.user[index]}}</span> <i class="fa fa-circle me"></i>     
				            </div>
				            <div class="message other-message float-right">
				               {{msg}}
				            </div>
				            
			            </div>
					</li>
				</div>
				<span class="chat-feedback align-right">{{this.typing}}</span>
						        
				
			</ul>
						
			<form action="#" method="post" v-on:submit.prevent="send">

				<fieldset>					
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
					message:[],
					user:[],
					time:[],				
				},
				typing:''
			}
		},
		watch:{
			/*message(){
				Echo.private('chat')
			    .whisper('typing', {
			        name: this.message
			    });
			}*/
		},
		computed: {
		    now () {
		      return new Date
		    }
		},
		methods:{
			send(){
				if(this.message.length != 0){

					//Console.log('Geust chat msg send')
					this.chat.message.push(this.message)
					this.chat.user.push('Me')
					this.chat.time.push(this.getTime())	

					axios.post('guestsend',{
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
			},
			getTime(){
				let time = new Date();
				return time.getHours()+':'+time.getMinutes();
			}
		},
		mounted(){
			Echo.private('guestchat')
			    .listen('GuestChatEvent', (e) => {

			    	
			    	this.chat.message.push(e.message)
			    	this.chat.user.push(e.user)
			    	this.chat.time.push(this.getTime())	

			    	
			        //console.log(e);
			    });

			    /*.listenForWhisper('typing', (e) => {
			    	if(e.name != '' ){
			    		this.typing='typing...'
			    	}else{
			    		this.typing=''
			    	}
			        

			    });

			Echo.join(`chat`)
			    .here((users) => {
			        //
			    })
			    .joining((user) => {
			        console.log(user.name + ' Joined');
			    })
			    .leaving((user) => {
			        console.log(user.name + ' Left');
			    });*/
		}
	};

</script>

<style type="text/css" Scoped>
	

</style>