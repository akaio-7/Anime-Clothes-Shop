<?php 

include 'connect.php';

if(isset($_POST['order'])){

    $user_cookie = $_COOKIE['cart_cookie'];

    $name = $_POST['name'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);

    $number = $_POST['number'];
    $number = filter_var($number, FILTER_SANITIZE_STRING);

    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    $method = $_POST['method'];
    $method = filter_var($method, FILTER_SANITIZE_STRING);

    $address = '%0Aregion : '.$_POST['state'].'%0Aville : '.$_POST['city'].'%0Apostale code : '.$_POST['pin_code'].'%0Aaddress : '.$_POST['address'] ;
    $address = filter_var($address, FILTER_SANITIZE_STRING);

    $total_products = $_POST['total_products'];
    $total_price = $_POST['total_price'];
 
    $check_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_cookie = ?");
    $check_cart->execute([$user_cookie]);
 
    if($check_cart->rowCount() > 0){
 
       $insert_order = $conn->prepare("INSERT INTO `orders`(user_cookie, name, number, email, method, address, total_products, total_price) VALUES(?,?,?,?,?,?,?,?)");
       $insert_order->execute([$user_cookie, $name, $number, $email, $method, str_replace('%0A','',$address), str_replace('%0A','',$total_products), $total_price]);
 
       $delete_cart = $conn->prepare("DELETE FROM `cart` WHERE user_cookie = ?");
       $delete_cart->execute([$user_cookie]);
 
       $message[] = 'order placed successfully!';

       $whatsapp_order="je veux ce produit : {$total_products}%0A%0A🙍‍♂️ nom et prénom : {$name}%0A%0A📞 numéro de téléphone : {$number}%0A%0A✉ email : {$email}%0A%0A📮 address : {$address}%0A%0A💰 prix : {$total_price} DH";

       header('location:https://api.whatsapp.com/send?phone=34642552247&text='.$whatsapp_order.'&souce=&data=');

    }else{
       $message[] = 'your cart is empty';
    }
 
 }

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

<section class="checkout-orders">

   <form action="" method="POST">

   <h3 id="w1" >your orders</h3>

      <div class="display-orders">
      <?php
         $user_cookie = $_COOKIE['cart_cookie'];

         $grand_total = 0;
         $cart_items[] = '';
         $select_cart = $conn->prepare("SELECT * FROM `cart` WHERE user_cookie = ?");
         $select_cart->execute([$user_cookie]);
         if($select_cart->rowCount() > 0){
            while($fetch_cart = $select_cart->fetch(PDO::FETCH_ASSOC)){
               $color = str_replace('#','',$fetch_cart['color']);
               $cart_items[] = '%0A▫'.$fetch_cart['name'].' ('.$fetch_cart['price'].'dh x '. $fetch_cart['quantity'].') { size :'.$fetch_cart['size'].' / color : '.$color.' }';
               $total_products = implode($cart_items);
               $grand_total += ($fetch_cart['price'] * $fetch_cart['quantity']);
      ?>
         <p> <?= $fetch_cart['name']; ?> { <?= $fetch_cart['color']; ?> - <?= $fetch_cart['size']; ?> } <span>(<?= $fetch_cart['price'].'DH x '. $fetch_cart['quantity']; ?>)</span> </p>
      <?php
            }
         }else{
            echo '<p class="empty">your cart is empty!</p>';
         }
      ?>
         <input type="hidden" name="total_products" value="<?= $total_products; ?>">
         <input type="hidden" name="total_price" value="<?= $grand_total; ?>" value="">
         <div class="grand-total">grand total : <span><?= $grand_total; ?> DH</span></div>
      </div>

      <h3 id="w2" >place your orders</h3>

      <div class="flex">
         <div class="inputBox">
            <span>full name</span>
            <input type="text" name="name" placeholder="enter your full name" class="box" maxlength="20" required>
         </div>

         <div class="inputBox">
            <span>email</span>
            <input type="email" name="email" placeholder="enter your email" class="box" maxlength="50" required>
         </div>

         <div class="inputBox">
            <span>phone number</span>
            <input type="text" name="number" placeholder="enter your number" class="box" min="0" max="9999999999" onkeypress="if(this.value.length == 10) return false;" required>
         </div>

         <div class="inputBox">
            <span>payment method</span>
            <select name="method" class="box" required>
               <option value="cash on delivery">cash on delivery</option>
               <option value="credit card">whatsapp</option>
               <option value="paypal">paypal</option>
            </select>
         </div>

         <div class="inputBox">
            <span>delivery address</span>
            <input type="text" name="address" placeholder="neighborhood / street / house number" class="box" maxlength="50" required>
         </div>

         <div class="inputBox">
            <span>region</span>
            <input type="text" name="state" placeholder="casablanca-settat" class="box" maxlength="50" required>
         </div>

         <div class="inputBox">
            <span>city</span>
            <input type="text" name="city" placeholder="casablanca" class="box" maxlength="50" required>
         </div>

         <div class="inputBox">
            <span>postal code</span>
            <input type="number" min="0" name="pin_code" placeholder="20200" min="0" max="999999" onkeypress="if(this.value.length == 6) return false;" class="box" required>
         </div>

      </div>

      <input type="submit" name="order" class="delete-btn <?= ($grand_total > 1)?'':'disabled'; ?>" value="place order">

   </form>

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