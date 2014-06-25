<?php include "header.php"; ?>
<?php
if(isset($_GET['UEID'])) {
  $exam_sql = "SELECT e.UEID, e.Percentage, e.Total_Questions, e.Correct_Answers, e.Wrong_Answers, s.Subject_Name, c.Class_Name, u.User_Name, u.User_Email, e.UExam_Status, e.CreatedOn, e.CreatedBy, e.UpdatedOn, e.UpdatedBy FROM user_exams_tbl e, subjects_tbl s, classes_tbl c, users_tbl u WHERE e.ClassID = c.ClassID AND e.SubjectID = s.SubjectID AND e.UserId = u.UserID AND e.TrashStatus = 0 AND e.UEID = '".intval($_GET['UEID'])."'";
  $exam_result = mysql_query($exam_sql);
  if(mysql_num_rows($exam_result)) {
    $exam_details = mysql_fetch_assoc($exam_result);
  } else {
    header('Location:myexams.php');
  }
} else {
  header('Location:myexams.php');
}
?>
<div>
	<div class="widget widget-nopad">
		<div class="widget-header"> <i class="icon-list-alt"></i>
			<h3> Exams Details</h3>
		</div>

		<table>
			<tr>
				<td>User Name :</td>
				<td><?php echo $exam_details['User_Name']; ?></td>
			</tr>
			<tr>
				<td>User Email :</td>
				<td><?php echo $exam_details['User_Email']; ?></td>
			</tr>
			<tr>
				<td>Class Name :</td>
				<td><?php echo $exam_details['Class_Name']; ?></td>
			</tr>
			<tr>
				<td>Subject Name :</td>
				<td><?php echo $exam_details['Subject_Name']; ?></td>
			</tr>
			<tr>
				<td>Percentage :</td>
				<td><?php echo $exam_details['Percentage']; ?>%</td>
			</tr>
			<tr>
				<td>Total Question</td>
				<td><?php echo $exam_details['Total_Questions']; ?></td>
			</tr>
			<tr>
				<td>Correct Answers</td>
				<td><?php echo $exam_details['Correct_Answers']; ?></td>
			</tr>
			<tr>
				<td>Wrong Answes</td>
				<td><?php echo $exam_details['Wrong_Answers']; ?></td>
			</tr>
			<tr>
				<td>Date</td>
				<td><?php echo date('d/m/Y h:i:s A', strtotime($exam_details['CreatedOn'])); ?><td>
			</tr>
		</table>
</div>


<?php include "footer.php"; ?>