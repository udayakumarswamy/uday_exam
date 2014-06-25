<?php
  session_start();

  unset($_SESSION['UserID']);
  unset($_SESSION['User_Name']);
  unset($_SESSION['User_Email']);

  header('Location:login.php');
?>
