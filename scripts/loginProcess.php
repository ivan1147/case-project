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
		
		$stmt->store_result();
			
			//fetch the values
		if($stmt->fetch())
		{
			
			$_SESSION['loggedUsername'] = $username;
			
			$sql = "SELECT * FROM user WHERE username = '$username'";
			
			$sql = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
			
			while($row = mysqli_fetch_assoc($sql))
			{
				$role = $row['role'];
				$emailActivation = $row['emailActivation'];
				$emailAddress = $row['emailAddress'];
				
				$_SESSION['emailActivation'] = $emailActivation;
				$_SESSION['emailAddress'] = $emailAddress;
			}
			
			$_SESSION['loggedRole'] = $role;
			
			
			if(password_verify($password, $passWordHash))
			{
				if($_SESSION['emailActivation'] == "False")
				{
					$_SESSION['errorActivation'] = "The account is not activated yet. Please check your email.";
					header('Location: home.php');
				}
				else 
				{
					$_SESSION['loggedIn'] = true;
					header('Location: home.php');
				}
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

