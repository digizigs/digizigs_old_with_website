<template>
	<div class="composer">
        <textarea v-model="message" @keydown.enter="send" placeholder="Message..."></textarea>
    </div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				message: ''
			}
		},
		watch:{

		},
		methods:{
			send(e) {
                e.preventDefault();
                
                if (this.message == '') {
                    return;
                }

                this.$emit('send', this.message);
                this.message = '';
            }
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>
	.composer textarea {
	    width: 100%;
	    margin-top: 5px;
	    resize: none;
	    border-radius: 3px;
	    border: 1px solid lightgray;
	    padding: 6px;
	}

</style>