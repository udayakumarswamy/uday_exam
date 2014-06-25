<?php
  include "includes/config.php"; // include configurations

  db_connect();   // db connection
  login_check();  // login checking

  // class 
  if(isset($_GET['ClassID'])) {
    $class_sql = "UPDATE classes_tbl SET TrashStatus = '1' WHERE ClassID = '".intval($_GET['ClassID'])."'";
    mysql_query($class_sql);
  }

  // Subject 
  if(isset($_GET['SubjectID'])) {
    $subject_sql = "UPDATE subjects_tbl SET TrashStatus = '1' WHERE SubjectID = '".intval($_GET['SubjectID'])."'";
    mysql_query($subject_sql);
  }

  // Exam 
  if(isset($_GET['ExamID'])) {
    $exam_sql = "UPDATE exams_tbl SET TrashStatus = '1' WHERE ExamID = '".intval($_GET['ExamID'])."'";
    mysql_query($exam_sql);
  }

  // Question 
  if(isset($_GET['QuestionID'])) {
    $question_sql = "UPDATE questions_tbl SET TrashStatus = '1' WHERE QuestionID = '".intval($_GET['QuestionID'])."'";
    mysql_query($question_sql);
  }

  // User 
  if(isset($_GET['UserID'])) {
    $user_sql = "UPDATE users_tbl SET TrashStatus = '1' WHERE UserID = '".intval($_GET['UserID'])."'";
    mysql_query($user_sql);
  }

	// Admin 
  if(isset($_GET['Admin_ID'])) {
    $admin_sql = "UPDATE admin_tbl SET TrashStatus = '1' WHERE Admin_ID = '".intval($_GET['Admin_ID'])."'";
    mysql_query($admin_sql);
  }

$previous_url = $_SERVER['HTTP_REFERER'];
header('Location:'.$previous_url);


?>
