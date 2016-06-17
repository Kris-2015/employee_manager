<?php
ini_set('display_errors', '1');
$user_info = array();

if (isset($_GET['emp_id']) && ! empty($_GET['emp_id'])) 
{
   include('db_conn.php');

   $user_data = array();

   $employee_id = $_GET['emp_id'];

   //fetching all the information of the employee
   $select_employee = "SELECT emp.*, GROUP_CONCAT(addr.type) AS type,
       GROUP_CONCAT(addr.city) AS city,
       GROUP_CONCAT(addr.street) AS street,
       GROUP_CONCAT(addr.state) AS state,
       GROUP_CONCAT(addr.zip) AS zip,
       GROUP_CONCAT(addr.mobile) AS mobile,
       GROUP_CONCAT(addr.landline) AS landline,
       GROUP_CONCAT(addr.fax) AS fax,
       GROUP_CONCAT(comm.type) AS type
       FROM employee emp
       INNER JOIN address addr ON emp.id = addr.employee_id
       LEFT JOIN communication comm ON emp.id = comm.employee_id
       WHERE emp.id = $employee_id
       GROUP BY emp.id";

   $result = mysqli_query($conn, $select_employee);


   if (mysqli_num_rows($result) > 0)
   {
      $user_info = mysqli_fetch_assoc($result);
   } 
}  

//Assiging all the fetched values here
/*$first_name  = isset($user_info['first_name']) ? $user_info['first_name'] : '';
$middle_name = isset($user_info['middle_name']) ? $user_info['middle_name'] : '';
$last_name   = isset($user_info['last_name']) ? $user_info['last_name'] : '';
$prefix      = isset($user_info['prefix']) ? $user_info['prefix'] : '';
$gender      = isset($user_info['gender']) ? $user_info['gender'] : '';
$employment  = isset($user_info['employment']) ? $user_info['employment'] : '';
$employer    = isset($user_info['employer']) ? $user_info['employer'] : '';
$image       = isset($user_info['image']) ? $user_info['image'] : '';*/

if (isset($user_info['street']) && !empty($user_info['street'])) 
{
   $street      = explode(',', $user_info['street']);
   $home_street   = $street[0];
   $office_street = $street[1];
} 
else 
{
   $home_street   = '';
   $office_street = '';
}

if(isset($user_info['city']) && !empty($user_info['city']))
{
$city        = explode(',',$user_info['city']);
$home_city   = $city[0];
$office_city = $city[1];
}
else
{
$home_city   = '';
$office_city = '';
}

if (isset($row['state']) && !empty($user_info['city']))
{
 $state      = explode(',', $user_info['state']);
 $home_state   = $state[0];
 $office_state = $state[1];  
}
else
{
 $home_state   = '';
 $office_state = '';  
}

 if(isset($user_info['zip']) && !empty($user_info['zip']))
 {
  $zip   = explode(',', $user_info['zip']);
  $home_zip = $zip[0];
  $office_zip = $zip[1];
 }
else
{
 $home_zip = '';
 $office_zip = '';  
}

if(isset($user_info['mobile']) && !empty($user_info['mobile']))
{
  $mobile   = explode(',', $user_info['mobile']);
  $home_mobile = $mobile[0];
  $office_mobile = $mobile[1];
}
else
{
  $home_mobile = '';
  $office_mobile = '';  
}

if(isset($user_info['landline']) && !empty($user_info['landline']))
{
  $landline   = explode(',', $user_info['landline']);
  $home_landline = $landline[0];
  $office_landline = $landline[1];
}
else
{
   $home_landline = '';
   $office_landline = '';
}

if(isset($user_info['fax']) && !empty($user_info['fax']))
 {
   $fax   = explode(',', $user_info['fax']);
   $home_fax = $fax[0];
   $office_fax = $fax[1];    
 }
 else
 {
   $home_fax = '';
   $office_fax = ''; 
 }

if(isset($row['type']) && !empty($user_info['type']))
{
   $comm_type = explode(',', $user_info['type']);
   $comm_1 = $comm_type[0];
   $comm_2 = $comm_type[1];
   $comm_3 = $comm_type[2];
   $comm_4 = $comm_type[3];
}
else
{
   $comm_1 = '';
   $comm_2 = '';
   $comm_3 = '';
   $comm_4 = '';  
}

?>

<!DOCTYPE html>
<html>
   <head>
      <title>Registration Page</title>
      <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <!-- <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"> -->
      <link rel="stylesheet" type="text/css" href="css/main.css">
      <link rel="stylesheet" type="text/css" href="css/imageUpload.css"> 
      <script language="javascript" src="<?php echo $_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1' ? 'http' : 'https' ?>://<?php echo $_SERVER['SERVER_NAME'] ?>/js/image.js"></script>
   </head>
   <body class="body">
      <nav class="navbar navbar-inverse">
         <div class="container-fluid">
            <ul class="nav navbar-nav navbar-right">
               <li><a href="/registration.php"><span class="glyphicon glyphicon-user"></span>Sign-up</a></li>
               <li><a href="#login"><span class="glyphicon glyphicon-user"></span>Login</a></li>
            </ul>
         </div>
      </nav>
      <!-- End of navbar -->
      <div class="container">
         <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
               <div class="well well-lg">
                  <form class="form-inline" role="form" method="POST" action="
                  <?php
                     if(isset($_GET['userAction']) && $_GET['userAction']=='update')
                     {
                        echo 'update.php/?emp_id='.$_GET["emp_id"];
                     } 
                     else
                     {
                        echo 'display.php';
                     }
                  ?>"
                     enctype="multipart/form-data">
                     <h2><u>PERSONAL INFORMATION</u></h2>
                     <div class="form-group">
                        <label for="fname">First Name:</label>
                        <input type="text" class="form-control" id="fname" name="first_name" 
                        value="<?php echo (isset($user_info['first_name']) ? $user_info['first_name'] : ''); ?>" required/>
                     </div>
                     <div class="form-group">
                        <label for="mname">Middle Name:</label>
                        <input type="text" class="form-control" id="mname" name="middle_name"
                        value="<?php echo (isset($user_info['middle_name']) ? $user_info['middle_name'] : ''); ?>" />   
                     </div>
                     <div class="form-group">
                        <label for="lname">Last Name:</label>
                        <input type="text" class="form-control" id="lname" name="last_name" 
                        value="<?php echo (isset($user_info['last_name']) ? $user_info['last_name'] : ''); ?>" />  
                     </div>
                     <br /><br />
                     <div class="form-group">
                        <label for="prefix" class="control-label col-lg-3">Prefix:</label>
                        <div class="col-lg-8">
                           <label class="radio-inline"><input type="radio" name="prefix"
                           <?php if (isset($prefix) && $prefix=="Mr"): ?>
                                    checked
                           <?php endif ?>
                            value="Mr"/>Mr</label>
                           <label class="radio-inline"><input type="radio" name="prefix" 
                            <?php if (isset($prefix) && $prefix=="Mrs"): ?>
                                    checked
                            <?php endif ?>
                           value="Mrs"/>Mrs</label>
                        </div>
                     </div>
                     <div class="form-group">
                        <label for="gender" class="control-label col-lg-3">Gender:</label>
                        <div class="col-lg-8">
                           <label class="radio-inline"><input type="radio" name="gender" value="Male"
                            <?php if (isset($gender) && $gender=="Male"): ?>
                                    checked
                           <?php endif ?>
                           />Male</label>
                           <label class="radio-inline"><input type="radio" name="gender"
                           <?php if(isset($gender) && $gender=="Female"): ?>
                              checked 
                           <?php endif ?>
                           value="Female"/>Female</label>
                        </div>
                     </div>
                     <br /><br />
                     <div class="form-group">
                        <label class="control-label col-lg-5" for="dob">Date of Birth:</label>
                        <div class="col-lg-6">
                           <input type="date" id="dob" name="dob" class="form-control"
                            value="<?php echo (isset($user_info['dob']) ? $user_info['dob'] : ''); ?>"/>
                        </div>
                     </div>
                     <br />
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="control-label col-lg-8" for="marital_status">Marital Status:</label>
                           </div>
                           <label class="radio-inline"><input type="radio" name="marital_status" value="Single"
                            <?php if(isset($status) && $status=="Single") echo checked;?>
                            />Single</label>
                           <label class="radio-inline"><input type="radio" name="marital_status" value="Married"
                           <?php if(isset($status) && $status=="Married") echo checked;?>
                            />Married</label>
                        </div>
                     </div>
                     <br />
                     <div class="row">
                        <div class="col-lg-12">
                           <div class="form-group">
                              <label class="control-label col-lg-4" for="employment">Employment:</label>
                              <div class="col-lg-8">
                                 <label class="radio-inline"><input type="radio" name="employment"
                                 <?php if (isset($employment) && $employment=="Employed"): ?>
                                    checked
                                 <?php endif ?>
                                  value="Employed" />Employed</label>
                                 <label class="radio-inline"><input type="radio" name="employment"
                                 <?php if(isset($employment) && $employment=="Unemployed") echo 'checked';?>
                                  value="Unemployed" />Unemployed</label>
                              </div>
                           </div>
                        </div>
                     </div>
                     <br />
                     <div class="form-group">
                        <label class="control-label col-lg-4" for="employer">Employer:</label>
                        <div class="col-lg-8">
                           <input type="text" class="form-control" id="employer" name="employer" 
                           value="<?php echo (isset($user_info['employer']) ? $user_info['employer'] : ''); ?>" />
                        </div>
                     </div>
                     <br /><br />
                     <!-- Image Upload -->
                     <div class="form-group">
                        <label class="control-label col-xs-3">Image Upload:</label>
                        <div class="col-xs-9">
                           <div class="input-group image-preview">
                              <input type="text" class="form-control image-preview-filename" disabled="disabled"  value="<?php echo $_SERVER['SERVER_PROTOCOL'] == 'HTTP/1.1' ? 'http' : 'https' ?>://<?php echo $_SERVER['SERVER_NAME'] ?>/profile/<?php echo $user_info['image'] ?>" >
                              <span class="input-group-btn">
                                 <!-- Image preview-clear button -->
                                 <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                 <span class="glyphicon glyphicon-remove"></span>Clear
                                 </button>
                                 <!-- image-preview-input -->
                                 <div class="btn btn-default image-preview-input">
                                    <span class="glyphicon glyphicon-folder-open"></span>
                                    <span class="image-preview-input-title">Browse</span>
                                    <input type="file" name="image" accept="image/jpg, image/png, image/jpeg, image/gif" />
                                 </div>
                              </span>
                           </div>
                        </div>
                     </div>
                                          <!-- Image Upload task ends -->
                     <br />
                     <hr class="hr" />
                     <div class="row">
                        <div class="col-lg-6">
                           <h2><u>RESIDENCE ADDRESS</u></h2>
                           <div class="form-group">
                              <label class="control-label col-xs-3" for="home_street">Street:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_street" name="home_street" value="<?php echo $home_street; ?>">
                              </div>
                           </div>
                           <br><br> 
                           <div class="form-group">
                              <label class="control-label col-xs-3" for="home_city">City:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_city" name="home_city" value="<?php echo $home_city; ?>">
                              </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-3" for="home_state">State:</label>
                              <div class="col-xs-8">
                                 <select class="form-control" id="home_state" name="home_state">
                                    <option value="">Select State</option>
                                    <option <?php if(isset($state) && $state=='Andaman and Nicobar Islands') echo selected; ?> value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option <?php if(isset($state) && $state=='Andhra Pradesh') echo selected; ?> value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option <?php if(isset($state) && $state=='Arunachal Pradesh') echo selected; ?> value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option <?php if(isset($state) && $state=='Assam') echo selected; ?> value="Assam">Assam</option>
                                    <option <?php if(isset($state) && $state=='Bihar') echo selected; ?> value="Bihar">Bihar</option>
                                    <option <?php if(isset($state) && $state=='Chandigarh') echo selected; ?> value="Chandigarh">Chandigarh</option>
                                    <option <?php if(isset($state) && $state=='Chhattisgarh') echo selected; ?> value="Chhattisgarh">Chhattisgarh</option>
                                    <option <?php if(isset($state) && $state=='Dadra and Nagar Haveli') echo selected; ?> value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option <?php if(isset($state) && $state=='Daman and Diu') echo selected; ?> value="Daman and Diu">Daman and Diu</option>
                                    <option <?php if(isset($state) && $state=='Delhi') echo selected; ?> value="Delhi">Delhi</option>
                                    <option <?php if(isset($state) && $state=='Goa') echo selected; ?>  value="Goa">Goa</option>

                                    <option <?php if(isset($state) && $state=='Gujarat') echo selected; ?> value="Gujarat">Gujarat</option>

                                    <option <?php if(isset($state) && $state=='Haryana') echo selected; ?> value="Haryana">Haryana</option>

                                    <option <?php if(isset($state) && $state=='Himachal Pradesh') echo selected; ?> value="Himachal Pradesh">Himachal Pradesh</option>
                                    
                                    <option <?php if(isset($state) && $state=='Jammu and Kashmir') echo selected; ?> value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option <?php if(isset($state) && $state=='Jharkhand') echo selected; ?> value="Jharkhand">Jharkhand</option>
                                    <option <?php if(isset($state) && $state=='Karnataka') echo selected; ?> value="Karnataka">Karnataka</option>
                                    <option <?php if(isset($state) && $state=='Kerala') echo selected; ?> value="Kerala">Kerala</option>
                                    <option <?php if(isset($state) && $state=='Lakshadweep') echo selected; ?> value="Lakshadweep">Lakshadweep</option>
                                    <option <?php if(isset($state) && $state=='Madhya Pradesh') echo selected; ?> value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option <?php if(isset($state) && $state=='Maharashtra') echo selected; ?> value="Maharashtra">Maharashtra</option>
                                    <option <?php if(isset($state) && $state=='Manipur') echo selected; ?> value="Manipur">Manipur</option>
                                    <option <?php if(isset($state) && $state=='Meghalaya') echo selected; ?> value="Meghalaya">Meghalaya</option>
                                    <option <?php if(isset($state) && $state=='Mizoram') echo selected; ?> value="Mizoram">Mizoram</option>
                                    <option <?php if(isset($state) && $state=='Nagaland') echo selected; ?> value="Nagaland">Nagaland</option>
                                    <option <?php if(isset($state) && $state=='Orissa') echo selected; ?> value="Orissa">Orissa</option>
                                    <option <?php if(isset($state) && $state=='Pondicherry') echo selected; ?> value="Pondicherry">Pondicherry</option>
                                    <option <?php if(isset($state) && $state=='Punjab') echo selected; ?> value="Punjab">Punjab</option>
                                    <option <?php if(isset($state) && $state=='Rajasthan') echo selected; ?> value="Rajasthan">Rajasthan</option>
                                    <option <?php if(isset($state) && $state=='Sikkim') echo selected; ?> value="Sikkim">Sikkim</option>
                                    <option <?php if(isset($state) && $state=='Tamil Nadu') echo selected; ?> value="Tamil Nadu">Tamil Nadu</option>
                                    <option <?php if(isset($state) && $state=='Telangana') echo selected; ?> value="Telangana">Telangana</option>
                                    <option <?php if(isset($state) && $state=='Tripura') echo selected; ?> value="Tripura">Tripura</option>
                                    <option <?php if(isset($state) && $state=='Uttar Pradesh') echo selected; ?> value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option <?php if(isset($state) && $state=='Uttarakhand') echo selected; ?> value="Uttarakhand">Uttarakhand</option>
                                    <option <?php if(isset($state) && $state=='West Bengal') echo selected; ?> value="West Bengal">West Bengal</option>
                                 </select>
                              </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_zip">Zip:</label>
                              <div class="col-xs-8">
                                 <input type="text" id="home_zip" name="home_zip" class="form-control" value="<?php echo $home_zip; ?>">
                              </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_mobile">Mobile:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_mobile" name="home_mobile" value="<?php echo $home_mobile; ?>">
                              </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_landline">Landline:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_landline" name="home_landline" value="<?php echo $home_landline; ?>">
                              </div>
                              <br>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="home_fax">Fax:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="home_fax" name="home_fax" value="<?php echo $home_fax; ?>">
                              </div>
                           </div>
                        </div>
                        <div class="col-lg-6">
                           <h2><u>OFFICE ADDRESS</u></h2>
                           <div class="form-group">
                              <label class="control-label col-xs-3" for="office_street">Street:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_street" name="office_street" value="<?php echo $office_street; ?>">
                              </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-3" for="office_city">City:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_city" name="office_city" value="<?php echo $office_city; ?>">
                              </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_state">State:</label>
                              <div class="col-xs-8">
                                 <select class="form-control" id="office_state" name="office_state">
                                    <option value="">Select State</option>
                                    <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                    <option value="Assam">Assam</option>
                                    <option value="Bihar">Bihar</option>
                                    <option value="Chandigarh">Chandigarh</option>
                                    <option value="Chhattisgarh">Chhattisgarh</option>
                                    <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
                                    <option value="Daman and Diu">Daman and Diu</option>
                                    <option value="Delhi">Delhi</option>
                                    <option value="Goa">Goa</option>
                                    <option value="Gujarat">Gujarat</option>
                                    <option value="Haryana">Haryana</option>
                                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                                    <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    <option value="Jharkhand">Jharkhand</option>
                                    <option value="Karnataka">Karnataka</option>
                                    <option value="Kerala">Kerala</option>
                                    <option value="Lakshadweep">Lakshadweep</option>
                                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                                    <option value="Maharashtra">Maharashtra</option>
                                    <option value="Manipur">Manipur</option>
                                    <option value="Meghalaya">Meghalaya</option>
                                    <option value="Mizoram">Mizoram</option>
                                    <option value="Nagaland">Nagaland</option>
                                    <option value="Orissa">Orissa</option>
                                    <option value="Pondicherry">Pondicherry</option>
                                    <option value="Punjab">Punjab</option>
                                    <option value="Rajasthan">Rajasthan</option>
                                    <option value="Sikkim">Sikkim</option>
                                    <option value="Tamil Nadu">Tamil Nadu</option>
                                    <option value="Telangana">Telangana</option>
                                    <option value="Tripura">Tripura</option>
                                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                                    <option value="Uttarakhand">Uttarakhand</option>
                                    <option value="West Bengal">West Bengal</option>
                                 </select>
                              </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_zip">Zip:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_zip" name="office_zip" value="<?php echo $office_zip; ?>">
                              </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_mob">Mobile:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_mob" name="office_mob" value="<?php echo $office_mobile; ?>">
                              </div>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_ldline">Landline:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_ldline" name="office_landline" value="<?php echo $office_landline; ?>">
                              </div>
                              <br>
                           </div>
                           <br><br>
                           <div class="form-group">
                              <label class="control-label col-xs-4" for="office_fax">Fax:</label>
                              <div class="col-xs-8">
                                 <input type="text" class="form-control" id="office_fax" name="office_fax" value="<?php echo $office_fax; ?>">
                              </div>
                           </div>
                        </div>
                        <!--  end of row -->
                     </div>
                     <hr class="hr" />
                     <h2><u>OTHER DETAILS:</u></h2>
                     <br />
                     <div class="form-group">
                        <label class="control-label col-lg-3" for="comm">Preferred Communication:</label>
                        <div class="col-lg-9">
                           <label class="checkbox-inline"><input type="checkbox" name="communication[]" value="mobile" <?php if(isset($comm_1)&&$comm_1=="mobile") echo "checked"; ?> />Mobile</label>
                           <label class="checkbox-inline"><input type="checkbox" name="communication[]" value="sms"  <?php if(isset($comm_2)&&$comm_2=="SMS") echo "checked"; ?>/>SMS</label>
                           <label class="checkbox-inline"><input type="checkbox" name="communication[]" value="email" <?php if(isset($comm_3)&&$comm_3=="email") echo "checked"; ?>/>Email</label>
                           <label class="checkbox-inline"><input type="checkbox" name="communication[]" value="other" <?php if(isset($comm_4)&&$comm_4=="Other") echo "checked"; ?> />Other</label>
                        </div>
                     </div>
                     <div class="col-lg-9">
                     </div>
               </div>
               <div class="form-group" style="position:relative; left:35%;">
               <div class="col-lg-12">
               <!--<button type="submit" name="submit" class="btn btn-lg btn-info">Register</button> -->
               <input type="submit" name="submit" value="
               <?php if(isset($_GET['emp_id']) && $_GET['userAction']=='update')
                     {
                        echo 'UPDATE';
                     }
                     else
                     {
                        echo 'REGISTER';
                     }
                ?>
               " class="btn btn-lg btn-info">
               <button type="reset" class="btn btn-lg btn-danger">Cancel</button>
               
               </div>
               </div>
               </form>
            </div>
         </div>
      </div>
      </div>
   </body>
</html>