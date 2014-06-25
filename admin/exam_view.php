<?php include "header.php"; ?>
<?php
if(isset($_GET['UEID'])) {
  $exam_sql = "SELECT e.UEID, e.Percentage, e.Total_Questions, e.Correct_Answers, e.Wrong_Answers, s.Subject_Name, c.Class_Name, u.User_Name, u.User_Email, e.UExam_Status, e.CreatedOn, e.CreatedBy, e.UpdatedOn, e.UpdatedBy FROM user_exams_tbl e, subjects_tbl s, classes_tbl c, users_tbl u WHERE e.ClassID = c.ClassID AND e.SubjectID = s.SubjectID AND e.UserId = u.UserID AND e.TrashStatus = 0 AND e.UEID = '".intval($_GET['UEID'])."'";
  $exam_result = mysql_query($exam_sql);
  if(mysql_num_rows($exam_result)) {
    $exam_details = mysql_fetch_assoc($exam_result);
  } else {
    header('Location:exams_list.php');
  }
} else {
  header('Location:exams_list.php');
}
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
				    <li><a href="exams_list.php">Exams List</a></li>
				    <li class="active"><a href="exam_view.php">View Exam Details</a></li>
				  </ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Exams Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
									<div class="control-group">											
										<label for="firstname" class="control-label">User Name :</label>
										<div class="controls">
											<?php echo $exam_details['User_Name']; ?>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label for="firstname" class="control-label">User Email :</label>
										<div class="controls">
											<?php echo $exam_details['User_Email']; ?>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label for="firstname" class="control-label">Class Name :</label>
										<div class="controls">
											<?php echo $exam_details['Class_Name']; ?>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label for="firstname" class="control-label">Subject Name :</label>
										<div class="controls">
											<?php echo $exam_details['Subject_Name']; ?>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label for="firstname" class="control-label">Percentage :</label>
										<div class="controls">
											<?php echo $exam_details['Percentage']; ?>%
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label for="firstname" class="control-label">Total Question</label>
										<div class="controls">
											<?php echo $exam_details['Total_Questions']; ?>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label for="firstname" class="control-label">Correct Answers</label>
										<div class="controls">
											<?php echo $exam_details['Correct_Answers']; ?>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label for="firstname" class="control-label">Wrong Answes</label>
										<div class="controls">
											<?php echo $exam_details['Wrong_Answers']; ?>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

									<div class="control-group">											
										<label for="firstname" class="control-label">Date</label>
										<div class="controls">
											<?php echo date('d/m/Y h:i:s A', strtotime($exam_details['CreatedOn'])); ?>
										</div> <!-- /controls -->				
									</div> <!-- /control-group -->

                  
                </div>
                <!-- /widget-content --> 
                
              </div>
            </div>
          </div>
          <!-- /widget -->

        </div>
        <!-- /span6 -->
        
      </div>
      <!-- /row --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /main-inner --> 
</div>
<!-- /main -->
<?php include "footer.php" ?>
