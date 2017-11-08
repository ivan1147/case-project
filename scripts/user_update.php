
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
			$password = $_POST['password'];
			$fullName = $_POST['fullName'];
			$emailAddress = $_POST['emailAddress'];
			
			
			
			//Get the content of the image and then add slashes to it 
			$imagetmp = addslashes (file_get_contents($_FILES['image']['tmp_name']));
			$imagename = $_FILES["image"]["name"]; 
			
			
			$sql = "SELECT * FROM user WHERE emailAddress = '$emailAddress'";
		
			$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
			
			while($row = mysqli_fetch_assoc($sql))
			{
				$email = $row['emailAddress'];
			}
			
			if(mysqli_affected_rows($conn) > 0)
			{
				$_SESSION['errorMemberEmail'] = "Email exists already";
				die("email");
			}
			else
			{

				$option = [
					"cost" => 12,
				];
				
				$password2 = password_hash($password , PASSWORD_DEFAULT, $option);
				
				$sqlTest = "UPDATE user SET username=?, fullName=?, passwordHash=?, emailAddress=?, imageName=?, imageContent=? WHERE userId='$userId'";
			
				$stmt = mysqli_prepare($conn, $sqlTest);	
				
				
				mysqli_stmt_bind_param($stmt, "ssssss", $username, $fullName, $password2, $emailAddress, $imageName, $imagetmp);   
				
				
				if($stmt->execute())
				{
					$_SESSION['adminMemberSuccess'] = "Registration Successful";
					header('Location: user_manage.php');
				}
				else
				{
					$_SESSION['adminMemberfailed'] = "Registration Failed";
					die("failed");
				}
			
				
				
				mysqli_stmt_close($stmt); 
			}
			
			mysqli_close($conn);
			
			
		}
	?>

	
	<!--Card-->
	<div class="container mt-5">
		
		<h1> Update User</h1>
		
		<ul class="breadcrumb">
		  <li class="breadcrumb-item"><a href="<?php echo 'home.php' ?>">Home</a></li>
		  <li class="breadcrumb-item"><a href="<?php echo 'user_manage.php' ?>">Manage User</a></li>
		  <li class="breadcrumb-item active">Update User</li>
		</ul>
		
		<div class='container'>
		
		<?php 
			mysqli_data_seek($sql, 0);
			while ($row = mysqli_fetch_assoc($sql)){
			
				$fullName = $row['fullName'];
				$username = $row['username'];
				$emailAddress = $row['emailAddress'];
				$imageName = $row['imageName'];

				echo"<form class='form-group' method='post' name='adminMemberDetail' enctype='multipart/form-data'>  	
					<div class='form-group'>
						<label for='text'>Username</label>
						<input type='text' class='form-control' id='email' name='username' placeholder='$username'>
					</div>
				
					<div class='form-group'>
						<label for='text'>Password</label>
						<input type='password' class='form-control' id='email' name='password'>
					</div>
					<div class='form-group'>
						<label for='text'>Full Name</label>
						<input type='text' class='form-control' id='email' name='fullName' placeholder='$fullName'>
					</div>
					<div class='form-group'>
						<label for='text'>Email Address</label>
						<input type='email' class='form-control' id='email' name='emailAddress' placeholder='$emailAddress'>
					</div>
					<div class='form-group'>
						<label for='text'>Profile Picture</label>
						<div class='form-group'>
							<input type='file' name='image'>
							<input type='hidden' name='imageName'>
						</div>
					</div>
					<button id='createItem' type='submit' class='btn btn-info mt-3' name='adminMemberSub'>Submit</button>
				</form>";
			}
		?>	
		
				
			
		</div>	
		
	</div>
		
		
		
		
	
	</div>
	
	
	<!--Footer-->
	<?php include "footer.php"?>
	
  
</div>

<script>
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip(); 
		
		$("#datepicker").datepicker({
			uiLibrary: 'bootstrap4',
			format: 'yyyy-mm-dd',
			startDate: '-3d'
			
		});
	});
	
	
</script>

</body>


</html>