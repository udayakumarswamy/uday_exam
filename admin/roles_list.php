<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

					<ul class="nav nav-tabs">
						<li class="active"><a href="roles_list.php">Roles List</a></li>
						<li><a href="role_add.php">Add New Role</a></li>
						<li><a href="role_edit.php">Edit Role</a></li>
					</ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Roles List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th> S.No </th>
                        <th> Role Name </th>
                        <th> Role Status </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  $roles_sql = "SELECT RoleID, Role_Name, Role_Status, CreatedOn, CreatedBy, UpdatedOn, UpdatedBy, TrashStatus FROM roles_tbl WHERE TrashStatus = 0";
                  $roles_result = mysql_query($roles_sql);

                  if(mysql_num_rows($roles_result)) {
                  $i = 1;
                    while($role_details = mysql_fetch_assoc($roles_result)) {
                    ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $role_details['Role_Name']; ?></td>
                        <td>
                        <?php
                        if($role_details['Role_Status'] == 1) {
                          ?>
                          <span class="btn btn-success">Active</span>
                          <?php 
                        }
                        ?></td>
                        <td class="td-actions">
                          <a class="btn btn-small " href="javascript:;">
                          <?php
                            if($role_details['Role_Status'] == 1) {
                              ?>
				                    <i class="icon-unlock"></i>
                            <?php } else {
                            ?>
                            <i class="icon-lock"></i>
                            <?php } ?>
                          </a>
                          <a class="btn btn-danger btn-small" href="javascript:;">
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
