<template>
	<section class="contact ">

		<div class="main-content-header box-shadow box-header box">
	        <div class="row">
	    	              
	          <div class="col-md-6 col-xs-12 mp-0 alt-font">
	            <i class="fa fa-telegram"></i><span> Inquiry</span>
	          </div>
	          	  	         
	        </div>
	    </div>
		
		
		<div class="main-content-body box-shadow box">
      
	        <div class="row"> 
				
				<!-- /.info-box -->
	          	<div class="col-md-6 col-sm-6 col-xs-12">

		            <div class="info-box bg-aqua">
		              <span class="info-box-icon"><i class="fa fa-telegram"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">New Inquiry</span>
		                <span class="info-box-number">{{totalsubs}}</span>

		                <div class="progress">
		                  <div class="progress-bar" style="width: 100%"></div>
		                </div>
		                    <span class="progress-description">
		                      
		                    </span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>	            
	          	</div><!-- /.info-box -->

	          	
	          	<!-- /.info-box -->
	          	<div class="col-md-6 col-sm-6 col-xs-12">

		            <div class="info-box bg-aqua">
		              <span class="info-box-icon"><i class="fa fa-telegram"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">Total Inquiry</span>
		                <span class="info-box-number">41,410</span>

		                <div class="progress">
		                  <div class="progress-bar" style="width: 50%"></div>
		                </div>
		                    <span class="progress-description">
		                      70% Increase in 30 Days
		                    </span>
		              </div>
		              <!-- /.info-box-content -->
		            </div>	            
	          	</div><!-- /.info-box -->


				<!--Data table-->
				<div class="col-xs-12">
			        <div class="">
			            <div class="box-header">
			              <h3 class="box-title"></h3>

			              <div class="box-tools">
			                <div class="input-group input-group-sm" >
			                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

			                  <div class="input-group-btn">
			                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
			                  </div>
			                </div>
			              </div>

			            </div>
			            <!-- /.box-header -->
			            <div class="box-body table-responsive no-padding">
			              <table class="table table-hover">
			                <tbody><tr>
			                  <th>ID</th>
			                  <th>Name</th>
			                  <th>Email</th>
			                  <th>Contact No.</th>
			                  <th>Contact Date</th>
			                  <th></th>
			                  <th></th>
			                </tr>
			                <tr v-for="cont,key in contacts">
			                  	<td>{{key + 1}}</td>
			                  	<td>{{cont.name}}</td>
			                  	<td>{{cont.email}}</td>
			                  	<td>{{cont.contact}}</td>
			                  	<td>{{cont.created_at | myDate}}</td>
			                  	<td>
			                  		<a href="#viewcontacts" data-toggle="modal" @click="contactview(cont.id)">
			                  			<i class="fa fa-eye" aria-hidden="true"></i>	
			                  		</a>	
			                  	</td>
			                  
			                </tr>
			                
			              </tbody></table>
			            </div>
			            <!-- /.box-body -->
			          </div>
			          <!-- /.box -->
			        </div>

	       
	        </div>

	    </div>


	 	<div id="modal">	
	 		<contactview :recrd="contact"></contactview>
	 	</div>

	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				contacts:{},
				contact:'',
				success:'',
				errors:'',
			}
		},
		computed: {
			totalsubs:function(total,cont){
				//return 50;
				//return cont+ ;//this.responseData && this.responseData.length
				//return this.subscriptions.length;

            	
			}
		},
		watch:{

		},
		methods:{
			contactview(id){
				axios.get('inquiry/'+id)
				.then((response) => {
					this.contact=response.data
					})//this.apntupdate = response.data
				.catch(error => this.errors=error.response.data.errors);	
			},
			userdata(id){
				axios.get('contact/show',id)
				.then((response) => {
					this.userdetail=response.data
					})//this.apntupdate = response.data
				.catch(error => this.errors=error.response.data.errors);			
			}
		
		},
		created(){
			axios.get('inquiry/create')
			.then((response) => {
				this.contacts=response.data
				//console.log(response.data)
			})//this.appointments=response.data
			.catch((error) => console.log(error))
		
		}
	};

</script>

<style type="text/css" Scoped>
	.fa-check{
		cursor: pointer;
		color: #00a65a;
		font-size: 18px;
	}
	.fa-times{
		cursor: pointer;
		color: #ff5c5c;
		font-size: 18px;
	}

	.fa-envelope-o{
		cursor: pointer;
	}

	.table{
		margin-top: 20px;	
	}
	.modal-content{
		border-radius: 3px !important;
	}

</style>