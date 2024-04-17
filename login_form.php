<!--
	Student Names: Ronquillo, Michael Arnold, De Guzman, John Yuri, Laurel, Andrei Jovic
	Section: WD-202
	Site Name: Valiant Esports - login_form.php
	Date: April 2024
	-->

    <?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `valiant_form` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['user_id'] = $row['id'];
      header('location:valiant_dweb/index.php');
   }else{
      $message[] = 'incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Log In Account | Valiant Esports</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="valiant_dweb/images/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="valiant_dweb/images/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="valiant_dweb/images/apple-touch-icon.png">
    <link rel="icon" sizes="192x192" href="valiant_dweb/images/android-chrome-192x192.png">
    <script src="https://kit.fontawesome.com/d9fb717134.js" crossorigin="anonymous"></script>
	
</head>
<body>
<div class="container">
    <div class="background-1"></div>

    <div class="content-login">
        <button id="loginButton"><i class="fa-solid fa-right-to-bracket" style="color: #ffffff;"></i></i></button>
        <div id="loginForm">
            <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data " onsubmit="addEmailDomain()">
                <h3 class="log-in">login now</h3>
                <?php
                if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
                }
                ?>
                
                <input type="email" id="email" name="email" placeholder="Enter email" class="box" required >
                <input type="password" name="password" placeholder="Enter password" class="box" required minlength="8" maxlength="20">
                <input type="submit" name="submit" value="login now" class="form-btn">
                <p>Don't have an account? <a href="register_form.php">Register now!</a></p>
            </form>
            </div>
        </div>
    </div>
</div>
  
<script src="valiant_dweb/scripts/script.js"></script>
<script>
    function addEmailDomain() {
        var emailInput = document.getElementById("email");
        var emailValue = emailInput.value.trim();
        
        if (!emailValue || emailValue.indexOf("@student.hau.edu.ph") === -1) {
            alert("Please enter a valid HAU email address. Ex.(johndoe@student.hau.edu.ph)");
            return false; 
        }
        

        elseif (!emailValue.endsWith("@student.hau.edu.ph")) {
            emailInput.value = emailValue + "@student.hau.edu.ph";
        }
    }
</script>

</body>
</html>
