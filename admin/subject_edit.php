<?php include "header.php"; ?>
<?php
if(isset($_GET['SubjectID'])) {
  $subject_sql = "SELECT ClassID, Subject_Name FROM subjects_tbl WHERE SubjectID = '".intval($_GET['SubjectID'])."'";
  $subject_result = mysql_query($subject_sql);
  if(mysql_num_rows($subject_result)) {
    $subject_details = mysql_fetch_assoc($subject_result);
  } else {
    header('Location:subjects_list.php');
  }
} else {
  header('Location:subjects_list.php');
}
?>
<?php
  if(isset($_POST['Subject_Update'])) {
  extract($_POST);

    $error_message = '';
    $success_message = '';

    $data = validate_Number($_POST['ClassID']);
    if($data['status'] === FALSE ) {
      $error_message = 'Select any Class';
    } else {
      $ClassID = $data['data'];
    }

    $data = validate_Class_Name($_POST['Subject_Name']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $Subject_Name = $data['data'];
    }

    if($error_message == '' ) {
      $subject_sql = "SELECT SubjectID FROM subjects_tbl WHERE ClassID = '".$ClassID."' AND Subject_Name = '".$Subject_Name."' AND SubjectID != '".intval($_GET['SubjectID'])."' AND TrashStatus = 0";
      $subject_result = mysql_query($subject_sql);
      if(mysql_num_rows($subject_result)) {
        $error_message = "This Subject Already Exists for this class";
      } else {
        $subject_sql = "UPDATE subjects_tbl SET ClassID = '".$ClassID."', Subject_Name = '".$Subject_Name."' WHERE SubjectID = '".intval($_GET['SubjectID'])."'";
        $subject_result = mysql_query($subject_sql);
        if($subject_result) {
          $success_message = "Subject Successfully Updated";
        } else {
          $error_message = "Unable to update this Subject";
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
				    <li><a href="subjects_list.php">Subjects List</a></li>
				    <li><a href="subject_add.php">Add New Subject</a></li>
				    <li class="active"><a href="subject_edit.php">Edit Subject</a></li>
				  </ul>

				  
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-edit"></i>
              <h3> Edit Subject</h3>
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
										    <label for="firstname" class="control-label">Class</label>
		  							    <div class="controls">
										      <select name="ClassID" id="ClassID">
										        <option value="">--Select Class--</option>
										        <?php
										        $classes_sql = "SELECT ClassID, Class_Name FROM classes_tbl WHERE TrashStatus = 0";
                            $classes_result = mysql_query($classes_sql);

                            $ClassID = ($ClassID!='' ? $ClassID : $subject_details['ClassID']);

                            if(mysql_num_rows($classes_result)) {
                              $i = 1;
                              while($class_details = mysql_fetch_assoc($classes_result)) {
                                ?>
                                <option value="<?php echo $class_details['ClassID']; ?>" <?php if($ClassID == $class_details['ClassID']) echo "selected"; ?>><?php echo $class_details['Class_Name']; ?></option>
                                <?php
                              }
                            }
                            ?>
										      </select>
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->									

									    <div class="control-group">											
										    <label for="firstname" class="control-label">Subject Name</label>
										    <div class="controls">
											    <input type="text" value="<?php echo ($Subject_Name!='' ? $Subject_Name : $subject_details['Subject_Name']); ?>" id="Subject_Name" name="Subject_Name">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

									    <div class="form-actions">
										    <button class="btn btn-primary" type="submit" name="Subject_Update" id="Subject_Update">Update</button> 
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
