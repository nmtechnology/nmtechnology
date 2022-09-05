$(document).ready(function(){

	/**
	 * jQuery Validate Function
	 *
	 * This function provides front-end validation for your form.
	 * If all tests set up here pass, the form data is AJAX submitted
	 * to the mailer.php file.
	 *
	 * Update this file as needed for your form.
	 * All ids and name values must match up to your form here.
	 *
	 * @author Patrick Leyba <pleyba4@cnm.edu>
	 **/

	/* begin validate function here */
	$("#recap-button").validate({

		// setup handling of form errors
		debug: true,
		errorClass: "alert alert-danger",
		errorLabelContainer: "#output-area",
		errorElement: "div",

		// rules here define what is good or bad input
		// each rule starts with the form input element's NAME attribute
		rules: {
			button: {
				required: true
			},
		},

		// error messages to display to the end user when rules above don't pass
		messages: {
			name: {
				required: "Please complete recaptcha to proceed to NM Technology site!"
			},
		},

		// AJAX submit the form data to back end if rules pass
		submitHandler: function(form) {
			$("#recap-button").ajaxSubmit({

				type: "POST",
				url: $("#validate").attr("action"),

				success: function(ajaxOutput) {
					// clear the output area's formatting
					$("#output-area").css("display", "");

					// write the server's reply to the output area
					$("#output-area").html(ajaxOutput);

					// reset the form if it was successful
					if($(".alert-success").length >= 1) {
						$("#submit")[0].enable();
					}
				}
			})
		}

	});/* end validate function here */

});/*end document.ready()*/
