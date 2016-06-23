<?php
/*
* @author : mfsi_krishnadev
* @param  : String
* @return : integer
*/
session_start();

function test_input($data)
{
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
}

$first_name = $middle_name = $last_name = $employer = $home_street = $home_city = $home_state = $home_zip = $home_mobile = $home_landline = $home_fax = $office_street = $office_city = $office_state = $office_zip = $office_mobile = $office_landline = $office_fax = $communication = '';

$first_name_err = $middle_name_err = $last_name_err = $employer_err = $home_street_err = $home_city_err = $home_state_err = $home_zip_err = $home_mobile_err = $home_landline_err = $home_fax_err = $office_street_err = $office_city_err = $office_state_err = $office_zip_err = $office_mobile_err = $office_landline_err = $office_fax_err = $communication_err = '';

 

function validation($input)
{
       /* echo "<pre>";
        print_r($input);
        exit;*/
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
 
         $error = 0;

        if (isset($input["first_name"]))
                {
                        $first_name = test_input($input["first_name"]);

                        // check for the letters and whitespace

                        if (!preg_match("/^[a-zA-Z ]*$/", $first_name))
                        {  
                             $_SESSION['first_name_err'] = $error_list['first_name'];   
                             $error++;
                        }
                        
                }

                if (isset($input["middle_name"]))
                {
                        $middle_name = test_input($input["middle_name"]);

                        // check for the letters and whitespace

                        if (!preg_match("/^[a-zA-Z ]*$/", $middle_name))
                        {
                                $_SESSION['middle_name_err'] = $error_list['middle_name'];
                                $error++;
                        }
                }

                if (isset($input["last_name"]))
                {
                        $last_name = test_input($input["last_name"]);

                        // check for the letters and whitespace

                        if (!preg_match("/^[a-zA-Z ]*$/", $last_name))
                        {
                                $_SESSION['last_name_err'] = $error_list['last_name'];
                                $error++;
                        }
                }

                if (isset($input["employer"]))
                {
                        $employer = test_input($input["employer"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[a-zA-Z]*$/", $employer))
                        {
                                $_SESSION['employer'] = $error_list['employer'];
                                $error++;
                        }
                }

                if(isset($input["image"]))
                {
                    $_SESSION['image'] = $error_list['image'];
                    $error = 1;
                }

                if (isset($input["home_street"]))
                {
                        $home_street = test_input($input["home_street"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[a-zA-Z]*$/", $home_street))
                        {
                            $_SESSION['home_street_err'] = $error_list['home_street'];
                            $error++;
                        }
                }

                if (isset($input["home_city"]))
                {
                        $home_city = test_input($input["home_city"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[a-zA-Z]*$/", $home_city))
                        {
                            $_SESSION['home_city_err'] = $error_list['home_city'];
                            $error++;
                        }
                }

                if (empty($input["home_state"]))
                {
                    $_SESSION['home_state_err'] = $error_list['home_state'];
                    $error++;
                }

                if (isset($input["home_zip"]))
                {
                        $home_zip = test_input($input["home_zip"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[0-9]*$/", $home_zip))
                        {
                                $_SESSION['home_zip_err'] = $error_list['home_zip'];
                                $error++;
                        }
                }

                if (isset($input["home_mobile"]))
                {
                        $home_mobile = test_input($input["home_mobile"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[0-9]*$/", $home_mobile))
                        {
                                $_SESSION['home_mobile_err'] = $error_list['home_mobile'];
                                $error++;
                        }
                }

                if (isset($input["home_landline"]))
                {
                        $home_zip = test_input($input["home_landline"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[0-9]*$/", $home_zip))
                        {
                                $_SESSION['home_landline_err'] = $error_list['home_landline'];
                                $error++;
                        }
                }

                if (isset($input["home_fax"]))
                {
                        $home_fax = test_input($input["home_fax"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[0-9]*$/", $home_fax))
                        {
                            $_SESSION['home_fax_err'] = $error_list['home_fax'];
                            $error++;
                        }
                }

                // validation of office table

                if (isset($input["office_street"]))
                {
                        $office_street = test_input($input["office_street"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[a-zA-Z]*$/", $office_street))
                        {
                            $_SESSION['office_street_err'] = $error_list['office_street'];
                            $error++;
                        }
                }

                if (isset($input["office_city"]))
                {
                        $office_city = test_input($input["office_city"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[a-zA-Z]*$/", $office_city))
                        {
                            $_SESSION['office_city_err'] = $error_list['office_city'];
                            $error++;
                        }
                }

                if (empty($input["office_state"]))
                {
                        $_SESSION['office_state_err'] = $error_list['office_state'];
                        $error++;
                }

                if (isset($input["office_zip"]))
                {
                        $office_zip = test_input($input["office_zip"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[0-9]*$/", $office_zip))
                        {
                                $_SESSION['office_zip'] = $error_list['office_zip'];
                                $error++;
                        }
                }

                if (isset($input["office_mobile"]))
                {
                        $office_zip = test_input($input["office_mobile"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[0-9]*$/", $office_zip))
                        {
                                $_SESSION['office_mobile_err'] = $error_list['office_mobile'];
                                $error++;
                        }
                }

                if (isset($input["office_landline"]))
                {
                        $office_landline = test_input($input["office_landline"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[0-9]*$/", $office_landline))
                        {
                                $_SESSION['office_landline_err'] = $error_list['office_landline'];
                                $error++;
                        }
                }

                if (isset($input["office_fax"]))
                {
                        $office_fax = test_input($input["office_fax"]);

                        // checks for the presence of letter

                        if (!preg_match("/^[0-9]*$/", $office_fax))
                        {
                                $_SESSION['office_fax'] = $error_list['office_fax'];
                                $error++;
                        }
                }

                // validation of communication db2_tables(connection)

                if (empty($input["communication"]))
                {
                        $_SESSION['communication_err'] = $error_list['communication'];
                        $error++;
                }

        return $error;

}
?>