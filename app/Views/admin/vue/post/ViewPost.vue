<template>
	<div class="modal right w80 fade" id="viewpost" role="dialog">
      <div class="modal-dialog modal-md" role="document">
        <div class="modal-content white">

        	<!--Modal Header-->
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" @click="modalclose">&times;</button>
            <h4 class="modal-title" id="defaultModalLabel">
              {{post.title}}
            </h4>

          </div>
          <!--Modal Header-->
          
          <!--Modal Body-->
          <div class="modal-body white">
            <div class="row">
            
            
              <div v-if="post.user" class="mb5">
                <b>Author:</b>
                {{post.user.name}}
              </div>

              <div v-if="post.categories !='' " class="mb5">
                <b>Categories:</b>
                <span v-for="category in post.categories" class="label label-info">
                  
                  {{category.name}}
                  
                </span>
              </div>

              <div v-if="post.tags !=''" class="mb5">
                <b>Tags:</b>
                <span v-for="tag in post.tags" class="label label-success">
                  {{tag.name}}
                </span>
              </div>
              
              <div class="post-description mb5">{{post.description}}</div>

              <span v-if="post.image_url !== null" class="post-image">
                <span class="col-md-10 col-md-offset-1 mt20">
                  <img :src="post.image_url" class="img-responsive" alt="Cinque Terre">
                </span>
              </span>

              <div v-html="post.body" class="col-md-12 col-xs-12 post-body mt20">
                
              </div>
            

            </div>






          </div>
          <!--Modal Body-->
        
        </div>
      </div>
       

  </div>
</template>

<script type="text/javascript">
	export default{
    props:['post'],
		data(){
			return{
			
			}
		},
    watch:{
      post(){
        console.log(this.post.body)
      }
    },
		methods:{
			modalclose(){

			},
      editpost(){
        this.editpost = post
      },
      refreshRecord(){

      }
		},
		mounted(){
		  
		}
	};

</script>

<style type="text/css" Scoped>
  .row{
    padding: 0px 15px !important;
  }
  .modal-title{
    font-weight: 700 !important;
    color: #008EC2 !important;
  }
  .post-description{
    font-size: 13px;
    font-weight: bold;
  
  }
  .post-image{
    
  }

  .post-body{
   
  }
  
  .label{
    margin-left: 5px;
  }

  .mb5{
    margin-bottom: 5px;
  }
  .mt20{
    margin-top: 20px;
  }
</style>