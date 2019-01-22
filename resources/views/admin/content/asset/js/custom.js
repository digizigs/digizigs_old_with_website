$(document).ready(function(){

	
	window.setTimeout(function() {;
	    $("#successMessage").fadeTo(500, 0).slideUp(500, function(){
	        $(this).remove(); 
	    });
	}, 2000);



	//New post image upload
	

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

	$('.del').click(function(){
		alert('Delete clicked');
	});
    /*$(document).on("change",".uploadFile", function()
    {

    	var uploadFile = $(this);
        var files = !!this.files ? this.files : [];

        if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
 
        if (/^image/.test( files[0].type)){ // only image file
            var reader = new FileReader(); // instance of the FileReader

            reader.readAsDataURL(files[0]); // read the local file
 
            reader.onloadend = function(){ // set image data as background of div
                alert(uploadFile.closest(".upimage").find('.imagePreview').length);
				uploadFile.closest(".imgUp").find('#imagePreview').css("background-image", "url("+this.result+")");
            }
        }
      
    });*/

});