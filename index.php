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
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>

    <?php
    include('./Layout/Header/Header.php');

    if (isset($_GET['quanly'])) {
        $tam = $_GET['quanly'];
    } else {
        $tam = '';
    }
    if ($tam == 'categories') {
       include('./Components/Categories/Categories.php');
    } elseif ($tam == 'categories') {
        include('./Components/Categories/Categories.php');
     }
    // } elseif ($tam == 'danhmuc') {
    //     include('include/danhmuc.php');
    // } elseif ($tam == 'introduce') {
    //     include('./Components/Pages/Introduce/introduce.php');
    // } elseif ($tam == 'men') {
    //     include('./Components/Pages/Men/men.php');
    // } elseif ($tam == 'ladies') {
    //     include('./Components/Pages/Ladies/ladies.php');
    // } elseif ($tam == 'blogs') {
    //     include('./Components/Pages/Blogs/blogs.php');
    // } elseif ($tam == 'contact') {
    //     include('./Components/Pages/Contact/contact.php');
    // } elseif ($tam == 'chitietsp') {
    //     include('./Controllers/detaill/chitietsp.php    ');
    // } elseif ($tam == 'contact') {
    //     include('./contact.php');
    // } elseif ($tam == 'giohang') {
    //     include('./Controllers/carts/giohang.php');
    // } elseif ($tam == 'Like') {
    //     include('././Controllers/Like/Like.php');
    // } elseif ($tam == 'timkiem') {
    //     include('./Controllers/search/timkiem.php');
    // } elseif ($tam == 'tintuc') {
    //     include('./Components/kienthuc/tintuc.php');
    // } elseif ($tam == 'about') {
    //     include('./Components/Answers/About/about.php');
    // } elseif ($tam == 'contact') {
    //     include('./Components/Pages/Contact/contact.php');
    // } elseif ($tam == 'terms') {
    //     include('./Components/Answers/Terms/terms.php');
    // } elseif ($tam == 'privacy') {
    //     include('./Components/Answers/Privacy/privacy.php');
    // } elseif ($tam == 'chitiettin') {
    //     include('./Controllers/detaill/chitiettin.php');
    // } elseif ($tam == 'xemdonhang') {
    //     include('include/xemdonhang.php');
    // } 
    elseif ($tam == 'checkout') {
        include('./Controllers/payment/checkout.php');
    } else {
        include('./Components/Categories/Categories.php');
        include('./Components/Product/New_Product.php');
        include('./Components/Banner/Banner.php');
        include('./Components/Trend_Section/Trend_Section.php');
        include('./Components/Discount/Discount.php');
        include('./Components/Services_Section/Services_Section.php');
        include('./Components/instagram/instagram.php');
    }
    include('./Layout/Footer/Footer.php');
    ?>


</body>

</html>