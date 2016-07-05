	<?php
	/*
	 * @author: mfsi_krishnadev
	 * @purpose: logging out the user
	 * @access: public
	*/
	include("session_check.php");
	session_start();
	$obj = new session_check();
	$logout = $obj->logout();

	var_dump($logout);
	
	if($logout)
	{
		header("Location: login.php");
	}

?>