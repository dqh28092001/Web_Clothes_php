<?php
session_start();

if (isset($_SESSION['authenticated'])) {
  $_SESSION['status'] = "Bạn đã đăng nhập";
  header("Location: dashboard.php");
  exit(0);
}

$page_title = "Login From";
// include('../Layout/Header/Header.php');

?>
<!doctype html>
<html lang="en">

<head>
  <title>Login 10</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="../Authentication/Register/css/style.css">

  <!-- Alertify Js -->
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.rtl.min.css" />

</head>

<body class="img js-fullheight" style="background-image: url(../Authentication/Register/images/bg.jpg);">
  <section class="ftco-section">
    <div class="container">
      <!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Đăng Nhập</h2>
				</div>
			</div> -->
      <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">

          <div class="login-wrap p-0">
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
            <div class="row justify-content-center">
              <div class="col-md-6 text-center mb-5">

                <h2 class="heading-section">Update Password</h2>
              </div>
            </div>

            <form action="../Functions/Authcode.php" method="POST">
              <div class="form-group">
                <input type="hidden" name="password_token" value="<?php if (isset($_GET['token'])) {
                                                                    echo $_GET['token'];
                                                                  } ?>" class="form-control" placeholder="Username" required>
              </div>
              <div class="form-group">
                <input type="email" name="email" value="<?php if (isset($_GET['email'])) {
                                                          echo $_GET['email'];
                                                        } ?>" class="form-control" placeholder="Email Address" required>
              </div>
              <div class="form-group">
                <input id="password-field" type="password" name="new_password" class="form-control" placeholder="Password" required>
                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
              </div>
              <div class="form-group">
                <input id="password-field" type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
              </div>
              <div class="form-group">
                <button type="submit" name="password_update_btn" class="form-control btn btn-primary submit px-3">Update Password</button>
              </div>
            </form>

            <div class="form-group d-md-flex">
              <div class="w-50">
                <label class="checkbox-wrap checkbox-primary">Remember Me
                  <input type="checkbox" checked>
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="w-50 text-md-right">
                <a href="../Authentication/Login/Login.php" style="color: #fff">Forgot Login</a>
              </div>
            </div>

            <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
            <div class="social d-flex text-center">
              <a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> Facebook</a>
              <a href="#" class="px-2 py-2 ml-md-1 rounded"><span class="ion-logo-twitter mr-2"></span> Twitter</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <script src="../Authentication/Register/js/jquery.min.js"></script>
  <script src="../Authentication/Register/js/popper.js"></script>
  <script src="../Authentication/Register/js/bootstrap.min.js"></script>
  <script src="../Authentication/Register/js/main.js"></script>

  <!-- Alertify JS -->
  <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
  <script>
    alertify.set('notifier', 'position', 'top-right');
    <?php
    if (isset($_SESSION['status'])) {
    ?>
      alertify.success('<?= $_SESSION['status'] ?>');
    <?php
      unset($_SESSION['status']);
    }
    ?>
  </script>
</body>

</html>