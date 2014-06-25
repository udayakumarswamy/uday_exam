<?php
  include "includes/config.php"; // include configurations
  include "includes/validations.php";

	db_connect();   // db connection
//  login_check();  // login checking

if(isset($_POST['User_Login'])) {

    $error_message = '';
    $success_message = '';

    $data = validate_Email($_POST['User_Email']);
    if($data['status'] === FALSE ) {
      $error_message = "Invalid Username / Password";
    } else {
      $User_Email = $data['data'];
    }

    $data = validate_username($_POST['User_Password']);
    if($data['status'] === FALSE ) {
      $error_message = "Invalid Username / Password";
    } else {
      $User_Passowrd = md5($data['data']);
    }

    if($error_message == '' ) {

      $user_sql = "SELECT UserID, User_Name, User_Email, User_Status FROM users_tbl WHERE User_Email = '".$User_Email."' AND User_Password = '".$User_Passowrd."'";

      $user_result = mysql_query($user_sql);
      
      if(mysql_num_rows($user_result)) {

        $user_details = mysql_fetch_assoc($user_result);

        if($user_details['User_Status'] == 1) {

          $_SESSION['UserID'] = $user_details['UserID'];
          $_SESSION['User_Name'] = stripslashes($user_details['User_Name']);
          $_SESSION['User_Email'] = stripslashes($user_details['User_Email']);

          header('Location:index.php');

        } else {

          $error_message = "This user Temporarly blocked by admin";

        }
      } else {

        $error_message = "Invalid Username / Password";

      }
      
    }

    
    
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>login | Exam</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/style.css" rel="stylesheet">
</head>
<body>
