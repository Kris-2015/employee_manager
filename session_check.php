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
			$session_id = isset($_SESSION["user_id"]) ? $_SESSION["user_id"] : '1';
			
			if($session_id == '1')
			{
				return 0;
			}
			return 1;
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
			session_unset();
			return true;
		}
	}

?>