<?php
	include "database_conn.php";
	
	session_start();
	
	$userId = $_SESSION['loggedUserId'];
	$ipAddress = $_SERVER['REMOTE_ADDR'];
	$name = "User Logout";
	$link = "user_profile";
	$sql = "INSERT INTO activity(ipAddress, name, categoryId, userId) VALUES('$ipAddress', '$name', 1, '$userId')";
	$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
	
	session_unset();
	
	session_destroy();
	
	if(!$_SESSION['loggedIn'])
	{
		header('Location: home.php');
	}
			
?>