<!DOCTYPE HTML>
<html>
    <head>
        <style>
            .error {color: #FF0000;}
        </style>
     </head>
        <body>
           <?php
           $nameErr=$emailErr=$websiteErr=$genderErr="";
           $name=$email=$information=$website=$speciality="";
           
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
               $emailErr="Email is required";
           }
           else {
               $email=test_input($_POST["email"]);
               if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                   $emailErr="Invalid email format";
               }
           }
           
           if(empty($_POST["website"])) {
               $website="";
           }
           else {
               $website = test_input($_POST["website"]);
               if(!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website) {
                   $websiteErr="Invalid Url";
               }
           }
           }
           
            <form method="post" action = "<?php echo htmlspecialchars ($_SERVER["PHP_SELF"]);?>">
                Name: <input type = "text" name = "name" value = "<?php echo $name; ?>">//first time without error checking
                <br><br>
                Email:<input type = "text" name = "email" value = "<?php echo $email; ?>">
                <br><br>
                Information: <textarea name = " information" rows = "5" cols = "40" >
                    <?php echo $information ?></textarea>
                    <br><br>
                Website from where someone can come to know about you: <input type = "text" name = "website" value = "<?php echo $website; ?>">
                <br><br>
                Your Speciality: <input type = "text" name = "speciality" value = "<?php echo $speciality; ?>">
                <br><br>
                Gender:
                <input type = "radio" name = "gender" <?php if (isset($gender) && $gender=="female") echo "checked"; ?> value = "female">Female
                <input type = "radio" name = "gender" <?php if (isset($gender) && $gender=="male") echo "checked"; ?> value = "male">Male
                <br><br>
                Password: <input type = "text" name = "password" value = "<?php echo $password; ?>">
                <br><br>
                Enter Password Again: <input type = "text" name = "pass_again" value = "<?php echo $pass_again; ?>">
                <br><br>
                </form>
        </body>
</html>