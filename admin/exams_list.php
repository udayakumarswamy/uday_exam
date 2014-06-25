<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
				    <li class="active"><a href="exams_list.php">Exams List</a></li>
				    <li><a href="exam_view.php">View Exam Details</a></li>
				  </ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Exams List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                  <table class="table table-striped table-bordered">
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
                  $exams_sql = "SELECT e.UEID, e.Percentage, s.Subject_Name, c.Class_Name, u.User_Name, u.User_Email, e.UExam_Status, e.CreatedOn, e.CreatedBy, e.UpdatedOn, e.UpdatedBy FROM user_exams_tbl e, subjects_tbl s, classes_tbl c, users_tbl u WHERE e.ClassID = c.ClassID AND e.SubjectID = s.SubjectID AND e.UserId = u.UserID AND e.TrashStatus = 0";
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
                            <i class="icon-external-link"></i>
                          </a>
                          <a class="btn btn-small " href="status_change.php?UEID=<?php echo $exam_details['UEID']; ?>">
                          <?php
                            if($exam_details['UExam_Status'] == 1) {
                              ?>
				                    <i class="icon-unlock"></i>
                            <?php } else {
                            ?>
                            <i class="icon-lock"></i>
                            <?php } ?>
                          </a>
                          <a class="btn btn-danger btn-small" href="delete.php?UEID=<?php echo $exam_details['UEID']; ?>">
                            <i class="btn-icon-only icon-trash"> </i>
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
