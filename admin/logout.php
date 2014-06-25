<?php
  session_start();

  unset($_SESSION['Admin_ID']);
  unset($_SESSION['Admin_Username']);
  unset($_SESSION['Admin_Email']);
  unset($_SESSION['Admin_RoleID']);

  header('Location:login.php');
?>
