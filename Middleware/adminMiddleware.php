<?php
include ('../Functions/Myfunctions.php');

if (isset($_SESSION['auth'])){

   
    if($_SESSION['role_as'] != 1 ){  // !=1 nếu kh phải quản trị viên thì sẽ kh dc vàoo trang này
        
        redirect(" ../index.php","You are not authorized to access this page.");
    }
}
else{
// Thông báo messess nhanh và đơn giản hơn (trong myfunctions.php)
    redirect(" ../Authentication/Login/Login.php","Login to continue..."); 
}
?>