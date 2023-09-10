<?php
    //email
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    
    include('../vendor/autoload.php');
    include('../db/connect.php');

    $response = array();
    $username = $_POST["username"];
    if (empty($username)) {
        $response['message'] = 'Vui lòng nhập username';
    }else{
        $response['message'] = 'OK';
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $email = $row['email'];
            $mail = new PHPMailer(true);
            try {
                $mail->SMTPDebug = 0;               
                $mail->isSMTP();               
                $mail->Host = 'smtp.gmail.com';                 
                $mail->SMTPAuth = true;
                $mail->Username = 'dqh28092001@gmail.com';
                $mail->Password = 'auwkegklguqzyugp';   
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;
                $mail->setFrom('dqh28092001@gmail.com', '');               
                $mail->addAddress($email);
                $mail->isHTML(true);                 
                // $forgot_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
                $length = 50;
                $randomBytes = random_bytes($length);
                $randomString = bin2hex($randomBytes);
                $mail->Subject = 'Email Forgot Password';
                $reset_password_url = 'http://localhost:8081/WEB_CLOTHES_PHP/Functions/CheckEmailForgot.php?forgot_code=' .$randomString;
                $mail->Body = '<p>Chào Mừng Đến Với Ashion, bạn đang trong quá trình thao tác quên mật khẩu, vui lòng click vào đây để tiếp tục: <b style="font-size: 30px;"><a href="' . $reset_password_url . '">Nhấn vào đây</a></b></p>';
                $mail->send();        
                $sql = "UPDATE users SET forgot_code = ? WHERE username = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("ss", $randomString,  $username);  
                if ($stmt->execute()) {
                    $response['message'] = 'true'; 
                }
                } catch (Exception $e) {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        }else{
            $response['message'] = 'Tài Khoản Không Tồn Tại';
        }
    }

    echo json_encode($response);
    $con->close();
?>