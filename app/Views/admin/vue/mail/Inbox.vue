<template>
	<div class="mail-box">

		<div class="row">
			<div class="col-md-2 col-xs-12">
				adadad
			</div>
			<div class="col-md-10 col-xs-12">
				adadad
			</div>
		</div>

		<aside class="sm-side col-md-4 col-xs-12">
			
			<div class="inbox-body">
				<a href="#composemail" data-toggle="modal"  title="Compose"    class="btn btn-compose btn-sm">
					Compose
				</a>				
			</div>
			<ul class="inbox-nav inbox-divider">
				<li class="active">
					<a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>

				</li>
				<li>
					<a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
				</li>
				<li>
					<a href="#"><i class="fa fa-bookmark-o"></i> Important</a>
				</li>
				<li>
					<a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
				</li>
				<li>
					<a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
				</li>
				<li>
					<a href="#"><i class=" fa fa-ban"></i> Spam</a>
				</li>
				
			</ul>
			<ul class="inbox-nav inbox-divider">

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
					<div class="chk-all">
						<input type="checkbox" class="mail-checkbox mail-group-checkbox">
						<div class="btn-group">
							<a data-toggle="dropdown" href="#" class="btn mini all" aria-expanded="false">
								All
								<i class="fa fa-angle-down "></i>
							</a>
							<ul class="dropdown-menu">
								<li><a href="#"> None</a></li>
								<li><a href="#"> Read</a></li>
								<li><a href="#"> Unread</a></li>
							</ul>
						</div>
					</div>

					<div class="btn-group">
						<a data-original-title="Refresh" data-placement="top" data-toggle="dropdown" href="#" class="btn mini tooltips">
							<i class=" fa fa-refresh"></i>
						</a>
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

					<ul class="unstyled inbox-pagination">
						<li><span>1-50 of 234</span></li>
						<li>
							<a class="np-btn" href="#"><i class="fa fa-angle-left  pagination-left"></i></a>
						</li>
						<li>
							<a class="np-btn" href="#"><i class="fa fa-angle-right pagination-right"></i></a>
						</li>
					</ul>
				</div>
				<table class="table table-inbox table-hover">
					<tbody>
					
					
						<tr v-for="mail in mails" v-bind:class="mail.status">
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
								{{mail.subject}}
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
				mails:{},
				mail:{}
			}
		},
		watch:{

		},
		methods:{
			viewmail(mail){
				this.mail = mail
				axios.get('mails/markread/'+mail.id+'/edit')
				.then((response) => {
						console.log(response)
						this.mails = response.data
						//this.categories = response.data.categories
                  		//this.tags = response.data.tags
					})
				.catch((error) => console.log(error))
			}
		},
		created(){
			axios.get('mails/create')
				.then((response) => {
						console.log(response.data)
						this.mails=response.data
						//this.categories = response.data.categories
                  		//this.tags = response.data.tags
					})
				.catch((error) => console.log(error))
		}
	};

</script>

<style type="text/css" Scoped>


</style>