<template>
	<section>
		
		<div class="x_panel">
			<div class="x_title">
                <span class="panel-title">
					<i class="fa fa-align-left"></i>
					Permissions
				</span>
				<a href="#newpermission" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
					<i class="fa fa-plus" aria-hidden="true"></i> New Permission
				</a>				
            </div>

            <div class="x_content">
            	<div class="panel-group pannel-line-group" id="accordion">
			                        		                         
                    <div v-for="permission in permissions.data"  class="panel panel-default pannel-line">

                        <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">		                        
                          	<span class="title">{{permission.name}}</span>                             
                          	<span class="description"><small>{{permission.description}}</small></span>
							<!-- Action icons -->
                          	<span class="action-text subscription pull-right">
                            	<a href="#editpermission" v-on:click.prevent data-toggle="modal" @click="detailpermission(permission.id)" ><i class="fa fa-eye" aria-hidden="true"></i></a>
                            	|
                            	<a href="" v-on:click.prevent ><i class="fa fa-trash-o" aria-hidden="true" @click="deletepermission(permission.id)"></i></a>	                               
                          	</span>
                          	<!-- Action icons -->                                    
                        </div>

                    </div>
		
            	</div>

            	
            	<vuepagination :input="permissions" @pagechange="paginationdata"></vuepagination>
				
            </div>
		</div>
	
		<div id="modal">
          <newpermission @recordupdated="refreshRecord"></newpermission>
          <editpermission :permission="permissiondetail" @recordupdated="refreshRecord"></editpermission>
         
        </div>


    </section>
</template>

<script type="text/javascript">
	import Multiselect from 'vue-multiselect'
	export default{
		data(){
			return{
				search:'',
				permissions:{},
				permissiondetail:'',
				errors:'',
				value:null,
				options: [
				        { name: 'Vue.js', code: 'vu' },
				        { name: 'Javascript', code: 'js' },
				        { name: 'Open Source', code: 'os' }
				      ]
			}
		},
		watch:{
			search:function(){
				if(this.search.length >= 0){
					axios.get('permissions/create',{params:{search_string:this.search}})
					.then((response) => {						
						this.permissions=response.data					
					})
					.catch((error) => console.log(error))
				}
			}

		},
		methods:{
			closesearch(){
				this.filter=''
			},
			paginationdata(page){
		        if (typeof page === 'undefined'){
		          page=1;
		        } 
		        axios.get('permissions/create?page=' + page)
		          .then(response => this.permissions = response.data)
		          //	.catch(error => this.errors=error.response.data.errors);

		    },
		    detailpermission(id){
		    	axios.get('permissions/'+id+'/edit')
		        .then((response) => {		        	
		          	this.permissiondetail=response.data
		          })
		        .catch(error => this.errors=error.response.data.errors);
		    },
		    refreshRecord(record){
		    	this.permissions=record.data;
		    },
		    deletepermission(id){
		    	NProgress.start();
	      		swalWithBootstrapButtons({
		          title: 'Delete Permission?',
		          text: "You won't be able to revert this!",
		          type: 'warning',
		          showCancelButton: true,
		          confirmButtonText: 'Yes, delete it!',
		          cancelButtonText: 'No, cancel!',
		          reverseButtons: true
		        }).then((result) => {
		          if (result.value) {

		            axios.delete('permissions/'+id)
		            .then(response =>{
		              this.permissions=response.data;
		              
		              toast({
		                	type: 'success',
		                	title: 'Permission  deleted successfully'	                	
		            	})
		              NProgress.done();

		            })//this.categories=response.data
		            .catch((error) => {
		              console.log(response.data);
		                    this.errors=error.response.data.errors;
		                    this.success='';                
		              });
		          } 
		        })
	      	},
	      	addTag (newTag) {
		      const tag = {
		        name: newTag,
		        code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
		      }
		      this.options.push(tag)
		      this.value.push(tag)
		    }	
		
		},
		created(){
			this.paginationdata();
		}
	};

</script>

<style lang="scss">

	.x_title{
		h2{
			color: #2A5D84;
			font-weight: 500;
		}
	}

	.description{
		margin-left:20px;
	}
</style>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>