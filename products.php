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
<?php 
    $copyright_date=strtotime("2024");
	
?>

<?php

include 'connect.php';

if(isset($_POST['add_to_cart'])){

   $product_id = $_POST['product_id'];
   $product_id = filter_var($product_id, FILTER_SANITIZE_STRING);

   $verify_product = $conn->prepare("SELECT * FROM `products` WHERE product_id = ?");
   $verify_product->execute([$product_id]);

   if($verify_product->rowCount() > 0){

      $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE product_id = ? AND cart_id = ?");
      $verify_cart->execute([$product_id, $user_id]);

      if($verify_cart->rowCount() > 0){
         $warning_message[] = 'already added to cart!';
      }else{
         $id = create_unique_id();
         $qty = $_POST['qty'];
         $qty = filter_var($qty, FILTER_SANITIZE_STRING);

         $insert_cart = $conn->prepare("INSERT INTO `cart`(id, cart_id, product_id, qty) VALUES(?,?,?,?)");
         $insert_cart->execute([$id, $user_id, $product_id, $qty]);
         $success_message[] = 'added to cart!';
      }

      
   }else{
      $error_message[] = 'something went wrong!';
   }

}

$count_cart = $conn->prepare("SELECT * FROM `cart` WHERE cart_id = ?");
$count_cart->execute([$user_id]);
$total_cart_items = $count_cart->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Valiant Products | Valiant Esports</title>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="css/style.css">
   <link rel="shortcut icon" href="valiant_dweb/images/favicon.ico">
   <link rel="icon" type="image/png" sizes="32x32" href="valiant_dweb/images/favicon-32x32.png">
   <link rel="apple-touch-icon" sizes="180x180" href="valiant_dweb/images/apple-touch-icon.png">
   <link rel="icon" sizes="192x192" href="valiant_dweb/images/android-chrome-192x192.png">

</head>
<body>
<div class="container-shop">
    <div class="background-shop"></div>
   
    <div class="shop-back">
    <nav>
			<div class="mobile-nav">
				<a href="#home" class="active" style="opacity: 0;">Menu</a>
			<div id="menu-links">
				<ul>
                        <li class="nav-li"><a  href ="valiant_dweb/index.php">Home</a></li>
                        <li class="nav-li"><a  href = "valiant_dweb/about.php">About Us</a></li>
						<li class="mobile-sub"><a href="javascript:void(0)">▼  Organization</a>
                            <ul class="mobile-sub-menu">
                                <li><a href="valiant_dweb/roster.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Roster</a></li>
								<li><a href="valiant_dweb/executives.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Executives</a></li>
							</ul>
                        </li> 
                        <li class="nav-li"><a  href = "valiant_dweb/news.php">News</a></li>
						<li class="nav-li"><a  href ="products.php">Shop</a></li>
                        <li class="nav-li"><a  href = "valiant_dweb/contact.php">Contacts</a></li>
                        <li class="mobile-sub"><a href="javascript:void(0)"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff;"></i></a>
                            <div class="mobile-sub-menu">
                                <a href="valiant_dweb/user_profile.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>  User Profile</a>
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
                    <a href = "valiant_dweb/index.php">
                        <img src = "valiant_dweb/images/valiant.png" alt="Valiant Esports "/>
                    </a> 
                    <h1> <span class="mob"></span> VALIANT <span class="mob"></span></h1>
                </div>

                <div id="valiant-logo" class ="tablet-desktop">
                    <a href = "valiant_dweb/index.php">
                        <img src = "valiant_dweb/images/valiant.png" alt="Valiant Esports "/>
                    </a> 
                    <h1> <span class="tab-desk"></span> VALIANT <span class="tab-desk"></span></h1>
                </div>
            </header> 
            
            <nav class="tablet-desktop">
                    <ul>
                        <li class="nav-li"><a  href ="valiant_dweb/index.php">Home</a></li>
                        <li class="nav-li"><a  href = "valiant_dweb/about.php">About Us</a></li>

						      <li class="dropdown nav-li"><a href="javascript:void(0)">Organization</a>
                            <div class="dropdown-content-org">
                                <a href="valiant_dweb/roster.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Roster</a>
								<a href="valiant_dweb/executives.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>Executives</a>
                            </div>

                        </li> 
                        <li class="nav-li"><a  href = "valiant_dweb/news.php">News</a></li>
						<li class="nav-li"><a  href ="products.php">Shop</a></li>
                        <li class="nav-li"><a  href = "valiant_dweb/contact.php">Contacts</a></li>

                        <li class="dropdown nav-li"><a href="javascript:void(0)"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff;"></i></a>
                            <div class="dropdown-content">
                                <a href="valiant_dweb/user_profile.php"><i class="fa-solid fa-user" style="color: #ffffff; border-color: #fff; padding-right: 1em;"></i>  User Profile</a>
                                <a href="valiant_dweb/index.php?logout=<?php echo $user_id; ?>"><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal" style="color: #fafafa; padding-left: 1em; "></i>  Log Out</a>
                            </div>
                        </li>
                    </ul>
                    
            </nav>
	    </div>
      

      <section class="products">
      <section>

         <div class="count-container">
            <p>total cart items : <span><?= $total_cart_items; ?></span></p>
            <a href="cart.php" class="inline-btn <?= ($total_cart_items > 0)?'':'disabled'; ?>">view cart <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16"><path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5M3.102 4l1.313 7h8.17l1.313-7zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4m7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4m-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2m7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2"/></svg></a>
         </div>

      </section>
         <h1 class="hd">Valiant Shop</h1>

         <div class="box-container">

         <?php
            $select_products = $conn->prepare("SELECT * FROM `products`");
            $select_products->execute();
            if($select_products->rowCount() > 0){
               while($fetch_product = $select_products->fetch(PDO::FETCH_ASSOC)){
         ?>
         <form action="" class="box" method="POST">
            <input type="hidden" name="product_id" value="<?= $fetch_product['product_id']; ?>">
            <img class="image" src="uploaded_img/<?= $fetch_product['image']; ?>" alt="">
            <h3 class="name"><?= $fetch_product['name']; ?></h3>
            <div class="flex">
               <span class="price">₱<?= $fetch_product['price']; ?></span>
               <input type="number" name="qty" class="qty" max="99" min="1" maxlength="2" required value="1">
            </div>
            <input type="submit" value="add to cart" name="add_to_cart" class="btn">
         </form>
         <?php
         }
         }else{
            echo '<p class="emtpy">no products added yet!</p>';
         }
         ?>

         </div>

      </section>
      <footer>
			<div class="copyright">
				<p>&copy; Copyright <?= date("Y", $copyright_date); ?>. All Rights Reserved. </p>
				<p>Created by De Guzman, Laurel & Ronquillo</p>
				<p>Valiant Esports</p>
			</div>

			<div class="social">
				<a href="https://www.facebook.com/valiantesports.hau" target="_blank" style="border-right: solid 2px #fff; font-size: 1.75em; text-decoration: none;">
					<img src="valiant_dweb/images/facebook-logo.png" alt="Facebook logo">
				</a>
				
				<a href="https://www.instagram.com/valiantesports.hau/?utm_source=ig_web_button_share_sheet&igshid=OGQ5ZDc2ODk2ZA==" target="_blank">
					<img src="valiant_dweb/images/instagram-logo.png" alt="Instagram logo">
				</a>
			</div>
			<a class="mobile" id="em" href ="mailto:valiantesportsclub@gmail.com"><span>valiantesportsclub@gmail.com</span></a>
			<a class="tablet-desktop" id="em" href ="mailto:valiantesportsclub@gmail.com"><span>valiantesportsclub@gmail.com</span></a>
			<br>
		</footer>
      </div>
      </div>
      
   </div>
   
<!-- sweet alert cdn link  -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>

   document.querySelectorAll('input[type="number"]').forEach(inputNumbmer => {
      inputNumbmer.oninput = () =>{
         if(inputNumbmer.value.length > inputNumbmer.maxLength) inputNumbmer.value = inputNumbmer.value.slice(0, inputNumbmer.maxLength);
      }
   });

</script>
<script src="valiant_dweb/scripts/script.js"></script> 
<script src="https://kit.fontawesome.com/d9fb717134.js" crossorigin="anonymous"></script> 
<?php include 'message.php'; ?>

</body>
</html>