<?php
	
include("connection.php");
/**
  * @author: mfsi_krishnadev
  * @class: validating user
*/
class user extends db_connection
{	
	/*
	 * @access: public
	 * @param : email-id, password 
	 * @return type: none
	*/
	public function check($mail_id, $pass)
	{
		$email_id = $this->test_input($mail_id);
		$password = md5($pass);
		$select = "SELECT id, CONCAT(first_name, ' ',last_name)as name 
		  FROM employee
		  WHERE email_id = '$email_id' 
		  AND password = '$password'";
		$query = mysqli_query($this->connect, $select);
		$row = mysqli_num_rows($query);
		if($row == 1)
		{
			session_start();
			$row = mysqli_fetch_assoc($query); 		
			$_SESSION['user_id'] = $row['id'];
			$_SESSION['user_name'] = $row['name'];
			return true;
		}
	}
	/*
	 * @access: public
	 * @param: none
	 * return: boolean
	*/
	public function display_user($id)
	{
		$employee_id = $id;	
		$select_employee = "SELECT CONCAT(prefix, ' ',first_name, ' ',middle_name , ' ', last_name)as name, gender, email_id, dob,  marital_status, id,
			(SELECT GROUP_CONCAT(street, ',',city, ',',state, '-',zip) AS residence 
			FROM address addr 
			WHERE type = 'residence' 
			AND addr.employee_id = e.id)as residence,
			(SELECT GROUP_CONCAT(street, ',',city, ',',state, '-',zip) AS office 
			FROM address addr 
			WHERE type = 'office' 
			AND addr.employee_id = e.id)as office,
			(SELECT type FROM communication commu  WHERE commu.employee_id = e.id )as communication
			FROM employee e
			WHERE e.id = $employee_id ";
		return mysqli_query($this->connect, $select_employee);
	}
	/*
	 * @access:public 
	 * @param: string
	 * @return : array
	*/
	public function search_user($name,$email)
	{			
		$username = $name;
		$user_email = $email;
		$user_search = "SELECT CONCAT(prefix, ' ',first_name, ' ',middle_name , ' ', last_name)as name, gender, email_id, dob,  marital_status, id,
			(SELECT GROUP_CONCAT(street, ',',city, ',',state, '-',zip) AS residence 
			FROM address addr 
			WHERE type = 'residence' 
			AND addr.employee_id = e.id)as residence,
			(SELECT GROUP_CONCAT(street, ',',city, ',',state, '-',zip) AS office 
			FROM address addr 
			WHERE type = 'office' 
			AND addr.employee_id = e.id)as office,
			(SELECT type FROM communication commu  WHERE commu.employee_id = e.id )as communication
			FROM employee e
			WHERE e.first_name = '$username' OR e.email_id = '$user_email'";											
		return mysqli_query($this->connect, $user_search);
	}
}
?>