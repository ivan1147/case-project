<?php
include "database_conn.php";

//Check if all competition status is Pending or not
$sqlCompetition = "SELECT status from competition WHERE status = 'PEN'";
$resultCompetition = mysqli_query($conn,$sqlCompetition);
$competitionNumResult = mysqli_num_rows($resultCompetition);

#Display Function
if($_POST["task"] == "display_form"){
  $formId = $_POST["formId"];
  $competitionId = $_POST["competitionId"];
  $formTitle = $_POST["formTitle"];
  $formDisplay = $_POST['formDisplay'];
  $display = "Y";
  $numQue = $_POST['numQue'];

    
  if ($formDisplay == "Yes") {
  //Check if all competition status is Pending or not
    if($competitionNumResult > 0) {
      echo "Competition is Pending, at least one form must be displayed";
    } 
    else {
      $sqlRevert = "UPDATE form
                    INNER JOIN competition
                      ON form.competitionId = competition.competitionId 
                    SET form.display = 'N'
                    WHERE form.competitionId = '".$competitionId."'
                    AND form.formId = '".$formId."'";
      mysqli_query($conn,$sqlRevert);
      echo $formTitle." is not displayed anymore";     
    }    
  }
  else if($formDisplay == "No") {
    if($numQue > 0) {
      $sqlY = "UPDATE form
               INNER JOIN competition
                  ON form.competitionId = competition.competitionId 
               SET form.display = 'Y'
               WHERE form.competitionId = '".$competitionId."'
               AND form.formId = '".$formId."'";

      $sqlN = "UPDATE form
               INNER JOIN competition
                    ON form.competitionId = competition.competitionId 
               SET form.display = 'N'
               WHERE form.competitionId = '".$competitionId."'
               AND form.formId != '".$formId."'";
      mysqli_query($conn,$sqlY);
      mysqli_query($conn,$sqlN);

      echo $formTitle." is now displayed";
    }
    else {
      echo "Number of question must be more than 0 in order to display form";
    } 
  }
}

#Add Dialog & Edit Dialog
else if($_POST['task'] == 'open_dialog') {
  $competitionId = $_POST["competitionId"];
  if($_POST ['status'] == 'edit'){
    $formId = $_POST["formId"];

    $sql = "SELECT * 
            FROM form 
            WHERE formId = $formId ";
    $result = mysqli_query($conn,$sql) or die (mysqli_connect_error());
    $row = mysqli_fetch_array($result);
    
    $formId = $row["formId"];
    $formTitle = $row["title"];
    
  }
  else{
    $formId = 0;
    $formTitle = "";
  }
  ?>
  <form id="ajax_form">
    <table width="50%" border="0" class="xtab">
      <tr>
        <!-- Passing & Retrieve Id -->
        <td> 
          <input type="hidden" name="formId" id="formId" value="<?php echo $formId ?>"> 
          <input type="hidden" name="competitionId" id="competitionId" value="<?php echo $competitionId ?>"> 
        </td>
        <td>Title</td>
        <td colspan="3"> <input type="text" name="formTitle" id="formTitle" value="<?php  echo $formTitle ;?>"> </td>
      </tr>
      <!-- Blank row -->
      <tr><td><br/></td></tr>
      <tr>
        <!-- Buttons -->
        <td colspan="3" style="text-align:right">
          <?php 
          //Edit buttons
          if($_POST['status']=='edit'){
            echo '<input type="button" class="btn btn-secondary btn-sm" id="confirm_edit" name="task" value="Save"> &nbsp;';
            echo '<input type="button" class="btn btn-secondary btn-sm" id="close_edit_dialog" name="task" value="Close"> &nbsp; ';
          }
          //Add buttons
          else {
            echo '<input type="button" class="btn btn-secondary btn-sm" id="confirm_add" name="task" value="Add"> &nbsp;';
            echo '<input type="button" class="btn btn-secondary btn-sm" id="close_add_dialog" name="task" value="Close"> &nbsp; ';
          }
          ?>
        </td>
      </tr>
    </table>
  </form>

<?php
}

#Add Function
else if($_POST['task']=="add_form"){
  //Hidden field from form
  $competitionId = $_POST["competitionId"];
  //Field from form
  $formTitle = mysqli_real_escape_string($conn, $_POST["formTitle"]);

  //Retrieve form data for duplicate data comparison
  $sqlExist = "SELECT title FROM form WHERE title = '".$formTitle."' AND competitionId = ".$competitionId ;
  $resultExist = mysqli_query($conn,$sqlExist);
  $existNumRows = mysqli_num_rows($resultExist);

  if ($existNumRows > 0) {
    echo "Form Existed, please change title input";
  } 
  //Insert Data
  else {
    $sql = "INSERT INTO form(title, display, competitionId)
            VALUES('$formTitle', 'N', $competitionId) ";
    mysqli_query($conn,$sql);
    
    if (mysqli_affected_rows($conn) > 0) {
      echo "Form inserted";
    }
    else {
      echo "Data is not inserted";
    }
  }
}

#Edit Function
else if($_POST['task']=="update_form"){
  //Hidden field from form
  $formId = $_POST["formId"];
  $competitionId = $_POST["competitionId"];
  //Field from form
  $formTitle = mysqli_real_escape_string($conn, $_POST["formTitle"]);

  //Retrieve form data for duplicate data comparison
  $sqlExist = "SELECT title FROM form WHERE title = '".$formTitle."' AND competitionId = ".$competitionId ;
  $resultExist = mysqli_query($conn,$sqlExist);
  $existNumRows = mysqli_num_rows($resultExist);

  //Retrieve form data for current form check
  $sqlForm = "SELECT title FROM form WHERE formId = " .$formId;
  $result = mysqli_query($conn, $sqlForm) or die (mysqli_connect_error());
  if ($row = mysqli_fetch_assoc($result)){
    $currentFormTitle = $row['title']; 
  }

  if ($existNumRows > 0 && $formTitle != $currentFormTitle) {
    echo "Form Existed, please change title input";
  } 
  //Update data
  else {
    $sql = "UPDATE form 
            SET title = '".$formTitle."'
            WHERE formId = ".$formId." "; 
    mysqli_query($conn,$sql);
      
    //check for affected rows
    if (mysqli_affected_rows($conn) > 0) {
      echo "Form updated";
    }
    else {
      echo "No changes were made";
    }
  }
} 

#Delete Function
else if($_POST["task"] == "form_delete"){
  $formId = $_POST["formId"];

  //Retrieve form data for display check
  $sqlForm = "SELECT * FROM form WHERE formId = " .$formId;
  $result = mysqli_query($conn, $sqlForm) or die (mysqli_connect_error());
  $numResult = mysqli_num_rows($result);

  if($numResult > 0) {
    if ($row= mysqli_fetch_assoc($result)){
			$display = $row['display']; 
		}
    
    if ($display == 'Y') {
      echo "Form cannot be deleted due to it is displayed";
    }
    //Delete data
    else {
      $tables = array("answer","question", "form");
      foreach($tables as $table) {
        $query = "DELETE FROM $table WHERE formId='$formId'";
        mysqli_query($conn,$query);
      }
      if (mysqli_affected_rows($conn) > 0) {
        echo "Form Deleted";
      }
      else{
        echo "Form is not deleted";
      }
    }  
  }
} 
?>

       
