<?php
session_start();
// include_once('db/connect.php');
?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../../css/style.css" type="text/css">
</head>

<body>
    <?php
    if (isset($_SESSION['message'])) {
    ?>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Hey!</strong> <?= $_SESSION['message']; ?> .
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php
        unset($_SESSION['message']);
    }
    ?>
    <?php
    include('./Layout/Header/Header.php');

    if (isset($_GET['quanly'])) {
        $tam = $_GET['quanly'];
    } else {
        $tam = '';
    }
    if ($tam == 'trentop') {
        include('./Components/Trend/TrendTop.php');
    } elseif ($tam == 'trenbottom') {
        include('./Components/Trend/TrendBotom.php');
    } elseif ($tam == 'shop_cart') {
        include('./Components/Shop_by_oder/Shop_by_oder.php');
    } elseif ($tam == 'shop') {
        include('./Components/Shop/shop.php');
    } elseif ($tam == 'blog-detail') {
        include('./Components/Blog-Detail/blog-details.php');
    } elseif ($tam == 'blog') {
        include('./Components/Blog/blog.php');
    } elseif ($tam == 'contact') {
        include('./Components/Contact/contact.php');
    } elseif ($tam == 'checkout') {
        include('./Components/Checkout/checkout.php');
    } elseif ($tam == 'contact') {
        include('./Components/Contact/contact.php');
    } elseif ($tam == 'products') {
        include('./products.php');
    } else {

        include('./Components/Categories/Categories.php');
        include('./Components/Product/New_Product.php');
        include('./Components/Banner/Banner.php');
        include('./Components/Trend_Section/Trend_Section.php');
        include('./Components/Discount/Discount.php');
        include('./Components/Services_Section/Services_Section.php');
    }
    include('./Components/instagram/instagram.php');
    include('./Layout/Footer/Footer.php');

    ?>


</body>

</html>