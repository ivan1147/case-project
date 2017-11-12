
<body>

<div class="container">
	
	<!--Navigation Bar-->
	<?php 
	
		include "head.php";
		include "navigation.php";	
		
		$userId = $_GET['userId'];
		
		$sql = "SELECT * FROM user WHERE userId = '$userId'";
		
		$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		
		if(isset($_POST['changePasswordSub']))
		{
			$oldpassword = $_POST['oldPassword'];
			$newpassword = $_POST['newPassword'];
			$repeatPassword = $_POST['repeatPassword'];
			
			$errorArr = array();
			
			$sqlTest = "SELECT passwordHash FROM user WHERE userId = '$userId'";
				
			$sqlTest = mysqli_query($conn,$sqlTest) or die(mysqli_error($conn)); 
			
			while($row = mysqli_fetch_assoc($sqlTest))
			{
				$passwordHash = $row['passwordHash'];
			}
			
			if (password_verify($oldpassword, $passwordHash)) 
			{
			
				$option = [
					"cost" => 12,
				];
				
				$newpassword = password_hash($newpassword , PASSWORD_DEFAULT, $option);
				
				$sqlTest = "UPDATE user SET passwordHash = '$newpassword' WHERE userId = '$userId'";
				
				$sqlTest = mysqli_query($conn,$sqlTest) or die(mysqli_error($conn)); 
				
				if(mysqli_affected_rows($conn) > 0)
				{
					$ipAddress = $_SERVER['REMOTE_ADDR'];
					$name = "Change Password In User Profile";
					$link = "user_profile";
					$sql = "INSERT INTO activity(ipAddress, name, userId, link) VALUES('$ipAddress', '$name', '$userId', '$link')";
					$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
				
					$_SESSION['adminChangePassword'] = "passwordErr1";
					
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal13').modal('show');
						});
					</script>";
				}	
				else
				{
					$_SESSION['adminChangePassword'] = "passwordErr2";
					
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal13').modal('show');
						});
					</script>";
				}
			}
			
			mysqli_stmt_close($stmt); 
		}
		
		
		if(isset($_POST['changeImageSub']))
		{	
			
			$imagetmp = file_get_contents($_FILES['image']['tmp_name']);
			$imagename = $_FILES['image']['name']; 
			
			$sqlTest = "UPDATE user SET imageName=?, imageContent=? WHERE userId='$userId'";
			$stmt = mysqli_prepare($conn, $sqlTest) or die("Error : ". mysqli_error($conn));	
			
			
			mysqli_stmt_bind_param($stmt, "ss", $imagename, $imagetmp);   
			
			if(mysqli_stmt_execute($stmt))
			{
				mysqli_stmt_store_result($stmt);
			
				if (mysqli_affected_rows($conn)> 0)
				{
					$ipAddress = $_SERVER['REMOTE_ADDR'];
					$name = "Change Image In User Profile";
					$link = "user_profile";
					$sql = "INSERT INTO activity(ipAddress, name, userId, link) VALUES('$ipAddress', '$name', '$userId', '$link')";
					$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
				
					$_SESSION['adminMemberImage'] = "imageErr1";
					
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal15').modal('show');
						});
					</script>";
				}
				else
				{
					$_SESSION['adminMemberImage'] = "imageErr2";
					
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal15').modal('show');
						});
					</script>";
				}
			}
			else
			{
				$_SESSION['adminMemberImage'] = "imageErr3";
					
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal15').modal('show');
						});
					</script>";
			}
		
			
			mysqli_stmt_close($stmt); 
		}
	
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
											<td>Full Name</td>
											<td>$fullName</td>
											</tr>
										</tbody>
										<tbody>
											<tr>
											<td>Birth Date</td>
											<td>$birthDate</td>
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
						
						
						<button class="btn btn-secondary mb-4" data-toggle="modal" data-target="#myModal14">Change Image</button>
						<button class="btn btn-secondary mb-4" data-toggle="modal" data-target="#myModal12">Change Password</button>
						<button class="btn btn-secondary mb-4" data-toggle="modal" data-target="#myModal15">Ban User</button>
						<?php echo"<a href='user_report.php?userId=$userId' class='btn btn-secondary mb-4' style='color:#ffffff' >View Report</a>"; ?>
					  </div>
						
				  </div>
				</div>
			</div>
		</div>
		
		
	
	</div>

	<div class="modal fade" id="myModal12">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class='modal-title'>Change Password</h4>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body">
					<form class="form-row"  method="post" name="memberPassword">
						<input type="password" class="form-control mt-2" id="email" placeholder="Old Password" name="oldPassword">
						<input type="password" class="form-control mt-4" id="email" placeholder="New Password" name="newPassword">
						<input type="password" class="form-control mt-4" id="email" placeholder="Retype New Password" name="repeatPassword">
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type='submit' class='btn btn-secondary btn-confirm' name='changePasswordSub'>Submit</a>
					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	
	
	<div class="modal fade" id="myModal14">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class='modal-title'>Change Image</h4>
				</div>
				
				<!-- Modal body -->
				<div class="modal-body">
					<form class="form-row"  method="post" name="memberImage" enctype="multipart/form-data">
						<input type="file" name="image" id="email">
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type='submit' class='btn btn-secondary btn-confirm' name='changeImageSub'>Submit</a>
					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="myModal13">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<?php
						if($_SESSION['adminChangePassword'] = "passwordErr1")
						{
							echo "<h4 class='modal-title'>Password Changed Sucessfully</h4>";
							$_SESSION['adminChangePassword'] = null;
						}
						elseif ($_SESSION['adminChangePassword'] = "passwordErr2")
						{
							echo "<h4 class='modal-title'>Password Remain Unchanged</h4>";
							$_SESSION['adminChangePassword'] = null;
						}
					?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
				  <button class="btn btn-secondary" data-dismiss="modal" onclick="document.location.href='user_manage.php'">OK</button>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="myModal15">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<?php
						
						if ($_SESSION['adminMemberImage'] = "imageErr1")
						{
							echo "<h4 class='modal-title'>Image Changed Sucessfully</h4>";
							$_SESSION['adminMemberImage'] = null;
						}
						elseif ($_SESSION['adminMemberImage'] = "imageErr2")
						{
							echo "<h4 class='modal-title'>Image Remain Unchanged</h4>";
							$_SESSION['adminMemberImage'] = null;
						}
						elseif ($_SESSION['adminMemberImage'] = "imageErr3")
						{
							echo "<h4 class='modal-title'>Image Update Failed</h4>";
							$_SESSION['adminMemberImage'] = null;
						}
					?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
				  <button class="btn btn-secondary" data-dismiss="modal" onclick="document.location.href='user_manage.php'">OK</button>
				  
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