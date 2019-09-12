<template>
    <div ref="editor" v-html="value" class="editor" v-bind:style="style"></div>
    
</template>

<script type="text/javascript">
    import Quill from 'quill';
    export default {
       props: {
            value: {
                type: String,
                default: '',
            },
            height:{
                type:String,
                default:50,
            }
        },
        data() {
            return {
                editor: null
            };
        },
        computed:{
            style(){
                return{
                    height:this.height + 'px'
                }
            }
        },
        methods: {
            update() {
                this.$emit('input', this.editor.getText() ? this.editor.root.innerHTML : '');
            }
        },
        mounted() {
            this.editor = new Quill(this.$refs.editor, {
                modules: {
						toolbar: [
								[{ header: [1, 2, false] }],
								['bold', 'italic', 'underline'],
								['image', 'code-block']
							]
					},
					placeholder: 'Write your message here',
					theme: 'snow'
            });

            this.editor.root.innerHTML = this.value;

            this.editor.on('text-change', () => this.update());
        },
    }


</script>

<style lang="scss" scoped>
	.editor{

    }
</style>

