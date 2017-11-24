<?php
include "database_conn.php";

#Add Dialog & Edit Dialog
if($_POST['task'] == 'open_add_dialog') {
  $formId = $_POST["formId"];
?>
  <form id="ajax_add">
    <input type="hidden" name="formId" id="formId" value=" <?php echo $formId ?> "> </td>
    
    <div class="form-group">
			<label for="text">Question</label>
		  <input type="text" class="form-control" id="question" name="question" />
		</div>

    <div class="form-group">
      <label for="text">Type</label>
      <div class="radio">
        <label><input type="radio" name="type" id="typeForm" value="FORM" checked> Form</label>
      </div>
      <div class="radio">
        <label><input type="radio" name="type" id="typeMul" value="MUL"> Multiple Choice</label>
      </div>
    </div>

    <div class="form-group" id="formAnswer">
			<label for="text">Answer</label>
		  <input type="text" class="form-control" id="answerForm" name="answerForm" />
		</div>

    <div class="form-group" id="mulAnswer">
			<label for="text">Answer <p class="text-info">Key in the correct answer in the FIRST TEXTBOX</p></label> 
		  <input type="text" class="form-control" id="answerMul1C" name="answerMul1C" /> 

      <?php 
      for($count = 2 ; $count<=4; $count++) {
        echo '<input type="text" class="form-control" id="answerMul'.$count.'" name="answerMul'.$count.'" >' ;
      } 
      ?> 
		</div>

    <input type="button" class="btn btn-secondary btn-sm" onClick="confirm_add()" name="task" value="Add"> 
    <input type="button" class="btn btn-secondary btn-sm" onClick="close_dialog()" value="Close"> 
  </form>

  <script>
  $(document).ready(function(){   
    $( "#mulAnswer" ).hide()
    $('input:radio[name="type"]').change(function(){
      if($(this).val() == 'FORM'){
        $( "#formAnswer" ).show()
        $( "#mulAnswer" ).hide()
      }
      else{
        $( "#formAnswer" ).hide()
        $( "#mulAnswer" ).show()
      }
    });
  });
  </script>
<?php
} //End of (Add) dialog

#Add Function
else if($_POST['task']=="add_question"){
  //Retrieve fields
  $question = $_POST["question"];
  $type = $_POST["type"];
  $answerForm = $_POST["answerForm"];
  $answerMul1C = $_POST["answerMul1C"];
  $answerMul2 = $_POST["answerMul2"];
  $answerMul3 = $_POST["answerMul3"];
  $answerMul4 = $_POST["answerMul4"];
  //hidden data
  $formId = $_POST["formId"];

  if ($type == 'FORM') {
    $sql1 = "INSERT INTO question (question, type, formId)
            VALUES ('$question', '$type', $formId)";
    mysqli_query($conn,$sql1);

    if (mysqli_affected_rows($conn) > 0) {
      $quesetionId = mysqli_insert_id($conn);
      $sql2 = "INSERT INTO answer (questionId, answer, answerTrue, formId)
               VALUES ($quesetionId, '$answerForm', true, '$formId')";
      mysqli_query($conn,$sql2);

      if (mysqli_affected_rows($conn) > 0) {
        $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM question WHERE formId =".$formId.";");
        $numResult = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $numOfQue = $row['count'];
        if($numResult > 0) {
          $sql3 = "UPDATE form SET numQue =".$numOfQue." WHERE formId = ".$formId.";";
          mysqli_query($conn,$sql3);
          
          if(mysqli_affected_rows($conn) > 0){
            echo "Question & Answer inserted";
          }
          else {
            echo "error";
          }
        }
      }
      else{
        echo "Answer not inserted";
      }
    }
    else {
      echo "Data is not inserted";
    }
    mysqli_close($conn);
  }
  else {
    $sql1 = "INSERT INTO question (question, type, formId)
    VALUES ('$question', '$type', '$formId')";
    mysqli_query($conn,$sql1);

    if (mysqli_affected_rows($conn) > 0) {
      $quesetionId = mysqli_insert_id($conn);

      $sql2 = "INSERT INTO answer (questionId, answer, answerTrue, formId, answerNum)
               VALUES ($quesetionId, '$answerMul1C', true, '$formId', 1),
                      ($quesetionId, '$answerMul2', false, '$formId', 2),
                      ($quesetionId, '$answerMul3', false, '$formId', 3),
                      ($quesetionId, '$answerMul4', false, '$formId', 4);";
      mysqli_query($conn,$sql2);

      if (mysqli_affected_rows($conn) > 0) {
        $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM question WHERE formId =".$formId.";");
        $numResult = mysqli_num_rows($result);
        $row = mysqli_fetch_assoc($result);
        $numOfQue = $row['count'];
        if($numResult > 0) {
          $sql3 = "UPDATE form SET numQue =".$numOfQue." WHERE formId = ".$formId.";";
          mysqli_query($conn,$sql3);
          
          if(mysqli_affected_rows($conn) > 0){
            echo "Question & Answer inserted";
          }
          else {
            echo "error";
          }
        }
      }
      else{
        echo "Answer not inserted";
      }
    }
    else {
      echo "Data is not inserted";
    }
    mysqli_close($conn);
  }
} //End of Insert

#Edit Dialog Box
else if($_POST['task'] == 'open_edit_dialog') {
  //Passing data
  $questionId = $_POST["questionId"];
  $formId = $_POST["formId"];

  //Retrieve Question Data
  $sqlQuestion = "SELECT * FROM question WHERE questionId = $questionId ";
  $resultQuestion = mysqli_query($conn,$sqlQuestion) or die (mysqli_connect_error());
  $rowQ = mysqli_fetch_array($resultQuestion);
    $question = $rowQ["question"];  
    $type = $rowQ["type"];  

  //Retrieve Form Answer Data
  $sqlAnswer = "SELECT * FROM answer WHERE questionId = $questionId ";
  $resultAnswer = mysqli_query($conn,$sqlAnswer) or die (mysqli_connect_error());
  $rowA = mysqli_fetch_array($resultAnswer);
    $answer = $rowA["answer"];  

  //Retrieve Mul Answer Data (Correct)
  $sqlAnswerT = "SELECT * FROM answer WHERE answerTrue = true AND questionId = $questionId  ";
  $resultAnswerT = mysqli_query($conn,$sqlAnswerT) or die (mysqli_connect_error());
  $rowT = mysqli_fetch_array($resultAnswerT);
    $answerT = $rowT["answer"]; 

  //Retrieve Mul Answer Data (False)
  $sqlAnswerF = "SELECT answer FROM answer  WHERE answerTrue = false AND questionId = $questionId  ";
  $resultAnswerF = mysqli_query($conn,$sqlAnswerF) or die (mysqli_connect_error());

  ?>
  <form id="ajax_edit">
    <input type="hidden" name="questionId" id="questionId" value="<?php echo $questionId ?>"> </td>
    <input type="hidden" name="formId" id="formId" value="<?php echo $formId ?>"> </td>
    <input type="hidden" name="type" id="type" value="<?php echo $type ?>"> </td>
    
    <div class="form-group">
			<label for="text">Question</label>
		  <input type="text" class="form-control" id="question" name="question" value="<?php echo $question ?>" />
		</div>

<?php if($type == "FORM") {?>
    <div class="form-group" id="formAnswer">
			<label for="text">Answer</label>
		  <input type="text" class="form-control" id="answerForm" name="answerForm" value="<?php if($type == "FORM") {echo $answer;} ?>">
		</div>
<?php }?>

<?php if($type == "MUL"){ ?>
    <div class="form-group" id="mulAnswer">
			<label for="text">Answer <p class="text-info">Key in the correct answer in the FIRST TEXTBOX</p></label> 
      <input type="text" class="form-control" id="answerMul1C" name="answerMul1C" value="<?php if($type == "MUL") {echo $answerT;} ?>">
      <?php
      if(mysqli_num_rows($resultAnswerF) > 0 ){
        $count = '2';
        while ($rowF = mysqli_fetch_array($resultAnswerF)) {
          $answerF = $rowF['answer'];
          echo '<input type="text" class="form-control" id="answerMul'.$count.'"" name="answerMul'.$count.'"" value="'.$answerF.'">' ;
          $count++;
        } 
      } ?>
    </div>
  <?php }?>

    <input type="button" class="btn btn-secondary btn-sm" onclick="confirm_update('<?php echo $questionId ?>')" value="Save"> 
    <input type="button" class="btn btn-secondary btn-sm" onClick="close_dialog()" value="Close"> 
  </form>

  <script>
  $(document).ready(function(){  
    if ($('input:radio[name=type]:checked').val() == "FORM") {
      $( "#formAnswer" ).show()
      $( "#mulAnswer" ).hide()
    }
    else if ($('input:radio[name=type]:checked').val() == "MUL") {
      $( "#formAnswer" ).hide()
      $( "#mulAnswer" ).show()
    }
  });
  </script>
<?php
} //End of (Edit) dialog

#Edit Function
else if($_POST['task']=="update_question"){
  //Retrieve fields
  $question = $_POST["question"];
  //hidden data
  $questionId = $_POST["questionId"];
  $formId = $_POST["formId"];
  $type = $_POST["type"];

  if($type == 'FORM') {
    $answerForm = $_POST["answerForm"];
    $sql = "UPDATE question t1 
            JOIN answer t2 ON (t1.questionId = t2.questionId) 
            SET t1.question = '$question', 
                t2.answer = '$answerForm'
            WHERE t1.questionId = '$questionId'";
    mysqli_query($conn,$sql);

    if (mysqli_affected_rows($conn) > 0) {
      echo "Question & Answer Updated";
    }
    else {
      echo "Data is not unchanged";
    }
    mysqli_close($conn);
  }
  else if($type == 'MUL') {
    $answerMul1C = $_POST["answerMul1C"];
    $answerMul2 = $_POST["answerMul2"];
    $answerMul3 = $_POST["answerMul3"];
    $answerMul4 = $_POST["answerMul4"];
    $sql = "UPDATE question t1
            JOIN answer t2 ON (t1.questionId = t2.questionId)
            SET t1.question = '$question',
                t2.answer = CASE t2.answerNum 
                  WHEN 1 THEN '$answerMul1C'
                  WHEN 2 THEN '$answerMul2'
                  WHEN 3 THEN '$answerMul3'
                  WHEN 4 THEN '$answerMul4'
              END
            WHERE t2.answerNum IN (1,2,3,4)
            AND t1.questionId = '$questionId'";
    mysqli_query($conn,$sql);
    if (mysqli_affected_rows($conn) > 0) {
      echo "Question & Answer Updated";
    }
    else {
      echo "Data is not unchanged";
    }
    mysqli_close($conn);
  }
} 

#Delete Function
else if($_POST["task"] == "question_delete"){
  $questionId = $_POST["questionId"];
  $formId = $_POST["formId"];

  $tables = array("answer","question");
  foreach($tables as $table) {
    $query = "DELETE FROM $table WHERE questionId='$questionId'";
    mysqli_query($conn,$query);
  }
  if (mysqli_affected_rows($conn) > 0) {
    $result = mysqli_query($conn, "SELECT COUNT(*) AS `count` FROM question WHERE formId =".$formId.";");
    $numResult = mysqli_num_rows($result);
    $row = mysqli_fetch_assoc($result);
    $numOfQue = $row['count'];
    if($numResult > 0) {
      $sql3 = "UPDATE form SET numQue =".$numOfQue." WHERE formId = ".$formId.";";
      mysqli_query($conn,$sql3);
      
      if(mysqli_affected_rows($conn) > 0){
        echo "Question & Answer Deleted";
      }
      else {
        echo "error";
      }
    }
  }
  else{
    echo "Question is not deleted";
  }
} //End of Delete
?>

       
