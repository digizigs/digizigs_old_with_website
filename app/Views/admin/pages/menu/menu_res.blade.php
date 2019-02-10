
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
                echo $currentUrl;
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
                                          <input class="form-control input-sm" id="focusedInput" type="text" value="http://">
                                        </div>
                                      </div>

                                      <div class="form-group glow-input">
                                        <label class="col-sm-2 control-label">Label</label>
                                        <div class="col-sm-10">
                                          <input class="form-control input-sm"  type="text">
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

                          
                          
                          @if(request()->has('menu') && !empty(request()->input("menu")))

                            <div class="panel panel-default">
                              <div class="panel-heading" style="padding-bottom: 0;">
                                <form action="" class="form-horizontal">
                                  
                                  <div class="form-group glow-input">
                                    
                                    <div class="col-sm-6 col-xs-7">
                                      <input class="form-control input-sm"  type="text" placeholder="Menu Name" value="@if(isset($indmenu)){{$indmenu->name}}@endif">
                                    </div>
                                    <button class="btn btn-dark btn-sm pull-right">Save Menu</button>
                                  </div>
                                      
                                </form>
                                 
                              </div>
                              
                              <div class="panel-body">
                                  
                                  <div class="panel-group col-md-6" id="accordion">

                                            <div class="panel panel-default">
                                              <div class="panel-heading">
                                                <h5 style="margin: 0;padding: 0;">
                                                  <a data-toggle="collapse" data-parent="#accordion" href="#collapse">
                                                  Collapsible Group 1</a>
                                                </h5>
                                              </div>
                                              <div id="collapse" class="panel-collapse collapse">
                                                <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                                                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad
                                                minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea
                                                commodo consequat.</div>
                                              </div>
                                            </div>
                                            

                                          </div>
                              </div>
                            </div>
                          @else

                            <div class="panel panel-default">
                              <div class="panel-heading" style="padding-bottom: 0;">
                                <form action="" class="form-horizontal">
                                  
                                  <div class="form-group glow-input">
                                    
                                    <div class="col-sm-6 col-xs-7">
                                      <input class="form-control input-sm"  type="text" placeholder="Menu Name">
                                    </div>
                                    <button class="btn btn-dark btn-sm pull-right">Create Menu</button>
                                  </div>
                                      
                                </form>
                                 
                              </div>
                              
                              <div class="panel-body">
                                Give your menu a name, then click Create Menu.
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



    
@endsection
