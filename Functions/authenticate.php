<?php 


if (!isset($_SESSION['username'])) 
{
    redirect("/WEB_CLOTHES_PHP/view/index.php", 'Đăng nhập để tiếp tục');
    
}

?>