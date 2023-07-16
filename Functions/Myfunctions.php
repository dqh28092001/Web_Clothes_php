<?php
include('../db/connect.php');

function getAll($table){
    // do biến $con kh dc xác định nên ta khai báo biến toàn cục vì v nó sẽ kh tìm kiếm biến $con
    global $con; 
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con , $query);
}

function getByID($table,$id){
    // do biến $con kh dc xác định nên ta khai báo biến toàn cục vì v nó sẽ kh tìm kiếm biến $con
    global $con; 
    $query = "SELECT * FROM $table WHERE id='$id'";
    return $query_run = mysqli_query($con , $query);
}

// Thông báo messess nhanh và đơn giản hơn
function redirect($url,$message ){
    $_SESSION['message'] = $message;
	header('Location: '.$url);
    exit();
}

?>