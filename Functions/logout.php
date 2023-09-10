<?php
  session_start();
  unset($_SESSION['username']);
  header('location: ../view/index.php?page=1');
?>