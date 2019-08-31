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
					<a href="#"> Inbox <span v-if="this.unreadinbox > 0">({{unreadinbox}})</span></a>
				</li>
				<li :class="{ 'active': filter == 'sent' }" @click="inboxview('sent')">
					<a href="#"> Sent Mail</a>
				</li>
				<li :class="{ 'active': filter == 'important' }" @click="inboxview('important')">
					<a href="#"> Important</a>
				</li>
				<li :class="{ 'active': filter == 'draft' }" @click="inboxview('draft')">
					<a href="#"> Drafts <span v-if="this.draft > 0">({{draft}})</span></a>
				</li>
				<li :class="{ 'active': filter == 'trash' }" @click="inboxview('trash')">
					<a href="#"> Trash</a>
				</li>
				<li :class="{ 'active': filter == 'spam' }" @click="inboxview('spam')">
					<a href="#"> Spam </a>
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
					
					<!--div class='mail-box'>
						<table>
							<tr>
							<td class='blank-cell'>  </td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk1'>
								<label for='chk1'></label>
								<input type='checkbox' class='mail-star' id='star1'>
								<label for='star1'></label>
								<input type='checkbox' class='mail-important' id='im1'>
								<label for='im1'></label>
							</td>
							<td class='mail-sender'>Sit salutatus</td>
							<td class='mail-title'> libris repudiandae</td>
							<td class='mail-time'>02:33 pm</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk2'>
								<label for='chk2'></label>
								<input type='checkbox' class='mail-star' id='star2'>
								<label for='star2'></label>
								<input type='checkbox' class='mail-important' id='im2'>
								<label for='im2'></label>
							</td>
							<td class='mail-sender'>Pinterest Weekly</td>
							<td class='mail-title'>Fresh Pins for you!</td>
							<td class='mail-time'>11:09 am</td>
							</tr>
							<tr class='unread'>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk3'>
								<label for='chk3'></label>
								<input type='checkbox' class='mail-star' id='star3'>
								<label for='star3'></label>
								<input type='checkbox' class='mail-important' id='im3'>
								<label for='im3'></label>
							</td>
							<td class='mail-sender'>Amy Lee</td>
							<td class='mail-title'>mea praesent vituperata</td>
							<td class='mail-time'>10:27 am</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk4'>
								<label for='chk4'></label>
								<input type='checkbox' class='mail-star' id='star4'>
								<label for='star4'></label>
								<input type='checkbox' class='mail-important' id='im4'>
								<label for='im4'></label>
							</td>
							<td class='mail-sender'>June, me(2)</td>
							<td class='mail-title'>Blood Test</td>
							<td class='mail-time'>7:30 am</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk5'>
								<label for='chk5'></label>
								<input type='checkbox' class='mail-star' id='star5'>
								<label for='star5'></label>
								<input type='checkbox' class='mail-important' id='im5'>
								<label for='im5'></label>
							</td>
							<td class='mail-sender'>fierent</td>
							<td class='mail-title'>Your Order</td>
							<td class='mail-time'>7:02 am</td>
							</tr>
							<tr  class='unread'>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk6'>
								<label for='chk6'></label>
								<input type='checkbox' class='mail-star' id='star6'>
								<label for='star6'></label>
								<input type='checkbox' class='mail-important' id='im6'>
								<label for='im6'></label>
							</td>
							<td class='mail-sender'>Agam </td>
							<td class='mail-title'> copiosae quo in, te vix eligendi</td>
							<td class='mail-time'>5:28 am</td>
							</tr>
							<tr class='unread'>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk7'>
								<label for='chk7'></label>
								<input type='checkbox' class='mail-star' id='star7'>
								<label for='star7'></label>
								<input type='checkbox' class='mail-important' id='im7'>
								<label for='im7'></label>
							</td>
							<td class='mail-sender'>Mei eu</td>
							<td class='mail-title'>Issue #101</td>
							<td class='mail-time'>Apr 18</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk8'>
								<label for='chk8'></label>
								<input type='checkbox' class='mail-star' id='star8'>
								<label for='star8'></label>
								<input type='checkbox' class='mail-important' id='im8'>
								<label for='im8'></label>
							</td>
							<td class='mail-sender'>fierent</td>
							<td class='mail-title'>Your Order</td>
							<td class='mail-time'>Apr 17</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk9'>
								<label for='chk9'></label>
								<input type='checkbox' class='mail-star' id='star9'>
								<label for='star9'></label>
								<input type='checkbox' class='mail-important' id='im9'>
								<label for='im9'></label>
							</td>
							<td class='mail-sender'>HTML5 Weekly</td>
							<td class='mail-title'>This Week's HTML5 and Browser Technology News</td>
							<td class='mail-time'>Apr 17</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk10'>
								<label for='chk10'></label>
								<input type='checkbox' class='mail-star' id='star10'>
								<label for='star10'></label>
								<input type='checkbox' class='mail-important' id='im10'>
								<label for='im10'></label>
							</td>
							<td class='mail-sender'>fierent</td>
							<td class='mail-title'>ea has ludus audiam</td>
							<td class='mail-time'>Apr 17</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk11'>
								<label for='chk11'></label>
								<input type='checkbox' class='mail-star' id='star11'>
								<label for='star11'></label>
								<input type='checkbox' class='mail-important' id='im11'>
								<label for='im11'></label>
							</td>
							<td class='mail-sender'>ne nam</td>
							<td class='mail-title'>Qui tritani accumsan!</td>
							<td class='mail-time'>Apr 17</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk12'>
								<label for='chk12'></label>
								<input type='checkbox' class='mail-star' id='star12'>
								<label for='star12'></label>
								<input type='checkbox' class='mail-important' id='im12'>
								<label for='im12'></label>
							</td>
							<td class='mail-sender'>fierent</td>
							<td class='mail-title'>mea laoreet maluisse</td>
							<td class='mail-time'>Apr 15</td>
							</tr>
							<tr class='unread'>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk13'>
								<label for='chk13'></label>
								<input type='checkbox' class='mail-star' id='star13'>
								<label for='star13'></label>
								<input type='checkbox' class='mail-important' id='im13'>
								<label for='im13'></label>
							</td>
							<td class='mail-sender'>fierent</td>
							<td class='mail-title'>ferri ridens mei ad</td>
							<td class='mail-time'>Apr 14</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk14'>
								<label for='chk14'></label>
								<input type='checkbox' class='mail-star' id='star14'>
								<label for='star14'></label>
								<input type='checkbox' class='mail-important' id='im14'>
								<label for='im14'></label>
							</td>
							<td class='mail-sender'>eu agam</td>
							<td class='mail-title'>modus id nam</td>
							<td class='mail-time'>Apr 14</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk15'>
								<label for='chk15'></label>
								<input type='checkbox' class='mail-star' id='star15'>
								<label for='star15'></label>
								<input type='checkbox' class='mail-important' id='im15'>
								<label for='im15'></label>
							</td>
							<td class='mail-sender'>fierent</td>
							<td class='mail-title'>Lorem ipsum dolor</td>
							<td class='mail-time'>Apr 12</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk16'>
								<label for='chk16'></label>
								<input type='checkbox' class='mail-star' id='star16'>
								<label for='star16'></label>
								<input type='checkbox' class='mail-important' id='im16'>
								<label for='im16'></label>
							</td>
							<td class='mail-sender'>Agam </td>
							<td class='mail-title'>labitur accusam officiis</td>
							<td class='mail-time'>Apr 10</td>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk17'>
								<label for='chk17'></label>
								<input type='checkbox' class='mail-star' id='star17'>
								<label for='star17'></label>
								<input type='checkbox' class='mail-important' id='im17'>
								<label for='im17'></label>
							</td>
							<td class='mail-sender'>sit amet</td>
							<td class='mail-title'>Ut alia viris</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk18'>
								<label for='chk18'></label>
								<input type='checkbox' class='mail-star' id='star18'>
								<label for='star18'></label>
								<input type='checkbox' class='mail-important' id='im18'>
								<label for='im18'></label>
							</td>
							<td class='mail-sender'>salutandi </td>
							<td class='mail-title'>copiosae quo in, te vix eligendi</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk19'>
								<label for='chk19'></label>
								<input type='checkbox' class='mail-star' id='star19'>
								<label for='star19'></label>
								<input type='checkbox' class='mail-important' id='im19'>
								<label for='im19'></label>
							</td>
							<td class='mail-sender'>salutandi </td>
							<td class='mail-title'>complectitur et vi</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk20'>
								<label for='chk20'></label>
								<input type='checkbox' class='mail-star' id='star20'>
								<label for='star20'></label>
								<input type='checkbox' class='mail-important' id='im20'>
								<label for='im20'></label>
							</td>
							<td class='mail-sender'>salutandi </td>
							<td class='mail-title'>dolorem iudicabit democritum?</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk21'>
								<label for='chk21'></label>
								<input type='checkbox' class='mail-star' id='star21'>
								<label for='star21'></label>
								<input type='checkbox' class='mail-important' id='im21'>
								<label for='im21'></label>
							</td>
							<td class='mail-sender'>detracto in me</td>
							<td class='mail-title'>praesent eu, liber dicant?</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr class='unread'>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk22'>
								<label for='chk22'></label>
								<input type='checkbox' class='mail-star' id='star22'>
								<label for='star22'></label>
								<input type='checkbox' class='mail-important' id='im22'>
								<label for='im22'></label>
							</td>
							<td class='mail-sender'>salutandi </td>
							<td class='mail-title'>Et scaevola phaedrum gloriatur</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk23'>
								<label for='chk23'></label>
								<input type='checkbox' class='mail-star' id='star23'>
								<label for='star23'></label>
								<input type='checkbox' class='mail-important' id='im23'>
								<label for='im23'></label>
							</td>
							<td class='mail-sender'>salutandi </td>
							<td class='mail-title'>Do you know XXX, XXX or XXX?</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk24'>
								<label for='chk24'></label>
								<input type='checkbox' class='mail-star' id='star24'>
								<label for='star24'></label>
								<input type='checkbox' class='mail-important' id='im24'>
								<label for='im24'></label>
							</td>
							<td class='mail-sender'>salutandi </td>
							<td class='mail-title'>Ullum ludus reformidans</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk25'>
								<label for='chk25'></label>
								<input type='checkbox' class='mail-star' id='star25'>
								<label for='star25'></label>
								<input type='checkbox' class='mail-important' id='im25'>
								<label for='im25'></label>
							</td>
							<td class='mail-sender'>salutandi </td>
							<td class='mail-title'>sensibus temporibus</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr class='unread'>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk26'>
								<label for='chk26'></label>
								<input type='checkbox' class='mail-star' id='star26'>
								<label for='star26'></label>
								<input type='checkbox' class='mail-important' id='im26'>
								<label for='im26'></label>
							</td>
							<td class='mail-sender'>doctus ne</td>
							<td class='mail-title'>mel te quod</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk27'>
								<label for='chk27'></label>
								<input type='checkbox' class='mail-star' id='star27'>
								<label for='star27'></label>
								<input type='checkbox' class='mail-important' id='im27'>
								<label for='im27'></label>
							</td>
							<td class='mail-sender'>salutandi </td>
							<td class='mail-title'>Duo habeo congue</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
							<tr>
							<td class='blank-cell'></td>
							<td class='mail-labels'>
								<input type='checkbox' class='mail-check' id='chk28'>
								<label for='chk28'></label>
								<input type='checkbox' class='mail-star' id='star28'>
								<label for='star28'></label>
								<input type='checkbox' class='mail-important' id='im28'>
								<label for='im28'></label>
							</td>
							<td class='mail-sender'>omittantur</td>
							<td class='mail-title'>Quidam expetenda in ius</td>
							<td class='mail-time'>Apr 10</td>
							</tr>
						</table>
						<br><br><br><br><br><br>
					</div-->

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

				<!--div v-else class="no-mail-msg"> No Mail to view </div-->

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
	import TableComponent from 'vue-table-component';
	TableComponent.settings({
		tableClass: 'tableclass',
		theadClass: '',
		tbodyClass: '',
		filterPlaceholder: 'Filter mail data',
		filterNoResults: 'There are no matching rows',
	});
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
			rowclk(){
				console.log('row click')
			},
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