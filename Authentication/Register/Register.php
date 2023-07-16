<?php 
session_start();

if(isset($_SESSION['auth'])){
	$_SESSION['message'] = "You are already logged in";
	header('Location: ../../index.php');
    exit();
}

?>
<!doctype html>
<html lang="en">

<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <!-- <div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Đăng Nhập</h2>
				</div>
			</div> -->
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
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
                    <div class="login-wrap p-0">
                        <div class="row justify-content-center">
                            <div class="col-md-6 text-center mb-5">
                                <h2 class="heading-section">Register</h2>
                            </div>
                        </div>

                        <form action="../../Functions/Authcode.php" method="POST" class="signin-form">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="password" class="form-control" placeholder="Password" required>
                                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                                <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                            </div>
                            <div class="form-group">
                                <button type="submit" name="register_btn" class="form-control btn btn-primary submit px-3">Sign In</button>
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
                                <a href="../Login/Login.php" style="color: #fff">Forgot Login</a>
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

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>

</html>