<?php
$con = mysqli_connect("localhost", "root", "", "shop");

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
// Change character set to utf8
mysqli_set_charset($con, "utf8");


?>

<?php

// session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shop";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($conn, 'utf8');

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
