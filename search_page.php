<?php 

include 'connect.php';

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


<!-- search section starts -->

<?php if (isset($_POST['search_box'])) {
        
    $search_box = filter_var($_POST['search_box'], FILTER_SANITIZE_STRING);

?>

<section class="shop" id="search">

    <h1 class="heading"> search <span>results</span> </h1>

    <div class="box-container">
        
        <?php 

            $select_results = $conn->prepare("SELECT * FROM products WHERE name LIKE '%{$search_box}%' OR category LIKE '%{$search_box}%' ");
            $select_results->execute();
            if ($select_results->rowCount() > 0) {
                while ($row = $select_results->fetch(PDO::FETCH_ASSOC)) {
                    
                
        ?>

            <div action="" method="post" class="box" >
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
                echo "<p class='empty' >Result Not Found !</p>";

            }

        ?>

    </div>

</section>

<?php } ?>


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