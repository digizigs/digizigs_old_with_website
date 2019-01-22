
import moment from 'moment'
import Vue from 'vue'

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)


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


//Posts
Vue.component('posts', require('./components/post/PostLists.vue'));
Vue.component('editposts', require('./components/post/EditPostModal.vue'));




//Posts



const app = new Vue({
    el: '#app',
    router,
});

Vue.filter('myDate',function(created){
  return moment(created).utcOffset('IST').fromNow();
})