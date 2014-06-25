<?php include "header.php"; ?>
<?php
  if(isset($_POST['Question_Add'])) {
  extract($_POST);

    $error_message = '';
    $success_message = '';

    $data = validate_Number($_POST['ClassID']);
    if($data['status'] === FALSE ) {
      $error_message = 'Select any Class';
    } else {
      $ClassID = $data['data'];
    }

    $data = validate_Number($_POST['SubjectID']);
    if($data['status'] === FALSE ) {
      $error_message = 'Select any Subject';
    } else {
      $SubjectID = $data['data'];
    }

    $data = validate_Question($_POST['Question']);
    if($data['status'] === FALSE ) {
      $error_message = $data['message'];
    } else {
      $Question = $data['data'];
    }

    $data = validate_Number($_POST['Answer']);
    if($data['status'] === FALSE ) {
      $error_message = 'Please select correct answer';
    } else {
      $Answer = $data['data'];
    }

    

    if($error_message == '' ) {
      $question_sql = "SELECT QuestionID FROM questions_tbl WHERE ClassID = '".$ClassID."' AND SubjectID = '".$SubjectID."' AND Question = '".$Question."' AND TrashStatus = 0";
      $question_result = mysql_query($question_sql);
      if(mysql_num_rows($question_result)) {
        $error_message = "This question Already Exists for this class and subject";
      } else {
        $question_sql = "INSERT INTO questions_tbl(ClassID, SubjectID, Question, Answer) VALUES('".$ClassID."', '".$SubjectID."', '".$Question."', '".$Answer."')";
        $question_result = mysql_query($question_sql);
        if($question_result) {
          $QuestionID = mysql_insert_id();
          foreach($Option as $Opt) {
            $question_sql = "INSERT INTO question_options_tbl(QuestionID, Question_Option) VALUES('".$QuestionID."', '".addslashes($Opt)."')";
            mysql_query($question_sql);
            $success_message = "Question Successfully Added";
          }
        } else {
          $error_message = "Unable to add this question";
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
				    <li><a href="questions_list.php">Questions List</a></li>
				    <li class="active"><a href="question_add.php">Add New Question</a></li>
				    <li><a href="question_edit.php">Edit Question</a></li>
				  </ul>

				  
          <div class="widget widget-nopad">
            <div class="widget-header"> <i class="icon-edit"></i>
              <h3> Add New Question</h3>
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
										    <label for="firstname" class="control-label">Class</label>
										    <div class="controls">
										      <select name="ClassID" id="ClassID">
										        <option value="">--Select Class--</option>
										        <?php
										        $classes_sql = "SELECT ClassID, Class_Name FROM classes_tbl WHERE TrashStatus = 0";
                            $classes_result = mysql_query($classes_sql);

                            if(mysql_num_rows($classes_result)) {
                              $i = 1;
                              while($class_details = mysql_fetch_assoc($classes_result)) {
                                ?>
                                <option value="<?php echo $class_details['ClassID']; ?>"><?php echo $class_details['Class_Name']; ?></option>
                                <?php
                              }
                            }
                            ?>
										      </select>
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

									    <div class="control-group">											
										    <label for="firstname" class="control-label">Subject</label>
										    <div class="controls" id="Subject">
										      <select name="SubjectID" id="SubjectID">
										        <option value="">--Select Subject--</option>
										      </select>
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->									

									    <div class="control-group">											
										    <label for="firstname" class="control-label">Question</label>
										    <div class="controls">
											    <input type="text" value="" id="Question" name="Question">
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->

									    <div class="control-group">											
										    <label for="firstname" class="control-label">Options</label>
										    <div class="controls">
										    <table>
										      <tr>
										        <th> Answer </th>
										        <th> Option </th>
										        <!--<th> Action </th>-->
									        </tr>
									        <tr>
									          <td><input type="radio" name="Answer" id="Answer" value="1" ></td>
									          <td><input type="text" value="" id="Option" name="Option[]"></td>
									          <!--<td>
									            <a class="add_option">+</a>
									            <a class="remove_option">-</a>
								            </td>-->
									        </tr>
									        <tr>
									          <td><input type="radio" name="Answer" id="Answer" value="2" ></td>
									          <td><input type="text" value="" id="Option" name="Option[]"></td>
									        </tr>
									        <tr>
									          <td><input type="radio" name="Answer" id="Answer" value="3" ></td>
									          <td><input type="text" value="" id="Option" name="Option[]"></td>
									        </tr>
									        <tr>
									          <td><input type="radio" name="Answer" id="Answer" value="4" ></td>
									          <td><input type="text" value="" id="Option" name="Option[]"></td>
									        </tr>
										      
										    </table>
											    
										    </div> <!-- /controls -->				
									    </div> <!-- /control-group -->
									
									
										
									    <div class="form-actions">
										    <button class="btn btn-primary" type="submit" name="Question_Add" id="Question_Add">Add</button> 
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
<script type="text/javascript">
$(function(){
  $('#ClassID').change(function(){
    var ClassID = $(this).val();
    var myData = "ClassID=" + ClassID;
    $.ajax({
        type: "POST",
        url: "ajax/get_subject_by_class.php",
        data: myData,
        success: function(data) {
            $('#Subject').html(data);
        },
        error: function() {
            alert("AJAX call an epic failure");
        }
    });
  });

  $('.add_option').click(function(){
    var row = $(this).closest('tr').clone();
    $(this).closest('tr').parent().append(row);
  });
});
</script>
