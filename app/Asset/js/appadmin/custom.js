

$(".pcoded-item").on('click', function(e) {
	var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
	$SIDEBAR_MENU = $('#sidebar');

	$SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');

	//alert(CURRENT_URL);

})

var CURRENT_URL = window.location.href.split('#')[0].split('?')[0],
	$SIDEBAR_MENU = $('#sidebar');
	$SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');
	$SIDEBAR_MENU.find('a[href="' + CURRENT_URL + '"]').parents('.pcoded-hasmenu').addClass('pcoded-trigger');
	//alert($SIDEBAR_MENU);