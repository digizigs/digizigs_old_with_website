
//window._ = require('lodash');


//try {
    //window.Popper = require('popper.js').default;    //Popper
    //window.$ = window.jQuery = require('jquery');    //Jquery
    //require('bootstrap-sass');						 // bootstrap.min
//} catch (e) {}


/*window.axios = require('axios');
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
let token = document.head.querySelector('meta[name="csrf-token"]');
if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}*/




/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo'

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     encrypted: true
// });

//Vendors
//require('../../vendor/modernizr/modernizr-2.8.3.min.js');
////require('../../vendor/magnific-popup/magnific-popup.min.js');
require('../../vendor/parallex/parallax-1.1.3.js');
//require('../../vendor/wow/wow.min.js');
//require('../../vendor/isotope/isotope.pkgd.min.js');
//require('../../vendor/owlcarousel/js/owl.carousel.min.js');

//require('../../vendor/superfish/superfish.min.js');




require('./custom');