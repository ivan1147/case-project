<body>

<div class="container">
	
	<!--Navigation Bar-->
	<?php 
	
		include "head.php";
		include "navigation.php";	
		
		if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Admin")
		{
			$sql = "SELECT * FROM activity a, user u WHERE u.userId = a.userId ORDER BY 1";
			
			$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		}
		else
		{
			echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
			exit();
		}
		
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
						<th>Status</th>
						<th id="operationHeader2">Operation</th>
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
								$status = $row["status"];
								$link = $row["link"];
								
								if($link=="")
								{
									$link2 = "<td>None</td>";
								}
								else
								{
									$link2 = "<td><a href='$link.php?userId=$userId' class='btn btn-secondary'>View</a></td>";
								}
								
								echo"<tr>
									<td>$activityId</td>
									<td>$name</td>
									<td><a href='user_profile.php?userId=$userId'>$userName</a></td>
									<td>$ipAddress</td>
									<td>$logTime</td>
									<td>$status</td>
									$link2
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