<?php  

include '../connect.php' ;

session_start();
$admin_id = $_SESSION['admin_id'] ;

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_POST['add-attr'])) {

    $product_id = $_GET['update'];

    $color_hex = $_POST['color'];
    $color_hex = filter_var($color_hex,FILTER_SANITIZE_STRING) ;
    $size = $_POST['size'];
    $size = filter_var($size,FILTER_SANITIZE_STRING) ;

    $select_attr = $conn->prepare("SELECT * FROM products_attributes WHERE color  = ? AND size = ? AND product_id = ?");
    $select_attr->execute([$color_hex,$size,$product_id]);

    if ($select_attr->rowCount() > 0) {
        $message[] = 'attribute already exists !';
    }else {
        $add_attr = $conn->prepare("INSERT INTO products_attributes (product_id,color,size) VALUES (?,?,?)");
        $add_attr->execute([$product_id,$color_hex,$size]);
        $message[] = 'attribute added !';
    }

};

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];

    $delete_attr = $conn->prepare("DELETE FROM products_attributes WHERE id = ?");
    $delete_attr->execute([$delete_id]);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>attributes</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">

    <!-- custom css file link  -->
    <link rel="shortcut icon" type="x-icon" href="../images/favicon.png" >

</head>
<body>


<?php

if (isset($message)) {
    foreach ($message as $message) {
        echo '<div class="message">
        <span>'.$message.'</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();" ></i>
    </div>' ;
    }
}

?>

<?php 
include 'admin_header.php' ;
?>


<section class="add-products">
    <h3 class="heading">add attribute</h3>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="flex">
            <div class="inputBox">
                <span>product color (required)    </span>
                <input type="color" name="color" required >
            </div>

            <div class="inputBox">
                <span>product size (required)</span>
                <select name="size" class="box">
                    <option value="" selected disabled >select category</option>               
                    <option value="S">S</option>
                    <option value="M">M</option>
                    <option value="L">L</option>
                    <option value="XL">XL</option>
                    <option value="2XL">2XL</option>
                    <option value="3XL">3XL</option>
                    <option value="4XL">4XL</option>
                </select>
            </div>

            <input type="submit" name="add-attr" value="add attribute" class="btn">
        </div>
    </form>

</section>

<section class="show-products">
    <h3 class="heading">show attributes</h3>
    <div class="box-container">

    <?php 
    $product_id = $_GET['update'];

    $show_attributes = $conn->prepare("SELECT * FROM products_attributes WHERE product_id = ?");
    $show_attributes->execute([$product_id]);
    if ($show_attributes->rowCount() > 0) {
        while ($row = $show_attributes->fetch(PDO::FETCH_ASSOC) ) {
    ?>
    <div class="box">
        <div class="color" style="width:4rem;height:2rem;background-color:<?= $row['color']; ?>;border:var(--border);" ></div>
        <span><?= $row['color']; ?></span>
        <div class="size">size : <?= $row['size']; ?></div>
        <div class="flex-btn">
            <a href="attributes.php?update=<?= $product_id; ?>&delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('delete this product ?');" >delete</a>
            <a href="products.php" class="option-btn">go back</a>
        </div>
    </div>
    <?php
        }
    }else {
        echo '<p class="empty" >no attribute added yet !</p>';
    }
    ?>

    </div>

</section>


<!-- custom js file link -->
<script src="../js/admin_script.js" ></script>

</body>
</html>