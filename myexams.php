<?php include "header.php"; ?>

<div>
	<table class="table table-striped table-bordered" border="1">
		<thead>
			<tr>
				<th> S.No </th>
				<th> Class Name </th>
				<th> Subject Name </th>
				<th> User Name </th>
				<th> Percentage </th>
				<th> Exam Status </th>
				<th class="td-actions">Action</th>
			</tr>
		</thead>
		<tbody>
<?php
	$exams_sql = "SELECT e.UEID, e.Percentage, s.Subject_Name, c.Class_Name, u.User_Name, u.User_Email, e.UExam_Status, e.CreatedOn, e.CreatedBy, e.UpdatedOn, e.UpdatedBy FROM user_exams_tbl e, subjects_tbl s, classes_tbl c, users_tbl u WHERE e.ClassID = c.ClassID AND e.SubjectID = s.SubjectID AND e.UserId = u.UserID AND e.TrashStatus = 0 AND e.UExam_Status = 1 AND e.UserID=".$_SESSION['UserID'];
	$exams_result = mysql_query($exams_sql);

	if(mysql_num_rows($exams_result)) {
	$i = 1;
		while($exam_details = mysql_fetch_assoc($exams_result)) {
		?>
			<tr>
				<td> <?php echo $i; ?> </td>
				<td> <?php echo $exam_details['Class_Name']; ?></td>
				<td> <?php echo $exam_details['Subject_Name']; ?></td>
				<td> <?php echo $exam_details['User_Name']; ?></td>
				<td> <?php echo $exam_details['Percentage']; ?>%</td>
				<td>
				<?php
				if($exam_details['UExam_Status'] == 1) {
					?>
					<span class="btn btn-success">Active</span>
					<?php 
				} else {
				?>
					<span class="btn btn-danger">InActive</span>
				<?php
				}
				?></td>
				<td class="td-actions">
					<a class="btn btn-small " href="exam_view.php?UEID=<?php echo $exam_details['UEID']; ?>">
					view details
					</a>
				</td>
			</tr>
		<?php
		$i++;
		}
	}

?>
			
			</tbody>
		</table>
</div>


<?php include "footer.php"; ?>