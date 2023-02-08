<?php  

include '../connect.php' ;

session_start();
$admin_id = $_SESSION['admin_id'] ;

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_POST['add-product'])) {

    // define name & price & details
    $p_name = filter_var($_POST['p_name'],FILTER_SANITIZE_STRING) ;
    $p_price = filter_var($_POST['p_price'],FILTER_SANITIZE_STRING) ;
    $p_category = filter_var($_POST['p_category'],FILTER_SANITIZE_STRING) ;
    $p_details = filter_var($_POST['p_details'],FILTER_SANITIZE_STRING) ;

    // define images

    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01,FILTER_SANITIZE_STRING);
    $image_01_size = $_FILES['image_01']['size'];
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_path = '../uploaded_img/'.$image_01 ;

    $image_02 = $_FILES['image_02']['name'];
    $image_02 = filter_var($image_02,FILTER_SANITIZE_STRING);
    $image_02_size = $_FILES['image_02']['size'];
    $image_02_tmp_name = $_FILES['image_02']['tmp_name'];
    $image_02_path = '../uploaded_img/'.$image_02 ;

    $image_03 = $_FILES['image_03']['name'];
    $image_03 = filter_var($image_03,FILTER_SANITIZE_STRING);
    $image_03_size = $_FILES['image_03']['size'];
    $image_03_tmp_name = $_FILES['image_03']['tmp_name'];
    $image_03_path = '../uploaded_img/'.$image_03 ;

    $image_04 = $_FILES['image_04']['name'];
    $image_04 = filter_var($image_04,FILTER_SANITIZE_STRING);
    $image_04_size = $_FILES['image_04']['size'];
    $image_04_tmp_name = $_FILES['image_04']['tmp_name'];
    $image_04_path = '../uploaded_img/'.$image_04 ;

    $select_products = $conn->prepare("SELECT * FROM products WHERE name = :pname");
    $select_products->bindParam(":pname",$p_name);
    $select_products->execute();

    if ($select_products->rowCount() > 0) {
        $message[] = 'product name already exist !';
    }else {
        
        if ($image_01_size > 2000000 OR $image_02_size > 2000000 OR $image_03_size > 2000000) {
            $message[] = 'image size is too large !';
        }else {

            move_uploaded_file($image_01_tmp_name,$image_01_path);
            move_uploaded_file($image_02_tmp_name,$image_02_path);
            move_uploaded_file($image_03_tmp_name,$image_03_path);
            move_uploaded_file($image_04_tmp_name,$image_03_path);

            $insert_product = $conn->prepare("INSERT INTO products (name,details,price,image_01,image_02,image_03,category,image_04) VALUES (:name,:details,:price,:img1,:img2,:img3,:cat,:img4)");
            $insert_product->bindParam(":name",$p_name);
            $insert_product->bindParam(":details",$p_details);
            $insert_product->bindParam(":price",$p_price);
            $insert_product->bindParam(":img1",$image_01);
            $insert_product->bindParam(":img2",$image_02);
            $insert_product->bindParam(":img3",$image_03);
            $insert_product->bindParam(":img4",$image_04);
            $insert_product->bindParam(":cat",$p_category);
            $insert_product->execute();
            $message[] = 'product added !';

        }

    }

};

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];
    
    $delete_product_images = $conn->prepare("SELECT * FROM products WHERE id = ? ");
    $delete_product_images->execute([$delete_id]);

    $row = $delete_product_images->fetch(PDO::FETCH_ASSOC);

    if (file_exists("../uploaded_img/".$row['image_01'])) {
        unlink("../uploaded_img/".$row['image_01']);
    }
    
    if (file_exists("../uploaded_img/".$row['image_02'])) {
        unlink("../uploaded_img/".$row['image_02']);
    }
    
    if (file_exists("../uploaded_img/".$row['image_03'])) {
        unlink("../uploaded_img/".$row['image_03']);
    }
    
    if (file_exists("../uploaded_img/".$row['image_04'])) {
        unlink("../uploaded_img/".$row['image_04']);
    }

    $delete_product = $conn->prepare("DELETE FROM products WHERE id = ?");
    $delete_product->execute([$delete_id]);

    $delete_attr = $conn->prepare("DELETE FROM products_attributes WHERE product_id = ?");
    $delete_attr->execute([$delete_id]);

    header("location:products.php");

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>profile update</title>

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
    <h3 class="heading">add products</h3>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="flex">
            <div class="inputBox">
                <span>product name (required)</span>
                <input type="text" placeholder="enter product name" name="p_name" maxlength="100" class="box" required >
            </div>
            <div class="inputBox">
                <span>product price (required)</span>
                <input type="number" placeholder="enter product price" name="p_price" maxlength="100" class="box" required >
            </div>

            <div class="inputBox">
                <span>product category (optional)</span>
                <select name="p_category" class="box">
                    <option value="" selected disabled >select category</option>
                    <?php 
                    $select_categories = $conn->prepare("SELECT * FROM categories");
                    $select_categories->execute();
                    if ($select_categories->rowCount() > 0) {
                        while ($row = $select_categories->fetch(PDO::FETCH_ASSOC)) {
                    ?>
                    <option value="<?= $row['name']; ?>"><?= $row['name']; ?></option>
                    <?php
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="inputBox">
                <span>image 01 (required)</span>
                <input type="file" name="image_01" accept="image/jpg,image/jpeg,image/png,image/webp" class="box" required >
            </div>
            <div class="inputBox">
                <span>image 02 (optional)</span>
                <input type="file" name="image_02" accept="image/jpg,image/jpeg,image/png,image/webp" class="box">
            </div>
            <div class="inputBox">
                <span>image 03 (optional)</span>
                <input type="file" name="image_03" accept="image/jpg,image/jpeg,image/png,image/webp" class="box">
            </div>
            <div class="inputBox">
                <span>image 04 (optional)</span>
                <input type="file" name="image_04" accept="image/jpg,image/jpeg,image/png,image/webp" class="box">
            </div>
            <div class="inputBox">
                <span>product details (required)</span>
                <textarea name="p_details" placeholder="enter product details" cols="15" rows="5" class="box" required></textarea>
            </div>
            <input type="submit" name="add-product" value="add product" class="btn">
        </div>
    </form>

</section>

<section class="show-products">
    <h3 class="heading">show products</h3>
    <div class="box-container">

    <?php 
    $show_products = $conn->prepare("SELECT * FROM products");
    $show_products->execute();
    if ($show_products->rowCount() > 0) {
        while ($row = $show_products->fetch(PDO::FETCH_ASSOC) ) {
    ?>
    <div class="box">
        <img src="../uploaded_img/<?= $row['image_01']; ?>" alt="">
        <div class="name"><?= $row['name']; ?></div>
        <div class="price"><?= $row['price']; ?> MAD</div>
        <div class="category"><?= $row['category']; ?></div>
        <div class="details"><?= $row['details']; ?></div>
        <div class="flex-btn">
            <a href="update_product.php?update=<?= $row['id']; ?>" class="option-btn">update</a>
            <a href="products.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('delete this product ?');" >delete</a>
        </div>
        <a href="attributes.php?update=<?= $row['id']; ?>" class="btn">attributes</a>
    </div>
    <?php
        }
    }else {
        echo '<p class="empty" >no products added yet !</p>';
    }
    ?>

    </div>

</section>


<!-- custom js file link -->
<script src="../js/admin_script.js" ></script>

</body>
</html>