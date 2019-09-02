@extends('layouts.dashboard')

@section('title','Dashboard')


@section('css')
	
	<link href="{{asset('public/dashboard/lib/quill/quill.core.css')}}" rel="stylesheet">
    <link href="{{asset('public/dashboard/lib/quill/quill.snow.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('public/dashboard/assets/css/dashforge.mail.css')}}">

@endsection


@section('content')

<div class="mail-wrapper">

	<div class="mail-sidebar">
	    <div class="mail-sidebar-body">
	      <div class="pd-20">
	        <button id="mailComposeBtn" class="btn btn-primary btn-block tx-uppercase tx-10 tx-medium tx-sans tx-spacing-4">Compose</button>
	      </div>
	      <div class="pd-b-10 pd-x-10">
	        <nav class="nav nav-sidebar tx-13">
	          <a href="#" class="nav-link active"><i data-feather="inbox"></i> <span>Inbox</span> <span class="badge">20</span></a>
	          <a href="#" class="nav-link"><i data-feather="monitor"></i> <span>Starred</span> <span class="badge">3</span></a>
	          <a href="#" class="nav-link"><i data-feather="clock"></i> <span>Important</span> <span class="badge">10</span></a>
	          <a href="#" class="nav-link"><i data-feather="star"></i> <span>Sent Mail</span> <span class="badge">8</span></a>
	          <a href="#" class="nav-link"><i data-feather="file"></i> <span>Drafts</span> <span class="badge">15</span></a>
	          <a href="#" class="nav-link"><i data-feather="slash"></i> <span>Spam</span> <span class="badge">128</span></a>
	          <a href="#" class="nav-link"><i data-feather="trash"></i> <span>Trash</span> <span class="badge">6</span></a>
	        </nav>
	      </div>
	      <div class="pd-10">
	        <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Label</label>
	        <nav class="nav nav-sidebar tx-13">
	          <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Social</span></a>
	          <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Promotions</span></a>
	          <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Updates</span></a>
	          <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Business</span></a>
	          <a href="#" class="nav-link"><i data-feather="folder"></i> <span>Finance</span></a>
	        </nav>
	      </div>

	      <div class="pd-y-15 pd-x-10">
	        <label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Tags</label>
	        <nav class="nav nav-sidebar tx-13">
	          <a href="#" class="nav-link"><i data-feather="tag"></i> <span>Facebook</span></a>
	          <a href="#" class="nav-link"><i data-feather="tag"></i> <span>Twitter</span></a>
	        </nav>
	      </div>
	    </div><!-- mail-sidebar-body -->
	</div><!-- mail-sidebar -->

	<div class="mail-group">
	    <div class="mail-group-header">
	      <i data-feather="search"></i>
	      <div class="search-form">
	        <input type="search" class="form-control" placeholder="Search mail">
	      </div><!-- search-form -->
	    </div><!-- mail-group-header -->
	    <div class="mail-group-body">
	      <div class="pd-y-15 pd-x-20 d-flex justify-content-between align-items-center">
	        <h6 class="tx-uppercase tx-semibold mg-b-0">Inbox</h6>
	        <div class="dropdown tx-13">
	          <span class="tx-color-03">Sort:</span> <a href="#" class="dropdown-link link-02">Date</a>
	        </div><!-- dropdown -->
	      </div>
	      <label class="mail-group-label">Today</label>
	      <ul class="list-unstyled media-list mg-b-0">
	        <li class="media unread">
	          <div class="avatar"><span class="avatar-initial rounded-circle bg-indigo">d</span></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Dyanne Aceron</span>
	              <span class="tx-11">1:20pm</span>
	            </div>
	            <h6 class="tx-13">Just asking questions</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
	          </div><!-- media-body -->
	        </li>
	        <li class="media">
	          <div class="avatar"><img src="../../assets/img/img6.jpg" class="rounded-circle" alt=""></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Reynante Labares</span>
	              <span class="tx-11">11:40am</span>
	            </div>
	            <h6 class="tx-13">30 Seconds Survey to Your Next Job</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
	          </div><!-- media-body -->
	        </li>
	        <li class="media">
	          <div class="avatar"><span class="avatar-initial rounded-circle bg-gray-800">r</span></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Rolando Paloso</span>
	              <span class="tx-11">10:54am</span>
	            </div>
	            <h6 class="tx-13">Watch, Listen and Play Longer</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
	          </div><!-- media-body -->
	        </li>
	        <li class="media">
	          <div class="avatar"><span class="avatar-initial rounded-circle bg-pink">s</span></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Socrates Itumay</span>
	              <span class="tx-11">09:50am</span>
	            </div>
	            <h6 class="tx-13">Pre-Order Sale: Mastering CSS</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
	          </div><!-- media-body -->
	        </li>
	      </ul>
	      <label class="mail-group-label">Yesterday</label>
	      <ul class="list-unstyled media-list mg-b-0">
	        <li class="media">
	          <div class="avatar"><img src="../../assets/img/img8.jpg" class="rounded-circle" alt=""></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Yassi Pressman</span>
	              <span class="tx-11">8:20pm</span>
	            </div>
	            <h6 class="tx-13">Envato Contributor Payment</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis natoqu</p>
	          </div><!-- media-body -->
	        </li>
	        <li class="media unread">
	          <div class="avatar"><span class="avatar-initial rounded-circle bg-teal">i</span></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Isidore Dilao</span>
	              <span class="tx-11">06:42pm</span>
	            </div>
	            <h6 class="tx-13">America's Best Dance Cruise</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
	          </div><!-- media-body -->
	        </li>
	      </ul>
	      <label class="mail-group-label">January 20</label>
	      <ul class="list-unstyled media-list mg-b-0">
	        <li class="media">
	          <div class="avatar"><img src="../../assets/img/img10.jpg" class="rounded-circle" alt=""></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Dexter Dela Cruz</span>
	              <span class="tx-11">4:18pm</span>
	            </div>
	            <h6 class="tx-13">A Flaming Pile of Garbage</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis natoqu</p>
	          </div><!-- media-body -->
	        </li>
	        <li class="media">
	          <div class="avatar"><span class="avatar-initial rounded-circle bg-primary">a</span></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Adrian Monino</span>
	              <span class="tx-11">06:42pm</span>
	            </div>
	            <h6 class="tx-13">America's Best Dance Cruise</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
	          </div><!-- media-body -->
	        </li>
	      </ul>
	      <label class="mail-group-label">January 18</label>
	      <ul class="list-unstyled media-list mg-b-0">
	        <li class="media">
	          <div class="avatar"><img src="../../assets/img/img9.jpg" class="rounded-circle" alt=""></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Annie Christensen</span>
	              <span class="tx-11">7:26pm</span>
	            </div>
	            <h6 class="tx-13">Just asking questions</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis natoqu</p>
	          </div><!-- media-body -->
	        </li>
	        <li class="media">
	          <div class="avatar"><span class="avatar-initial rounded-circle bg-primary">a</span></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Adrian Monino</span>
	              <span class="tx-11">06:42pm</span>
	            </div>
	            <h6 class="tx-13">Watch, Listen and Play Longer</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
	          </div><!-- media-body -->
	        </li>
	        <li class="media">
	          <div class="avatar"><img src="../../assets/img/img7.jpg" class="rounded-circle" alt=""></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Robert Restificar</span>
	              <span class="tx-11">12:01pm</span>
	            </div>
	            <h6 class="tx-13">Envato Contributor Payment</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Commodo ligula eget dolor. Aenean massa cum sociis natoqu</p>
	          </div><!-- media-body -->
	        </li>
	        <li class="media">
	          <div class="avatar"><span class="avatar-initial rounded-circle bg-purple">r</span></div>
	          <div class="media-body mg-l-15">
	            <div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
	              <span class="tx-12">Raymart Serencio</span>
	              <span class="tx-11">10:13am</span>
	            </div>
	            <h6 class="tx-13">Sale: Javascript Beginners</h6>
	            <p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
	          </div><!-- media-body -->
	        </li>
	      </ul>
	      <div class="pd-t-1 pd-b-5 pd-x-5">
	        <a href="#" class="btn btn-xs btn-block btn-light bd-0 tx-uppercase tx-10 tx-spacing-1 tx-medium mn-ht-0">Load more</a>
	      </div>
	    </div><!-- mail-group-body -->
	</div><!-- mail-group -->

	<div class="mail-content">
	    <div class="mail-content-header d-none">
	      <a href="#" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
	      <div class="media">
	        <div class="avatar avatar-sm"><img src="../../assets/img/img7.jpg" class="rounded-circle" alt=""></div>
	        <div class="media-body mg-l-10">
	          <h6 class="mg-b-2 tx-13">Reynante Labares</h6>
	          <span class="d-block tx-11 tx-color-03">Today, 11:40am</span>
	        </div><!-- media-body -->
	      </div><!-- media -->
	      <nav class="nav nav-icon-only mg-l-auto">
	        <a href="#" data-toggle="tooltip" title="Archive" class="nav-link d-none d-sm-block"><i data-feather="archive"></i></a>
	        <a href="#" data-toggle="tooltip" title="Report Spam" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
	        <a href="#" data-toggle="tooltip" title="Mark Unread" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
	        <a href="#" data-toggle="tooltip" title="Add Label" class="nav-link d-none d-sm-block"><i data-feather="folder"></i></a>
	        <a href="#" data-toggle="tooltip" title="Add Tag" class="nav-link d-none d-sm-block"><i data-feather="tag"></i></a>
	        <span class="nav-divider d-none d-sm-block"></span>
	        <a href="#" data-toggle="tooltip" title="Mark Important" class="nav-link d-none d-sm-block"><i data-feather="star"></i></a>
	        <a href="#" data-toggle="tooltip" title="Trash" class="nav-link d-none d-sm-block"><i data-feather="trash"></i></a>
	        <a href="#" data-toggle="tooltip" title="Print" class="nav-link d-none d-sm-block"><i data-feather="printer"></i></a>
	        <a href="#" data-toggle="tooltip" title="Options" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
	      </nav>
	    </div><!-- mail-content-header -->
	    <div class="mail-content-body d-none">
	      <div class="pd-20 pd-lg-25 pd-xl-30">
	        <h5 class="mg-b-30">30 Seconds Survey to Your Next Job</h5>

	        <h6 class="tx-semibold mg-b-0">Ms. Katherine Lumaad</h6>
	        <span class="tx-color-03">ThemePixels, Inc.</span>
	        <p class="tx-color-03">San Francisco, CA, United States</p>

	        <p>Greetings!</p>
	        <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
	        <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. </p>
	        <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem.</p>
	        <p>
	          <span>Sincerely yours,</span><br>
	          <strong>Envato Design Team</strong>
	        </p>
	      </div>
	      <div class="pd-20 pd-lg-25 pd-xl-30 pd-t-0-f">
	        <div id="editor-container" class="tx-13 tx-lg-14 ht-100">
	          Type here to <u>Reply</u> or <u>Forward</u>
	        </div>
	        <div class="d-flex align-items-center justify-content-between mg-t-10">
	          <div id="toolbar-container" class="bd-0-f pd-0-f">
	            <span class="ql-formats">
	              <button class="ql-bold"></button>
	              <button class="ql-italic"></button>
	              <button class="ql-underline"></button>
	            </span>
	            <span class="ql-formats">
	              <button class="ql-link"></button>
	              <button class="ql-image"></button>
	            </span>
	          </div>
	          <button class="btn btn-primary">Reply</button>
	        </div>
	      </div>
	    </div><!-- mail-content-body -->
	</div><!-- mail-content -->
</div><!-- mail-wrapper -->



<div id="mailCompose" class="mail-compose">
    <div class="mail-compose-dialog">
        <div class="mail-compose-header">
          <h6 class="mail-compose-title tx-white">New Message</h6>
          <nav class="nav nav-icon-only">
            <a id="mailComposeMinimize" href="#" class="nav-link nav-link-minimize d-none d-lg-block">
              <i data-feather="minus"></i>
              <i data-feather="square"></i>
            </a>
            <a id="mailComposeShrink" href="#" class="nav-link nav-link-shrink d-none d-lg-block">
              <i data-feather="minimize-2"></i>
              <i data-feather="maximize-2"></i>
            </a>
            <a id="mailComposeClose" href="#" class="nav-link nav-link-close"><i data-feather="x"></i></a>
          </nav>
        </div><!-- mail-compose-header -->
        <div class="mail-compose-body">
          <div class="form-row align-items-center">
            <div class="col-sm">Recipient:</div>
            <div class="col-sm-10">
              <input type="text" class="form-control bd-0 pd-x-0" placeholder="Enter recipient's email address">
            </div>
          </div>
          <hr class="mg-y-10">
          <div class="form-row align-items-center">
            <div class="col-sm">Subject:</div>
            <div class="col-sm-10">
              <input type="text" class="form-control bd-0 pd-x-0" placeholder="Enter subject">
            </div>
          </div>
          <div id="editor-container2" class="ht-150 mg-t-15"></div>
          <div class="d-sm-flex align-items-center justify-content-between mg-t-25">
            <div id="toolbar-container2" class="bd-0-f pd-0-f">
              <span class="ql-formats">
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-underline"></button>
              </span>
              <span class="ql-formats">
                <button class="ql-link"></button>
                <button class="ql-image"></button>
              </span>
            </div>
            <div class="tx-13 mg-t-15 mg-sm-t-0">
              <button class="btn btn-white mg-r-5">Save as Draft</button>
              <button class="btn btn-primary">Send</button>
            </div>
          </div>
        </div><!-- mail-compose-body -->
    </div><!-- mail-compose-dialog -->
</div><!-- mail-compose -->

@endsection


@section('javascript')
	 
	<script src="{{asset('public/dashboard/lib/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('public/dashboard/lib/quill/quill.min.js')}}"></script>
	<script src="{{asset('public/dashboard/assets/js/dashforge.mail.js')}}"></script>

@endsection