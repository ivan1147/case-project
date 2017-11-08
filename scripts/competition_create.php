<?php include "head.php";?>

<body> 
<div class="container"> 
    <!--Navigation Bar-->
    <?php include "navigation.php"; 
    
    //Insert Function
    if (isset($_POST['adminCompetitionSub'])){

        $title = $_POST['title'];
        $startDate = $_POST['from_value'];
        $endDate = $_POST['to_value'];
    //$status = $_POST['status'];
        $display = $_POST['display'];	

        //validation
        //if display = yes then status = ongoing / pending depending on date
        //if startdate/ enddate earlier than current date, display error 

        //insert query
        $sqlInsert = "INSERT INTO competition(title, startDate, endDate, display) VALUES(?,?,?,?)";
        $stmt = mysqli_prepare($conn, $sqlInsert);
        mysqli_stmt_bind_param($stmt, "ssss", $title, $startDate, $endDate, $display);   
    
        if($stmt->execute())
        {
            echo  "Registration Successful";
            //header('Location: competition_manage.php');
        }
        else
        {
            echo "Registration Failed";
            die("failed");
        }
        mysqli_stmt_close($stmt);
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
            <form class="form-group" method="post" name="addCompetition" enctype="multipart/form-data">  
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

                <button id="createItem" type="submit" class="btn btn-info mt-3" name="adminCompetitionSub">Submit</button>
            </form>
        </div>

    </div>

    <!--Footer-->
	<?php include "footer.php"?>

</div>

<script src="js/jquery.js"></script>

</body>
</html>