
<?php

// session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "phpecom";

// Create connection
$con = mysqli_connect($servername, $username, $password, $dbname);
mysqli_set_charset($con, 'utf8');

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

