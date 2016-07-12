<?php
// session_start();
// include("control_permission.php");

// $user_id = $_SESSION['user_id'];

// $obj = new ACL();
// $get_role = $obj->getrole($user_id);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<link rel="stylesheet" type="text/css" href="css/cover.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
            <li><a href="/profile.php">Profile</a></li>
            <li><a href="/display.php"> Display </a></li>
            <li><a href="/logout.php"> Logout </a></li>
          </ul>
        </li>
	</ul>
  </div>
</nav>

<div class="container">
  <div class="row">
	<div class="col-xs-6 col-xs-offset-4">
	  <p class="welcome_user">Welcome Admin</p>
	</div>
  </div>
</div>

</body>
</html>