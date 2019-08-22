<template>
	<div  role="dialog" tabindex="-1" id="viewmail" class="modal right fade w80" style="display: none;">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button aria-hidden="true" data-dismiss="modal" class="close" type="button" @click="modalclose">×</button>
					<h4 class="modal-title">{{mail.subject}}</h4>
				</div>
				<div class="modal-body">

					<div v-if="this.view == true" class="mail-view">
												
						<div class="col-md-10">
							
							<h6 class="">{{mailSenderName(mail.from)}}</h6>
							<h6>From:<span class="">{{mailSenderEmail(mail.from)}}</span></h6>
							<h6>To:<span class="">{{mail.to}}</span></h6>
							<h6 v-if="mail.cc">Cc:- {{mail.cc}}</h6>
							<h6 v-if="mail.cc">Bcc:- {{mail.bcc}}</h6>
							<h6>Date:- {{ mail.created_at }}</h6>
								
						</div>
						<div class="col-md-2">
							<span class="message-response pull-right">
								<a href="" data-toggle="tooltip" data-placement="bottom" title="Reply" v-on:click.prevent @click="msgAction('reply')">
									<i  class="fa fa-reply"></i>
								</a>
								<a href="" data-toggle="tooltip" data-placement="bottom" title="Reply all" v-on:click.prevent @click="msgAction('replyall')">
									<i  class="fa fa-reply-all"></i>
								</a>
								<a href="" data-toggle="tooltip" data-placement="bottom" title="Forward" v-on:click.prevent @click="msgAction('forward')">
									<i  class="fa fa-share"></i>
								</a>
							</span>
						</div>		
						
						<div v-html="mail.body_html" class="col-md-12 col-xs-12 mail-body"></div>
					
						
						<!--div class="col-md-12">
							<a href="" class="btn btn-dark btn-sm"><i  class="fa fa-reply"></i> Reply</a>
							<a href="" class="btn btn-dark btn-sm"><i  class="fa fa-reply-all"></i> Reply All</a>
							<a href="" class="btn btn-dark btn-sm"><i  class="fa fa-share"></i> Forward</a>
						</div-->
					
					</div>
					
					<div v-if="this.view == false" class="mail-reply">

						<multiselect class="form-control"	v-model="tovalue" 
	                                    tag-placeholder="Press enter to add email" 
	                                    placeholder="Select or Add email(s)" 
	                                    label="email"
	                                    track-by="id"
	                                    openDirection="bottom"                                      
	                                    :options="tags" 
	                                    :multiple="true" 
	                                    :taggable="true" 
	                                    @tag="addTag">    
	                    </multiselect>

	                    <multiselect v-if="ccinput == true" 	v-model="ccvalue" 
	                                    tag-placeholder="Press enter to add email" 
	                                    placeholder="Select or Add email(s)" 
	                                    label="email"
	                                    track-by="id"
	                                    openDirection="bottom"                                      
	                                    :options="tags" 
	                                    :multiple="true" 
	                                    :taggable="true" 
	                                    @tag="addTag">    
	                    </multiselect>

	                    <multiselect v-if="bccvalue==true"	v-model="bccvalue" 
	                                    tag-placeholder="Press enter to add email" 
	                                    placeholder="Select or Add email(s)" 
	                                    label="email"
	                                    track-by="id"
	                                    openDirection="bottom"                                      
	                                    :options="tags" 
	                                    :multiple="true" 
	                                    :taggable="true" 
	                                    @tag="addTag">    
	                    </multiselect>

	                    <a href="" v-on:click.prevent @click="ccclick">Cc</a>
	                    <a href="">Bcc</a>
	             

	                    <div class="msg-editor">
							<textarea class="form-control col-xs-12 email-textarea" name="" id="" cols="30" rows="15"></textarea>
						</div>

						

							<div v-if="this.reply == true"class="msg-header">

								



								

							</div>
							<div v-if="this.replyall == true"class="msg-header">
								<h6 class="">To :{{mailSenderName(mail.from)}} {{mailSenderEmail(mail.from)}}</h6>
								<h6 class="">Cc :{{mailSenderEmail(mail.cc)}}</h6>
							</div>

							
							
							<div class="msg-action">
								<a href="" class="btn btn-dark btn-sm">Attachment</a>
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
				replyall:false,
				forward:false,
				ccinput:false,
				bccinput:false,
				tovalue: [],
				ccvalue:[],
				bccvalue:[],
            	tags: []
			}
		},
		watch:{
			
		},
		computed:{

		},
		methods:{
			msgAction(type){
				if(type == 'reply'){
					this.reply = true
					this.view = false
					this.msgReply()
				}
				if(type == 'replyall'){
					this.replyall = true
					this.view = false
				}
				if(type == 'forward'){
					this.forward = true
					this.view = false
				}
				$("[data-toggle='tooltip']").tooltip('hide');
			},
			msgReply(){
				this.tovalue.push({"email":this.mail.from})
				this.tags.push({"email":this.mail.from})
			},
			modalclose(){
				this.view = true
				this.reply = false
				this.forward = false
				this.value = []
			},
			mailSenderName(email){
				if(email){
					var frm = email.split('<')[0];
  				return frm;
				}
			},
			mailSenderEmail(email){
				if(email){
					var frm = email.split('<').pop().split('>')[0];
  					return frm;
				}
			},
			myChangeEvent(val){
            	console.log(val);
	        },
	        mySelectEvent({id, text}){
	            console.log({id, text})
	        },
	        addTag (newTag) {
		     	const tag = {
		        	email: newTag,
		        	//code: newTag.substring(0, 2) + Math.floor((Math.random() * 10000000))
		     	}
		      	this.tags.push(tag)
		      	this.value.push(tag)
		    },
		    ccclick(){
		    	console.log('cc show click')
		    	this.ccinput=true
		    }
		},
		created(){
		
		}
	};

</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
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
	
	.modal-body{
		padding-bottom: 20px !important;
	}

	.multiselect{
	    padding:0 !important;
	    border: 1px solid #ddd;
	    box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.07);
	    background-color: #fff;
	    color: #32373c;
	    outline: none;
	    transition: 0.05s border-color ease-in-out;
	    font-size: 12px;
	    .multiselect__tags{
	      font-size: 12px;
	      border:none;
	      //border-bottom: 1px solid #e8e8e8;
	      border-radius:2px;

	    }
	    .multiselect__content-wrapper{
	      .multiselect__content{
	        .multiselect__element{
	          .multiselect__option{
	            font-size: 12px !important;
	          }
	        }
	      }
	    }
	  }

	
</style>