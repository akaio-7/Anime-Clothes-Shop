<?php 

include 'connect.php';


if (isset($_POST['add_to_cart'])) {
    
    if (isset($_COOKIE['cart_cookie'])) {
    

        $pid = $_POST['pid'];
        $user_cookie = $_COOKIE['cart_cookie'];
        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['qty'];
        $image = $_POST['image'];

        if (!isset($_POST['color']) OR !isset($_POST['size'])) {

            $message[] = 'please choose color and size !';

        }else {
            $ccolor = $_POST['color'];
            $csize = $_POST['size'];

        $select_cart = $conn->prepare("SELECT * FROM cart WHERE pid=? AND user_cookie=? ");
        $select_cart->execute([$pid,$user_cookie]);

    
        if ( $select_cart->rowCount() > 0 ) {

            $message[] = 'product already in cart !';

        }else {
            $add_to_cart = $conn->prepare("INSERT INTO cart (user_cookie,pid,name,price,quantity,image,color,size) VALUES (:uco,:pid,:name,:price,:qty,:image,:color,:size)");
            $add_to_cart->bindParam(":uco",$user_cookie);
            $add_to_cart->bindParam(":pid",$pid);
            $add_to_cart->bindParam(":name",$name);
            $add_to_cart->bindParam(":price",$price);
            $add_to_cart->bindParam(":qty",$quantity);
            $add_to_cart->bindParam(":image",$image);
            $add_to_cart->bindParam(":color",$ccolor);
            $add_to_cart->bindParam(":size",$csize);
            $add_to_cart->execute();

            $message[] = 'product added to cart !';


            }
    
        }

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

<section class="quick-view">

    <h3 class="heading">quick view</h3>

            
    <?php 
            $pid = $_GET['pid'];
            $select_products = $conn->prepare("SELECT * FROM products WHERE id = ?");
            $select_products->execute([$pid]);
            if ($select_products->rowCount() > 0) {
                while ($row = $select_products->fetch(PDO::FETCH_ASSOC) ) {
            ?>
            
            <form action="" method="post" class="box" >
                <div class="row">
                    <input type="hidden" name="pid" value="<?= $row['id']; ?>" >
                    <input type="hidden" name="name" value="<?= $row['name']; ?>" >
                    <input type="hidden" name="price" value="<?= $row['price']; ?>" >
                    <input type="hidden" name="image" value="<?= $row['image_01']; ?>" >
                    <div class="image-container">
                        <div class="main-image" >
                            <img src="uploaded_img/<?= $row['image_01']; ?>" alt="">
                        </div>
                        <div class="sub-image">
                        <?php 
                            $pid = $_GET['pid'];
                            $select_imgs = $conn->prepare("SELECT image_01,image_03,image_02,image_04 FROM products WHERE id = ?");
                            $select_imgs->execute([$pid]);
                            
                            while ($row_img = $select_imgs->fetch(PDO::FETCH_ASSOC) ) {
                                foreach ($row_img as $img) {
                                    if ($img === '') {
                                    }else {
                                        ?>
                                        <img src="uploaded_img/<?= $img; ?>">
                                        <?php
                                    }
                                }
                            }
                        ?>

                        </div>
                    </div>

                    <div class="content">
                        <div class="name"><?= $row['name']; ?></div>
                        <div class="price"><?= $row['price']; ?> DH</div>
                        <div class="details"><?= $row['details']; ?></div>

                        <!-- Color -->

                        <div class="colors-container">
                            <span>color :</span>
                            <div class="colors">
                                <?php 

                                $pid = $_GET['pid'];

                                $select_colors = $conn->prepare("SELECT color FROM products_attributes WHERE product_id = ?");
                                $select_colors->execute([$pid]);

                                $couleur;
                                $colors = array();

                                while ($row = $select_colors->fetch(PDO::FETCH_ASSOC)) {

                                    if (!in_array($row['color'],$colors)) {
                                        array_push($colors,$row['color']);
                                    }
                                }

                                foreach ($colors as $color) {                                    
                                ?>
                                <input type="radio" class="check-color" name="color" id="<?= str_replace('#','',$color); ?>" value="<?= $color; ?>" hidden>
                                <label id="<?= str_replace('#','',$color); ?>" class="color" style="background-color:<?= $color ; ?>;" for="<?= str_replace('#','',$color); ?>"></label>
                                <?php
                                    }
                                ?>
                            </div>               
                        </div>

                        <div class="size-container">
                            <span>size :</span>
                            <div class="sizes">
                            <?php 
                                $pid = $_GET['pid'];

                                $select_sizes = $conn->prepare("SELECT size FROM products_attributes WHERE product_id = ?");
                                $select_sizes->execute([$pid]);

                                $sizes = array();

                                while ($row = $select_sizes->fetch(PDO::FETCH_ASSOC)) {
                            
                                    if (!in_array($row['size'],$sizes)) {
                                        array_push($sizes,$row['size']);
                                    }
                                }

                                foreach ($sizes as $size) {                                    
                                ?>
                                <input type="radio" class="check-size" name="size" id="<?= str_replace('#','',$size); ?>" value="<?= $size; ?>" hidden>
                                <label id="<?= str_replace('#','',$size); ?>" class="size" style="background-color:<?= $size ; ?>;" for="<?= str_replace('#','',$size); ?>"><?= $size; ?></label>
                                <?php
                                    }
                                ?>
                            </div>
                        </div>

                        <span style="font-size:2rem;">quantity :</span>
                        <input type="number" name="qty" class="qty" min="1" max="99" value="1" onkeypress="if(this.value.length > 2 ) return false;" >
                        <input type="submit" value="add to cart" name="add_to_cart" class="btn" >
                    </div>
                </div>
            </form>
            
        <?php
            }
        }else {
            echo '<p class="empty" >no products added yet !</p>';
        }
        ?>


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