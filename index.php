<?php 

include 'connect.php';

if (isset($_COOKIE['cart_cookie'])) {

    

}else {
    
    function getName() {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
      
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $randomString .= $characters[$index];
        }
      
        return $randomString;
    }
    
    $cookie_token = getName();
    
    setcookie("cart_cookie",$cookie_token,time() + 86400);
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
    <link rel="shoetcut icon" type="x-icon" href="images/favicon.png" >

</head>
<body>
    
<?php include 'header.php'; ?>

<!-- home section starts  -->

<section class="home" id="home">

    <div class="content">
        <span>special offer</span>
        <h3>sale upto 50% off</h3>
        <a href="#" class="btn">shop now</a>
    </div>

    <div class="image">
        <img src="images/home-chari.png" alt="">
    </div>

</section>

<!-- home section ends -->

<!-- category section starts  -->

<section class="category">

    <h1 class="heading"> shop by <span>category</span> </h1>

    <div class="box-container">

    <?php 
    $show_categories = $conn->prepare("SELECT * FROM categories");
    $show_categories->execute();
    if ($show_categories->rowCount() > 0) {
        while ($row = $show_categories->fetch(PDO::FETCH_ASSOC) ) {
    ?>
        <div class="box">
            <img src="images/cat-3.jpg" alt="">
            <img class="cat" src="categories_img/<?= $row['image']; ?>" alt="">
            <div class="content">
                <h3><?= $row['name']; ?></h3>
                <a href="#shop" class="btn">shop now</a>
            </div>
        </div>
    <?php
        }
    }else {
        echo '<p class="empty" >no category added yet !</p>';
    }
    ?>
    </div>

</section>

<!-- category section ends -->

<!-- latest section starts  -->

<section class="products" id="products">

<h1 class="heading"> latest <span>products</span> </h1>

<div class="swiper-container product-slider gap">
    <div class="swiper-wrapper">

    <?php 
    $show_products = $conn->prepare("SELECT * FROM products");
    $show_products->execute();
    if ($show_products->rowCount() > 0) {
        while ($row = $show_products->fetch(PDO::FETCH_ASSOC) ) {
    ?>
        <div class="swiper-slide" action="" method="post" >
            <div class="slide">
                <div class="icons">
                    <a href="quick_view.php?pid=<?= $row['id']; ?>" class="fas fa-eye"></a>
                </div>
                <div class="image">
                    <img src="uploaded_img/<?= $row['image_01']; ?>" alt="">
                </div>
                <div class="content">
                    <h3><?= $row['name']; ?></h3>
                    <div class="price"><?= $row['price']; ?> DH</div>
                    <a href="quick_view.php?pid=<?= $row['id']; ?>" class="btn" >add to cart</a>
                </div>
            </div>
        </div>
    <?php
        }
    }else {
        echo '<p class="empty" >no products added yet !</p>';
    }
    ?>
   
    </div>
</div>

</section>

<!-- latest section ends -->

<!-- products section starts -->

<section class="shop" id="shop">

<h1 class="heading"> our <span>products</span> </h1>

<div class="box-container">

    <?php 

    $show_products = $conn->prepare("SELECT * FROM products");
    $show_products->execute();
    if ($show_products->rowCount() > 0) {
        while ($row = $show_products->fetch(PDO::FETCH_ASSOC) ) {
    ?>
    <div class="box"  action="" method="post" >
        <div class="icons">
            <a href="quick_view.php?pid=<?= $row['id']; ?>" class="fas fa-eye"></a>
        </div>
        <div class="image">
            <img src="uploaded_img/<?= $row['image_01']; ?>" alt="">
        </div>
        <div class="content">
            <h3><?= $row['name']; ?></h3>
            <div class="price"><?= $row['price']; ?> DH</div>
            <a href="quick_view.php?pid=<?= $row['id']; ?>" class="btn">add to cart</a>
        </div>
    </div>
    <?php
        }
    }else {
        echo '<p class="empty" >sorry, no products added yet !</p>';
    }
    ?>

</div>

</section>

<!-- products section ends  -->

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