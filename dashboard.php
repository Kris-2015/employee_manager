<?php
session_start();
include ("control_permission.php");

$role_id = $_SESSION['role_id'];
$obj =  new ACL();
$get_role = $obj->getrole($role_id);

if ('1' == $role_id)
{
  $name = "admin";
}
else
{
  $name = "user";
}

$checking_permission = $obj->isResourceAllowed($_SERVER['REQUEST_URI'], 'all');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/cover.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/cover.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Admin Panel</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Welcome, <?php echo isset($_SESSION['user_name'])? $_SESSION['user_name'] : '' ; ?> <span class="caret"></span></a>
          <ul class="dropdown-menu">
          <?php              
            foreach($_SESSION['user_permission'] as $page=>$val)
            {
              if(basename(__FILE__) == $page)
              {
                continue;
              }
              echo '<li><a href="' . $page . '.php">' . $page.'</a></li>' . "\n";
            }
          ?>  
          <li><a href=" logout.php"> Logout </a></li>
          </ul>
        </li>
	</ul>
  </div>
</nav>

<div class="container">
  <div class="row">
	<div class="col-xs-6 col-xs-offset-4">
	  <p class="welcome_user">Welcome <?php echo $name; ?></p>
  <?php

    if(isset($_SESSION['display_error']['display']))
    {
     echo '<div class="alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Error:</span>'
        . $_SESSION['display_error']['display'] .
    '</div>
   </div>
  </div>';

  }
  else if(isset($_SESSION['display_error']['registration']))
  {
   echo '<div class="alert alert-danger" role="alert">
      <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
      <span class="sr-only">Error:</span>'
        . $_SESSION['display_error']['registration'] .
    '</div>
   </div>
  </div>'; 
  }
?>
<?php 
 if($name == 'admin')
 {
  echo '
  <div class="row">
    <div class="col-xs-6">
     <div class="panel panel-default">
      <div class="panel-body">
            <button type="button" class="btn btn-primary btn-lg pull-right"><a href=" display.php" id="admin_button">VIEW</a></button><br><br><br>
            <button type="button" class="btn btn-danger btn-lg pull-right"><a href="display.php" id="admin_button">EDIT</a></button>         
      </div>
    </div>
  </div>
 </div>';
 }
 ?>
 
 </div>
</body>
</html>