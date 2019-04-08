<template>
	<section>
		<div class="x_panel">
          <div class="x_title">
            <span class="title"><i class="fa fa-cart-arrow-down"></i> Invoices </span><small>All Invoices</small>            
            <a href="#new-product" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
              <i class="fa fa-cart" aria-hidden="true"></i> 
              Add Product
            </a>
            <div class="clearfix"></div>
          </div>

          <div class="x_content">
            
            <div class="table-responsive">
              <table class="table table-striped jambo_table bulk_action">
                <thead>
                  <tr class="headings">
                    <th><input type="checkbox" id="check-all" class="flat"></th>
                    <th class="column-title">Name </th>
                    <th class="column-title">Email </th>
                    <th class="column-title">Contact </th>
                    <th class="column-title">Status </th>
                    <th class="column-title">Contact Type </th>
                    <th class="column-title">Created </th>
                    <th class="column-title no-link last"><span class="nobr">Last Active</span></th>
                    <th class="bulk-actions" colspan="7">
                      <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                    </th>
                  </tr>
                </thead>
                <tbody>
                  
                  <tr class="even pointer" v-for="invoice,key in invoices">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" ">{{invoice.client['client_name']}}</td>
                    <td class=" ">bb </td>
                    <td class=" ">cc <i class="success fa fa-long-arrow-up"></i></td>
                    <td class=" ">dd</td>
                    <td class=" ">ee</td>
                    <td class="a-right a-right ">ff</td>
                    <td class=" last"><a href="#">gg</a>
                    </td>
                  </tr>
                  
                
                </tbody>
              </table>
          
              
            </div>
        
          </div>
    </div>

	</section>
</template>

<script type="text/javascript">
  Vue.component('pagination', require('laravel-vue-pagination'));

	export default{
		data(){
			return{
				invoices:{},
				client:{},
				success:'',
				errors:'',
			}
		},
		watch:{

		},
		methods:{
	      paginationdata(page){
	        if (typeof page === 'undefined'){
	          page=1;
	        } 
	        axios.get('service/create?page=' + page)
	          .then(response => this.services = response.data)
	          .catch(error => this.errors=error.response.data.errors);

	      },
		  refreshRecord(record){
	        this.services=record.data;
	      },
	      updateservice(id){
	        axios.get('service/'+id+'/edit')
	        .then((response) => {
	          //console.log(response.data)
	          this.serviceupdate=response.data
	          })//this.apntupdate = response.data
	        .catch(error => this.errors=error.response.data.errors);
	      },
	      deleteservice(id){
	        swalWithBootstrapButtons({
	          title: 'Delete Service?',
	          text: "You won't be able to revert this!",
	          type: 'warning',
	          showCancelButton: true,
	          confirmButtonText: 'Yes, delete it!',
	          cancelButtonText: 'No, cancel!',
	          reverseButtons: true
	        }).then((result) => {
	          if (result.value) {

	            axios.delete('service/'+id)
	            .then(response =>{
	              this.services=response.data;
	              this.success="Service Deleted Successfuly";

	            })//this.categories=response.data
	            .catch((error) => {
	              console.log(response.data);
	                    this.errors=error.response.data.errors;
	                    this.success='';                
	              });

	            swalWithBootstrapButtons(
	              'Deleted!',
	              'Service deleted successfully',
	              'success'
	            )
	          } 
	        })
	      }
		},
		created(){
			axios.get('invoice/create')
			.then((response) => {this.invoices=response.data})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>


</style>