<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
						<li class="active"><a href="admins_list.php">Admins List</a></li>
						<li><a href="admin_add.php">Add New Admin</a></li>
						<li><a href="admin_edit.php">Edit Admin</a></li>
					</ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Admins List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th> S.No </th>
                        <th> Admin Name </th>
												<th> Admin Email </th>
                        <th> Admin Status </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  $admins_sql = "SELECT Admin_ID, Admin_Username, Admin_Email, Admin_Status, CreatedOn, CreatedBy, UpdatedOn, UpdatedBy, TrashStatus FROM admin_tbl WHERE TrashStatus = 0";
                  $admins_result = mysql_query($admins_sql);

                  if(mysql_num_rows($admins_result)) {
                  $i = 1;
                    while($admin_details = mysql_fetch_assoc($admins_result)) {
                    ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $admin_details['Admin_Username']; ?></td>
												<td> <?php echo $admin_details['Admin_Email']; ?></td>
                        <td>
                        <?php
                        if($admin_details['Admin_Status'] == 1) {
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
                          <a class="btn btn-small " href="admin_edit.php?Admin_ID=<?php echo $admin_details['Admin_ID']; ?>">
                            <i class="icon-edit"></i>
                          </a>
                          <a class="btn btn-small " href="status_change.php?Admin_ID=<?php echo $admin_details['Admin_ID']; ?>">
                          <?php
                            if($admin_details['Admin_Status'] == 1) {
                              ?>
				                    <i class="icon-unlock"></i>
                            <?php } else {
                            ?>
                            <i class="icon-lock"></i>
                            <?php } ?>
                          </a>
                          <a class="btn btn-danger btn-small" href="delete.php?Admin_ID=<?php echo $admin_details['Admin_ID']; ?>">
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
