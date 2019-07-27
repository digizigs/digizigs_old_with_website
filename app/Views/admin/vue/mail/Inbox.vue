<template>
	<div class="mail-box">

		
		<aside class="sm-side col-md-4 col-xs-12">
			
			<!-- Compose button -->
			<div class="inbox-body">
				<a href="#composemail" data-toggle="modal"  title="Compose"    class="btn btn-compose btn-sm">
					Compose
				</a>				
			</div>
			
			<!-- Inbox options -->
			<ul class="inbox-nav inbox-divider">
				<li :class="{ 'active': activeclass == 'inbox' }" @click="inboxview('inbox')">
					<a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>
				</li>
				<li :class="{ 'active': activeclass == 'sent' }" @click="inboxview('sent')">
					<a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
				</li>
				<li :class="{ 'active': activeclass == 'important' }" @click="inboxview('important')">
					<a href="#"><i class="fa fa-bookmark-o"></i> Important</a>
				</li>
				<li :class="{ 'active': activeclass == 'draft' }" @click="inboxview('draft')">
					<a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
				</li>
				<li :class="{ 'active': activeclass == 'trash' }" @click="inboxview('trash')">
					<a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
				</li>
				<li :class="{ 'active': activeclass == 'spam' }" @click="inboxview('spam')">
					<a href="#"><i class=" fa fa-ban"></i> Spam </a>
				</li>
			</ul>

			<!-- Labels -->
			<ul class="inbox-nav ">

				<li class="">
					<a href="#"> Work <span class="label label-danger pull-right">2</span></a>

				</li>
				<li>
					<a href="#"> Design </a>
				</li>
				<li>
					<a href="#"> Family </a>
				</li>
				<li>
					<a href="#"> Friends </a>
				</li>
				<li>
					<a href="#"> Office </a>
				</li>	
			</ul>		

		</aside>

		<aside class="lg-side col-md-8 col-xs-12">
			<div class="inbox-body">
				<div class="mail-option">
									
					
					<div class="btn-group hidden-phone">
						<a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
							All
							<i class="fa fa-angle-down "></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
							<li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
						</ul>
					</div>

					
					<div class="btn-group hidden-phone">
						<a data-toggle="dropdown" href="#" class="btn mini blue" aria-expanded="false">
							More
							<i class="fa fa-angle-down "></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
							<li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
						</ul>
					</div>
					<div class="btn-group">
						<a data-toggle="dropdown" href="#" class="btn mini blue">
							Move to
							<i class="fa fa-angle-down "></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="fa fa-pencil"></i> Mark as Read</a></li>
							<li><a href="#"><i class="fa fa-ban"></i> Spam</a></li>
							<li class="divider"></li>
							<li><a href="#"><i class="fa fa-trash-o"></i> Delete</a></li>
						</ul>
					</div>
					<div class="btn-group">
						<a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" class="btn mini tooltips" v-on:click.prevent @click="refreshmail">
							<i class=" fa fa-refresh"></i>
						</a>
					</div>

					<mailpagination :input="mails" @pagechange="paginationdata"></mailpagination>


				</div>

				

				<table class="table table-inbox table-hover">
					<tbody>
					
					
						<tr v-for="mail in mails.data" v-bind:class="mail.status">
							<td class="inbox-small-cells">
								<input type="checkbox" class="mail-checkbox">
							</td>
							<td class="inbox-small-cells">
								<i v-if="mail.status == 'reply'" class="fa fa-reply"></i>
								<i v-if="mail.status == 'forward'" class="fa fa-share"></i>
								<i class="fa fa-star"></i>
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

			</div>
		</aside>

		<div id="modal">
			<compose></compose>
			<viewmail :mail="mail"></viewmail>
		</div>

	</div>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				activeclass:'inbox',
				dataloaded:false,
				mails:{},
				mail:{},
				selectedmail:[],
			}
		},
		watch:{

		},
		methods:{
			paginationdata(page){
				if (typeof page === 'undefined'){
					page=1;
				}
				NProgress.start();
				axios.get('mails/create?page=' + page)
					.then((response) => {
						console.log(response.data)
						this.mails=response.data
						this.dataloaded = true
					})
					.catch((error) => console.log(error))
					NProgress.done();
			},
			viewmail(mail){
				this.mail = mail
				this.paginationdata()
			},
			refreshmail(){
				this.paginationdata()
			},
			inboxview(type){
				console.log(type)
				this.activeclass = type
			}
		},
		created(){
			this.paginationdata()
		}
	};

</script>

<style lan="scss" Scoped>

	.mail-group-checkbox{
		margin-top: -5px !important;
	}

	.active{
		color: #01A9DB !important;
		font-weight: 600;
	}

</style>