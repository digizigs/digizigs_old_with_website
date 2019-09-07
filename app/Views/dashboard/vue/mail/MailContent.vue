<template>
	<div class="mail-content">
		<div class="mail-content-header d-none">
			<a href="" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
			<div class="media">
			<div class="avatar avatar-sm"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
			<div class="media-body mg-l-10">
				<h6 class="mg-b-2 tx-13">Reynante Labares</h6>
				<span class="d-block tx-11 tx-color-03">Today, 11:40am</span>
			</div><!-- media-body -->
			</div><!-- media -->
			<nav class="nav nav-icon-only mg-l-auto">
			<a href="" data-toggle="tooltip" title="Archive" class="nav-link d-none d-sm-block"><i data-feather="archive"></i></a>
			<a href="" data-toggle="tooltip" title="Report Spam" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
			<a href="" data-toggle="tooltip" title="Mark Unread" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
			<a href="" data-toggle="tooltip" title="Add Label" class="nav-link d-none d-sm-block"><i data-feather="folder"></i></a>
			<a href="" data-toggle="tooltip" title="Add Tag" class="nav-link d-none d-sm-block"><i data-feather="tag"></i></a>
			<span class="nav-divider d-none d-sm-block"></span>
			<a href="" data-toggle="tooltip" title="Mark Important" class="nav-link d-none d-sm-block"><i data-feather="star"></i></a>
			<a href="" data-toggle="tooltip" title="Trash" class="nav-link d-none d-sm-block"><i data-feather="trash"></i></a>
			<a href="" data-toggle="tooltip" title="Print" class="nav-link d-none d-sm-block"><i data-feather="printer"></i></a>
			<a href="" data-toggle="tooltip" title="Options" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
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
			<div id="editor-container" class="tx-13 tx-lg-14 ht-500">
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
</template>

<script type="text/javascript">
	export default{
		prop:['mail'],
		data(){
			return{
				search:''
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


</style>