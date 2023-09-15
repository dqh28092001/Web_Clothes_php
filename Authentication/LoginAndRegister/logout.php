<?php
  session_start();
  unset($_SESSION['username']);
  header('location: ../../Views/Home.php?page=1');
?>