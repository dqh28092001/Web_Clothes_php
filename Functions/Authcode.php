<?php

session_start();
include('../db/connect.php');
include('../Functions/Myfunctions.php');



//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if (isset($_SESSION['SESSION_EMAIL'])) {
    header("Location: welcome.php");
    die();
}

//Load Composer's autoloader
require '../vendor/autoload.php';

$msg = "";


if (isset($_POST['register_btn'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($con, md5($_POST['cpassword']));
    $code = mysqli_real_escape_string($con, md5(rand()));

    // $image = $_FILES['image']['name'];
    // $image_size = $_FILES['image']['size'];
    // $image_tmp_name = $_FILES['image']['tmp_name'];
    // $image_folder = 'uploaded_img/' . $image;

    

    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM users WHERE email='{$email}'")) > 0) {
        // if ($image_size > 2000000) {
        //     $message[] = 'image size is too large!';
        // }
        redirect(" ../Authentication/Register/Register.php", "Email đã tồn tại");

    } elseif ($password === $confirm_password) {
            $sql = "INSERT INTO users (username, email,phone, password, code,) VALUES ('{$username}', '{$email}','{$phone}', '{$password}', '{$code}')";
            $result = mysqli_query($con, $sql);

                echo "<div style='display: none;'>";
                //Create an instance; passing `true` enables exceptions
                $mail = new PHPMailer(true);

                try {
                    //Server settings
                    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                    $mail->isSMTP();                                            //Send using SMTP
                    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                    $mail->Username   = 'dqh28092001@gmail.com';                     //SMTP username
                    $mail->Password   = 'auwkegklguqzyugp';                               //SMTP password
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                    //Recipients
                    $mail->setFrom('dqh28092001@gmail.com', '');               
                    $mail->addAddress($email);

                    //Content
                    $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                    $mail->isHTML(true);                                  //Set email format to HTML
                    $mail->Subject = 'Email verification';
                    $mail->Body    = '<p>Chào Mừng Đến Với Ashion, Mã Xác Thực Của Bạn Là:: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
                    // $mail->Body    = '<p>Chào Mừng Đến Với Lucas Bit, Mã Xác Thực Của Bạn Là:: <b style="font-size: 30px;">' . $code . '</b></p>';
                    // $mail->Body    = 'Liên kết xác minh tài khoản của bạn  <b><a href="http://localhost:8081/WEB_CLOTHES_PHP/Functions/verify-email.php?token=' . $code . '">Click</a></b>';
                    // $mail->Body    = 'Liên kết xác minh tài khoản của bạn  <b><a href="http://localhost:8081/WEB_CLOTHES_PHP/Functions/verify-email.php?token=' . $verification_code . '">Click</a></b>';
                    $mail->send();
                    echo 'Tin nhắn đã được gửi';
                    
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);         
                    $sql = "INSERT INTO users (username, email, password,phone,code,verificationcodes) VALUES (?, ?, ?, ?, ?, ?)";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("ssssss", $username, $email, $hashedPassword,$phone,$code, $verification_code);  
                    if ($stmt->execute()) {
                        $response = array('success' => true, 'username' => $username);
                        echo json_encode($response);
                    }
                  } catch (Exception $e) {
                    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                }
                echo "</div>";
                redirect("../view/vertifi.php", "Bạn cần nhập mã xác thực");
            } else {
                redirect(" ../Authentication/Register/Register.php", "Mật khẩu và Xác nhận mật khẩu không khớp");
            }
        } 
        // else {
        //     redirect(" ../Authentication/Register/Register.php", "Mật khẩu và Xác nhận mật khẩu không khớp");
        // }
    



function send_password_reset($get_name, $get_email, $token)
{
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = 'dqh28092001@gmail.com';                     //SMTP username
    $mail->Password   = 'auwkegklguqzyugp';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('dqh28092001@gmail.com', $get_name);
    $mail->addAddress($get_email);

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Body    = 'Liên kết Cập nhật mật khẩu <b><a href="http://localhost:8081/WEB_CLOTHES_PHP/view/password-change.php?token=' . $token . '&email=' . $get_email . '">Click</a></b>';
    $mail->send();
    echo 'Tin nhắn đã được gửi';
}


if (isset($_POST['reset_pass_btn'])) {

    $email = mysqli_real_escape_string($con, $_POST['email']); // Hàm real_escape_string() / mysqli_real_escape_string() thoát các ký tự đặc biệt trong chuỗi để sử dụng 
    $token = md5(rand(000000, 999999));

    $check_email = "SELECT email FROM users WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con, $check_email);


    if (mysqli_num_rows($check_email_run) > 0) {
        $row = mysqli_fetch_array($check_email_run); //mysqli_fetch_array được sử dụng để tìm nạp các mảng hàng từ tập kết quả truy vấn.
        $get_name = $row['name'];
        $get_email = $row['email'];
        $update_token = "UPDATE users SET code ='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con, $update_token);

        if ($update_token_run) {
            send_password_reset($get_name, $get_email, $token);
            redirect("../view/password-reset.php", "Chúng tôi đã gửi email cho bạn một liên kết đặt lại mật khẩu");
        } else {
            redirect("../view/password-reset.php", "Đã xảy ra sự cố.");
        }
    } else {
        redirect("../view/password-reset.php", "Không Tìm Thấy Email");
    }
}


if (isset($_POST['password_update_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']); // Hàm real_escape_string() / mysqli_real_escape_string() thoát các ký tự đặc biệt trong chuỗi để sử dụng 
    $new_password = mysqli_real_escape_string($con, md5($_POST['new_password']));
    $cpassword = mysqli_real_escape_string($con, md5($_POST['cpassword']));

    $token = mysqli_real_escape_string($con, $_POST['password_token']);

    if (!empty($token)) {
        if (!empty($email) && !empty($new_password) && !empty($cpassword))
        //  `!empty` chỉ kiểm tra xem biến có giá trị hay không
        {
            //Kiểm tra token có khớp ko
            $check_token = "SELECT code FROM users WHERE code='$token' LIMIT 1";
            $check_token_run = mysqli_query($con, $check_token); //thực thi các truy vấn SQL


            if (mysqli_num_rows($check_token_run) > 0) //mysqli_num_rows() trả về số lượng hàng trong một tập kết quả.
            {
                if ($new_password === $cpassword) {

                    $update_password = "UPDATE users SET password='$new_password' WHERE code='$token' LIMIT 1";
                    $update_password_run = mysqli_query($con, $update_password);

                    if ($update_password_run) {

                        $new_token = md5(rand());
                        $update_new_token = "UPDATE users SET code='$new_token' WHERE code='$token' LIMIT 1";
                        $update_new_token_run = mysqli_query($con, $update_new_token);

                        redirect("../Authentication/Login/Login.php", "Đã cập nhật mật khẩu thành công.");
                    } else {
                        redirect("../view/password-change.php?token=$token&email=$email", "Đã xảy ra sự cố khi cập nhật mật khẩu.");
                    }
                } else {
                    redirect("../view/password-change.php?token=$token&email=$email", "Mật khẩu và Xác nhận mật khẩu không khớp");
                }
            } else {
                redirect("../view/password-change.php?token=$token&email=$email", "Token không hợp lệ");
            }
        } else {
            redirect("../view/password-change.php?token=$token&email=$email", "Tất cả các lĩnh vực là bắt buộc");
        }
    } else {
        redirect("../view/password-change.php?token=$token&email=$get_email", "Không có mã thông báo");
    }
}



///////  Login ///////////////////////


else if (isset($_POST['login_btn'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, md5($_POST['password']));

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password' ";
    $login_query_run = mysqli_query($con, $login_query);


    // if (mysqli_num_rows($login_query_run) > 0) {
    //     $row = mysqli_fetch_assoc($login_query_run);
    //     $_SESSION['user_id'] = $row['id'];
    //     header('location:../../../home.php');
    // } else {
    //     $message[] = 'incorrect email or password!';
    // }

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
        // redirect("../index.php","Welcome To Dashboard");
        $_SESSION['role_as'] = $role_as;
        if ($role_as == 1) {
            redirect("../Admin/index.php", "Chào mừng đến với Trang tổng quan");
        } else {
            redirect("../index.php", "Shopping");
        }
    } else {

        redirect("../Authentication/Login/Login.php", "Mật khẩu của bạn không đúng");
    }
}
