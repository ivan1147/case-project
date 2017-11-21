
<body>

<div class="container">
	
	<!--Navigation Bar-->
	<?php 
	
		include "head.php";
		include "navigation.php";
		
		if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']) && $_SESSION['loggedRole'] == "Admin")
		{
		}
		else
		{
			echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
			exit();
		}
		
		if(isset($_POST['adminMemberSub']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			$fullName = $_POST['fullName'];
			$birthDate = $_POST['birthDate'];
			$emailAddress = $_POST['emailAddress'];			
			$emailActivation = "True";		
			
			$currentDate = date("Y-m-d");

			$birthDate = new DateTime($birthDate);
			$currentDate = new DateTime($currentDate);

			$diff = $birthDate->diff($currentDate)->format('%y');
			
			$birthDate = $birthDate->format('Y-m-d');
			
			
			if($diff<16)
			{
				$role = "Junior";
			}
			else
			{
				$role = "Senior";
			}
			
			$imagename = $_FILES["image"]["name"]; 

			//Get the content of the image and then add slashes to it 
			$imagetmp = file_get_contents($_FILES['image']['tmp_name']);

	
			$sql = "SELECT * FROM user WHERE emailAddress = '$emailAddress'";

			$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
			
			while($row = mysqli_fetch_assoc($sql))
			{
				$email = $row['emailAddress'];
			}
			
			if(mysqli_affected_rows($conn) > 0)
			{
				$_SESSION['adminProfile'] = "profile8";
					
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal10').modal('show');
						});
					</script>";
			}
			else
			{
			
				$sqlTest = "SELECT * FROM user WHERE username = '$username'";

				$sqlTest  = mysqli_query($conn, $sqlTest) or die("Error : ". mysqli_error($conn));
				

				while($row = mysqli_fetch_assoc($sqlTest))
				{
					$username2 = $row['username'];
				}
				
				if(mysqli_affected_rows($conn) > 0)
				{
					$_SESSION['adminProfile'] = "profile9";
						
						echo "<script type='text/javascript'>
							$(document).ready(function(){
							$('#myModal10').modal('show');
							});
						</script>";
				}
				else
				{

					$option = [
						"cost" => 12,
					];
					
					$password2 = password_hash($password , PASSWORD_DEFAULT, $option);
					
					$sqlTest = "INSERT INTO user(fullName, username, passwordHash, birthDate, role, emailActivation, emailAddress, imageName, imageContent) VALUES(?,?,?,?,?,?,?,?,?)";
					
					$stmt = mysqli_prepare($conn, $sqlTest);
					
					mysqli_stmt_bind_param($stmt, "sssssssss", $fullName, $username, $password2, $birthDate, $role, $emailActivation, $emailAddress, $imagename, $imagetmp);     
					
					if($stmt->execute())
					{
						$_SESSION['adminProfile'] = "profile1";
						echo "<script type='text/javascript'>window.location.href = 'admin_user_manage.php';</script>";
					}
					else
					{
						$_SESSION['adminProfile'] = "profile2";
						echo "<script type='text/javascript'>window.location.href = 'admin_user_manage.php';</script>";
					}
					
					
					mysqli_stmt_close($stmt); 
				}
				
				mysqli_close($conn);
			
			}
		}
	?>

	
	<!--Card-->
	<div class="container mt-5">
		
		<h1> Create User</h1>
		
		<ul class="breadcrumb">
		  <li class="breadcrumb-item"><a href="<?php echo 'index.php' ?>">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo 'admin_user_manage.php' ?>">Manage User</a></li>
		  <li class="breadcrumb-item active">Create User</li>
		</ul>
		
		
		<div class="container">
			<form class="form-group" id="adminMemberDetail" method="post" name="adminMemberDetail" enctype="multipart/form-data">  
				<div class="form-group">
					<label for="text">Username</label>
					<input type="text" class="form-control" id="username" name="username">
				</div>
				<div class="form-group">
					<label for="text">Password</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>
				<div class="form-group">
					<label for="text">Full Name</label>
					<input type="text" class="form-control" id="fullName" name="fullName">
				</div>
				<div class="form-group">
					<label for="text">Date of Birth</label>
					<input type="text" id="datepicker" class="form-control" name="birthDate">
				</div>
				<div class="form-group">
					<label for="text">Email Address</label>
					<input type="email" class="form-control" id="emailAddress" name="emailAddress">
				</div>
				<div class="form-group">
					<label for="text">Profile Picture</label>
					<div class="form-group">
						<input type="file" name="image">
					</div>
				</div>
				<button id="createItem" type="submit" class="btn btn-info mt-3" name="adminMemberSub">Submit</button>
			</form>
		</div>	
		
		
		<div class="modal fade" id="myModal10">
			<div class="modal-dialog">
				<div class="modal-content">
					<!-- Modal Header -->
					<div class="modal-header">
						<?php
							if($_SESSION['adminProfile'] == "profile8")
							{
								echo "<h4 class='modal-title'>Email Already exists</h4>";
								$_SESSION['adminProfile'] = null;
							}	
							elseif($_SESSION['adminProfile'] == "profile9")
							{
								echo "<h4 class='modal-title'>Username Already exists</h4>";
								$_SESSION['adminProfile'] = null;
							}	
						?>
					</div>
					<!-- Modal footer -->
					<div class="modal-footer">
						<button class='btn btn-secondary' data-dismiss="modal">OK</button>
					</div>
				</div>
				
			</div>
		</div>
		
		
	</div>
		
		
	<?php include "footer.php"?>
		
	
	</div>
	
	
	<!--Footer-->
	
  
</div>

<script>
	$(document).ready(function(){
		$("#datepicker").datepicker({
			changeMonth: true,
			changeYear: true,
			yearRange: '-100:+0',
			dateFormat: 'yy-mm-dd'
		});
		
	
		$("#adminMemberDetail").validate({
			rules: {
				fullName: {
					required: true,
					minlength: 5,
				},
				username: {
					required: true,
					minlength: 8,
				},
				password: {
					required: true,
					minlength: 10,
				},
				emailAddress: {
					required: true,
				},
				datepicker: {
					required: true,
				},
			},
		});
	});
	
	
</script>

</body>


</html>