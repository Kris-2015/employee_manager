<?php 
ini_set("display_error","1");
session_start();                            
include('connection.php');
?>

<!DOCTYPE html>
<html>
   <head>
      <title>DISPLAY INFORMATION</title>
      <link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="css/cover.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
      <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script type="text/javascript" src="js/search.js"></script>
   </head>
   <body background="image/wood.jpg">
      <nav class="navbar navbar-inverse navbar-static-top">
         <div class="container-fluid">
            <div class="navbar-header" >
               <a class="navbar-brand" href="/home.php">EMPLOYEE MANAGEMENT</a>
            </div>
            <ul class="nav navbar-nav">
               <li ><a href="/home.php">Home</a></li>
            </ul>
         </div>
       </nav>
       <h2 align="center"><u>REGISTERED USER</u></h2>
       <div class="container">
       <div class="row">
       <div class="col-xs-8">
              <form class="form-inline" role="form">
            <div class="form-group">
              <label for="name">Name:</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="First  Name">
            </div>  
            <div class="form-group">
                <label for="email">Email:</label>
                  <input type="text" name="email" class="form-control" id="email" placeholder="Email">
            </div>  
               <button type="submit" class="btn btn-info" id="onsubmit"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
            </form>   
       </div><br><br> 
       <div class="col-xs-12" id="tab">
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
            $obj = new db_connection();
            $result = $obj->display();

            if (mysqli_num_rows($result) > 0)
            {
              while ($row = mysqli_fetch_assoc($result))
              {
                echo "<tr>";
                   echo "<td>" . $row["name"];
                   echo "<td>" . $row["gender"] . "</td>";
                   echo "<td>" . $row["dob"] . "</td>";
                   echo "<td>" . $row["marital_status"] . "</td>";
                   echo "<td>" . $row["office"] . "</td>";
                   echo "<td>" . $row["residence"] . "</td>";
                   echo "<td>" . $row["communication"] . "</td>";
                   echo '<td>' . '<a href="/registration.php/?emp_id=' . $row['id'] . '&action=delete"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></a>' . '&nbsp;&nbsp;&nbsp;' . '<a href="/registration.php/?emp_id=' . $row['id'] . '&action=update"<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>' . '</td>';
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