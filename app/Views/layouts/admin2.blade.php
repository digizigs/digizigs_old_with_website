
<!DOCTYPE html>
<html lang="en">
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('public/images/brand_assets/d-fevi-orange.png')}}" type="image/ico" />

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="user-id" content="{{Auth::check() ? Auth::user()->id : ''}}">


  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,600">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
  <link href="{{asset('public/vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('public/assets/icofont/icofont.min.css')}}">

  <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/feather.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/jquery.mCustomScrollbar.css')}}">
  <link rel="stylesheet" type="text/css" href="{{asset('public/assets/css/style.css')}}">



</head>
<body>

<div id="app">
  <div class="theme-loader">
    <div class="ball-scale">
      <div class='contain'>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
        <div class="ring">
          <div class="frame"></div>
        </div>
      </div>
    </div>
  </div>

  <div id="pcoded" class="pcoded">

    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

      <nav class="navbar header-navbar pcoded-header">

        <div class="navbar-wrapper">

          <div class="navbar-logo">

            <a class="mobile-menu" id="mobile-collapse" href="javascript:void(0)">
               <i class="fa fa-toggle-off" aria-hidden="true"></i>
            </a>

            <a href="index.html">
              <img class="img-fluid" src="{{asset('public\images\brand_assets\logo.png')}}" alt="Theme-Logo" />
            </a>

            <a class="mobile-options">
              <i class="fa fa-bars" aria-hidden="true"></i>         
            </a>

          </div>

          <div class="navbar-container container-fluid">
            <ul class="nav-left">
              <li class="header-search">
                <div class="main-search morphsearch-search">
                  <div class="input-group">
                    <span class="input-group-addon search-close"><i class="fa fa-times" aria-hidden="true"></i></span>
                    <input type="text" class="form-control">
                    <span class="input-group-addon search-btn"><i class="fa fa-search" aria-hidden="true"></i></span>
                  </div>
                </div>
              </li>
              <li>
                <a href="#!" onclick="javascript:toggleFullScreen()">
                  <i class="fa fa-arrows-alt" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
            <ul class="nav-right">
              <li class="header-notification">
                <div class="dropdown-primary dropdown">
                  <div class="dropdown-toggle" data-toggle="dropdown">
                    <i class="feather icon-bell"></i>
                    <span class="badge bg-c-pink">5</span>
                  </div>
                  <ul class="show-notification notification-view dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    <li>
                      <h6>Notifications</h6>
                      <label class="label label-danger">New</label>
                    </li>
                    <li>
                      <div class="media">
                        <img class="d-flex align-self-center img-radius" src="{{asset('public\images\brand_assets\avatar-4.jpg')}}" alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="notification-user">John Doe</h5>
                          <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                          <span class="notification-time">30 minutes ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media">
                        <img class="d-flex align-self-center img-radius" src="{{asset('public\images\brand_assets\avatar-4.jpg')}}" alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="notification-user">Joseph William</h5>
                          <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                          <span class="notification-time">30 minutes ago</span>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="media">
                        <img class="d-flex align-self-center img-radius" src="{{asset('public\images\brand_assets\avatar-4.jpg')}}" alt="Generic placeholder image">
                        <div class="media-body">
                          <h5 class="notification-user">Sara Soudein</h5>
                          <p class="notification-msg">Lorem ipsum dolor sit amet, consectetuer elit.</p>
                          <span class="notification-time">30 minutes ago</span>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </li>
              
              <li class="user-profile header-notification">
                <div class="dropdown-primary dropdown">
                  <div class="dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('public\images\brand_assets\avatar-4.jpg')}}" class="img-radius" alt="User-Profile-Image">
                    <span>John Doe</span>
                    <i class="fa fa-caret-down" aria-hidden="true"></i>
                  </div>
                  <ul class="show-notification profile-notification dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    <li>
                      <a href="#!">
                        <i class="feather icon-settings"></i> Settings
                      </a>
                    </li>
                    <li>
                      <a href="user-profile.html">
                        <i class="feather icon-user"></i> Profile
                      </a>
                    </li>
                    <li>
                      <a href="email-inbox.html">
                        <i class="feather icon-mail"></i> My Messages
                      </a>
                    </li>
                    <li>
                      <a href="auth-lock-screen.html">
                        <i class="feather icon-lock"></i> Lock Screen
                      </a>
                    </li>
                    <li>
                      <a href="auth-normal-sign-in.html">
                        <i class="feather icon-log-out"></i> Logout
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      
      
      <div class="pcoded-main-container">
        <div class="pcoded-wrapper">

          <!-- Sidebar -->
          <nav class="pcoded-navbar">
            <div class="pcoded-inner-navbar main-menu">
              <div class="pcoded-navigatio-lavel">Navigation</div>
              <ul class="pcoded-item pcoded-left-item">
                <li class="active pcoded-trigger">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon" style="margin-top:-5px;"><i class="fa fa-tachometer" aria-hidden="true"></i></span>
                    <span class="pcoded-mtext">Dashboard</span>
                  </a>
                </li>
                <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon"></span>
                    <span class="pcoded-mtext">Page layouts</span>
                    <span class="pcoded-badge has-submenu"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                  </a>

                  <ul class="pcoded-submenu">
                    <li class=" pcoded-hasmenu">
                      <a href="javascript:void(0)">
                        <span class="pcoded-mtext">Vertical</span>
                        <span class="pcoded-badge has-submenu"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                      </a>
                      <ul class="pcoded-submenu">
                        <li class=" ">
                          <a href="menu-static.html">
                            <span class="pcoded-mtext">Static Layout</span>
                          </a>
                        </li>
                        <li class=" ">
                          <a href="menu-header-fixed.html">
                            <span class="pcoded-mtext">Header Fixed</span>
                          </a>
                        </li>
                        <li class=" ">
                          <a href="menu-compact.html">
                            <span class="pcoded-mtext">Compact</span>
                          </a>
                        </li>
                        <li class=" ">
                          <a href="menu-sidebar.html">
                            <span class="pcoded-mtext">Sidebar Fixed</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li class=" pcoded-hasmenu">
                      <a href="javascript:void(0)">
                        <span class="pcoded-mtext">Horizontal</span>
                      </a>
                      <ul class="pcoded-submenu">
                        <li class=" ">
                          <a href="menu-horizontal-static.html" target="_blank">
                            <span class="pcoded-mtext">Static Layout</span>
                          </a>
                        </li>
                        <li class=" ">
                          <a href="menu-horizontal-fixed.html" target="_blank">
                            <span class="pcoded-mtext">Fixed layout</span>
                          </a>
                        </li>
                        <li class=" ">
                          <a href="menu-horizontal-icon.html" target="_blank">
                            <span class="pcoded-mtext">Static With Icon</span>
                          </a>
                        </li>
                        <li class=" ">
                          <a href="menu-horizontal-icon-fixed.html" target="_blank">
                            <span class="pcoded-mtext">Fixed With Icon</span>
                          </a>
                        </li>
                      </ul>
                    </li>
                    
                  </ul>
                </li>
                <li class="">
                  <a href="navbar-light.html">
                    <span class="pcoded-micon"><i class="fa fa-bars" aria-hidden="true"></i></span>
                    <span class="pcoded-mtext">Navigation</span>
                  </a>
                </li>
                <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-layers"></i></span>
                    <span class="pcoded-mtext">Widget</span>
                    <span class="pcoded-badge label label-danger">100+</span>
                  </a>
                  <ul class="pcoded-submenu">
                    <li class=" ">
                      <a href="widget-statistic.html">
                        <span class="pcoded-mtext">Statistic</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="widget-data.html">
                        <span class="pcoded-mtext">Data</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="widget-chart.html">
                        <span class="pcoded-mtext">Chart Widget</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              <div class="pcoded-navigatio-lavel">UI Element</div>
              <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-box"></i></span>
                    <span class="pcoded-mtext">Basic Components</span>
                  </a>
                  <ul class="pcoded-submenu">
                    <li class=" ">
                      <a href="alert.html">
                        <span class="pcoded-mtext">Alert</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="breadcrumb.html">
                        <span class="pcoded-mtext">Breadcrumbs</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="button.html">
                        <span class="pcoded-mtext">Button</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="box-shadow.html">
                        <span class="pcoded-mtext">Box-Shadow</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="accordion.html">
                        <span class="pcoded-mtext">Accordion</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="generic-class.html">
                        <span class="pcoded-mtext">Generic Class</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="tabs.html">
                        <span class="pcoded-mtext">Tabs</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="color.html">
                        <span class="pcoded-mtext">Color</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="label-badge.html">
                        <span class="pcoded-mtext">Label Badge</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="progress-bar.html">
                        <span class="pcoded-mtext">Progress Bar</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="preloader.html">
                        <span class="pcoded-mtext">Pre-Loader</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="list.html">
                        <span class="pcoded-mtext">List</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="tooltip.html">
                        <span class="pcoded-mtext">Tooltip And Popover</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="typography.html">
                        <span class="pcoded-mtext">Typography</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="other.html">
                        <span class="pcoded-mtext">Other</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-gitlab"></i></span>
                    <span class="pcoded-mtext">Advance Components</span>
                  </a>
                  <ul class="pcoded-submenu">
                    <li class=" ">
                      <a href="draggable.html">
                        <span class="pcoded-mtext">Draggable</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="bs-grid.html">
                        <span class="pcoded-mtext">Grid Stack</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="light-box.html">
                        <span class="pcoded-mtext">Light Box</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="modal.html">
                        <span class="pcoded-mtext">Modal</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="notification.html">
                        <span class="pcoded-mtext">Notifications</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="notify.html">
                        <span class="pcoded-mtext">PNOTIFY</span>
                        <span class="pcoded-badge label label-info">NEW</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="rating.html">
                        <span class="pcoded-mtext">Rating</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="range-slider.html">
                        <span class="pcoded-mtext">Range Slider</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="slider.html">
                        <span class="pcoded-mtext">Slider</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="syntax-highlighter.html">
                        <span class="pcoded-mtext">Syntax Highlighter</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="tour.html">
                        <span class="pcoded-mtext">Tour</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="treeview.html">
                        <span class="pcoded-mtext">Tree View</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="nestable.html">
                        <span class="pcoded-mtext">Nestable</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="toolbar.html">
                        <span class="pcoded-mtext">Toolbar</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="x-editable.html">
                        <span class="pcoded-mtext">X-Editable</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-package"></i></span>
                    <span class="pcoded-mtext">Extra Components</span>
                  </a>
                  <ul class="pcoded-submenu">
                    <li class=" ">
                      <a href="session-timeout.html">
                        <span class="pcoded-mtext">Session Timeout</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="session-idle-timeout.html">
                        <span class="pcoded-mtext">Session Idle Timeout</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="offline.html">
                        <span class="pcoded-mtext">Offline</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class=" ">
                  <a href="animation.html">
                    <span class="pcoded-micon"><i class="feather icon-aperture rotate-refresh"></i><b>A</b></span>
                    <span class="pcoded-mtext">Animations</span>
                  </a>
                </li>
                <li class=" ">
                  <a href="sticky.html">
                    <span class="pcoded-micon"><i class="feather icon-cpu"></i></span>
                    <span class="pcoded-mtext">Sticky Notes</span>
                    <span class="pcoded-badge label label-danger">HOT</span>
                  </a>
                </li>
                <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-command"></i></span>
                    <span class="pcoded-mtext">Icons</span>
                  </a>
                  <ul class="pcoded-submenu">
                    <li class=" ">
                      <a href="icon-font-awesome.html">
                        <span class="pcoded-mtext">Font Awesome</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="icon-themify.html">
                        <span class="pcoded-mtext">Themify</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="icon-simple-line.html">
                        <span class="pcoded-mtext">Simple Line Icon</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="icon-ion.html">
                        <span class="pcoded-mtext">Ion Icon</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="icon-material-design.html">
                        <span class="pcoded-mtext">Material Design</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="icon-icofonts.html">
                        <span class="pcoded-mtext">Ico Fonts</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="icon-weather.html">
                        <span class="pcoded-mtext">Weather Icon</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="icon-typicons.html">
                        <span class="pcoded-mtext">Typicons</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="icon-flags.html">
                        <span class="pcoded-mtext">Flags</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>

              <div class="pcoded-navigatio-lavel">Forms</div>
              <ul class="pcoded-item pcoded-left-item">
                <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-clipboard"></i></span>
                    <span class="pcoded-mtext">Form Components</span>
                  </a>
                  <ul class="pcoded-submenu">
                    <li class=" ">
                      <a href="form-elements-component.html">
                        <span class="pcoded-mtext">Form Components</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="form-elements-add-on.html">
                        <span class="pcoded-mtext">Form-Elements-Add-On</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="form-elements-advance.html">
                        <span class="pcoded-mtext">Form-Elements-Advance</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="form-validation.html">
                        <span class="pcoded-mtext">Form Validation</span>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class=" ">
                  <a href="form-picker.html">
                    <span class="pcoded-micon"><i class="feather icon-edit-1"></i></span>
                    <span class="pcoded-mtext">Form Picker</span>
                    <span class="pcoded-badge label label-warning">NEW</span>
                  </a>
                </li>
                <li class=" ">
                  <a href="form-select.html">
                    <span class="pcoded-micon"><i class="feather icon-feather"></i></span>
                    <span class="pcoded-mtext">Form Select</span>
                  </a>
                </li>
                <li class=" ">
                  <a href="form-masking.html">
                    <span class="pcoded-micon"><i class="feather icon-shield"></i></span>
                    <span class="pcoded-mtext">Form Masking</span>
                  </a>
                </li>
                <li class=" ">
                  <a href="form-wizard.html">
                    <span class="pcoded-micon"><i class="feather icon-tv"></i></span>
                    <span class="pcoded-mtext">Form Wizard</span>
                  </a>
                </li>
                <li class="pcoded-hasmenu">
                  <a href="javascript:void(0)">
                    <span class="pcoded-micon"><i class="feather icon-book"></i></span>
                    <span class="pcoded-mtext">Ready To Use</span>
                    <span class="pcoded-badge label label-danger">HOT</span>
                  </a>
                  <ul class="pcoded-submenu">
                    <li class=" ">
                      <a href="ready-cloned-elements-form.html">
                        <span class="pcoded-mtext">Cloned Elements Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-currency-form.html">
                        <span class="pcoded-mtext">Currency Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-form-booking.html">
                        <span class="pcoded-mtext">Booking Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-form-booking-multi-steps.html">
                        <span class="pcoded-mtext">Booking Multi Steps Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-form-comment.html">
                        <span class="pcoded-mtext">Comment Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-form-contact.html">
                        <span class="pcoded-mtext">Contact Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-job-application-form.html">
                        <span class="pcoded-mtext">Job Application Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-js-addition-form.html">
                        <span class="pcoded-mtext">JS Addition Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-login-form.html">
                        <span class="pcoded-mtext">Login Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-popup-modal-form.html" target="_blank">
                        <span class="pcoded-mtext">Popup Modal Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-registration-form.html">
                        <span class="pcoded-mtext">Registration Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-review-form.html">
                        <span class="pcoded-mtext">Review Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-subscribe-form.html">
                        <span class="pcoded-mtext">Subscribe Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-suggestion-form.html">
                        <span class="pcoded-mtext">Suggestion Form</span>
                      </a>
                    </li>
                    <li class=" ">
                      <a href="ready-tabs-form.html">
                        <span class="pcoded-mtext">Tabs Form</span>
                      </a>
                    </li>
                  </ul>
                </li>
              </ul>         
            </div>
          </nav>
          <!-- Sidebar -->

          <!-- Main Body -->
          <div class="pcoded-content">
            <div class="pcoded-inner-content">
              <div class="main-body">
                <div class="page-wrapper">
                  <div class="page-body">
                    <div class="row">
                      <div class="content">

                 

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!

                        <br>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!

                        <br>

                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!
                        <br>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!Lorem ipsum dolor sit amet, consectetur adipisicing elit. Officia maiores neque saepe nulla ipsam architecto provident aperiam ratione, ducimus, unde, porro voluptatem. Laboriosam, vel ex distinctio velit, eius eaque repudiandae!

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- Main Body -->

        </div>
      </div>
    </div>

  </div>

</div>




<script type="text/javascript" src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>


<script type="text/javascript" src="{{asset('public/assets/js/jquery.slimscroll.js')}}"></script>
<script src="{{asset('public/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>


<script src="{{asset('public/assets/js/pcoded.min.js')}}"></script>
<script src="{{asset('public/assets/js/vartical-layout.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/assets/js/script.min.js')}}"></script>




</body>
</html>
