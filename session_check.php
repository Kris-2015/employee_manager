<?php

	class session_check
	{
		function logged_in()
		{
			//checking the session variable user_id is present or not
			if(isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]))
			{
				return true;
			}
			else
			{
				return false;
			}
		}

		function logout()
		{
			
			//$this->logged_in();
			session_unset($_SESSION['user_id']);
			session_destroy();
			return true;
		}
	}

?>