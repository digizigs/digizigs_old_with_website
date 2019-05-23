<template>
	<span class="search">
		<i class="fa fa-search"></i>
		<div class="form-group">
	        <div class="form-line">
	            <input type="text" class="form-control" placeholder="Search here...">
	        </div>

	    </div>
	</span>	
</template>

<script type="text/javascript">
	export default{
		props:['clients'],
		data(){
			return{
				search:'',
				searchlist:''
			}
		},
		watch:{

		},
		computed: {
		    filteredList() {
		      return this.clients.filter(post => {
		        return post.title.toLowerCase().includes(this.search.toLowerCase())
		      })
		    }
		},
		methods:{
		
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>