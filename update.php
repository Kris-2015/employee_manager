<?php
/*
*Author: mfsi_krishnadev
*category: editing information
*importing files: db_conn db connection
*/
include ('db_conn.php');

include ('image_upload.php');

include ('test_validation.php');

// include('insert.php');

$user_data = array();

if (isset($_POST) && !empty($_POST))
{
    echo "<pre>";
    print_r($_POST);
    exit;
    $error = validation($_POST);

    if (!$error)
    {
        $employee_id = $_POST['hid_employeeId'];
        $first_name = isset($_POST['first_name']) ? $_POST['first_name'] : '';
        $middle_name = isset($_POST['middle_name']) ? $_POST['middle_name'] : '';
        $last_name = isset($_POST['last_name']) ? $_POST['last_name'] : '';
        $prefix = isset($_POST['prefix']) ? $_POST['prefix'] : '';
        $dob = isset($_POST['dob']) ? $_POST['dob'] : '';
        $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
        $marital_status = isset($_POST['marital_status']) ? $_POST['marital_status'] : '';
        $employer = isset($_POST['employer']) ? $_POST['employer'] : '';
        $employment = isset($_POST['employment']) ? $_POST['employment'] : '';
        $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
        $home_street = isset($_POST['home_street']) ? $_POST['home_street'] : '';
        $home_city = isset($_POST['home_city']) ? $_POST['home_city'] : '';
        $home_state = isset($_POST['home_state']) ? $_POST['home_state'] : '';
        $home_zip = isset($_POST['home_zip']) ? $_POST['home_zip'] : '';
        $home_mobile = isset($_POST['home_mobile']) ? $_POST['home_mobile'] : '';
        $home_landline = isset($_POST['home_landline']) ? $_POST['home_landline'] : '';
        $home_fax = isset($_POST['home_fax']) ? $_POST['home_fax'] : '';
        $office_street = isset($_POST['office_street']) ? $_POST['office_street'] : '';
        $office_city = isset($_POST['office_city']) ? $_POST['office_city'] : '';
        $office_state = isset($_POST['office_state']) ? $_POST['office_state'] : '';
        $office_zip = isset($_POST['office_zip']) ? $_POST['office_zip'] : '';
        $office_mobile = isset($_POST['office_mobile']) ? $_POST['office_mobile'] : '';
        $office_landline = isset($_POST['office_landline']) ? $_POST['office_landline'] : '';
        $office_fax = isset($_POST['office_fax']) ? $_POST['office_fax'] : '';
        $communication = implode(',', $_POST['communication']);

        // Calling image upload function

        imageUpload($_FILES);

        // fetching all the information of the employee

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
                    WHERE employee.id = $employee_id";
        $emp_result = mysqli_query($conn, $update_employee);
        $update_residence = "UPDATE employee e
                LEFT JOIN addess addr ON e.id=addr.employee_id 
                SET street = '$home_street',
                    city   = '$home_city',
                    state  = '$home_state',
                    zip    = '$home_zip',
                    mobile = '$home_mobile',
                    landline = '$home_landline',
                    fax = '$home_fax'
                WHERE addr.employee_id=$employee_id AND type='residence'";
        $residence_result = mysqli_query($conn, $update_residence);
        $update_office = "UPDATE employee e
                    LEFT JOIN addess addr ON e.id=addr.employee_id 
                    SET street = '$office_street',
                        city   = '$office_city',
                        state  = '$office_state',
                        zip    = '$office_zip',
                        mobile = '$office_mobile',
                        landline = '$office_landline',
                        fax = '$office_fax'
                    WHERE addr.employee_id=$employee_id AND type='office'";
        $office_result = mysqli_query($conn, $update_office);
        $update_communication = "UPDATE employee e
                    LEFT JOIN communication comm ON e.id = comm.employee_id
                    SET type = 'sms,phone'
                    WHERE comm.employee_id=$employee_id";
        $comm_result = mysqli_query($conn, $update_communication);
        header("location:display.php");
    }
    else
    {
        if (isset($_POST['hid_employeeId']))
        {
            header("location:registration.php/?&emp_id=" . $_POST['hid_employeeId'] . "&&userAction=update");    
        }
        else
        {
            header("location:error.php");
        }
    }
}
else
{
    echo "<script>alert('You should not be coming here directly.');</script>";
}

mysqli_close($conn);
?>