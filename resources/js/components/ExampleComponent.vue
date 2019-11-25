<template>
    <div>
        <div class="chat-window" :class="{opened: isOpen, closed: isOpen}">
            <div class="chat-header">
                <div class="chat-header-title">CHT Chat Support</div>
            </div>
            <div class="message-list" v-chat-scroll="{always: false, smooth: true}">
                <div class="message" v-for="message in messages">
                    <div class="message-content" :class="{ sent : message.sender == 'member', received : message.sender == 'admin' }">
                        <div class="message-text">{{ message.message }}</div>
                    </div>
                </div>
            </div>
            <div class="message-input">
                <input type="text" @keyup.enter="sendMessage" v-model="newMessage" name="message" autocomplete="off" class="message-input-text" placeholder="Send a message...">

                <div class="message-buttons">
                    <div class="message-button">
                        <button type="button" @click="sendMessage" class="message-button-send" tooltip="Send">
                            <font-awesome-icon class="open-icon" :icon="['fas', 'paper-plane']" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="chat-launcher" :class="{opened: isOpen}" @click.prevent="isOpen ? closeChat() : openChat()">
            <font-awesome-icon v-if="isOpen" class="open-icon" :icon="['fas', 'comment']" />
            <font-awesome-icon v-else class="closed-icon" :icon="['fas', 'times']" />
        </div>
    </div>
</template>

<script>
    export default {
        props: ['user'],
        data() {
            return {
                messages: [],
                newMessage: '',
                isOpen: true,
                me: 'member',
                users: [],
            }
        },
        mounted() {
            this.getMessage();

            Echo.join('cht-support')
                .here(user => {
                    this.users = user;
                    console.log(user);
                })
                .joining(user => {
                    this.users.push(user);
                })
                .leaving(user => {
                    this.users = this.users.filter(u => u.id != user.id);
                })
                .listen('Support', (event) => {
                    
                });
        },
        methods: {
            openChat() {
                this.isOpen = true;
               
            },
            closeChat() {
                this.isOpen = false;
               
            },
            getMessage() {
                axios.get('/chat/fetch').then(response => {
                    this.messages = response.data;
                }).catch(errors => {
                    console.log(errors.response);
                });
            },
            sendMessage() {
                
                this.messages.push({
                    message: this.newMessage,
                    sender: this.me
                });

                console.log(this.messages);
                axios.post('chat',{message: this.newMessage}).then( response => {
                   console.log(response.data);
                }).catch(errors => {
                    console.log(errors.response);
                });

                this.newMessage = '';
            }
        }
    }
</script>
