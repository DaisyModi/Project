<!DOCTYPE HTML>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body>
	<?php
		$name=$email=$intrest=$gender=$password="";
		$nameErr=$emailErr=$intrestErr=$genderErr=$passwordErr="";
		 if($_SERVER["REQUEST METHOD"]=="POST") {
               if(empty($_POST["name"])) {
                   $nameErr="Name is REQUIRED";
               }
           
           else {
               $name=test_input($_POST["name"]);
               if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                   $nameErr="Only letters and blank spaces allowed";
               }
           }
			if(empty($_POST["email"])) {
				$emailErr="Email is Required";
			}
			else {
				$email=test_input($_POST["email"]);
				if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
					$emailErr="Invalid email Format";
				}
			}
			if(empty($_POST["intrest"])) {
				$intrestErr="";
			}
			else {
				$intrest=test_input($_POST["intrest"]);
			}
			if(empty($_POST["gender"])) {
				$genderErr="Gender is Required";
			}
			else {
				$gender=test_input($_POST["gender"]);
			}
		}

		function test_input($data) {
			$data=trim($data);
			$data=stripslashes($data);
			$data=htmlspecialchars($data);
			return $data;
		}
		?>


	<p><span class="error">* required field</span></p>
	<form method = "post" action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		Name: <input type="text" name = "name" value="<?php echo $name; ?>">
		<span class="error" >*<?php echo $nameErr; ?></span>
		<br><br>
		Email: <input type="text" name="email" value= "<?php echo $email; ?>">
		<span class="error" >*<?php echo $emailErr; ?></span>
		<br><br>
		Intrest:<textarea name="intrest" rows="5" cols="50"> <?php echo $intrest; ?></textarea>
		<br><br>
		Gender:
		<input type="radio" name="gender" <?php if(isset($gender) && $gender=="female") echo "checked"; ?>value="female">Female
		<input type="radio" name="gender" <?php if(isset($gender) && $gender=="male") echo "checked"; ?> value = "male">Male
		<span class="error" >* <?php echo $genderErr; ?></span>
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
</body>
</html>
