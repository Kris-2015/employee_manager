<?php
/*
 *Author  : mfsi_krishadev
 *purpose : Variable declaration and insertion of records.
 *category: insertion
*/

include('db_conn.php');
include('image_upload.php');

/*
 *@access public
 *@datatype
 *@return dataType
*/
if(isset($_POST['submit'])) 
{
   $error=0;

    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchar($data);
        return data;
    }
    // variable declaration and validation
    $first_name = validate($_POST["first_name"]);
    if(!preg_match("/^[a-zA-Z ]*$/",$first_name))
    {
        $first_name_err="Only letters and white space allowed.";
        $error++;
    }
    
    $middle_name = validate($_POST["middle_name"]);
    if(!preg_match("/^[a-zA-Z ]*$/",$middle_name))
    {
        $middle_name_err="Only letters and white space allowed.";
        $error++;
    }
    
    $last_name = validate($_POST["last_name"]);
    if(!preg_match("/^[a-zA-Z ]*$/",$last_name))
    {
        $last_name_err="Only letters and white space allowed.";
        $error++;
    }
    
    $prefix = validate($_POST["prefix"]);
    
    $dob = validate($_POST["dob"]);
    
    $gender = validate($_POST["gender"]);
    
    $marital_status = validate($_POST["marital_status"]);
    
    $employer = validate($_POST["employer"]);
    if(!preg_match("/^[a-zA-Z ]*$/",$employer))
    {
        $employer_err="Only letters and white space allowed.";
        $error++;
    }
    
    $employment = validate($_POST["employment"]);
    
    $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';
    
    $home_street = validate($_POST["home_street"]);
    
    $home_city = validate($_POST["home_city"]);
    if(!preg_match("/^[a-zA-Z ]*$/",$home_city))
    {
        $home_city_err="Only letters and white space allowed.";
        $error++;
    }
    
    $home_state = validate($_POST["home_state"]);
    
    $home_zip = validate($_POST["home_zip"]);
    /*if (!preg_match("/^[0-9]*$/",$home_zip))
    {
        $home_zip_err = "Only numbers are allowed";
        $error++;
    }
    if(!empty($home_zip) && strlen($home_zip) != 6)
    {
        $home_zip_err = "zip number should be 6 digits"
    }*/
    
    $home_mobile = validate($_POST["home_mobile"]);
    if(!preg_match("/^[0-9]*$/",$home_mobile))
    {
        $home_mobile_err = "Only numbers are allowed";
        $error++;
    }
    if(!empty($home_mobile) && strlen($home_mobile) != 10)
    {
        $home_mobile_err = "zip number should be 10 digits"
    }
    
    $home_landline = validate($_POST["home_landline"]);
    if(!preg_match("/^[0-9]*$/",$home_landline))
    {
        $home_landline_err = "Only numbers are allowed";
        $error++;
    }

    $home_fax = validate($_POST["home_fax"]);
    
    $office_street = validate($_POST["office_street"]);
    
    $office_city = validate($_POST["office_city"]);
    if(!preg_match("/^[a-zA-Z ]*$/",$office_city))
    {
        $office_city_err="Only letters and white space allowed";
        $error++;
    }
    
    $office_state = validate($_POST["office_state"]);
    
    $office_zip = validate($_POST["office_zip"]);
    if(!preg_match("/^[0-9]*$/",$office_zip))
    {
        $office_zip_err = "Only numbers are allowed";
        $error++;
    }
    if(!empty($office_zip) && strlen($office_zip) != 6)
    {
        $office_zip_err = "zip number should be 6 digits"
        $error++;
    }
    
    $office_mobile = validate($_POST["office_mobile"]);
    if(!preg_match("/^[0-9]*$/",$office_mobile))
    {
        $office_mobile_err = "Only numbers are allowed";
        $error++;
    }
    if(!empty($office_mobile) && strlen($office_mobile) != 10)
    {
        $office_mobile_err = "zip number should be 10 digits"
        $error++;
    }
    
    $office_landline = validate($_POST["office_landline"]);
    if(!preg_match("/^[0-9]*$/",$office_landline))
    {
        $office_landline_err = "Only numbers are allowed";
        $error++;
    }
    
    $office_fax = validate($_POST["office_fax"]);
    
    $communication = implode(',', $_POST['communication']);

    //Calling image upload function
    imageUpload($_FILES);
    
    //Insert operation in employee table
    $employee = "INSERT INTO employee(first_name, middle_name, last_name, prefix, dob, gender, marital_status, employer, employment, image) VALUES('$first_name' , '$middle_name' , '$last_name' , '$prefix' , '$dob' , '$gender' , '$marital_status' , '$employer' , '$employment' , '$image');";
    

    $result = mysqli_query($conn, $employee);
    
    if (TRUE === $result)
    {
        $employee_id = mysqli_insert_id($conn);
        
        
        $address = "INSERT INTO address(employee_id,type, street, city, state, zip, mobile, landline, fax) VALUES('$employee_id' ,'residence', '$home_street' , '$home_city' , '$home_state' , '$home_zip' , '$home_mobile' , '$home_landline' , '$home_fax'),('$employee_id' ,'office', '$office_street' , '$office_city' , '$office_state' , '$office_zip' , '$office_mobile' , '$office_landline' , '$office_fax');";
        
        $result = mysqli_query($conn, $address);
        
        $communication = "INSERT INTO communication(employee_id,type) VALUES('$employee_id','$communication')";
        
        $result = mysqli_query($conn, $communication);

    }
    else
    {
        echo "Error while insertion";
    }
}    


//mysqli_close($conn);
?>