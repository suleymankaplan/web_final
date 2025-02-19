<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>S-SHOP</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <?php
        if($_GET['reflesh']=="ok"){
            header("location:sign-in.php");
        }
        session_start();
        switch ($_SERVER['PHP_SELF']) {
            case '/web-tasarım-proje/index.php':
                echo '<link rel="stylesheet" href="home.css">';
                break;
            case '/web-tasarım-proje/product.php':
                echo '<link rel="stylesheet" href="product.css">';
            case '/web-tasarım-proje/products.php':
                echo '<link rel="stylesheet" href="products.css">';
            case '/web-tasarım-proje/sign-in.php':
                echo '<link rel="stylesheet" href="sign-in.css">';
        }
    ?>
    <link rel="stylesheet" href="styles.css">
</head>
<body class="<?php
    switch ($_SERVER['PHP_SELF']) {
        case '/web-tasarım-proje/index.php':
            echo 'home-page';
            break;
        case '/web-tasarım-proje/product.php':
            echo 'product-page';
            break;
        case '/web-tasarım-proje/products.php':
            echo 'products-page';
            break;
    }
?>">
    <header>
        <a class="logo" href="index.php"><img src="images/logo.jpeg" alt=""></a>
        <ul class="menu-list">
            <li class="home">
                <a href="index.php"><i class="fa-solid fa-house"></i>&nbsp;Ana Sayfa</a>
                <hr>
            </li>
            <li class="discount">
                <a href=""><i class="fa-solid fa-tag"></i>&nbsp;İndirim</a>
                <hr>
            </li>
            <li class="tshirt">
                <a href=""><i class="fa-solid fa-shirt"></i>&nbsp;Tişört</a>
                <hr>
            </li>
            <li class="hoodie">
                <a href="products.php"><i class="fa-solid fa-bag-shopping"></i>&nbsp;Tüm Ürünler</a>
                <hr>
            </li>
            <li class="season">
                <a href=""><i class="fa-solid fa-fire"></i>&nbsp;Yeni Sezon</a>
                <hr>
            </li>
        </ul>
        <ul class="other-list">
            <li class="cart"><a href=""><i class="fa-solid fa-cart-shopping"></i>&nbsp;Sepet</a></li>
            <li class="account"><a href="sign-in.php"><i class="fa-solid fa-user"></i>&nbsp;<?php 
            if(isset($_SESSION['isim'])){
                echo $_SESSION['isim'];
            }
            else{
                echo "Giriş";
            }
            ?></a></li>
        </ul>
    </header>