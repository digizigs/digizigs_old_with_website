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
				<li :class="{ 'active': filter == 'inbox' }" @click="inboxview('inbox')">
					<a href="#"><i class="fa fa-inbox"></i> Inbox <span class="label label-danger pull-right">2</span></a>
				</li>
				<li :class="{ 'active': filter == 'sent' }" @click="inboxview('sent')">
					<a href="#"><i class="fa fa-envelope-o"></i> Sent Mail</a>
				</li>
				<li :class="{ 'active': filter == 'important' }" @click="inboxview('important')">
					<a href="#"><i class="fa fa-bookmark-o"></i> Important</a>
				</li>
				<li :class="{ 'active': filter == 'draft' }" @click="inboxview('draft')">
					<a href="#"><i class=" fa fa-external-link"></i> Drafts <span class="label label-info pull-right">30</span></a>
				</li>
				<li :class="{ 'active': filter == 'trash' }" @click="inboxview('trash')">
					<a href="#"><i class=" fa fa-trash-o"></i> Trash</a>
				</li>
				<li :class="{ 'active': filter == 'spam' }" @click="inboxview('spam')">
					<a href="#"><i class=" fa fa-ban"></i> Spam </a>
				</li>
			</ul>

			<!-- Labels>
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
			</ul-->		

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
							<li><a href="#" v-on:click.prevent @click="markmail('unread')"><i class="fa fa-pencil"></i> Mark as Unread</a></li>
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

				

				<table v-if="mails.data" class="table table-inbox table-hover">
					
					<tbody>
						<tr v-for="(mail,index) in mails.data" v-bind:class="mail.status" @contextmenu.prevent="$refs.menu.open($event,mail.id)">
							<td class="inbox-small-cells">
								<input type="checkbox" class="mail-checkbox" @click="selectmail(mail.id)">
							</td>
							<td class="inbox-small-cells">
								<i v-if="mail.starred == 1"class="fa fa-star active" @click="markstar(mail.id)"></i>
								<i v-else class="fa fa-star" @click="markstar(mail.id)"></i>
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

			</div>
		</aside>

		<div id="modal">
			<compose></compose>
			<viewmail :mail="mail"></viewmail>
		</div>

		
		<vue-context ref="menu">
			<template slot-scope="child" class="context-menu">
		       
	        	<li class="context-menu-list">
		            <a href="#" @click.prevent="onClick($event.target.innerText, child.data)">
		            	Mark Read
		            </a>
		        </li>
		        <li>
		            <a href="#" @click.prevent="onClick($event.target.innerText, child.data)">Mark Unread</a>
		        </li>
		 
	        </template>
	    </vue-context>

	</div>
</template>

<script type="text/javascript">

	import { VueContext } from 'vue-context';
	
	export default{
		data(){
			return{
				filter:'inbox',
				dataloaded:false,
				mails:{},
				mail:{},
				selectedmail:[],
				options:[{"name": "option-1" },{"name": "option-2" },{"name": "option-3" }]
			}
		},
		watch:{

		},
		components: {VueContext},
		methods:{
			paginationdata(page){
				if (typeof page === 'undefined'){
					page=1;
				}
				NProgress.start();
				axios.get('mails/create?page=' + page,{params:{filter:this.filter}})
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
				axios.get('mails/markread/'+mail.id+'/edit',{params:{filter:this.filter}})
				.then((response) => {
						this.mails = response.data
					})
				.catch((error) => console.log(error))
			},
			markstar(id){
				NProgress.start();
				axios.get('mails/markstar/'+id+'/edit',{params:{filter:this.filter}})
					.then((response) => {
							this.mails = response.data
						})
					.catch((error) => console.log(error))
					NProgress.done();
			},
			markmail(type){
				console.log(type + this.selectedmail)
			},
			movemail(type){
				console.log(type + this.selectedmail)
			},
			refreshmail(){
				this.paginationdata()
			},
			inboxview(type){
				console.log(type)
				this.filter = type
				this.paginationdata()
			},
			selectmail(id){
				this.selectedmail.push(id)
				console.log(this.selectedmail)
			},
			onClick (text, data) {
                //alert(`You clicked "${text}"!`);
                console.log(`You clicked "${text}"! ` + data);
            }
			
		},
		created(){
			
			this.paginationdata()
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

	.active{
		//color: #01A9DB !important;
		//font-weight: 600;
	}
	
	.vue-simple-context-menu {
	  	//top: 500px;
        //left: 0;
        margin: 0;
        padding: 0;
        display: none;
        list-style: none;
        position: absolute;
        z-index: 1000000;
        background-color: $light-grey;
        border-bottom-width: 0px;
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", "Roboto", "Oxygen", "Ubuntu", "Cantarell", "Fira Sans", "Droid Sans", "Helvetica Neue", sans-serif;
        box-shadow: 0 3px 6px 0 rgba($black, 0.2);
        border-radius: 4px;

        &--active {
            display: block;
        }

        &__item {
            display: flex;
            color: $black;
            cursor: pointer;
            padding: 5px 15px;
            align-items: center;

            &:hover {
                background-color: $blue;
                color: $white;
            }
        }

        // Have to use the element so we can make use of `first-of-type` and
        // `last-of-type`
        li {
            &:first-of-type {
                margin-top: 4px;
            }

            &:last-of-type {
                margin-bottom: 4px;
            }
        }

        .context-menu{
        	
        		a{
        			background-color:#ECF0F1 !important;
        		}
        	
        }
	}
</style>