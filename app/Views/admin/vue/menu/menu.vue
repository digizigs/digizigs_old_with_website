<template>
	<section>
		<div class="right_col" role="main">

        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Menus <small></small></h3>
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
                    <!--div class="x_title">                     
                      <h2><i class="fa fa-align-left"></i> Options <small>App settings Options</small></h2>
                      <div class="clearfix"></div>
                    </div-->

                  <div class="x_content">
                      
                      <!--Select menu or create new menu-->
                      <div class="row">
                        <div class="manage-menus">
                          <form @submit.prevent="">
                            <label for="menu" class="selected-menu">Select the menu you want to edit:</label>

                            <select name="menu" class=" input-sm glow-input">
                              
                                <option value="">test</option> 
                              
                            </select>

                            <span class="submit-btn">
                              <input type="submit" class="btn btn-dark btn-sm" value="Select" style="margin-left: 10px;margin-top: 4px;" @click="selectmenu">
                            </span>
                            <span class="add-new-menu-action"> or <a href=""  v-on:click.prevent @click="createmenu">Create new menu</a>. </span>
                          </form>
                        </div>
                      </div>
                      

                      <div class="row" style="margin-top: 40px;">
                        
                        <div   class="col-md-4 col-xs-12">
                          <div class="panel-group" id="accordion">

                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h5 style="margin: 0;padding: 0;">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                                  Pages
                                </a>
                                </h5>
                              </div>
                              <div id="collapse1" class="panel-collapse collapse">
                                <div class="panel-body">                                                       
                                  <div>
                                    <button type="submit" class="btn btn-dark btn-sm pull-right" style="margin-top: 20px;" >
                                    Add Menu item
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h5 style="margin: 0;padding: 0;">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                    Post
                                  </a>
                                </h5>
                              </div>
                              <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                  

                                      
                                      <div>
                                        <button type="submit" class="btn btn-dark btn-sm pull-right" style="margin-top: 20px;" >
                                          Add Menu item
                                        </button>
                                      </div>

                                </div>
                              </div>
                            </div>

                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h5  style="margin: 0;padding: 0;">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                  Custom Link</a>
                                </h5>
                              </div>
                              <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                  
                                  <!--catagory-->
                                  <form class="form-horizontal">

                                    <div class="form-group glow-input">
                                      <label class="col-sm-2 control-label">Link</label>
                                      <div class="col-sm-10">
                                        <input class="form-control input-sm" id="custom-menu-item-url" name="url" type="text" value="http://">
                                      </div>
                                    </div>

                                    <div class="form-group glow-input">
                                      <label class="col-sm-2 control-label">Label</label>
                                      <div class="col-sm-10">
                                        <input class="form-control input-sm" id="custom-menu-item-name" name="label" type="text" title="Label menu">
                                      </div>
                                    </div>

                                    <div>
                                      <button type="submit" class="btn btn-dark btn-sm pull-right" style="margin-top: 20px;" >
                                        Add Menu item
                                      </button>
                                    </div>
                                  </form>
                                </div>
                              </div>
                            </div>

                            <div class="panel panel-default">
                              <div class="panel-heading">
                                <h5 class="" style="margin: 0;padding: 0;">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
                                  Categories</a>
                                </h5>
                              </div>
                              <div id="collapse4" class="panel-collapse collapse">
                                <div class="panel-body">
                                  
                                      <div>
                                        <button type="submit" class="btn btn-dark btn-sm pull-right" style="margin-top: 20px;" >
                                          Add Menu item
                                        </button>
                                      </div>

                                 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div   class="col-md-8 col-xs-12">
                          
                          <div class="panel panel-default">

                              <div class="panel-heading" style="padding-bottom: 0;">
                                <form  class="form-horizontal">
                                  
                                  <div class="form-group glow-input">
                                    
                                    <div class="col-sm-6 col-xs-7">
                                      <input class="form-control input-sm"  name="menuname" id="menu-name" placeholder="Menu Name" value="">
                                    </div>

                                    

                                      <div class="publishing-action">
                                        
                                        <button class="btn btn-dark btn-sm pull-right">Create menu</button>
                                      </div>

                                   

                                  </div>
                                      
                                </form>                               
                              </div>
                              
                              <div class="panel-body">                                  
                                <h4>Menu Structure</h4>
                                <div class="drag-instructions post-body-plain" style="">
                                  <p>
                                    Place each item in the order you prefer. Click on the arrow to the right of the item to display more configuration options.
                                  </p>
                                </div>

                                <div class="panel-group col-md-6" id="accordion">

                                  <div class="panel panel-default">
                                    <div class="panel-heading">
                                      <h5 style="margin: 0;padding: 0;">
                                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse">
                                        Collapsible Group 1</a>
                                      </h5>
                                    </div>
                                    <div id="collapse" class="panel-collapse collapse">
                                      <div class="panel-body">
                                       
                                        

                                      </div>
                                    </div>
                                  </div>                                 
                                </div>
                                 
                              </div>
                          </div>
                        </div>

                      </div>

</div>  
                </div>
              </div>
        </div>
    </div>
  </div>
	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
			   menuselect:false,
         newmenu:false,
			}
		},
		watch:{

		},
		methods:{
		  selectmenu(){
        
        this.menuselect=true;
      },
      createmenu(){
        
        this.newmenu=true;
      },
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>