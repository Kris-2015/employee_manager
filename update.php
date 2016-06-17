<?php
/*
 *Author: mfsi_krishnadev
 *category: editing information
 *importing files: db_conn db connection
*/
include('db_conn.php');
include('insert.php');

$user_data = array();

if (isset($_GET['emp_id']) && !empty($_GET['emp_id']))
 {
	$employee_id = $_GET['emp_id'];

   //fetching all the information of the employee
	$update_employee = " UPDATE employee
                         SET first_name = '$first_name',
                             middle_name = '$middle_name',
                             last_name = '$last_name',
                             prefix = '$prefix',
                             gender = '$gender',
                             dob = '$dob',
                             marital_status = '$marital_status',
                             employment = '$employment',
                             employer = '$employer',
                             image = '$image'
                         WHERE employee.id = emp_id ";

        $emp_result = mysqli_query($conn,$update_employee);

        $update_residence = "UPDATE employee e
            LEFT JOIN addess addr ON e.id=addr.employee_id 
            SET street = '$home_street',
                city   = '$home_city',
                state  = '$home_state',
                zip    = '$home_zip',
                mobile = '$home_mobile',
                landline = '$home_landline',
                fax = '$home_fax'
            WHERE addr.employee_id='emp_id' AND type='residence'";

         $residence_result = mysqli_query($conn,$update_residence);

         $update_office = "UPDATE employee e
            LEFT JOIN addess addr ON e.id=addr.employee_id 
            SET street = '$office_street',
                city   = '$office_city',
                state  = '$office_state',
                zip    = '$office_zip',
                mobile = '$office_mobile',
                landline = '$office_landline',
                fax = '$office_fax'
            WHERE addr.employee_id='emp_id' AND type='office'";

         $office_result = mysqli_query($conn,$update_office);

         $update_communication = "UPDATE employee e
            LEFT JOIN communication comm ON e.id = comm.employee_id
            SET type='sms,phone'
            WHERE comm.employee_id='emp_id' ;"

         $comm_result = mysqli_query($conn,$update_comm);
  }

  mysqli_close($conn);

?>