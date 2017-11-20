<body>

<div class="container">

<?php 
include "head.php";
include "navigation.php";	

// if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Admin")
// {
// 	$sql = "SELECT * FROM user WHERE role!='Admin'";
	
// 	$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
// }
// else
// {
// 	echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
// 	exit();
// }

// if(isset($_GET['userId']))
// {	
// 	$userId = $_GET['userId'];
	
// 	$sql = "DELETE FROM user WHERE userId = '$userId'";
// 	$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
	
// 	if (mysqli_affected_rows($conn)> 0)
// 	{
// 		$_SESSION['adminProfile'] = "profile6";
// 	}
// 	else
// 	{
// 		$_SESSION['adminProfile'] = "profile7";
// 	}
// }

// if(isset($_SESSION['adminProfile']))
// {
// 	echo "<script type='text/javascript'>
// 			$(document).ready(function(){
// 			$('#myModal10').modal('show');
// 			});
// 		</script>";
// }

//get row id from previous page
if(isset($_GET['id'])){
	$competitionId = $_GET['id'];	

	//Create sql statement
	$queryCompetition = "SELECT * FROM competition WHERE competitionId = $competitionId";
	$queryForm = "SELECT * FROM form INNER JOIN competition ON form.competitionId = competition.competitionId WHERE form.competitionId = $competitionId";
	//execute query
	$queryResultCompetition = mysqli_query($conn, $queryCompetition) or die (mysqli_connect_error());
	$queryResultForm = mysqli_query($conn, $queryForm) or die (mysqli_connect_error());
	//check result rows
	$numResultCompetition = mysqli_num_rows($queryResultCompetition);
	$numResultForm = mysqli_num_rows($queryResultForm);
	
	if ($numResultCompetition > 0 ) {
		if ($row= mysqli_fetch_assoc($queryResultCompetition)){
			$competitionTitle = $row['title']; 
		}

		//Assigning title string
		if ($competitionTitle == "10to13" ){
			$competitionTitle = "Age 10 - 13";
		}
		else if($competitionTitle == "14to16"){
			$competitionTitle = "Age 14 - 16";
		}
		else if($competitionTitle == "17to18"){
			$competitionTitle = "Age 17 - 18";
		}
	?>

	<!--Card-->
	<div class="container mt-5">
		<h1><?php echo $competitionTitle?></h1>

		<ul class="breadcrumb mb-0">
			<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			<li class="breadcrumb-item"><a href="<?php echo 'admin_competition_manage.php' ?>">Manage Competition</a></li>
			<li class="breadcrumb-item active"><?php echo $competitionTitle?></li>
		</ul>

		<?php
		//fetch result row
		if($numResultForm > 0) {
			?>
			<!--Table-->
			<div class="table-responsive">          
			<table class="table" id="formTbl">
				<thead>
					<tr>
						<th class="text-center">ID</th>
						<th class="text-center">Title</th>
						<th class="text-center">Display</th>
						<th class="text-center">Number of Questions</th>
						<th class="text-center">Created On</th>
						<th class="text-center" colspan="2" id="operationHeader">Operation</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				//declaring count for index 
				$count = 1;
				while($row = mysqli_fetch_array($queryResultForm)){
					//form data
					$formId = $row[0];
					$title = $row[1];
					$competitionId = $row[2];
					$display = $row[3];
					$createdOn = $row[4];

					//competition data
					$status = $row[10];
											
					//Assign string to status 
					if ($display == 'Y'){
						$display = "Yes";
					}
					else if ($display == 'N'){						
						$display = "No";
					}
															
					//Display table data
					echo "<tr>";
					echo "<td class=\"text-center\">".$count++."</td>";
					echo "<td class=\"text-center\">$title</td>";
					echo "<td class=\"text-center\">$display</td>";
					echo "<td class=\"text-center\">1</td>";
					echo "<td class=\"text-center\">$createdOn</td>";
					echo "<td class=\"text-center\">";
						echo "<a id=\"viewButton\" href=\"\" class=\"btn btn-secondary col-xl-3\">View</a> ";
						echo "<a id=\"updateButton\" href=\"\" class=\"btn btn-secondary col-xl-3\">Update</a> ";
						echo "<a id=\"updateButton\" href=\"\" class=\"btn btn-secondary col-xl-3\">Delete</a> ";
						echo '<button class="btn btn-secondary col-xl-3" onClick = "display_form('.$formId.','.$competitionId.',\''.$title.'\',\''.$display.'\')" id="displayBtn">Display </button>';
					//onClick = "display_form('.$formId.','.$competitionId.',\''.$title.'\',\''.$display.'\')"
					echo "</td>";
					echo "</tr>";
					?>
				</tbody>
				<?php
				} //end while loop
				?>
			</table>
			</div> <!--Close table div-->
									
			<!--Button and pagination-->
			<div class="row">
				<a id="createItem" href="<?php echo 'discussion_create.php' ?>" class="btn btn-info mt-3">Create Form</a>
				<ul class="pagination col-sm-4 mt-3 mx-auto">
					<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
					<li class="page-item"><a class="page-link" href="#">1</a></li>
					<li class="page-item active"><a class="page-link" href="#">2</a></li>
					<li class="page-item"><a class="page-link" href="#">3</a></li>
					<li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			</div> 

	</div> <!--Close Card div--> 
		<?php
		} //end if numResultForm check 	
		else {
			?>
			<!--Button-->
			<div class="row">		
				<a id="createItem" href="<?php echo 'discussion_create.php' ?>" class="btn btn-info mt-3">Create Form</a>
			</div> 
		<?php
		}	 //end else 

	} //end numResultCompetition check
} //end isset
else{ ?>	
	<div class="text-center">
		<h1 >No Data Available</h1>
		<a href="<?php echo 'admin_competition_manage.php' ?>" class="btn btn-info mt-3">Back</a>
	</div> 
<?php } ?>

	
  
<!--Footer-->
<?php include "footer.php"?>

</div> <!--Close whole page div-->   

<script>
$(document).ready(function(){
	var myvar = <?php echo json_encode($status); ?>;
	if (myvar == "ONG") {
		//$('#displayBtn').prop('disabled', true);
		var button = jQuery("#formTbl button");
		$(button).prop('disabled', true);
	}
});

//display form ajax
function display_form(formId, competitionId, $title, $display, $status){
	$.ajax({
		url: "admin_competition_form_manage_ajax.php",
		type: "POST",
		data: {
			"task":"display_form",
			"formId":formId,
			"competitionId": competitionId,
			"formTitle": $title,
			"formDisplay": $display
		},
		success: function (response) {
			alert (response);    
			location.reload();       
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.log(textStatus, errorThrown);
		}
	});
}	
</script>

</body>
</html>