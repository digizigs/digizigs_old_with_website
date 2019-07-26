<template>
	<div  role="dialog" tabindex="-1" id="viewmail" class="modal right fade w80" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
					<h4 class="modal-title">{{mail.subject}}</h4>
				</div>
				<div class="modal-body">

					<div v-if="this.view == true" class="mail-view">
						<div class="col-md-10">
							<span class="message-header">
								<p>From:- {{mail.from}}</p>
								<p>To:- {{mail.to}}</p>
								<p v-if="mail.cc">Cc:- {{mail.cc}}</p>
								<p v-if="mail.bcc">Bcc:- {{mail.bcc}}</p>
								<p>Date:- {{mail.created_at}}</p>
							</span>
						</div>
						<div class="col-md-2">
							<span class="message-response pull-right">
								<a href="" data-toggle="tooltip" data-placement="bottom" title="Reply" v-on:click.prevent @click="msgreply">
									<i  class="fa fa-reply"></i>
								</a>
								<a href="" data-toggle="tooltip" data-placement="bottom" title="Reply all" v-on:click.prevent @click="msgreply">
									<i  class="fa fa-reply-all"></i>
								</a>
								<a href="" data-toggle="tooltip" data-placement="bottom" title="Forward">
									<i  class="fa fa-share"></i>
								</a>
							</span>
						</div>		
						
						<div v-html="mail.body_html" class="col-md-12 col-xs-12 mail-body"></div>
					</div>
					
					<div v-if="this.reply == true" class="mail-reply">
						<span class="message-header">
							<p>From:- {{mail.from}}</p>
							<p>To:- {{mail.to}}</p>
							<p v-if="mail.cc">Cc:- {{mail.cc}}</p>
							<p v-if="mail.bcc">Bcc:- {{mail.bcc}}</p>
							<p>Date:- {{mail.created_at}}</p>
						</span>
						<div class="col-md-12 col-xs-12">
							<textarea name="" id="" cols="30" rows="10">Reply</textarea>
							<a href="" class="btn btn-dark btn-sm">Send</a>
						</div>
					</div>

					<div v-if="forward == true" class="mail-forward">
						
					</div>


				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['mail'],
		data(){
			return{
				search:'',
				view:true,
				reply:false,
				forward:false,
			}
		},
		watch:{

		},
		methods:{
			msgreply(){
				this.reply = true
				this.view = false
				$("[data-toggle='tooltip']").tooltip('hide');
			}
		},
		created(){
		
		}
	};

</script>

<style lang="scss" Scoped>

	.message-response{
		a{
			margin: 0 10px;
		}
	}

	.mail-body{
		margin: 20px 0;
	}
	textarea{
		width: 100%;
		margin: 10px 0;
	}
</style>