<template>
	<div class="modal fade" id="editcat" role="dialog"  data-backdrop="false">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              	 <div class="modal-header ">
                    <button type="button" class="close" data-dismiss="modal" @click="cleardata">&times;</button>
                    <h4 class="modal-title"><b>Edit Category</b></h4>
                </div>
              	<div class="modal-body">

              		<div class="alert alert-info" v-if="success.length > 0">
		              {{success}}
		          	</div>

              		<form  role="form" class="form-horizontal" @submit.prevent="processForm">

						  <div class="form-group">
						    <label class="col-sm-2 control-label">Name</label>
						    <div class="col-sm-10">
						      <input class="form-control" type="text"  v-model="recrd.name">
						      <i><small>The name is how it appears on your site.</small></i>
						    </div>
						    
						  </div>

						  <div class="form-group">
						    <label class="col-sm-2 control-label">Slug</label>
						    <div class="col-sm-10">
						      <input class="form-control" type="text" v-model="recrd.slug">
						      <i><small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small></i>
						    </div>
						  </div>
						  
						  
						  <div class="form-group">
						    <label class="col-sm-2 control-label">Parent Category</label>
						    <div class="col-sm-4">
						      	<select class="form-control input-sm" name="parent_category" :required="true"  >
		                			<option v-for="cat in categories" v-bind:value="cat.id" :selected="cat.name == recrd.name">{{ cat.name }}</option>
		              			</select>
						    </div>
						  </div>



						  <div class="form-group">
						    <label class="col-sm-2 control-label">Description</label>
						    <div class="col-sm-10">
						      <textarea class="form-control" rows="5" v-model="recrd.description"></textarea>
						      <i><small>The description is not prominent by default; however, some themes may show it.</small></i>
						    </div>
						  </div>


						</form>
              	</div>

              	<div class="modal-footer">
              		<button class="btn btn-primary btn-sm pull-left" @click="updateCategory">Update</button>
              		<a href="" v-on:click.prevent @click="deletecat(recrd.id)">Delete</a>
              	</div>
          	</div>
      	</div>
  	</div>
</template>

<script type="text/javascript">
	export default{
    	props:['recrd'],
		data(){
			return{
				categories:{},
				success:'',
				errors:'',
			}
		},
		watch:{

		},
		methods:{
			modalclose(){
        		this.success=''
      		},
      		cleardata(){

      		},
      		updateCategory(){
      			console.log('Update car clicked');
      			axios.patch('updatecategory/'+this.recrd.id,this.recrd)
          		.then(data=>{
		            response=>console.log(response.data)
		            this.success='Category Updated successfully'
		            this.$emit('recordupdated',data)
		         }) //data=>this.$emit('recordadded',data)

          		.catch((error) => {
            	this.errors=error.response.data.errors;
            	console.log(error.response.data)
          		});
          		         		
      		},
      		deletecat(id){
      			const rply = confirm('Do you want to delete the category : '. name)
				if(rply){
					axios.delete('updatecategory/'+id)
					.then(response =>{
						this.categories=response.data;
						this.success="Category Deleted Successfuly";
						this.$emit('recordupdated',data)
						this.recrd=''
					})//this.categories=response.data
					.catch((error) => {
						//console.log(response.data);
		            	this.errors=error.response.data.errors;
		            	this.success='';		            
		        	});
				}	
      		}

		},
		created(){
			axios.get('getcategory')
			.then((response) => {
				this.categories=response.data
				//console.log(this.categories)
			})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>


</style>