<template>

	<div class="mail-wrapper">

		<div class="mail-sidebar">
			<div class="mail-sidebar-body">
			<div class="pd-20">
				<button id="mailComposeBtn" class="btn btn-primary btn-block tx-uppercase tx-10 tx-medium tx-sans tx-spacing-4">Compose</button>
			</div>
			<div class="pd-b-10 pd-x-10">
				<nav class="nav nav-sidebar tx-13">
				<a href="" class="nav-link active"><i data-feather="inbox"></i> <span>Inbox</span> <span class="badge">20</span></a>
				<a href="" class="nav-link"><i data-feather="monitor"></i> <span>Starred</span> <span class="badge">3</span></a>
				<a href="" class="nav-link"><i data-feather="clock"></i> <span>Important</span> <span class="badge">10</span></a>
				<a href="" class="nav-link"><i data-feather="star"></i> <span>Sent Mail</span> <span class="badge">8</span></a>
				<a href="" class="nav-link"><i data-feather="file"></i> <span>Drafts</span> <span class="badge">15</span></a>
				<a href="" class="nav-link"><i data-feather="slash"></i> <span>Spam</span> <span class="badge">128</span></a>
				<a href="" class="nav-link"><i data-feather="trash"></i> <span>Trash</span> <span class="badge">6</span></a>
				</nav>
			</div>
			<div class="pd-10">
				<label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Label</label>
				<nav class="nav nav-sidebar tx-13">
				<a href="" class="nav-link"><i data-feather="folder"></i> <span>Social</span></a>
				<a href="" class="nav-link"><i data-feather="folder"></i> <span>Promotions</span></a>
				<a href="" class="nav-link"><i data-feather="folder"></i> <span>Updates</span></a>
				<a href="" class="nav-link"><i data-feather="folder"></i> <span>Business</span></a>
				<a href="" class="nav-link"><i data-feather="folder"></i> <span>Finance</span></a>
				</nav>
			</div>

			<div class="pd-y-15 pd-x-10">
				<label class="tx-sans tx-uppercase tx-medium tx-10 tx-spacing-1 tx-color-03 pd-l-10">Tags</label>
				<nav class="nav nav-sidebar tx-13">
				<a href="" class="nav-link"><i data-feather="tag"></i> <span>Facebook</span></a>
				<a href="" class="nav-link"><i data-feather="tag"></i> <span>Twitter</span></a>
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
					<span class="tx-color-03">Sort:</span> <a href="#" class="dropdown-link link-02" v-on:click.prevent @click="sortmail" >Date</a>
					</div><!-- dropdown -->
				</div>

				
				<ul class="list-unstyled media-list mg-b-0">
					<li v-for="mail in maildata" v-bind:key="mail.id" class="media" v-bind:class="mail.status" @click="viewmail(mail)" @contextmenu.prevent="$refs.menu.open($event,mail.id)" >
						<div class="avatar"><span class="avatar-initial rounded-circle bg-indigo">d</span></div>
						<div class="media-body mg-l-15">
							<div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
							<span class="tx-12">{{mail.from | mailname}}</span>
							<span class="tx-11">{{mail.created_at | vueDay}}</span>
							</div>
							<h6 class="tx-13">{{mail.subject}}</h6>
							<p class="tx-12 tx-color-03 mg-b-0">{{mail.body_plain.slice(0,150)}} </p>
						</div><!-- media-body -->
					</li>
				</ul>
			
			
			
				<div v-if="loadmaoredata" class="pd-t-1 pd-b-5 pd-x-5">
					<a  class="btn btn-xs btn-block btn-light bd-0 tx-uppercase tx-10 tx-spacing-1 tx-medium mn-ht-0" v-on:click.prevent @click="loadmore">
						Load more
					</a>
				</div>

			</div><!-- mail-group-body -->

		</div><!-- mail-group -->

		<div class="mail-content">

			<div class="mail-content-header d-none">
				<a href="" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
				<div v-if="dataloaded" class="media">
					<div class="avatar avatar-sm"><img src="https://via.placeholder.com/600" class="rounded-circle" alt=""></div>
					<div class="media-body mg-l-10">
					<h6  class="mg-b-2 tx-13"> {{mail.from | mailname}} </h6>
					<span class="d-block tx-11 tx-color-03">{{mail.created_at | dateTime}}</span>
					</div><!-- media-body -->
				</div><!-- media -->
				<nav  class="nav nav-icon-only mg-l-auto">
					<a href="" data-toggle="tooltip" title="Archive" class="nav-link d-none d-sm-block"><i data-feather="archive"></i></a>
					<a href="" data-toggle="tooltip" title="Report Spam" class="nav-link d-none d-sm-block"><i data-feather="slash"></i></a>
					<a href="" data-toggle="tooltip" title="Mark Unread" class="nav-link d-none d-sm-block"><i data-feather="mail"></i></a>
					<span class="nav-divider d-none d-sm-block"></span>
					<a href="" data-toggle="tooltip" title="Mark Important" class="nav-link d-none d-sm-block"><i data-feather="star"></i></a>
					<a href="" data-toggle="tooltip" title="Trash" class="nav-link d-none d-sm-block"><i data-feather="trash"></i></a>
					<a href="" data-toggle="tooltip" title="Print" class="nav-link d-none d-sm-block"><i data-feather="printer"></i></a>
					<a href="" data-toggle="tooltip" title="Options" class="nav-link d-sm-none"><i data-feather="more-vertical"></i></a>
				</nav>
			</div><!-- mail-content-header -->

			<div v-if="dataloaded" class="mail-content-body d-none">
				<div class="pd-20 pd-lg-25 pd-xl-30">
					<h5 class="mg-b-10">{{mail.subject}}</h5>

					<!--h6 class="tx-semibold mg-b-0">Ms. Katherine Lumaad</h6-->
					<p class="tx-color-03 mg-b-0"><small>To : {{mail.to}}</small></p>
					<p v-if="mail.cc" class="tx-color-03 mg-b-0"><small>Cc : {{mail.cc}}</small></p>
					<p v-if="mail.bcc" class="tx-color-03 mg-b-0"><small>Bcc : {{mail.bcc}}</small></p>

					<div v-html="mail.body_html" class=""></div>
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

		<vue-context ref="menu">
			<template slot-scope="child" class="context-menu">
		       
	        	<li class="context-menu-list">
		            <a href="#">
		            	<i data-feather="book-open"></i> Mark Read
		            </a>
		        </li>
		        <li class="context-menu-list">
		            <a href="#">
		            	<i data-feather="book"></i> Mark Unread
		            </a>
		        </li>
		        <li class="context-menu-list">
		            <a href="#">
		            	<i data-feather="x-circle"></i> Mark Spam
		            </a>
		        </li>
		        <li class="context-menu-list">
		            <a href="#">
		            	<i data-feather="trash"></i> Mark Trash
		            </a>
		        </li>
		      
	        </template>
	    </vue-context>
		
    </div><!-- mail-wrapper -->

</template>

<script type="text/javascript">

	import { VueContext } from 'vue-context';

	export default{
		components: {VueContext},
		data(){
			return{
				filter:'',
				email:'',
				user:{},
				nmails:[],
				mails:[],
				mail:'',
				limit: 5,
				count:5,
				dataloaded:false,
				loadmaoredata:true
			}
		},
		computed:{
			mailbody(){
				return 20;
			},
			maildata(){
				const start = 0,
						end = this.limit;
				return this.mails.slice(start, end);
			}
		},
		watch:{
			dataloaded(){
				//console.log(this.mails[0])
				this.mail = this.mails[0]
			}
		},
		methods:{
			viewmail:function(mail){
				console.log(mail.subject)
				this.mail = mail
				//this.$emit('mailclick', mail)
				
				new PerfectScrollbar('.mail-content-body', {
					suppressScrollX: true
				});

				// reply form
				var quill = new Quill('#editor-container', {
					modules: {
					toolbar: '#toolbar-container'
					},
					placeholder: 'Compose an epic...',
					theme: 'snow'
				});

				// removing previous selected item
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
			loadmore(){
				this.limit+=this.count
				if(this.maildata.length >= this.mails.length){
					this.loadmaoredata = false
				}
				//console.log('load more')
				//console.log(this.maildata)
			},
			sortmail(){
				this.mails = this.mails.reverse();
				console.log('Sort mail')
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

<style lang="scss"  Scoped>

.context-menu-list{
	a{
		i{
			font-size: 12px !important;
		}
	}
}
</style>