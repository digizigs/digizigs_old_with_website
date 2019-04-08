<template>
  <section>
  	<div class="x_panel">
          <div class="x_title">
            <span class="title"><i class="fa fa-user"></i> Products </span><small>All Products</small>            
            <a href="#new-product" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
              <i class="fa fa-plus" aria-hidden="true"></i> 
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
                  
                  <tr class="even pointer">
                    <td class="a-center ">
                      <input type="checkbox" class="flat" name="table_records">
                    </td>
                    <td class=" ">aa</td>
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

    <div id="modal">
      <newproduct @recordupdated="refreshRecord"></newproduct>
      
    </div>
  </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
			
			}
		},
		watch:{

		},
		methods:{
		  refreshRecord(){

      }
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>