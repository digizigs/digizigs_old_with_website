<template>
	<div class="chat-app">
                      	
        	<div class="col-md-4 col-sm-12 col-xs-12">
        		<ContactsList :contacts="contacts" @selected="startConversationWith"/>
        	</div>
        	<div class="col-md-8 col-sm-12 col-xs-12">
        		<Conversation :user="user" :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
        	</div>
     
    </div>
</template>

<script type="text/javascript">
	import ContactsList from './ContactsList';
	//import Conversation from './Conversation';

	export default{
		props: {
            user: {
                type: Object,
                required: true
            }
        },
		data(){
			return{
				selectedContact: null,
                messages: [],
                contacts: []
			}
		},
		watch:{

		},
		methods:{
			startConversationWith(contact) {

				
				this.updateUnreadCount(contact, true);
				//console.log(contact.id);
				axios.get(`conversation/${contact.id}`)
                    .then((response) => {
                    	//console.log(response);
                        this.messages = response.data;
                        this.selectedContact = contact;
                    })

			},
			saveNewMessage(message) {

				this.messages.push(message);

			},
			hanleIncoming(message) {

				if (this.selectedContact && message.from == this.selectedContact.id) {
                    this.saveNewMessage(message);
                    return;
                }

                this.updateUnreadCount(message.from_contact, false);

			},
			updateUnreadCount(contact, reset) {

				this.contacts = this.contacts.map((single) => {
                    if (single.id !== contact.id) {
                        return single;
                    }

                    if (reset)
                        single.unread = 0;
                    else
                        single.unread += 1;

                    return single;

                })
			}
		},
		mounted(){
			/*Echo.private(`messages.${this.user.id}`)
                .listen('NewMessage', (e) => {
                    this.hanleIncoming(e.message);
                });*/

			axios.get('chatusers')
                .then((response) => {
                	//console.log(response);
                    this.contacts = response.data;
                });
		
		},
		components: {ContactsList}
	};

</script>

<style lang="scss" Scoped>
	.bdr{
		border:1px solid grey;
	}
	.chat-app {		
	    //height: 50vh;
	}

	.contacts-column{
		overflow: scroll;
	}

</style>