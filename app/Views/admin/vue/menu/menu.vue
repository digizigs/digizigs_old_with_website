<template>
	<section>
    <div class="x_panel">

      <div class="x_title">

          <span class="panel-title">
            <i class="fa fa-align-left"></i>
            Menus
          </span>       

      </div>

      <div class="x_content">
         <div class="row">

            <div class="col-md-12" style="margin-bottom:20px;">
               <div class="form-group wp-input">                                
                  <select name="menu" class="col-md-2 input-sm" v-model="selectedmenu">
                      <option value="">Select</option>
                      <option v-for="menu in menus" v-bind:value="menu.name">{{menu.name}}</option>                              
                  </select>
                  <button class="select-menu btn btn-dark btn-sm" @click="selectmenu">Select Menu</button>                             
                  <span style="margin-top: 10px;" > 
                    or <a href="" v-on:click.prevent @click="createmenu" class="wpfont" >Create new menu</a>.                
                  </span>
               </div>
            </div>

            <div class="col-md-4 col-xs-12">
               <div class="panel-group" id="accordion">

                    <div class="panel panel-default">
                        <div class="panel-heading">
                        
                            <a data-toggle="collapse" data-parent="#accordion" href="#collapse1" class="title">
                                Pages
                            </a>
                      
                        </div>
                        <div id="collapse1" class="panel-collapse collapse in">
                            <div class="panel-body">
                              <ul class="">
                                <li>
                                  <input type="checkbox" id="checkbox" v-model="checked">
                                  <label for="checkbox">Check{{checked}}</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="test1">
                                  <label for="test1" style="margin-top:-10px !important;">Red</label>
                                </li>
                                <li>
                                  <input type="checkbox" id="test1">
                                  <label for="test1" style="margin-top:-10px !important;">Red</label>
                                </li>
                                <li>
                                  
                                </li>
                              </ul>
                              <a href="" class="btn btn-default btn-sm pull-right">Add to menu</a>
                            </div>
                        </div>

                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse2" class="title">
                              Posts
                           </a>
                      </div>
                      <div id="collapse2" class="panel-collapse collapse">
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat.</div>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse3" class="title">
                              Categories
                           </a>
                      </div>
                      <div id="collapse3" class="panel-collapse collapse">
                        <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                        sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                        minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                        commodo consequat.</div>
                      </div>
                    </div>

                    <div class="panel panel-default">
                      <div class="panel-heading">
                           <a data-toggle="collapse" data-parent="#accordion" href="#collapse4" class="title">
                              Custom links
                           </a>
                      </div>
                      <div id="collapse4" class="panel-collapse collapse">
                        <div class="panel-body">
                          
                          <div class="form-group wp-input">
                              <label for="name" class="col-sm-3 col-xs-3 ">Item</label>
                              <div class="col-sm-9 col-xs-9">
                                  <div class="form-line">
                                      <input type="text" class="form-control input-sm">
                                  </div>
                              </div>
                          </div>

                          <div class="form-group wp-input">
                              <label for="name" class="col-sm-3 col-xs-3 ">Item</label>
                              <div class="col-sm-9 col-xs-9">
                                  <div class="form-line">
                                      <input type="text" class="form-control input-sm">
                                  </div>
                              </div>
                          </div>

                        </div>
                      </div>
                    </div>

               </div>
            </div>

            <div class="col-md-8 col-xs-12">

                <div v-if="editmenu == true" class="panel panel-default">
                    <div class="panel-heading">
                    
                        <span class="panel-title wp-input">
                            <i class="title">Menu Name</i>
                            <input type="text" class="input-sm" v-model="menuname">
                         </span>
                         <a href="" class="btn btn-dark btn-sm pull-right" v-on:click.prevent @click="addnewmenu">Save Menu</a>
                  
                    </div>

                    
                    <div class="panel-body">
                      <ul class="">
                        <li>
                          <input type="checkbox" id="checkbox" v-model="checked">
                          <label for="checkbox">Check{{checked}}</label>
                        </li>
                        <li>
                          <input type="checkbox" id="test1">
                          <label for="test1" style="margin-top:-10px !important;">Red</label>
                        </li>
                        <li>
                          <input type="checkbox" id="test1">
                          <label for="test1" style="margin-top:-10px !important;">Red</label>
                        </li>
                        <li>
                          
                        </li>
                      </ul>
                      <a href="" class="btn btn-default btn-sm pull-right">Add to menu</a>
                    </div>         
                    
                </div>



               <div v-if="this.menuselect == true" class="panel panel-dz">

                  <div class="panel-heading active">
                     <span class="panel-title wp-input">
                        <i>Menu Name</i>
                        <input type="text" class="input-sm" v-model="selectedmenu">
                     </span>
                     <a href="" class="btn btn-dark btn-sm pull-right">Save Menu</a>
                  </div>
                  
                  <div class="panel-body open">
                     
                     <div class="">Add menu items from the column on the left.</div>
                     
                  </div>

                  
                  
               </div>
            </div>

         </div><!--row-->   

      </div>

    </div>
      

   

	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
	      menuselect:false,
        newmenu:'',
        selectedmenu:'',
        menuname:'Test Menu',
        menus:'',
        errors:[],
        error_message:'',
        checked:false,
        menuname:'',
        editmenu:false
			}
		},
		watch:{
  
		},
		methods:{
		  selectmenu(){
        this.editmenu = true   
        this.menuname = this.selectedmenu;
        //this.menuselect = false;
      },
      createmenu(){
        //this.newmenu=true;
        //this.menuselect=false;
        this.editmenu = true
      },
      addnewmenu(){

         if(this.menuname == ''){
          toast({
                type: 'warning',
                title: 'please enter a menu name'
            })
         }else{
            axios.post('menu/add',{name:this.menuname})
            .then(response => {
              console.log(response.data);

              this.menus=response.data
              this.selectmenu = this.menuname        
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

  input[type="checkbox"]{
    border: 1px solid #b4b9be;
    background: #fff;
    color: #555;
    clear: none;
    cursor: pointer;
    display: inline-block;
    line-height: 0;
    height: 16px;
    margin: -4px 4px 0 0;
    outline: 0;
    padding: 0 !important;
    text-align: center;
    vertical-align: middle;
    width: 16px;
    min-width: 16px;
  
    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.1);
    transition: .05s border-color ease-in-out;
  }

  input[type="checkbox"]:checked:before {
  float: left;
  display: inline-block;
  vertical-align: middle;
  width: 16px;
  font: normal 21px/1 dashicons;
  speak: none;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}


</style>