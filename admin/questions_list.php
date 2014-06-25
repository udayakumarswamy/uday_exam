<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
				    <li class="active"><a href="questions_list.php">Questions List</a></li>
				    <li><a href="question_add.php">Add New Question</a></li>
				    <li><a href="question_edit.php">Edit Question</a></li>
				  </ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Questions List</h3>
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
                        <th> Question </th>
                        <th> Question Status </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  $questions_sql = "SELECT q.QuestionID, s.Subject_Name, c.Class_Name, q.Question, q.Question_Status, q.CreatedOn, q.CreatedBy, q.UpdatedOn, q.UpdatedBy FROM questions_tbl q, subjects_tbl s, classes_tbl c WHERE q.ClassID = c.ClassID AND q.SubjectID = s.SubjectID AND q.TrashStatus = 0";
                  $questions_result = mysql_query($questions_sql);

                  if(mysql_num_rows($questions_result)) {
                  $i = 1;
                    while($question_details = mysql_fetch_assoc($questions_result)) {
                    ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $question_details['Class_Name']; ?></td>
                        <td> <?php echo $question_details['Subject_Name']; ?></td>
                        <td> <?php echo $question_details['Question']; ?></td>
                        <td>
                        <?php
                        if($question_details['Question_Status'] == 1) {
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
                          <a class="btn btn-small " href="question_view.php?QuestionID=<?php echo $question_details['QuestionID']; ?>">
                            <i class="icon-share"></i>
                          </a>
                          <a class="btn btn-small " href="question_edit.php?QuestionID=<?php echo $question_details['QuestionID']; ?>">
                            <i class="icon-edit"></i>
                          </a>
                          <a class="btn btn-small " href="status_change.php?QuestionID=<?php echo $question_details['QuestionID']; ?>">
                          <?php
                            if($question_details['Question_Status'] == 1) {
                              ?>
				                    <i class="icon-unlock"></i>
                            <?php } else {
                            ?>
                            <i class="icon-lock"></i>
                            <?php } ?>
                          </a>
                          <a class="btn btn-danger btn-small" href="delete.php?QuestionID=<?php echo $question_details['QuestionID']; ?>">
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
