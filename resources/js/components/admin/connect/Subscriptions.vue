<template>
	<section class="Subscriptions ">

		<div class="main-content-header box-shadow box-header box">
	        <div class="row">
	    	              
	          <div class="col-md-6 col-xs-12 mp-0 alt-font">
	            <i class="fa fa-flag-checkered"></i><span> Subscriptions</span>
	          </div>
	          	  	         
	        </div>
	    </div>
		
		
		<div class="main-content-body box-shadow box">
      
	        <div class="row"> 
				
				<!-- /.info-box -->
	          	<div class="col-md-4 col-sm-6 col-xs-12">

		            <div class="info-box bg-aqua">
		              <span class="info-box-icon"><i class="fa fa-flag-checkered"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">YTD Subscriptions</span>
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
	          	<div class="col-md-4 col-sm-6 col-xs-12">

		            <div class="info-box bg-aqua">
		              <span class="info-box-icon"><i class="fa fa-flag-checkered"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">Subscription</span>
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

	          	<!-- /.info-box -->
	          	<div class="col-md-4 col-sm-6 col-xs-12">

		            <div class="info-box bg-aqua">
		              <span class="info-box-icon"><i class="fa fa-flag-checkered"></i></span>

		              <div class="info-box-content">
		                <span class="info-box-text">Unsubscription</span>
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
			                  <th>Email</th>
			                  <th>Subscription Date</th>
			                  <th>Status</th>
			                  <th></th>
			                  <th></th>
			                </tr>
			                <tr v-for="subs,key in subscriptions">
			                  <td>{{key + 1}}</td>
			                  <td>{{subs.email}}</td>
			                  <td>{{subs.created_at | myDate}}</td>
			                  <td v-if="subs.status == '1'"><span class="label label-success" >Subscribed</span></td>
			                  <td v-if="subs.status == '0'"><span class="label label-warning" >Unsubscribed</span></td>
			                  <td v-if="subs.status == '0'"><i class="fa fa-check" aria-hidden="true"></i></td>
			                  <td v-if="subs.status == '1'"><i class="fa fa-times" aria-hidden="true"></i></td>
			                </tr>
			                
			              </tbody></table>
			            </div>
			            <!-- /.box-body -->
			          </div>
			          <!-- /.box -->
			        </div>

	       
	        </div>

	    </div>

	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				subscriptions:{},
			}
		},
		computed: {
			totalsubs:function(total,subs){
				return 50;
				//return this.subscriptions.length;

            	
			}
		},
		watch:{

		},
		methods:{
		
		},
		created(){
			axios.get('subscription/create')
			.then((response) => {
				this.subscriptions=response.data
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

</style>