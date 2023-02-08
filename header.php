<?php 

if (isset($message)) {
    foreach ($message as $message) {
        echo '<div class="message">
        <span>'.$message.'</span>
        <i class="fas fa-times" onclick="this.parentElement.remove();" ></i>
    </div>' ;
    }
};

?>


<?php 
$user_cookie = '';
if (isset($_COOKIE['cart_cookie'])) {
    $user_cookie = $_COOKIE['cart_cookie'];
}
$count_cart_items = $conn->prepare("SELECT * FROM cart WHERE user_cookie = ? ");
$count_cart_items->execute([$user_cookie]);
$total_cart_items = $count_cart_items->rowCount();

?>
<!-- header section starts  -->
<header class="header">

    <a href="index.php" class="logo">off<span>TAK</span></a>

    <form id="search-form" action="search_page.php" method="post" >
        <input type="search" name="search_box" id="search-bar">
        <label for="search-bar" onclick="search()" class="fas fa-search"></label>
    </form>

    <div class="icons">
        <div id="theme-toggler" class="fas fa-moon" onclick="darkmode()"></div>
        <a href="cart.php" class="fas fa-shopping-cart"><span style="display:<?php if ($total_cart_items === 0) { echo 'none'; }?>;" ><?= $total_cart_items; ?></span></a>
        <a id="lang-switcher" class="fas fa-globe" onclick="switch_itup();" ></a>
        
        <ul class="lang-menu" id="switcher">
            <li>
                <img src="images/usa.png" >
                <button id="lang" class="en">English</button>
            </li>
            <li>
                <img src="images/ma.png" >
                <button id="lang" class="ar">عربية</button>
            </li>
            <li>
                <img src="images/fr.png" >
                <button id="lang" class="fr">Français</button>
            </li>
        </ul>
    </div>



</header>

<!-- header section ends -->
