<?php
session_start();
// database configuration variables and values
/*
define('DB_HOST' , "localhost");    // database host name
define('DB_USERNAME' , "storycompany");     // database user name
define('DB_PASSWORD' , "thskrl12");    // database password
define('DB_NAME' , "storycompany");  // database name
*/
define('DB_HOST' , "localhost");    // database host name
define('DB_USERNAME' , "root");     // database user name
define('DB_PASSWORD' , "");    // database password
define('DB_NAME' , "admin_panel");  // database name

// SMTP Details

define('SMTP_HOST' , "mail.localhost");     // SMTP host name
define('SMTP_USERNAME' , "info@localhost"); // SMTP user name
define('SMTP_PASSWORD' , "admin");          // SMTP password
define('SMTP_NAME' , "admin panel");        // SMTP From name


// database connection function
function db_connect() {

  $link = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);   // connect to database
  if (!$link) {
      die('Could not connect: ' . mysql_error());
  }

  // make DB_NAME the current db
  $db_selected = mysql_select_db(DB_NAME, $link);
  if (!$db_selected) {
      die ('Can\'t use '.DB_NAME.' : ' . mysql_error());
  }
}


// login Check function

function login_check() {
  if(!isset($_SESSION['UserID'])) {
    header('Location:login.php');
  }
}

?>
