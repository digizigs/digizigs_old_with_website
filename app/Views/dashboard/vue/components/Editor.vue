<template>

    <div ref="editor" v-html="value" class="editor" v-bind:style="style"></div>
    
</template>

<script type="text/javascript">
    import Quill from 'quill';
    export default {
       props:{
            value: {
                type: String,
                default: ''
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
                    height:200 + 'px',
                    background: '#fff !important'
                }
            }
        },
        watch:{
            value(){
                this.editor.root.innerHTML = this.value;
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
                                ['link','image','video','blockquote', 'code-block'],
                                [{ 'list': 'ordered'}, { 'list': 'bullet' }],                                 
                                [{ 'font': [] }],
                                [{ 'align': [] }],
                                ['clean']     
							]
					},
					placeholder: '',
					theme: 'snow'
            });

            this.editor.root.innerHTML = this.value;
            this.editor.on('text-change', () => this.update());
        },
    }


</script>

<style lang="scss" scoped>
	.ql-picker-label{
        color:black !important;
    }
    .ql-toolbar .ql-snow{
        background: #fff !important;
    }
</style>

