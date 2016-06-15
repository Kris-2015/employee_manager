<?php
	$hostname = 'localhost';
	$username = 'root';
	$password = 'mindfire';
	$db_name = 'restaurant';

	//procedural way to connect database

	$conn = mysqli_connect($hostname, $username, $password, $db_name);

	//Testing the db connection
	if (mysqli_connect_errno($conn)) {
		die('Failed to connect to MySql:	' . mysqli_connect_error());
	}

	$sql = 'SELECT * FROM restaurant' ;

	$result = mysqli_query($conn,$sql);
	//, MYSQLI_ASSOC
	while ($row = mysqli_fetch_assoc($result)) {
		print_r($row);
		echo '<br>';
	}exit;

	mysqli_close($conn);
?>