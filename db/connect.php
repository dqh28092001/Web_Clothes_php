
<?php

// session_start();

$host = "localhost";
$username = "root";
$password = "";
$dbname = "web_clother";

// Create connection
$con = mysqli_connect($host, $username, $password, $dbname);
mysqli_set_charset($con, 'utf8');

// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

