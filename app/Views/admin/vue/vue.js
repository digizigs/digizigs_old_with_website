
import moment from 'moment'
import Vue from 'vue'

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)

import VueSingleSelect from "vue-single-select";

//V-Chat scroll
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
//Posts
//Vue.component('posts', require('./components/post/PostLists.vue'));
//Vue.component('editposts', require('./components/post/EditPostModal.vue'));

//=======================Client Management==================================//

//Service
Vue.component('services', require('./client/service/services.vue'));
Vue.component('newservice', require('./client/service/newservice.vue'));
Vue.component('editservice', require('./client/service/editservice.vue'));

//Client
Vue.component('clients', require('./client/client/clients.vue'));
Vue.component('newclient', require('./client/client/newclient.vue'));
Vue.component('editclient', require('./client/client/editclient.vue'));
Vue.component('detailclient', require('./client/client/detailclient.vue'));

//INVOICE
Vue.component('invoice', require('./client/invoice/invoice.vue'));
Vue.component('newinvoice', require('./client/invoice/new_invoice.vue'));
Vue.component('invoiceview', require('./client/invoice/invoice_view.vue'));

//Chat
Vue.component('chat-app', require('./chat/ChatApp.vue'));
Vue.component('Conversation', require('./chat/Conversation.vue'));
Vue.component('ContactsList', require('./chat/ContactsList.vue'));


//menu
Vue.component('menupage', require('./menu/menu.vue'));

//Gallery
Vue.component('gallery', require('./gallery/gallery.vue'));


//Product
Vue.component('product', require('./product/product.vue'));
Vue.component('newproduct', require('./product/new_product.vue'));

//Posts

//Category
Vue.component('category', require('./category/Category.vue'));

//Profile
Vue.component('profile', require('./profile/profile.vue'));
Vue.component('profilecard', require('./profile/profilecard.vue'));
Vue.component('aboutme', require('./profile/aboutme.vue'));
Vue.component('profilesetting', require('./profile/profilesetting.vue'));
Vue.component('passwordchange', require('./profile/passwordchange.vue'));


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

Vue.filter('vueAgoTime',function(created){
  return moment(created).calendar();
})

Vue.filter('vueMoment',function(created){
  return moment(created).fromNow();
})