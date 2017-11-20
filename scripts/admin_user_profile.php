
<body>

<div class="container">
	
	<!--Navigation Bar-->
	<?php 
	
		include "head.php";
		include "navigation.php";	
		
		if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Admin")
		{
		
			$userId = $_GET['userId'];
			
			$sql = "SELECT * FROM user WHERE userId = '$userId'";
			
			$sql = mysqli_query($conn,$sql) or die(mysqli_error($conn));
		}
		else
		{
			echo "<script type='text/javascript'>window.location.href = 'home.php';</script>";
			exit();
		}
		
		if(isset($_POST['changePasswordSub']))
		{
			$oldpassword = $_POST['oldPassword'];
			$newpassword = $_POST['newPassword'];
			$repeatPassword = $_POST['repeatPassword'];
			
			$errorArr = array();
			
			$sqlTest = "SELECT * FROM user WHERE userId = '$userId'";
				
			$sqlTest = mysqli_query($conn,$sqlTest) or die(mysqli_error($conn)); 
			
			while($row = mysqli_fetch_assoc($sqlTest))
			{
				$passwordHash = $row['passwordHash'];
			}
			
			if(password_verify($oldpassword, $passwordHash)) 
				{
					 echo 'Password is valid!';
				
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
				else
				{
					 echo 'Password is invalid!';
					$_SESSION['adminChangePassword'] = "passwordErr3";
						
						echo "<script type='text/javascript'>
							$(document).ready(function(){
							$('#myModal13').modal('show');
							});
						</script>";
				}
				
				mysqli_stmt_close($stmt); 
			
		}
		
		
		if(isset($_POST['changeImageSub']))
		{	
			
			$imagetmp = file_get_contents($_FILES['image']['tmp_name']);
			$imagename = $_FILES['image']['name']; 
			
			$target_file = basename($imagename);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			
		
			
			$sqlTest3 = "UPDATE user SET imageName=?, imageContent=? WHERE userId='$userId'";
			$stmt = mysqli_prepare($conn, $sqlTest3) or die("Error : ". mysqli_error($conn));	
			
			
			mysqli_stmt_bind_param($stmt, "ss", $imagename, $imagetmp);   
			
			if($imagetmp == "") 
			{
				
				$_SESSION['adminMemberImage'] = "imageErr4";
					
				echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal16').modal('show');
					});
				</script>";
				
			
			}
			elseif($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) 
			{

				$_SESSION['adminMemberImage'] = "imageErr5";
					
				echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal16').modal('show');
					});
				</script>";
				
			
			}
			elseif ($_FILES["image"]["size"] > 500000) {
				
				$_SESSION['adminMemberImage'] = "imageErr6";
					
				echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal16').modal('show');
					});
				</script>";
				

			}
			elseif(mysqli_stmt_execute($stmt))
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
						$('#myModal16').modal('show');
						});
					</script>";
				}
				else
				{
					$_SESSION['adminMemberImage'] = "imageErr2";
					
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal16').modal('show');
						});
					</script>";
				}
			}
			else
			{
				$_SESSION['adminMemberImage'] = "imageErr3";
					
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal16').modal('show');
						});
					</script>";
			}
		
			
			mysqli_stmt_close($stmt); 
		}
		
		if(isset($_GET['userId']) && isset($_GET['ban']) && $_GET['ban']=="true")
		{	
			
			$sqlTest2 = "UPDATE user SET status = 'Ban' WHERE userId = '$userId'";
			$sqlTest2  = mysqli_query($conn, $sqlTest2) or die("Error : ". mysqli_error($conn));
			
			if(mysqli_affected_rows($conn)>0)
			{
				$_SESSION['adminMemberBan'] = "ban1";
				
				echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal17').modal('show');
						});
					</script>";
			}
			else
			{
				$_SESSION['adminMemberBan'] = "ban2";
				
				echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal17').modal('show');
						});
					</script>";
			}
		}
		
		if(isset($_GET['userId']) && isset($_GET['activate']) && $_GET['activate']=="true")
		{	
			
			$sqlTest2 = "UPDATE user SET status = 'Active' WHERE userId = '$userId'";
			$sqlTest2  = mysqli_query($conn, $sqlTest2) or die("Error : ". mysqli_error($conn));
			
			if(mysqli_affected_rows($conn)>0)
			{
				$_SESSION['adminMemberActivate'] = "active1";
				
				echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal19').modal('show');
						});
					</script>";
			}
			else
			{
				$_SESSION['adminMemberActivate'] = "active2";
				
				echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal19').modal('show');
						});
					</script>";
			}
		}
		
		
	?>
	
	
	<!--Card-->
	<div class="container mt-5">
	
		<h1>User Profile</h1>
		
		<ul class="breadcrumb">
		  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo 'admin_user_manage.php' ?>">User Management</a></li>
		  <li class="breadcrumb-item active">User Profile</li>
		</ul>
		
		
		<div class="container">
		<div class="row">

			<div class="card">
				<div class="row">
				  <div style="width:900px" class="col-xl-4">
					<div class="card-block text-center">
						<?php
							if(isset($_POST['changeImageSub']) || isset($_POST['changePasswordSub']))
							{
								echo "";
							}
							else
							{
								while ($row = mysqli_fetch_assoc($sql)){
									$imageName = $row["imageName"];
									$imageContent = $row["imageContent"];
									
									/*$image = new Imagick();
									$image->setResolution(72,72) ;
									$image->resampleImage  (72,72,imagick::FILTER_UNDEFINED,1);
									$image->readimageblob($imageContent);
									$output = $im->getimageblob();
								    $outputtype = $im->getFormat();

									header("Content-type: $outputtype");
									echo $output;*/
									
									/*$image = @imagecreatefromstring($imageContent);
									$image = imagescale($image, 350, 330);
									ob_start();
									imagejpeg($image);
									$contents = ob_get_contents();
									ob_end_clean();*/
									if($imageContent==null)
									{
										echo '<img src="/emax/resources/img_avatar1.png" alt="Card image cap" style="width: 350px; height:330px"/>';
									}
									else
									{
										
										echo '<img src="data:image/png;base64,'.base64_encode( $imageContent ).' " alt="Card image cap" style="width: 350px; height:330px"/>';
									}
								}
							}
						?>
						<h4 class="card-title mt-3">
							<?php
								if(isset($_POST['changeImageSub']) || isset($_POST['changePasswordSub']))
								{
									echo "";
								}
								else
								{
									mysqli_data_seek($sql, 0);
									while ($row = mysqli_fetch_assoc($sql)){
										$fullName = $row["fullName"];
										echo $fullName;
									}
								}
							?>
						</h4>
						<p class="card-title">
							<?php
								if(isset($_POST['changeImageSub']) || isset($_POST['changePasswordSub']))
								{
									echo "";
								}
								else
								{
									mysqli_data_seek($sql, 0);
									while ($row = mysqli_fetch_assoc($sql)){
										$role = $row["role"];
										echo "Role : ".$role;
									}
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
								if(isset($_POST['changeImageSub']) || isset($_POST['changePasswordSub']))
								{
									echo "";
								}
								else
								{
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
								}
								?>
								
							</table>
						</div>
							<button class="btn btn-secondary mb-4" data-toggle="modal" data-target="#myModal14">Change Image</button>
							<button class="btn btn-secondary mb-4" data-toggle="modal" data-target="#myModal12">Change Password</button>
							<?php 
								if(isset($status) && $status=='Active')
								{
									echo"<button data-href='admin_user_profile.php?userId=$userId&ban=true' class='btn btn-secondary mb-4' data-toggle='modal' data-target='#myModal15'>Ban User</button>"; 
								}
								elseif(isset($status) && $status=='Ban')
								{
									echo"<button data-href='admin_user_profile.php?userId=$userId&activate=true' class='btn btn-secondary mb-4' data-toggle='modal' data-target='#myModal18'>Activate User</button>"; 
								}
							?>
							<?php echo"<a href='admin_user_report.php?userId=$userId' class='btn btn-secondary mb-4' >View Report</a>"; ?>
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
					<form class="form-row" id="memberPassword" method="post" name="memberPassword">
						<input type="password" class="form-control mt-2" id="oldPassword" placeholder="Old Password" name="oldPassword">
						<input type="password" class="form-control mt-4" id="newPassword" placeholder="New Password" name="newPassword">
						<input type="password" class="form-control mt-4" id="repeatPassword" placeholder="Retype New Password" name="repeatPassword">
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type='submit' class='btn btn-secondary' name='changePasswordSub'>Submit</a>
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
						<input type="file" name="image" id="image">
				</div>
				
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type='submit' class='btn btn-secondary' name='changeImageSub'>Submit</a>
					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
					</form>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="myModal15">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class='modal-title'>Ban this user?</h4>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<a class='btn btn-secondary btn-confirm' style='color: #ffffff'>Submit</a>
					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="myModal18">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class='modal-title'>Activate this user?</h4>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
					<a class='btn btn-secondary btn-confirm' style='color: #ffffff'>Submit</a>
					<button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
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
						if($_SESSION['adminChangePassword'] == "passwordErr1")
						{
							echo "<h4 class='modal-title'>Password Changed Sucessfully</h4>";
							$_SESSION['adminChangePassword'] = null;
						}
						elseif($_SESSION['adminChangePassword'] == "passwordErr2")
						{
							echo "<h4 class='modal-title'>Password Remain Unchanged</h4>";
							$_SESSION['adminChangePassword'] = null;
						}
						elseif($_SESSION['adminChangePassword'] == "passwordErr3")
						{
							echo "<h4 class='modal-title'>Wrong Old Password</h4>";
							$_SESSION['adminChangePassword'] = null;
						}
					?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
				 <?php 
					echo "<a class='btn btn-secondary' href='admin_user_profile.php?userId=$userId'>OK</a>";
				 ?>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="myModal16">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<?php
						if($_SESSION['adminMemberImage'] == "imageErr1")
						{
							echo "<h4 class='modal-title'>Update Image Successful</h4>";
							$_SESSION['adminMemberImage'] = null;
						}
						elseif($_SESSION['adminMemberImage'] == "imageErr2")
						{
							echo "<h4 class='modal-title'>Image Remain Same</h4>";
							$_SESSION['adminMemberImage'] = null;
						}
						elseif($_SESSION['adminMemberImage'] == "imageErr3")
						{
							echo "<h4 class='modal-title'>Update Image Failed</h4>";
							$_SESSION['adminMemberImage'] = null;
						}
						elseif($_SESSION['adminMemberImage'] == "imageErr4")
						{
							echo "<h4 class='modal-title'>No Image Has Been Uploaded</h4>";
							$_SESSION['adminMemberImage'] = null;
						}
						elseif($_SESSION['adminMemberImage'] == "imageErr5")
						{
							echo "<h4 class='modal-title'>Image Wrong Format</h4>";
							$_SESSION['adminMemberImage'] = null;
						}
						elseif($_SESSION['adminMemberImage'] == "imageErr6")
						{
							echo "<h4 class='modal-title'>Image Size need to be less than 5MB</h4>";
							$_SESSION['adminMemberImage'] = null;
						}
					?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
				<?php 
					echo "<a class='btn btn-secondary' href='admin_user_profile.php?userId=$userId'>OK</a>";
				 ?>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="myModal17">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<?php
						if($_SESSION['adminMemberBan'] == "ban1")
						{
							echo "<h4 class='modal-title'>Ban User Successful</h4>";
							$_SESSION['adminMemberBan'] = null;
						}
						else
						{
							echo "<h4 class='modal-title'>Ban User Failed</h4>";
							$_SESSION['adminMemberBan'] = null;
						}
					?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
				<?php 
					echo "<a class='btn btn-secondary' href='admin_user_profile.php?userId=$userId'>OK</a>";
				 ?>
				</div>
			</div>
			
		</div>
	</div>
	
	<div class="modal fade" id="myModal19">
		<div class="modal-dialog">
			<div class="modal-content">
				<!-- Modal Header -->
				<div class="modal-header">
					<?php
						if($_SESSION['adminMemberActivate'] == "active1")
						{
							echo "<h4 class='modal-title'>Activate User Successful</h4>";
							$_SESSION['adminMemberActivate'] = null;
						}
						else
						{
							echo "<h4 class='modal-title'>Activate User Failed</h4>";
							$_SESSION['adminMemberActivate'] = null;
						}
					?>
				</div>
				<!-- Modal footer -->
				<div class="modal-footer">
				<?php 
					echo "<a class='btn btn-secondary' href='admin_user_profile.php?userId=$userId'>OK</a>";
				 ?>
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
	
	
		$('#myModal15').on('show.bs.modal', function(e) {
			$(this).find('.btn-confirm').attr('href', $(e.relatedTarget).data('href'));
		});
		
		$('#myModal18').on('show.bs.modal', function(e) {
			$(this).find('.btn-confirm').attr('href', $(e.relatedTarget).data('href'));
		});
		
		$("#memberPassword").validate({
			rules: {
				oldPassword: {
					required: true,
				},
				newPassword: {
					required: true,
					minlength: 8,
				},
				repeatPassword: {
					required: true,
					minlength: 8,
					equalTo: "#newPassword",
				},
			},
		});
	
	});
</script>

</body>


</html>