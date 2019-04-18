<template>
	<section>
		<div class="right_col" role="main">

        <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3> Menus <small></small></h3>
              </div>

              <!-- <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div> -->
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

                          <div class="select-menu" v-if="this.newmenu == false">

                              <div class="form-group">                                
                                <select name="menu" class="col-md-2 input-sm glow-input input" v-model="selectedmenu">
                                    <option value="">Select</option>
                                    <option v-for="menu in menus" v-bind:value="menu.name">{{menu.name}}</option>                              
                                </select>
                                <button class="select-menu btn btn-dark btn-sm" @click="selectmenu">Select Menu</button>                             
                                <span > or <a href="" v-on:click.prevent @click="createmenu">Create new menu</a>. 
                                
                              </span>
                              </div>
                              
                          </div>

                          <div class="select-menu" v-if="this.newmenu == true">
                              <div class="form-group">                        
                                <div class="col-md-2 glow-input">
                                  <input type="text" class="cm input form-control input-sm" v-model="menu_name.name">
                                </div>
                                <button class=" btn btn-dark btn-sm" @click="addnewmenu">Create Menu</button>
                                <span> or <a href="" v-on:click.prevent @click="selectmenu">Select from existing</a></span>                              
                              </div>
                          </div>

                        </div>
                      </div>
                      

                      <div class="row" style="margin-top: 40px;">


                        <!--Left Column-->
                        <div class="col-md-4 col-xs-12" >

                          <div class="panel-group" id="accordion" v-if="this.menuselect == true">

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
                                    <button type="submit" class="btn btn-dark btn-xs pull-right" style="margin-top: 20px;" >
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
                                        <button type="submit" class="btn btn-dark btn-xs pull-right" style="margin-top: 20px;" >
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
                                      <button type="submit" class="btn btn-dark btn-xs pull-right" style="margin-top: 20px;" >
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
                                        <button type="submit" class="btn btn-dark btn-xs pull-right" style="margin-top: 20px;" >
                                          Add Menu item
                                        </button>
                                      </div>

                                 
                                </div>
                              </div>
                            </div>
                          </div>
                        </div><!--Left Column-->

                        <!--Right Column-->
                        <div class="col-md-8 col-xs-12">
                          
                          <!--IF menu is selected-->
                          <div class="panel panel-default"  v-if="this.menuselect == true">

                              <div class="panel-heading" style="padding-bottom: 0;">

                                <form  class="form-horizontal">                                 
                                  <div class="form-group glow-input">                                   
                                    <div class="col-sm-6 col-xs-7">
                                      <h4>{{this.selectedmenu}}</h4>
                                    </div>

                                      <div class="publishing-action">                                        
                                        <button class="btn btn-dark btn-sm pull-right">Save menu</button>
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


                          <!--New Menu is clicked-->
                          <div class="panel panel-default" v-if="this.newmenu == true">

                              <div class="panel-heading" style="padding-bottom: 0;">

                                <form  class="form-horizontal" @submit.prevent="">                                 
                                  <div class="form-group glow-input">                                   
                                    <div class="col-sm-6 col-xs-7">
                                      <input class="form-control input-sm"  placeholder="Menu Name" value=""  required="">
                                    </div>

                                      <div class="publishing-action">                                        
                                        <button class="btn btn-dark btn-sm pull-right" @click="addnewmenu">Create menu</button>
                                      </div>                                   

                                  </div>                                     
                                </form>

                              </div>
                              
                              <div class="panel-body">                                  
                                <h4>Create Menu</h4>
                                <div class="drag-instructions post-body-plain" style="">
                                  <p>
                                    Enter a menu name to create new menu
                                  </p>
                                </div>

                                <div class="panel-group col-md-6" id="accordion" v-if="this.menuselect == true">

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
                        </div><!--Right Column-->

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
         selectedmenu:'',
         menus:'',
         menu_name:{'name':''},
         errors:[],
         error_message:'',
			}
		},
		watch:{

		},
		methods:{
		  selectmenu(){

       
          this.newmenu=false;
          this.menuselect=false;
            
      },
      createmenu(){
        this.menuselect=false;
        this.newmenu=true;
      },
      addnewmenu(){

         if(this.menu_name.name == ''){
          toast({
                type: 'warning',
                title: 'please enter a menu name'
            })
         }else{
            axios.post('menu/add',this.menu_name)
            .then(response => {
              console.log(response.data);
              this.menus=response.data           
              //this.$emit('recordupdated',data),
              //this.success='Service added successfully'
              //this.client={}
            //$('#addclient').modal('hide');
            //this.client={};

            toast({
                type: 'success',
                title: 'New Menu added successfully'
            })

          })
          .catch((error) => {
            this.errors = error.response.data.errors;
            this.error_message = error.response.data.message;
            console.log(this.errors);           
          })
     
         };
      },   
        
      
		},
		created(){
		  axios.get('menu/all')
      .then((response) => {
          this.menus=response.data;
          //console.log(this.menus);
        })//this.clients=response.data}
      .catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>

  .select-menu{
    margin-left: 10px;
  }
  
  .cm{
    margin-left: -10px;
  }

  
</style>