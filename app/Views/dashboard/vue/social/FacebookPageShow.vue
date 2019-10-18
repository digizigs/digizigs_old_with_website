<template>
	<div class="modal fade" id="modal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel3"  aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
	    <div class="modal-content tx-14">

	      <div class="modal-header">
	        <h6 class="modal-title" id="exampleModalLabel3">
	        	{{page.page_name}}

				<span class="tx-12 tx-color-03 info ml-20"><i class="fa fa-thumbs-up" aria-hidden="true"></i>{{page.page_likes}} Likes</span>
	        </h6>
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	      </div>

	      <div class="modal-body">
	        <div class="cover-image">
	        	<img :src=page.cover_photo class="card-img-top img-thumbnail" alt="" style="height:300px;">
	        </div>

	
			<div class="media-body">

				<div class="timeline-group tx-13">
					<div v-for="post in page.page_posts" v-bind:key="post.id" class="timeline-item">
						<div class="timeline-time">{{post.created_on.date | dateTime}}</div>
						<div class="timeline-body">

						<p>{{post.message}}</p>

						<a href="" class="d-block wd-lg-50p">
							<img v-if="post.image_url.full_picture" :src=post.image_url.full_picture class="img-fluid" alt="" style="height:300px;">
						</a>
						</div><!-- timeline-body -->
					</div><!-- timeline-item -->
				</div><!-- timeline-group -->

          	</div>

	      </div>

	     

	    </div>
	  </div>
	</div>
</template>

<script type="text/javascript">
	export default{
		props:['page'],
		data(){
			return{
				search:''
			}
		},
		watch:{

		},
		methods:{
		
		},
		created(){
		
		}
	};

</script>

<style lang="scss" Scoped>
.cover-image{
	margin-bottom: 20px;
	img{
		object-fit: cover;
	}
}

.modal-title .info{
	margin-left: 10px;
}

.media{
	margin-bottom: 10px;
}
</style>