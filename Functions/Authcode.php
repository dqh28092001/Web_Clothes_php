<?php

session_start();
include('../db/connect.php');
include ('../Functions/Myfunctions.php');

if (isset($_POST['register_btn'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);


    // Check if email are already registered 
    $check_email_query = "SELECT email FROM users WHERE email='$email'";
    $check_email_query_run = mysqli_query($con, $check_email_query);

    if (mysqli_num_rows($check_email_query_run) > 0) {

        redirect(" ../Authentication/Register/Register.php", "Email already registered");
    } else {

        if ($password == $cpassword) {

            // Insert user data
            $insert_query = "INSERT INTO users (name,email,phone,password) VALUES ('$name', '$email', '$phone', '$password')";
            $insert_query_run = mysqli_query($con, $insert_query);

            if ($insert_query_run) {
                redirect(" ../Authentication/Login/Login.php", "Registered Successfully");
            } else {
                redirect(" ../Authentication/Register/Register.php", "Something went wrong");
            }
        } else {
            redirect(" ../Authentication/Register/Register.php", "Password do not match");
        }
    }
}

///////  Login ///////////////////////

else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);



    // khi người dùng đăng nhập sẽ lưu trữ thôgn tin của người dùng {
    $login_query = "SELECT * FROM users WHERE email='$email' AND password = '$password'";
    $login_query_run = mysqli_query($con, $login_query);

    if (mysqli_num_rows($login_query_run) > 0) {
        $_SESSION['auth'] = true;
        
        $userdata = mysqli_fetch_array($login_query_run);
        $userid = $userdata['id'];
        $username = $userdata['name'];
        $email = $userdata['email'];
        $phone = $userdata['phone'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'user_id' => $userid,
            'name' => $username,
            'email' => $email,
            'phone' => $phone,
        ];
        // END lưu trữ người dùng }

        //  khi quản trị đăng nhập sẽ lưu trữ thôgn tin {
        $_SESSION['role_as'] = $role_as;


        if ($role_as == 1) { // => nếu điều kiện mà gấp đôi 1 thì nó sẽ chueyern thành người dùng ...
            // ngược lại nếu bằng 1 thìu là quản trị
            redirect(" ../Admin/index.php", "Welcome to Dashboard");
        } else {
            redirect(" ../index.php", "Logged in Successfully");
        }
    } else {
        redirect(" ../Authentication/Login/Login.php", "Invalid Credentials");
    }
}
