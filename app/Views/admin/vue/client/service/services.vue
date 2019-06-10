<template>
<section>
   <div class="x_panel">
      
      <div class="x_title">
         <span class="panel-title">
            <i class="fa fa-align-left hidden-xs"></i>
            Services
         </span>
         <a href="#addservices" class="btn btn-dark btn-sm pull-right" data-toggle="modal">
            <i class="fa fa-plus" aria-hidden="true"></i> New Service
         </a>
         <span class="x-title-option">
            <ul>
               <li>
                  <span id="x-title-search" class="title-searchs x-title-search c">
                     <span class="search-icon"><i class="fa fa-search" aria-hidden="true"></i></span>
                     <input type="text" v-model="search">
                     <span class="close-icon" @click="closesearch"><i class="fa fa-times" aria-hidden="true"></i></span>
                  </span>
               </li>
            </ul>
            
         </span>
      </div>
      
      <div class="x_content">
         
         <div class="panel-group pannel-line-group" id="accordion">
            
            <div v-for="service,key in services.data" class="panel panel-default pannel-line">
               <div class="panel-heading">
                  <span class="title">{{service.name}}</span>
                  <span class="hidden-xs"><small><i>{{service.description}}</i></small></span>
                  <!-- Action icons -->
                  <span class="action-text subscription pull-right">
                     <a href="#editservices" v-on:click.prevent data-toggle="modal" @click="detailservice(service.id)"><i class="fa fa-eye" aria-hidden="true"></i></a>
                     |
                     <a href="" v-on:click.prevent @click="deleteservice(service.id)"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                  </span>
                  <!-- Action icons -->
               </div>
            </div>
         </div>
         
      <pagination :data="services" @pagination-change-page="paginationdata" ></pagination>
      
   </div>
</div>
<div id="modal">
   <newservice @recordupdated="refreshRecord"></newservice>
   <editservice :service="service" @recordupdated="refreshRecord" ></editservice>
   <!--quickapointment></quickapointment-->
   <!--editapointment :recrd="apntupdate" @recordupdated="refreshRecord"></editapointment-->
   <!--viewapointment></viewapointment-->
</div>
</section>
</template>
<script type="text/javascript">
Vue.component('pagination', require('laravel-vue-pagination'));
   export default{
      data(){
         return{
            services:{},
service:{},
            success:'',
            errors:'',
search:''
         }
      },
      watch:{
search:function(){
if(this.search.length >= 0){
axios.get('service/create',{params:{search_string:this.search}})
.then((response) => {
this.services=response.data
})
.catch((error) => console.log(error))
}
}
      },
      methods:{
paginationdata(page){
if (typeof page === 'undefined'){
page=1;
}
axios.get('service/create?page=' + page)
.then(response => this.services = response.data)
.catch(error => this.errors=error.response.data.errors);
},
      refreshRecord(record){
this.services=record.data;
},
closesearch(){
this.filter=''
},
detailservice(id){
axios.get('service/'+id+'/edit')
.then((response) => {
this.service=response.data
})
.catch(error => this.errors=error.response.data.errors);
},
deleteservice(id){
NProgress.start();
swalWithBootstrapButtons({
title: 'Delete Service?',
text: "You won't be able to revert this!",
type: 'warning',
showCancelButton: true,
confirmButtonText: 'Yes, delete it!',
cancelButtonText: 'No, cancel!',
reverseButtons: true
}).then((result) => {
if (result.value) {
axios.delete('service/'+id)
.then(response =>{
this.services=response.data;
this.success="Service Deleted Successfuly";
toast({
type: 'success',
title: 'Service  deleted successfully'
})
NProgress.done();
})
.catch((error) => {
console.log(response.data);
this.errors=error.response.data.errors;
this.success='';
});

}
})
}
      },
      created(){
this.paginationdata();
      }
   };
</script>
<style lang="scss" Scoped>

</style>