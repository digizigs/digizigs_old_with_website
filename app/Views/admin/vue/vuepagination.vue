<template>
	<div class="vue-pagination" v-if="input.total > 0">
		<div class="row">
			<div class="col-md-4">
				<span class="prev pull-left" :class="{ 'active': prevactive }" @click="pagechange('prevpage')">
			        <i class="fa fa-arrow-left" aria-hidden="true"></i>
			        Prev
			    </span>
			</div>
		    <div class="col-md-4 data">
		    	<span class="">
			        Showing {{input.from}} to {{input.to}} of total {{input.total}} 
			    </span>
		    </div>
		    <div class="col-md-4">
		    	<span class="next pull-right" :class="{ 'active': nextactive }" @click="pagechange('nextpage')">
			        Next
			        <i class="fa fa-arrow-right" aria-hidden="true"></i>
			    </span>
		    </div>
		</div>      
    </div>	
</template>

<script type="text/javascript">
	export default{
		props:['input'],
		data(){
			return{
				prevactive:true,
				nextactive:true
			}
		},
		watch:{
			input(){
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
			}
		},
		methods:{

			pagechange(data){		

				if(data == 'nextpage'){
					this.$emit('pagechange',2);
					this.buttons()
				}else{
					this.$emit('pagechange',1);
					this.buttons()
				}
				
			},
			buttons(){
				
			}
		},
		created(){
		
		}
	};

</script>

<style lang="scss">
	.vue-pagination{
	  margin: 0 5px !important;
	  .next.active,.prev.active{
	  	display:inline-block;
	  }
	  .next,.prev{
	    cursor: pointer;
	    color: #01A9DB;
	    font-size: 13px;
	    font-weight: 600;
	    display: none;
	  }
	  a{
	    margin: 0 5px !important;
	    color: #01A9DB;
	    font-size: 13px;
	    font-weight: 600;
	  }
	  .fa-arrow-left{
	    margin-right: 5px;
	  }
	  .fa-arrow-right{
	    margin-left: 5px;
	  }
	  .data{
	  	text-align: center;
	  }
	}

</style>