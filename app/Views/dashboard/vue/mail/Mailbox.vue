<template>

	<div class="mail-wrapper">

		<div class="mail-sidebar">
			<div class="mail-sidebar-body">

				<div class="pd-20">
					<button id="mailComposeBtn" class="btn btn-primary btn-block tx-uppercase tx-10 tx-medium tx-sans tx-spacing-4">Compose</button>
				</div>

				<div class="pd-b-10 pd-x-10">
					<nav class="nav nav-sidebar tx-13">
						<a href="" class="nav-link" v-bind:class="{ 'active': mbox == 'inbox' }" v-on:click.prevent @click="mboxview('inbox')">
							<i data-feather="inbox"></i> <span>Inbox</span> <span class="badge">{{inbunread}}</span>
						</a>
						<a href="" class="nav-link" v-bind:class="{ 'active': mbox == 'important' }" v-on:click.prevent @click="mboxview('important')">
							<i data-feather="star"></i> <span>Important</span> 
						</a>
						<a href="" class="nav-link" v-bind:class="{ 'active': mbox == 'sent' }" v-on:click.prevent @click="mboxview('sent')">
							<i data-feather="send"></i> <span>Sent Mail</span> 
						</a>
						<a href="" class="nav-link" v-bind:class="{ 'active': mbox == 'draft' }" v-on:click.prevent @click="mboxview('draft')">
							<i data-feather="file"></i> <span>Drafts</span> <span class="badge">{{draft}}</span>
						</a>
						<a href="" class="nav-link" v-bind:class="{ 'active': mbox == 'spam' }" v-on:click.prevent @click="mboxview('spam')">
							<i data-feather="slash"></i> <span>Spam</span>
						</a>
						<a href="" class="nav-link" v-bind:class="{ 'active': mbox == 'trash' }" v-on:click.prevent @click="mboxview('trash')">
							<i data-feather="trash"></i> <span>Trash</span>
						</a>
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

					<div>
						<span class="tx-uppercase  mg-b-0">{{mbox}} <span v-if="mails.length > 0 ">({{mails.length}})</span></span>
						
						<span class="pd-x-20" v-if="mbox == 'inbox'">
							<a href="" class="mg-x-3" v-on:click.prevent @click="allmail">All</a>
							<a href="" class="mg-x-3" v-on:click.prevent @click="unread">Unread</a>
						</span>
					</div>
					

					<a v-if="mbox == 'trash'" href="#" v-on:click.prevent @click="emptytrash">
						<i data-feather="trash-2"></i>Empty Trash
					</a>
					 
					<div class="dropdown tx-13">
					<span class="tx-color-03">Sort:</span> 
					<a href="#" class="dropdown-link link-02" v-on:click.prevent @click="sortmail" >
						Date
					</a>
					</div><!-- dropdown -->
				</div>

				
				<ul class="list-unstyled media-list mg-b-0">
					<li v-for="mail in maildata" v-bind:key="mail.id" class="media" v-bind:class="mail.status" @click="viewmail(mail)" @contextmenu.prevent="$refs.menu.open($event,mail.id)" >
						<avatar :fullname="mail.from | mailname"></avatar>
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
			
			
			
				<div v-if="mails.length > limit" class="pd-t-1 pd-b-5 pd-x-5">
					<a href="#"  class="btn btn-xs btn-block btn-light bd-0 tx-uppercase tx-10 tx-spacing-1 tx-medium mn-ht-0" v-on:click.prevent @click="loadmore">
						Load more
					</a>
				</div>

			</div><!-- mail-group-body -->

		</div><!-- mail-group -->

		<div class="mail-content">

			<div class="mail-content-header d-none">
				<a href="" id="mailContentClose" class="link-02 d-none d-lg-block d-xl-none mg-r-20"><i data-feather="arrow-left"></i></a>
				<div v-if="dataloaded" class="media">
					<avatar :fullname="mail.from | mailname"></avatar>
					<div class="media-body mg-l-10">
					<h6  class="mg-b-2 tx-13"> {{mail.from | mailname}} </h6>
					<span class="d-block tx-11 tx-color-03">{{mail.created_at | dateTime}}</span>
					</div><!-- media-body -->
				</div><!-- media -->
				<nav  class="nav nav-icon-only mg-l-auto">
					<a href="" data-toggle="tooltip" title="Report Spam" class="nav-link d-none d-sm-block">
						<i data-feather="slash"></i>
					</a>
					<a href="" data-toggle="tooltip" title="Mark Unread" class="nav-link d-none d-sm-block" v-on:click.prevent @click="markmail(mail.id,'unread')">
						<i data-feather="mail"></i>
					</a>
					<span class="nav-divider d-none d-sm-block"></span>
					<a href="#" data-toggle="tooltip" title="Mark Important" class="nav-link d-none d-sm-block" v-bind:class="{important:mail.label == 'important'}" v-on:click.prevent @click="markmail(mail.id,'important')">
						<i data-feather="star"></i>
					</a>
					<a href="" data-toggle="tooltip" title="Trash" class="nav-link d-none d-sm-block">
						<i data-feather="trash"></i>
					</a>
					<a href="" data-toggle="tooltip" title="Print" class="nav-link d-none d-sm-block">
						<i data-feather="printer"></i>
					</a>
					<a href="" data-toggle="tooltip" title="Options" class="nav-link d-sm-none">
						<i data-feather="more-vertical"></i>
					</a>
				</nav>
			</div><!-- mail-content-header -->

			<div v-if="dataloaded" class="mail-content-body d-none">

				<div class="pd-20 pd-lg-25 pd-xl-30">
					<h5 class="mg-b-10">{{mail.subject}}</h5>
					<!--h6 class="tx-semibold mg-b-0">Ms. Katherine Lumaad</h6-->
					<p class="tx-color-03 mg-b-0"><small>To : {{mail.to}}</small></p>
					<p v-if="mail.cc" class="tx-color-03 mg-b-0"><small>Cc : {{mail.cc}}</small></p>
					<p v-if="mail.bcc" class="tx-color-03 mg-b-0"><small>Bcc : {{mail.bcc}}</small></p>
					<div v-html="mailbody" class=""></div>

					<nav  class="nav nav-icon-only mg-l-auto">
						<a href="" data-toggle="tooltip" title="Reply" class="nav-link" v-on:click.prevent @click="mailreply('sender')">
							<i class="fa fa-reply" aria-hidden="true"></i> Reply
						</a>
						<a href="" data-toggle="tooltip" title="Reply All" class="nav-link" v-on:click.prevent @click="mailreply('all')">					
							<i class="fa fa-reply-all" aria-hidden="true"></i> Reply All
						</a>
					</nav>


				</div>



				<div v-if="reply  || replyall " class="pd-20 pd-lg-25 pd-xl-30 pd-t-0-f">
					
              		<input type="text" class="form-control mb-2" placeholder="To">
           
					<editor :height="'200'"  @input="quill"></editor>
					
					<div class="tx-13 mg-t-15 mg-sm-t-0 mt-2" >
						<button class="btn btn-primary mt-20" @click="sendMail">Send</button>
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
				mbox:'inbox',
				email:'',
				user:{},
				nmails:[],
				mails:[],
				mail:'',
				limit: 10,
				count:10,
				dataloaded:false,
				loadmaoredata:true,
				reply:false,
				replyall:false,
				editorvalue:''
			}
		},
		computed:{
			mailbody(){
				if(this.mail.body_html == null){
					return this.mail.body_plain;
				}else{
					return this.mail.body_html;
				}
				
			},
			maildata(){
				const start = 0,
						end = this.limit;
				return this.mails.slice(start, end);
			},
			inbunread(){
				return this.nmails.filter(value => value.label === 'inbox' && value.status === 'unread').length
			},
			draft(){
				return this.nmails.filter(value => value.label === 'draft').length
			}

		},
		watch:{
			dataloaded(){
				//console.log(this.mails[0])
				this.mail = this.mails[0]
			}
		},
		methods:{
			getmails(){
				NProgress.start();
				axios.get('mail/create',{params:{filter:this.filter,email:this.user.email}})
					.then((response) => {
						console.log(response.data)
						this.nmails = response.data
						this.mails = this.nmails.filter(value => value.label === this.mbox)


						if(this.mails.length > 0){				
							this.dataloaded = true
							this.mail = this.mails[0]
						}
						NProgress.done();
						//this.mail = this.mails[0]
						//this.mails=response.data
						//this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === 'inbox')
						//this.dataloaded = true
					})
				.catch((error) => console.log(error))
			},
			viewmail:function(mail){

				NProgress.start();
				
					this.mail = mail
					
					console.log(mail.id)
					this.markmail(mail.id,'read')

					new PerfectScrollbar('.mail-content-body', {
						suppressScrollX: true
					});

					// reply form
				

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

				NProgress.done();
			},
			mboxview(mbox){
				
				console.log(mbox)
				this.mbox = mbox
				this.getmails();

				if(mbox == 'inbox'){
					this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === mbox)
				}
				if(mbox == 'important'){
					this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === mbox)
				}
				if(mbox == 'sent'){
					this.mails = this.nmails.filter(value => value.type === 'outbound' && value.label === mbox)
				}
				if(mbox == 'draft'){
					this.mails = this.nmails.filter(value => value.type === 'outbound' && value.label === mbox)
				}
				if(mbox == 'spam'){
					this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === mbox)
				}
				if(mbox == 'trash'){
					this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === mbox)
				}
				
			
				
			},
			loadmore(){
				this.limit+=this.count
				if(this.maildata.length >= this.mails.length){
					this.loadmaoredata = false
				}
			},
			sortmail(){
				this.mails = this.mails.reverse();
				console.log('Sort mail')
			},
			markmail(id,type){
				console.log('Mail id-'+ id + ' Type-'+type)
				NProgress.start();
				axios.get('mail/markmail',{params:{id:id,type:type}})
					.then((response) => {
						console.log(response.data)
						this.nmails = response.data
						this.mails = this.nmails.filter(value => value.label === this.mbox)


						if(this.mails.length > 0){				
							this.dataloaded = true
						}
						
					})
					.catch((error) => console.log(error))
					NProgress.done();
			},
			emptytrash(){
				console.log('Empty Trash')
			},
			allmail(){
				this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === 'inbox')
			},
			unread(){
				this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === 'inbox'  && value.status === 'unread')
			},
			mailreply(type){
				if(type == 'sender'){
					this.reply = true
					this.replyall = false
				}else{
					this.replyall = true
					this.reply = false
				}
			},
			sendMail(){
				console.log('Send Mail')
			},
			quill(e){
				this.editorvalue = e
				//console.log(e)
			}
		},
		mounted(){
			this.getmails()
			
			setTimeout( function(){
				$(".select2").select2();
			},1000);
			
			$('.select2').select2({
				placeholder: 'Choose one',
				searchInputPlaceholder: 'Search options'
			});
		},
		
	};

</script>

<style lang="scss"  Scoped>

.context-menu{
	.context-menu-list{
		a{
			font-size: 12px !important;
		}
	}
}

.important{
	color: orange !important;
}

.nav-link svg{
	color:  #1b2e4b;
	width: 16px;
    height: 16px;
    margin-right: 5px;
    fill: rgba(0, 23, 55, 0.08);
      //display: none;
}
</style>