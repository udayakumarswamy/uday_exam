<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
				    <li class="active"><a href="classes_list.php">Classes List</a></li>
				    <li><a href="class_add.php">Add New Class</a></li>
				    <li><a href="class_edit.php">Edit Class</a></li>
				  </ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Classes List</h3>
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
                        <th> Class Status </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  $classes_sql = "SELECT ClassID, Class_Name, Class_Status, CreatedOn, CreatedBy, UpdatedOn, UpdatedBy, TrashStatus FROM classes_tbl WHERE TrashStatus = 0";
                  $classes_result = mysql_query($classes_sql);

                  if(mysql_num_rows($classes_result)) {
                  $i = 1;
                    while($class_details = mysql_fetch_assoc($classes_result)) {
                    ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $class_details['Class_Name']; ?></td>
                        <td>
                        <?php
                        if($class_details['Class_Status'] == 1) {
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
                          <a class="btn btn-small " href="class_edit.php?ClassID=<?php echo $class_details['ClassID']; ?>">
                            <i class="icon-edit"></i>
                          </a>
                          <a class="btn btn-small " href="status_change.php?ClassID=<?php echo $class_details['ClassID']; ?>">
                          <?php
                            if($class_details['Class_Status'] == 1) {
                              ?>
				                    <i class="icon-unlock"></i>
                            <?php } else {
                            ?>
                            <i class="icon-lock"></i>
                            <?php } ?>
                          </a>
                          <a class="btn btn-danger btn-small" href="delete.php?ClassID=<?php echo $class_details['ClassID']; ?>">
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
