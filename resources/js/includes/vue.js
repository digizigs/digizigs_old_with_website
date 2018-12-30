

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
	{ path: '/subscriptions', component: require('../components/admin/subscription/Subscriptions.vue') }
];


const router = new VueRouter({
	mode: 'history',
	routes
})


//--------------------------------App----------------------------------------


//--------------------------------Admin----------------------------------------
Vue.component('category', require('../components/admin/category/Category.vue'));
Vue.component('editcategory', require('../components/admin/category/EditCategory.vue'));
Vue.component('newpost', require('../components/admin/post/NewPost.vue'));
Vue.component('subscriptions', require('../components/admin/subscription/Subscriptions.vue'));

//Access Controll
Vue.component('roles', require('../components/admin/accesscontroll/Roles.vue'));
Vue.component('addroles', require('../components/admin/accesscontroll/AddRole.vue'));
Vue.component('permissions', require('../components/admin/accesscontroll/Permissions.vue'));
Vue.component('users', require('../components/admin/accesscontroll/Users.vue'));


const app = new Vue({
    el: '#app',
    router,
});

//Filters
//vue.filter('upFirstText',function(text){
	//return text.charAt(0).toUpperCase() + text.slice(1)
//})

Vue.filter('myDate',function(created){
  return moment(created, "YYYYMMDD").fromNow();
})