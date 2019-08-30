import moment from 'moment'
import Vue from 'vue'

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)


const Foo = { template: '<div>foo</div>' }
const Bar = { template: '<div>bar</div>' }


let routes = [
	{ path: '/foo', component: Foo },
    { path: '/bar', component: Bar }
];


const router = new VueRouter({
	mode: 'history',
	routes
})

const app = new Vue({
    el: '#vueapp',
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
 
 
 
 });