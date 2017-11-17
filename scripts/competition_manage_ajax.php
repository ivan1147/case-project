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

    $display = "Y";
    $sql = "UPDATE competition SET display = ? ";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $display);   
    mysqli_stmt_execute($stmt);
        
    echo "Competition is displayed";
        
    exit;
}

?>