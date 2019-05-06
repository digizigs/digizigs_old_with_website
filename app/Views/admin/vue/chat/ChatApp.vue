<template>
	<div class="chat-app">
        <Conversation :contact="selectedContact" :messages="messages" @new="saveNewMessage"/>
        <ContactsList :contacts="contacts" @selected="startConversationWith"/>
    </div>
</template>

<script type="text/javascript">
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

			},
			saveNewMessage(message) {

			},
			hanleIncoming(message) {

			},
			updateUnreadCount(contact, reset) {

			}
		},
		created(){
		
		}
	};

</script>

<style lang="scss" Scoped>

.chat-app {
    display: flex;
}

</style>