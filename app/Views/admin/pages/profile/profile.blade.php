
@extends('layouts.admin')

@section('title','All Articles')



@section('content')

	

	<div class="right_col" role="main">

        <div class="">     

            <div class="row">
              

              

              	<div class="clearfix"></div>

                @if(Session::has('message'))
                  <p class="alert alert-info " id="successMessage">{{ Session::get('message') }}</p>
                @endif

                @if(Session::has('deleted'))
                  <p class="alert alert-danger " id="successMessage">{{ Session::get('deleted') }}</p>
                @endif

              	<div class="col-md-12 col-sm-12 col-xs-12">
	                <div class="x_panel">
                    <div class="x_title">
                      <h2>User Profile <small>Activity report</small></h2>
                     
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div class="container-fluid">
                        <div class="row clearfix">

                            <div class="col-xs-12 col-sm-3">
                                <div class="card profile-card">
                                    <div class="profile-header">&nbsp;</div>
                                    <div class="profile-body">
                                        <div class="image-area">
                                            <img src="{{asset('public\uploads\user-lg.jpg')}}" alt="AdminBSB - Profile Image" />
                                        </div>                                       
                                        <div class="content-area">
                                            <h3>{{$userprofile->user->firstname}},{{$userprofile->user->lastname}}</h3>
                                            <p>{{$userprofile->designation}}</p>
                                            @foreach(auth()->user()->roles()->pluck('name') as $role)
                                              <span class="label label-info label-many">{{$role}}</span>
                                            @endforeach
                                        </div>
                                    </div>
                                    <!-- <div class="profile-footer">
                                        <ul>
                                            <li>
                                                <span>Followers</span>
                                                <span>1.234</span>
                                            </li>
                                            <li>
                                                <span>Following</span>
                                                <span>1.201</span>
                                            </li>
                                            <li>
                                                <span>Friends</span>
                                                <span>14.252</span>
                                            </li>
                                        </ul>
                                        <button class="btn btn-primary btn-lg waves-effect btn-block">FOLLOW</button>
                                    </div> -->
                                </div>

                                <div class="card card-about-me">
                                    <div class="header">
                                        <h2>ABOUT ME</h2>
                                    </div>
                                    <div class="body">
                                        <ul>
                                            <li>
                                                <div class="title">
                                                    <i class="material-icons">library_books</i>
                                                    Education
                                                </div>
                                                <div class="content">
                                                    B.S. in Computer Science from the University of Tennessee at Knoxville
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">
                                                    <i class="material-icons">location_on</i>
                                                    Location
                                                </div>
                                                <div class="content">
                                                    Malibu, California
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">
                                                    <i class="material-icons">edit</i>
                                                    Skills
                                                </div>
                                                <div class="content">
                                                    <span class="label bg-red">UI Design</span>
                                                    <span class="label bg-teal">JavaScript</span>
                                                    <span class="label bg-blue">PHP</span>
                                                    <span class="label bg-amber">Node.js</span>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="title">
                                                    <i class="material-icons">notes</i>
                                                    Description
                                                </div>
                                                <div class="content">
                                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-9">
                                <div class="card">
                                    <div class="body">
                                        <div class="material-tab-pane">
                                            <ul class="nav nav-tabs" role="tablist">
                                                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                                                <li role="presentation"><a href="#profile_settings" aria-controls="settings" role="tab" data-toggle="tab">Profile Settings</a></li>
                                                <li role="presentation"><a href="#change_password_settings" aria-controls="settings" role="tab" data-toggle="tab">Change Password</a></li>
                                            </ul>

                                            <div class="tab-content">
                                                <!--Info post area-->
                                                <div role="tabpanel" class="tab-pane fade in active" id="home">

                                                    <div class="panel panel-default panel-post">
                                                        <div class="panel-heading">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img src="{{asset('public\uploads\user-lg.jpg')}}" />
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">
                                                                        <a href="{{$userprofile->user->id}}">{{$userprofile->user->firstname}},{{$userprofile->user->lastname}}
                                                                        </a>
                                                                    </h4>
                                                                    Shared publicly - 26 Oct 2018
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="post">
                                                                <div class="post-heading">
                                                                    <p>I am a very simple wall post. I am good at containing <a href="#">#small</a> bits of <a href="#">#information</a>. I require little more information to use effectively.</p>
                                                                </div>
                                                                <div class="post-content">
                                                                    <img src="{{asset('public\uploads\profile-post-image.jpg')}}" class="img-responsive" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <ul>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="material-icons">thumb_up</i>
                                                                        <span>12 Likes</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="material-icons">comment</i>
                                                                        <span>5 Comments</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="material-icons">share</i>
                                                                        <span>Share</span>
                                                                    </a>
                                                                </li>
                                                            </ul>

                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" placeholder="Type a comment" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="panel panel-default panel-post">
                                                        <div class="panel-heading">
                                                            <div class="media">
                                                                <div class="media-left">
                                                                    <a href="#">
                                                                        <img src="{{asset('public\uploads\user-lg.jpg')}}" />
                                                                    </a>
                                                                </div>
                                                                <div class="media-body">
                                                                    <h4 class="media-heading">
                                                                        <a href="{{$userprofile->user->id}}">{{$userprofile->user->firstname}},{{$userprofile->user->lastname}}
                                                                        </a>
                                                                    </h4>
                                                                    Shared publicly - 01 Oct 2018
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-body">
                                                            <div class="post">
                                                                <div class="post-heading">
                                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                                                </div>
                                                                <div class="post-content">
                                                                    <iframe width="100%" height="360" src="https://www.youtube.com/embed/10r9ozshGVE" frameborder="0" allowfullscreen=""></iframe>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="panel-footer">
                                                            <ul>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="material-icons">thumb_up</i>
                                                                        <span>125 Likes</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="material-icons">comment</i>
                                                                        <span>8 Comments</span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#">
                                                                        <i class="material-icons">share</i>
                                                                        <span>Share</span>
                                                                    </a>
                                                                </li>
                                                            </ul>

                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" placeholder="Type a comment" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--Info post area-->
                                      
                                                <!--User Details edit area-->
                                                <div role="tabpanel" class="tab-pane fade in" id="profile_settings">
                                                    <form class="form-horizontal">
                                                        <div class="form-group">
                                                            <label for="firstname" class="col-sm-2 control-label">First Name</label>
                                                            <div class="col-sm-10">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="First Name" value="{{$userprofile->user->firstname}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="lastname" class="col-sm-2 control-label">Last Name</label>
                                                            <div class="col-sm-10">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Last Name" value="{{$userprofile->user->lastname}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="Email" class="col-sm-2 control-label">Email</label>
                                                            <div class="col-sm-10">
                                                                <div class="form-line">
                                                                    <input type="email" class="form-control" id="Email" name="Email" placeholder="Email" value="{{$userprofile->user->email}}" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputExperience" class="col-sm-2 control-label">Experience</label>

                                                            <div class="col-sm-10">
                                                                <div class="form-line">
                                                                    <textarea class="form-control" id="InputExperience" name="InputExperience" rows="3" placeholder="Experience"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="InputSkills" class="col-sm-2 control-label">Skills</label>

                                                            <div class="col-sm-10">
                                                                <div class="form-line">
                                                                    <input type="text" class="form-control" id="InputSkills" name="InputSkills" placeholder="Skills">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="InputSkills" class="col-sm-2 control-label">Avatar Image</label>

                                                            <div class="col-sm-10">
                                                                <div class="form-line">
                                                                    <input type="file" class="form-control" id="InputSkills" name="InputSkills" placeholder="Skills">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-offset-2 col-sm-10">
                                                                <input type="checkbox" id="terms_condition_check" class="chk-col-red filled-in" />
                                                                <label for="terms_condition_check">I agree to the <a href="#">terms and conditions</a></label>
                                                            </div>
                                                        </div>
                                                       
                                                        <div class="form-group">
                                                            <div class="col-sm-offset-2 col-sm-10">
                                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--User Details edit area-->
                                                
                                                <!--PAssword change area-->
                                                <div role="tabpanel" class="tab-pane fade in" id="change_password_settings">
                                                    <form class="form-horizontal">
                                                        <div class="form-group">
                                                            <label for="OldPassword" class="col-sm-3 control-label">Old Password</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-line">
                                                                    <input type="password" class="form-control" id="OldPassword" name="OldPassword" placeholder="Old Password" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="NewPassword" class="col-sm-3 control-label">New Password</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-line">
                                                                    <input type="password" class="form-control" id="NewPassword" name="NewPassword" placeholder="New Password" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="NewPasswordConfirm" class="col-sm-3 control-label">New Password (Confirm)</label>
                                                            <div class="col-sm-9">
                                                                <div class="form-line">
                                                                    <input type="password" class="form-control" id="NewPasswordConfirm" name="NewPasswordConfirm" placeholder="New Password (Confirm)" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="col-sm-offset-3 col-sm-9">
                                                                <button type="submit" class="btn btn-danger">SUBMIT</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                                <!--PAssword change area-->

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="card">
                          <div class="header">
                              <h2>
                                  VERTICAL LAYOUT
                                  <small>With floating label</small>
                              </h2>
                              <ul class="header-dropdown m-r--5">
                                  <li class="dropdown">
                                      <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                          <i class="material-icons">more_vert</i>
                                      </a>
                                      <ul class="dropdown-menu pull-right">
                                          <li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
                                          <li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
                                          <li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
                                      </ul>
                                  </li>
                              </ul>
                          </div>
                          <div class="body">
                              <form>
                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="text" id="email_address" class="form-control">
                                          <label class="form-label">Email Address</label>
                                      </div>
                                  </div>

                                  <div class="form-group form-float">
                                      <div class="form-line">
                                          <input type="password" id="password" class="form-control">
                                          <label class="form-label">Password</label>
                                      </div>
                                  </div>

                                  <input type="checkbox" id="remember_me_2" class="filled-in">
                                  <label for="remember_me_2">Remember Me</label>
                                  <br>
                                  <button type="button" class="btn btn-primary m-t-15 waves-effect">LOGIN</button>
                              </form>
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
