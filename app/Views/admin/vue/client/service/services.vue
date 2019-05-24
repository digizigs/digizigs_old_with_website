<template>
	<section>
		<div class="">
            
            <div class="row">

              <div class="clearfix"></div>

              	<div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">

                    <div class="x_title">
                        <h2>
                          <i class="fa fa-align-left"></i>
                          Services <small></small> 
                          <span class="search">
                            <i class="fa fa-search"></i>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" placeholder="Search here..." v-model="search">
                                </div>

                            </div>
                          </span> 
                        </h2>                                                  
                        <a href="#addservices" class="btn btn-dark btn-sm pull-right" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> New Service</a>
                        <div class="clearfix"></div>
                      </div>

                    <div class="x_content">
                      
                      <div class="panel-group pannel-line-group" id="accordion">
                        
                        <div v-for="service,key in services.data" class="panel panel-default pannel-line">
                          <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">
                            <span class="title">{{service.name}}</span>
                            

                            <!-- Action icons -->
                            <span class="action-text subscription pull-right">
                              <a href="#editservices" v-on:click.prevent data-toggle="modal" @click="detailservice(service.id)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                              |
                              <a href="" v-on:click.prevent @click="deleteservice(service.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>                                    
                            </span>
                            <!-- Action icons -->   


                          </div>
                        </div>

                      </div>

                      
                      <pagination :data="services" @pagination-change-page="paginationdata" ></pagination>
                      
                    </div>

                       

                  </div>
              </div>

                
            </div>
        </div>

        <div id="modal">
          <newservice @recordupdated="refreshRecord"></newservice>
          <editservice :service="service" @recordupdated="refreshRecord" ></editservice>
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
        service:{},
				success:'',
				errors:'',
        search:''
			}
		},
		watch:{
      search:function(){
        if(this.search.length >= 0){
          axios.get('service/create',{params:{search_string:this.search}})
          .then((response) => {           
            this.services=response.data          
          })
          .catch((error) => console.log(error))
        }
      }
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
      detailservice(id){
        axios.get('service/'+id+'/edit')
          .then((response) => {             
              this.service=response.data
            })
          .catch(error => this.errors=error.response.data.errors);
      },
      deleteservice(id){
        NProgress.start();
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

              toast({
                  type: 'success',
                  title: 'Service  deleted successfully'                   
              })
              NProgress.done();

            })
            .catch((error) => {
              console.log(response.data);
                    this.errors=error.response.data.errors;
                    this.success='';                
              });

        
          } 
        })
      }
		},
		created(){

      this.paginationdata();

		}
	};

</script>

<style type="text/css" Scoped>
  .label{
    font-weight: 200;
  }

</style>