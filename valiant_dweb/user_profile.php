<!--
	Student Names: Ronquillo, Michael Arnold, De Guzman, John Yuri, Laurel, Andrei Jovic
	Section: WD-202
	Site Name: Valiant Esports - user_profile.php
	Date: April 2024
	-->

    <?php

include '../config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../login_form.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:../login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>User Profile Details | Valiant Esports</title>
   <link rel="stylesheet" href="../css/style.css">
   <link rel="shortcut icon" href="valiant_dweb/images/favicon.ico">
   <link rel="icon" type="image/png" sizes="32x32" href="valiant_dweb/images/favicon-32x32.png">
   <link rel="apple-touch-icon" sizes="180x180" href="valiant_dweb/images/apple-touch-icon.png">
   <link rel="icon" sizes="192x192" href="valiant_dweb/images/android-chrome-192x192.png">

</head>
<body>
   
<div class="container">
   <div class="background-1"></div>
   <div class="content-profile">
         <div class="form-container">
            <div class="user-profile">
            <?php
               $select = mysqli_query($conn, "SELECT * FROM `valiant_form` WHERE id = '$user_id'") or die('query failed');
               if(mysqli_num_rows($select) > 0){
                  $fetch = mysqli_fetch_assoc($select);
               }
               if($fetch['image'] == ''){
                  echo '<img src="../images/default-avatar.PNG" width="50%" height="50%">'; 
               }else{
                  echo '<img src="../uploaded_img/'.$fetch['image'].'" width="50%" height="50%">'; 
               }
            ?>
            <h3 class="user-profile-details">Username : <?php echo $fetch['name']; ?></h3>
            <h3 class="user-profile-details" style="padding-bottom:1em;">Email : <?php echo $fetch['email']; ?></h3>
            <a href="../update_profile.php" class="btn-profile" >update profile</a>
            <br>
            <a href="user_profile.php?logout=<?php echo $user_id; ?>" class="btn-profile-log">logout</a>
            <br>
            <a href="index.php" class="btn-profile-ret">Return</a>
            <div>
         </div>
   </div>
</div>

</body>
</html>