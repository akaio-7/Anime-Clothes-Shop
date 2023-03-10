<?php  

include '../connect.php' ;

session_start();
$admin_id = $_SESSION['admin_id'] ;

if (!isset($admin_id)) {
    header('location:login.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>dashboard</title>

    <!-- font awesome cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- custom css file link -->
    <link rel="stylesheet" href="../css/admin_style.css">

    <!-- custom css file link  -->
    <link rel="shortcut icon" type="x-icon" href="../images/favicon.png" >

</head>
<body>

<?php include 'admin_header.php' ; ?>

<section class="dashboard">
    <div class="box-container">


        <div class="box">
            <h3>welcome !</h3>
            <p><?= $fetch_profile['name']; ?></p>
            <a href="update_profile.php" class="btn" >update profile</a>
        </div>

        <div class="box">
            <?php 
                $total_pendings = 0;
                $select_pendings = $conn->prepare("SELECT * FROM orders WHERE payment_status = ? ");
                $select_pendings->execute(['pending']);
                while ($fetch_pendings = $select_pendings->fetch(PDO::FETCH_ASSOC)) {
                    $total_pendings += $fetch_pendings['total_price'];
                }
            ?>
            <h3><?= $total_pendings; ?> DH</h3>
            <p>total pendings</p>
            <a href="placed_orders.php" class="btn" >see orders</a>
        </div>

        <div class="box">
            <?php 
                $total_completes = 0;
                $select_completes = $conn->prepare("SELECT * FROM orders WHERE payment_status = ? ");
                $select_completes->execute(['completed']);
                while ($fetch_completes = $select_completes->fetch(PDO::FETCH_ASSOC)) {
                    $total_completes += $fetch_completes['total_price'];
                }
            ?>
            <h3><?= $total_completes; ?> DH</h3>
            <p>total completes</p>
            <a href="placed_orders.php" class="btn" >see orders</a>
        </div>

        <div class="box">
            <?php 
                $select_orders = $conn->prepare("SELECT * FROM orders");
                $select_orders->execute();
                $number_of_orders = $select_orders->rowCount();
            ?>
            <h3><?= $number_of_orders; ?></h3>
            <p>total orders</p>
            <a href="placed_orders.php" class="btn" >see orders</a>
        </div>

        <div class="box">
            <?php 
                $select_orders = $conn->prepare("SELECT * FROM categories");
                $select_orders->execute();
                $number_of_orders = $select_orders->rowCount();
            ?>
            <h3><?= $number_of_orders; ?></h3>
            <p>total categories</p>
            <a href="categories.php" class="btn" >see categories</a>
        </div>

        <div class="box">
            <?php 
                $select_products = $conn->prepare("SELECT * FROM products ");
                $select_products->execute();
                $number_of_products = $select_products->rowCount();
            ?>
            <h3><?= $number_of_products; ?></h3>
            <p>total products</p>
            <a href="products.php" class="btn" >see products</a>
        </div>

        <div class="box">
            <?php 
                $select_admins = $conn->prepare("SELECT * FROM admins ");
                $select_admins->execute();
                $number_of_admins = $select_admins->rowCount();
            ?>
            <h3><?= $number_of_admins; ?></h3>
            <p>admins accounts</p>
            <a href="admins_accounts.php" class="btn" >see accounts</a>
        </div>

    </div>
</section>


<!-- custom js file link -->
<script src="../js/admin_script.js" ></script>

</body>
</html>