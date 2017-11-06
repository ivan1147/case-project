<?php 
	//Connect to the server host and database
	define("SERVER","localhost");
	define("USER","root");
	define("PASSWORD","");
	define("DATABASE", "emax");
	
	$conn = mysqli_connect(SERVER, USER, PASSWORD, DATABASE);
	
	if(!$conn)
	{
		die("Error: " . mysqli_connect_error());
	}
	
?>