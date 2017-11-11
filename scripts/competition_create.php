<?php include "head.php";?>

<body> 
<div class="container"> 
    <!--Navigation Bar-->
    <?php include "navigation.php"; 

    //Insert Function
    //$btnSubmit = filter_has_var(INPUT POST, 'btnSubmit') ? trim ($_POST['']);
    if (isset($_POST['btnSubmit'])){

        $title = $_POST['title'];
        $startDate = $_POST['from_value'];
        $endDate = $_POST['to_value'];
        $display = $_POST['display'];	

        //getting current date and change dateTime format
        date_default_timezone_set("Asia/Singapore");
        $currentDate = date('Y-m-d');

        //Validation 
        //validating dates
        if(($currentDate == $startDate) || ($currentDate == $endDate)) {
            echo "Start Date and End Date cannot be current date";
        }
        else if($startDate == $endDate){
            echo "Start Date and End Date cannot be on the same day";
        }
        else {
            if($display == "Y") {
                //insert query if display is "Yes"
                $sqlInsert = "INSERT INTO competition(title, startDate, endDate, display) VALUES(?,?,?,?)";
                $stmt = mysqli_prepare($conn, $sqlInsert);
                mysqli_stmt_bind_param($stmt, "ssss", $title, $startDate, $endDate, $display);   
            }
            else if($display == "N") {
                //insert query if display is "No"
                $sqlInsert = "INSERT INTO competition(title, startDate, endDate, display) VALUES(?,?,?,?)";
                $stmt = mysqli_prepare($conn, $sqlInsert);
                mysqli_stmt_bind_param($stmt, "ssss", $title, $startDate, $endDate, $display);   
            }
            //after query is executed 
            if($stmt->execute())
            {
                echo  "Registration Successful";
            }
            else
            {
                echo "Registration Failed";
                header('Location: competition_create.php');
            }
            mysqli_stmt_close($stmt);
        }
           
    }

    ?>
    <!--Card-->
	<div class="container mt-5">
        <h1>Create Competition</h1>

        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo 'competition_manage.php' ?>">Manage Competition</a></li>
            <li class="breadcrumb-item active">Create User</li>
		</ul>

        <!--Competition Form-->
        <div class = "container">
            <form class="form-group" method="post" id="addCompetitionForm" name="addCompetition" enctype="multipart/form-data">  
                <div class="form-group">
				    <label for="text">Title</label>
					<input type="text" class="form-control" id="title" name="title">
				</div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="text">Start Date</label>
                            <input type="text" id="from_value" name="from_value" readonly/>
                        </div>
                        <div class="col-sm-6">
                            <label for="text">End Date</label>
                            <input type="text" id="to_value" name="to_value" readonly/>
                        </div>
                    </div>
                    <div class="row">
                        <div id="from" class="datepicker col-sm-6"></div>
                        <div id="to" class="datepicker col-sm-6"></div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="text">Display</label>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="display" id="display" value="Y" >Yes
                        </label>
                    </div>
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="radio" name="display" id="display" value="N" checked>No
                        </label>
                    </div>
				</div>

                <button id="createItem" type="submit" class="btn btn-info mt-3" name="btnSubmit">Submit</button>
            </form>
        </div>

    </div>

    <!--Footer-->
	<?php include "footer.php"?>

</div>

<script src="js/jquery.js"></script>
<script src="js/jquery.validate.min.js"></script>

<script> 
$(document).ready(function() {
    
    //Validations 
    $("#addCompetitionForm").validate({
        rules: {
            title: {
                required: true,
                maxlength: 255
            },
            from_value: {
                required: true
            },
            to_value: {
                required: true
            }
        },
        //custom validation messages 
        messages: {
            title: {
                required: "*Title is required",
                maxlength: "*Title must not be more than 255 characters"
            },
            from_value: {
                required: "*Start Date is required",
            },
            to_value: {
                required: "*End Date is required",
            }
        },    
    });

});

</script>

</body>
</html>