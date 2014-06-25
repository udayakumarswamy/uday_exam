<?php include "header.php"; ?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-list-alt"></i>
              <h3> Profile's Details</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                <?php
                  $admin_sql = "SELECT a.Admin_ID, a.Admin_Username, a.Admin_Email, a.Admin_Status, r.Role_Name FROM admin_tbl a INNER JOIN roles_tbl r ON a.Admin_RoleID = r.RoleID AND a.Admin_ID = ".intval($_GET['Admin_ID']);
                  $admin_result = mysql_query($admin_sql);

                  if(mysql_num_rows($admin_result)) {
                    $admin_details = mysql_fetch_assoc($admin_result);
                    ?>

                    <div class="control-group">											
											<label for="username" class="control-label">Username : </label>
											<div class="controls">
												<?php echo $admin_details['Admin_Username']; ?>
											</div> <!-- /controls -->				
										</div>

										<div class="control-group">											
											<label for="username" class="control-label">Email ID : </label>
											<div class="controls">
												<?php echo $admin_details['Admin_Email']; ?>
											</div> <!-- /controls -->				
										</div>

										<div class="control-group">											
											<label for="username" class="control-label">Role  : </label>
											<div class="controls">
												<?php echo $admin_details['Role_Name']; ?>
											</div> <!-- /controls -->				
										</div>

										<div class="control-group">											
											<label for="username" class="control-label">Status  : </label>
											<div class="controls">
												<?php
												if($admin_details['Admin_Status'] == 1) {
												?>
												<button class="btn btn-success">Active</button>
												<?php
												}
												?>
											</div> <!-- /controls -->				
										</div>
                    
                    <?php
                  }
                
                ?>
                  
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
