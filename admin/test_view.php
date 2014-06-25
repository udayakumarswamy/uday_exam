<?php include "header.php"; ?>
<?php
if(isset($_GET['TestID'])) {
  $tests_sql = "SELECT t.TestID, y.YearName, t.Test_Name, t.Test_Description, t.Test_Questions, t.Test_Status, t.CreatedOn, t.CreatedBy, t.UpdatedOn, t.UpdatedBy, t.TrashStatus FROM tests_tbl t,years_tbl y WHERE t.YearID = y.YearID AND t.TrashStatus = 0 AND TestId=".intval($_GET['TestID']);
	$tests_result = mysql_query($tests_sql);
  if(mysql_num_rows($tests_result)) {
    $test_details = mysql_fetch_assoc($tests_result);
  } else {
    header('Location:tests_list.php');
  }
} else {
  header('Location:tests_list.php');
}
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
				    <li><a href="tests_list.php">Mock Tests List</a></li>
				    <li><a href="test_add.php">Add New Mock Test</a></li>
				    <li><a href="test_edit.php">Edit Mock Test</a></li>
						<li class="active"><a href="test_add.php">View Mock Test Details</a></li>
				  </ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Mock Tests Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th> Varialble </th>
                        <th> Value </th>
											</tr>
                    </thead>
                    <tbody>
											<tr>
												<td> Year </td>
												<td> <?php echo $test_details['YearName']; ?></td>
											</tr>
											<tr>
                        <td> Test Name </td>
												<td> <?php echo $test_details['Test_Name']; ?></td>
											</tr>
											<tr>
												<td> Test Description </td>
												<td> <?php echo $test_details['Test_Description']; ?></td>
											</tr>
											<tr>
												<td> Test Questions </td>
												<td> <?php echo $test_details['Test_Questions']; ?></td>
											</tr>
											<tr>
												<td> Test Status </td>
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
											</tr>
                      
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
