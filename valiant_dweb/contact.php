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

<?php



if (!isset($_SESSION['user_id'])) {
    header('location:../login_form.php');
    exit();
}


if (isset($_GET['logout'])) {
    unset($_SESSION['user_id']);
    session_destroy();
    header('location:../login_form.php');
    exit();
}


if (isset($_POST['submit'])) {
  
    $fname = mysqli_real_escape_string($conn, $_POST['first_name']);
    $lname = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $feedback = mysqli_real_escape_string($conn, $_POST['feedback']);

   
    $insert_query = "INSERT INTO contact (first_name, last_name, email, department, feedback) 
                   VALUES ('$fname', '$lname', '$email', '$department', '$feedback')";

    if (mysqli_query($conn, $insert_query)) {
    
        header('location:index.php');
        exit();
    } else {
        $message[] = 'Error: ' . mysqli_error($conn);
    }
}
?>

<?php 
    $copyright_date=strtotime("2024");
?>

<!DOCTYPE html>
	<!--
	Student Names: Ronquillo, Michael Arnold, De Guzman, John Yuri, Laurel, Andrei Jovic
	Section: WD-202
	Site Name: Valiant Esports - contact.php
	Date: April 2024
	-->
<html lang = "en">

<head>
	<title>Contact - Location | Valiant Esports</title>
	<meta charset = "utf-8">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="The Valiant Esports is open to all angelites and be a part of it today by being a member to the community."/>
	<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" sizes="192x192" href="images/android-chrome-192x192.png">
	
	
</head>

<body>
	<div id="container-about">
    <nav>
			<div class="mobile-nav">
				<a href="#home" class="active" style="opacity: 0;">Menu</a>
			<div id="menu-links">
				<ul>
                        <li class="nav-li"><a  href ="index.php">Home</a></li>
                        <li class="nav-li"><a  href = "about.php">About Us</a></li>
						<li class="mobile-sub"><a href="javascript:void(0)">Organization</a>
                            <ul class="mobile-sub-menu">
                                <li><a href="roster.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Roster</a></li>
								<li><a href="executives.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Executives</a></li>
							</ul>
                        </li> 
                        <li class="nav-li"><a  href = "news.php">News</a></li>
						<li class="nav-li"><a  href ="../products.php">Shop</a></li>
                        <li class="nav-li"><a  href = "contact.php">Contacts</a></li>
                        <li class="mobile-sub"><a href="javascript:void(0)"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff;"></i></a>
                            <div class="mobile-sub-menu">
                                <a href="user_profile.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>  User Profile</a>
                                <a href="index.php?logout=<?php echo $user_id; ?>"><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal" style="color: #fafafa; padding-left: 1em; "></i>  Log Out</a>
                            </div>
                        </li>
                    </ul>
			</div>

			<a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<div>&#9776;</div>
			  </a>
			</div>

		</nav>
		<div id="nav-index">
            <header>
                <div id="valiant-logo-mobile" class ="mobile">
                    <a href = "index.php">
                        <img src = "images/valiant.png" alt="Valiant Esports "/>
                    </a> 
                    <h1> <span class="mob"></span> VALIANT <span class="mob"></span></h1>
                </div>

                <div id="valiant-logo" class ="tablet-desktop">
                    <a href = "index.php">
                        <img src = "images/valiant.png" alt="Valiant Esports "/>
                    </a> 
                    <h1> <span class="tab-desk"></span> VALIANT <span class="tab-desk"></span></h1>
                </div>
            </header> 
            
            <nav class="tablet-desktop">
                    <ul>
                        <li class="nav-li"><a  href ="index.php">Home</a></li>
                        <li class="nav-li"><a  href = "about.php">About Us</a></li>
						<li class="dropdown nav-li"><a href="javascript:void(0)">Organization</a>
                            <div class="dropdown-content-org">
                                <a href="roster.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Roster</a>
								<a href="executives.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Executives</a>
                            </div>
                        </li> 
                        <li class="nav-li"><a  href = "news.php">News</a></li>
						<li class="nav-li"><a  href ="../products.php">Shop</a></li>
                        <li class="nav-li"><a  href = "contact.php">Contacts</a></li>
                        <li class="dropdown nav-li"><a href="javascript:void(0)"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff;"></i></a>
                            <div class="dropdown-content">
                                <a href="user_profile.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>  User Profile</a>
                                <a href="index.php?logout=<?php echo $user_id; ?>"><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal" style="color: #fafafa; padding-left: 1em; "></i>  Log Out</a>
                            </div>
                        </li>
                    </ul>
                    
            </nav>
	    </div>


		<!-- Use the main area to add main content to the webpage -->
		<main>
			<div id="contact">
				<h2>Contact Us</h2>
				<p>Email: <a href="mailto:valiantesportsclub@gmail.com" class ="link">valiantesportsclub@gmail.com</a></p>
				<p>Facebook: <a href="https://www.facebook.com/valiantesports.hau" class ="link" target="_blank">facebook.com/valiantesports.hau</a></p>
				<p>Instagram: <a href="https://www.instagram.com/valiantesports.hau/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" class ="link" target="_blank">instagram.com/valiantesports.hau</a></p>
				<p class="offer" onclick="address()" id="add">View Address:<span class = "link"></span></p>
				
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3851.4596080946785!2d120.5874360758273!3d15.133083163816952!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3396f24ec2f5a1f9%3A0x5e0af8a6aaab2282!2sHoly%20Angel%20University!5e0!3m2!1sen!2sph!4v1699439605045!5m2!1sen!2sph" allowfullscreen="" class = "map"></iframe>
			</div>
					
				<div class="fill-out">
					<h2>Fill-out this form to connect with Valiant Esports.</h2>
					<img src="images/cover-valiant.jpg" id="contact-img" alt="valiant players">
				</div>
					

				<div class="container">
					
					<div class="content-contact">
						<div class ="form-container">
						
						<h3 style="text-align:center;">Contact Information:</h3>

						<form class="grid-contact" action="" method="post" enctype="multipart/form-data">
							<label for="first_name" class="form-label" >First Name:</label>
							<input type="text" id="first_name" name="first_name" required><br><br>

							<label for="last_name" class="form-label" >Last Name:</label>
							<input type="text" id="last_name" name="last_name" required><br><br>
							
							<label for="email" class="form-label1">Email:</label>
							<input type="email" id="email" name="email" required><br><br>
							
							<label for="department" class="form-label3">Department:</label>
							<div class="drpdw"> 
								
								<button for="department" class="main-drpbtn" style="color:grey;">Select Department</button>
								<select class="drpbtn " name="department">
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
							
							<label for="feedback" class="form-label2">Feedback:</label><br>
							<textarea id="feedback" name="feedback" rows="4" required></textarea><br><br>
							</div>
						</div>
							<button type="reset" id="reset" value="reset" class="bttn">Reset  <i class="fa-solid fa-rotate-right"></i></button>
							<input class="bttn" type="submit" name="submit" value="Submit">
					</form>

				</div>
		</main>
		
		<footer>
			<div class="copyright">
				<p>&copy; Copyright <?= date("Y", $copyright_date); ?>. All Rights Reserved. </p>
				<p>Created by De Guzman, Laurel & Ronquillo</p>
				<p>Valiant Esports</p>
			</div>

			<div class="social">
				<a href="https://www.facebook.com/valiantesports.hau" target="_blank" style="border-right: solid 2px #fff; font-size: 1.75em; text-decoration: none;">
					<img src="images/facebook-logo.png" alt="Facebook logo">
				</a>
				
				<a href="https://www.instagram.com/valiantesports.hau/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank">
					<img src="images/instagram-logo.png" alt="Instagram logo">
				</a>
			</div>
			<a class="mobile" id="email" href ="mailto:valiantesportsclub@gmail.com"><span>valiantesportsclub@gmail.com</span></a>
			<a class="tablet-desktop" id="email" href ="mailto:valiantesportsclub@gmail.com"><span>valiantesportsclub@gmail.com</span></a>
			<br>
		</footer>
	</div>
	<script src="scripts/script.js"></script>
	<script src="https://kit.fontawesome.com/d9fb717134.js" crossorigin="anonymous"></script>
</body>
</html>