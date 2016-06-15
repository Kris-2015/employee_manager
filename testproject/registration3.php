<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Registration Page</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="css/main.css" />
<script type="text/javascript" src="js/bootstrap.js"></script>
<script type="text/javascript" src="js/jquery-1.12.3.js"></script>

</head>

<body class="body">

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
    	<ul class="nav navbar-nav navbar-right">
        	<li><a href="#registration"><span class="glyphicon glyphicon-user"></span>Sign-up</a></li>
            <li><a href="#login"><span class="glyphicon glyphicon-user"></span>Login</a></li>
        </ul>
    </div>
</nav>


<div class="container">
	<div class="row">
    	<div class="col-lg-11 col-md-11 col-sm-8 col-xs-12">
        	<div class="well well-lg">
            	<form class="form-inline" role="form">
            		<div class="form-group">
                		 <label for="fname">First Name:</label>
                         <input type="text" class="form-control" id="fname" name="first_name" placeholder="First Name" />
                	</div>
                    <div class="form-group">
                    	 <label for="mname">Middle Name:</label>
                         <input type="text" class="form-control" id="mname" name="middle_name" placeholder="First Name" /> 	
                    </div>
                    <div class="form-group">
                    	 <label for="lname">Last Name:</label>
                         <input type="text" class="form-control" id="lname" name="last_name" placeholder="First Name" /> 	
                    </div>
                    <br /><br />
                    <div class="form-group">
                    	 <label for="prefix" name="prefix" class="control-label col-sm-4">Prefix:</label>
                         <div class="control-label col-sm-8">
                         	<label class="radio-inline"><input type="radio" name="Mr" />Mr.</label>
                         	<label class="radio-inline"><input type="radio" name="Mrs" />Mrs.</label>
                         </div> 	
                    </div>
                    
                    <div class="form-group" id="gender">
                    	 <label for="gender" name="gender" class="control-label col-sm-4">Gender:</label>
                         <div class="control-label col-sm-8">
                         	<label class="radio-inline"><input type="radio" name="Male" />Male</label>
                         	<label class="radio-inline"><input type="radio" name="Female" />Female</label>
                         </div> 	
                    </div>
            	</form>
            </div> 
        </div>
    </div>
</div>
</body>
</html>