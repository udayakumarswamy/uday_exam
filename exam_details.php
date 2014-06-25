<?php include "header.php"; ?>
<?php
	extract($_POST);
	if(intval($ClassID) != '' && intval($SubjectID) != '' && intval($Questions) != '') {
			$_SESSION['ClassID'] = $ClassID;
			$_SESSION['SubjectID'] = $SubjectID;
			$_SESSION['Questions'] = $Questions;

			$url = "exam_start.php?ClassID=".$ClassID."&SubjectID=".$SubjectID."&Questions=".$Questions;
			header("Location:$url");
	}
?>
<div>

	<?php
		$subjects_sql = "SELECT s.SubjectID, s.ClassID, c.Class_Name, s.Subject_Name FROM subjects_tbl s, classes_tbl c WHERE s.ClassID = c.ClassID AND s.ClassID = '".intval($_GET['ClassID'])."' AND s.SubjectID = '".intval($_GET['SubjectID'])."' AND s.TrashStatus = 0";
		$subjects_result = mysql_query($subjects_sql);
		$subject_details = mysql_fetch_assoc($subjects_result);
			?>
				<div>Class : <?php echo $subject_details['Class_Name']; ?></div>
				<div>Subject : <?php echo $subject_details['Subject_Name']; ?></div>

	<form action="" method="post">
		<input type="hidden" name="ClassID" id="ClassID" value="<?php echo intval($_GET['ClassID']); ?>" >
		<input type="hidden" name="SubjectID" id="SubjectID" value="<?php echo intval($_GET['SubjectID']); ?>" >

		<div class="login-fields">
			<div class="field">
				<label for="username">No of Questions</label>
				<input type="text" id="Questions" name="Questions" class="login username-field">
			</div> <!-- /field -->
			
		</div> <!-- /login-fields -->
		
		<div class="login-actions">
			<button type="submit" name="Start_Exam" id="Start_Exam" class="button btn btn-success btn-large">Start_Exam</button>
		</div> <!-- .actions -->
	</form>




	<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" >click here to go back</a>
</div>

<?php include "footer.php"; ?>