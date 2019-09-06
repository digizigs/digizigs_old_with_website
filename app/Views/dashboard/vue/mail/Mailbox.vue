<template>
	<div class="mail-wrapper">

		<mailbox-sidebar></mailbox-sidebar>

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
					<span class="tx-color-03">Sort:</span> <a href="" class="dropdown-link link-02">Date</a>
					</div><!-- dropdown -->
				</div>

				<label class="mail-group-label">Today</label>
				<ul class="list-unstyled media-list mg-b-0">
					<li v-for="mail in mails" v-bind:key="mail.id" class="media unread" @click="viewmail(mail)">
					<div class="avatar"><span class="avatar-initial rounded-circle bg-indigo">d</span></div>
					<div class="media-body mg-l-15">
						<div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
						<span class="tx-12">{{mail.from | mailname}}</span>
						<span class="tx-11">{{mail.created_at | vueDay}}</span>
						</div>
						<h6 class="tx-13">{{mail.subject}}</h6>
						<p class="tx-12 tx-color-03 mg-b-0">Aenean commodo ligula eget dolor. Ae nean massa. Cum sociis natoque </p>
					</div><!-- media-body -->
					</li>
				</ul>

				<label class="mail-group-label">Yesterday</label>
				<ul class="list-unstyled media-list mg-b-0">
					<li class="media">
					<div class="avatar"><img src="https://via.placeholder.com/500" class="rounded-circle" alt=""></div>
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

				<div class="pd-t-1 pd-b-5 pd-x-5">
					<a href="" class="btn btn-xs btn-block btn-light bd-0 tx-uppercase tx-10 tx-spacing-1 tx-medium mn-ht-0">Load more</a>
				</div>

			</div><!-- mail-group-body -->

		</div><!-- mail-group -->

		<div v-if="dataloaded" class="mail-content">
			<div class="mail-content-header d-none">
			<a href="" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
			<div class="media">
				<a href="" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
				<div class="avatar avatar-sm"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
				<div class="media-body mg-l-10">
				<h6 class="mg-b-2 tx-13">{{mail.from | mailname}}</h6>
				<span class="d-block tx-11 tx-color-03">{{mail.created_at | dateTime}}</span>
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
				<h5 class="mg-b-30">{{mail.subject}}</h5>

				<span class="d-block tx-11 tx-color-03">{{mail.created_at | dateTime}}</span>
				<span class="d-block tx-11 tx-color-03">{{mail.created_at | dateTime}}</span>
				<span class="d-block tx-11 tx-color-03">{{mail.created_at | dateTime}}</span>
				<span class="d-block tx-11 tx-color-03">{{mail.created_at | dateTime}}</span>

				<div v-html="mail.body_html" class=""></div>
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
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				filter:'',
				email:'',
				user:{},
				mails:[],
				mail:'',
				dataloaded:false
			}
		},
		computed:{
			mailbody(){
				return 20;
			}
		},
		watch:{
			dataloaded(){
				console.log(this.mails[0])
				this.mail = this.mails[0]
			}
		},
		methods:{
			viewmail:function(mail){
				//console.log(mail)
				this.mail = mail
				//this.$emit('mailclick', mail)
				
				new PerfectScrollbar('.mail-content', {
					suppressScrollX: true
				});

				var quill = new Quill('#editor-container', {
					modules: {
					toolbar: '#toolbar-container'
					},
					placeholder: 'Compose an epic...',
					theme: 'snow'
				});


				$('.mail-group .selected').removeClass('selected');

				$(this).addClass('selected');
				$(this).removeClass('unread');

				$('.mail-content-header').removeClass('d-none');
				$('.mail-content-body').removeClass('d-none');

				if(window.matchMedia('(max-width: 1199px)').matches) {
				$('body').addClass('mail-content-show');
				}

				if(window.matchMedia('(min-width: 768px)').matches) {
					$('#Sidebar').removeClass('d-md-none');
					$('#mainMenuOpen').removeClass('d-md-flex');
				}
			},
			mailclicked(e){
				//console.log(e)
				this.mail = e
			}	
		},
		created(){
			axios.get('mail/create',{params:{filter:this.filter,email:this.user.email}})
					.then((response) => {
						console.log(response.data)
						this.mails = response.data
						this.dataloaded = true

						if(this.mails.length > 0){				
							this.dataloaded = true
						}
						
						//this.mail = this.mails[0]
						//this.mails=response.data
						//this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === 'inbox')
						//this.dataloaded = true
					})
				.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>

.modal-backdrop {
  //z-index: -1;
}
.modal{
	////display: none; /* Hidden by default */
    //position: fixed; /* Stay in place front is invalid - may break your css so removed */  
    //padding-top: 100px; /* Location of the box - don't know what this does?  If it is to move your modal down by 100px, then just change top below to 100px and remove this*/
    //left: 0;
    //right:0; /* Full width (left and right 0) */
    //top: 0;
    //bottom: 0; /* Full height top and bottom 0 */
    //overflow: auto; /* Enable scroll if needed */
    //background-color: rgb(0,0,0); /* Fallback color */
   // background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    z-index: 9999; /* Sit on top - higher than any other z-index in your site*/
}
</style>