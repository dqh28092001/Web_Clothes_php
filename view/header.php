<?php
// session_start();
$page_title = "Home Page";

if (isset($_POST['search_btn'])) {

  $srh = $_POST['search_data'];
}

$prod_id = (isset($_SESSION[' prod_id'])) ? $_SESSION[' prod_id'] : [];
?>

<?php
if(isset($_SESSION['username'])){
  $user_id = $_SESSION['username'];
}

// if(!isset($user_id)){
//    header('location:/WEB_CLOTHES_PHP/Authentication/Login/Login.php');
// };

if (isset($_GET['logout'])) {
  unset($user_id);
  session_destroy();
  header('location:/WEB_CLOTHES_PHP/Authentication/Login/Login.php');
}

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
  <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="../css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="../css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="../css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="../css/style.css" type="text/css"> -->
  <!--Bootsrap 4 CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

  <!--Custom styles-->
  <link rel="stylesheet" type="text/css" href="/WEB_CLOTHES_PHP/css/custom.css">
  <link rel="stylesheet" type="text/css" href="/WEB_CLOTHES_PHP/assets/css/locsp.css">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">


  <!-- Alertify Js -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />

  <!-- thanh locj Js -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.13.2/themes/base/jquery-ui.min.css" integrity="sha512-ELV+xyi8IhEApPS/pSj66+Jiw+sOT1Mqkzlh8ExXihe4zfqbWkxPRi8wptXIO9g73FSlhmquFlUOuMSoXz5IRw==" crossorigin="anonymous" referrerpolicy="no-referrer" />




  <link rel="stylesheet" href="../Public/css/bootstrapmin.css">
    <link rel="stylesheet" href="../Public/css/icon.css">
    <link rel="stylesheet" href="../Public/css/fontawesome.min.css">
    <link rel="stylesheet" type="text/css" href="../Public/css/toastyfi.css">
    <link rel="stylesheet" href="../Public/css/usercss.css">
    <link rel="stylesheet" href="../Public/css/cdn.jsdelivr.net_npm_sweetalert2@11.1.5_dist_sweetalert2.min.css">
    <style>
    .activecustom {
        background-color: pink;
        color: #000;
    }
    </style>

  <style>
    .header__menu ul a:hover {
      list-style: none !important;
      text-decoration: none !important;
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="container-fluid">
      <div class="row">
        <div class="col-xl-3 col-lg-2" style="max-width: 17%;">
          <div class="header__logo">
            <a href="/WEB_CLOTHES_PHP/view/index.php"><img src="/WEB_CLOTHES_PHP/img/logo.png" alt=""></a>
          </div>
        </div>
        <div class="col-xl-6 col-lg-7" style="max-width: 45%;">
          <nav class="">
            <ul style="display: flex;
    justify-content: center;
    text-align: center;
    align-items: center;
    margin-top: 1pc;">
              <li class="" style="list-style: none;font-size: 19px;
    font-weight: 500;"><a href="/WEB_CLOTHES_PHP/view/index.php" style="    color: black;">Home</a></li>
              <!-- header__right__widget -->

              <li class=" dropdown" style="list-style: none;font-size: 19px;
    font-weight: 500;">
                <a class="nav-link dropdown-toggle" id="categoriesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                  <?php

                  $sql = "SELECT * FROM categories WHERE status = 0";
                  $result = mysqli_query($con, $sql);
                  if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $item) {
                  ?>
                      <div class="col-md-3 mb-2">
                        <a href="/WEB_CLOTHES_PHP/view/products.php?category=<?= $item['slug']; ?>">
                          <h4 class="text-center"><?= $item['name']; ?></h4>
                        </a>
                      </div>
                  <?php
                    }
                  }
                  ?>
                </div>

              </li>
            </ul>
          </nav>
        </div>

        <div class="col-lg-3" style="display: flex;">
          <ul class="header__right__widget" style="margin-top: 27px; margin-right: 3pc;display:flex">
            <form action="/WEB_CLOTHES_PHP/view/search.php" method="POST" class="d-flex ms-auto">
              <input class="form-control me-2" name="search_data" style="margin: 0 auto; width: 250px;" type="text" placeholder="Search">
              <input class="btn btn-outline-light" name="search_btn" type="submit" class="icon_search search-switch" value="Search" style="
                                                    height: 38px;
                                                    margin-left: 3px;
                                                    margin-right: 2pc;
                                                    background-color: #d5d2d2;"></input>
              <!-- <li><span class="icon_search search-switch" name="search_btn" type="submit" value="Search"></span></li> -->

            </form>
          </ul>


          <!-- <div class="header__right" style="padding-top: 19px;">
            <?php
            if (isset($_SESSION['auth'])) {

            ?>
              <nav class="navbar navbar-expand-lg navbar-light ">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" style="display:flex" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                      <?php
                      $select = mysqli_query($con, "SELECT * FROM `users` WHERE id = '$user_id'") or die('query failed');
                      if (mysqli_num_rows($select) > 0) {
                        $fetch = mysqli_fetch_assoc($select);
                      }

                      ?>

                      <h3 style="font-size: 20px;"><?php echo $fetch['username']; ?></h3>

                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                      <li><a class="dropdown-item" href="/WEB_CLOTHES_PHP/view/home.php">Action</a></li>
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
          </div> -->

          <div class="navbar align-self-center d-flex">
            <?php if (isset($_SESSION['username'])) {
              // require_once '../db/connect.php';
              $username = $_SESSION['username'];
              $sql = "SELECT COUNT(*) AS cartItemCount FROM carts WHERE username = '$username'";
              $result = mysqli_query($con, $sql);
              $cartItemCount = 0;
              if ($result) {
                $row = mysqli_fetch_assoc($result);
                $cartItemCount = $row['cartItemCount'];
              }
            ?>
              <a class="nav-icon position-relative text-decoration-none" href="../view/cart.php">
                <i class="fa fa-fw fa-cart-arrow-down mr-1" style="width: 4pc;
    font-size: 2pc;
    color: black;
    margin-top: 27px;"></i>
                <?php if ($cartItemCount > 0) : ?>
                  <span class="badge badge-danger position-absolute rounded-circle"><?= $cartItemCount ?></span>
                <?php endif; ?>
              </a>
            <?php } else { ?>
              <a class="nav-icon position-relative text-decoration-none" href="../Views/LoginAndRegister.php">
                <i class="fa fa-fw fa-cart-arrow-down mr-1"></i>
              </a>
            <?php } ?>
            <div class="dropdown">
              <?php if (isset($_SESSION['username'])) {
                // require_once '../Processing/connect.php';
                $username = $_SESSION['username'];
                $sql = "SELECT image,permission FROM users WHERE username='$username'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $image = $row["image"];
                $permission = $row["permission"];
                if (empty($image)) {
                  $image = 'user.jpg';
                }
              ?>

                <a class="nav-link" href="#" role="button" id="userDropdown" data-toggle="dropdown" aria-expanded="false">
                  <div class="avatar">
                    <?php
                    $select = mysqli_query($con, "SELECT * FROM `users` WHERE username = '$user_id'") or die('query failed');
                    if (mysqli_num_rows($select) > 0) {
                      $fetch = mysqli_fetch_assoc($select);
                    }
                    if ($fetch['image'] == '') {
                      echo '<img src="../images/default-avatar.png">';
                    } else {
                      echo '<img src="../uploaded_img/' . $fetch['image'] . '">';
                    }
                    ?>
                   
                  </div>
                </a>
                <ul class="dropdown-menu" aria-labelledby="userDropdown">
                  <li class="dropdown-item"><b>
                      <h3><?php echo $fetch['name']; ?></h3>
                    </b></li>
                  <?php if ($permission == 1) { ?>
                    <li><a class="dropdown-item" href="../view/Admincategory.php">Trang Admin</a></li>
                  <?php } ?>
                  <li><a class="dropdown-item" href="../view/profile.php">Chỉnh Sửa Tài Khoản</a></li>
                  <li><a class="dropdown-item" href="../view/view-order.php">Quản Lí Đơn Hàng</a></li>
                  <li><a class="dropdown-item" href="../Functions/logout.php">Đăng xuất</a></li>

                </ul>
              <?php } else { ?>
                <a class="dropdown-item" href="LoginAndRegister.php">Đăng Nhập</a>
              <?php } ?>
            </div>
          </div>


        </div>
      </div>
    </div>
  </header>