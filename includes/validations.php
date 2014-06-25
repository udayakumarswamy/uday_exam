<?php
/*
* All Fields Validations
*/

// Number validation
function validate_Number($number) {

  $status = ''; $msg = ''; $data = '';
  $number = addslashes(trim($number));

  if(!preg_match("/^[0-9]+$/", $number)) {

    $msg = "Only Number Accetable";
    $status = FALSE;

  } else {
    $msg = "";
    $status = TRUE;
  }

  $return_data = array('status' => $status, 'data' => $number, 'message' => $msg);

  return $return_data;
}

// Email validation
function validate_Email($email) {

  $status = ''; $msg = ''; $data = '';
  $email = addslashes(trim($email));

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $msg = "This (".$email.") email address not a valid.";
    $status = FALSE;
  } else {
    $msg = "";
    $status = TRUE;
  }

  $return_data = array('status' => $status, 'data' => $email, 'message' => $msg);
  return $return_data;
}

// Password validation
function validate_Password($password) {

  $status = ''; $msg = ''; $data = '';
  $password = addslashes(trim($password));

  if (strlen($password) < 6 ) {
    $msg = "Password Should be atleast 6 characters";
    $status = FALSE;
  } else {
    $msg = "";
    $status = TRUE;
  }

  $return_data = array('status' => $status, 'data' => md5($password), 'message' => $msg);
  return $return_data;
}

// Confirm Password validation
function validate_Confirm_Password($password, $cpassword) {

  $status = ''; $msg = ''; $data = '';
  $password = addslashes(trim($password));
	$cpassword = addslashes(trim($cpassword));

  if ($password != $cpassword) {
    $msg = "Password and confirm password not matched";
    $status = FALSE;
  } else {
    $msg = "";
    $status = TRUE;
  }

  $return_data = array('status' => $status, 'data' => md5($cpassword), 'message' => $msg);
  return $return_data;
}


// login username validation 

function validate_username($username) {

  $status = ''; $msg = ''; $data = '';
  $username = addslashes(trim($username));

  if(!preg_match("/^[a-zA-Z0-9]+$/", $username)) {

    $msg = "Special Characters Not allowed";
    $status = FALSE;

  } elseif (strlen($username) > 10 || strlen($username) < 2 ) {

    $msg = "Min 2 And Max 10 Characters";
    $status = FALSE;

  } else {
    $msg = "";
    $status = TRUE;
  }

  $return_data = array('status' => $status, 'data' => $username, 'message' => $msg);

  return $return_data;
}

// login password validation

/*function validate_password($password) {

  $status = ''; $msg = ''; $data = '';
  $password = addslashes(trim($password));

  if (strlen($password) > 10 || strlen($password) <2 ) {

    $msg = "Min 2 And Max 10 Characters";
    $status = FALSE;

  } else {
    $msg = "";
    $status = TRUE;
  }

  $return_data = array('status' => $status, 'data' => $password, 'message' => $msg);

  return $return_data;

}*/


?>
