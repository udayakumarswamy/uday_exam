<?php include "header.php"; ?>
<?php
	if(isset($_POST['Exam_Submit'])) {
			$QuestionIDs = explode(',' , $_POST['QuestionIDs']);
			$Answers = array();
			foreach($QuestionIDs as $QuestionID) {
					$Answers[$QuestionID] = $_POST['option_'.$QuestionID];
			}

			print_r($Answers);
	}
?>
<?php
	if( !isset($_SESSION['ClassID']) || !isset($_SESSION['SubjectID']) || !isset($_SESSION['Questions'])) {
			header('Locatioin:index.php');
	}
?>
<div style="width:75%; margin: 0 auto;">
	<div style="width:80%;  float:left;  height: 600px; overflow: auto;">
		<table>
			<?php
				$questions = array();
				$questions_sql = "SELECT q.QuestionID, q.Question FROM questions_tbl q WHERE q.ClassID = '".$_SESSION['ClassID']."' AND q.SubjectID = '".$_SESSION['SubjectID']."' AND q.TrashStatus = 0 LIMIT ".$_SESSION['Questions'];
				$questions_result = mysql_query($questions_sql);
				$total = mysql_num_rows($questions_result);
				if($total) {
					$i = 1;
					while($question_details = mysql_fetch_assoc($questions_result)) {
							$questions[$question_details['QuestionID']] = $question_details['QuestionID'];
							?>
							<tr>
								<td> <?php echo $i; ?>) </td>
								<td><b> <?php echo stripslashes($question_details['Question']);  ?> </b></td>
							</tr>
							<tr>
								<td></td>
								<td>
									<table>
									<?php
									$options_sql = "SELECT OptionID, Question_Option FROM question_options_tbl WHERE QuestionID =".$question_details['QuestionID'];
									$options_result = mysql_query($options_sql);
									$j =1;
									while($option = mysql_fetch_assoc($options_result)) {
											?>
											<tr>
												<td> <?php echo chr(96+$j); ?> ) </td>
												<td>
													<?php echo stripslashes($option['Question_Option']); ?>

												</td>
											</tr>
											<?php
											$j++;
									}
									?>
									</table>
								</td>
							</tr>
							<?php
							$i++;
					}
				}

			?>
		</table>
	</div>
	<div style="width:20%; float:right;">
		<form method="post" action="exam_submit.php" >
		<table width="100%">
			<tr>
				<th>Q.No</th>
				<th>A</th>
				<th>B</th>
				<th>C</th>
				<th>D</th>
			</tr>
			<?php
				$i=1;
				foreach($questions as $question) {
			?>
				<tr>
					<td><?php echo $i; ?>) </td>
					<td><input type="radio" name="option_<?php echo $question; ?>" value="1" ></td>
					<td><input type="radio" name="option_<?php echo $question; ?>" value="2" ></td>
					<td><input type="radio" name="option_<?php echo $question; ?>" value="3" ></td>
					<td><input type="radio" name="option_<?php echo $question; ?>" value="4" ></td>
				</tr>
			<?php
				$i++;
				}
			?>
			<tr>
				<td colspan="5">
				<input type="hidden" name="QuestionIDs" id="QuestionIDs" value="<?php echo implode(',', $questions); ?>" >
				<input type="submit" name="Exam_Submit" id="Exam_Status" value="Submit" style="width:100%" >
				</th>
			</tr>

		</table>
		</form>
	</div>
</div>

<?php include "footer.php"; ?>