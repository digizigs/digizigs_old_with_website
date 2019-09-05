import moment from 'moment'
import Vue from 'vue'

window.Vue = require('vue');

import VueRouter from 'vue-router'
Vue.use(VueRouter)


const Foo = { template: '<div>foo</div>' }
const Bar = { template: '<div>bar</div>' }

//Mail Box
Vue.component('mailbox', require('./mail/Mailbox.vue'));
Vue.component('mail-compose', require('./mail/MailCompose.vue'));
Vue.component('mail-content', require('./mail/MailContent.vue'));
Vue.component('mailbox-group', require('./mail/MailboxGroup.vue'));
Vue.component('mailbox-sidebar', require('./mail/MailboxSidebar.vue'));



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


 Vue.filter('vueDate',function(created){
    return moment(created).format('DD-MM-YYYY');
  })
  
  Vue.filter('vueAgoTime',function(created){
    if(created){
      return moment(created).calendar();
    }
  })
  
  Vue.filter('vueMoment',function(created){
    return moment(created).fromNow();
  })
  Vue.filter('vueDay',function(created){
    return moment(created).format("MMM Do");    
  })
  
  Vue.filter('mailname',function(from){
    var frm = from.split('<')[0];
    var someStr = frm;
    return someStr.replace(/['"]+/g, '');
  })
  Vue.filter('mailSenderName',function(from){
    var frm = from.split('<')[0];
    return frm;
  })
  Vue.filter('mailSenderEmail',function(from){
    var frm = str.split('<').pop().split('>')[0];
    return from;
  })
  
  Vue.filter('removeuotation',function(subject){
    var someStr = subject;
    return someStr.replace(/['"]+/g, '');
  })