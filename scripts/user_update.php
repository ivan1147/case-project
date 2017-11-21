
<body>

<div class="container">
	
	<!--Navigation Bar-->
	<?php 
	
		include "head.php";
		include "navigation.php";
		
		if(isset($_SESSION['loggedIn']) && isset($_SESSION['loggedRole']))
		{
			$userId = $_GET['userId'];
			
			$sql = "SELECT * FROM user WHERE userId = '$userId'";
			
			$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
		}
		else
		{
			echo "<script type='text/javascript'>window.location.href = 'index.php';</script>";
			exit();
		}
		
		
		if(isset($_POST['memberSub']))
		{
			$username = $_POST['username'];
			$fullName = $_POST['fullName'];
			$emailAddress = $_POST['emailAddress'];
			
			
			$sqlTest = "SELECT * FROM user WHERE userId != $userId AND emailAddress = '$emailAddress'";
		
			$sqlTest  = mysqli_query($conn, $sqlTest) or die("Error : ". mysqli_error($conn));
			
			while($row = mysqli_fetch_assoc($sqlTest))
			{
				$email = $row['emailAddress'];
			}
			
			if(mysqli_affected_rows($conn) > 0)
			{
				$_SESSION['memberProfile'] = "profile8";
				echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal10').modal('show');
					});
				</script>";
			}
			else
			{
			
				$sql2 = "SELECT * FROM user WHERE userId != $userId AND username = '$username'";
				
				$sql2  = mysqli_query($conn, $sql2) or die("Error : ". mysqli_error($conn));

				while($row = mysqli_fetch_assoc($sql2))
				{
					$username2 = $row['username'];
					
				}
				
				if(mysqli_affected_rows($conn) > 0)
				{
					$_SESSION['memberProfile'] = "profile9";
					
					echo "<script type='text/javascript'>
						$(document).ready(function(){
						$('#myModal10').modal('show');
						});
					</script>";
				}
				else
				{

					
					$sqlTest2 = "UPDATE user SET username=?, fullName=?, emailAddress=? WHERE userId='$userId'";
				
					$stmt = mysqli_prepare($conn, $sqlTest2) or die("Error : ". mysqli_error($conn));	
					
					
					mysqli_stmt_bind_param($stmt, "sss", $username, $fullName, $emailAddress);   
					
					
					if(mysqli_stmt_execute($stmt))
					{
						mysqli_stmt_store_result($stmt);
					
						if (mysqli_affected_rows($conn)> 0)
						{
							$ipAddress = $_SERVER['REMOTE_ADDR'];
							$name = "Update Details in User Profile";
							$link = "user_profile";
							$sql = "INSERT INTO activity(ipAddress, name, categoryId, userId) VALUES('$ipAddress', '$name', 1, '$userId')";
							$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
						
							$_SESSION['memberProfile'] = "profile3";
							echo "<script type='text/javascript'>window.location.href = 'user_profile.php?userId=$userId';</script>";
						}
						else
						{
							$_SESSION['memberProfile'] = "profile4";
							echo "<script type='text/javascript'>window.location.href = 'user_profile.php?userId=$userId';</script>";
						}
					}
					else
					{
						$_SESSION['memberProfile'] = "profile5";
						echo "<script type='text/javascript'>window.location.href = 'user_profile.php?userId=$userId';</script>";
					}
				
					
					mysqli_stmt_close($stmt); 
				}
			
			}
			mysqli_close($conn);
			
			
		}
	?>

	
	<!--Card-->
	<div class="container mt-5">
		
		<h1> Update Your Profile</h1>
		
		<ul class="breadcrumb">
		  <li class="breadcrumb-item"><a href="<?php echo 'index.php' ?>">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo 'user_profile.php' ?>">User Profile</a></li>
		  <li class="breadcrumb-item active">Update Your Profile</li>
		</ul>
		
		<div class='container'>
		
			<?php 
				mysqli_data_seek($sql, 0);
				while ($row = mysqli_fetch_assoc($sql)){
				
					$fullName = $row['fullName'];
					$username = $row['username'];
					$emailAddress = $row['emailAddress'];

					echo"<form id='memberDetailValid' class='form-group' method='post' name='memberDetail'>  	
						<div class='form-group'>
							<label for='text'>Username</label>
							<input type='text' class='form-control' id='username' name='username' value='$username'>
						</div>
						<div class='form-group'>
							<label for='text'>Full Name</label>
							<input type='text' class='form-control' id='fullName' name='fullName' value='$fullName'>
						</div>
						<div class='form-group'>
							<label for='text'>Email Address</label>
							<input type='email' class='form-control' id='emailAddress' name='emailAddress' value='$emailAddress'>
						</div>
						<button id='createItem' type='submit' class='btn btn-info mt-3' name='memberSub'>Submit</button>
					</form>";
				}
			?>	
			
			<div class="modal fade" id="myModal10">
				<div class="modal-dialog">
					<div class="modal-content">
						<!-- Modal Header -->
						<div class="modal-header">
							<?php
								if($_SESSION['memberProfile'] == "profile8")
								{
									echo "<h4 class='modal-title'>Email Already exists</h4>";
									$_SESSION['memberProfile'] = null;
								}	
								elseif($_SESSION['memberProfile'] == "profile9")
								{
									echo "<h4 class='modal-title'>Username Already exists</h4>";
									$_SESSION['memberProfile'] = null;
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
		
	</div>
		
		
	<!--Footer-->
	<?php include "footer.php"?>
	
		
	
</div>
	
	
	
  


<script>
	$(document).ready(function(){

		$("#memberDetailValid").validate({
			rules: {
				username: {
					required: true,
					minlength: 5,
				},
				username: {
					required: true,
					minlength: 8,
				},
				emailAddress: {
					required: true,
				},
			},
		});
		
		
	});
	
	
</script>

</body>


</html>


