<?php  

include '../connect.php' ;

session_start();
$admin_id = $_SESSION['admin_id'] ;

if (!isset($admin_id)) {
    header('location:login.php');
};

if (isset($_POST['submit'])) {

    $pid = $_POST['pid'];
    // define name & price & details
    $name = filter_var($_POST['name'],FILTER_SANITIZE_STRING) ;

    $update_product = $conn->prepare("UPDATE categories SET name = :name WHERE id = :pid");
    $update_product->bindParam(":pid",$pid);
    $update_product->bindParam(":name",$name);
    $update_product->execute();
    $message[] = 'product updated successfully !';

    $old_img_01 = $_POST['old_img_01'];
    $image_01 = $_FILES['image_01']['name'];
    $image_01 = filter_var($image_01,FILTER_SANITIZE_STRING);
    $image_01_size = $_FILES['image_01']['size'];
    $image_01_tmp_name = $_FILES['image_01']['tmp_name'];
    $image_01_path = '../categories_img/'.$image_01 ;

    if (!empty($image_01)) {
        if ($image_01_size > 2000000) {
            $message[] = 'image is too large !';
        }else {
            $update_img_01 = $conn->prepare("UPDATE categories SET image = :img1 WHERE id = :pid");
            $update_img_01->bindParam(":pid",$pid);
            $update_img_01->bindParam(":img1",$image_01);
            $update_img_01->execute();
            move_uploaded_file($image_01_tmp_name,$image_01_path);
            unlink('../categories_img/'.$old_img_01);
            $message[] = 'image updated !';
        }
    }


};

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

<section class="update-product">
<h1 class="heading">update category</h1>
<?php 

    $update_id = $_GET['update'];
    $select_category = $conn->prepare("SELECT * FROM categories WHERE id = :uid");
    $select_category->bindParam(":uid",$update_id);
    $select_category->execute();
    if ($select_category->rowCount() > 0) {
        while ($row = $select_category->fetch(PDO::FETCH_ASSOC) ) {
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="image-container">
            <div class="main-image">
                <img src="../categories_img/<?= $row['image']; ?>" alt="">
            </div>
        </div>
        <input type="hidden" name="pid" value="<?= $row['id']; ?>">
        <input type="hidden" name="old_img_01" value="<?= $row['image']; ?>" >
        <input type="text" placeholder="enter category name" name="name" value="<?= $row['name']; ?>" maxlength="100" class="box" required >
        <input type="file" name="image_01" accept="image/jpg,image/jpeg,image/png,image/webp" class="box"  >
        <div class="flex-btn">
            <input type="submit" name="submit" value="update" class="btn">
            <a href="categories.php" class="option-btn" >go back</a>
        </div>
    </form>
    <?php
        }
    }else {
        echo '<p class="empty" >no category added yet !</p>';
    }
    ?>

</section>


</body>
</html>