
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
  timer: 5000
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


//Select 2
import Multiselect from 'vue-multiselect'
Vue.component('multiselect', Multiselect)

import vueMultiSelect from 'vue-multi-select'
//import 'vue-multi-select/dist/lib/vue-multi-select.min.css'


//Posts
//Vue.component('posts', require('./components/post/PostLists.vue'));
//Vue.component('editposts', require('./components/post/EditPostModal.vue'));

//=======================Client Management==================================//

//Contacts
Vue.component('subscription', require('./contacts/Subscriptions.vue'));
Vue.component('inquiry', require('./contacts/Inquiry.vue'));
Vue.component('inquiryview', require('./contacts/Inquiry_view.vue'));


//Service
Vue.component('services', require('./client/service/services.vue'));
Vue.component('newservice', require('./client/service/newservice.vue'));
Vue.component('editservice', require('./client/service/editservice.vue'));

//Client
Vue.component('clients', require('./client/client/clients.vue'));
Vue.component('newclient', require('./client/client/newclient.vue'));
Vue.component('editclient', require('./client/client/editclient.vue'));


//INVOICE
Vue.component('invoice', require('./client/invoice/invoice.vue'));
Vue.component('newinvoice', require('./client/invoice/newinvoice.vue'));
Vue.component('viewinvoice', require('./client/invoice/viewinvoice.vue'));
Vue.component('editinvoice', require('./client/invoice/editinvoice.vue'));



//Quotation
Vue.component('quotation', require('./client/quotation/quotations.vue'));
Vue.component('newquotation', require('./client/quotation/newquotation.vue'));
Vue.component('viewquotation', require('./client/quotation/viewquotation.vue'));
Vue.component('editquotation', require('./client/quotation/editquotation.vue'));

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
Vue.component('profilesetting', require('./profile/profilesetting.vue'));
Vue.component('passwordchange', require('./profile/passwordchange.vue'));

//Access Management
Vue.component('permission', require('./access management/permission/Permission.vue'));
Vue.component('newpermission', require('./access management/permission/newpermission.vue'));
Vue.component('editpermission', require('./access management/permission/editpermission.vue'));
Vue.component('users', require('./access management/user/Users.vue'));
Vue.component('newuser', require('./access management/user/NewUser.vue'));


//Analytics
Vue.component('googleanalytics', require('./analytics/GoogleAnalytics.vue'));
Vue.component('topcountries', require('./analytics/TopCountries.vue'));
Vue.component('topbrowser', require('./analytics/TopBrowser.vue'));
Vue.component('visitor', require('./analytics/Visitors.vue'));
Vue.component('referrer', require('./analytics/Referrer.vue'));
Vue.component('mobiletraffic', require('./analytics/MobileTraffic.vue'));
Vue.component('trafficsource', require('./analytics/TrafficSource.vue'));


//Filter
Vue.component('search', require('./Filter.vue'));
Vue.component('vuepagination', require('./vuepagination'));

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

