<?php
include('./db/connect.php');
$query = "SELECT * FROM products WHERE locgiasp = '1' ORDER BY id DESC ";
$r = mysqli_query($con,$query);
?>