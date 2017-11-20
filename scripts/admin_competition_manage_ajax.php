<?php
if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'display':
            display();
            break;
    }
}

function display() {
    include "database_conn.php";

    //Check if all three competition have form displayed
    $sqlForm = "SELECT display from form WHERE display = 'Y'";
    $resultForm = mysqli_query($conn,$sqlForm);
    $formNumResult = mysqli_num_rows($resultForm);
    
    if ($formNumResult == 3) {
        $display = "Y";
        $sql = "UPDATE competition SET display = ? ";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $display);   
        mysqli_stmt_execute($stmt);
            
        echo "Competition is displayed";
    }
    else {
        echo "Please make sure all three competition each have a form displayed";
    }
        
    exit;
}

if($_POST["task"] == "changeDate"){
    include "database_conn.php";
    //passing form inputs
    $startDate = $_POST['from_value'];
    $endDate = $_POST['to_value'];
    $status = " ";
    //getting current date and change date format
    date_default_timezone_set("Asia/Singapore");
    $currentDate = date('Y-m-d');
    //For validations
    $errorList = array();
    $error = false;

    //Date Validation
    if(($currentDate == $startDate) || ($currentDate == $endDate)) {
        $errorList[] = "Start Date and End Date cannot be current date";
        $error = true;
    }
    if($startDate == $endDate){
        $errorList[] = "Start Date and End Date cannot be on the same day";
        $error = true;
    }

    //Error check
    if (!empty($errorList)) {
        foreach ($errorList as $error) {
            $arrlength = count($error);
            echo $error;
            echo "\n";
        }
        return false;
    }
    else {
        $sql = "UPDATE competition 
                SET display = 'N', startDate = '".$startDate."', endDate = '".$endDate."' ";
        mysqli_query($conn,$sql);
        echo "Date Updated";
    }           
}

?>