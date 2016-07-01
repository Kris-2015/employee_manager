<?php

   ini_set("display_errors","1");
   session_start();
   include('connection.php');
   include('session_check.php');                                                                                                               
   $obj = new db_connection();
   $employee_id = 0;

   $checking_user = new session_check();
   $check = $checking_user->logged_in();

   //preventing the logged in user to access registration page
   if($check)
   {
      //if the condition is true, redirect the user to home page
      header("location:home.php");
   }
   

   if(isset($_POST['update']))
   {
      
      $error = $obj->validation($_POST);

      //$error = validation($_POST);
      if($error == 0)
      {
         session_unset($_SESSION['error']);

         $id = $_POST['hid_employeeId'];
         $input['input_data'] = $_POST;
         $obj->update($id,$input);
      }
       
   }
   else if(isset($_POST['submit']))
   {

      $error = $obj->validation($_POST);
      if($error == 0)
      {
         $input_arr['input_data'] = $_POST;
         $input_arr['file_data'] = $_FILES;
         $obj->insert($input_arr);
         session_unset($_SESSION['error']);
      }
      
   }

   if(isset($_GET['emp_id']) && $_GET['action'] == 'delete')
   {
      $id = $_GET['emp_id'];
      if($obj->delete($id))
      {
         
         header("location: /display.php");
      }
   }

   if(isset($_GET['emp_id']) && $_GET['action'] == 'update')
   {

      $employee_id = $_GET['emp_id'];

      $user_info = $obj->retrive_data($employee_id); 

   
      if(isset($user_info['home_street']) && !empty($user_info['home_street']))
      {
         $home_street = $user_info['home_street'];
      }
      else
      {
         $home_street = ' ';
      }

      if(isset($user_info['office_street']) && !empty($user_info['office_street']))
      {
         $office_street = $user_info['office_street'];

      }
      else
      {
         $office_street = ' ';
      }

      if(isset($user_info['city']) && !empty($user_info['city']))
      {
         $city = explode(',' , $user_info['city']);
         $home_city = $city[0];
         $office_city = $city[1];
      }
      else
      {
         $home_city = ' ';
         $office_city = ' ';
      }

      if(isset($user_info['state']) && !empty($user_info['state']))
      {
         $state = explode(',' , $user_info['state']);
         $home_state = $state[0];
         $office_state = $state[1];
      }
      else
      {
         $home_state = ' ';
         $office_state = ' ';
      }

      if(isset($user_info['zip']) && !empty($user_info['zip']))
      {
         $zip = explode(',' , $user_info['zip']);
         $home_zip = $zip[0];
         $office_zip = $zip[1];
      }
      else
      {
         $home_zip = ' ';
         $office_zip = ' ';
      }

      if(isset($user_info['mobile']) && !empty($user_info['mobile']))
      {
         $mobile = explode(',' , $user_info['mobile']);
         $home_mobile = $mobile[0];
         $office_mobile = $mobile[1];
      }
      else
      {
         $home_mobile = ' ';
         $office_mobile = ' ';
      }

      if(isset($user_info['landline']) && !empty($user_info['landline']))
      {
         $landline = explode(',' , $user_info['landline']);
         $home_landline = $landline[0];
         $office_landline = $landline[1];
      }
      else
      {
         $home_landline = ' ';
         $office_landline = ' ';
      }

      if(isset($user_info['fax']) && !empty($user_info['fax']))
      {
         $fax = explode(',' , $user_info['fax']);
         $home_fax = $fax[0];
         $office_fax = $fax[1];
      }
      else
      {
         $home_fax = ' ';
         $office_fax = ' ';
      }

      if(isset($user_info['communication']) && !empty($user_info['communication']))
      {
         $communication = explode(',' , $user_info['communication']);
         $comm_1 = isset($communication[0]) ? $communication[0] : ' ';
         $comm_2 = isset($communication[1]) ? $communication[1] : ' ';
         $comm_3 = isset($communication[2]) ? $communication[2] : ' ';
         $comm_4 = isset($communication[3]) ? $communication[3] : ' ';
      }
   }

   //if(isset($_POST['submit']))
?>
<!DOCTYPE html>
<html>
<head>
   <title>Registration</title>
   <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
   <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/imageUpload.css">
   <link rel="stylesheet" type="text/css" href="css/cover.css">
   <script language="javascript" src="js/image.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse">
   <div class="container-fluid">
      <div class="navbar-header">
         <a class="navbar-brand">EMPLOYEE SYSTEM</a>
      </div>
        <ul class="nav navbar-nav">
           <li>
              <a href="/display.php">DISPLAY</a>
           </li>
        </ul>
         <ul class="nav navbar-nav navbar-right">
           <li>
            <a href="/registration.php">
             <span class="glyphicon glyphicon-user"></span>Sign-up
            </a>
           </li>
           <li>
              <a href="/login.php">
                <span class="glyphicon glyphicon-user">
                </span>Login
              </a>
          </li>
        </ul>
   </div>
</nav>

<div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="well well-lg">
                  <form class="form-inline" id="regd_form" role="form" method="POST" action="registration.php"
                     enctype="multipart/form-data">
                     <h2>
                        <u>PERSONAL INFORMATION
                        </u>
                     </h2>
                     <input type="hidden" name="hid_employeeId" value="<?php echo $employee_id; ?>" >
                     <div class="form-group">
                        <label for="fname">First Name:
                        </label>
                        <input type="text" class="form-control" id="fname" name="first_name" 
                           value="<?php echo (isset($user_info['first_name']) ? $user_info['first_name'] : ''); ?><?php echo isset($_POST['first_name'])? $_POST['first_name'] : ' '; ?>" maxlenght="20"  required/>
                        <span class="error"> 
                            <?php echo "<br>";
                              echo isset( $_SESSION['error']['first_name_err'] ) ?  $_SESSION['error']['first_name_err']  : ' '; ?> 
                        </span>
                     </div>
                     <div class="form-group">
                        <label for="mname">Middle Name:
                        </label>
                        <input type="text" class="form-control" id="mname" name="middle_name"
                           value="<?php echo (isset($user_info['middle_name']) ? $user_info['middle_name'] : ''); ?><?php isset($_POST['middle_name'])? $_POST['middle_name'] : ' '; ?>" maxlenght="20"  /> 
                        <span class="error"> 
                          <?php echo "<br>";
                          echo isset($_SESSION['error']['middle_name_err'])? $_SESSION['error']['middle_name_err'] : ' '; 
                        ?> 
                        </span>  
                     </div>
                     <div class="form-group">
                        <label for="lname">Last Name:
                        </label>
                        <input type="text" class="form-control" id="lname" name="last_name" 
                           value="<?php echo (isset($user_info['last_name']) ? $user_info['last_name'] : ''); ?>" required maxlenght="20" />
                        <span class="error"> 
                        <?php echo "<br>";
                           echo isset($_SESSION['error']['last_name_err'])? $_SESSION['error']['last_name_err'] : '';
                           ?> 
                        </span>
                     </div>
                     <br />
                     <br />
                     <div class="form-group">
                        <label for="prefix" class="control-label col-lg-3">Prefix:
                        </label>
                        <div class="col-lg-8">
                           <label class="radio-inline">
                           <input type="radio" name="prefix"
                              <?php if (isset($user_info['prefix']) && $user_info['prefix']=="Mr"): ?>
                              checked
                              <?php endif ?>
                              value="Mr" checked="Mr  " />Mr
                           </label>
                           <label class="radio-inline">
                           <input type="radio" name="prefix" 
                              <?php if (isset($user_info['prefix']) && $user_info['prefix']=="Mrs"): ?>
                              checked
                              <?php endif ?>
                              value="Mrs"/>Mrs
                           </label>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="gender" class="control-label col-lg-3">Gender:
                        </label>
                        <div class="col-lg-8">
                           <label class="radio-inline">
                           <input type="radio" name="gender" value="Male"
                              checked="Male"
                              <?php if (isset($user_info['gender']) && $user_info['gender']=="Male"): ?>
                              checked
                              <?php endif ?>
                           />Male
                           </label>
                           <label class="radio-inline">
                           <input type="radio" name="gender"
                              <?php if(isset($user_info['gender']) && $user_info['gender']=="Female"): ?>
                              checked 
                              <?php endif ?>
                              value="Female"/>Female
                           </label>
                        </div>
                     </div>
                     <br />
                     <br />
                     <div class="form-group">
                        <label class="control-label col-lg-5" for="dob">Date of Birth:
                        </label>
                        <div class="col-lg-6">
                           <input type="date" id="dob" name="dob" class="form-control"
                              value="<?php 
                                 echo (isset($user_info['dob']) ? $user_info['dob'] : ''); ?>" required/> 
                        </div>
                     </div>
                     <br />
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="control-label col-lg-8" for="marital_status">Marital Status:
                              </label>
                           </div>
                           <label class="radio-inline">
                           <input type="radio" name="marital_status" value="Single" checked="Single"
                              <?php if(isset($user_info['marital_status']) && $user_info['marital_status']=="Single") echo 'checked';?>
                              />Single
                           </label>
                           <label class="radio-inline">
                           <input type="radio" name="marital_status" value="Married"
                              <?php if(isset($user_info['marital_status']) && $user_info['marital_status']=="Married") echo 'checked';?>
                              />Married
                           </label>
                        </div>
                     </div>
                     <br />
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="control-label col-lg-4" for="employment">Employment:
                              </label>
                              <div class="col-lg-8">
                                 <label class="radio-inline">
                                 <input type="radio" name="employment" checked="Employed"
                                    <?php if (isset($user_info['employment']) && $user_info['employment']=="Employed"): ?>
                                    checked
                                    <?php endif ?>
                                    value="Employed" />Employed
                                 </label>
                                 <label class="radio-inline">
                                 <input type="radio" name="employment"
                                    <?php if(isset($user_info['employment']) && $user_info['employment']=="Unemployed") echo 'checked';?>
                                    value="Unemployed" />Unemployed
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br />
                     <div class="form-group">
                        <label class="control-label col-lg-4" for="employer">Employer:
                        </label>
                        <div class="col-lg-8">
                           <input type="text" class="form-control" id="employer" name="employer" 
                              value="<?php echo (isset($user_info['employer']) ? $user_info['employer'] : ''); ?>" required maxlenght="20" />
                           <span class="error"> 
                           <?php echo "<br>";
                              echo isset($_SESSION['employer_err'])? $_SESSION['employer_err'] : ''; 
                              ?> 
                           </span>
                        </div>
                     </div>
                     <br>
                     <br>
                     <div class="form-group">
                     <label class="control-label col-lg-4" for="email" >Email id:</label>
                        <div class="col-lg-8">
                           <input type="text" class="form-control" id="email" name="email" required value="<?php echo (isset($user_info['email_id']) ? $user_info['email_id'] : '') ?>" placeholder="xyz@mail.com">
                        </div>
                        <span class="error">
                           <?php echo isset($_SESSION['error']['email_id_err'])? $_SESSION['error']['email_id_err'] : ''; ?>
                        </span>
                     </div>

                     <br />
                     <br />

                      <div class="form-group">
                     <label class="control-label col-lg-4" for="password">Password:</label>
                        <div class="col-lg-8">
                           <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <span class="error">
                           <?php echo isset($_SESSION['error']['password_err'])? $_SESSION['error']['password_err'] : ''; ?>
                        </span>
                     </div>
                     <br />
                     <br />
                     <div class="form-group">
                     <label class="control-label col-lg-4" for="confirm_password">Confirm Password:</label>
                        <div class="col-lg-8">
                           <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                        </div>
                     </div>
                     <!-- Image Upload -->
                     
                     <br>
                     <br>
                     <div class="form-group">
                        <label class="control-label col-xs-3">Image Upload:
                        </label>
                        <div class="col-xs-9">
                           <div class="input-group image-preview">
                              <input type="text" class="form-control image-preview-filename" value="" disabled="disabled" required >
                              <span class="input-group-btn">
                                  <!-- Image preview-clear button --> 
                                 <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                 <span class="glyphicon glyphicon-remove">
                                 </span>Clear
                                 </button>
                                  <!-- image-preview-input -->     
                                <div class="btn btn-default image-preview-input">
                                    <span class="glyphicon glyphicon-folder-open">
                                    </span>
                                    <span class="image-preview-input-title">Browse
                                    </span>
                                    <input type="file" name="image" accept="image/jpg, image/png, image/jpeg, image/gif"  />
                                 </div>
                              </span>
                           </div>
                        </div>
                        <span class="error">

                        </span>
                     </div>
                     

                     <!-- Image Upload task ends -->
                     <br />
                     <hr class="hr" />
                     <div class="row">
                        <div class="col-lg-6">
                           <h2>
                              <u>RESIDENCE ADDRESS
                              </u>
                           </h2>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_street">Street:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_street" name="home_street" value="<?php echo (isset($home_street) ? $home_street : ''); ?>" required maxlength="50" >
                                 <span class="error"> 
                                 <?php echo "<br>";
                                  echo isset($_SESSION['error']['home_street_err'])?  $_SESSION['error']['home_street_err'] : '';
                                 ?> 
                                 </span>           
                              </div>
                           </div>
                           <br>
                           <br> 
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_city">City:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_city" name="home_city" value="<?php echo (isset($home_city) ? $home_city : ''); ?>" required maxlength="20">
                                 <span class="error"> 
                                 <?php echo "<br>";
                                     echo isset($_SESSION['error']['home_city_err'])?  $_SESSION['error']['home_city_err'] : ''; 
                                 ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_state">State:
                              </label>
                              <div class="col-xs-8">
                                 <select class="form-control" id="home_state" name="home_state">
                                    <option value="">Select State
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Andaman and Nicobar Islands') echo 'selected'; ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Andhra Pradesh') echo 'selected'; ?> value="Andhra Pradesh">Andhra Pradesh
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Arunachal Pradesh') echo 'selected'; ?> value="Arunachal Pradesh">Arunachal Pradesh
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Assam') echo 'selected'; ?> value="Assam">Assam
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Bihar') echo 'selected'; ?> value="Bihar">Bihar
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Chandigarh') echo 'selected'; ?> value="Chandigarh">Chandigarh
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Chhattisgarh') echo 'selected'; ?> value="Chhattisgarh">Chhattisgarh
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Dadra and Nagar Haveli') echo 'selected'; ?> value="Dadra and Nagar Haveli">Dadra and Nagar Haveli
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Daman and Diu') echo 'selected'; ?> value="Daman and Diu">Daman and Diu
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Delhi') echo 'selected'; ?> value="Delhi">Delhi
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Goa') echo 'selected'; ?>  value="Goa">Goa
                                    </option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Gujarat') echo 'selected'; ?> value="Gujarat">Gujarat</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Haryana') echo 'selected'; ?> value="Haryana">Haryana</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Himachal Pradesh') echo 'selected'; ?> value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Jammu and Kashmir') echo 'selected'; ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Jharkhand') echo 'selected'; ?> value="Jharkhand">Jharkhand</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Karnataka') echo 'selected'; ?> value="Karnataka">Karnataka</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Kerala') echo 'selected'; ?> value="Kerala">Kerala</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Lakshadweep') echo 'selected'; ?> value="Lakshadweep">Lakshadweep</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Madhya Pradesh') echo 'selected'; ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Maharashtra') echo 'selected'; ?> value="Maharashtra">Maharashtra</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Manipur') echo 'selected'; ?> value="Manipur">Manipur</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Meghalaya') echo 'selected'; ?> value="Meghalaya">Meghalaya</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Mizoram') echo 'selected'; ?> value="Mizoram">Mizoram</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Nagaland') echo 'selected'; ?> value="Nagaland">Nagaland</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Orissa') echo 'selected'; ?> value="Orissa">Orissa</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Pondicherry') echo 'selected'; ?> value="Pondicherry">Pondicherry</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Punjab') echo 'selected'; ?> value="Punjab">Punjab</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Rajasthan') echo 'selected'; ?> value="Rajasthan">Rajasthan</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Sikkim') echo 'selected'; ?> value="Sikkim">Sikkim</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Tamil Nadu') echo 'selected'; ?> value="Tamil Nadu">Tamil Nadu</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Telangana') echo 'selected'; ?> value="Telangana">Telangana</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Tripura') echo 'selected'; ?> value="Tripura">Tripura</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Uttar Pradesh') echo 'selected'; ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='Uttarakhand') echo 'selected'; ?> value="Uttarakhand">Uttarakhand</option>
                                    <option 
                                       <?php if(isset($home_state) && $home_state=='West Bengal') echo 'selected'; ?> value="West Bengal">West Bengal</option>
                                 </select>
                                 <span class="error"> 
                                 <?php echo "<br>";
                                     echo isset($_SESSION['error']['home_state_err'])?  $_SESSION['error']['home_state_err'] : '';
                                  ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_zip">Zip:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" id="home_zip" name="home_zip" class="form-control" value="<?php echo (isset($home_zip) ? $home_zip : ''); ?>" required maxlenght>
                                 <span class="error"> 
                                 <?php echo "<br>";
                                   echo isset($_SESSION['error']['home_zip_err'])?  $_SESSION['error']['home_zip_err'] : ''; 
                                  ?>
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_mobile">Mobile:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_mobile" name="home_mobile" value="<?php echo (isset($home_mobile) ? $home_mobile : ''); ?>" required  maxlength="10">
                                 <span class="error"> 
                                 <?php echo "<br>";
                                   echo isset($_SESSION['error']['home_mobile_err'])?  $_SESSION['error']['home_mobile_err'] : ''; 
                                  ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_landline">Landline:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_landline" name="home_landline" value="<?php echo (isset($home_landline) ? $home_landline : ''); ?>" maxlength="10">
                                 <span class="error"> 
                                 <?php echo "<br>";
                                    echo isset($_SESSION['error']['home_landline_err'])?  $_SESSION['error']['home_landline_err'] : '';
                                  ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_fax">Fax:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_fax" name="home_fax" value="<?php echo (isset($home_fax) ? $home_fax : ''); ?>" maxlength="10">
                                 <span class="error"> 
                                 <?php echo "<br>";
                                    echo isset($_SESSION['error']['home_fax_err'])?  $_SESSION['error']['home_fax_err'] : '';
                                 ?> 
                                 </span>
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <h2>
                              <u>OFFICE ADDRESS
                              </u>
                           </h2>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_street">Street:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_street" name="office_street" value="<?php echo (isset($office_street) ? $office_street : ''); ?>" required maxlength="50">
                                 <span class="error"> 
                                 <?php echo "<br>";
                                    echo isset($_SESSION['error']['office_street_err'])?  $_SESSION['error']['office_street_err'] : '';
                                 ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_city">City:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_city" name="office_city" value="<?php echo (isset($office_city) ? $office_city : ''); ?>" required malength="20">
                                 <span class="error"> 
                                 <?php echo "<br>";
                                    echo isset($_SESSION['error']['office_city_err'])?  $_SESSION['error']['office_city_err'] : '';
                                  ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_state">State:
                              </label>
                              <div class="col-xs-8">
                                 <select class="form-control" id="office_state" name="office_state">
                                    <option value="">Select State
                                    </option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Andaman and Nicobar Islands') echo 'selected'; ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands
                                    </option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Andhra Pradesh') echo 'selected'; ?> value="Andhra Pradesh">Andhra Pradesh
                                    </option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Arunachal Pradesh') echo 'selected'; ?> value="Arunachal Pradesh">Arunachal Pradesh
                                    </option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Assam') echo 'selected'; ?> value="Assam">Assam
                                    </option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Bihar') echo 'selected'; ?> value="Bihar">Bihar</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Chandigarh') echo 'selected'; ?> value="Chandigarh">Chandigarh</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Chhattisgarh') echo 'selected'; ?> value="Chhattisgarh">Chhattisgarh</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Dadra and Nagar Haveli') echo 'selected'; ?> value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Daman and Diu') echo 'selected'; ?> value="Daman and Diu">Daman and Diu</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Delhi') echo 'selected'; ?> value="Delhi">Delhi</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Goa') echo 'selected'; ?>  value="Goa">Goa</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Gujarat') echo 'selected'; ?> value="Gujarat">Gujarat</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Haryana') echo 'selected'; ?> value="Haryana">Haryana</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Himachal Pradesh') echo 'selected'; ?> value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Jammu and Kashmir') echo 'selected'; ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Jharkhand') echo 'selected'; ?> value="Jharkhand">Jharkhand</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Karnataka') echo 'selected'; ?> value="Karnataka">Karnataka</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Kerala') echo 'selected'; ?> value="Kerala">Kerala</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Lakshadweep') echo 'selected'; ?> value="Lakshadweep">Lakshadweep</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Madhya Pradesh') echo 'selected'; ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Maharashtra') echo 'selected'; ?> value="Maharashtra">Maharashtra</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Manipur') echo 'selected'; ?> value="Manipur">Manipur</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Meghalaya') echo 'selected'; ?> value="Meghalaya">Meghalaya</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Mizoram') echo 'selected'; ?> value="Mizoram">Mizoram</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Nagaland') echo 'selected'; ?> value="Nagaland">Nagaland</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Orissa') echo 'selected'; ?> value="Orissa">Orissa</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Pondicherry') echo 'selected'; ?> value="Pondicherry">Pondicherry</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Punjab') echo 'selected'; ?> value="Punjab">Punjab</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Rajasthan') echo 'selected'; ?> value="Rajasthan">Rajasthan</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Sikkim') echo 'selected'; ?> value="Sikkim">Sikkim</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Tamil Nadu') echo 'selected'; ?> value="Tamil Nadu">Tamil Nadu</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Telangana') echo 'selected'; ?> value="Telangana">Telangana</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Tripura') echo 'selected'; ?> value="Tripura">Tripura</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Uttar Pradesh') echo 'selected'; ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='Uttarakhand') echo 'selected'; ?> value="Uttarakhand">Uttarakhand</option>
                                    <option 
                                       <?php if(isset($office_state) && $office_state=='West Bengal') echo 'selected'; ?> value="West Bengal">West Bengal</option>
                                 </select>
                                 <span class="error"> 
                                 <?php echo "<br>";
                                    echo isset($_SESSION['error']['office_state_err'])?  $_SESSION['error']['office_state_err'] : '';
                                 ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_zip">Zip:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_zip" name="office_zip" value="<?php echo (isset($office_zip) ? $office_zip : ''); ?>" required maxlength="10">
                                 <span class="error"> 
                                 <?php echo "<br>";
                                    echo isset($_SESSION['error']['office_zip_err'])?  $_SESSION['error']['office_zip_err'] : '';
                                 ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_mob">Mobile:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_mob" name="office_mob" value="<?php echo (isset($office_mobile) ? $office_mobile : ''); ?>" required maxlength="10">
                                 <span class="error"> 
                                 <?php echo "<br>";
                                    echo isset($_SESSION['error']['office_mobile_err'])?  $_SESSION['error']['office_mobile_err'] : '';
                                 ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_landline">Landline:
                              </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_landline" name="office_landline" value="<?php echo (isset($office_landline) ? $office_landline : ''); ?>" maxlength="10">
                                 <span class="error"> 
                                 <?php echo "<br>";
                                    echo isset($_SESSION['error']['office_landline_err'])?  $_SESSION['error']['office_landline_err'] : '';
                                  ?> 
                                 </span>
                              </div>
                           </div>
                           <br>
                           <br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_fax">Fax:
                          </label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_fax" name="office_fax" value="<?php echo (isset($office_fax) ? $office_fax : ''); ?>" maxlength="10" >
                                 <span class="error"> 
                                 <?php echo "<br>";
                                  echo isset($_SESSION['error']['office_fax_err'])?  $_SESSION['error']['office_fax_err'] : '';
                                 ?> 
                                 </span>
                              </div>
                           </div>
                        </div>
                        <!--  end of row -->
                     </div>
                     <hr class="hr" />
                     <h2>
                        <u>OTHER DETAILS:
                        </u>
                     </h2>
                     <br />
                     <div class="form-group">
                        <label class="control-label col-lg-3" for="comm">Preferred Communication:
                        </label>
                        <div class="col-lg-9">
                           <label class="checkbox-inline">
                           <input type="checkbox" name="communication[]" value="mobile" 
                              <?php if(isset($comm_1)&&$comm_1=="mobile") echo "checked"; ?> />Mobile
                           </label>
                           <label class="checkbox-inline">
                           <input type="checkbox" name="communication[]" value="sms"  
                              <?php if(isset($comm_2)&&$comm_2=="sms") echo "checked"; ?>/>SMS
                           </label>
                           <label class="checkbox-inline">
                           <input type="checkbox" name="communication[]" value="email" 
                              <?php if(isset($comm_3)&&$comm_3=="email") echo "checked"; ?>/>Email
                           </label>
                           <label class="checkbox-inline">
                           <input type="checkbox" name="communication[]" value="other" 
                              <?php if(isset($comm_4)&&$comm_4=="other") echo "checked"; ?> />Other
                           </label>
                        </div>
                        <span class="error"> 
                        <?php echo "<br>";
                          echo isset($_SESSION['error']['communication_err'])?  $_SESSION['error']['communication_err'] : '';
                        ?> 
                        </span>
                     </div>
               </div>
               <div class="form-group" style="position:relative; left:35%;">
               <div class="col-lg-12">
               <!-- <input type="submit" name="submit" value=
                  <?php
                    /* if(isset($_GET['action']) && $_GET['action']=='update')
                     {
                     echo 'update';
                     }
                     else
                     {
                     echo 'REGISTER';
                     }*/
                     ?> class="btn btn-lg btn-info">
               <button type="reset" class="btn btn-lg btn-danger">Cancel
               </button> -->

               <?php
                  if(isset($_GET['action']) && $_GET['action']=='update')
                  {
                    echo  "<input type = 'submit' name = 'update' value = 'update' class = 'btn btn-lg btn-info'>
                           <input type = 'reset'  class = 'btn btn-lg btn-danger>' ";
                  }
                  else
                  {
                     echo  "<input type = 'submit' name = 'submit' value = 'REGISTER' class = 'btn btn-lg btn-info'>
                            <input type = 'reset'  class = 'btn btn-lg btn-danger>' ";  
                  }
               ?>
               </div>
               </div>
               </form>
            </div>
         </div>
      </div>
      </div>
</body>
</html>