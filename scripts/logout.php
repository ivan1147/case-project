<?php
	include "database_conn.php";
	
	session_start();
	
	$userId = $_SESSION['loggedUserId'];
	$ipAddress = $_SERVER['REMOTE_ADDR'];
	$name = "User Logout";
	$link = "user_profile";
	$sql = "INSERT INTO activity(ipAddress, name, userId, link) VALUES('$ipAddress', '$name', '$userId', '$link')";
	$sql  = mysqli_query($conn, $sql) or die("Error : ". mysqli_error($conn));
	
	session_unset();
	
	session_destroy();
	
	if(!$_SESSION['loggedIn'])
	{
		header('Location: home.php');
	}
			
?>