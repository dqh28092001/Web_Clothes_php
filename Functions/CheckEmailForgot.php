<?php
include('../db/connect.php');

$forgot_code = $_GET["forgot_code"];

// Sử dụng câu lệnh SQL chuẩn để tránh SQL injection
$sql = "SELECT * FROM users WHERE forgot_code = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s",$forgot_code);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Sử dụng hàm urlencode để mã hóa tham số trong URL
    $encoded_forgot_code = urlencode($forgot_code);
    header("Location: ../view/NewPassword.php?forgot_code=$encoded_forgot_code");
} else {
    header("Location: ../view/index.php?page=1");
    exit();
}

$stmt->close();
$con->close();
?>