<?php
$page_title = "Home Page";

if (isset($_POST['search_btn'])) {

    $srh = $_POST['search_data'];
}

$prod_id = (isset($_SESSION[' prod_id'])) ? $_SESSION[' prod_id'] : [];
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <!-- Css Styles -->
    <link rel="stylesheet" href="/WEB_CLOTHES_PHP/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/WEB_CLOTHES_PHP/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/WEB_CLOTHES_PHP/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/WEB_CLOTHES_PHP/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/WEB_CLOTHES_PHP/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/WEB_CLOTHES_PHP/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/WEB_CLOTHES_PHP/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/WEB_CLOTHES_PHP/css/style.css" type="text/css">

    <!--Bootsrap 4 CDN-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->

    <link rel="stylesheet" type="text/css" href="/WEB_CLOTHES_PHP/css/custom.css">
    <link rel="stylesheet" type="text/css" href="/WEB_CLOTHES_PHP/assets/css/locsp.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- Alertify Js -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />

    <!-- thanh locj Js -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .header__menu ul a:hover {
            list-style: none !important;
            text-decoration: none !important;
        }
    </style>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                    <div class="tip">2</div>
                </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.php"><img src="/WEB_CLOTHES_PHP/img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="./Authentication/Login/Login.php">Login</a>
            <a href="./Authentication/Register/Register.php">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-3 col-lg-2" style="max-width: 17%;">
                    <div class="header__logo">
                        <a href="index.php"><img src="/WEB_CLOTHES_PHP/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7" style="max-width: 45%;">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="../index.php">Home</a></li>
                            <!-- header__right__widget -->
                            <!-- <li><a href="index.php?quanly=shop">Shop</a></li> -->

                            <li><a href="/WEB_CLOTHES_PHP/index.php?quanly=blog">Blog</a></li>
                            <li><a href="/WEB_CLOTHES_PHP/index.php?quanly=contact">Contact</a></li>
                            <li><a href="/WEB_CLOTHES_PHP/index.php?quanly=blog-detail">Blog Details</a></li>

                            <li><a href="/WEB_CLOTHES_PHP/index.php?quanly=categories">Collections</a></li>
                            <!-- <li><a href="index.php?quanly=cart">Cart</a></li> -->
                            <!-- <li><a href="index.php?quanly=checkout">Checkout</a></li> -->

                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3" style="display: flex;">
                    <ul class="header__right__widget" style="margin-top: 27px; margin-right: 3pc;display:flex">
                        <form action="index.php?quanly=search" method="POST" class="d-flex ms-auto">
                            <input class="form-control me-2" name="search_data" style="margin: 0 auto; width: 250px;" type="text" placeholder="Search">
                            <input class="btn btn-outline-light" name="search_btn" type="submit" class="icon_search search-switch" value="Search" style="
                                                    height: 38px;
                                                    margin-left: 3px;
                                                    margin-right: 2pc;
                                                    background-color: #d5d2d2;"></input>
                            <!-- <li><span class="icon_search search-switch" name="search_btn" type="submit" value="Search"></span></li> -->

                        </form>
                        <li style="margin-top: 8px;margin-right: 26px;">
                        <a href="#"><span class="icon_heart_alt"></span>
                                <!-- <div class="tip">0</div> -->
                            </a></li>
                            
                        <!-- <li style="margin-top: 8px";><a href=" index.php?quanly=cart"><span class="icon_bag_alt"></span> -->
                        <li style="margin-top: 8px";><a href=" /WEB_CLOTHES_PHP/index.php?quanly=cart"><span class="icon_bag_alt"></span>
                        <!-- <div class="tip">0</div> -->

                        
                            </a>
                        </li>
                    </ul>
                    <div class="header__right" style="padding-top: 19px;">
                        <?php
                        if (isset($_SESSION['auth'])) {
                            
                        ?>
                            <nav class="navbar navbar-expand-lg navbar-light ">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <?= $_SESSION['auth_user']['name']; ?>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="/WEB_CLOTHES_PHP/Authentication/Logout/Logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        <?php
                        } else {
                        ?>
                            <div class="header__right__auth" style="display:flex">
                                <a href="/WEB_CLOTHES_PHP/Authentication/Login/Login.php" style="font-size: 15px;">Login </a>
                                <a href="/WEB_CLOTHES_PHP/Authentication/Register/Register.php" style="font-size: 15px;">Register</a>
                            </div>
                        <?php
                        }
                        ?>


                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->


   

    </php>