<?php include "header.php"; ?>

<div>
	<?php
		$subjects_sql = "SELECT s.SubjectID, s.ClassID, c.Class_Name, s.Subject_Name FROM subjects_tbl s, classes_tbl c WHERE s.ClassID = c.ClassID AND s.ClassID = '".intval($_GET['ClassID'])."' AND s.TrashStatus = 0";
		$subjects_result = mysql_query($subjects_sql);

		if(mysql_num_rows($subjects_result)) {
			while($subject_details = mysql_fetch_assoc($subjects_result)) {
			?>
				<div>
					<a href="exam_details.php?ClassID=<?php echo $subject_details['ClassID']; ?>&SubjectID=<?php echo $subject_details['SubjectID']; ?>">
						<?php echo $subject_details['Subject_Name']; ?>
					</a>
				</div>
			<?php
			}
		} else {
				?>
				<div> No Sunjects found	</div>
				<?php
		}
	?>
	<a href="<?php echo $_SERVER['HTTP_REFERER']; ?>" >click here to go back</a>
</div>

<?php include "footer.php"; ?>