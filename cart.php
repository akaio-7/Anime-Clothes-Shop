<?php 

include 'connect.php';

if (isset($_POST['add_to_cart'])) {
   
   if (isset($_COOKIE['cart_cookie'])) {
   

       $pid = $_POST['pid'];
       $user_cookie = $cookie_token;
       $name = $_POST['name'];
       $price = $_POST['price'];
       $image = $_POST['image'];

       $select_cart = $conn->prepare("SELECT * FROM cart WHERE pid=? AND user_cookie=? ");
       $select_cart->execute([$pid,$user_cookie]);

       if ( $select_cart->rowCount() > 0 ) {
           $message[] = 'product already in cart !';
       }else {
           $add_to_cart = $conn->prepare("INSERT INTO cart (user_cookie,pid,name,price,image) VALUES (:uco,:pid,:name,:price,:image)");
           $add_to_cart->bindParam(":uco",$user_cookie);
           $add_to_cart->bindParam(":pid",$pid);
           $add_to_cart->bindParam(":name",$name);
           $add_to_cart->bindParam(":price",$price);
           $add_to_cart->bindParam(":image",$image);
           $add_to_cart->execute();

           $message[] = 'product added to cart !';


       }

   }

}

if(isset($_POST['delete'])){
   $cart_id = $_POST['cart_id'];
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE id = ?");
   $delete_cart_item->execute([$cart_id]);
};

if(isset($_GET['delete_all'])){
   $delete_cart_item = $conn->prepare("DELETE FROM `cart` WHERE user_cookie = ?");
   $delete_cart_item->execute([$_COOKIE['cart_cookie']]);
   header('location:cart.php');
};

if(isset($_POST['update_qty'])){
   $cart_id = $_POST['cart_id'];
   $qty = $_POST['qty'];
   $qty = filter_var($qty, FILTER_SANITIZE_STRING);
   $update_qty = $conn->prepare("UPDATE `cart` SET quantity = ? WHERE id = ?");
   $update_qty->execute([$qty, $cart_id]);
   $message[] = 'cart quantity updated !';
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>off tak</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/design.css">

    <!-- custom css file link  -->
    <link rel="shortcut icon" type="x-icon" href="images/favicon.png" >

    <!-- jquery cdn link  -->
    <script src="https://code.jquery.com/jquery-3.1.1.js"></script>

</head>
<body>
    
<?php include 'header.php'; ?>

<section class="shop shopping-cart" id="cart">

   <h3 class="heading" >shopping cart</h3>

   <div class="box-container">

   <?php
      $user_cookie = '';
      if (isset($_COOKIE['cart_cookie'])) {
         $user_cookie = $_COOKIE['cart_cookie'];
      }
      $grand_total = 0;
      $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_cookie = ?");
      $select_cart->execute([$user_cookie]);
      if($select_cart->rowCount() > 0){
         while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
   ?>

   <form action="" method="post" class="box">
        <input type="hidden" name="cart_id" value="<?= $fetch_cart['id']; ?>">
        <div class="icons">
            <a href="quick_view.php?pid=<?= $fetch_cart['pid']; ?>" class="fas fa-eye"></a>
        </div>
        <div class="image">
            <img src="uploaded_img/<?= $fetch_cart['image']; ?>" alt="">
        </div>
        <div class="content">
            <h3><?= $fetch_cart['name']; ?></h3>
            <div class="price"><?= $fetch_cart['price']; ?> DH</div>
            
            <input type="number" name="qty" class="qty" min="1" max="99" onkeypress="if(this.value.length == 2) return false;" value="<?= $fetch_cart['quantity']; ?>">
            <button type="submit" class="fas fa-edit" name="update_qty"></button>

            <h4>color : <?php if($fetch_cart['color'] === ''){ echo 'please choose color'; }else{ echo $fetch_cart['color'];} ?></h4>
            <h4>size : <?php if($fetch_cart['size'] === ''){ echo 'please choose size'; }else{ echo $fetch_cart['size'];} ?></h4>

            <div class="sub-total"> sub total : <span><?= $sub_total = ($fetch_cart['price'] * $fetch_cart['quantity']); ?> DH</span> </div>
            <input type="submit" value="delete item" onclick="return confirm('delete this from cart?');" class="delete-btn" name="delete">
      </div>
   </form>
   <?php
   $grand_total += $sub_total;
      }
   }else{
      echo '<p class="empty">your cart is empty !</p>';
   }
   ?>
   </div>

   <div class="cart-total">
      <p>grand total : <span><?= $grand_total; ?> DH</span></p>
      <a href="index.php#shop" class="option-btn">continue shopping</a>
      <a href="cart.php?delete_all" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all items</a>
      <a href="checkout.php" class="success-btn <?= ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
   </div>

</section>

<?php include 'footer.php'; ?>

<!-- swiper cdn link -->
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- jquery cdn link -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>

<!-- custom js file link -->
<script src="js/script.js"></script>

<!-- custom js file link -->
<script src="js/multilang.js"></script>


</body>
</html>