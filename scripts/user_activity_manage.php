<body>

<div class="container">
	
	<!--Navigation Bar-->
	<?php 
	
		include "head.php";
		include "navigation.php";	
		
		$sql = "SELECT * FROM activity a, user u WHERE u.userId = a.userId";
		
		$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		
		if(isset($_GET['userId']))
		{	
			$userId = $_GET['userId'];
			
			$sql = "DELETE FROM user WHERE userId = '$userId'";
			$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
		}
		
	?>
	
	
	
	<!--Card-->
	<div class="container mt-5">
	
		<h1>Manage User Activity</h1>
		
		<ul class="breadcrumb">
			<li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
			<li class="breadcrumb-item active">Manage User Activity</li>

		</ul>
		
		<div class="container">
			<div class="table-responsive">          
				<table class="table" >
					<thead class="text-center">
					  <tr>
						<th>Activity ID</th>
						<th>Name</th>
						<th>User</th>
						<th>IP Address</th>
						<th>Log Time</th>
						<th id="operationHeader">Operation</th>
					  </tr>
					</thead>
					<tbody class="text-center">
						<?php
							while ($row = mysqli_fetch_assoc($sql)){
								$activityId	= $row["activityId"];
								$name	= $row["name"];
								$userId = $row["userId"];
								$userName = $row["username"];
								$ipAddress = $row["ipAddress"];
								$logTime = $row["logTime"];
								$link = $row["link"];
								
								echo"<tr>
									<td>$activityId</td>
									<td>$name</td>
									<td>$userName</td>
									<td>$ipAddress</td>
									<td>$logTime</td>
									<td>
										<a id='viewButton' href='$link.php?userId=$userId' class='btn btn-secondary col-xl-4'>View</a>
									</td>
								  </tr>";
							}
						
						?>
					 
					</tbody>
				</table>
				
			
				
			</div>
			
			<div class="container">
				<div class="row">		
					<ul class="pagination col-xl-4 mt-3 mx-auto">
						<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
						<li class="page-item"><a class="page-link" href="#">1</a></li>
						<li class="page-item active"><a class="page-link" href="#">2</a></li>
						<li class="page-item"><a class="page-link" href="#">3</a></li>
						<li class="page-item"><a class="page-link" href="#">Next</a></li>
					</ul>
				</div>
			</div>
		</div>
		
		
		
		
	</div>
	
	<div class="modal fade" id="myModal10">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<?php
						if($_SESSION['adminMemberSuccess'])
						{
							echo "<h4 class='modal-title'>Update Successful</h4>";
							$_SESSION['adminMemberSuccess'] = null;
						}
						
						if($_SESSION['adminMemberRemain'])
						{
							echo "<h4 class='modal-title'>Update No Change</h4>";
							$_SESSION['adminMemberRemain'] = null;
						}
						
						if($_SESSION['adminMemberFailed'])
						{
							echo "<h4 class='modal-title'>Update Failed</h4>";
							$_SESSION['adminMemberFailed'] = null;
						}
					?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
				  <button class="btn btn-secondary" data-dismiss="modal">OK</button>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="myModal11">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class='modal-title'>Delete this user?</h4>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					
					<a class='btn btn-secondary btn-confirm'>Submit</a>
					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
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
	
	$('#myModal11').on('show.bs.modal', function(e) {
		$(this).find('.btn-confirm').attr('href', $(e.relatedTarget).data('href'));
	});
</script>

</body>
  
  
</html>