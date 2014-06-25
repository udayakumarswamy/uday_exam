<?php include "header.php"; ?>
<?php
	if( !isset($_SESSION['ClassID']) || !isset($_SESSION['SubjectID']) || !isset($_SESSION['Questions'])) {
			header('Locatioin:index.php');
	}
?>
<div style="width:75%; margin: 0 auto;">

<?php
	if(isset($_POST['Exam_Submit'])) {
			$QuestionIDs = explode(',' , $_POST['QuestionIDs']);
			$Answers = array();
			foreach($QuestionIDs as $QuestionID) {
					$Answers[$QuestionID] = $_POST['option_'.$QuestionID];
			}

			$CorrectAnswers = array();
			$question_answers_sql = "SELECT * FROM questions_tbl WHERE QuestionID in (".$_POST['QuestionIDs'].")";
			$question_answers_result = mysql_query($question_answers_sql);
			if(mysql_num_rows($question_answers_result)) {
					while($question_answer = mysql_fetch_assoc($question_answers_result)) {
							$CorrectAnswers[$question_answer['QuestionID']] = $question_answer['Answer'];
					}	
			}

			$total = 0;
			$correct = 0;
			$incorrect = 0;
			foreach($Answers as $key => $Answer) {
					if($Answer == $CorrectAnswers[$key] ) {
						$correct++;
					} else {
						$incorrect++;
					}
					$total++;
			}
			$percentage = round(($correct/$total)*100);
			$exam_sql = "INSERT INTO user_exams_tbl(UserID, ClassID, SubjectID, Total_Questions, Correct_Answers, Wrong_Answers, Percentage, Total_Time, Exam_Answers, User_Answers) VALUES('".$_SESSION['UserID']."', '".$_SESSION['ClassID']."', '".$_SESSION['SubjectID']."', '".$total."', '".$correct."', '".$incorrect."', '".$percentage."', '', '".serialize($CorrectAnswers)."', '".serialize($Answers)."')";

			if(mysql_query($exam_sql)) {
					unset($_SESSION['ClassID']);
					unset($_SESSION['SubjectID']);
			}

			?>
			<h1>Result</h1>
			<h3> You Got  <?php echo $percentage; ?>%</h3>
			<div> Total Questions = <?php echo $total; ?> </div>
			<div> Correct Answers = <?php echo $correct; ?> </div>
			<div> Wrong Answers   = <?php echo $incorrect; ?> </div>
			<?php
	} else {
			header('Location:index.php');
	}
?>


</div>

<?php include "footer.php"; ?>