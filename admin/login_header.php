<?php
  include "includes/admin_config.php"; // include configurations
  include "includes/admin_validations.php";

  db_connect();   // db connection

  if(isset($_POST['Admin_Login'])) {

    $error_message = '';
    $success_message = '';

    $data = validate_username($_POST['Admin_Username']);
    if($data['status'] === FALSE ) {
      $error_message = "Invalid Username / Password";
    } else {
      $Admin_Username = $data['data'];
    }

    $data = validate_username($_POST['Admin_Password']);
    if($data['status'] === FALSE ) {
      $error_message = "Invalid Username / Password";
    } else {
      $Admin_Passowrd = md5($data['data']);
    }

    if($error_message == '' ) {

      $admin_sql = "SELECT Admin_ID, Admin_Username, Admin_Email, Admin_RoleID, Admin_Status FROM admin_tbl WHERE Admin_Username = '".$Admin_Username."' AND Admin_Password = '".$Admin_Passowrd."'";

      $admin_result = mysql_query($admin_sql);
      
      if(mysql_num_rows($admin_result)) {

        $admin_details = mysql_fetch_assoc($admin_result);

        if($admin_details['Admin_Status'] == 1) {

          $_SESSION['Admin_ID'] = $admin_details['Admin_ID'];
          $_SESSION['Admin_Username'] = stripslashes($admin_details['Admin_Username']);
          $_SESSION['Admin_Email'] = stripslashes($admin_details['Admin_Email']);
          $_SESSION['Admin_RoleID'] = $admin_details['Admin_RoleID'];
					
					header('Location:index.php');
					exit;

        } else {

          $error_message = "This user Temporarly blocked by administrator";

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
    <title>Admin Login</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
    
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<a class="brand" href="index.html">
				Admin Panel				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					
					<li class="">						
						<a href="signup.html" class="">
							Don't have an account?
						</a>
						
					</li>
					
					<li class="">						
<!--						<a href="index.php" class="">
							<i class="icon-chevron-left"></i>
							Back to Homepage
						</a> -->
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



