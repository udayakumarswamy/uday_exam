<?php include "header.php"; ?>
<?php
  if(isset($_POST['Test_Add'])) {
  extract($_POST);

    $error_message = '';
    $success_message = '';

    $data = validate_Number($_POST['YearID']);
    if($data['status'] === FALSE ) {
      $error_message = 'Select any Class';
    } else {
      $YearID = $data['data'];
    }

    $data = validate_Class_Name($_POST['Test_Name']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $Test_Name = $data['data'];
    }

		$data = validate_Number($_POST['Test_Questions']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $Test_Questions = $data['data'];
    }

    if($error_message == '' ) {
      $test_sql = "SELECT TestID FROM tests_tbl WHERE YearID = '".$YearID."' AND Test_Name = '".$Test_Name."' AND TrashStatus = 0";
      $test_result = mysql_query($test_sql);
      if(mysql_num_rows($test_result)) {
        $error_message = "This Test Already Exists with this Year and Name";
      } else {
        $test_sql = "INSERT INTO tests_tbl(YearID, Test_Name, Test_Description, Test_Questions) VALUES('".$YearID."', '".$Test_Name."',  '".addslashes($Test_Description)."', '".$Test_Questions."')";
        $test_result = mysql_query($test_sql);
        if($test_result) {
          $success_message = "Test Successfully Added";
        } else {
          $error_message = "Unable to add this Test";
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
				    <li><a href="tests_list.php">Mock Tests List</a></li>
				    <li class="active"><a href="test_add.php">Add New Mock Test</a></li>
				    <li><a href="test_edit.php">Edit Mock Test</a></li>
				  </ul>

				  
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-edit"></i>
              <h3> Add New Mock Test</h3>
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
										    <label for="firstname" class="control-label">Year</label>

										    <div class="controls">
										      <select name="YearID" id="YearID">
										        <option value="">--Select Year--</option>
										        <?php
										        $years_sql = "SELECT YearID, YearName FROM years_tbl WHERE Year_Status = 1 AND TrashStatus = 0";
                            $years_result = mysql_query($years_sql);

                            if(mysql_num_rows($years_result)) {
                              $i = 1;
                              while($year_details = mysql_fetch_assoc($years_result)) {
                                ?>
                                <option value="<?php echo $year_details['YearID']; ?>" <?php if($YearID == $year_details['YearID']) echo "selected"; ?>><?php echo $year_details['YearName']; ?></option>
                                <?php
                              }
                            }
                            ?>
										      </select>
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->									

									    <div class="control-group">											
										    <label for="firstname" class="control-label">Test Name</label>
										    <div class="controls">
											    <input type="text" value="<?php echo $Test_Name; ?>" id="Test_Name" name="Test_Name">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

											<div class="control-group">											
										    <label for="firstname" class="control-label">Test Description</label>
										    <div class="controls">
											    <textarea id="Test_Description" name="Test_Description"><?php echo $Test_Description; ?></textarea>
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

											<div class="control-group">											
										    <label for="firstname" class="control-label">Test Questions</label>
										    <div class="controls">
											    <input type="text" value="<?php echo $Test_Questions; ?>" id="Test_Questions" name="Test_Questions">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->
									
									
										
									    <div class="form-actions">
										    <button class="btn btn-primary" type="submit" name="Test_Add" id="Test_Add">Add</button> 
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
