<?php
require_once('connection.php');

$uid=$_GET['id'];
$select="SELECT * FROM `user` WHERE `userid`='".$uid."'";

$re=mysqli_query($conn,$select);
$row=mysqli_fetch_array($re);


$db_hobby_array=explode(' ',$row['hobbies']);

if ($_SERVER['REQUEST_METHOD']=="POST") {

	if(isset($_POST['firstname']) && isset($_POST['lastname']) && isset($_POST['email']) && isset($_POST['contact']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['gender'])  && isset($_POST['hobbies']) &&  isset($_POST['password'])){

		if($_FILES['image']['name'] != '')
		{
			$image=$_FILES['image']['name'];
		}
		else{
			$image=$_POST['db_image_name'];
		}

		$fn=$_POST['firstname'];
		$ln=$_POST['lastname'];
		$email=$_POST['email'];
		$con=$_POST['contact'];
		$add=$_POST['address'];
		$city=$_POST['city'];
		$gen=$_POST['gender'];
		$hob=$_POST['hobbies'];
		$pass=$_POST['password'];
		$hobbi="";
		 foreach ($hob as $chk1) {
		 	$hobbi .= $chk1." ";
		}

		move_uploaded_file($_FILES['image']['tmp_name'],'photos/'.$_POST['db_image_name']);

 //
		if ($fn!='' && $ln!='' && $email!='' && $con!='' && $add!='' && $city!='' && $gen!=''  &&  $hobbi!='' && $pass!='') {

			echo $insert = "UPDATE `user` SET `firstname`= '".$fn."',`lastname`= '".$ln."',`email`= '".$email."',
			`contact`='".$con."',`address`='".$add."',`gender`= '".$gen."',`hobbies`='".$hobbi."',`city`='".$city."',
			`image`='".$image."',`password`='".$pass."' WHERE `userid`='".$uid."' ";
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
	//echo "method";
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

		<input type="hidden" name="db_image_name" value="<?php echo $row['image']?>">
		<h1>Insert</h1>

		<label>First Name :</label>  
		<input type="text" name="firstname" id="form_firstname" value="<?php echo $row['firstname'];?>">
		<span  style="color: red;" id="firstname_error_message" ></span><br><br>

		<label>Last Name :</label>
		<input type="text" name="lastname" id="form_lastname" value="<?php echo $row['lastname']?>">
		<span  style="color: red;" id="lastname_error_message"></span><br><br>

		<label>Email :</label>
		<input type="text" name="email" id="form_email" value="<?php echo $row['email']?>">
		<span   style="color: red;" id="email_error_message"></span><br><br>

		<label>Contact No :</label>
		<input type="text" name="contact" id="form_contact" value="<?php echo $row['contact']?>">
		<span  style="color: red;" id="contact_error_message"></span><br><br>

		<label>Address :</label>
		<input type="text" name="address" id="form_address" value="<?php echo $row['address']?>">
		<span  style="color: red;" id="address_error_message"></span><br><br>
		
		<label>Gender :</label>
		<input type="radio" name="gender" id="form_gender_male" value="male" <?php if($row['gender']=='male'){ echo 'checked'; } ?>>Male
		<input type="radio" name="gender" id="form_gender_female" value="female"<?php if($row['gender']=='female'){ echo 'checked'; } ?>>Female
		<span  style="color: red;" id="gender_error_massage"></span><br><br>
<br>          
<br>
		<label>Hobbies :</label>
		<?php 
			$array_hobby=["Cricket","Hoccy","Hollyball","Tennis"];
			for($i=0;$i<count($array_hobby);$i++)
			{
				$hobby_name=strtolower($array_hobby[$i]);
				$tmp=0;
				for($j=0;$j<count($db_hobby_array);$j++){
					if($hobby_name==$db_hobby_array[$j]){
						$tmp=1;
						break;
					}
				}
				?>
				<input type="checkbox" name="hobbies[]" <?php if($tmp==1){echo "checked";} ?> value="<?php echo $hobby_name ?>" id ="form_hobbies"><?php echo $array_hobby[$i]; ?>
				<?php
			}
		?>
		
		<span  style="color: red;" id="hobbies_error_massage"></span>
<br>         
<br>
		<label>City :</label>
		<select name="city">
			<option value="Ahmedabad" <?php if($row['city']=='Ahmedabad' )
								{echo "selected";}?>>Ahmedabad</option>
			<option value="Surat" <?php if($row['city']=='Surat' )
								{echo "selected";}?>>Surat</option>
			<option value="Jamnagar"<?php if($row['city']=='Jamnagar' )
								{echo "selected";}?>>Jamnagar</option>
		</select>		
<br>
<br>
        <label>Image :</label>
<br>        
        <img style="border-radius: 100%; height: 100px" src="photos/<?php echo $row['image']?>">
<br>
		<input type="file" name="image" id="image">
<br>		
<br>
        <label>Password :</label>

		<input type="password" name="password" id="form_password" value="<?php echo $row['password']?>">
		<span style="color: red;" id="password_error_message"></span>

		<br>
<!-- ((\+*)((0[ -]+)*|(91 )*)(\d{12}+|\d{10}+))|\d{5}([- ]*)\d{6} -->

		<input type="submit" name="insert"  value="submit">

		



	</form>

</body>
</html>