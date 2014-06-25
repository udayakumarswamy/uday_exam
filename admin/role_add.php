<?php include "header.php"; ?>
<?php
  if(isset($_POST['Role_Add'])) {
  extract($_POST);

    $error_message = '';
    $success_message = '';

    $data = validate_username($_POST['Role_Name']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $Role_Name = $data['data'];
    }

    if($error_message == '' ) {
      $role_sql = "SELECT RoleID FROM roles_tbl WHERE Role_Name = '".$Role_Name."'";
      $role_result = mysql_query($role_sql);
      if(mysql_num_rows($role_result)) {
        $error_message = "This Role Already Exists";
      } else {
        $role_sql = "INSERT INTO roles_tbl(Role_Name) VALUES('".$Role_Name."')";
        $role_result = mysql_query($role_sql);
        if($role_result) {
          $success_message = "Role Successfully Added";
        } else {
          $error_message = "Unable to add this role";
        }
      }
    }
    
  }
?>
<div class="main">
  <div class="main-inner">
    <div class="container">
      <div class="row">
        <div class="span12">

					<ul class="nav nav-tabs">
						<li><a href="roles_list.php">Roles List</a></li>
						<li class="active"><a href="role_add.php">Add New Role</a></li>
						<li><a href="role_edit.php">Edit Role</a></li>
					</ul>

          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-edit"></i>
              <h3> Add New Role</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                <br>
                <?php
                  if($error_message != '') {
                  ?>
                <p class="alert"><?php echo $error_message; ?></p>
                  <?php
                  }
                  if($success_message != '') {
                  ?>
				        <p class="alert alert-success"><?php echo $success_message; ?></p>                  
                  <?php
                  }
                ?>
							    <form class="form-horizontal" action="" method="post">
								    <fieldset>
									
									    <div class="control-group">											
										    <label for="firstname" class="control-label">Role Name</label>
										    <div class="controls">
											    <input type="text" value="<?php echo $Role_Name; ?>" id="Role_Name" name="Role_Name">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->
									
									
										
									    <div class="form-actions">
										    <button class="btn btn-primary" type="submit" name="Role_Add" id="Role_Add">Add</button> 
										    <button class="btn" type="cancel">Cancel</button>
									    </div> <!-- /form-actions -->
								    </fieldset>
							    </form>

                  
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
