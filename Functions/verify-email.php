<?php 
  session_start();
  include('../db/connect.php');
  include('../Functions/Myfunctions.php');


  if (isset($_GET['token']))
  {
    $token = $_GET['token'];
  
    $verify_query = "SELECT code,verify_status FROM users WHERE code='$token' LIMIT 1";
    $verify_query_run = mysqli_query($con, $verify_query);

    if (mysqli_num_rows($verify_query_run) > 0) //mysqli_num_rows được sử dụng để lấy số hàng được trả về từ một truy vấn chọn.
    {
      $row = mysqli_fetch_array($verify_query_run); //mysqli_fetch_array được sử dụng để tìm nạp các mảng hàng từ tập kết quả truy vấn.
      if ($row['verify_status'] == "0")
      {
        $clicked_token = $row['code'];
        $update_query = "UPDATE users SET verify_status='1' WHERE code='$clicked_token' LIMIT 1";
        $update_query_run = mysqli_query($con, $update_query);

        if ($update_query_run)
        {

          redirect("../Authentication/Login/Login.php","Tài khoản của bạn đã được xác minh thành công");

        } else {
          redirect("../Authentication/Login/Login.php","Xác minh không hoàn thành");
        }

      }else
      {
        redirect("../Authentication/Login/Login.php","Email đã được xác minh. Vui lòng hãy đăng nhập");
      }
      

    }else 
    {
      redirect("../Authentication/Login/Login.php","Token này không tồn tại");
    }
    
  }else {
    redirect("../Authentication/Login/Login.php","Not Allowed");
  }

?>