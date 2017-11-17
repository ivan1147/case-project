<?php
include "database_conn.php";

#Display Function
if($_POST["task"] == "display_form"){
    $formId = $_POST["formId"];
    $competitionId = $_POST["competitionId"];
    $formTitle = $_POST["formTitle"];
    $formDisplay = $_POST['formDisplay'];
    $display = "Y";

    if ($formDisplay == "Yes") {
        echo "This form is already displayed";
    }
    else if($formDisplay == "No") {
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
 }
 ?>
