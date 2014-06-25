<?php
ob_start();
  include "includes/config.php"; // include configurations
  db_connect();   // db connection
  login_check();  // login checking
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Home | Exams</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
<div>
<span><a href="index.php" >Home</a></span>
<span><a href="myexams.php" >My Exams</a></span>
<span><a href="logout.php" >Logout</a></span>
<span style="float:right;"> User : <?php echo $_SESSION['User_Name']; ?> </span>
</div>
