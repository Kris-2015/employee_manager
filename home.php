<?php
  session_start();
  ini_set("display_error", "1");
 require_once('session_check.php');

 $obj = new session_check(); 
 $check_valid_user = $obj->logged_in();

 if(!$check_valid_user && empty($_SESSION['user_id']))
 {
   header('location:login.php?logged_out=1');
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Employee System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<style>	
			.carousel-inner > .item > img,
			.carousel-inner > .item > a > img
			{
				width: 70%;
				margin: auto;
			}
	</style>
</head>
<body>

 <!-- Navbar --> 
<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="/home.php">Employee Management</a>
		</div>
		<ul class="nav navbar-nav">
			<li class="active"><a href="/home.php">Home</a></li>
		</ul>
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

 <!-- Carousel --> 
<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
     <!-- Indicators --> 
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

     <!-- Wrapper for slides --> 
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="image/wall_6.jpg" alt="Chania" width="460px" height="345px">
      </div>

      <div class="item">
        <img src="image/new2.jpg" alt="Chania" width="460px" height="345px">
      </div>
    
      <div class="item">
        <img src="image/new.jpg" alt="Flower" width="460px" height="345px">
      </div>

      <div class="item">
        <img src="image/new3.jpg" alt="Flower" width="460px" height="345px">
      </div>
    </div>

     <!-- Left and right controls --> 
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html> 