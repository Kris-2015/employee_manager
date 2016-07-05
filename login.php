<?php
include ('user.php');
if (isset($_POST['login']))
{

   // checking the email-id and password is set or not
   $email_id = isset($_POST['email_id']) ? $_POST['email_id'] : ' ';
   $password = isset($_POST['password']) ? $_POST['password'] : ' ';
   if (!empty($email_id) && !empty($password))
   {
      // instainstiating the class user
      $user_auth = new user();
      $result = $user_auth->check($email_id, $password);
      if ($result)
      {
         header("location:/home.php");
      }
      else
      {
         $error = "invalid mail id or password";
      }
   }
   else
   {
      $error = "invalid credential";
   }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="/home.php">Employee Management</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="/home.php">Home</a></li>
		</ul>
		 <ul class="nav navbar-nav navbar-right">
		 <li><a href="/registration.php"><span class="glyphicon glyphicon-user"></span> Sign-Up</a></li>
		 <li><a href="/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
		 </ul>
	</div>
</nav>

<div class="container">
  <div class="row">
 <?php
      if($_GET['logged_out'] == 1)
      {
         echo "<div class='alert alert-danger'>You need to login</div>" ;
      }
      else if(!empty($error))
      {
         echo "<div class='alert alert-danger'>$error</div>";
      }
  ?> 
   
   <div class="col-xs-6 col-xs-offset-3">
   		<div class="panel panel-primary">
   		  <div class="panel-heading ">
   		  	<h3 align="center">LOGIN</h3>
   		  </div>
   		  <div class="panel-body">
   		  		<form class="form-horizontal" role="form" action="login.php" method="POST">
   		  			<div class="form-group">
   		  				<label class="control-label col-xs-3" for="email">Email-id:</label>
   		  				<div class="col-xs-9">
   		  					<input type="text" name="email_id" id="email" value="<?php echo isset($email_id)? $email_id : ' '; ?>" class="form-control" >
                        <span class="error">  </span>
   		  				</div>
   		  			</div>
   		  			<div class="form-group">
   		  				<label class="control-label col-xs-3" for="password">Password:</label>
   		  				<div class="col-xs-9">
   		  					<input type="password" name="password" id="password" class="form-control" >
                        <span class="error"> </span>
   		  				</div>
   		  			</div>
   		  			<div class="form-group">
   		  				<div class="col-xs-7 col-xs-offset-5">
   		  					<input type="submit" name="login" value="LOGIN" class="btn btn-info">
   		  				</div>
   		  			</div>
   		  		</form>
   		  </div>
   		</div>
   </div>
 </div>
</div>
</body>
</html>