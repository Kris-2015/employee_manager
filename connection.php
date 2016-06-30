<?php

	/**
	* @author: mfsi-krishnadev
	* @class : database connection and operation
	* 
	*/
	class db_connection 
	{
		//declaration of variables
		private $hostname = "localhost";
		private $username = "root";
		private $password = "mindfire";
		private $database = "employee";
		public  $connect;

		//contructor to initialse the variable
		function __construct()
		{
			$this->connect = mysqli_connect($this->hostname,$this->username,$this->password,$this->database);

			//Error Handling
			if(mysqli_connect_error())
			{
				trigger_error("Failed to connect mySQL:". mysqli_connect_error(),E_USER_ERROR);
			}	 
		}

		/*
		 * @access: public
		 * @param : integer
		 * @return type: array
		*/
		function display()
		{
				$conn = $this->connect;

					$display = "SELECT CONCAT(prefix, ' ',first_name, ' ',middle_name , ' ', last_name)as name, gender, email_id, dob, marital_status, id,
						(SELECT GROUP_CONCAT(street, ',',city, ',',state, '-',zip) AS residence FROM address addr WHERE type = 'residence' AND addr.employee_id = e.id)as residence,
						(SELECT GROUP_CONCAT(street, ',',city, ',',state, '-',zip) AS office FROM address addr WHERE type = 'office' AND addr.employee_id = e.id)as office,
						(SELECT type FROM communication commu  WHERE commu.employee_id = e.id )as communication
						FROM employee e " ;

			 	$result = mysqli_query($conn,$display);
			 	return $result;
		}

		/*
		 * @access: public
		 * @param: array
		 * @return : integer
		*/

		 function insert($input = array())
		 {

		    $first_name = $input['input_data']['first_name'];
		    $middle_name = isset($input['input_data']['middle_name']) ? $input['input_data']['middle_name'] : ' ';
		    $last_name = $input['input_data']['last_name'];
		    $prefix = $input['input_data']['prefix'];
		    $gender = $input['input_data']['gender'];
		    $dob = $input['input_data']['dob'];
		    $marital_status = $input['input_data']['marital_status'];
		    $employment = $input['input_data']['employment'];
		    $employer = $input['input_data']['employer'];
		    $email_id = $input['input_data']['email'];
		    $password = md5($input['input_data']['password']);
		    $confirm_password = md5($input['input_data']['confirm_password']);
		    $image = $input['file_data']['image'];
		    $home_street = $input['input_data']['home_street'];
		    $home_city = $input['input_data']['home_city'];
		    $home_state = $input['input_data']['home_state'];
		    $home_zip = $input['input_data']['home_zip'];
		    $home_mobile = $input['input_data']['home_mobile'];
		    $home_landline = $input['input_data']['home_landline'];
		    $home_fax = $input['input_data']['home_fax'];
		    $office_street = $input['input_data']['office_street'];
		    $office_city = $input['input_data']['office_city'];
		    $office_state = $input['input_data']['office_state'];
		    $office_zip = $input['input_data']['office_zip'];
		    $office_mobile = $input['input_data']['office_mob'];
		    $office_landline = $input['input_data']['office_landline'];
		    $office_fax = $input['input_data']['office_fax'];
		    $communication = implode(',' , $input['input_data']['communication']);

		    
		    $this->image_upload($image);
 																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																																								
		    	if(empty($password) && empty($confirm_password))
		    	{
		    		echo "<script>alert('Enter your password... ')</script>";
		    		header('location:registration.php');
		    		exit;
		    	}
			    else if($password == $confirm_password)
			    {

			    	$insert_employee = "INSERT INTO employee(first_name, middle_name, last_name, prefix, gender, dob, marital_status, employment, employer, email_id, password, image) VALUES('$first_name', '$middle_name', '$last_name', '$prefix', '$gender', '$dob', '$marital_status', '$employment', '$employer', '$email_id', '$password','$image[name]')" ;
			    	 
			    	$result_employee = mysqli_query($this->connect,$insert_employee);
			    	
			    	if($result_employee === TRUE)
			    	{
			    		$employee_id = mysqli_insert_id($this->connect);

			    		$insert_address = "INSERT INTO address(employee_id, type, street, city, state, mobile, landline, zip, fax)VALUES($employee_id,'residence','$home_street', '$home_city','$home_state', $home_mobile, $home_landline, $home_zip, $home_fax), ($employee_id,'office','$office_street', '$office_city','$office_state',     $office_mobile, $office_landline, $office_zip, $office_fax)";

			    		$result_address = mysqli_query($this->connect,$insert_address);

			    		$insert_communication = "INSERT INTO communication(employee_id, type) VALUES($employee_id, '$communication')";

			    		$result_communication = mysqli_query($this->connect,$insert_communication);

			    		mysqli_close($this->connect);
			    		echo "<script>alert('Registered Successfully..');</script>";
			    		header("location:login.php");
			    		exit;	
			    	}
			    	else
			    	{
			    		echo "<script>alert('some error occured.....try again later')</script>";
			    		header("location:registration.php");
			    		exit;
			    	}
		    }
		    else
		    {
		    	echo "<script>alert('incorrect password')</script>";
		    	exit;
		    }
		 }

		 /*
		  * @access: public
		  * @param: integer
		  * @return:
		 */
		 function image_upload($file)
		 {
		 	$errors;
		 	$file_name  = $file['name'];
			$file_size  = $file['size'];
			$file_tmp   = $file['tmp_name'];
			$file_type  = $file['type'];
			$file_ext   = strtolower(end(explode('.',$file['name'])));
			$extensions = array("jpeg","jpg","png");

			if(in_array($file_ext, $extensions) === false)
			{
	 		$errors = "extension not allowed, please choose a JPEG or PNG file.";
			}

			if (empty($errors))
			{
				if (move_uploaded_file($file_tmp, __DIR__ . "/profile/" . $file_name))
				{
			  		return $file_name;
				} 
				else
		    	{
			  		return $errors	;
				}
			} 

		 }

		 /*
		  * @access: public
		  * @param: integer
		  * @return:
		 */

		 function update($id,$input)
		 {
		 	$data = $input;
		 	$this->validation($data);

		 	$employee_id = $id;
		 	$first_name = isset($input['input_data']['first_name']) ? $input['input_data']['first_name'] : ' ';
		 	$middle_name = isset($input['input_data']['middle_name']) ? $input['input_data']['middle_name'] : ' ';
		 	$last_name = isset($input['input_data']['last_name']) ? $input['input_data']['last_name'] : ' ';
		 	$prefix = isset($input['input_data']['prefix']) ? $input['input_data']['prefix'] : ' ';
		 	$gender = isset($input['input_data']['gender']) ? $input['input_data']['gender'] : ' ';
		 	$dob = isset($input['input_data']['dob']) ? $input['input_data']['dob'] : ' ';
		 	$email_id = isset($input['input_data']['email']) ? $input['input_data']['email'] : ' ';
		 	$password = isset($input['input_data']['password']) ? md5($input['input_data']['password']) : ' ';
		 	$marital_status = isset($input['input_data']['marital_status']) ? $input['input_data']['marital_status'] : ' ';
		 	$employment = isset($input['input_data']['employment']) ? $input['input_data']['employment'] : ' ';
		 	$employer = isset($input['input_data']['employer']) ? $input['input_data']['employer'] : ' ';
		 	$image = isset($input['input_data']['image']) ? $input['input_data']['image'] : ' ';
		 	$home_street = isset($input['input_data']['home_street']) ? $input['input_data']['home_street'] : ' ';
		    $home_city = isset($input['input_data']['home_city']) ? $input['input_data']['home_city'] : ' ';
		    $home_state = isset($input['input_data']['home_state']) ? $input['input_data']['home_state'] : ' ';
		    $home_zip = isset($input['input_data']['home_zip']) ? $input['input_data']['home_zip'] : ' ';
		    $home_mobile = isset($input['input_data']['home_mobile']) ? $input['input_data']['home_mobile'] : ' ';
		    $home_landline = isset($input['input_data']['home_landline']) ? $input['input_data']['home_landline'] : ' ';
		    $home_fax = isset($input['input_data']['home_fax']) ? $input['input_data']['home_fax'] : ' ';
		    $office_street = isset($input['input_data']['office_street']) ? $input['input_data']['office_street'] : ' ';
		    $office_city = isset($input['input_data']['office_city']) ? $input['input_data']['office_city']: ' ';
		    $office_state = isset($input['input_data']['office_state']) ? $input['input_data']['office_state'] : ' ';
		    $office_zip = isset($input['input_data']['office_zip']) ? $input['input_data']['office_zip'] : ' ';
		    $office_mobile = isset($input['input_data']['office_mob']) ? $input['input_data']['office_mob'] : ' ';
		    $office_landline = isset($input['input_data']['office_landline']) ? $input['input_data']['office_landline'] : ' ';
		    $office_fax = isset($input['input_data']['office_fax']) ? $input['input_data']['office_fax'] : ' ';
		    $communication = implode(',' , $input['input_data']['communication']);

		 	$update_employee = " UPDATE employee e
		 		SET first_name = '$first_name',
		 			middle_name = '$middle_name',
		 			last_name = '$last_name',
		 			prefix = '$prefix',
		 			gender = '$gender',
		 			dob = '$dob',
		 			email_id = '$email_id',
		 			password = '$password',
		 			marital_status = '$marital_status',
		 			employment = '$employment',
		 			employer = '$employer',
		 			image = '$image'
		 		WHERE e.id = $employee_id";
		 	
		 	$result_employee = mysqli_query($this->connect , $update_employee);
	
		 	if($result_employee === TRUE)
		 	{
		 		$update_residence = "UPDATE employee e
		 			LEFT JOIN address addr ON e.id = addr.employee_id
		 			SET street = '$home_street',
		 				city = '$home_city',
		 				state = '$home_state',
		 				mobile = '$home_mobile',
		 				landline = '$home_landline',
		 				fax = '$home_fax'
		 			WHERE addr.employee_id = $employee_id AND type = 'residence'";

		 		$result_residence = mysqli_query($this->connect, $update_residence);
		 		
		 		$update_office = "UPDATE employee e
		 			LEFT JOIN address addr ON e.id = addr.employee_id
		 			SET street = '$office_street',
		 				city = '$office_city',
		 				state = '$office_state',
		 				mobile = '$office_mobile',
		 				landline = '$office_landline',
		 				fax = '$office_fax'
		 			WHERE addr.employee_id = $employee_id AND type = 'office'";

		 		$result_office = mysqli_query($this->connect, $update_office);

		 		$update_communication = "UPDATE employee e 
		 			LEFT JOIN communication comm ON e.id = comm.employee_id
		 			SET type = '$communication'
		 			WHERE comm.employee_id = $employee_id";

		 		$result_communication = mysqli_query($this->connect, $update_communication);
		 	}
		 	mysqli_close($this->connect);
			header("location:/profile.php");
			exit;
		 }

		 /*
		  * @access: public
		  * @param: integer
		  * @return: array
		 */
		 function delete($id)
		 {
		 	$employee_id = $id;

		 	$delete = "DELETE employee, address, communication FROM employee
			  LEFT JOIN  address ON employee.id = address.employee_id
			  LEFT JOIN  communication ON employee.id = address.employee_id
			  WHERE employee.id=$employee_id";

		 	$result_delete = mysqli_query($this->connect , $delete);
		 	//checking if the operation is successful or not
		 	if($result_delete)
		 	{
		 		return $result_delete;
		 	}
		 	else
		 	{
		 		$err_msg = "Unwanted error occured while deleting";
		 		return $err_msg;
		 	}
		 }

		 /*
		  * @access: public
		  * @param: integer
		  * @return: array
		 */

		 function retrive_data($id)
		 {
		 	$employee_id = $id;
		 	$select_employee = "SELECT emp.* ,
               (SELECT street FROM address addr WHERE addr.type = 'residence' AND addr.employee_id = emp.id)as home_street,
			   (SELECT street FROM address addr WHERE addr.type = 'office' AND addr.employee_id = emp.id)as office_street,
               GROUP_CONCAT(addr.city)as city,
               GROUP_CONCAT(addr.state)as state,
               GROUP_CONCAT(addr.zip)as zip,
               GROUP_CONCAT(addr.mobile)as mobile,
               GROUP_CONCAT(addr.landline)as landline,
               GROUP_CONCAT(addr.fax)as fax,
			   (SELECT type FROM communication comm WHERE comm.employee_id = emp.id)AS communication
               FROM employee emp
               LEFT JOIN address addr ON emp.id = addr.employee_id
			   LEFT JOIN communication comm ON emp.id = comm.employee_id
               WHERE emp.id = $employee_id";

               $result = mysqli_query($this->connect, $select_employee);

            	if(mysqli_num_rows($result) > 0)
            	{
               		$user_info = mysqli_fetch_assoc($result);
            	} 

            	return $user_info;
		 }

		function validation($input)
		{
			$error = 0;
			$_SESSION['error'] = array();
			$_SESSION['user_data'] = array();
			$error_space = array(
				'first_name' => 'please enter your first name',
				'last_name' => 'please enter your last name',
				'gender' => 'please select anyone',
				'prefix' => 'please select anyone',
				'password' => 'please enter the password',
				'email_id' => 'please enter your email id',
				'employer' => 'please enter employer name',
				'home_street' => 'please fill the field',
				'home_city' => 'please mention your city',
				'home_zip' => 'field cannot be empty',
				'home_mobile' => 'field cannot be empty',
				'home_landline' => 'field cannot be empty',
				'home_fax' => 'field cannot be empty',
				'office_street' => 'please fill the field',
				'office_city' => 'please mention your city',
				'office_zip' => 'field cannot be empty',
				'office_mobile' => 'field cannot be empty',
				'office_landline' => 'field cannot be empty',
				'office_fax' => 'field cannot be empty',
			);
			$error_list = array(
				'first_name' => 'only alphabets are allowed',
				'middle_name' => 'only alphabets are allowed',
				'last_name' => 'only alphabets are allowed',
				'image' => 'kindly enter the image ',
				'employer' => 'only alphabets are allowed',
				'home_street' => 'alphabets and numbers only',
				'home_city' => 'only alphabets only',
				'home_state' => 'please select any one option',
				'home_zip' => 'enter number upto 6 digits only',
				'home_mobile' => 'enter number upto 10 digits only',
				'home_landline' => 'enter number upto 10 digits only',
				'home_fax' => 'enter number upto 10 digits only',
				'office_street' => 'alphabets and numbers only',
				'office_city' => 'only alphabets only',
				'office_state' => 'please select any one option',
				'office_zip' => 'enter number upto 6 digits only',
				'office_mobile' => 'enter number upto 10 digits only',
				'office_landline' => 'enter number upto 10 digits only',
				'office_fax' => 'enter number upto 10 digits only',
				'communication' => 'select atleast one option'
			);
			if (isset($input["first_name"]) && !empty($input["first_name"]))
			{
				$first_name = $this->test_input($input["first_name"]);

				// check for the letters and whitespace

				if (!preg_match("/^[a-zA-Z ]*$/", $first_name))
				{
					$_SESSION['error']['first_name_err'] = $error_list['first_name'];
					$error++;
				}
				else
				{
					$_SESSION['user_data']['first_name'] = $first_name;
				}
			}
			else
			{
				$_SESSION['error']['first_name_err'] = $error_space['first_name'];
				$error++;
			}
			
			if (isset($input['middle_name']))
			{
				$middle_name = $this->test_input($input["middle_name"]);

				// check for the letters and whitespace

				if (!preg_match("/^[a-zA-Z ]*$/", $middle_name))
				{
					$_SESSION['error']['middle_name_err'] = $error_list['middle_name'];
					$error++;
				}
				else
				{
					$_SESSION['user_data']['middle_name'] = $middle_name;
				}
			}

			if (isset($input['last_name']))
			{
				$last_name = $this->test_input($input["last_name"]);

				// check for the letters and whitespace

				if (!preg_match("/^[a-zA-Z ]*$/", $last_name))
				{
					$_SESSION['error']['last_name_err'] = $error_list['last_name'];
					$error++;
				}
				else
				{
					$_SESSION['user_data']['last_name'] = $last_name;
				}
			}
			else
			{
				$_SESSION['error']['last_name_err'] = $error_space['last_name'];
				$error++;
			}

			if (isset($input["employer"]))
			{
				$employer = $this->test_input($input["employer"]);

				// checks for the presence of letter

				if (!preg_match("/^[a-zA-Z]*$/", $employer))
				{
					$_SESSION['error']['employer'] = $error_list['employer'];
					$error++;
				}
				else
				{
					$_SESSION['user_data']['employer'] = $employer;
				}
			}
			else
			{
				$_SESSION['error']['employer_name_err'] = $error_space['employer'];
				$error++;
			}

			if (empty($input['password']))
			{
				$_SESSION['error']['password_err'] = $error_space['password'];
			}

			// if(empty($input['email_id']))
			// {
			//     $_SESSION['error']['email_id_err'] = $error_space['email_id'];
			// }
			// else
			// {
			//     $email = test_input($input["email"]);
			//     if(!filter_var($email, FILTER_VALIDATE_EMAIL))
			//     {
			//         $_SESSION['error']['email_id_err'] = $error_list['email_id'];
			//         $error++;
			//     }
			// }

			if (isset($input["image"]))
			{
				$_SESSION['error']['image'] = $error_list['image'];
				$error++;
			}

			// if (isset($input["home_street"]))
			// {
			//     $home_street = test_input($input["home_street"]);
			//     // checks for the presence of letter
			//     if (!preg_match("/^[a-zA-Z]*$/", $home_street))
			//     {
			//         var_dump(preg_match("/^[a-zA-Z]*$/", $home_street));
			//         $_SESSION['error']['home_street_err'] = $error_list['home_street'];
			//         $error++;
			//     }
			// }
			// else
			// {
			//     $_SESSION['error']['home_street_err'] = $error_space['home_street'];
			// }

			if (isset($input["home_city"]))
			{
				$home_city = $this->test_input($input["home_city"]);

				// checks for the presence of letter

				if (!preg_match("/^[a-zA-Z]*$/", $home_city))
				{
					$_SESSION['error']['home_city_err'] = $error_list['home_city'];
					$error++;
				}
			}
			else
			{
				$_SESSION['error']['home_city_err'] = $error_space['home_city'];
			}


			if (empty($input["home_state"]))
			{
				$_SESSION['error']['home_state_err'] = $error_list['home_state'];
				$error++;
			}

			if (isset($input["home_zip"]))
			{
				$home_zip = $this->test_input($input["home_zip"]);

				// checks for the presence of letter

				if (!preg_match("/^[0-9]*$/", $home_zip))
				{
					$_SESSION['error']['home_zip_err'] = $error_list['home_zip'];
					$error++;
				}
			}
			else
			{
				$_SESSION['error']['home_zip_err'] = $error_space['home_zip'];
			}

			if (isset($input["home_mobile"]))
			{
				$home_mobile = $this->test_input($input["home_mobile"]);

				// checks for the presence of letter

				if (!preg_match("/^[0-9]*$/", $home_mobile))
				{
					$_SESSION['error']['home_mobile_err'] = $error_list['home_mobile'];
					$error++;
				}
			}
			else
			{
				$_SESSION['error']['home_mobile_err'] = $error_space['home_mobile'];
			}

			if (isset($input["home_landline"]))
			{
				$home_zip = $this->test_input($input["home_landline"]);

				// checks for the presence of letter

				if (!preg_match("/^[0-9]*$/", $home_zip))
				{
					$_SESSION['error']['home_landline_err'] = $error_list['home_landline'];
					$error++;
				}
			}
			else
			{
				$_SESSION['error']['home_landline_err'] = $error_space['home_landline'];
			}

			if (isset($input["home_fax"]))
			{
				$home_fax = $this->test_input($input["home_fax"]);

				// checks for the presence of letter

				if (!preg_match("/^[0-9]*$/", $home_fax))
				{
					$_SESSION['error']['home_fax_err'] = $error_list['home_fax'];
					$error++;
				}
			}
			else
			{
				$_SESSION['error']['home_fax_err'] = $error_space['home_fax'];
			}

			// validation of office table
			// if (isset($input["office_street"]))
			// {
			//     $office_street = test_input($input["office_street"]);
			//     // checks for the presence of letter
			//     if (!preg_match("/^[a-zA-Z]*$/", $office_street))
			//     {
			//         $_SESSION['error']['office_street_err'] = $error_list['office_street'];
			//         $error++;
			//     }
			// }
			// else
			// {
			//     $_SESSION['error']['office_street_err'] = $error_space['office_street'];
			// }

			if (isset($input["office_city"]))
			{
				$office_city = $this->test_input($input["office_city"]);

				// checks for the presence of letter

				if (!preg_match("/^[a-zA-Z]*$/", $office_city))
				{
					$_SESSION['error']['office_city_err'] = $error_list['office_city'];
					$error++;
				}
			}
			else
			{
				$_SESSION['error']['office_city_err'] = $error_space['office_city'];
			}

			if (empty($input["office_state"]))
			{
				$_SESSION['error']['office_state_err'] = $error_list['office_state'];
				$error++;
			}

			if (isset($input["office_zip"]))
			{
				$office_zip = $this->test_input($input["office_zip"]);

				// checks for the presence of letter

				if (!preg_match("/^[0-9]*$/", $office_zip))
				{
					$_SESSION['error']['office_zip'] = $error_list['office_zip'];
					$error++;
				}
			}
			else
			{
				$_SESSION['error']['office_zip_err'] = $error_space['office_zip'];
			}

			// if (isset($input["office_mobile"]))
			// {
			//     $office_mobile = test_input($input["office_mobile"]);
			//     // checks for the presence of letter
			//     if (!preg_match("/^[0-9]*$/", $office_mobile))
			//     {
			//         $_SESSION['error']['office_mobile_err'] = $error_list['office_mobile'];
			//         $error++;
			//     }
			// }
			// else
			// {
			//     $_SESSION['error']['office_mobile_err'] = $error_space['office_mobile'];
			// }

			if (isset($input["office_landline"]))
			{
				$office_landline = $this->test_input($input["office_landline"]);

				// checks for the presence of letter

				if (!preg_match("/^[0-9]*$/", $office_landline))
				{
					$_SESSION['error']['office_landline_err'] = $error_list['office_landline'];
					$error++;
				}
			}
			else
			{
				$_SESSION['error']['office_landline_err'] = $error_space['office_landline'];
			}

			if (isset($input["office_fax"]))
			{
				$office_fax = $this->test_input($input["office_fax"]);

				// checks for the presence of letter

				if (!preg_match("/^[0-9]*$/", $office_fax))
				{
					$_SESSION['error']['office_fax'] = $error_list['office_fax'];
					$error++;
				}
			}
			else
			{
				$_SESSION['error']['office_fax_err'] = $error_space['office_fax'];
			}

			if (empty($input["communication"]))
			{
				$_SESSION['error']['communication_err'] = $error_list['communication'];
				$error++;
			}

			return $error;
		}

		function test_input($data)
    	{
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
    	}
	}