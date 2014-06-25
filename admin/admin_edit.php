<?php include "header.php"; ?>
<?php
if(isset($_GET['Admin_ID'])) {
  $admin_sql = "SELECT Admin_Username, Admin_Email FROM admin_tbl WHERE Admin_ID = '".intval($_GET['Admin_ID'])."'";
  $admin_result = mysql_query($admin_sql);
  if(mysql_num_rows($admin_result)) {
    $admin_details = mysql_fetch_assoc($admin_result);
  } else {
    header('Location:admins_list.php');
  }
} else {
  header('Location:admins_list.php');
}
?>
<?php
  if(isset($_POST['Admin_Update'])) {
  extract($_POST);

    $error_message = '';
    $success_message = '';

    $data = validate_username($_POST['Admin_Username']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $Admin_Username = $data['data'];
    }

		$data = validate_Email($_POST['Admin_Email']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $Admin_Email = $data['data'];
    }

		$data = validate_Password($_POST['Admin_Password']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $Admin_Password = $data['data'];
			$password = 'ok';
    }

		if($password == 'ok') {
			$data = validate_Confirm_Password($_POST['Admin_Password'], $_POST['Confirm_Password']);
			if($data['status'] === FALSE ) {
				$error_message = $data['message'];
			} else {
				$Confirm_Password = $data['data'];
			}
		}


    if($error_message == '' ) {
      $admin_sql = "SELECT Admin_ID FROM admin_tbl WHERE Admin_Email = '".$Admin_Email."' AND Admin_ID != '".intval($_GET['Admin_ID'])."' AND TrashStatus = 0";
      $admin_result = mysql_query($admin_sql);
      if(mysql_num_rows($admin_result)) {
        $error_message = "This Email Already Exists";
      } else {
        $admin_sql = "UPDATE admin_tbl SET Admin_Username = '".$Admin_Username."', Admin_Email = '".$Admin_Email."', Admin_Password = '".$Admin_Password."' WHERE Admin_ID = '".intval($_GET['Admin_ID'])."'";
        $admin_result = mysql_query($admin_sql);
        if($admin_result) {
          $success_message = "Admin Successfully Updated";
        } else {
          $error_message = "Unable to update this Admin";
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
					<li><a href="admins_list.php">Admins List</a></li>
					<li><a href="admin_add.php">Add New Admin</a></li>
					<li class="active"><a href="admin_edit.php">Edit Admin</a></li>
				</ul>

				  
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-edit"></i>
              <h3> Edit Admin</h3>
            </div>
            <!-- /widget-header -->
            <div class="widget-content">
              <div class="widget big-stats-container">
                <div class="widget-content form-horizontal">
                <br>
                <?php
                  if($error_message != '') {
                  ?>
                <p class="alert alert-danger"><?php echo $error_message; ?></p>
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
										    <label for="Admin_Username" class="control-label">Admin Name</label>
										    <div class="controls">
											    <input type="text" value="<?php echo ($Admin_Username!='' ? $Admin_Username : $admin_details['Admin_Username']); ?>" id="Admin_Username" name="Admin_Username">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

											<div class="control-group">											
										    <label for="Admin_Email" class="control-label">Admin Email</label>
										    <div class="controls">
											    <input type="text" value="<?php echo ($Admin_Email!='' ? $Admin_Email : $admin_details['Admin_Email']); ?>" id="Admin_Email" name="Admin_Email">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

											<div class="control-group">											
										    <label for="Admin_Password" class="control-label">Admin Password</label>
										    <div class="controls">
											    <input type="text" id="Admin_Password" name="Admin_Password">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

											<div class="control-group">											
										    <label for="Confirm_Password" class="control-label">Confirm Password</label>
										    <div class="controls">
											    <input type="text"  id="Confirm_Password" name="Confirm_Password">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->
									
									
										
									    <div class="form-actions">
										    <button class="btn btn-primary" type="submit" name="Admin_Update" id="Admin_Update">Update</button> 
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
