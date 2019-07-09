<template>
	
	<select  class="form-control" v-bind:multiple="multiple"></select>
</template>

<script type="text/javascript">
	export default{
		props:{
			options: {
		      Object
		    },
		    value: null,
		    multiple: {
		      Boolean,
		      default: false

		    }
		},
		data(){
			return{
			    select2data: []
			}
		},
		watch:{

		},
		methods:{
			
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>