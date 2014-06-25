<?php include "header.php"; ?>
<?php
if(isset($_GET['UserID'])) {
  $user_sql = "SELECT User_Name, User_Email FROM users_tbl WHERE UserID = '".intval($_GET['UserID'])."'";
  $user_result = mysql_query($user_sql);
  if(mysql_num_rows($user_result)) {
    $user_details = mysql_fetch_assoc($user_result);
  } else {
    header('Location:users_list.php');
  }
} else {
  header('Location:users_list.php');
}
?>
<?php
  if(isset($_POST['User_Update'])) {
  extract($_POST);

    $error_message = '';
    $success_message = '';

    $data = validate_Class_Name($_POST['User_Name']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $User_Name = $data['data'];
    }

		$data = validate_Email($_POST['User_Email']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $User_Email = $data['data'];
    }

		$data = validate_Password($_POST['User_Password']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $User_Password = $data['data'];
			$password = 'ok';
    }

		if($password == 'ok') {
			$data = validate_Confirm_Password($_POST['User_Password'], $_POST['Confirm_Password']);
			if($data['status'] === FALSE ) {
				$error_message = $data['message'];
			} else {
				$Confirm_Password = $data['data'];
			}
		}


    if($error_message == '' ) {
      $user_sql = "SELECT UserID FROM users_tbl WHERE User_Email = '".$User_Email."' AND UserID != '".intval($_GET['UserID'])."' AND TrashStatus = 0";
      $user_result = mysql_query($user_sql);
      if(mysql_num_rows($user_result)) {
        $error_message = "This Email Already Exists";
      } else {
        $user_sql = "UPDATE users_tbl SET User_Name = '".$User_Name."', User_Email = '".$User_Email."', User_Password = '".$User_Password."' WHERE UserID = '".intval($_GET['UserID'])."'";
        $user_result = mysql_query($user_sql);
        if($user_result) {
          $success_message = "User Successfully Updated";
        } else {
          $error_message = "Unable to update this User";
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
					<li><a href="users_list.php">Users List</a></li>
					<li><a href="user_add.php">Add New User</a></li>
					<li class="active"><a href="user_edit.php">Edit User</a></li>
				</ul>

				  
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-edit"></i>
              <h3> Edit User</h3>
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
										    <label for="User_Name" class="control-label">User Name</label>
										    <div class="controls">
											    <input type="text" value="<?php echo ($User_Name!='' ? $User_Name : $user_details['User_Name']); ?>" id="User_Name" name="User_Name">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

											<div class="control-group">											
										    <label for="User_Email" class="control-label">User Email</label>
										    <div class="controls">
											    <input type="text" value="<?php echo ($User_Email!='' ? $User_Email : $user_details['User_Email']); ?>" id="User_Email" name="User_Email">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

											<div class="control-group">											
										    <label for="User_Password" class="control-label">User Password</label>
										    <div class="controls">
											    <input type="text" id="User_Password" name="User_Password">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

											<div class="control-group">											
										    <label for="Confirm_Password" class="control-label">Confirm Password</label>
										    <div class="controls">
											    <input type="text"  id="Confirm_Password" name="Confirm_Password">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->
									
									
										
									    <div class="form-actions">
										    <button class="btn btn-primary" type="submit" name="User_Update" id="User_Update">Update</button> 
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
