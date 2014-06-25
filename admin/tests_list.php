<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
				    <li class="active"><a href="tests_list.php">Mock Tests List</a></li>
				    <li><a href="test_add.php">Add New Mock Test</a></li>
				    <li><a href="test_edit.php">Edit Mock Test</a></li>
				  </ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Mock Tests List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th> S.No </th>
                        <th> Year </th>
                        <th> Test Name </th>
												<th> Test Description </th>
												<th> Test Questions </th>
												<th> Test Status </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  $tests_sql = "SELECT t.TestID, y.YearName, t.Test_Name, t.Test_Description, t.Test_Questions, t.Test_Status, t.CreatedOn, t.CreatedBy, t.UpdatedOn, t.UpdatedBy, t.TrashStatus FROM tests_tbl t,years_tbl y WHERE t.YearID = y.YearID AND t.TrashStatus = 0";
                  $tests_result = mysql_query($tests_sql);

                  if(mysql_num_rows($tests_result)) {
                  $i = 1;
                    while($test_details = mysql_fetch_assoc($tests_result)) {
                    ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $test_details['YearName']; ?></td>
												<td> <?php echo $test_details['Test_Name']; ?></td>
												<td> <?php echo $test_details['Test_Description']; ?></td>
												<td> <?php echo $test_details['Test_Questions']; ?></td>
                        <td>
                        <?php
                        if($test_details['Test_Status'] == 1) {
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
                          <a class="btn btn-small " href="test_view.php?TestID=<?php echo $test_details['TestID']; ?>">
                            <i class="icon-eye-open"></i>
                          </a>
													<a class="btn btn-small " href="test_edit.php?TestID=<?php echo $test_details['TestID']; ?>">
                            <i class="icon-edit"></i>
                          </a>
                          <a class="btn btn-small " href="status_change.php?TestID=<?php echo $test_details['TestID']; ?>">
                          <?php
                            if($test_details['Test_Status'] == 1) {
                              ?>
				                    <i class="icon-unlock"></i>
                            <?php } else {
                            ?>
                            <i class="icon-lock"></i>
                            <?php } ?>
                          </a>
                          <a class="btn btn-danger btn-small" href="delete.php?TestID=<?php echo $test_details['TestID']; ?>">
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
