<?php
session_start();

if (isset($_SESSION['auth'])) {
    $_SESSION['message'] = "You are already logged in";
    header('Location: ../../index.php');
    exit();
}

?>


<!doctype html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="css/style.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


</head>

<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
    <section class="ftco-section">
        <div class="container" id="container">
            <div class="form-container sign-up-container">

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

                            <form action="../../Functions/Authcode.php" id="signupForm" method="POST" class="signin-form" enctype="multipart/form-data">
                                <div id="result" style="color:red; font-size:small"></div>

                                <div class="form-group">
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
                                    <div id="usernamecheck" style="color:red; font-size:small" class=""> </div>

                                </div>

                                <div class="form-group">
                                    <input type="number" name="phone" class="form-control" placeholder="Phone" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email Address" required>
                                    <div id="emailcheck" style="color:red; font-size:small"> </div>

                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                    <div id="passwordcheck" style="color:red; font-size:small"> </div>
                                    <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                                    <div id="cpasswordcheck" style="color:red; font-size:small"> </div>
                                    <!-- <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span> -->
                                </div>
                                <!-- <div class="form-group">
                            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
                            </div> -->

                                <div class="form-group">
                                    <button type="submit" id="signupButton" name="register_btn" class="form-control btn btn-primary submit px-3">Sign UP</button>
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
        </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

</body>
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
<script>
    const signUpButton = document.getElementById('signUp');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');
    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });
    $(document).ready(function() {
        $("#username").blur(function() {
            var username = $(this).val();
            $.get("../../Functions/Authcode.php", {
                username: username
            }, function(data) {
                $("#usernamecheck").html(data);
            });
        });

        $("#email").blur(function() {
            var email = $(this).val();
            $.get("../../Functions/Authcode.php", {
                email: email
            }, function(data) {
                $("#emailcheck").html(data);
            });
        });
        $("#signupForm").submit(function(event) {
            event.preventDefault();
            var formData = $(this).serializeArray();

            var data = {};

            $(formData).each(function(index, obj) {
                data[obj.name] = obj.value;
            });

            console.log(data);
            $.ajax({
                type: 'POST',
                url: '../../Functions/Authcode.php',
                data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        window.location.href = '../../view/vertifi.php?username=' + response.username;
                    } else {
                        $('#result').text(response.message);
                    }
                },
                error: function() {
                    $('#result').text('An error occurred during the AJAX request.');
                }
            });
        });
        $("#signinForm").submit(function(event) {
            event.preventDefault();
            var usernamelog = $('#usernamelog').val();
            var passwordlog = $('#passwordlog').val();
            $.ajax({
                type: 'POST',
                url: '../Processing/Login.php',
                data: {
                    usernamelog: usernamelog,
                    passwordlog: passwordlog
                },
                dataType: 'json',
                success: function(response) {
                    if (response.message == 'xacthuc') {
                        window.location.href = '../../view/vertifi.php?username=' + usernamelog;
                    } else if (response.message === 'user') {
                        window.location.href = '../../view/home.php?page=1';
                    } else if (response.message === 'admin') {
                        window.location.href = '../../Admin/index.php';
                    } else
                        $('#logcheck').text(response.message);
                },
                error: function(response) {
                    console.log(response)
                    $('#logcheck').text('An error occurred during the AJAX request.');
                }
            });
        });
    });
</script>

</html>