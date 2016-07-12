<?php
	/*
	 * @author: mfsi-krishnadev
	 * @class: checking session of logged-in user
	*/

	class session_check
	{

		/*
		 * @description: checking session whether user is valid or not
		 * @access: public
		 * @param : none
		 * return: boolean
		*/
		function logged_in()
		{
			//checking the session variable user_id is present or not
			$session_id = $_SESSION["user_id"];
			if(isset($session_id) && !empty($session_id))
			{
				return true;
			}
			return false;
		}
		/*
		 * @description: performing logout operation
		 * @access: public
		 * @param : none
		 * return: boolean
		*/
		function logout()
		{
			//destroying the session of the user
			session_unset($_SESSION['user_id']);
			return true;
		}
	}

?>