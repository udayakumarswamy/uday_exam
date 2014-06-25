<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
				    <li class="active"><a href="subjects_list.php">Subjects List</a></li>
				    <li><a href="subject_add.php">Add New Subject</a></li>
				    <li><a href="subject_edit.php">Edit Subject</a></li>
				  </ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Subjects List</h3>
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
                        <th> Subject Status </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  $subjects_sql = "SELECT s.SubjectID, c.Class_Name, s.Subject_Name, s.Subject_Status, s.CreatedOn, s.CreatedBy, s.UpdatedOn, s.UpdatedBy FROM subjects_tbl s, classes_tbl c WHERE s.ClassID = c.ClassID AND s.TrashStatus = 0";
                  $subjects_result = mysql_query($subjects_sql);

                  if(mysql_num_rows($subjects_result)) {
                  $i = 1;
                    while($subject_details = mysql_fetch_assoc($subjects_result)) {
                    ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $subject_details['Class_Name']; ?></td>
                        <td> <?php echo $subject_details['Subject_Name']; ?></td>
                        <td>
                        <?php
                        if($subject_details['Subject_Status'] == 1) {
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
                          <a class="btn btn-small " href="subject_edit.php?SubjectID=<?php echo $subject_details['SubjectID']; ?>">
                            <i class="icon-edit"></i>
                          </a>
                          <a class="btn btn-small " href="status_change.php?SubjectID=<?php echo $subject_details['SubjectID']; ?>">
                          <?php
                            if($subject_details['Subject_Status'] == 1) {
                              ?>
				                    <i class="icon-unlock"></i>
                            <?php } else {
                            ?>
                            <i class="icon-lock"></i>
                            <?php } ?>
                          </a>
                          <a class="btn btn-danger btn-small" href="delete.php?SubjectID=<?php echo $subject_details['SubjectID']; ?>">
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
