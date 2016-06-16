<?php
	/*
	 *@access public
	 *@param employee_id
	 *@return delete operation
	*/

	//including the db_connection file
	include('db_conn.php');

	//Deleting the data from the database
	$employee_id = $_GET['emp_id'];

	//performing the delete operation
	$query = "DELETE employee, address, communication FROM employee
			  INNER JOIN  address ON employee.id = address.employee_id
			  LEFT JOIN  communication ON employee.id = address.employee_id
			  WHERE employee.id=$employee_id";

    $result = mysqli_query($conn, $query);


    //checking the working of delete operation
    if(TRUE === $result)
    {
    	header('Location:display.php');
    }
    else
    {
    	echo "<script>alert('error occured while deletion');</script>";
    	header('Location:display.php');
    }
?>