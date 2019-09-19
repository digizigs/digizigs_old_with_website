
//Page-Sidebar menu  active link
var CURRENT_URL = window.location.href.split('#')[0].split('?')[0];
$('.nav-aside').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');

//Top Menu Active class
$('.top-navbar').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');
$('.top-navbar').find('a[href="' + CURRENT_URL + '"]').parents('ul').closest('li').addClass('active');

