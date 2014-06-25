<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

          <ul class="nav nav-tabs">
						<li class="active"><a href="users_list.php">Users List</a></li>
						<li><a href="user_add.php">Add New User</a></li>
						<li><a href="user_edit.php">Edit User</a></li>
					</ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Users List</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                  <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th> S.No </th>
                        <th> User Name </th>
						<th> User Email </th>
                        <th> Class Status </th>
                        <th class="td-actions">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                <?php
                  $users_sql = "SELECT UserID, User_Name, User_Email, User_Status, CreatedOn, CreatedBy, UpdatedOn, UpdatedBy, TrashStatus FROM users_tbl WHERE TrashStatus = 0";
                  $users_result = mysql_query($users_sql);

                  if(mysql_num_rows($users_result)) {
                  $i = 1;
                    while($user_details = mysql_fetch_assoc($users_result)) {
                    ?>
                      <tr>
                        <td> <?php echo $i; ?> </td>
                        <td> <?php echo $user_details['User_Name']; ?></td>
												<td> <?php echo $user_details['User_Email']; ?></td>
                        <td>
                        <?php
                        if($user_details['User_Status'] == 1) {
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
                          <a class="btn btn-small " href="user_edit.php?UserID=<?php echo $user_details['UserID']; ?>">
                            <i class="icon-edit"></i>
                          </a>
                          <a class="btn btn-small " href="status_change.php?UserID=<?php echo $user_details['UserID']; ?>">
                          <?php
                            if($user_details['User_Status'] == 1) {
                              ?>
				                    <i class="icon-unlock"></i>
                            <?php } else {
                            ?>
                            <i class="icon-lock"></i>
                            <?php } ?>
                          </a>
                          <a class="btn btn-danger btn-small" href="delete.php?UserID=<?php echo $user_details['UserID']; ?>">
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
