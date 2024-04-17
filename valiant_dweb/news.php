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
class Date {
  public $current_date;
  function set_current_date($current_date) {
    $this->current_date = $current_date;
  }
}

$c_date = new Date();
$tz_MNL = new DateTimeZone("Asia/Manila");
$location = $tz_MNL->getLocation();
$manila = new DateTime('now', $tz_MNL);
$c_date->set_current_date($manila);

$copyright_date=strtotime("2024");
?>
<!DOCTYPE html>
	<!--
	Student Names: Ronquillo, Michael Arnold, De Guzman, John Yuri, Laurel, Andrei Jovic
	Section: WD-202
	Site Name: Valiant Esports - news.php
	Date: April 2024
	-->
<html lang = "en">

<head>
	<title>News & Updates | Valiant Esports</title>
	<meta charset = "utf-8">
    <link rel="stylesheet" href="css/styles.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="The Valiant Esports is a community that is very fun and exciting. There is a lot of events and happening inside the organization."/>
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
		<main ><div class="container-news">
			<h1 class="head-news">VALIANT ESPORTS NEWS</h1>
			<div class="sub-head-news">
			  <p><?php echo $c_date->current_date->format('D '); ?><span><?php echo $c_date->current_date->format('M d, Y g:i a'); ?></span></p>
			  <p class="important">Truly Valiant!</p>
			</div>
			
		
			<div class="main">
			  <div class="home-news">
				<div class="left">
				  <img src="images/news/news_1.jpg" class="home-img" alt="headline photo">
		
				  <h2 class="head-intro">
					Guess the Agent
				  </h2>
				  <blockquote>
					What's up Angelites! We are to challenge your knowledge about the game Valorant!
				  </blockquote>
				  <blockquote>
					<a href="news/news_1.php">Read More...</a>
				  </blockquote>
				</div>
		
				<div class="right">
				  <h3 class="head-latest">Latest News</h3>
				  <div class="lists">
					<div class="list">
					  <img src="images/news/news_2.jpg" alt="latest news 1">
					  <p><a href = "news/news_2.php" style="color:#fff; text-decoration:none;">SIKLAB presents Blazing the flame through Esports</a></p>
					</div>
		
					<div class="list">
					  <img src="images/news/news_3.jpg" alt="latest news 2">
					  <p><a href = "news/news_3.php" style="color:#fff; text-decoration:none;">Be the next Creative!</a></p>
					</div>
		
					<div class="list">
					  <img src="images/news/news_4.jpg" alt="latest news 3">
					  <p><a href = "news/news_4.php" style="color:#fff; text-decoration:none;">Valiant FE where you at?</a></p>
					</div>
		
					<div class="list">
					  <img src="images/news/news_5.jpg" alt="latest news 4">
					  <p><a href = "news/news_5.php" style="color:#fff; text-decoration:none;">Thriller in our 2nd Week!</a></p>
					</div>
				  </div>
				</div>
			  </div>
			  </div>
			  </div>
			<div class="grid-news left">
            <aside >
                <p class="hq">VALIANT ESPORTS NEWS</p>
            </aside>
    
            <figure><a href="news/news_1.php"><!-- Figure Element 1 -->
                <img src ="images/news/news_1.jpg" alt = "guess the agent" /></a>
                <figcaption>Guess the Agent</figcaption>
            </figure>
    
            <figure><a href = "news/news_2.php"><!-- Figure Element 2 -->
                <img src ="images/news/news_2.jpg" alt = "SIKLAB" /></a>
                <figcaption >SIKLAB presents Blazing the flame through Esports</figcaption>
			</figure>
            
            <figure><a href = "news/news_3.php"><!-- Figure Element 3 -->
                <img src ="images/news/news_3.jpg" alt = "be the next creative" /></a>
                <figcaption >Be the next Creative!</figcaption>
            </figure>

            <figure><a href = "news/news_4.php"><!-- Figure Element 4 -->
                <img src ="images/news/news_4.jpg" alt = "valiant FE registration" /></a>
                <figcaption >Valiant FE where you at?</figcaption>
            </figure>

            <figure><a href = "news/news_5.php"><!-- Figure Element 5 -->
                <img src ="images/news/news_5.jpg" alt = "week 2 results" /></a>
                <figcaption >Thriller in our 2nd Week!</figcaption>
            </figure>

            <figure><a href = "news/news_6.php"><!-- Figure Element 6 -->
                <img src ="images/news/news_6.jpg" alt = "Valiant Camael won" /></a>
                <figcaption >Valiant Camael defeated Panthera Esports</figcaption>
            </figure>

            <figure><a href = "news/news_7.php"><!-- Figure Element 7 -->
                <img src ="images/news/news_7.jpg" alt = "Valiant Archangels won" /></a>
                <figcaption >Valiant Archangels secured 2nd victory</figcaption>
            </figure>

            <figure><a href = "news/news_8.php"><!-- Figure Element 8 -->
                <img src ="images/news/news_8.jpg" alt = "igniting the future" /></a>
                <figcaption >Igniting the Future</figcaption>
            </figure>

            <figure><a href = "news/news_9.php"><!-- Figure Element 8 -->
                <img src ="images/news/news_9.jpg" alt = "bewitching legends" /></a>
                <figcaption >Bewitching Legends</figcaption>
            </figure>
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