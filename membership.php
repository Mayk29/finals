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

   
   $fname = mysqli_real_escape_string($conn, $_POST['firstname']);
   $lname = mysqli_real_escape_string($conn, $_POST['lastname']);
   $ages = mysqli_real_escape_string($conn, $_POST['ages']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $courses = mysqli_real_escape_string($conn, $_POST['courses']);

   
   $insert_query = "INSERT INTO membership (firstname, lastname, ages, email, courses) 
                   VALUES ('$fname', '$lname', '$ages', '$email', '$courses')";

   
   if(mysqli_query($conn, $insert_query)) {
    
      header('location:valiant_dweb/index.php');
      exit(); 
   } else {
      
      $message[] = 'Error: ' . mysqli_error($conn);
   }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Valiant Membership | Valiant Esports</title>
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
    <div class="content-membership">
    <div class="form-container">
            <form action="" method="post" enctype="multipart/form-data">
                <p class="member">MEMBERSHIP</p>
                <?php
                if(isset($message)){
                foreach($message as $message){
                    echo '<div class="message">'.$message.'</div>';
                }
                }
                ?>
                
                <input type="text" name="firstname" placeholder="First Name" class="box" required>
                <input type="text" name="lastname" placeholder="Last Name" class="box" required>
                <div class="drpdw">
                    <button for="drpbtn" class="main-drpbtn" style="color:gray; padding-left:8px;">Age:</button>
                    <select class="drpbtn " name="ages">
                        <option class="drpbtn-opt" value="15-20 years old">15-20's old</option>
                        <option class="drpbtn-opt" value="20-30 years old">20-30's old</option>
                        <option class="drpbtn-opt" value="30's + Old">30's + Old</option>
                    </select>
                </div>
                <input type="text" id="email" name="email" placeholder="Enter Your Email" class="box email-box" required>
                <div class="drpdw">
                    <button class ="main-drpbtn" style="color:gray; padding-left: 11.5px; margin-right:-2px"  >Course:</button>
                    <select class="drpbtn" name="courses">
                        <option class="drpbtn-opt" value="SBA">SBA</option>
                        <option class="drpbtn-opt" value="SOC">SOC</option>
                        <option class="drpbtn-opt" value="SEA">SEA</option>
                        <option class="drpbtn-opt" value="SNAMS">SNAMS</option>
                        <option class="drpbtn-opt" value="SAS">SAS</option>
                        <option class="drpbtn-opt" value="SED">SED</option>
                        <option class="drpbtn-opt" value="SHTM">SHTM</option>
                        <option class="drpbtn-opt" value="CCJEF">CCJEF</option>
                    </select>
                </div>

                <input type="submit" name="submit" value="JOIN NOW" class="form-btn join-box">
                <br>
            <a href="valiant_dweb/index.php" class="btn-profile-ret">Return</a>
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
        

        elseif (!emailValue.endsWith("@student.hau.edu.ph")) {
            emailInput.value = emailValue + "@student.hau.edu.ph";
        }
    }
</script>
  
</body>
</html>
