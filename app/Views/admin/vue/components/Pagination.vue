<template>
	<div v-if="totalpage >= 2" class="vue-pagination">
		

      	<span class="prev" :class="{ 'active': prevactive }">
      		<a href=""  v-on:click.prevent @click="pagechange('prevpage')">Prev</a>
      	</span>

      	<span class="mr-10">Showing {{input.from}} - {{input.to}} of {{input.total}}</span>

      	<span class="next" :class="{ 'active': nextactive }">
      		<a href=""  v-on:click.prevent @click="pagechange('nextpage')">Next</a>
      	</span>

	</div>
</template>

<script type="text/javascript">
	export default{
		props:['input'],
		data(){
			return{
				prevactive:false,
				nextactive:false,
				totalpage:'',
				currentpage:1
			}
		},
		watch:{
			input(){
				this.totalpage = this.input.last_page
				this.currentpage =  this.input.current_page

				if(this.input.next_page_url === null){
					this.nextactive=false
				}else{
					this.nextactive=true
				}

				if(this.input.prev_page_url === null){
					this.prevactive=false
				}else{
					this.prevactive=true
				}

				this.$emit('count',this.input.total)
			}

		},
		methods:{
			pagechange(data){		

				if(data == 'nextpage'){
					this.$emit('pagechange',this.currentpage + 1);
				}else{
					this.$emit('pagechange',this.currentpage - 1);
				}
				
			},
		
		},
		created(){
		
		}
	};

</script>

<style lang="scss"  Scoped>

.vue-pagination{
	.next.active,.prev.active{
	  	display:inline-block;
	 }
	.next,.prev{
	    cursor: pointer;
	    color: #01A9DB;
	    font-weight: 500;
	    display: none;
	    margin: 0 10px;
	}

}

</style>