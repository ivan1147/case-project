
<body>

<div class="container">
	
	<!--Navigation Bar-->
	<?php 
	
		include "head.php";
		include "navigation.php";
		
		$userId = $_GET['userId'];
		
		$sql = "SELECT * FROM user WHERE userId = '$userId'";
		
		$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
		
		
		
		if(isset($_POST['adminMemberSub']))
		{
			$username = $_POST['username'];
			$fullName = $_POST['fullName'];
			$emailAddress = $_POST['emailAddress'];
			
			//$emailAddress2 = $_SESSION['emailAddress']
			
			//Get the content of the image and then add slashes to it 
			
			
			
			$sql = "SELECT * FROM user WHERE userId != $userId AND emailAddress = '$emailAddress'";
			
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
				
				
				
				$sql2 = "SELECT * FROM user WHERE userId != $userId AND username = '$username'";
				
				$sql2  = mysqli_query($conn, $sql2) or die("Error : ". mysqli_error($conn));

				while($row = mysqli_fetch_assoc($sql2))
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
					$sqlTest = "UPDATE user SET username=?, fullName=?, emailAddress=? WHERE userId='$userId'";
				
					$stmt = mysqli_prepare($conn, $sqlTest) or die("Error : ". mysqli_error($conn));	
					
					
					mysqli_stmt_bind_param($stmt, "sss", $username, $fullName, $emailAddress);   
					
					
					if(mysqli_stmt_execute($stmt))
					{
						mysqli_stmt_store_result($stmt);
					
						if (mysqli_affected_rows($conn)> 0)
						{
							$_SESSION['adminProfile'] = "profile3";
							echo "<script type='text/javascript'>window.location.href = 'admin_user_manage.php';</script>";
						}
						else
						{
							$_SESSION['adminProfile'] = "profile4";
							echo "<script type='text/javascript'>window.location.href = 'admin_user_manage.php';</script>";
						}
					}
					else
					{
						$_SESSION['adminProfile'] = "profile5";
						echo "<script type='text/javascript'>window.location.href = 'admin_user_manage.php';</script>";
					}
				
					
					mysqli_stmt_close($stmt); 
				}
			
			}
			mysqli_close($conn);
			
			
		}
	?>

	
	<!--Card-->
	<div class="container mt-5">
		
		<h1> Update User</h1>
		
		<ul class="breadcrumb">
		  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo 'admin_user_manage.php' ?>">Manage User</a></li>
		  <li class="breadcrumb-item active">Update User</li>
		</ul>
		
		<div class='container'>
		
		<?php 
			mysqli_data_seek($sql, 0);
			while ($row = mysqli_fetch_assoc($sql)){
			
				$fullName = $row['fullName'];
				$username = $row['username'];
				$emailAddress = $row['emailAddress'];

				echo"<form class='form-group' method='post' id='adminMemberDetail' name='adminMemberDetail' enctype='multipart/form-data'>  	
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
					<button id='createItem' type='submit' class='btn btn-info mt-3' name='adminMemberSub'>Submit</button>
				</form>";
			}
		?>	
		
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
		
	</div>
		
		
		
	<?php include "footer.php"?>	
	
	
	
	
	<!--Footer-->
	
	
  
</div>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
		
		$("#datepicker").datepicker({
			uiLibrary: 'bootstrap4',
			format: 'yyyy-mm-dd',
			startDate: '-3d'
			
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
				emailAddress: {
					required: true,
				},
			},
		});
	
	});
	
	
</script>

</body>


</html>


