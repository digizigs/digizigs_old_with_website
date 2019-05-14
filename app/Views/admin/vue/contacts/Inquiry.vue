<template>
	<section>
		<div class="">          
            <div class="row">
            	<div class="col-md-12 col-sm-12 col-xs-12">
            		<div class="x_panel">
            			<div class="x_title">	                   
		                    <h2><i class="fa fa-align-left"></i> Inquiry <small></small></h2>
		                    <div class="clearfix"></div>
		                </div>

		                <div class="x_content">
		                	<div class="panel-group pannel-line-group" id="accordion">
	                           	                           
	                           <div v-for="inq,key in inquiries.data" class="panel panel-default pannel-line">
	                              <div class="panel-heading" style="padding: 8px !important; background-color: #F2F5F7; margin: 0!important;">
	                                    
	                                   <a href="" data-toggle="collapse" data-parent="#accordion" >
	                                     Inquiry by 
	                                     <span class="title">{{inq.name}}</span> 
	                                   </a>

	                                   <span>email:-{{inq.email}}</span>

	                                   <span class="time">at {{inq.created_at | vueAgoTime }}</span>

	                                   <span class="action-text">
	                                     <a href="#inqview" data-toggle="modal" v-on:click.prevent @click="view(inq.id)">
		                                 	View
		                                 </a>  |                               
	                                      <a  href="" class="subscribe" v-on:click.prevent @click="delet(inq.id)">
		                                 	Delete
		                                 </a> 
	                                   </span>
	                                                                  
	                              </div>

	                              <div id="inq.id" class="panel-collapse collapse">
	                                <div class="panel-body" style="padding: 8px !important;">
	                                  <p>messagwe</p>  
	                                                                                                       
	                                </div>                                 
	                              </div>
	                           </div>	                           
	                          
	                        </div>
		                </div>
            		</div>
            	</div>
            </div>
        </div>
        <div id="modal">
          <inquiryview  :inqiry="inquiry"></inquiryview>
        </div>
    </section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				inquiries:{},
				inquiry:''
			}
		},
		watch:{

		},
		methods:{
			view(id){				
				axios.get('inquiry/'+id+'/edit')
			        .then((response) => {		        	
			          	this.inquiry=response.data
			          })//this.apntupdate = response.data
			        //.catch(error => this.errors=error.response.data.errors);
			},
			delet(id){
				console.log('delete')

			}
		},
		mounted(){
			axios.get('inquiry/create')
                .then((response) => {                    
                    this.inquiries = response.data;
                    //this.roles = response.data.roles
                    //console.log(response.data)
                })
		}
	};

</script>

<style type="text/css" Scoped>


</style>