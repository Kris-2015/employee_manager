	<?php
	/*
	 * @author: mfsi_krishnadev
	 * @purpose: logging out the user
	 * @access: public
	*/

	//including the session check class file
	include("session_check.php");
	session_start();
	//instantiating the object of session_check class
	$obj = new session_check();
	//calling the function logout to destroy session
	$logout = $obj->logout();

	//checking if the result is true, then logout the user
	if($logout)
	{
		header("Location: login.php");
	}

?>