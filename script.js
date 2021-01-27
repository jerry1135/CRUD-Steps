$(function() {

	$("#firstname_error_message").hide();
	$("#lastname_error_message").hide();
	$("#password_error_message").hide();
	// $("#retype_password_error_message").hide();
	$("#email_error_message").hide();
	$("#contact_error_message").hide();
	$("#address_error_message").hide();
	// $("#gender_error_message").hide();
	// $("#hobbies_error_message").hide();

	var error_firstname = false;
	var error_lastname = false;
	var error_password = false;
	// var error_retype_password = false;
	var error_email = false;
	var error_contact = false;
	var error_address = false;
	// var error_gender = false;
	// var error_hobbies = false;

	$("#form_firstname").focusout(function() {

		check_firstname();
		
	});

	$("#form_lastname").focusout(function() {

		check_lastname();
		
	});

	$("#form_password").focusout(function() {

		check_password();
		
	});

	// $("#form_retype_password").focusout(function() {

	// 	check_retype_password();
		
	// });

	$("#form_email").focusout(function() {

		check_email();
		
	});

	$("#form_contact").focusout(function() {

		check_contact();
		
	});

	$("#form_address").focusout(function() {

		check_address();
		
	});

	// $("#form_gender_male").focusout(function() {

	// 	check_genderm();
		
	// });

	// $("#form_gender_female").focusout(function() {

	// 	check_genderf();
		
	// });

	// $("#form_hobbies").focusout(function() {

	// 	check_hobbies();
		
	// });


	function check_firstname() {
	
		var firstname_length = $("#form_firstname").val().length;
		
		if(firstname_length < 3 || firstname_length > 20) {
			$("#firstname_error_message").html("Should be between 3-20 characters");
			$("#firstname_error_message").show();
			error_firstname = true;
		} else {
			$("#firstname_error_message").hide();
		}
	
	}

	function check_lastname() {
	
		var lastname_length = $("#form_lastname").val().length;
		
		if(lastname_length < 4 || lastname_length > 20) {
			$("#lastname_error_message").html("Should be between 4-20 characters");
			$("#lastname_error_message").show();
			error_lastname = true;
		} else {
			$("#lastname_error_message").hide();
		}
	
	}

	function check_password() {
	
		var password_length = $("#form_password").val().length;
		
		if(password_length < 8) {
			$("#password_error_message").html("At least 8 characters");
			$("#password_error_message").show();
			error_password = true;
		} else {
			$("#password_error_message").hide();
		}
	
	}

	// function check_retype_password() {
	
	// 	var password = $("#form_password").val();
	// 	var retype_password = $("#form_retype_password").val();
		
	// 	if(password !=  retype_password) {
	// 		$("#retype_password_error_message").html("Passwords don't match");
	// 		$("#retype_password_error_message").show();
	// 		error_retype_password = true;
	// 	} else {
	// 		$("#retype_password_error_message").hide();
	// 	}
	
	// }

	function check_email() {

		var pattern = new RegExp(/^[+a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/i);
	
		if(pattern.test($("#form_email").val())) {
			$("#email_error_message").hide();
		} else {
			$("#email_error_message").html("Invalid email address");
			$("#email_error_message").show();
			error_email = true;
		}
	
	}

	function check_contact() {

       var pattern = $("#form_contact").val();
	  
	   var pattern = new RegExp(((\+*)((0[ -]+)*|(91 )*)(\d{12}+|\d{10}+))|\d{5}([- ]*)\d{6});
	
		if(pattern.test($('#form_contact').val())) {
			$("#contact_error_message").hide();
		} else {
			$("#contact_error_message").html("Invalid Contact No");
			$("#contact_error_message").show();
			error_contact = true;
		}
	
	}


	function check_address() {
	
		var address_length = $("#form_address").val().length;
		
		if(address_length < 10 || address_length > 200) {
			$("#address_error_message").html("Should be between 10-200 characters");
			$("#address_error_message").show();
			error_address = true;
		} else {
			$("#address_error_message").hide();
		}
	
	}

// 		function check_genderm() {
	
// 		var genderm = $("#form_gender_male").val();
// 		// var genderf = $("#form_gender_female").val();
		
// 		if(genderm.checked==false ) {

// 			alert("You Must Select Male or Female  ")
// 			// $("#gender_error_message").html("Select The Gender ");
// 			// $("#gender_error_message").show();
// 			// error_gender = true;
// 		} else {
// 			$("#gender_error_message").hide();
// 		}
	
// 	}


// function check_hobbies() {
	
// 		// var hobbies_length = $("#form_hobbies").val().length;
		
// 		if($('.form_hobbies:checkbox:checked').length == 0) {
// 			$("#hobbies_error_message").html("Should be between 10-200 characters");
// 			$("#hobbies_error_message").show();
// 			error_hobbies = true;
// 		} else {
// 			$("#hobbies_error_message").hide();
// 		}
	
// 	}



	// function check_hobbies() {
	
	// 	var hobbies_length = $("#form_hobbies").val().length;
		
	// 	if(hobbies_length < 0 || hobbies_length > 10) {
	// 		$("#hobbies_error_message").html("Should be between 10-200 characters");
	// 		$("#hobbies_error_message").show();
	// 		error_hobbies = true;
	// 	} else {
	// 		$("#hobbies_error_message").hide();
	// 	}
	
	// }



	$("#registration_form").submit(function() {
											
		error_firstname = false;
		error_lastname = false;
		error_password = false;
		// error_retype_password = false;
		error_email = false;
		error_contact = false;
		error_address = false;
		// error_gender = false;
		// error_hobbies = false;
											
		check_firstname();
		check_lastname();
		check_password();
		// check_retype_password();
		check_email();
		// check_contact();
		check_address();
		// check_genderm();
		// check_hobbies();
		// && error_retype_password == false  &&  error_gender == false &&  error_hobbies == false  && error_contact == false 
		if(error_firstname == false && error_lastname == false && error_password == false  && error_email == false 
			&&  error_address == false) {
			return true;
		} else {
			return false;	
		}

	});

});