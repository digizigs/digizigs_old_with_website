<template>
	<div>
        <div class="mail-group">
			<div class="mail-group-header">
				<i data-feather="search"></i>
				<div class="search-form">
				<input type="search" class="form-control" placeholder="Search mail">
				</div><!-- search-form -->
			</div><!-- mail-group-header -->
			<div class="mail-group-body">

				<!--div class="pd-y-15 pd-x-20 d-flex justify-content-between align-items-center">
					<h6 class="tx-uppercase tx-semibold mg-b-0">Inbox</h6>
					<div class="dropdown tx-13">
						<span class="tx-color-03">Sort:</span> <a href="" class="dropdown-link link-02">Date</a>
					</div>
				</div-->

				
				<ul class="list-unstyled media-list mg-b-0">

					<li v-for="mail in mails" v-bind:key="mail.id" class="media" v-bind:class="mail.status" @click="viewmail(mail)">
						<div class="avatar"><img src="https://via.placeholder.com/350" class="rounded-circle" alt=""></div>
						<div class="media-body mg-l-15">
							<div class="tx-color-03 d-flex align-items-center justify-content-between mg-b-2">
							<span class="tx-12"> {{mail.from | mailname}} </span>
							<span class="tx-11"> {{mail.created_at | vueDay}} </span>
							</div>
							<h6 class="tx-13"> {{mail.subject}} </h6>
							<p class="tx-12 tx-color-03 mg-b-0"> {{mail.body_plain.slice(0,100)}} </p>
						</div><!-- media-body -->
					</li>

				</ul>
				
				
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

		<mail-content :mail = "mail"></mail-content>


    </div>
</template>

<script type="text/javascript">
	export default{
		props:['mails'],
		data(){
			return{
				search:'',
				mail:{}
			}
		},
		watch:{

		},
		methods:{
			viewmail:function(mail){
				console.log(mail)
				this.mail = mail
				$('body').addClass('mail-content-show');
			}
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>