
@extends('layouts.admin')

@section('title','Menu')



@section('content')



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
              

              <?php
                $currentUrl = url()->current();
                //echo $currentUrl;
              ?>  

                <div class="clearfix"></div>

                @if(Session::has('message'))
                  <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
                @endif

                @if(Session::has('deleted'))
                  <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
                @endif

                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <!--div class="x_title">                     
                      <h2><i class="fa fa-align-left"></i> Options <small>App settings Options</small></h2>
                      <div class="clearfix"></div>
                    </div-->

                    <div class="x_content">
                      <div class="row">
                        <div class="manage-menus">
                          <form method="get" action="{{ $currentUrl }}">
                            <label for="menu" class="selected-menu">Select the menu you want to edit:</label>

                            <select name="menu" class=" input-sm glow-input">
                              @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option> 
                              @endforeach
                            </select>

                            <span class="submit-btn">
                              <input type="submit" class="btn btn-dark btn-sm" value="Select" style="margin-left: 10px;margin-top: 4px;">
                            </span>
                            <span class="add-new-menu-action"> or <a href="{{ $currentUrl }}?action=edit&menu=0">Create new menu</a>. </span>
                          </form>
                        </div>
                      </div>

                      <div class="row" style="margin-top: 40px;">

                        <div class="col-md-4 col-xs-12">

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
                                    <form method="post" action="{{route('category.store')}}" class="form-horizontal">
                                      @csrf

                                      
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
                                <h5 style="margin: 0;padding: 0;">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                                  Post</a>
                                </h5>
                              </div>
                              <div id="collapse2" class="panel-collapse collapse">
                                <div class="panel-body">
                                  <form method="post" action="{{route('category.store')}}" class="form-horizontal">
                                      @csrf

                                      
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
                                <h5  style="margin: 0;padding: 0;">
                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                                  Custom Link</a>
                                </h5>
                              </div>
                              <div id="collapse3" class="panel-collapse collapse">
                                <div class="panel-body">
                                  <form method="post" action="{{route('category.store')}}" class="form-horizontal">
                                      @csrf

                                      <!--catagory-->

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
                                  <form method="post" action="{{route('category.store')}}" class="form-horizontal">
                                      @csrf

                                      
                                      <div>
                                        <button type="submit" class="btn btn-dark btn-sm pull-right" style="margin-top: 20px;" >
                                          Add Menu item
                                        </button>
                                      </div>

                                    </form>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-8 col-xs-12">

                          
                          
                          

                            <div class="panel panel-default">
                              <div class="panel-heading" style="padding-bottom: 0;">
                                <form action="" class="form-horizontal">
                                  
                                  <div class="form-group glow-input">
                                    
                                    <div class="col-sm-6 col-xs-7">
                                      <input class="form-control input-sm"  name="menu-name" id="menu-name" placeholder="Menu Name" value="@if(isset($indmenu)){{$indmenu->name}}@endif">
                                    </div>

                                    @if(request()->has('action'))
                                      <div class="publishing-action">
                                        <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-dark btn-sm pull-right">Create menu</a>
                                      </div>
                                      @elseif(request()->has("menu"))
                                      <div class="publishing-action">
                                        <a onclick="getmenus()" name="save_menu" id="save_menu_header" class="btn btn-dark btn-sm pull-right">Save menu</a>
                                        <span class="spinner" id="spincustomu2"></span>
                                      </div>

                                      @else
                                      <div class="publishing-action">
                                        <a onclick="createnewmenu()" name="save_menu" id="save_menu_header" class="btn btn-dark btn-sm pull-right">Create menu</a>
                                      </div>
                                      @endif

                                  </div>
                                      
                                </form>
                                 
                              </div>
                              
                              <div class="panel-body">

                                @if(request()->has('action'))

                                  <h4>Menu Creation</h4>
                                  <div class="drag-instructions post-body-plain" style="">
                                    <p>
                                      Please enter the name and select "Create menu" button
                                    </p>
                                  </div>
                                  
                                  @else
                                  
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

                                @endif
                                  
                                  
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



    
@endsection

@section('javascript')
  <script>
    var arraydata = [];

    function getmenus() {
      arraydata = [];
      $("#spinsavemenu").show()

      var cont = 0;
      $("#menu-to-edit li").each(function(index) {
        var dept = 0;
        for (var i = 0; i < $("#menu-to-edit li").length; i++) {

          var n = $(this).attr("class").indexOf("menu-item-depth-" + i);
          if (n != -1) {
            dept = i;
          }
        };
        var textoiner = $(this).find(".item-edit").text();
        var id = this.id.split("-");
        var textoexplotado = textoiner.split("|"); 
        var padre = 0;  
        if (!!textoexplotado[textoexplotado.length-2] && textoexplotado[textoexplotado.length-2]!= id[2]) {  
          padre = textoexplotado[textoexplotado.length-2]
        }
        arraydata.push({
          depth : dept,
          id : id[2],
          parent : padre,
          sort : cont
        })
        cont++;
      });
      updateitem();
      actualizarmenu();
    }

    function addcustommenu() {
      $("#spincustomu").show();

      $.ajax({
        data : {
          labelmenu : $("#custom-menu-item-name").val(),
          linkmenu : $("#custom-menu-item-url").val(),
          idmenu : $("#idmenu").val()
        },

        url : addcustommenur,
        type : 'POST',
        success : function(response) {
          
          window.location = "";

        },
        complete: function(){
          $("#spincustomu").hide();
        }

      });
    }

    function updateitem(id = 0) {
      
      if(id){
        var label = $("#idlabelmenu_" + id).val()
        var clases = $("#clases_menu_" + id).val()
        var url = $("#url_menu_" + id).val()
        var data = {
          label : label,
          clases : clases,
          url : url,
          id : id
        }
      }else{
        var arr_data = [];
        $('.menu-item-settings').each(function(k, v){
          var id = $(this).find(".edit-menu-item-id").val();
          var label = $(this).find(".edit-menu-item-title").val();
          var clases = $(this).find(".edit-menu-item-classes").val();
          var url = $(this).find(".edit-menu-item-url").val();
          arr_data.push({
            id : id,
            label : label,
            class : clases,
            link : url
          });
        });

        var data = {arraydata: arr_data};
      }
      $.ajax({
        data : data,
        url :updateitemr,
        type : 'POST',
        beforeSend: function(xhr){
          if(id){
            $("#spincustomu2").show();
          }
        },
        success : function(response) {
                },
        complete: function(){
          if(id){
            $("#spincustomu2").hide();
          }
        }
              });
    }

    function actualizarmenu() {

      $.ajax({
        dataType : "json",
        data : {
          arraydata : arraydata,
          menuname : $("#menu-name").val(),
          idmenu : $("#idmenu").val()
        },

        url : generatemenucontrolr,
        type : 'POST',
        beforeSend: function(xhr) {
          $("#spincustomu2").show();
        },
        success : function(response) {

          console.log("aqu llega")
          
        },
        complete: function(){
          $("#spincustomu2").hide();
        }
      });
    }

    function deleteitem(id) {
      $.ajax({
        dataType : "json",
        data : {

          id : id
        },

        url :deleteitemmenur,
        type : 'POST',
        success : function(response) {

        }
      });
    }

    function deletemenu() {

      var r = confirm("Do you want to delete this menu ?");
      if (r == true) {
        $.ajax({
          dataType : "json",

          data : {

            id : $("#idmenu").val()
          },

          url : deletemenugr,
          type : 'POST',
          beforeSend: function(xhr){
            $("#spincustomu2").show();
          },
          success : function(response) {

            if (!response.error) {
              alert(response.resp);
              window.location = menuwr
            }else{
              alert(response.resp)
            }

          },
          complete: function(){
            $("#spincustomu2").hide();
          }
        });

      } else {
        return false;
      }

    }

    function createnewmenu() {

      if (!!$("#menu-name").val()) {
        $.ajax({
          dataType : "json",

          data : {
            menuname : $("#menu-name").val(),
          },

          url :createnewmenur,
          type : 'POST',
          success : function(response) {

            window.location = menuwr+"?menu=" + response.resp

          }
        });
      } else {
        alert("Enter menu name!")
        $("#menu-name").focus();
        return false;
      }

    }

    function insertParam(key, value){
        key = encodeURI(key); value = encodeURI(value);

        var kvp = document.location.search.substr(1).split('&');

        var i=kvp.length; var x; while(i--) 
        {
            x = kvp[i].split('=');

            if (x[0]==key)
            {
                x[1] = value;
                kvp[i] = x.join('=');
                break;
            }
        }

        if(i<0) {kvp[kvp.length] = [key,value].join('=');}

        //this will reload the page, it's likely better to store this until finished
        document.location.search = kvp.join('&'); 
    }

  </script>
@endsection