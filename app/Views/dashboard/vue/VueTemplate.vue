

<template>

	<div>

		<div class="filemgr-wrapper">

			<div class="filemgr-sidebar">

			    <div class="filemgr-sidebar-header d-flex">
			        <h4>Facebook Manager</h4>
			    </div>
			    
			    <div class="filemgr-sidebar-body">
			      <div class="pd-t-20 pd-b-10 pd-x-10">
			        

			        <nav class="nav nav-sidebar tx-13">
			          
			            <a href="#modal3" class="nav-link " data-toggle="modal" >
			              <i class="fa fa-file-text" aria-hidden="true"></i> <span>Menu Item</span>
			            </a>
			          
			        </nav>
			      </div>
			    </div><!-- filemgr-sidebar-body -->
			</div><!-- filemgr-sidebar -->

			
			<div class="filemgr-content">
			    <div class="filemgr-content-header">
			      <nav class="nav d-none d-sm-flex mg-l-auto">
			        <a href="" data-toggle="tooltip" title="Download" class="nav-link"><i data-feather="download"></i></a>
			        <a href=""  data-toggle="tooltip" title="Clean" class="nav-link"><i data-feather="repeat"></i></a>
			        <a href=""  data-toggle="tooltip" title="Deletse All" class="nav-link"><i data-feather="trash"></i></a>
			      </nav>
			    </div><!-- filemgr-content-header -->
			    <div class="filemgr-content-body">
			    
			      <div class="pd-10 pd-lg-10 pd-xl-10">

			      	

			        <div class="row">
			          
			           
			        </div>
			        
			      </div>
			    </div><!-- filemgr-content-body -->
			</div><!-- filemgr-content -->  

		</div><!-- filemgr-wrapper -->

		<div id="modal">
			<!-- <facebook-page :page="page"></facebook-page>
			<facebook-post-create :page="page" @postcreated="postCreated"></facebook-post-create> -->
		</div>

	</div>

		

</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				dataloaded:true,
				search:'',
				pages:[],
				page:''
			}
		},
		watch:{

		},
		methods:{
			
		},
		created(){
			/*NProgress.start();
			axios.get('facebook/create') //,{params:{filter:this.filter,email:this.user.email}}
				.then((response) => {
						this.pages = response.data
						this.dataloaded = false
						console.log(response.data)
						NProgress.done();
					})
				.catch((error) => console.log(error))*/
			
		}
	};

</script>

<style lang="scss" Scoped>
	

</style>