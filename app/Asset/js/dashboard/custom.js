
//Page-Sidebar menu  active link
var CURRENT_URL = window.location.href.split('#')[0].split('?')[0];
$('.nav-aside').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');

//Top Menu Active class
$('.top-navbar').find('a[href="' + CURRENT_URL + '"]').parent('li').addClass('active');
$('.top-navbar').find('a[href="' + CURRENT_URL + '"]').parents('ul').closest('li').addClass('active');


//New Post Feature image preview
$("#imageUpload").change(function() {

    if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
             $('.avatar-preview').css('background-image', 'url('+e.target.result +')');
             $('.avatar-preview').hide();
             $('.avatar-preview').fadeIn(650);
         }
         reader.readAsDataURL(this.files[0]);
    }
 });