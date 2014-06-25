<?php
  include "../includes/config.php"; // include configurations
  include "../includes/validations.php";

  db_connect();   // db connection
  login_check();  // login checking

  $ClassID = intval($_POST['ClassID']);

?>
<select name="SubjectID" id="SubjectID">
  <option value="">--Select Class--</option>
<?php
  $subject_sql = "SELECT SubjectID, Subject_Name FROM subjects_tbl WHERE ClassID = '".$ClassID."'";
  $subject_result = mysql_query($subject_sql);
  if(mysql_num_rows($subject_result)) {
    while($subject_details = mysql_fetch_assoc($subject_result)) {
      ?>
        <option value="<?php echo $subject_details['SubjectID']; ?>"><?php echo $subject_details['Subject_Name']; ?></option>
      <?php
    }
  }
?>
</select>
