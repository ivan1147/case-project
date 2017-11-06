<?php
	session_start();
	
	session_unset();
	
	session_destroy();
	
	if(!$_SESSION['loggedIn'])
	{
		header('Location: home.php');
	}
			
?>