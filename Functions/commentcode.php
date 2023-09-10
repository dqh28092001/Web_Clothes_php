<?php 
session_start();
include('../db/connect.php');
include('../Functions/authenticate.php');
include('../Functions/userfunctions.php');

if (isset($_SESSION['username'])) {

    if (isset($_POST['ct_cmt']))
    {
        $ct_cmt = $_POST['ct_cmt'];
        $user_id = $_SESSION['username'];
        $prod_id = $_POST['prod_id'];

        $checkorder = "SELECT user_id, prod_id FROM orders INNER JOIN order_items ON orders.id = order_items.order_id WHERE user_id = '$user_id' AND order_items.prod_id = '$prod_id'";
        $checkorder_run = mysqli_query($con, $checkorder);

        if (mysqli_num_rows($checkorder_run)>0) {

            $insert_cmt = "INSERT INTO comment (prod_id, user_id, content) VALUES ('$prod_id', '$user_id', '$ct_cmt')";
            $insert_cmt_run = mysqli_query($con, $insert_cmt);

            redirect("../view/index.php","Thêm bình luận thành công");
        }else{
            redirect("../view/index.php","Bạn cần mua sản phẩm để bình luận");
        }

    }

}else{
    redirect("../view/index.php","Đăng nhập vào liên kết");

}


?>