<template>
	<section>
		<!--Add service-->
        <div class="modal fade" id="detailclient" role="dialog"  data-backdrop="false">
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header panel-heading">
                  <button type="button" class="close" data-dismiss="modal" >&times;</button>
                  <i class="fa fa-user-circle" aria-hidden="true"></i>
                  <h4 class="modal-title"><b>Detail Client</b></h4>
                </div>
                <div class="modal-body">
                  
                  <form  role="form" @submit.prevent="" class="form-horizontal">
                   

                
                    
                    
                    
                  </form>
                  
                  
                </div>

              
                
              </div>
            </div>
        </div>
	</section>
</template>

<script type="text/javascript">
	export default{
		data(){
			return{
				client:{clientname:'',clientemail:'',contact_name:'',contact_email:'',contact_phone:'',address:''},
				success:'',
				errors:'',
				clients:{},
			}
		},
		watch:{

		},
		methods:{
		  addclient(){
        axios.post('client',this.client)
            .then(data => {
              console.log(data);
              //this.services=response.data           
              this.$emit('recordupdated',data),
              this.success='Service added successfully'
              this.client={}
            $('#addclient').modal('hide');

            toast({
                type: 'success',
                title: 'New Client added successfully'
            })

          })
          .catch((error) => {
            this.errors=error.response.data.errors;           
          })
      }
		},
		created(){
		
		}
	};

</script>

<style type="text/css" Scoped>


</style>