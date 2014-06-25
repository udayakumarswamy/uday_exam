<?php
  include "includes/config.php"; // include configurations

  db_connect();   // db connection
  login_check();  // login checking

  // class Status
  if(isset($_GET['ClassID'])) {
    $class_sql = "SELECT Class_Status FROM classes_tbl WHERE ClassID = '".intval($_GET['ClassID'])."'";
    $class_result = mysql_query($class_sql);
    if(mysql_num_rows($class_result)) {
      $class_details = mysql_fetch_assoc($class_result);

      if($class_details['Class_Status'] == 1) {
        $class_sql = "UPDATE classes_tbl SET Class_Status = '0' WHERE ClassID = '".intval($_GET['ClassID'])."'";
      } else {
        $class_sql = "UPDATE classes_tbl SET Class_Status = '1' WHERE ClassID = '".intval($_GET['ClassID'])."'";        
      }
      $class_result = mysql_query($class_sql);
    }
  }

  // class Status
  if(isset($_GET['SubjectID'])) {
    $subject_sql = "SELECT Subject_Status FROM subjects_tbl WHERE SubjectID = '".intval($_GET['SubjectID'])."'";
    $subject_result = mysql_query($subject_sql);
    if(mysql_num_rows($subject_result)) {
      $subject_details = mysql_fetch_assoc($subject_result);

      if($subject_details['Subject_Status'] == 1) {
        $subject_sql = "UPDATE subjects_tbl SET Subject_Status = '0' WHERE SubjectID = '".intval($_GET['SubjectID'])."'";
      } else {
        $subject_sql = "UPDATE subjects_tbl SET Subject_Status = '1' WHERE SubjectID = '".intval($_GET['SubjectID'])."'";        
      }
      $subject_result = mysql_query($subject_sql);
    }
  }

  // Exam Status
  if(isset($_GET['ExamID'])) {
    $exam_sql = "SELECT Exam_Status FROM exams_tbl WHERE ExamID = '".intval($_GET['ExamID'])."'";
    $exam_result = mysql_query($exam_sql);
    if(mysql_num_rows($exam_result)) {
      $exam_details = mysql_fetch_assoc($exam_result);

      if($exam_details['Exam_Status'] == 1) {
        $exam_sql = "UPDATE exams_tbl SET Exam_Status = '0' WHERE ExamID = '".intval($_GET['ExamID'])."'";
      } else {
        $exam_sql = "UPDATE exams_tbl SET Exam_Status = '1' WHERE ExamID = '".intval($_GET['ExamID'])."'";        
      }
      $exam_result = mysql_query($exam_sql);
    }
  }

  // Question Status
  if(isset($_GET['QuestionID'])) {
    $question_sql = "SELECT Question_Status FROM questions_tbl WHERE QuestionID = '".intval($_GET['QuestionID'])."'";
    $question_result = mysql_query($question_sql);
    if(mysql_num_rows($question_result)) {
      $question_details = mysql_fetch_assoc($question_result);

      if($question_details['Question_Status'] == 1) {
        $question_sql = "UPDATE questions_tbl SET Question_Status = '0' WHERE QuestionID = '".intval($_GET['QuestionID'])."'";
      } else {
        $question_sql = "UPDATE questions_tbl SET Question_Status = '1' WHERE QuestionID = '".intval($_GET['QuestionID'])."'";        
      }
      $question_result = mysql_query($question_sql);
    }
  }

  // User Status
  if(isset($_GET['UserID'])) {
    $user_sql = "SELECT User_Status FROM users_tbl WHERE UserID = '".intval($_GET['UserID'])."'";
    $user_result = mysql_query($user_sql);
    if(mysql_num_rows($user_result)) {
      $user_details = mysql_fetch_assoc($user_result);

      if($user_details['User_Status'] == 1) {
        $user_sql = "UPDATE users_tbl SET User_Status = '0' WHERE UserID = '".intval($_GET['UserID'])."'";
      } else {
        $user_sql = "UPDATE users_tbl SET User_Status = '1' WHERE UserID = '".intval($_GET['UserID'])."'";        
      }
      $user_result = mysql_query($user_sql);
    }
  }

	// Admin Status
  if(isset($_GET['Admin_ID'])) {
    $admin_sql = "SELECT Admin_Status FROM admin_tbl WHERE Admin_ID = '".intval($_GET['Admin_ID'])."'";
    $admin_result = mysql_query($admin_sql);
    if(mysql_num_rows($admin_result)) {
      $admin_details = mysql_fetch_assoc($admin_result);

      if($admin_details['Admin_Status'] == 1) {
        $admin_sql = "UPDATE admin_tbl SET Admin_Status = '0' WHERE Admin_ID = '".intval($_GET['Admin_ID'])."'";
      } else {
        $admin_sql = "UPDATE admin_tbl SET Admin_Status = '1' WHERE Admin_ID = '".intval($_GET['Admin_ID'])."'";        
      }
      $admin_result = mysql_query($admin_sql);
    }
  }

$previous_url = $_SERVER['HTTP_REFERER'];
header('Location:'.$previous_url);


?>
