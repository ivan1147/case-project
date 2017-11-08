
<body>

<div class="container">
	
	<!--Navigation Bar-->
	<?php 
	
		include "head.php";
		include "navigation.php";	
		
		$userId = $_GET['userId'];
		
		$sql = "SELECT * FROM user WHERE userId = $userId";
		
		$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
	
	?>
	
	
	<!--Card-->
	<div class="container mt-5">
	
		<h1>User Profile</h1>
		
		<ul class="breadcrumb">
		  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo 'user_manage.php' ?>">User Management</a></li>
		  <li class="breadcrumb-item active">User Profile</li>
		</ul>
		
		
		<div class="container">
		<div class="row">

			<div class="card">
				<div class="row">
				  <div style="width:900px" class="col-xl-4">
					<div class="card-block text-center">
						<?php
							while ($row = mysqli_fetch_assoc($sql)){
								$imageName = $row["imageName"];
								$imageContent = $row["imageContent"];
								echo $imageName;
								echo '<img style="height: 330px" id="imageCard2" src="data:image/png;base64,'.base64_encode( $imageContent ).' " alt="Card image cap"/>';
							}
						?>
						<h4 class="card-title mt-3">
							<?php
								mysqli_data_seek($sql, 0);
								while ($row = mysqli_fetch_assoc($sql)){
									$fullName = $row["fullName"];
									echo $fullName;
								}
							?>
						</h4>
						<p class="card-title">
							<?php
								mysqli_data_seek($sql, 0);
								while ($row = mysqli_fetch_assoc($sql)){
									$role = $row["role"];
									echo "Role : ".$role;
								}
							?>
						</p>
					</div>
				  </div>
				  <div class="col-xl-8 pt-3">
					  <div class="card-block">
						<h3 class="card-title">User Details</h3>
						<div class="table-responsive">          
							<table class="table">
								<thead>
								<?php
									mysqli_data_seek($sql, 0);
									while ($row = mysqli_fetch_assoc($sql)){
										$username = $row["username"];
										$passwordHash = $row["passwordHash"];
										$fullName = $row["fullName"];
										$birthDate = $row["birthDate"];
										$emailAddress = $row["emailAddress"];
										$status = $row["status"];
										$role = $row["role"];
										$createdOn = $row["createdOn"];
										
										echo"<tbody>
											<tr>
											<td>Username</td>
											<td>$username </td>
											</tr>
										</tbody>
										<tbody>
											<tr>
											<td>Password</td>
											<td>$passwordHash</td>
											</tr>
										</tbody>
										<tbody>
											<tr>
											<td>Full Name</td>
											<td>$fullName</td>
											</tr>
										</tbody>
										<tbody>
											<tr>
											<td>Birth Date</td>
											<td>birthDate</td>
											</tr>
										</tbody>
										<tbody>
											<tr>
											<td>Email Address</td>
											<td>$emailAddress</td>
											</tr>
										</tbody>
										<tbody>
											<tr>
											<td>Status</td>
											<td>$status</td>
											</tr>
										</tbody>
										<tbody>
											<tr>
											<td>Created On</td>
											<td>$createdOn</td>
											</tr>
										</tbody>";
									}
								?>
								
							</table>
						</div>
						
					  </div>
						
				  </div>
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
</script>

</body>


</html>