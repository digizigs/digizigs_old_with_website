<template>
	<div class="mail-box">
		
		
		<aside class="sm-side col-md-4 col-xs-12" style="height:100%">
			
			<!-- Compose button -->
			<div class="inbox-body">
				<a href="#composemail" data-toggle="modal"  title="Compose"    class="btn btn-compose btn-sm">
					Compose
				</a>				
			</div>
			
			<!-- Inbox options -->
			<ul class="inbox-nav inbox-divider">
				<li :class="{ 'active': filter == 'inbox' }" @click="inboxview('inbox')">
					<a href="#"><i class="fa fa-inbox"></i> Inbox <span v-if="this.unreadinbox > 0">({{unreadinbox}})</span></a>
				</li>
				<li :class="{ 'active': filter == 'sent' }" @click="inboxview('sent')">
					<a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
				</li>
				<li :class="{ 'active': filter == 'important' }" @click="inboxview('important')">
					<a href="#"><i class="fa fa-bookmark-o"></i> Important</a>
				</li>
				<li :class="{ 'active': filter == 'draft' }" @click="inboxview('draft')">
					<a href="#"><i class=" fa fa-external-link"></i> Drafts <span v-if="this.draft > 0">({{draft}})</span></a>
				</li>
				<li :class="{ 'active': filter == 'trash' }" @click="inboxview('trash')">
					<a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
				</li>
				<li :class="{ 'active': filter == 'spam' }" @click="inboxview('spam')">
					<a href="#"><i class=" fa fa-ban"></i> Spam </a>
				</li>
			</ul>		

		</aside>

		<aside class="lg-side col-md-8 col-xs-12">
			<div class="inbox-body">

				<div class="mail-option">
										
					<div class="btn-group hidden-phone">
						<a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
							More
							<i class="fa fa-angle-down "></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-folder-open-o"></i> Mark as Read</a></li>
							<li><a href="#" v-on:click.prevent @click="markmail('unread')"><i class="fa fa-folder-o"></i> Mark as Unread</a></li>
							<li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
							<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
						</ul>
					</div>

					<div class="btn-group">
						<a data-toggle="dropdown" href="#" class="btn mini blue">
							Move to
							<i class="fa fa-angle-down "></i>
						</a>
						<ul class="dropdown-menu">
							<li @click.prevent="moveMail('inbox')">
								<a href="#">
								<i class="fa fa-pencil"></i> Inbox </a>
							</li>
							<li @click.prevent="moveMail('trash')">
								<a href="#">
								<i class="fa fa-ban"></i> Trash </a>
							</li>
							<li @click.prevent="moveMail('spam')">
								<a href="#">
								<i class="fa fa-trash-o"></i> Spam </a>
							</li>
						</ul>
					</div>

					<div class="btn-group">
						<a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" class="btn mini tooltips" v-on:click.prevent @click="refreshmail">
							<i class=" fa fa-refresh"></i>
						</a>
					</div>
									
					<div v-if="paginatedData.length > 0" class="btn-group pull-right">
						<ul>
							<li v-for="p in paginatedData" v-bind:key="p.id">
							{{p.first}} 
							{{p.last}}  
							{{p.suffix}}
							</li>
						</ul>
						<button class="pb btn btn-default" @click="prevPage" :disabled="pageNumber==0">
							<i class="fa fa-angle-left"></i>
						</button>
						
						<button class="pb btn btn-default" @click="nextPage" :disabled="pageNumber >= pageCount -1">
							<i class="fa fa-angle-right"></i>
						</button>
						
						
					</div>	
				</div>

				

				<table v-if="paginatedData.length > 0" class="table table-inbox table-hover">
					
					<tbody>
						<tr v-for="mail in paginatedData" v-bind:key="mail.id" v-bind:class="mail.status" @contextmenu.prevent="$refs.menu.open($event,mail.id)" id="mail-list">
							<td class="inbox-small-cells">
								<input type="checkbox" class="mail-checkbox" @click="selectmail(mail.id)">
							</td>
							<td class="inbox-small-cells">
								<i v-if="mail.starred == 1" class="fa fa-star active" @click="markMail(mail.id,'star')"></i>
								<i v-else class="fa fa-star" @click="markMail(mail.id,'star')"></i>
								<i v-if="mail.status == 'reply'" class="fa fa-reply"></i>
								<i v-if="mail.status == 'forward'" class="fa fa-share"></i>
							</td>
							<td class="view-message  dont-show">{{mail.from | mailname}}</td>
							<td class="view-message subject"  @click="viewmail(mail)" data-toggle="modal" data-target="#viewmail">
								{{mail.subject.slice(0,40)}}
							</td>
							<td class="view-message  inbox-small-cells">
								<i v-if="mail.attachment == 1" class="fa fa-paperclip"></i>
							</td>
							<td class="view-message  text-right">{{mail.created_at | vueDay}}</td>										
						</tr>			
					</tbody>
				</table>

				<div v-else class="no-mail-msg"> No Mail to view </div>

			</div>
		</aside>

		<div id="modal">
			<compose></compose>
			<viewmail :mail="mail"></viewmail>
		</div>

		
		<vue-context ref="menu">
			<template slot-scope="child" class="context-menu">
		       
	        	<li class="context-menu-list">
		            <a href="#" @click.prevent="onClick('read', child.data)">
		            	<i class="fa fa fa-folder-open-o"></i> Mark Read
		            </a>
		        </li>
		        <li>
		            <a href="#" @click.prevent="onClick('unread', child.data)">
		            	<i class="fa fa-folder-o"></i> Mark Unread
		            </a>
		        </li>
		        <li>
		            <a href="#" @click.prevent="onClick($event.target.innerText, child.data)">
		            	<i class="fa fa-reply"></i> Reply
		        	</a>
		        </li>
		        <li>
		            <a href="#" @click.prevent="onClick($event.target.innerText, child.data)">
		            	<i class="fa fa-reply-all"></i> Reply All
		            </a>
		        </li>
		        <li>
		            <a href="#" @click.prevent="onClick($event.target.innerText, child.data)">
		            	<i class="fa fa-share"></i> Forward
		            </a>
		        </li>
		        <li>
		            <a href="#" @click.prevent="onClick('trash', child.data)">
		            	<i class="fa fa-trash"></i> Trash
		            </a>
		        </li>
		 
	        </template>
	    </vue-context>

	</div>
</template>

<script type="text/javascript">

	import { VueContext } from 'vue-context';
	
	export default{
		props:['user'],
		components: {VueContext},
		data(){
			return{
				filter:'inbox',
				dataloaded:false,
				mails:[],
				nmails:[],
				mail:'',
				selectedmail:[],
				options:[{"name": "option-1" },{"name": "option-2" },{"name": "option-3" }],
				limit: 8,
    			busy: false,
				bottom: false,
				meta:[],
				unreadinbox:'',
				draft:'',
				pageNumber: 0
			}
		},
		watch:{
			bottom(bottom){
				if (bottom) {
					this.getMails()
					//console.log('Bottom Load more data')
				}
			},
			nmails(){
				this.unreadinbox = this.nmails.filter(value => value.status === 'unread').length
				this.draft = this.nmails.filter(value => value.label === 'draft').length
			}
		},
		computed: {
			pageCount(){
				let l = this.mails.length,
					s = this.limit;
				return Math.ceil(l/s);
			},
			paginatedData(){
				const start = this.pageNumber * this.limit,
						end = start + this.limit;
				return this.mails.slice(start, end);
			}
		},
		methods:{
			nextPage(){
				this.pageNumber++;
			},
			prevPage(){
				this.pageNumber--;
			},
			viewmail(mail){
				this.mail = mail
				if(this.mail.status == 'unread'){
					this.markMail(mail.id,'read')
				}
			},			
			markMail(id,type){
				console.log(id,type)
				NProgress.start();
				axios.get('emails/markmail/'+id+'/edit',{params:{filter:this.filter,type:type}})
					.then((response) => {
						this.nmails=response.data
						this.mails=response.data
						this.inboxview(type)
					})
					.catch((error) => console.log(error))
				NProgress.done();	
			},
			moveMail(text){

				NProgress.start();
				axios.get('emails/movemail',{params:{filter:this.filter,mailid:this.selectedmail,type:text}})
					.then((response) => {
						this.nmails=response.data
						this.mails=response.data
						console.log(response.data)
					})
					.catch((error) => console.log(error))
				NProgress.done();	
				
			},
			refreshmail(){
				this.getMails()
			},
			inboxview(type){
				
				this.filter = type
				console.log(this.filter)

				if(this.filter == 'inbox'){
					this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === 'inbox')
				}else if(this.filter == 'sent'){
					this.mails = this.nmails.filter(value => value.type === 'outbound' && value.label === 'sent')
				}else if(this.filter == 'important'){
					this.mails = this.nmails.filter(value => value.label === 'inbox' && value.starred === 1)
				} else if(this.filter == 'draft'){
					this.mails = this.nmails.filter(value => value.type === 'outbound' && value.label === 'draft')
				} else if(this.filter == 'trash'){
					this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === 'trash')
				} else if(this.filter == 'spam'){
					this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === 'spam')
				} 
				
			},
			selectmail(id){
				this.selectedmail.push(id)
			},
			onClick (text, data) {
				this.markMail(data,text)
                
            },		
			getMails(){
				NProgress.start();
				axios.get('emails/create',{params:{filter:this.filter,email:this.user.email}})
					.then((response) => {
						console.log(response.data)
						this.nmails=response.data
						this.mails=response.data
						//this.mails = this.nmails.filter(value => value.type === 'inbound' && value.label === 'inbox')
						//this.dataloaded = true
					})
				.catch((error) => console.log(error))
				NProgress.done();
			}

			
		},
		created(){	
			this.getMails();
		}
	};

</script>

<style lang="scss" Scoped>
	
	$light-grey: #ECF0F1;
    $grey: darken($light-grey, 15%);
    $blue: #007AFF;
    $white: #fff;
    $black: #333;

	.mail-group-checkbox{
		margin-top: -5px !important;
	}

	.next.active,.prev.active{
	  	display:inline-block;
	}
	.next,.prev{
		cursor: pointer;
	    color: #01A9DB;
	    font-size: 12px;
	    font-weight: 600;
	    display: none;
	}
	li.active{
		i{
			color: #01A9DB !important;
			font-weight: 600;
		}
	}
	.pb{
		color: #01A9DB !important;
		font-weight: 800 !important;
		font-size: 14px;
		margin-left: 10px !important;
		border-radius: 0 !important;
	}
	.no-mail-msg{
		height: 100%;
		text-align: center;
		vertical-align: middle;
		color: #01A9DB !important;
		font-weight: 800 !important;
		font-size: 14px;
	}
</style>