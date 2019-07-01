<template>
	<div class="modal right fade" id="editCategory" role="dialog"  data-backdrop="false">
		<div class="modal-dialog modal-md" role="">
			<div class="modal-content">
				<!--Modal Header-->
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" @click="modalclose">&times;</button>
					<h4 class="modal-title" id="defaultModalLabel">Update Category/Block</h4>
				</div>
				<!--Modal Header-->
				
				<!--Modal Body-->
				<div class="modal-body">

					<div class="form-group wp-input" >
						<div v-bind:class="{ 'form-invalid': catgerror }">
							<label for="usr">Block</label>
							<input type="text" class="form-control input-sm " v-model="category.category_name">
							<small><i>The name is how it appears on your site.</i></small>
						</div>
					</div>
				
					<!--Parent category dropdown-->
					<div class="form-group wp-input">
						<label for="sel1">Parent</label>
						<select class="form-control input-sm" v-model="category.category_parent">
							<option value="">--Please select parent--</option>
							<option v-for="c,key in cats" v-bind:value="c.id">{{c.name}}</option>
						</select>
						<small><i>By Selecting this WebBlock Name will become category under select parent/WebBlock</i></small>
					</div>

					<div>
						<button type="submit" class="btn btn-dark btn-sm pull-right" style="margin-bottom: 20px;" @click="update">
							<span>Update</span>
						</button>
					</div> 

				</div>
				<!--Modal Body-->
				
				
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['cat','cats'],
		data(){
			return{
				categories:{},
				catgerror:false,
				category:{'category_name':'','category_parent':''},

			}
		},
		watch:{
			cat(){
				
				console.log(this.cat)
				if(this.cat.child){
					this.category.category_name = this.cat.name
					this.category.category_parent = ''
				}else{
					//console.log(this.cat)
					this.category.category_name = this.cat.name
					this.category.category_parent = this.cat.parent_id
				}
			}
		},
		methods:{
			modalclose(){
				this.category = {'category_name':'','category_parent':''}
			},
			createblock(){
				if(this.category.category_name == ''){
					this.catgerror = true
					toast({
	                type: 'warning',
	                title: 'Please enter a WebBlock name'
	            })
				}else{
					this.catgerror = false
					axios.post('category',this.category)
					.then((data) => {
						//console.log(data)
						//this.categories=response.data
						this.category = {'category_name':'','category_parent':''};
						//this.selectedparent = '';
						this.$emit('recordupdated',data),                            
              			$('#newwebblock').modal('hide');
              			//this.category = {'category_name':'','category_parent':''}   
						toast({
			                type: 'success',
			                title: 'WebBlock Added Successfully'
			            })
					})
					.catch((error) => console.log(error))
				}

			},
			update(){
				if(this.category.category_name == ''){
					this.catgerror = true
					toast({
	                type: 'warning',
	                title: 'Please enter a Category/Block name'
	            })
				}else{
					axios.put('category/'+this.cat.id,this.category)
			         .then(response=>{
			         	console.log(response.data)
			            this.$emit('recordupdated',response),
			            $('#editCategory').modal('hide');
			            toast({
			                type: 'success',
			                title: 'Category Updated successfully'
			            })
			            this.errors=''
			         })
			         .catch((error) => {
			         	console.log(error)
			            this.errors=error.response.data.errors;           
			          })
				}

			}
		},
		mounted(){

			/*axios.get('category/create')
			.then((response) => {
					//console.log(response.data)
					this.categories=response.data
				})
			.catch((error) => console.log(error))*/
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>