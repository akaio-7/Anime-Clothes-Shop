<?php  

include '../connect.php' ;

session_start();
$admin_id = $_SESSION['admin_id'] ;

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_POST['add-category'])) {

    // define name
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING) ;

    // define image

    $image = $_FILES['image']['name'];
    $image = filter_var($image,FILTER_SANITIZE_STRING);
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_path = '../categories_img/'.$image ;


    $select_categories = $conn->prepare("SELECT * FROM categories WHERE name = :pname");
    $select_categories->bindParam(":pname",$name);
    $select_categories->execute();

    if ($select_categories->rowCount() > 0) {
        $message[] = 'category name already exist !';
    }else {
        
        if ($image_size > 2000000) {
            $message[] = 'image size is too large !';
        }else {

            move_uploaded_file($image_tmp_name,$image_path);

            $insert_category = $conn->prepare("INSERT INTO categories (name,image) VALUES (?,?)");
            $insert_category->execute([$name,$image]);
            $message[] = 'category added !';

        }

    }

};

if (isset($_GET['delete'])) {

    $delete_id = $_GET['delete'];
    
    $delete_product_images = $conn->prepare("SELECT * FROM categories WHERE id = ? ");
    $delete_product_images->execute([$delete_id]);

    $row = $delete_product_images->fetch(PDO::FETCH_ASSOC);
    unlink("../categories_img/".$row['image']);

    $delete_product = $conn->prepare("DELETE FROM categories WHERE id = ?");
    $delete_product->execute([$delete_id]);

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>category update</title>

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
    <h3 class="heading">add category</h3>
    <form action="" method="POST" enctype="multipart/form-data" >
        <div class="flex">
            <div class="inputBox">
                <span>category name (required)</span>
                <input type="text" placeholder="enter product name" name="name" maxlength="100" class="box" required >
            </div>

            <div class="inputBox">
                <span>image 01 (required)</span>
                <input type="file" name="image" accept="image/jpg,image/jpeg,image/png,image/webp" class="box" required >
            </div>
            <input type="submit" name="add-category" value="add category" class="btn">
        </div>
    </form>

</section>

<section class="show-products">
    <h3 class="heading">show categories</h3>
    <div class="box-container">

    <?php 
    $show_categories = $conn->prepare("SELECT * FROM categories");
    $show_categories->execute();
    if ($show_categories->rowCount() > 0) {
        while ($row = $show_categories->fetch(PDO::FETCH_ASSOC) ) {
    ?>
    <div class="box">
        <img src="../categories_img/<?= $row['image']; ?>" alt="">
        <div class="name"><?= $row['name']; ?></div>
        <br>
        <div class="flex-btn">
            <a href="update_categories.php?update=<?= $row['id']; ?>" class="option-btn">update</a>
            <a href="categories.php?delete=<?= $row['id']; ?>" class="delete-btn" onclick="return confirm('delete this category ?');" >delete</a>
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


<!-- custom js file link -->
<script src="../js/admin_script.js" ></script>

</body>
</html>