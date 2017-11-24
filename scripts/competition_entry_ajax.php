<?php 
include "database_conn.php";

#User Dialog
if($_POST['task'] == 'open_user_dialog') {
    $userId = $_POST['userId'];
    $competitionEndDate = $_POST['competitionEndDate'];
    $age = $_POST['age'];

    $sql = "SELECT *
            FROM user 
            WHERE userId = '$userId'";
    $result  = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    
    $fullName = $row['fullName']; 
    $birthDate = $row['birthDate']; 
    $emailAddress = $row['emailAddress'];     
?>  
    <p><strong>Winners will be announced on: <?php echo date('Y-m-d', strtotime($competitionEndDate. ' + 2 days')); ?></strong></p>
    <form id="ajax_user">
    <table>
        <tr>
            <td> 
                <input type="hidden" name="userId" id="userId" value=" <?php echo $userId ?> "> 
                <input type="hidden" name="competitionEndDate" id="competitionEndDate" value=" <?php echo $competitionEndDate ?> "> 
                <input type="hidden" name="age" id="age" value=" <?php echo $age ?> "> 
            </td>
        </tr>
        <tr>
            <td>Name: </td>
            <td><?php echo $fullName; ?></td>
        </tr>
        <tr>
            <td>Birth Date: </td>
            <td><?php echo $birthDate; ?></td>
        </tr>    
        <tr>
            <td>Email: </td>
            <td><?php echo $emailAddress; ?></td>
        </tr> 
        <!-- Blank row -->
        <tr><td><br/></td></tr>
        <td colspan="3" style="text-align:center">
            <input type ="button" class="btn btn-warning btn-sm" onClick="confirm_participate()" name="task" value="Participate" />
        </tr>
    </table>
    </form>
<?php
}

//Participate function
else if($_POST['task']=="confirm_participate"){
    $userId = $_POST["userId"];
    $age = $_POST["age"];
    
    $sql = "SELECT * FROM participant WHERE userId =".$userId.";";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) { //Update query
        if($age >= 10 && $age <= 14) {
            $sql = "UPDATE  participant 
                    SET competitionId = 1,
                        winner = 0,
                        correctAnswer = 0
                    WHERE userId = '$userId'";
            mysqli_query($conn,$sql);
            if (mysqli_affected_rows($conn) > 0) {
                echo "cat 1 update";
            }
        }
        else if ($age >= 15 && $age <= 16 ){
            $sql = "UPDATE  participant 
                    SET competitionId = 2,
                        winner = 0,
                        correctAnswer = 0
                    WHERE userId = '$userId'";
            mysqli_query($conn,$sql);
            echo "cat 2 update";
        }
        else if ($age >= 17 && $age <= 18){
            $sql = "UPDATE  participant 
                    SET competitionId = 3,
                        winner = 0,
                        correctAnswer = 0
                    WHERE userId = '$userId'";
            mysqli_query($conn,$sql);
            echo "cat 3 update";
        }
        else {
            echo "Sorry, you are not eligible to participate in this competition.";
            header("Location: competition_entry.php");
        }

    } else { //Insert query
        if($age >= 10 && $age <= 14) {
            $sql = "INSERT INTO participant (competitionId, userId, winner, correctAnswer)
                    VALUES(1, '$userId', 0, 0) ";
            mysqli_query($conn,$sql);
            echo "cat 1 insert";
        }
        else if ($age >= 15 && $age <= 16 ){
            $sql = "INSERT INTO participant (competitionId, userId, winner, correctAnswer)
                    VALUES(2, '$userId', 0, 0) ";
            mysqli_query($conn,$sql);
            echo "cat 2 insert";
        }
        else if ($age >= 17 && $age <= 18){
            $sql = "INSERT INTO participant (competitionId, userId, winner, correctAnswer)
                    VALUES(3, '$userId', 0, 0) ";
            mysqli_query($conn,$sql);
            echo "cat 3 insert";
        }
        else {
            echo "Sorry, you are not eligible to participate in this competition.";
            header("Location: competition_entry.php");
        }
    }
}

else if($_POST['task']=="cancel_entry"){
    $userId = $_POST["userId"];

    $sql = "SELECT * FROM participant WHERE userId =".$userId.";";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
        $participantId = $row['participantId'];

    if (mysqli_num_rows($result) > 0) { //Update query    
        $sql = "UPDATE  participant 
                SET competitionId = null,
                    winner = 0,
                    correctAnswer = 0
                WHERE userId = '$userId'";
        mysqli_query($conn,$sql);

        if (mysqli_affected_rows($conn) > 0) {
            echo "Entry is canceled";
        }else {
            echo "error";
        }
    }
}

?>