<?php include "header.php"; ?>
<?php
  if(isset($_POST['Class_Add'])) {
  extract($_POST);

    $error_message = '';
    $success_message = '';

    $data = validate_Class_Name($_POST['Class_Name']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $Class_Name = $data['data'];
    }

    if($error_message == '' ) {
      $class_sql = "SELECT ClassID FROM classes_tbl WHERE Class_Name = '".$Class_Name."' AND TrashStatus = 0";
      $class_result = mysql_query($class_sql);
      if(mysql_num_rows($class_result)) {
        $error_message = "This Class Already Exists";
      } else {
        $class_sql = "INSERT INTO classes_tbl(Class_Name) VALUES('".$Class_Name."')";
        $class_result = mysql_query($class_sql);
        if($class_result) {
          $success_message = "Class Successfully Added";
        } else {
          $error_message = "Unable to add this Class";
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
				    <li><a href="classes_list.php">Classes List</a></li>
				    <li class="active"><a href="class_add.php">Add New Class</a></li>
				    <li><a href="class_edit.php">Edit Class</a></li>
				  </ul>

				  
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-edit"></i>
              <h3> Add New Class</h3>
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
										    <label for="firstname" class="control-label">Class Name</label>
										    <div class="controls">
											    <input type="text" value="<?php echo $Class_Name; ?>" id="Class_Name" name="Class_Name">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->
									
									
										
									    <div class="form-actions">
										    <button class="btn btn-primary" type="submit" name="Class_Add" id="Class_Add">Add</button> 
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
