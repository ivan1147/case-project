<?php
	include "head.php";
	include "database_conn.php";
	session_start();
	
	if(isset($_POST['loginSub']))
	{
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		$sqlTest = "SELECT passwordHash FROM user WHERE username = ?";
		
		$stmt = mysqli_prepare($conn, $sqlTest);
		
		$stmt->bind_param("s", $username);     
		
		$stmt->execute();	
		
		$stmt->bind_result($passWordHash);
			
			
			//fetch the values
		if($stmt->fetch())
		{
			
			$_SESSION['loggedemail'] = $email;
			
			$role = "SELECT role FROM user WHERE emailAddress = '$email'";
			
			$role = mysqli_query($conn, $role);
			
			$_SESSION['loggedrole'] = $role;
			
			if(password_verify($password, $passWordHash))
			{
				
				$_SESSION['loggedIn'] = true;
				header('Location: home.php');
				
			}
			else
			{
				header('Location: ' . $_SERVER['HTTP_REFERER']);
				$_SESSION['errorPassword'] = "Wrong password";
			}
		}
		else
		{
			header('Location: ' . $_SERVER['HTTP_REFERER']);
			$_SESSION['errorUsername'] = "Wrong username";
		}
			
			
		mysqli_stmt_close($stmt); 

			
		mysqli_close($conn);
	}
	
?>

