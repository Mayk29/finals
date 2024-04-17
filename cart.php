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

include 'connect.php';

if(isset($_POST['update_qty'])){

   $update_id = $_POST['cart_id'];
   $update_id = filter_var($update_id, FILTER_SANITIZE_STRING);
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);

   $update_cart = $conn->prepare("UPDATE `cart` SET qty = ? WHERE id = ?");
   $update_cart->execute([$qty, $update_id]);

   $success_message[] = 'cart quantity updated!';

}

if(isset($_POST['remove_item'])){

   $delete_id = $_POST['cart_id'];
   $delete_id = filter_var($delete_id, FILTER_SANITIZE_STRING);

   $verify_item = $conn->prepare("SELECT * FROM `cart` WHERE id = ?");
   $verify_item->execute([$delete_id]);

   if($verify_item->rowCount() > 0){
      $delete_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
      $delete_item->execute([$delete_id]);
      $success_message[] = 'cart item removed!';
   }else{
      $warning_message[] = 'cart item already deleted!';
   }

}

if(isset($_POST['delete_all'])){

   $verify_cart = $conn->prepare("SELECT * FROM `cart` WHERE cart_id = ?");
   $verify_cart->execute([$user_id]);

   if($verify_cart->rowCount() > 0){
      $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE cart_id = ?");
      $delete_cart->execute([$user_id]);
      $success_message[] = 'deleted all from cart!';
   }else{
      $warning_message[] = 'cart items deleted already!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Product Cart | Valiant Esports</title>
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
                                <a href="index.php?logout=<?php echo $user_id; ?>"><i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal" style="color: #fafafa; padding-left: 1em; "></i>  Log Out</a>
                            </div>
                        </li>
                    </ul>
                    
            </nav>
	    </div>


      <section class="products">

         <section>
            <h1 class="heading">Valiant Shop</h1>
         </section>
         <div class="box-container">

         <?php
            $grand_total = 0;
            $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE cart_id = ?");
            $select_cart->execute([$user_id]);
            if($select_cart->rowCount() > 0){
               while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
                  $select_products = $conn->prepare("SELECT * FROM `products` WHERE product_id = ?");
                  $select_products->execute([$fetch_cart['product_id']]);
                  $fetch_product = $select_products->fetch(PDO::FETCH_ASSOC);
         ?>
         <form action="" method="POST" class="box">
            <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
            <img class="image" src="uploaded_img/<?= $fetch_product['image']; ?>" alt="">
            <h3 class="name"><?= $fetch_product['name']; ?></h3>
            <div class="flex">
               <span class="price">₱<?= $fetch_product['price']; ?></span>
               <input type="number" name="qty" class="qty" max="99" min="1" maxlength="2" required value="<?= $fetch_cart['qty']; ?>">
               <button type="submit" name="update_qty" class="fas fa-edit"></button>
            </div>
            <p class="sub-total"><span>sub total : ₱</span> <?= $sub_total = ($fetch_cart['qty'] * $fetch_product['price']); ?></p>
            <input type="submit" value="remove from cart" name="remove_item" class="delete-btn"  onclick="return confirm('delete this from cart?');">
         </form>
         <?php
            $grand_total += $sub_total;
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
         ?>
         
         </div>

      </section>

      <section>

         <form action="" class="count-container" method="POST">
            <p>grand total : ₱<span><?= $grand_total; ?></span></p>
            <input type="submit" value="delete all" name="delete_all" onclick="return confirm('delete all from cart?');" class="inline-delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>">
         </form>

         <div class="flex-btn" style="margin-top: 30px;">
            <a href="products.php" class="inline-option-btn">continue shopping</a>
            <a href="#" class="inline-btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
         </div>

      </section>
      </div>
      </div>
      </div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script src="https://kit.fontawesome.com/d9fb717134.js" crossorigin="anonymous"></script>
<script>

   document.querySelectorAll('input[type="number"]').forEach(inputNumbmer => {
      inputNumbmer.oninput = () =>{
         if(inputNumbmer.value.length > inputNumbmer.maxLength) inputNumbmer.value = inputNumbmer.value.slice(0, inputNumbmer.maxLength);
      }
   });

</script>
<script src="valiant_dweb/scripts/script.js"></script>   
<?php include 'message.php'; ?>

</body>
</html>