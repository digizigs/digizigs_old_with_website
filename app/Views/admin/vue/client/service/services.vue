<template>
	<section>
		<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Services <small></small></h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
              

              

              	<div class="clearfix"></div>

                

              	<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                      <div class="x_title">                     
                    <a href="#addservices" class="btn btn-dark btn-sm" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> Add Service</a>
                    <div class="clearfix"></div>
                  </div>

                    <div class="x_content">
                    <div class="table-responsive">
                        <table class="table table-striped jambo_table bulk_action">
                          <thead>
                            <tr class="headings">
                              <th class="column-title"> Id </th>
                              <th class="column-title"> Service </th>
                              <th class="column-title"> Description </th>
                              <th class="column-title"> Billing Charge </th>
                              <th class="column-title"> TAT </th>
                              <th class="column-title">  </th>
                              <th class="column-title">  </th>
                              <th class="bulk-actions" colspan="7">
                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                              </th>
                            </tr>
                          </thead>

                          <tbody>

                            <tr class="even pointer" v-for="service,key in services.data">
                              <td class=" "> {{key + 1}} </td>
                              <td class=" "> {{service.name}} </td>
                              <td class=" "> {{service.description}} </td>
                              <td class=" "> Rs {{service.charge}} </td>
                              <td class=" "> {{service.duration}} days </td>
                              <td class="" style="width: 5%;">
                                <a href="#editservices" class="disabled" data-toggle="modal" @click="updateservice(service.id)">
                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                              
                                
                              </td>
                              <td style="width: 5%;">
                                <a href="" class="disabled" v-on:click.prevent @click="deleteservice(service.id)">
                                  <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </a>
                              </td>
                            </tr>

                          </tbody>
                        </table>

                        <pagination :data="services" @pagination-change-page="paginationdata" ></pagination>

                    </div>  
                  </div>

                       

                  </div>
              </div>

                
            </div>
        </div>

        <div id="modal">
          <newservice @recordupdated="refreshRecord"></newservice>
          <editservice :recrd="serviceupdate" @recordupdated="refreshRecord" ></editservice>
          <!--quickapointment></quickapointment-->
          <!--editapointment :recrd="apntupdate" @recordupdated="refreshRecord"></editapointment-->

          <!--viewapointment></viewapointment-->
        </div>


	</section>
</template>

<script type="text/javascript">
  Vue.component('pagination', require('laravel-vue-pagination'));

	export default{
		data(){
			return{
				services:{},
        serviceupdate:{},
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
			axios.get('service/create')
			.then((response) => {	this.services=response.data})//this.appointments=response.data
			.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>


</style>