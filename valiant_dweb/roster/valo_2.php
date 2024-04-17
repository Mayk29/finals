<?php

include '../../config.php';
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:../../login_form.php');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:../../login_form.php');
}

?>

<?php 
    $copyright_date=strtotime("2024");
?>

<!DOCTYPE html>
	<!--
	Student Names: Ronquillo, Michael Arnold, De Guzman, John Yuri, Laurel, Andrei Jovic
	Section: WD-202
	Site Name: Valiant Esports - valo_2.php
	Date: April 2024
	-->
<html lang = "en">

<head>
	<title>Valorant Academy| Valiant Esports</title>
	<meta charset = "utf-8">
    <link rel="stylesheet" href="../css/styles.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="The Valiant Esports currently has three valorant teams."/>
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
                        <li class="nav-li"><a  href ="../index.php">Home</a></li>
                        <li class="nav-li"><a  href = "../about.php">About Us</a></li>
						<li class="mobile-sub"><a href="javascript:void(0)">▼  Organization</a>
                            <ul class="mobile-sub-menu">
                                <li><a href="../roster.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Roster</a></li>
								<li><a href="../executives.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Executives</a></li>
							</ul>
                        </li> 
                        <li class="nav-li"><a  href = "../news.php">News</a></li>
						<li class="nav-li"><a  href ="../../products.php">Shop</a></li>
                        <li class="nav-li"><a  href = "../contact.php">Contacts</a></li>
                        <li class="mobile-sub"><a href="javascript:void(0)"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff;"></i></a>
                            <div class="mobile-sub-menu">
                                <a href="../user_profile.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>  User Profile</a>
                                <a href="../index.php?logout=<?php echo $user_id; ?>"><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal" style="color: #fafafa; padding-left: 1em; "></i>  Log Out</a>
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
                    <a href = "../index.php">
                        <img src = "../images/valiant.png" alt="Valiant Esports "/>
                    </a> 
                    <h1> <span class="mob"></span> VALIANT <span class="mob"></span></h1>
                </div>

                <div id="valiant-logo" class ="tablet-desktop">
                    <a href = "../index.php">
                        <img src = "../images/valiant.png" alt="Valiant Esports "/>
                    </a> 
                    <h1> <span class="tab-desk"></span> VALIANT <span class="tab-desk"></span></h1>
                </div>
            </header> 
            
            <nav class="tablet-desktop">
                    <ul>
                        <li class="nav-li"><a  href ="../index.php">Home</a></li>
                        <li class="nav-li"><a  href = "../about.php">About Us</a></li> 
                        <li class="dropdown nav-li"><a href="javascript:void(0)">Organization</a>
                            <div class="dropdown-content-org">
                                <a href="../roster.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Roster</a>
								<a href="../executives.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Executives</a>
                            </div>
                        </li> 
                        <li class="nav-li"><a  href = "../news.php">News</a></li>
                        <li class="nav-li"><a  href ="../products.php">Shop</a></li>
                        <li class="nav-li"><a  href = "../contact.php">Contacts</a></li>
                        <li class="dropdown nav-li"><a href="javascript:void(0)"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff;"></i></a>
                            <div class="dropdown-content">
                                <a href="../user_profile.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>  User Profile</a>
                                <a href="../index.php?logout=<?php echo $user_id; ?>"><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal" style="color: #fafafa; padding-left: 1em; "></i>  Log Out</a>
                            </div>
                        </li>
                    </ul>
                    
            </nav>
        </div>

		<!-- Use the main area to add main content to the webpage -->
		<main>
			<div class = "grid">
            <aside >
                <p>VALIANT VALORANT ACADEMY</p>
            </aside>
    
            <figure  id="roster-member"><!-- Figure Element 1 -->
                <img src ="../images/valiant-valo-acad/valo-tba.jpg" alt = "valorant team2 player 1" />
				<figcaption>TBA</figcaption>
            </figure>
    
            <figure id="roster-member" ><!-- Figure Element 2 -->
                <img src ="../images/valiant-valo-acad/valo-tba.jpg" alt = "valorant team2 player 2" />
                <figcaption >TBA</figcaption>
            </figure>
            
            <figure id="roster-member"><!-- Figure Element 3 -->
                <img src ="../images/valiant-valo-acad/valo-tba.jpg" alt = "valorant team2 player 3" />
                <figcaption >TBA</figcaption>
            </figure>

            <figure id="roster-member"><!-- Figure Element 4 -->
                <img src ="../images/valiant-valo-acad/valo-tba.jpg" alt = "valorant team2 player 4" />
                <figcaption >TBA</figcaption>
            </figure>

            <figure id="roster-member"><!-- Figure Element 5 -->
                <img src ="../images/valiant-valo-acad/valo-tba.jpg" alt = "valorant team2 player 5" />
                <figcaption >TBA</figcaption>
            </figure>

			<figure id="roster-member"><!-- Figure Element 6 -->
                <img src ="../images/valiant-valo-acad/valo-tba.jpg" alt = "valorant team2 player 6" />
                <figcaption >TBA</figcaption>
            </figure>

            <figure id="roster-member"><!-- Figure Element 7 -->
                <img src ="../images/valiant-valo-acad/valo-tba.jpg" alt = "valorant team2 player 7" />
                <figcaption >TBA</figcaption>
            </figure>
		</div>
			<a href = "../roster.php" id="exit"><p>Return</p></a> 
		</main>
		
		<footer>
            <div class="copyright">
				<p>&copy; Copyright <?= date("Y", $copyright_date); ?>. All Rights Reserved. </p>
				<p>Created by De Guzman, Laurel & Ronquillo</p>
				<p>Valiant Esports</p>
			</div>

			<div class="social">
				<a href="https://www.facebook.com/valiantesports.hau" target="_blank" style="border-right: solid 2px #fff; font-size: 1.75em; text-decoration: none;">
					<img src="../images/facebook-logo.png" alt="Facebook logo">
				</a>
				
				<a href="https://www.instagram.com/valiantesports.hau/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank">
					<img src="../images/instagram-logo.png" alt="Instagram logo">
				</a>
			</div>
			<a class="mobile" id="email" href ="mailto:valiantesportsclub@gmail.com"><span>valiantesportsclub@gmail.com</span></a>
			<a class="tablet-desktop" id="email" href ="mailto:valiantesportsclub@gmail.com"><span>valiantesportsclub@gmail.com</span></a><br>
		</footer>
	</div>
	<script src="../scripts/script.js"></script>
    <script src="https://kit.fontawesome.com/d9fb717134.js" crossorigin="anonymous"></script>
</body>
</html>