<template>
	<div class="contacts-list">

        <ul class="list-group">
            <li v-for="contact in sortedContacts" class="list-group-item" :key="contact.id" @click="selectContact(contact)" :class="{ 'selected': contact == selected }">
                <div class="avatar active">
                    <img src="http://gravatar.com/avatar/2c0ad52fc5943b78d6abe069cc08f320?s=32" :alt="contact.name">
                </div>

                <div class="contact">
                    <p class="name">{{ contact.firstname }},{{ contact.lastname }}  </p>
                    <p class="email">{{ contact.email }}</p>
                </div>

                <span class="unread" v-if="contact.unread">
                	{{ contact.unread }}
                </span>
                
            </li>
            
        </ul>
    </div>
</template>

<script type="text/javascript">
	export default{
		props: {
            contacts: {
                type: Array,
                default: []
            },
            
        },
		data(){
			return{
				selected: this.contacts.length ? this.contacts[0] : null
			}
		},
		watch:{

		},
		methods:{
			selectContact(contact) {
				//console.log(contact)
                this.selected = contact;
                this.$emit('selected', contact);
            }
		},
		computed: {
            sortedContacts() {
                return _.sortBy(this.contacts, [(contact) => {
                    if (contact == this.selected) {
                        return Infinity;
                    }
                    return contact.unread;
                }]).reverse();
            }
        },
		created(){
		
		}
	};

</script>

<style lang="scss" Scoped>
	
	.contacts-list {
	 
	    height: 65vh;
	    overflow: scroll;
	    //border-left: 1px solid #a6a6a6;
	    
	    ul {
	        list-style-type: none;
	        padding-left: 0;
	        li {
	            display: flex;
	            padding: 2px;
	            border-bottom: none !important;
	            height: 60px;
	            position: relative;
	            cursor: pointer;
	            &.selected {
	                background: #dfdfdf;
	            }
	            span.unread {
	                background: #82e0a8;
	                color: #fff;
	                position: absolute;
	                right: 5px;
	                top: 5px;
	                display: flex;
	                font-weight: 500;
	                min-width: 20px;
	                justify-content: center;
	                align-items: center;
	                line-height: 20px;
	                font-size: 8px;
	                padding: 0 2px;
	                border-radius: 25%;
	            }
	            .avatar {
	                flex: 1;
	                display: flex;
	                align-items: center;
	                img {	                    
	                    border-radius: 50%;
	                    margin: 0 auto;
	                    margin-top: 0px;
	                    height: 40px;
	    				width: 40px;
	    				display:inline-flex;
	    				
	                }

	                &active{
	                	border:2px solid green;
	                }
	            }

	            .avatar.active{
	            	img{
	            		border:2px solid green;
	            	}
	            }
	            .contact {
	                flex: 3;
	                font-size: 12px;
	                overflow: hidden;
	                display: flex;
	                flex-direction: column;
	                justify-content: center;
	                p {
	                    margin: 0;
	                    &.name {
	                        font-weight: bold;
	                    }
	                }
	            }
	        }
	    }
	}
	.list-group{
		margin:0 !important;
	}
</style>