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
		$role = $_SESSION['ageRange'];
		$emailActivation = "False";
		
		
		/*$sqlTes = "SELECT MAX(userId) AS max_total FROM user";
		$sqlTes  = mysqli_query($conn, $sqlTes) or die("Error : ". mysqli_error($conn));
		$rows = mysqli_fetch_array($sqlTes);
		$latestUserId = $rows['max_total'];
		$latestUserId = (int)$latestUserId + 1;
		$latestUserId = (string)$latestUserId;*/
		$activationCode = md5($username);
		
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['fullName'] = $fullName;
		$_SESSION['emailAddress'] = $emailAddress;
		$_SESSION['latestUserId'] = $latestUserId;
		$_SESSION['activationCode'] = $activationCode;
		
		$sqlTest = "SELECT * FROM user WHERE emailAddress = '$emailAddress'";

		$sqlTest  = mysqli_query($conn, $sqlTest) or die("Error : ". mysqli_error($conn));
		

		while($row = mysqli_fetch_assoc($sqlTest))
		{
			$email2 = $row['emailAddress'];
			$username2 = $row['username'];
		}
		
		if(mysqli_affected_rows($conn) > 0)
		{
			$_SESSION['errorMemberEmail'] = "Email already exists";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			break;
		}
		
		$sqlTest = "SELECT * FROM user WHERE username = '$username'";

		$sqlTest  = mysqli_query($conn, $sqlTest) or die("Error : ". mysqli_error($conn));
		

		while($row = mysqli_fetch_assoc($sqlTest))
		{
			$username2 = $row['username'];
		}
		
		
		if(mysqli_affected_rows($conn) > 0)
		{
			$_SESSION['errorMemberUsername'] = "Username already exists";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			break;
		}
		else
		{
			
			$option = [
				"cost" => 12,
			];
			
			
			$password2 = password_hash($password , PASSWORD_DEFAULT, $option);
			
			$sqlTest = "INSERT INTO user(fullName, username, passwordHash, birthDate, emailAddress, role, emailActivation, activationCode) VALUES(?,?,?,?,?,?,?,?)";
			
			$stmt = mysqli_prepare($conn, $sqlTest) or die("Error : ". mysqli_error($conn));
			
			mysqli_stmt_bind_param($stmt, "ssssssss", $fullName, $username, $password2, $birthDate3, $emailAddress, $role, $emailActivation, $activationCode);     
			
			

			if($stmt->execute())
			{
				include "mail.php";
				$_SESSION['registerSuccess'] = "Registration Sucessful";
				
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
		$role = $_SESSION['ageRange'];
		$emailActivation = "False";
		
		$activationCode = md5($username);
		
		$_SESSION['username'] = $username;
		$_SESSION['password'] = $password;
		$_SESSION['fullName'] = $fullName;
		$_SESSION['emailAddress'] = $emailAddress;
		$_SESSION['latestUserId'] = $latestUserId;
		$_SESSION['activationCode'] = $activationCode;
		
		$sqlTest2 = "SELECT * FROM user WHERE emailAddress = '$emailAddress'";

		$sqlTest3  = mysqli_query($conn, $sqlTest2) or die("Error : ". mysqli_error($conn));
		

		while($data = mysqli_fetch_assoc($sqlTest3))
		{
			$email2 = $data['emailAddress'];
			
		}
		
		if(mysqli_affected_rows($conn) > 0)
		{
			$_SESSION['errorParentEmail'] = "Email exists already";
			header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
		else
		{

			$option = [
				"cost" => 12,
			];
			
			$password2 = password_hash($password , PASSWORD_DEFAULT, $option);
			
			$sqlTest = "INSERT INTO user(fullName, username, passwordHash, birthDate, emailAddress, role, emailActivation, activationCode) VALUES(?,?,?,?,?,?,?,?)";
			
			$stmt = mysqli_prepare($conn, $sqlTest) or die("Error : ". mysqli_error($conn));
			
			mysqli_stmt_bind_param($stmt, "ssssssss", $fullName, $username, $password2, $birthDate3, $emailAddress, $role, $emailActivation, $activationCode);     
			
			
			if($stmt->execute())
			{
				$_SESSION['registerSuccess'] = "Registration Sucessful";
				include "mail.php";
				
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
			  <a href="index.php" class="btn btn-secondary">Go To Home Page</a>
			</div>
		</div>
		
	</div>
</div>


