<?php
require_once('connection.php');
$invalid='';
if ($_SERVER['REQUEST_METHOD']=='POST') {

	if (isset($_POST['email']) && isset($_POST['password'])) {

          $email = $_POST['email'];
          $password = $_POST['password'];


		if ($email!='' && $password!='') {

			$login = "SELECT * FROM `user` WHERE `email`='".$email."' AND `password`='".$password."' ";

			$result=mysqli_query($conn,$login);
            if (mysqli_num_rows($result)==1) {
            	$row=mysqli_fetch_array($result);

            	session_start();

            	$_SESSION['userid']=$row['userid'];
            	header('location:home.php'); 
            }
            else{
               $invalid="<span style='color:red';> Invalid Email & Password</span>";
            }
			
			
		}
	}
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>login</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<script type="text/javascript" src="jquery.js"></script>

	<script type="text/javascript">
		$(function() {

	
	$("#password_error_message").hide();
	$("#email_error_message").hide();
	
	var error_password = false;
	var error_email = false;
	

	$("#form_password").focusout(function() {

		check_password();
		
	});


	$("#form_email").focusout(function() {

		check_email();
		
	});
   
	

	function check_password() {
	
		var password_length = $("#form_password").val().length;
		
		if(password_length < 8) {
			$("#password_error_message").html("At least 8 characters");
			$("#password_error_message").show();
			error_password = true;
		// else if(password_length = "") {
		// 	$("#password_error_message").html("Enter Password");
		// 	$("#password_error_message").show();
		// 	error_password = true;
		} else {
			$("#password_error_message").hide();
		}
	
	}

	
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





	$("#registration_form").submit(function() {
											
		 error_password = false;
		 error_email = false;
		
		check_password();
		check_email();
		 
		if( error_password == false  && error_email == false ) {
			return true;
		} else {
			return false;	
		}

	});

});

	</script>

<form class="box" id="registration_form" method="POST">
	<h1>Log in</h1>
	<label>Email</label>
	<input type="email" name="email" id="form_email" placeholder="Enter Email ">
	<span   style="color: red;" id="email_error_message"></span><br><br>

	<label>Password</label>
	<input type="Password" name="password" id="form_password" placeholder="Enter Password">
	<span style="color: red;" id="password_error_message"></span>
	<br>

	<?php echo $invalid;  ?>
<br>
<br>
	<input type="submit" name="submit" value="Log in ">
<br>
<br>
<a href="insert.php">Register</a>

</form>
</body>
</html>