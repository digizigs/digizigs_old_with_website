
import moment from 'moment'
import Vue from 'vue'

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueSingleSelect from "vue-single-select";

//Vue Chat scroll
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)



//Sweet Alert
import Swal from 'sweetalert2';
window.swal = Swal;
const toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000
});

const swalWithBootstrapButtons = Swal.mixin({
  confirmButtonClass: 'btn btn-success',
  cancelButtonClass: 'btn btn-danger',
  buttonsStyling: false,
})

window.toast = toast;
window.swalWithBootstrapButtons = swalWithBootstrapButtons;

let routes = [
	//{ path: '/subscriptions', component: require('../components/admin/subscription/Subscriptions.vue') }
];


const router = new VueRouter({
	mode: 'history',
	routes
})

Vue.component('vue-single-select', VueSingleSelect);

//=======================Components==================================//

//Chat
Vue.component('chat', require('./chat/chat.vue'));



const app = new Vue({
   el: '#app',
   router,

   data(){
      return{
         //fsdfsdfsdfsdfsff
         testmsg:'This is test msg',
         cat:'',

         //dasdasdasdadasdasd
      }
   },
   watch:{

   },
   methods:{
      catsubmit(){
         alert('Category submited')
      }
   },
   created(){
      console.log('vue js created')
   }



});

Vue.filter('vueDate',function(created){
  return moment(created).format('DD-MM-YYYY');
})

Vue.filter('vueTime',function(){
  return moment().calendar();
})