<?php
	include "head.php";
	include "database_conn.php";
	session_start();
	
	if(isset($_POST['memberSub']))
	{
		$fullName = $_POST['fullName'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$emailAddress = $_POST['emailAddress'];
		$birthDate3 = $_SESSION['birthDate'];
		$role = "Senior";
		
		$sqlTest2 = "SELECT * FROM user WHERE emailAddress = '$emailAddress'";

		$sqlTest3  = mysqli_query($conn, $sqlTest2) or die("Error : ". mysqli_error($conn));
		

		while($data = mysqli_fetch_assoc($sqlTest3))
		{
			$email2 = $data['emailAddress'];
			
		}
		
		if(mysqli_affected_rows($conn) > 0)
		{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			$_SESSION['errorMemberEmail'] = "Email exists already";
		}
		else
		{

			$option = [
				"cost" => 12,
			];
			
			$password2 = password_hash($password , PASSWORD_DEFAULT, $option);
			
			$sqlTest = "INSERT INTO user(fullName, username, passwordHash, birthDate, emailAddress, role) VALUES(?,?,?,?,?,?)";
			
			$stmt = mysqli_prepare($conn, $sqlTest);
			
			mysqli_stmt_bind_param($stmt, "sssssi", $fullName, $username, $password2, $birthDate3, $emailAddress, $role);     
			
			

			if($stmt->execute())
			{
				echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal8').modal('show');
					});
				</script>";
				
			}
			else
			{
				echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal7').modal('show');
					});
				</script>";
			}
			
			
			mysqli_stmt_close($stmt); 
		}
		
		mysqli_close($conn);
	}
	
	if(isset($_POST['parentSub']))
	{
		$fullName = $_POST['fullName'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$emailAddress = $_POST['emailAddress'];
		$birthDate3 = $_SESSION['birthDate'];
		$role = "Junior";
		
		$sqlTest2 = "SELECT * FROM user WHERE emailAddress = '$emailAddress'";

		$sqlTest3  = mysqli_query($conn, $sqlTest2) or die("Error : ". mysqli_error($conn));
		

		while($data = mysqli_fetch_assoc($sqlTest3))
		{
			$email2 = $data['emailAddress'];
			
		}
		
		if(mysqli_affected_rows($conn) > 0)
		{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			$_SESSION['errorParentEmail'] = "Email exists already";
		}
		else
		{

			$option = [
				"cost" => 12,
			];
			
			$password2 = password_hash($password , PASSWORD_DEFAULT, $option);
			
			$sqlTest = "INSERT INTO user(fullName, username, passwordHash, birthDate, emailAddress, role) VALUES(?,?,?,?,?,?)";
			
			$stmt = mysqli_prepare($conn, $sqlTest);
			
			mysqli_stmt_bind_param($stmt, "sssssi", $fullName, $username, $password2, $birthDate3, $emailAddress, $role);     
			
			

			if($stmt->execute())
			{
				echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal8').modal('show');
					});
				</script>";
				
			}
			else
			{
				echo "<script type='text/javascript'>
					$(document).ready(function(){
					$('#myModal7').modal('show');
					});
				</script>";
			}
			
			
			mysqli_stmt_close($stmt); 
		}
		
		mysqli_close($conn);
	}
?>


<div class="modal fade" id="myModal7">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Registration Failed</h4>
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
			  <a href="home.php" class="btn btn-secondary">Go To Home Page</a>
			</div>
		</div>
		
	</div>
</div>


<div class="modal fade" id="myModal8">
	<div class="modal-dialog">
		<div class="modal-content">
			<!-- Modal Header -->
			<div class="modal-header">
			  <h4 class="modal-title">Registration Sucessful</h4>
			</div>
			
			<!-- Modal footer -->
			<div class="modal-footer">
			  <a href="home.php" class="btn btn-secondary">Go To Home Page</a>
			</div>
		</div>
		
	</div>
</div>

