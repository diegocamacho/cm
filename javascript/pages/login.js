/*! ========================================================================
 * login.js
 * Page/renders: page-login.html
 * Plugins used: parsley
 * ======================================================================== */
$(function () {
    // Login form function
    // ================================
    var $form    = $("form[name=form-login]");

    // On button submit click
    $form.on("click", "button[type=submit]", function (e) {
        var $this = $(this);

        // Run parsley validation
        if ($form.parsley().validate()) {
            // Disable submit button
            $this.prop("disabled", true);

            // start nprogress bar
            

            // you can do the ajax request here
            loguea();
            // this is for demo purpose only
            /*setTimeout(function () {
                // done nprogress bar
                NProgress.done();

                // redirect user
                location.href = "index.php";
            }, 500);*/
        } else {
            // toggle animation
            $form
                .removeClass("animation animating shake")
                .addClass("animation animating shake")
                .one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function () {
                    $(this).removeClass("animation animating shake");
                });
        }
        // prevent default
        e.preventDefault();
    });
});


function loguea(){
	NProgress.start();
	var email = $('#email').val();
	var pass = $('#pass').val();

	
	$.post('ac/login.php','email='+email+'&pass='+pass,function(data) {
		if(data==1){
			window.location = 'index.php';
		}else{
			NProgress.done();
			$('#email').focus();
			$('#msg_error').html(data);
			$('#msg_error').show();
			$('.btn-success').prop("disabled", false);
			//$('#load').hide();
			//$('.btn-login').show();
		}
	});
}