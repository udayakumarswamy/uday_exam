<?php
ob_start();
  include "includes/admin_config.php"; // include configurations
  include "includes/admin_validations.php";

  db_connect();   // db connection
  login_check();  // login checking
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Admin Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">Admin Dashboard </a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> <?php echo $_SESSION['Admin_Username']; ?> <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="profile.php?Admin_ID=<?php echo $_SESSION['Admin_ID']; ?>">Profile</a></li>
              <li><a href="logout.php">Logout</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li class="active"><a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>
        <li><a href="years_list.php"><i class="icon-list-alt"></i><span>Years</span> </a> </li>
				<li><a href="classes_list.php"><i class="icon-list-alt"></i><span>Classes</span> </a> </li>
        <li><a href="subjects_list.php"><i class="icon-list-alt"></i><span>Subjects</span> </a> </li>
        <li><a href="questions_list.php"><i class="icon-list-alt"></i><span>Questions</span> </a> </li>
				<li><a href="tests_list.php"><i class="icon-list-alt"></i><span>Mock Tests</span> </a> </li>
				<li><a href="exams_list.php"><i class="icon-list-alt"></i><span>User Exams</span> </a> </li>
				<li><a href="users_list.php"><i class="icon-user"></i><span>Users</span> </a> </li>
				<li><a href="admins_list.php"><i class="icon-user"></i><span>Admins</span> </a> </li>
				<li><a href="roles_list.php"><i class="icon-user"></i><span>Roles</span> </a> </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->


