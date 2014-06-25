<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
				    <li class="active"><a href="years_list.php">Years List</a></li>
				    <li><a href="year_add.php">Add New Year</a></li>
				    <li><a href="year_edit.php">Edit Year</a></li>
				  </ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Years List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th> S.No </th>
                        <th> Year Name </th>
                        <th> Year Status </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  $years_sql = "SELECT YearID, YearName, Year_Status, CreatedOn, CreatedBy, UpdatedOn, UpdatedBy, TrashStatus FROM years_tbl WHERE TrashStatus = 0";
                  $years_result = mysql_query($years_sql);

                  if(mysql_num_rows($years_result)) {
                  $i = 1;
                    while($year_details = mysql_fetch_assoc($years_result)) {
                    ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $year_details['YearName']; ?></td>
                        <td>
                        <?php
                        if($year_details['Year_Status'] == 1) {
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
                          <a class="btn btn-small " href="class_edit.php?YearID=<?php echo $year_details['YearID']; ?>">
                            <i class="icon-edit"></i>
                          </a>
                          <a class="btn btn-small " href="status_change.php?YearID=<?php echo $year_details['YearID']; ?>">
                          <?php
                            if($year_details['Year_Status'] == 1) {
                              ?>
				                    <i class="icon-unlock"></i>
                            <?php } else {
                            ?>
                            <i class="icon-lock"></i>
                            <?php } ?>
                          </a>
                          <a class="btn btn-danger btn-small" href="delete.php?YearID=<?php echo $year_details['YearID']; ?>">
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
