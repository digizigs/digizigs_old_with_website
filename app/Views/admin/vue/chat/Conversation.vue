<template>
	<div class="conversation">

        <!--h4>{{ contact ? contact.firstname : 'Select a user to start conversation' }}</h4-->

        <div class="feed" ref="feed">
           
            <ul v-if="contact" class="chat-history">
                <!-- <li v-for="message in messages" :class="`message${message.to == contact.id ? ' sent' : ' received'}`" :key="message.id">
                    <div class="text">
                        {{ message.text }}
                    </div>
                </li> -->

                <li v-for="message in messages">
                    
                    <div v-if="message.to !== contact.id">
                        <div class="message-data">
                          <span class="message-data-name">{{contact.firstname}}</span>
                          <span class="message-data-time">{{ message.created_at | vueAgoTime }}</span>
                        </div>
                        <div class="message my-message">
                          {{ message.text }}
                        </div>   
                    </div>

                    <div v-else class="clearfix chat-message">
                        <div class="message-data align-right">
                            <span class="message-data-time" >{{ message.created_at | vueAgoTime }}</span> &nbsp; &nbsp;
                            <span class="message-data-name" >{{user.firstname}}</span></i>     
                        </div>
                        <div class="message other-message float-right">
                           {{ message.text }}
                        </div>
                        
                    </div>


                </li>              

            </ul>

        </div>

        <div class="composer">
            <textarea v-model="message" @keydown.enter="sendMessage" placeholder="Message..."></textarea>
        </div>

    </div>
</template>

<script type="text/javascript">   
	export default {
        props: {
            contact: {
                type: Object,
                default: null
            },
            messages: {
                type: Array,
                default: []
            },
            user:{}
        },
        data(){
            return{
                sendmsg:'',
                message: '',              
            }
        },
        watch:{
            contact(contact) {
                this.scrollToBottom();
            },
            messages(messages) {
                this.scrollToBottom();
            }
        },
        methods: {
            getTime(){
                let time = new Date();
                return time.getHours()+':'+time.getMinutes();
            },            
            sendMessage(e) {               
                e.preventDefault();
                
                if (!this.contact) {
                    return;
                }
                 
                this.sendmsg=this.message
                this.message = ''
                
                axios.post('conversation/send', {contact_id: this.contact.id,text: this.sendmsg})
                .then((response) => {
                    //console.log(response);
                    this.$emit('new', response.data);
                    this.sendmsg = '';
                })
            },
            scrollToBottom() {
                setTimeout(() => {
                    this.$refs.feed.scrollTop = this.$refs.feed.scrollHeight - this.$refs.feed.clientHeight;
                }, 50);
            }
        }
       
    }

</script>

<style lang="scss" Scoped>
    .conversation {
        flex: 5;
        display: flex;
        flex-direction: column;
        justify-content: space-between;

        h4 {
            font-size: 20px;
            padding: 10px;
            margin: 0;
            border-bottom: 1px dashed lightgray;
        }
    }
    .composer textarea {
        width: 100%;
        margin-top: 5px;
        resize: none;
        border-radius: 3px;
        border: 1px solid lightgray;
        padding: 6px;
    }
    .feed {
        background: #f0f0f0;
        height: 100%;
        min-height: 55vh;
        max-height: 55vh;
        overflow: scroll;

        ul {
            list-style-type: none;
            padding: 5px;

            li {
                &.message {
                    margin: 10px 0;
                    width: 100%;

                    .text {
                        max-width: 200px;
                        border-radius: 5px;
                        padding: 12px;
                        display: inline-block;
                    }

                    &.received {
                        text-align: right;
                        

                        .text {
                            background: #86BB71;
                        }
                    }

                    &.received:after {
                        text-align: right;
                        
                        
                        .text {
                            background: #86BB71;
                        }
                    }

                    &.sent {
                        text-align: left;

                        .text {
                            background: #81c4f9;
                        }
                    }
                }
            }
        }
    }

    $green: #86BB71;
    $blue: #94C2ED;
    $orange: #E38968;
    $gray: #92959E;

    .chat-history {
            /* height: 252px;
            padding: 8px 24px;
            overflow-y: scroll; */

            padding: 30px 30px 20px;
            //border-bottom: 2px solid white;
            //overflow-y: scroll;
            //height: 252px;

            .chat-message {
                margin: 16px 0;

                img {
                    border-radius: 50%;
                    float: left;
                }

                .chat-message-content {
                    margin-left: 56px;
                }

                .chat-time {
                    float: right;
                    font-size: 10px;
                }
            }

            .chat-message-sender {
                margin: 16px 0;

                img {
                    border-radius: 50%;
                    float: right;
                }

                .chat-message-content {
                    margin-right: 56px;
                }

                .chat-time {
                    float: right;
                    font-size: 10px;
                }
            }

            .message-data {
                margin-bottom: 10px;

                .message-data-time {
                    color: lighten($gray, 8%);
                    padding-left: 6px;
                }
                
            }

            .message {      
                color: white;
                padding: 10px 12px;
                line-height: 16px;
                font-size: 12px;
                border-radius: 7px;
                margin-bottom: 15px;
                width: 90%;
                position: relative;
              
              &:after {
                bottom: 100%;
                left: 7%;
                border: solid transparent;
                content: " ";
                height: 0;
                width: 0;
                position: absolute;
                pointer-events: none;
                border-bottom-color: $blue;
                border-width: 5px;
                margin-left: -5px;
              }
            }

            .my-message {
              
              background: $blue;
            }

            .other-message {
              background: $green;
              
              &:after {
                border-bottom-color: $green;
                left: 93%;
              }
            }

            .online, .offline, .me {
                margin-right: 3px;
                font-size: 10px;
            }

            .online {
              color: $green;
            }

            .offline {
              color: $orange;
            }
            .me {
              color: $blue;
            }

            .align-left {
              text-align: left;
            }
            .align-right {
              text-align: right;
            }
            .float-right {
              float: right;
            }
            .clearfix:after {
                visibility: hidden;
                display: block;
                font-size: 0;
                content: " ";
                clear: both;
                height: 0;
            }


        }
</style>