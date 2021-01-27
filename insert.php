<?php

require_once('connection.php');

if ($_SERVER['REQUEST_METHOD']=="POST") {

	if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['gender'])  && isset($_POST['hobbies']) &&  isset($_POST['password']) && isset($_FILES['image']['tmp_name'])){

		$fn=$_POST['firstname'];
		$ln=$_POST['lastname'];
		$email=$_POST['email'];
		$con=$_POST['contact'];
		$add=$_POST['address'];
		$city=$_POST['city'];
		$gen=$_POST['gender'];
		$hob=$_POST['hobbies'];
		$pass=$_POST['password'];
		$image=$_FILES['image']['name'];
		$hobbi="";
		 foreach ($hob as $chk1) {
		 	$hobbi .= $chk1." ";
		}
		$exp_image_name=explode(".",$image);
		$new_image_name = $exp_image_name[0].uniqid().'.'.$exp_image_name[1];

		move_uploaded_file($_FILES['image']['tmp_name'],'photos/'.$new_image_name);

 //
		if ($fn!='' && $ln!='' && $email!='' && $con!='' && $add!='' && $city!='' && $gen!=''  &&  $hobbi!='' && $pass!='') {

			$insert = "INSERT INTO `user`
			(`firstname`, `lastname`, `email`, `contact`, `address`, `gender`, `hobbies`, `city`, `image`, `password`) 
			VALUES 
			('".$fn."','".$ln."','".$email."','".$con."','".$add."','".$gen."','".$hobbi."','".$city."','".$new_image_name."','".$pass."')";

			// echo $insert;
			// $die;

			$result=mysqli_query($conn,$insert);

							
				header('location:select.php');

			

		}
		else{echo "null value";}

	}
	else
		{echo "isset(var)";}

}
else
{
	echo "method";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>insert</title>
	<script type="text/javascript" src="jquery.js"></script>

	<script type="text/javascript" src="script.js"></script>

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<form method="POST" enctype="multipart/form-data" class="box" id="registration_form">

		<h1>Insert</h1>

		<label>First Name :</label>  
		<input type="text" name="firstname" id="form_firstname">
		<span  style="color: red;" id="firstname_error_message"></span><br><br>

		<label>Last Name :</label>
		<input type="text" name="lastname" id="form_lastname">
		<span  style="color: red;" id="lastname_error_message"></span><br><br>

		<label>Email :</label>
		<input type="text" name="email" id="form_email">
		<span   style="color: red;" id="email_error_message"></span><br><br>

		<label>Contact No :</label>
		<input type="text" name="contact" maxlength="10" id="form_contact">
		<span  style="color: red;" id="contact_error_message"></span><br><br>

		<label>Address :</label>
		<input type="text" name="address" id="form_address">
		<span  style="color: red;" id="address_error_message"></span><br><br>
		
		<label>Gender :</label>
		<input type="radio" name="gender" id="form_gender_male" value="male">Male
		<input type="radio" name="gender" id="form_gender_female" value="female">Female
		<span  style="color: red;" id="gender_error_massage"></span><br><br>
<br>          
<br>
		<label>Hobbies :</label>
		<input type="checkbox" name="hobbies[]" value="cricket" id ="form_hobbies">Cricket
		<input type="checkbox" name="hobbies[]" value="hoccy" id ="form_hobbies" >Hoccy
		<br>
	&nbsp; &nbsp; &nbsp;	<input type="checkbox" name="hobbies[]" value="hollyball" id ="form_hobbies">Hollyball
		<input type="checkbox" name="hobbies[]" value="tennis" id ="form_hobbies" >Tennis
		<span  style="color: red;" id="hobbies_error_massage"></span>
<br>         
<br>
		<label>City :</label>
		<select name="city">
			<option value="Ahmedabad">Ahmedabad</option>
			<option value="Surat">Surat</option>
			<option value="Jamnagar">Jamnagar</option>
		</select>		
<br>
<br>
        <label>Image :</label>
<br>
		<input type="file" name="image" id="image">
<br>		
<br>
        <label>Password :</label>
		<input type="password" name="password" id="form_password">
		<span style="color: red;" id="password_error_message"></span>

		<br>
<!-- ((\+*)((0[ -]+)*|(91 )*)(\d{12}+|\d{10}+))|\d{5}([- ]*)\d{6} -->

		<input type="submit" name="insert"  value="submit">

		



	</form>

</body>
</html>