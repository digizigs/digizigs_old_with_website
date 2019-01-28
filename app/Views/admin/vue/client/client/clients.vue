<template>
	<section>
		<div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Clients <small></small></h3>
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
	                    <a href="#addclient" class="btn btn-dark btn-sm" data-toggle="modal"><i class="fa fa-plus" aria-hidden="true"></i> New Client</a>
	                    <div class="clearfix"></div>
	                  </div>

	                  <div class="x_content">

	                     <div class="table-responsive">
	                        <table class="table table-striped jambo_table bulk_action">
	                          <thead>
	                            <tr class="headings">
	                              <th class="column-title"> Id </th>
	                              <th class="column-title"> Client </th>
	                              <th class="column-title"> Service </th>
	                              <th class="column-title"> Status </th>
	                              <th class="column-title">  </th>
	                              <th class="column-title">  </th>
	                              <th class="column-title">  </th>
	                              <th class="bulk-actions" colspan="7">
	                                <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
	                              </th>
	                            </tr>
	                          </thead>

	                          <tbody>

	                            <tr class="even pointer" >
	                              <td class=" "> 1 </td>
	                              <td class=" "> Vandana Travels </td>
	                              <td class=" "> 
									<span class="label label-info label-many" style="font-weight:300;">Logo Design</span>
									<span class="label label-info label-many">Pakage Upload</span>
									<span class="label label-info label-many">Seo</span>
	                              </td>
	                              <td class=" "> <span class="label label-warning label-many">WIP</span> </td>
	                              <td class="" style="width: 2%;">
	                                <a href="#editservices" class="disabled" data-toggle="modal"  >
	                                  <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
	                                </a>
	                              </td>
	                              <td style="width: 2%;">
	                                <a href="" class="disabled" v-on:click.prevent >
	                                  <i class="fa fa-eye" aria-hidden="true"></i>
	                                </a>
	                              </td>
	                              <td style="width: 2%;">
	                                <a href="" class="disabled" v-on:click.prevent >
	                                  <i class="fa fa-th-list" aria-hidden="true"></i>
	                                </a>
	                              </td>
	                            </tr>

	                          </tbody>
	                        </table>

	                        <!--pagination :data="services" @pagination-change-page="paginationdata" ></pagination-->

	                    </div>  
							     
	                  </div>

	                </div>
              	</div>
            </div>
        </div>

		<div id="modal">
          <newclient ></newclient>
          <!--quickapointment></quickapointment-->
          <!--editapointment :recrd="apntupdate" @recordupdated="refreshRecord"></editapointment-->

          <!--viewapointment></viewapointment-->
        </div>

	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				services:{},
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

	.label{
		font-weight: 200;
	}
</style>