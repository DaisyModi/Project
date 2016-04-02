<!DOCTYPE HTML>
<html>
    <head>
        <style>
            .error {color: #FF0000;}
        </style>
        </head>
        <body>
            <?php 
            $nameErr=$emailErr=$anoErr=$genderErr="";
            $name=$email=$ano=$gender="";
            
            if($_SERVER["REQUEST METHOD"]=="POST") {
                if(empty($_POST["name"])) {
                    $nameErr="Name is Require";
                }
                else {
                    $name=test_input($_POST["name"]);
                    if(!preg_match("/^[a-zA-Z ]*$/",$name)) {
                        $nameErr="Only letters and blank spaces are allowed";
                    }
                }
                if(empty($_POST["email"])) {
                    $emailErr="Email is required";
                }
                else {
                    $email=test_input($_POST["email"]);
                    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                        $emailErr="INvalid Email format";
                    }
                }
                if(empty($_POST["ano"])) {
                    $anoErr="Admission NO is Required";
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
                $data=stripslasshes($data);
                $data=htmlspecialchars($data);
                return $data;
            }
            ?>
            <h2>Sign up for students</h2>
            <p><span class = "error" >* required fields</span></p>
            <form method = "post" action = "<?php  echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                NAME: <input type="text" name="name" value = "<?php echo $name; ?>">
                <span class="error" >* <?php echo $nameErr; ?></span>
                <br><br>
                EMAIL: <input type="text" name="email" value = "<?php echo $email; ?>">
                <span class= "error">* <?php $emailErr; ?></span>
                <br><br>
                ADMISSION NO.: <input type="text" name ="ano" value = "<?php echo $ano; ?>">
                <span class = "error" >* <?php echo $anoErr; ?></span>
                <br><br>
                GENDER: 
                <input type="radio" name = "gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value = "female">Female
                <input type="radio" name= "gender" <?php if(isset($gender) && $gender == "male") echo "checked"; ?> value = "male">Male
                <span class="error" >* <?php echo $genderErr; ?></span>
                <br><br>
                <input type = "submit" name= " submit " value = "Submit">
                </form>
                </body>
                </html>
