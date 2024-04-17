<!--
	Student Names: Ronquillo, Michael Arnold, De Guzman, John Yuri, Laurel, Andrei Jovic
	Section: WD-202
	Site Name: Valiant Esports - register_form.php
	Date: April 2024
	-->
    <?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){
    
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);

   $select = "SELECT * FROM valiant_form WHERE email = '$email'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists';
   } else {
      if($pass != $cpass){
         $error[] = 'Passwords do not match';
      } else {
         $insert = "INSERT INTO valiant_form(name, email, password) VALUES('$name','$email','$pass')";
         mysqli_query($conn, $insert);
         
         header('location: login_form.php');
         exit();
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <title>Register Account | Valiant Esports</title>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="valiant_dweb/images/favicon.ico">
   <link rel="icon" type="image/png" sizes="32x32" href="valiant_dweb/images/favicon-32x32.png">
   <link rel="apple-touch-icon" sizes="180x180" href="valiant_dweb/images/apple-touch-icon.png">
   <link rel="icon" sizes="192x192" href="valiant_dweb/images/android-chrome-192x192.png">
</head>
<body>
<div class="container">
    <div class="background-1"></div>
    <div class="content-register">  
      <div class="form-container">
      <form id="registerForm" action="" method="post" enctype="multipart/form-data" onsubmit="addEmailDomain()">
         <h3 class="register">Register Now</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<div class="error">'.$error.'</div>';
            }
         }
         ?>
         <input type="text" name="name" placeholder="Enter username" class="box" required>
         <input type="email" id="email" name="email" placeholder="Enter email" class="box" required>
         <input type="password" name="password" placeholder="Enter password" class="box" required minlength="8" maxlength="20">
         <input type="password" name="cpassword" placeholder="Confirm password" class="box" required>
         <input type="submit" name="submit" value="Register Now" class="form-btn">
         <p class="reg">Already have an account? <a href="login_form.php" class="reg-log">Login Now</a></p>
      </form>
      </div>
   </div>
</div>

<script>
    function addEmailDomain() {
        var emailInput = document.getElementById("email");
        var emailValue = emailInput.value.trim();
        
       
        if (!emailValue || emailValue.indexOf("@student.hau.edu.ph") === -1) {
            alert("Please enter a valid HAU email address. Ex.(johndoe@student.hau.edu.ph)");
            return false; 
        }
        
      
        if (!emailValue.endsWith("@student.hau.edu.ph")) {
            emailInput.value = emailValue + "@student.hau.edu.ph";
        }
    }
</script>

</body>
</html>
