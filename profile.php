<?php

ini_set("display_errors", "1"); 
session_start();
include('user.php');
include('session_check.php');
$obj = new session_check();
$check_valid_user = $obj->logged_in();

if($check_valid_user)
{
}
else
{
  if(empty($_SESSION['user_id']))
  {
    header('location:login.php?logged_out=1');
  }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PERSONAL INFORMATION</title>
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body background="image/wall_1.jpg">

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
            <li><a href="/display.php">Profile</a></li>
            <li><a href="/logout.php"> Logout </a></li>
          </ul>
        </li>
     </ul>
  </div>
</nav>


<div class="container">
  <div class="row">
    <div class="col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table table-bordered">
              <thead>
                   <tr>
                     <td align="center"><u>NAME</u></td>
                     <td align="center"><u>GENDER</u></td>
                     <td align="center"><u>DOB</u></td>
                     <td align="center"><u>Marital Status</u></td>
                     <td align="center"><u>OFFICIAL ADDRESS</u></td>
                     <td align="center"><u>RESIDENCE ADDRESS</u></td>
                     <td align="center"><u>COMMUNICATION</u></td>
                     <td align="center"><u>ACTION</u></td>
                   </tr>
             </thead>
             <tbody>
               <?php
             	    $obj = new user();
                	$result = $obj->display_user($_SESSION['user_id']);

                              if(mysqli_num_rows($result) > 0)
                              {
                              	while($row = mysqli_fetch_assoc($result))
                              	{
                              		echo "<tr>";
                              		    echo "<td>" . $row["name"];
                              		    echo "<td>" . $row["gender"] . "</td>";
                              		    echo "<td>" . $row["dob"] . "</td>";
                              		    echo "<td>" . $row["marital_status"] . "</td>";
                              		    echo "<td>" . $row["office"] . "</td>";
                              		    echo "<td>" . $row["residence"] . "</td>";
                              		    echo "<td>" . $row["communication"] . "</td>";
                                        echo '<td>' . '<a href="/registration.php/?emp_id=' . $row['id'] . '&action=delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>' . '&nbsp;&nbsp;&nbsp;' .'<a href="/registration.php/?emp_id=' . $row['id'] . '&action=update"<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' . '</td>';
                              		echo "</tr>";
                              	}
                              }
                             ?>

                             
                        </tbody>
                     </table>
                    </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
</body>
</html>