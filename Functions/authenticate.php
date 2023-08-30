<?php 


if (!isset($_SESSION['auth'])) 
{
    redirect("/WEB_CLOTHES_PHP/Authentication/Login/login.php", 'Đăng nhập để tiếp tục');
    
}

?>