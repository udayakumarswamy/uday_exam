<?php include "header.php"; ?>

<div>
Classes :
	<?php
		$classes_sql = "SELECT ClassID, Class_Name, Class_Status, CreatedOn, CreatedBy, UpdatedOn, UpdatedBy, TrashStatus FROM classes_tbl WHERE TrashStatus = 0";
		$classes_result = mysql_query($classes_sql);

		if(mysql_num_rows($classes_result)) {
		$i = 1;
			while($class_details = mysql_fetch_assoc($classes_result)) {
			?>
				<div>
					<a href="subjects.php?ClassID=<?php echo $class_details['ClassID']; ?>">
						<?php echo $class_details['Class_Name']; ?>
					</a>
				</div>
			<?php
			$i++;
			}
		}
	
	?>
</div>


<?php include "footer.php"; ?>