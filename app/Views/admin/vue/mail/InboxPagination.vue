<template>
	<ul class="unstyled inbox-pagination" v-if="input.total > 0">
		<li class="info">
			{{input.from}} - {{input.to}} of {{input.total}}
		</li>
		<li class="prev" :class="{ 'active': prevactive }">
			<a class="np-btn" href="#"  v-on:click.prevent @click="pagechange('prevpage')">
				<i class="fa fa-angle-left  pagination-left"></i>
			</a>
		</li>
		<li class="next" :class="{ 'active': nextactive }">
			<a class="np-btn" href="#"  v-on:click.prevent @click="pagechange('nextpage')">
				<i class="fa fa-angle-right pagination-right"></i>
			</a>
		</li>
	</ul>	
</template>

<script type="text/javascript">
	export default{
		props:['input'],
		data(){
			return{
				prevactive:true,
				nextactive:true,
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
					this.buttons()

				}else{
					
					this.$emit('pagechange',this.currentpage - 1);
					this.buttons()

				}
				
			},
			buttons(){
				
			}
		},
		created(){
			//this.$emit('count',this.input.total)
		}
	};

</script>

<style lang="scss">
	.info{
		margin-top: 5px;
	}
	.next.active,.prev.active{
	  	display:inline-block;
	}
	.next,.prev{
		cursor: pointer;
	    color: #01A9DB;
	    font-size: 12px;
	    font-weight: 600;
	    display: none;
	}
	li.active{
		i{
			color: #01A9DB !important;
			font-weight: 600;
		}
	}
	

</style>