<?php 
include "head.php"
?>

<body>

<div class="container">
  <!--Navigation Bar-->
	<?php include "navigation.php"?>
	<br><br>

  <?php 
  //get row id from previous page
  if(isset($_GET['id'])){
    $competitionId = $_GET['id'];
  	//echo $competitionId;
	

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

	?>
	<!--Card-->
	<div class="container">
	<h1><?php echo $competitionTitle?></h1>

	<ul class="breadcrumb mb-0">
		<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
		<li class="breadcrumb-item"><a href="<?php echo 'competition_manage.php' ?>">Manage Competition</a></li>
		<li class="breadcrumb-item active"><?php echo $competitionTitle?></li>
	</ul>

		<?php
		//fetch result row
  		if($numResultForm > 0) {
		?>

			<!--Table-->
			<div class="table-responsive">          
				<table class="table">
				<thead>
					<tr>
					<th>ID</th>
					<th>Title</th>
					<th>Status</th>
					<th>Created On</th>
					<th id="operationHeader">Operation</th>
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
					$status = $row[3];
					$createdOn = $row[4];
//competition data
//$competitionStatus = $row[10];
										
					//Assign string to status 
					if ($status == 'AVL'){
						$status = "Available";
					}
					else if ($status == 'ONG'){						
						$status = "Ongoing";
					}
					else if ($status == 'PEN') {
						$status = "Pending";
					}

/*if ($competitionStatus = 'ONG') {
$updateStatus = "Update form SET $"
}*/
														
					//Display table data
					echo "<tr>";
					echo "<td>".$count++."</td>";
					echo "<td>$title</td>";
					echo "<td>$status</td>";
					echo "<td>$createdOn</td>";
					echo "<td>";
					echo "<a id=\"viewButton\" href=\"\" class=\"btn btn-secondary col-xl-4\">View</a> ";
					echo "<a id=\"updateButton\" href=\"\" class=\"btn btn-secondary col-xl-4\">Update</a> ";
					echo "<button id=\"deleteButton\" type=\"button\" class=\"btn btn-secondary col-xl-4\">Delete</button> ";
					echo "</td>";
					echo "</tr>";
					?>
				</tbody>
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
				</div> <!--Close Button and pagination div-->

				<?php
				} //end while loop
		?>
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
  		}	 //end else numResultForm check

	}// end numResultCompetition check
} //end isset
else{
	?>
	<div class="text-center">
		<h1 >No Data Available</h1>
		<a href="<?php echo 'competition_manage.php' ?>" class="btn btn-info mt-3">Back</a>
	</div> 
	<?php
}
  ?>	
  
  <!--Footer-->
	<?php include "footer.php"?>

</div> <!--Close whole page div-->   

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
	});
</script>

</body>
</html>