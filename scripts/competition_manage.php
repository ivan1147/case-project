<?php 
include "head.php"
?>
	
	<body>
  
	<div class="container">
		
		<!--Navigation Bar-->
		<?php include "navigation.php"?>
		
		<br><br>
		
		<!--Card-->
		<div class="container">
			<?php 
				//Create sql statement
				$query = "SELECT * FROM competition";
				//execute query
				$queryResult = mysqli_query($conn, $query) or die (mysqli_connect_error());
				//check result rows
				$numResult = mysqli_num_rows($queryResult);

			?>

			<h1> Manage Competition</h1>
			
			<ul class="breadcrumb mb-0">
			  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			  <li class="breadcrumb-item active">Manage Competition</li>
			</ul>
			
			
			<div class="container">
				<div class="table-responsive">          
					<table class="table">
						<thead>
						  <tr>
						  	<th>No</th>
							<th>Title</th>
							<th>Start Date</th>
							<th>End Date</th>
							<th>Status</th>
							<th>Display</th>
							<th>Created On</th>
							<th id="operationHeader">Operation</th>
						  </tr>
						</thead>
						<tbody>
						<?php 
						//fetch result row
						if($numResult > 0) {
							//declaring count for index 
							$count = 1;
							while($row = mysqli_fetch_assoc($queryResult)){
								$competitionId = $row["competitionId"];
								$title = $row["title"];
								$startDate = $row["startDate"];
								$endDate = $row["endDate"];
								$status = $row["status"];	
								$display = $row["display"];				
								$createdOn = $row["createdOn"];				

								//Assign string to display 
								if ($display == "Y"){
									$display = "Yes";
								}
								else if ($display == 'N'){
									$display = "No";
								}

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

								//Display table data
								echo "<tr>";
								echo "<td>".$count++."</td>";
								echo "<td>$title</td>";
								echo "<td>$startDate</td>";
								echo "<td>$endDate</td>";
								echo "<td>$status</td>";
								echo "<td>$display</td>";
								echo "<td>$createdOn</td>";
								echo "<td>";
									echo "<a id=\"viewButton\" href=\"competition_form_manage.php?id=$competitionId\" class=\"btn btn-secondary col-xl-4 text-center\">View</a> ";
									echo "<a id=\"updateButton\" href=\"\" class=\"btn btn-secondary col-xl-4\">Update</a> ";
									echo "<button id=\"deleteButton\" type=\"button\" class=\"btn btn-secondary col-xl-4\">Delete</button> ";
								echo "</td>";
								echo "</tr>";

							}
						 } 
						 ?>
					 </tbody>
					</table>
				</div>
			
				
				<div class="row">		
					<a id="createItem" href="<?php echo 'discussion_create.php' ?>" class="btn btn-info mt-3">Create Competition</a>
					<ul class="pagination col-sm-4 mt-3 mx-auto">
						<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item active"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>
				</div>
			
			</div>
			
			
			
			
		
		</div>
		
		
		<!--Footer-->
		<?php include "footer.php"?>
		
	  
	</div>

	<script>
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
	
  </body>
  
  
</html>